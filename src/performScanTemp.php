
<!DOCTYPE html>
<html lang = "en" xmlns="http://www.w3.org/1999/html">

<head>
    <title>OS List</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="../css/forNavbar.css" type="text/css">

    <!--    /*for alert messages*/-->
    <link rel="stylesheet" href="../css/forAlerts.css" type="text/css">

    <!-- Bootstrap CSS -->
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>
<header>
    <?php
    include 'header.php';
    include ("dbconn.php");

    ?>
</header>
<nav>
    <div>
    <?php include 'navbar.php';?>

    </div

</nav>

<article>

    <section>
<h1 class="performScan">
    <p class="scanText">
        Performing Scan <br>
        Please Wait
    </p>
    <p>
        This may take a while..
    <div class="container">
        <div class="spinner-border"></div>
    </div>
    </p>
</h1>
        <?php
        //load xml file
//        $file = simplexml_load_file("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultDevices.xml");
        $fileOS = simplexml_load_file("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultOS.xml");

//        $timestamp = $file['startstr'];
        //echo "Devices: " . $timestamp . "<br>";

        $timestampOS = $fileOS['startstr'];
        //echo "OS: " . $timestampOS . "<br>";

//        $stmt = $conn->prepare("CALL insertTimestamp(?)");
//        $stmt->bind_param('s', $timestamp);
//        $stmt->execute();
//        $stmt->close();

        $stmt1 = $conn->prepare("CALL insertTimestampOS(?)");
        $stmt1->bind_param('s', $timestampOS);
        $stmt1->execute();
        $stmt1->close();

        foreach ($fileOS->host as $hostOS){
            $ipOS = $hostOS->address['addr'];
//    echo $ipOS . "<br>";
            echo $timestampOS . "<br>";
            $osType = $hostOS->os->osmatch['name'] ? : $os = "Not Found";
//    echo $osType . "<br>";
            $acc = $os = $hostOS->os->osmatch['accuracy'] ? : $acc = "Not Found";
//    echo $acc . "<br><br>";

            $stmt4 = $conn->prepare("CALL insertOSLog(?,?,?,?)");
            $stmt4->bind_param('sssi', $ipOS, $timestampOS, $osType, $acc);
            $stmt4->execute();

            $stmt5 = $conn->prepare("CALL insertOS(?,?,?,?)");
            $stmt5->bind_param('sssi', $ipOS, $timestampOS, $osType, $acc);
            $stmt5->execute();



        }

        $stmt4->close();
        $stmt5->close();





        $conn->close();


        ?>





    </section>

</article>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

<footer>
    <?php

    include_once ("footer.php");

    ?>
</footer>
