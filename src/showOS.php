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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">


    <!--bootstrap css or alerts-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">-->


    <!-- CSS only -->

<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">-->
<!---->

    <!-- JavaScript Bundle with Popper -->

<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>-->
<!---->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->

</head>
<body>
<header>
    <?php
    include 'header.php';
    include ("dbconn.php");

    ?>
</header>
<nav>
    <div class=""wrapper">
    <?php include 'navbar.php';?>

    </div

</nav>

<article>

    <section>

        <div class = "wrapper3">
            <div class="container-fluid">

                <div class = "row3">

                    <table class = "outputTable" id="output" style="width: 60%; height: 20%; text-align: center">
                        <colgroup>
                            <col span="1" style="width: 5%">
                            <col span="1" style="width: 5%">
                            <col span="1" style="width: 10%">
                            <col span="1" style="width: 5%">
                            <col span="1" style="width: 5%">
                        </colgroup>



                        <tr bgcolor="#afeeee" style="text-align: center">
                            <th style='text-align: center'>IP Address</th>
                            <th style='text-align: center'>Scan Date</th>
                            <th style='text-align: center'>Operating System (OS)</th>
                            <th style='text-align: center'>% Accuracy</th>
                            <th style='text-align: center'>More Info</th>
                        </tr>


                        <?php



                        $sql = 'CALL getOSInfo';

                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();


                        while ($row = $result->fetch_assoc()) {
                            echo "<tr style='text-align: center' >";
                            echo "<td style='text-align: center' >" . $row['ipAddress'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['scanTimestamp'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['osType'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['accuracy'] . "</td>";
                            echo "<td><a href='moreInfo.php?id=$row[ipAddress]'>More Info</a>";
                            echo "</tr>";
                        }
                        $stmt->close();
                        mysqli_close($conn);


                        ?>

                    </table>

                </div>

            </div>
        </div>

<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<!--        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>-->

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="../javascript/for-alerts.js"></script>
    </section>

</article>
<aside>…</aside>



</body>

<footer>
    <?php

    include_once ("footer.php");

    ?>
</footer>

