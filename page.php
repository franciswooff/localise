<?php
$editme = fopen('EDITME.txt', 'r') or die('<p>Unable to open your EDITME.txt file</p>');
$vidnum = fgets($editme);
fclose('EDITME.txt');

session_set_cookie_params(3000,"/");
session_start();

$cntr=$_SESSION["vidcount"];
if(is_null($cntr)){
  $cntr = 1;
  $_SESSION["vidcount"]=$cntr;
}

$noforres = $cntr-1;
if (isset($_POST['page'])) {
  $res = $_POST['degs'];
  if(is_numeric($res)){
    $comp = $noforres.'_'.$res;
    $_SESSION["r".$noforres] = $comp;
  } else {
    exit('<h1>Something nasty here, try the test again</h1>');
  }
}

if ($cntr > $vidnum){
  header("location:end.php");
}

if ($cntr > $vidnum){
  header("location:end.php");
}

if (isset($_POST['start'])) {
  $ptno = $_POST["partno"];
  if(is_numeric($ptno)){
    $_SESSION["subno"]=$ptno;
  } else if ($ptno==""){
    $ptno="not set";
    $_SESSION["subno"]=$ptno;
  } else {
    exit('<h1>Something nasty here, go back &amp; try again</h1>');
  }
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

<h1>Localise test '.$cntr.'</h1>

<audio loop><source src="audiofiles/'.$cntr.'.wav" type="audio/mpeg"></audio>
';

$cntr ++;
$_SESSION["vidcount"]=$cntr;
?>
<img src="images/head.png" alt="overhead diagram of head showing angles on surrounding circle">

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