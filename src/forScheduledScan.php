<?php
//session_start();
include ("dbconn.php");

$forDelete = "C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultDevices.xml";
$forDelete1 = "C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultOS.xml";

unlink ($forDelete);
unlink ($forDelete1);

$sql = ('UPDATE Marker SET marker = 0 WHERE ID=1');
$stmt = $conn->prepare($sql);
$stmt->prepare($sql);
$stmt->execute();

function filesExist (){
}
if (strpos(file_get_contents("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultOS.xml"),"</nmaprun>")){
    header('Location: saveScans.php');
    //load xml file
    $file = simplexml_load_file("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultDevices.xml");
    $fileOS = simplexml_load_file("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultOS.xml");

    $timestamp = $file['startstr'];
//echo "Devices: " . $timestamp . "<br>";

//$timestampOS = $fileOS['startstr'];
//echo "OS: " . $timestampOS . "<br>";

    $stmt = $conn->prepare("CALL insertTimestamp(?)");
    $stmt->bind_param('s', $timestamp);
    $stmt->execute();
    $stmt->close();

//$stmt1 = $conn->prepare("CALL insertTimestampOS(?)");
//$stmt1->bind_param('s', $timestampOS);
//$stmt1->execute();
//$stmt1->close();

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


// for port info
    foreach ($file->host as $hostPort) {

        $addr = (string) ($hostPort->address['addr']);
//    echo $addr . "<br>";

        foreach ($hostPort->ports->port as $portid)
        {

            $port = (string) ($portid['portid']);
//        echo $port . " ";
            $protocol = $portid['protocol'];
//            $state = $host->ports->port->state['state']; // shows just 1st state
            $state = $portid->state['state'];
            $service = $portid->service['name'];
//        echo "IP: " . $addr ." Timestamp: " . $timestamp . " PortID: ".$port." State: ".$state." Service: ".$service."<br>";

            $stmt6 = $conn->prepare("INSERT INTO portInfo (ipAddress, portID, state, serviceName, timestamp ) VALUES (?,?,?,?,?)");
            $stmt6->bind_param("sssss",  $addr,$port, $state, $service, $timestamp);
            $stmt6->execute();

        }

        $stmt6->close();

    }



    $stmt->close();

    foreach ($fileOS->host as $hostOS){
        $ipOS = $hostOS->address['addr'];
//    echo $ipOS . "<br>";
        echo $timestampOS . "<br>";
        $osType = $hostOS->os->osmatch['name'] ? : $os = "Not Found";
//    echo $osType . "<br>";
        $acc = $os = $hostOS->os->osmatch['accuracy'] ? : $acc = "Not Found";
//    echo $acc . "<br><br>";

        $stmt4 = $conn->prepare("CALL insertOSLog(?,?,?,?)");
        $stmt4->bind_param('sssi', $ipOS, $timestamp, $osType, $acc);
        $stmt4->execute();

        $stmt5 = $conn->prepare("CALL insertOS(?,?,?,?)");
        $stmt5->bind_param('sssi', $ipOS, $timestamp, $osType, $acc);
        $stmt5->execute();

    }

    $stmt4->close();
    $stmt5->close();

    $conn->close();

    sleep(5);
}
else {
    sleep(60);
    filesExist();

}


filesExist();


?>




