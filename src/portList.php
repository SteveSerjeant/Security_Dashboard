<!DOCTYPE html>
<html lang = "en">

<head>
    <title>Port List</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="../css/dashboardNavbar.css" type="text/css">


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

foreach ($file->host as $hostInfo){
    $timestamp = $file['startstr'];
//    echo $timestamp . "<br>";
    $ip = $hostInfo->address['addr'];
    echo $ip . "<br>";

    if ($file->address['addr'] = $id) {
//        echo "IP: " . $id . "<br>";
        $name = $hostInfo->hostname['name'];
        echo $name;
    }
                foreach ($hostInfo->ports->port as $portid) {
//        echo $portid['portid'] . " " . $portid->state['state'] . " " . $portid->service['name'] . "<br>";
        $timestamp = $file['startstr'];
        $ip = $file->address['addr'];
        $port = $portid['portid'];
        $state = $portid->state['state'];
        $service = $portid->service['name'];

        echo "Port Number: " . $port . " State: " . $state . " Service: " . $service . "<br>";

    }
                echo"<br>";

}

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
