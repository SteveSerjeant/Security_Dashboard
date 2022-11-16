<!DOCTYPE html>
<html lang="en">

<?php

include_once ("dbconn.php");

$text = file_get_contents("C:\Users\sarge\source\xxxx.txt");

//$result = mysqli_query($conn, "SELECT * FROM ipAddresses");


?>
<head>
    <title>Landing Page (Temp)</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="../css/dashboardNavbar.css" type="text/css">
</head>
<body>
<header>
<?php include 'header.php' ?>
</header>
<nav>
    <div class=""wrapper">
    <?php include 'navbar.php';?>

    </div>

</nav>
<article>

<!--    <section>-->
<!--        <div class = "wrapper2">-->
<!--            <div class="container-fluid">-->
<!---->
<!--                <div class = "row">-->
<!--                    <table id="output" style="width: 80%; height: 20%; text-align: center">-->
<!--                        <colgroup>-->
<!--                            <col span="1" style="width: 10%">-->
<!--                            <col span="1" style="width: 10%">-->
<!--                            <col span="1" style="width: 70%">-->
<!--                            <col span="1" style="width: 10%">-->
                            <!--                            <col span="1" style="width: 35%">-->
<!--                        </colgroup>-->
<!---->
<!--                        <tr bgcolor="#afeeee" style="text-align: center">-->
<!--                            <th style='text-align: center'>IP Address</th>-->
<!--                            <th style='text-align: center'>Host Name</th>-->
<!--                            <th style='text-align: center'>Ports</th>-->
<!--                            <th style='text-align: center'>Timestamp</th>-->
                            <!--                            <th style='text-align: center'>Notes</th>-->
<!--                        </tr>-->
<!---->
<!---->
<!--                        --><?php
//
////                        $sql = 'CALL getData()';
//                        $sql = 'SELECT * from log';
//                        $stmt = $conn->prepare($sql);
//                        $stmt->execute();
//                        $result = $stmt->get_result();
//
//
//                        while ($row = $result->fetch_assoc()) {
//                            echo "<tr style='text-align: center' >";
//                            echo "<td style='text-align: center'>" . $row['ip'] . "</td>";
//                            echo "<td style='text-align: center'>" . $row['hostname'] . "</td>";
//                            echo "<td style='text-align: left'>" . $row['ports'] . "</td>";
//                            echo "<td style='text-align: center'>" . $row['timestamp'] . "</td>";
//                            echo "</tr>";
//                        }
//                        $stmt->close()
//                        ?>
<!---->
<!---->
<!--                    </table>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
    <section>
        <div class = "wrapper3">
            <div class="container-fluid">

                <div class = "row3">
                    <table class = "outputTable" id="output" style="width: 80%; height: 20%; text-align: center">
                        <colgroup>
                            <col span="1" style="width: 10%">
                            <col span="1" style="width: 10%">
                            <col span="1" style="width: 10%">
                            <col span="1" style="width: 20%">
                            <col span="1" style="width: 5%">
                            <col span="1" style="width: 5%">
                            <!--                            <col span="1" style="width: 35%">-->
                        </colgroup>

                        <tr bgcolor="#afeeee" style="text-align: center">
                            <th style='text-align: center'>Host Name</th>
                            <th style='text-align: center'>IP Address</th>
                            <th style='text-align: center'>When Added </th>
                            <th style='text-align: center'>Notes</th>
                            <th style='text-align: center'>Add Notes</th>
                            <th style='text-align: center'>Port List</th>
                            <!--                            <th style='text-align: center'>Notes</th>-->
                        </tr>


                        <?php

                        $sql = 'CALL getData()';
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();


                        while ($row = $result->fetch_assoc()) {
                            echo "<tr style='text-align: center' >";
                            echo "<td style='text-align: center'>" . $row['description'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['address'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['added'] . "</td>";
                            echo "<td style='text-align: left'>" . $row['ownName'] . "</td>";
//                            echo "<td><input type='button' name='notes'></td> ";
                            echo "<td><button type='submit' id='btnSubmit'>Add Notes</button></td>";
//                            echo "<td><form action='portList.php'><input type='button' name='button'></form></td> ";
                            echo "<td><a href='portList.php'>Port List</a></td> ";
                            echo "</tr>";
                        }
                        $stmt->close()
                        ?>


                    </table>
                </div>
            </div>
        </div>
    </section>
    <section>…</section>
</article>
<aside>…</aside>
<footer>
    <?php

    include_once ("footer.php");

    ?>
</footer>
<script>
    document.getElementById("btnSubmit").addEventListener("click", myFunction);
    function myFunction(){
        window.location.href="portList.php";
    }

    }
</script>
</body>
</html>
