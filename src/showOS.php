<?php

//include database connection
include 'dbconn.php';


//load xml file
$file = simplexml_load_file("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultOS230201.xml");

$timestamp = $file['startstr'];
echo $timestamp . "<br><br>";

foreach ($file->host as $host) {
//    $timestamp = $file['startstr'];
//    echo $timestamp . "<br>";
    $ip = $host->address['addr'];
/*    echo $ip . "<br>";*/

    $os = $host->os->osmatch['name'];
    $acc = $host->os->osmatch['accuracy'];
    echo $ip . " " . $os . " " . $acc . "<br>";

    $stmt = $conn->prepare("CALL insertOS(?,?,?,?)");
    $stmt->bind_param('sssi', $ip, $timestamp, $os, $acc);
    $stmt->execute();

}
$stmt->close();
$conn->close();

?>

