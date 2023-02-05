<?php
//include database connection
include 'dbconn.php';

//load xml file
$file = simplexml_load_file("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultDevices.xml");
$fileOS = simplexml_load_file("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultOS.xml");

$timestamp = $file['startstr'];
echo "Devices: " . $timestamp . "<br>";

$timestampOS = $fileOS['startstr'];
echo "OS: " . $timestampOS . "<br>";

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
    echo $ip . "<br>";
    @$mac = $host->address[1]['addr'] ? : $mac = "Unknown";
    echo $mac . "<br>";
    $hostName = $host->hostnames->hostname['name'] ? : $hostName = "Unknown";
    echo $hostName. "<br><br>";

    $stmt2 = $conn->prepare("CALL insertDevicesLog(?,?,?,?)");
    $stmt2->bind_param('ssss', $mac, $ip, $hostName, $timestamp);
    $stmt2->execute();

}
$stmt2->close();

foreach ($file->host as $host){
    $ip = $host->address['addr'];
    echo $ip . "<br>";
    @$mac = $host->address[1]['addr'] ? : $mac = "Unknown";
    echo $mac . "<br>";
    $hostName = $host->hostnames->hostname['name'] ? : $hostName = "Unknown";
    echo $hostName. "<br><br>";
    $stmt3 = $conn->prepare("CALL insertDevicesV2(?,?,?,?)");
    $stmt3->bind_param('ssss', $mac, $ip, $hostName, $timestamp);
    $stmt3->execute();

}







$conn->close();