<?php
//include database connection
include 'dbconn.php';

//load xml file
$file = simplexml_load_file("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultDevices.xml");
$fileOS = simplexml_load_file("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultOS.xml");

$timestamp = $file['startstr'];
//echo "Devices: " . $timestamp . "<br>";

$timestampOS = $fileOS['startstr'];
//echo "OS: " . $timestampOS . "<br>";

$stmt = $conn->prepare("CALL insertTimestamp(?)");
$stmt->bind_param('s', $timestamp);
$stmt->execute();
$stmt->close();

$stmt1 = $conn->prepare("CALL insertTimestampOS(?)");
$stmt1->bind_param('s', $timestampOS);
$stmt1->execute();
$stmt1->close();

foreach ($file->host as $host){
    $timestamp = $file['startstr'];
    $ip = $host->address['addr'];
//    echo $ip . "<br>";
    @$mac = $host->address[1]['addr'] ? : $mac = "Unknown";
//    echo $mac . "<br>";
    $hostName = $host->hostnames->hostname['name'] ? : $hostName = "Unknown";
//    echo $hostName. "<br><br>";

    $stmt2 = $conn->prepare("CALL insertDevicesLog(?,?,?,?)");
    $stmt2->bind_param('ssss', $mac, $ip, $hostName, $timestamp);
    $stmt2->execute();

    $stmt3 = $conn->prepare("CALL insertDevicesV2(?,?,?,?)");
    $stmt3->bind_param('ssss', $mac, $ip, $hostName, $timestamp);
    $stmt3->execute();

}




$stmt2->close();
$stmt3->close();


foreach ($fileOS->host as $hostOS){
    $ipOS = $hostOS->address['addr'];
//    echo $ipOS . "<br>";
    echo $timestampOS . "<br>";
    $osType = $hostOS->os->osmatch['name'] ? : $os = "Not Found";
//    echo $osType . "<br>";
    $acc = $os = $hostOS->os->osmatch['accuracy'] ? : $acc = "Not Found";
//    echo $acc . "<br><br>";

    $stmt4 = $conn->prepare("CALL insertOSLog(?,?,?,?)");
    $stmt4->bind_param('sssi', $ipOS, $timestampOS, $osType, $acc);
    $stmt4->execute();

    $stmt5 = $conn->prepare("CALL insertOS(?,?,?,?)");
    $stmt5->bind_param('sssi', $ipOS, $timestampOS, $osType, $acc);
    $stmt5->execute();



}

$stmt4->close();
$stmt5->close();


$conn->close();

sleep(5);


header('Location: showHistory.php');