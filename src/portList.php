<!DOCTYPE html>
<html lang = "en" xmlns="http://www.w3.org/1999/html">

<head>
    <title>Port List</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="../css/forNavbar.css" type="text/css">

    <!--    /*for alert messages*/-->
    <link rel="stylesheet" href="../css/forAlerts.css" type="text/css">

    <!--bootstrap css or alerts-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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
                <table class = "outputTable" id="output" style="width: 50%; height: 20%; text-align: center">
                    <colgroup>
                        <col span="1" style="width: 5%">
                        <col span="1" style="width: 5%">
                        <col span="1" style="width: 5%">
                        <col span="1" style="width: 5%">
                    </colgroup>

                    <tr bgcolor="#afeeee" style="text-align: center">
                        <th style='text-align: center'>Port ID</th>
                        <th style='text-align: center'>State</th>
                        <th style='text-align: center'>Service</th>
                        <th style='text-align: center'>Further Info</th>
                    </tr>


                    <?php

                    $id = $_GET['id'];

                    $stmt = $conn->prepare("CALL getPortInfo(?)");
                    $stmt->bind_param('s' ,$id);

                    if (!$stmt->execute()){

                        echo "ERROR: " . $stmt->error;
                    }

                    else {
                        $result = $stmt->get_result();

                        while ($row = $result->fetch_assoc()){
                            echo "<tr style='text-align: center' >";
                            echo "<td style='text-align: center' >" . $row['portID'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['state'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['serviceName'] . "</td>";
                            echo "<td><a href='moreInfo.php?id=$row[ipAddress]'>Further Info</a>";
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

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
