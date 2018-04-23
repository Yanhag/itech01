<?php
session_start();
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="index.php">einloggen</a>');
}
require_once("header.php");
//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];

if(isset($_GET['upload'])) {
    fileupload();
}

?>
<form action="upload.php?page=upload" method="post" enctype="multipart/form-data">
    <fieldset>
        <h4>Bild Auswählen:</h4>
        <input type="file" name="picture"> <br><br>
        <input type="Submit" name="upload" value="Datei hochladen">
    </fieldset>
</form>

<?php

//Hochladen und ablegen der Datei
function fileupload()
{
    //Überprüfung der Dateiendung
    $filename = @$_FILES ['picture']['name'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    if ($extension !== 'png') {
        die("Keine Datei ausgewählt oder Datei mit ungültiger Endung. Nur PNG-Dateien sind erlaubt.");
    } else {
        echo "Hochladen erfolgreich. <br><br>";

        move_uploaded_file(
            $_FILES['picture']['tmp_name'],
            'upload/' . $_FILES['picture']['name']);
    }
}
