<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<?php
include_once ("dbconn.php");

session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php?err=" . base64_encode("notlogged"));
    exit;

}

?>
<head>
    <title>Home Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="../css/forNavbar.css" type="text/css">

    <!--    stylesheet for the username and password icons-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <!--    /*for alert messages*/-->
    <link rel="stylesheet" href="../css/forAlerts.css" type="text/css">

    <!--     Bootstrap CSS-->
    <!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>
<body>
<header>
    <?php include 'header.php' ?>
</header>

<nav>
    <div class="wrapper3">
        <?php include 'navbar.php'?>

    </div>
</nav>

<div class = "wrapper3">
    <div class="container-fluid">

        <div class = "row3">
            <table class = "outputTable" id="output" style="width: 85%; height: 20%; text-align: center">
                <?php $id = $_GET['id'];?>

                <colgroup>
                    <col span="1" style="width: 10%">
                    <col span="1" style="width: 10%">
                    <col span="1" style="width: 10%">
                    <col span="1" style="width: 10%">

                </colgroup>

                <tr bgcolor="#afeeee" style="text-align: center">
                    <th style='text-align: center'>Host Name</th>
                    <th style='text-align: center'>IP Address</th>
                    <th style='text-align: center'>MAC Address</th>
                    <th style='text-align: center'>When Added </th>
<!--                    <th style='text-align: center'>Notes</th>-->
<!--                    <th style='text-align: center'>Add Notes</th>-->
<!--                    <th style='text-align: center'>Port List</th>-->
                </tr>


                <?php



                $stmt = $conn->prepare("CALL showScanDetails(?)");
                $stmt->bind_param('s', $id);

                if (!$stmt->execute()){

                    echo "ERROR: " . $stmt->error;
                }
                else {
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr style='text-align: center' >";
                        echo "<td style='text-align: center' >" . $row['hostName'] . "</td>";
                        echo "<td style='text-align: center'>" . $row['ipAddress'] . "</td>";
                        echo "<td style='text-align: center'>" . $row['macAddress'] . "</td>";
                        echo "<td style='text-align: center'>" . $row['scanTimestamp'] . "</td>";
//                        echo "<td style='text-align: left'>" . $row['notes'] . "</td>";
//                        echo "<td bgcolor='#6495ed' style='text-align: center'><a href='addNotes.php?id=$row[ipAddress]'><font color='white'>Add Notes</font> </a>";
//                        echo "<td><a href='portList.php?id=$row[ipAddress]'>Port List</a>";
                        echo "</tr>";
                    }

                }
                $stmt->close();
                mysqli_close($conn);
                ?>

            </table>

        </div>

    </div>
</div>
