<!DOCTYPE html>
<html lang = "en">

<head>
    <title>Port List</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="../css/forNavbar.css" type="text/css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body class="portlist">
<header>
    <?php include 'header.php' ?>
</header>
<nav>
    <div class=""wrapper">
    <?php include 'navbar.php';?>

    </div



</nav>
<?php

$id = $_GET['id'];
//echo "IP Address: " . $id . "<br><br>";

$file= simplexml_load_file("C:\Users\sarge\source\scanResultsJanuary.xml");

//echo "IP Address: " . $id . "<br><br>";

//$ip = $file->host->addr[$id];
//echo $ip;

foreach ($file->host as $host)
{


    $addr = (string) ($host->address['addr']);

    if ($id == $addr) {
        echo "<br><br>IP Address: " . $addr."<br><br>";

        foreach ($host->ports->port as $portid)
        {

            $port = $portid['portid'];
            $protocol = $portid['protocol'];
//            $state = $host->ports->port->state['state']; // shows just 1st state
            $state = $portid->state['state'];
            $service = $portid->service['name'];
//            echo "PortID: ".$port." State: ".$state." Service: ".$service."<br>";
            echo "PortID: ".$port." State: ".$state." Service: ".$service."<br>";


        }

    }

    else{
//        echo " Wrong IP: ".$addr."<br>";
        echo "";
    }
}


?>



</body>

<footer>
    <?php

    include_once ("footer.php");

    ?>
</footer>
