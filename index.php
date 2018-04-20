<?php 
session_start();
require_once("config/config.inc.php");
$link;
if(isset($_GET['login'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];    
    $statement = $link->prepare("SELECT * FROM users WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();
        
    //Überprüfung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['id'];
        die('Login erfolgreich. Weiter zu <a href="userarea.php">internen Bereich</a>');
    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }
    
}
?>
<!DOCTYPE html> 
<html> 
<head>
  <title>Login</title>    
  <link rel="stylesheet" type="text/css" href="css/main.css">
  
  <?php
    if(isset($_GET['?login=1'])) {
   ?>   
   <meta http-equiv="refresh" content="0; URL=userarea.php"/>
   <?php
    }
  ?>

</head> 
<body>
 
<?php 
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>
<div class="login">
    <form action="?login=1" method="post">
        <label>E-Mail:</label>
        <input type="email" size="40" maxlength="250" name="email">
        <label>Dein Passwort:</label>
        <input type="password" size="40"  maxlength="250" name="passwort"> <br><br>
        <input type="submit" value="Abschicken">
    </form>
    <br>
    <a href="register.php">Noch nicht regestriert?</a>
</div>
</body>
</html>