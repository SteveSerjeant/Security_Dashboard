<!DOCTYPE html>
<html lang = "en">
<?php
//$text = file_get_contents("c:\Users\sarge\source\xxxx.txt");
//$regexIP = '/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/';
//
//preg_match_all($regexIP, $text, $match);

include_once ("dbconn.php");

$text = file_get_contents("C:\Users\sarge\source\xxxx.txt");
//echo $text;
//echo '<br><br>';

//if ($scan = fopen("C:\Users\sarge\source\xxxx.txt", "r")){
//    while (!feof($scan)){
//        $scanLine = fgets($scan);
//        echo $scanLine, "<br>";
//    }
//
//}

//if ($file = fopen("C:\Users\sarge\source\xxxx.txt", "r")){
//    while (!feof($file)){
//        $line = fgets($file);
////        echo $line, "<br>";
//        if (stristr($line, 'Nmap scan report')) {
//            $output = str_replace('Nmap scan report for', '', $line);
//            $output = str_replace('(', '', $output);
//            $output = str_replace(')', '', $output);
//            echo $output, "<br>";
//
//
//
//        }
//
//
//    }
//
//    fclose($file);
//}
$result = mysqli_query($conn, "SELECT * FROM ipAddresses");


?>
<head>
    <title>Landing Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
        <link rel="stylesheet" href="../css/dashboardNavbar.css" type="text/css">


</head>
<body>
<!--<br>-->
<!--<h1 class="h1" style="text-align: center">This is the start of the project</h1>-->
<!--<br>-->
<!--<h2 class="h1" style="text-align: center">COMP3000 2121/2022</h2>-->
<!--<br>-->
<!--<h3 class="h1" style="text-align: center">Security Dashboard for Main User</h3>-->
<!--<br>-->
<!--<h3 class="h1" style="text-align: center">Landing Page</h3>-->

<!--<nav class="navbar navbar-dark bg-dark">-->
<!--    <a class="navbar-brand" href="#">Security Dashboard<button type="button" id="sidebarCollapse" class="btn">Menu</button></span></a>-->
<!--</nav>-->
<div   class="wrapper">
    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md panel header-panel">
                Home Network Security Dashboard
            </div>
        </div>

        <div class="row">
            <div class="col-md panel main-panel">
                <div  class="heading">
                    <h1 class="h1" style="text-align: center">This is the start of the project</h1>
                    <br>
                    <h2 class="h1" style="text-align: center">COMP3000 2121/2022</h2>
                    <br>
                    <h3 class="h1" style="text-align: center">Security Dashboard for Main User</h3>
                    <br>
                    <h3 class="h1" style="text-align: center">Landing Page</h3>

                </div>
                <hr>

            </div>
        </div>
        <div class = "wrapper">
            <div class="container-fluid">

                <div class = "row">
                    <table id="output" style="width: 100%; height: 20%; text-align: center">
                        <colgroup>
                            <col span="1" style="width: 10%">
                            <col span="1" style="width: 10%">
                            <col span="1" style="width: 10%">
                            <col span="1" style="width: 35%">
                            <col span="1" style="width: 35%">
                        </colgroup>

                        <tr bgcolor="#afeeee" style="text-align: center">
                            <th style='text-align: center'>IP Address</th>
                            <th style='text-align: center'>Description</th>
                            <th style='text-align: center'>When Added</th>
                            <th style='text-align: center'>My Name</th>
                            <th style='text-align: center'>Notes</th>
                        </tr>
                        <?php
                        while($res = mysqli_fetch_array($result)) {
                            echo "<tr style='text-align: center' >";
                            echo "<td style='text-align: center'>".$res['address']."</td>";
                            echo "<td style='text-align: center'>".$res['description']."</td>";
                            echo "<td style='text-align: center'>".$res['added']."</td>";
                            echo "<td style='text-align: left'>".$res['ownName']."</td>";
                            echo "<td style='text-align: left'>".$res['notes']."</td>";
                            echo "</tr>";



                        }

                        ?>
                    </table>
                </div>
            </div>
        </div>
<!--        <div class="row">-->
<!--            <pre>-->
<!--            --><?php //print_r($match); ?>
<!--            </pre>-->
<!--        </div>-->
    </div>

</div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>-->
<!--<script src="../js/index-scripts.js"></script>-->
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>-->
<!---->
<!--<script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!--        $('#sidebarCollapse').on('click', function () {-->
<!--            $('#sidebar').toggleClass('active');-->
<!--        });-->
<!--    });-->
<!--</script>-->





</body>

</html>
