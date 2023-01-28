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

        $stmt = $conn->prepare("INSERT INTO tempPorts (ipAddress, portID, state, serviceName, timestamp ) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss",  $addr,$port, $state, $service, $timestamp);
        $stmt->execute();
//        $stmt->bind_param("sss",  $addr,$port, $state);
//        $stmt->execute();
//        var_dump($stmt);
//        var_dump($stmt);
//        var_dump($addr);
//        var_dump($port);
//        var_dump($state);
//        var_dump($service);


//    foreach ($portid as $port){
//
////        var_dump($stmt);
//        var_dump($addr);
//        var_dump($port);
//        $stmt->execute();
////        $port = "";
////        $state = "";
////        $service = "";
//
//    }



}
    echo "<br>";
//$stmt->execute();




    }
    echo "<br>";


//$stmt->close();


