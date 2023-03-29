<!doctype html>
<html lang="en">
<head>
<title>Localise test end</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
<main>
<h2>Localise test end</h2>
<p>Thanks for taking part in the test. Your results have been submitted.</p>

<?php
$editme = fopen('EDITME.txt', 'r') or die('<h2>Unable to open EDITME.txt file</h2>');
$numpages = fgets($editme);
$mail = fgets($editme);
fclose($editme);

$allres = "Audio File , Result (degrees) , Test Page \r\n";

session_start();
$subno = $_SESSION['subno'];

for ($i = 1; $i <= $numpages; $i++){
  $res = $_SESSION['d'.$i];
  $allres .= "\r\n".$res;
}

mail($mail, "Localise test results for participant number ".$subno, $allres);

session_unset();
?>

<footer>"Localise" test tool by <a href="https://github.com/franciswooff" target="_blank">FrancisWooff</a></footer>
</main>
</body>
</html>