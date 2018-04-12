<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=itech', 'root', 'root');
 
if(isset($_GET['login'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    
    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();
        
    //Überprüfung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['id'];
        die('Login erfolgreich. Weiter zu <a href="geheim.php">internen Bereich</a>');
    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }
    
}
?>
<!DOCTYPE html> 
<html> 
<head>
  <title>Login</title>    
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
        <input type="password" size="40"  maxlength="250" name="passwort">
        <input type="submit" value="Abschicken">
    </form>
</div>
</body>
</html>