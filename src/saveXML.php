<?php
//include database connection
include 'dbconn.php';

//load xml file
$file = simplexml_load_file("C:\Users\sarge\source\scanResultsJanuary.xml");

// This works!
$timestamp = $file['startstr'];
echo $timestamp . "<br><br>";

//This works!
//$stmt = $conn->prepare("CALL insertTimestamp(?)");
//$stmt->bind_param('s', $timestamp);
//$stmt->execute();
//$stmt->close();

// This shows first IP address in XML
//$host = $file->hosthint->address['addr'];
//echo $host. "<br><br>";

// This loop shows all IP addresses in file, then all MAC addresses or unknown
// if none found, and then hostName or unknown if not found and then save all
// to database
foreach ($file->host as $host) {

    $ip = $host->address['addr'];
    echo $ip . "<br>";
    @$mac = $host->address[1]['addr'] ? : $mac = "Unknown";
    echo $mac . "<br>";
    $hostName = $host->hostnames->hostname['name'] ? : $hostName = "Unknown";
    echo $hostName. "<br><br>";

//    $stmt1 = $conn->prepare("CALL insertDevices(?,?,?,?)");
//    $stmt1->bind_param('ssss', $mac, $ip, $hostName, $timestamp);
//    $stmt1->execute();


    // This loop shows all ports and port info but only saves the first line of port info
    // for each IP
        foreach ($host->ports->port as $portid) {

            //echo $portid['portid'] . " " . $portid->state['state'] . " " . $portid->service['name'] . "<br>";
//        $timestamp = $file['startstr'];
//        $ip = $host->address['addr'];
            $ip = $host->address['addr'];
            $port = $portid['portid'];
            $state = $portid->state['state'];
            $service = $portid->service['name'];

            echo "Port Info: " . $port . " " . $state . " " . $service . "<br>";

            $stmt2 = $conn->prepare("CALL insertPortInfo(?,?,?,?,?)");
            $stmt2->bind_param('sisss', $ip, $port, $state, $service, $timestamp);
            $stmt2->execute();
            $port = "";
            $state = "";
            $service = "";
            $ip = "";
            $stmt2->close();








        }


        echo "<br><br>";

}

//$stmt1->close();

