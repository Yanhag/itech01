<?php
session_start();
require_once("config/config.inc.php");
$link;
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
 
//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];
$sql = "SELECT * FROM users WHERE id = $userid";
foreach ($link->query($sql) as $row) {
    $anzeigename = $row['anzeigename'];
    $email = $row['email'];
}
?>
<!DOCTYPE html> 
<html> 
<head>
  <title>Upload</title>
  <link rel="stylesheet" type="text/css" href="css/main.css"> 
</head>
<body>
<?php
require_once("header.php");
?>
<h2>Benutzereinstellungen ändern</h2>
<div class="name">
    <form action="?change=1" method="post">
        <label>Anzeigename:</label>
        <input size="40" maxlength="250" name="anzeigename" value="<?php echo"$anzeigename"; ?>"/><br><br>
        <label>E-Mail:</label>
        <input type="email" size="40" maxlength="250" name="email" value="<?php echo"$email"; ?>"/><br><br>
        <input type="submit" value="Ändern">
    </form>