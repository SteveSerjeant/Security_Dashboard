<?php
session_start();

?>
<!DOCTYPE html>
<html lang = "en" xmlns="http://www.w3.org/1999/html">

<head>
    <title>Performing Scan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="../css/forNavbar.css" type="text/css">

    <!--    /*for alert messages*/-->
    <link rel="stylesheet" href="../css/forAlerts.css" type="text/css">


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

        $forDelete = "C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultDevices.xml";
        $forDelete1 = "C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultOS.xml";



        unlink ($forDelete);
        unlink ($forDelete1);

        $sql = ('UPDATE Marker SET marker = 0 WHERE ID=1');
        $stmt = $conn->prepare($sql);
        $stmt->prepare($sql);
        $stmt->execute();


//        perform scan
//        exec('c:\WINDOWS\system32\cmd.exe /B /c START C:\Users\sarge\source\vulnersScan.bat');
        exec('C:\Users\sarge\source\scanFeb.bat');

        echo '<script>alert("Scan Finished")</script>script>';



                function filesExist (){
              }
            if (strpos(file_get_contents("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultOS.xml"),"</nmaprun>")){
                header('Location: saveScans.php');
            }
            else {
                sleep(60);
                filesExist();

            }
                

                filesExist();







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
