<?php
include 'dbconn.php';

$fileOS = simplexml_load_file("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultOS230201.xml");

$timestampOS = $fileOS['startstr'];

foreach ($fileOS->host as $hostOS){
    $ipOS = $hostOS->address['addr'];
    echo $ipOS . "<br>";
    echo $timestampOS . "<br>";
    $osType = $hostOS->os->osmatch['name'] ? : $os = "Not Found";
    echo $osType . "<br>";
    $acc = $os = $hostOS->os->osmatch['accuracy'] ? : $acc = "Not Found";
    echo $acc . "<br><br>";

    $stmt = $conn->prepare("CALL insertOSLog(?,?,?,?)");
    $stmt->bind_param('sssi', $ipOS, $timestampOS, $osType, $acc);
    $stmt->execute();

    $stmt1 = $conn->prepare("CALL insertOS(?,?,?,?)");
    $stmt1->bind_param('sssi', $ipOS, $timestampOS, $osType, $acc);
    $stmt1->execute();



}

$stmt->close();
$stmt1->close();


$conn->close();
