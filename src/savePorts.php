<?php
////include database connection
include 'dbconn.php';

//load xml file
$file = simplexml_load_file("C:\Users\sarge\source\scanResultsJanuary.xml");

// This works!
$timestamp = $file['startstr'];
echo $timestamp . "<br><br>";


foreach ($file->host as $host) {

    $addr = (string) ($host->address['addr']);
    echo $addr . "<br>";



    foreach ($host->ports->port as $portid)
    {

        $port = (string) ($portid['portid']);
//        echo $port . " ";
        $protocol = $portid['protocol'];
//            $state = $host->ports->port->state['state']; // shows just 1st state
        $state = $portid->state['state'];
        $service = $portid->service['name'];
        echo "IP: " . $addr ." Timestamp: " . $timestamp . " PortID: ".$port." State: ".$state." Service: ".$service."<br>";

        $stmt = $conn->prepare("INSERT INTO portInfo (ipAddress, portID, state, serviceName, timestamp ) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss",  $addr,$port, $state, $service, $timestamp);
        $stmt->execute();

}
    echo "<br>";

    }
    echo "<br>";


$stmt->close();


