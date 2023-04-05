<?php

include ("dbconn.php");

$forDelete = "C:\Program Files\Ampps\www\Security_Dashboard\src\scheduledScanDevices.xml";
$forDelete1 = "C:\Program Files\Ampps\www\Security_Dashboard\src\scheduledScanOS.xml";



unlink ($forDelete);
unlink ($forDelete1);

$sql = ('UPDATE Marker SET marker = 0 WHERE ID=1');
$stmt = $conn->prepare($sql);
$stmt->prepare($sql);
$stmt->execute();

exec('C:\Users\sarge\source\scheduledScan.bat');

function filesExist (){
}
if (strpos(file_get_contents("C:\Program Files\Ampps\www\Security_Dashboard\src\scheduledScanOS.xml"),"</nmaprun>")){
//    header('Location: saveScans.php');
    $file = simplexml_load_file("C:\Program Files\Ampps\www\Security_Dashboard\src\scheduledScanDevices.xml");
    $fileOS = simplexml_load_file("C:\Program Files\Ampps\www\Security_Dashboard\src\scheduledScanOS.xml");

    $timestamp = $file['startstr'];




    $stmt = $conn->prepare("CALL insertTimestamp(?)");
    $stmt->bind_param('s', $timestamp);
    $stmt->execute();
    $stmt->close();

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
}
else {
    sleep(60);
    filesExist();

}


filesExist();
