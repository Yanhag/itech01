<?php
session_start();
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
require_once("config/config.inc.php");
$link;
require_once("header.php");

//Holen von Benutzerdaten
$userid = $_SESSION['userid'];
$sql = "SELECT * FROM users WHERE id = $userid";
foreach ($link->query($sql) as $row) {
    $anzeigename = $row['anzeigename'];
    $email = $row['email'];
}
?>
<h3><?php echo "$anzeigename"; ?></h3>
<?php
echo "Anzahl der Upvotes: <br><br>";
echo "Von $anzeigename hochgeladen:";
?>

