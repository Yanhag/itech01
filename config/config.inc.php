<?php
/* INCLUDE: Verbindung zur Text-Datenbank herstellen */
 
$db_server = 'localhost'; // Hostname
$db_user = 'roott'; // Benutzername
$db_pass = ""; // Kennwort
$db_name = "itech01"; // Name der Datenbank
$link  = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_pass);
?>
 