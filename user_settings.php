<?php
session_start();
require_once("config/config.inc.php");
$link;
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
 
//Holen von Benutzerdaten
$userid = $_SESSION['userid'];
$sql = "SELECT * FROM users WHERE id = $userid";
foreach ($link->query($sql) as $row) {
    $anzeigename = $row['anzeigename'];
    $email = $row['email'];
}

if(isset($_GET['change'])) {
    $error = false;
    $anzeigename = $_POST['anzeigename'];
    $email = $_POST['email'];
  
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }  
  
    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {    
        
        $statement = $link->prepare("UPDATE users SET (anzeigename = $anzeigename, email= $email WHERE id = $userid");
        $result = $statement->execute(array());
        
        if($result) {
            echo "Änderungen gesichert";
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    } 
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
<div class="linkbutton">
    <form action="?change=1" method="post">
        <label>Anzeigename:</label>
        <input size="40" maxlength="250" name="anzeigename" value="<?php echo"$anzeigename"; ?>"/><br><br>
        <label>E-Mail:</label>
        <input type="email" size="40" maxlength="250" name="email" value="<?php echo"$email"; ?>"/><br><br>
        <input type="submit" value="Ändern">
    </form>
</div>