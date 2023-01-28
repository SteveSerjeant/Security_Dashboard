<?php
//include database connection
include 'dbconn.php';

//load xml file
$file = simplexml_load_file("C:\Users\sarge\source\scanResultsJanuary.xml");

$timestamp = $file['startstr'];
echo $timestamp . "<br><br>";

$stmt = $conn->prepare("CALL insertTimestamp(?)");
$stmt->bind_param('s', $timestamp);
$stmt->execute();
$stmt->close();

$host = $file->hosthint->address['addr'];
echo $host. "<br><br>";
echo $file->host->hostnames->hostname['name'] . "<br><br>";

foreach ($file->host as $host){
    $timestamp = $file['startstr'];
    echo $timestamp . "<br>";
//    echo $host->address['addr'] . "<br>";
//    echo $host->address[1]['addr']  . "<br>";
//    echo $host->hostnames->hostname['name'] . "<br><br>";
    $ip = $host->address['addr'];
    echo $ip . "<br>";
    @$mac = $host->address[1]['addr'] ? : $mac = "Unknown";
    echo $mac . "<br>";
    $hostName = $host->hostnames->hostname['name'] ? : $hostName = "Unknown";
    echo $hostName. "<br><br>";
    $stmt1 = $conn->prepare("CALL insertDevices(?,?,?,?)");
    $stmt1->bind_param('ssss', $mac, $ip, $hostName, $timestamp);
    $stmt1->execute();

}
$stmt1->close();