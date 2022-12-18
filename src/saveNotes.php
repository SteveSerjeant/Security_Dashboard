<?php

include_once ("dbconn.php");

$toSave = $_POST['notes'];
echo $toSave;

$id = $_GET['id'];
echo $id;
//$stmt = $conn->prepare("CALL saveNotes(?,?)");

