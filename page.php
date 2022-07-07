<?php
$editme = fopen('EDITME.txt', 'r') or die('<p>Unable to open your EDITME.txt file</p>');
$pagenum = fgets($editme);
fgets($editme);
$rndon = fgets($editme);
$angles = fgets($editme);
$autoply = fgets($editme);
$loops = fgets($editme);
fclose($editme);
//open EDITME txt file, read number of test pages, skip a line, read what is one line 3, close it

session_set_cookie_params(3000,'/');
//sets the session cookie to expire after 50 minutes & be available anywhere on the site
session_start();

if (isset($_POST['start'])) {
//if we got to this page by a post action (input type submit) whose name is "start"
  $ptno = $_POST['partno'];
  //get the posted participant number
  if(is_numeric($ptno)){
  //check it is a number (not a hack)
    $_SESSION['subno']=$ptno;
    //send that number to the session (to be recalled on the end page)
  } else if ($ptno==''){
    $_SESSION['subno']='not set';
    //or it wasn't set & is empty (that's OK too, just code injection we're trying to avoid) "not set" text will go in mail
  } else {
    exit('<h1>Something nasty here, go back &amp; try again</h1>');
    //response to hack or fault
  }
}

$cntr = $_SESSION['pagecount'] ?? 0;
//if vidcount in the session exists set $cntr with that if not use 1

if ($cntr == 0) {
//first time round only
  $pageary = range(1,$pagenum );
  //make an array of length equal to page number from EDITME, with matching values
  $_SESSION['pagearray'] = $pageary;
  //send it to the session
}

if (isset($_POST['page'])) {
//if we got to this page by a post action (input type submit) whose name is "page" i.e. page submitted to itself
  $pageary = $_SESSION['pagearray'];
  //get the page array (shuffled or not) from the session
  $res = $_POST['degs'];
  //get the posted test result (no. of degrees)
  if(is_numeric($res)){
  //check the test result is a number (not a hack)
    $_SESSION['d'.$pageary[$cntr-1]] = $pageary[$cntr-1].'_'.$res;
    //e.g. for a counter of 2 & result 60 send the session an entry whose name is 2 & value is 2_60
  } else {
    exit('<h1>Something nasty here, try the test again</h1>');
    //response to hack or fault
  }
}

$cntr ++;
//increment counter & send to session
$_SESSION['pagecount'] = $cntr;

if ($cntr > $pagenum){
// if the counter is above the number of pages we're supposed to have (from EDITME)
  header('location:end.php');
  //go to the end page, rather than echoing out the test page
}

if ($rndon > chr(32) && $cntr == 1) {
//if there was something on line 3 of EDITME AND we are starting the test
  shuffle($pageary);
  //shuffle the page number array
  $_SESSION['pagearray'] = $pageary;
  //overwrite the unshuffled one in the session the session
}

if ($angles > chr(32)) {
//if there was something on line 4 of EDITME
  $image='head.png';
  //use the image with angles
} else {
  $image='headNA.png';
  //use the image without angles
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

<h1>Localise test '.$cntr.'</h1>

<audio '.$ap.' '.$lp.'><source src="audiofiles/'.$pageary[$cntr-1].'.wav"></audio>

<img src="images/'.$image.'" alt="overhead diagram of head showing angles on surrounding circle">

';
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
