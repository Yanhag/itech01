<!DOCTYPE html> 
<html> 
<head>
  <title>Upload</title>
  <link rel="stylesheet" type="text/css" href="css/main.css"> 
</head> 
<body>
<select name="usermenu" onchange="location = this.value;">
  <option selected disabled>Menu</option> 
  <option value="user_settings.php">Benutzer Einstellungen</option>
  <option value="X">WIP</option>
</select>
<br>
<br>

<?php
session_start();
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
 
//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];
 
echo "Hallo User: ".$userid;
?>
    
</body>
</html>
