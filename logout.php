<html>
<head>
    <title>Login</title>
    <meta http-equiv="refresh" content="1; URL=index.php"/>
</head>

<?php
session_start();
session_destroy();
 
echo "Logout erfolgreich";
?>