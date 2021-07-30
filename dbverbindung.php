<?php

include 'dbdaten.php';

$cxn = mysqli_connect($host, $nutzer, $passwort, $dbname)
or die ("Die Verbindung konnte nicht aufgebaut werden...");

?>