<?php
$pdo = new PDO('mysql:host=localhost;dbname=itech', 'root');

?>
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
<div class="login">
    <form action="?change=1" method="post">
        <label>Anzeigename:</label>
        <input size="40" maxlength="250" name="anzeigename"/><br>
        <label>E-Mail:</label>
        <input type="email" size="40" maxlength="250" name="email" value="<?php echo"$email"; ?>"><br><br>
        <label>Dein Passwort:</label>
        <input type="password" size="40"  maxlength="250" name="passwort"><br>
        <label>Passwort wiederholen:</label>
        <input type="password" size="40" maxlength="250" name="passwort2"><br><br>
        <input type="submit" value="Abschicken">
    </form>