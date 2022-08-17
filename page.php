<?php
$editme = fopen('EDITME.txt', 'r') or die('<p>Unable to open EDITME.txt file</p>');
$numpages = fgets($editme);
fgets($editme);
$rndon = fgets($editme);
$angles = fgets($editme);
$autoply = fgets($editme);
$loops = fgets($editme);
fclose($editme);

session_set_cookie_params(3000,'/');
session_start();

$cntr = $_SESSION['pagecount'] ?? 0;

if ($cntr == 0) {
  $pageary = range(1,$numpages );
  $_SESSION['pagearray'] = $pageary;
  $_SESSION['subno'] = 'INTRO PAGE SKIPPED';
}

if (isset($_POST['page'])) {
  $pageary = $_SESSION['pagearray'];
  $res = $_POST['degs'];
  if(is_numeric($res)){
    $_SESSION['d'.$pageary[$cntr-1]] = $pageary[$cntr-1].' , '.$res.' , '.$cntr;
  } else {
    exit('<h1>Something nasty here, try the test again</h1>');
  }
}

if ($cntr >= $numpages){
  header('location:end.php');
  exit();
}

if (isset($_POST['start'])) {
  $ptno = $_POST['partno'];
  if(is_numeric($ptno)){
    $_SESSION['subno']=$ptno;
  } else if ($ptno==''){
    $_SESSION['subno']='not set';
  } else {
    exit('<h1>Something nasty here, go back &amp; try again</h1>');
  }
}

if ($rndon > chr(32) && $cntr == 0) {
  shuffle($pageary);
  $_SESSION['pagearray'] = $pageary;
}

if ($angles > chr(32)) {
  $image='head.png';
} else {
  $image='headNA.png';
}
if ($autoply > chr(32)) {
  $ap='autoplay';
} else {
  $ap='';
}
if ($loops > chr(32)) {
  $lp='loop';
} else {
  $lp='';
}

echo '<!doctype html>
<html lang="en">
<head>
<title>Localise test</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" type="text/css" href="head.css">
<script src="head.js" defer></script>
</head>
<body>

<h1>Localise test '.($cntr+1).'</h1>

<audio '.$ap.' '.$lp.' src="audiofiles/'.$pageary[$cntr].'.wav"></audio>

<img src="images/'.$image.'" alt="overhead diagram of head showing angles on surrounding circle">

';

$cntr ++;
$_SESSION['pagecount'] = $cntr;
?>

<form action="page.php" method="post">
  <div class="centr">
    <img src="images/ply.png" alt="play icon"><img src="images/pse.png" alt="pause icon">
  </div>
  <input type="number" value="0" name="degs" readonly><label>&deg;</label>
  <div class="centr">
    <input type="submit" value="Submit" name="page">
  </div>
</form>

</body>
</html>
