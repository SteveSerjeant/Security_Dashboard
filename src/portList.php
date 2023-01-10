<!DOCTYPE html>
<html lang = "en">

<head>
    <title>Port List</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="../css/dashboardNavbar.css" type="text/css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body class="portList">
<header>
    <?php include 'header.php' ?>
</header>
<nav>
    <div class=""wrapper">
    <?php include 'navbar.php';?>

    </div
    <td><a href='tempLandingPage.php'>Back</a></td>
</nav>
<?php

$id = $_GET['id'];
//echo "IP Address: " . $id . "<br><br>";

$file= simplexml_load_file("C:\Users\sarge\source\scanResults.xml");

//echo "IP Address: " . $id . "<br><br>";

//$ip = $file->host->addr[$id];
//echo $ip;

foreach ($file->host as $host)
{
//    $name = $host->hostnames->hostname['name'];
//    echo $name."<br><br>";

    $addr = (string) ($host->address['addr']);

    if ($id == $addr) {
        echo "IP Address: " . $addr."<br>";
        $name = $host->hostnames->hostname['name'];
        $port = $host->ports->port['portid'];
        $state = $host->ports->port->state['state'];
        $service = $host->ports->port->service['name'];
        echo "PortID: ".$port." State: ".$state." Service: ".$service."<br>";
        echo "Hostname: ".$name."<br>";
        foreach ($host->ports->port as $port)
        {
//            $port = $host->ports->port['portid'];
//            $state = $host->ports->port->state['state'];
//            $service = $host->ports->port->service['name'];
            $port = $port['portid'];
            $state = $port->state['state'];
//            $state = $host->ports->port->state['state']; // shows just 1st state
            $service = $port->service['name'];
            echo "PortID: ".$port." State: ".$state." Service: ".$service."<br>";
        }



    }

    else{
//        echo " Wrong IP: ".$addr."<br>";
        echo "";
    }
}

//foreach ($file->host as $hostInfo){
//    $timestamp = $file['startstr'];
////    echo $timestamp . "<br>";
//    $ip = $hostInfo->address['addr'];
//    echo $ip . "<br>";
//
//    if ($file->address['addr'] = $id) {
////        echo "IP: " . $id . "<br>";
//        $name = $hostInfo->hostname['name'];
//        echo $name;
//    }
//                foreach ($hostInfo->ports->port as $portid) {
////        echo $portid['portid'] . " " . $portid->state['state'] . " " . $portid->service['name'] . "<br>";
//        $timestamp = $file['startstr'];
//        $ip = $file->address['addr'];
//        $port = $portid['portid'];
//        $state = $portid->state['state'];
//        $service = $portid->service['name'];
//
//        echo "Port Number: " . $port . " State: " . $state . " Service: " . $service . "<br>";
//
//    }
//                echo"<br>";
//
//}

//if ($file->address['addr'] = $id){
//    echo "IP: " . $id;
//    $host = $file->hostname['name'];
//    echo $host;
////        foreach ($file->ports->port as $portid) {
//////        echo $portid['portid'] . " " . $portid->state['state'] . " " . $portid->service['name'] . "<br>";
////        $timestamp = $file['startstr'];
////        $ip = $file->address['addr'];
////        $port = $portid['portid'];
////        $state = $portid->state['state'];
////        $service = $portid->service['name'];
////        echo "Port Number: " . $port . " State: " . $state . " Service: " . $service . "<br>";
////
////    }
//
//}
//else {
//    echo "Nothing Found.";
//}


//foreach ($file->host as $hostInfo) {
//
////    echo "MAC: " . $id . "<br>";
//    $timestamp = $file['startstr'];
//    echo $timestamp . "<br>";
//    $ip = $hostInfo->address['addr'];
//    echo $ip . "<br>";
////
////    if ($hostInfo = $id) {
////        echo $timestamp . "<br>";
////        echo $ip . "<br>";
////    }
////    else {
////        echo "Nothing found!";
////    }
//
//
//
//    foreach ($hostInfo->ports->port as $portid) {
////        echo $portid['portid'] . " " . $portid->state['state'] . " " . $portid->service['name'] . "<br>";
//        $timestamp = $hostInfo['startstr'];
//        $ip = $hostInfo->address['addr'];
//        $port = $portid['portid'];
//        $state = $portid->state['state'];
//        $service = $portid->service['name'];
//        echo "Port Number: " . $port . " State: " . $state . " Service: " . $service . "<br>";
//
//    }
//    echo "<br><br>";
//
//
//}
?>



</body>

<footer>
    <?php

    include_once ("footer.php");

    ?>
</footer>
