<?php
/* INCLUDE: Verbindung zur Text-Datenbank herstellen */
 
$db_server = "localhost"; // Hostname
$db_user = "root"; // Benutzername
$db_pass = "root"; // Kennwort
$db_name = "sqltest"; // Name der Datenbank
$link  = mysql_connect($db_server, $db_user, $db_pass) or exit ("Es konnte keine Verbindung zum Datenbankserver hergestellt werden."); // Verbindung zum Datenbankserver
mysql_select_db($db_name, $link) or exit ("Diese Datenbank \"$db_name\" existiert nicht.");
?>
 