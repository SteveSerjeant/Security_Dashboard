<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<?php
include_once ("dbconn.php");
?>
<head>
    <title>Landing Page (Temp)</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
<!--    <link rel="stylesheet" href="../css/popup.css" type="text/css">-->
    <link rel="stylesheet" href="../css/dashboardNavbar.css" type="text/css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>
<body>
<header>
<?php include 'header.php' ?>
</header>
<nav>
    <div class=""wrapper">
    <?php include 'navbar.php'?>

    </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="addNotesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="save" action="saveNotes.php">
                <div class="modal-header">
                    <h3 class="modal-title">Save Notes</h3>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Notes</label>
                            <input type="text" name="notes" class="form-control" required="required"/>
                        </div>

                    </div>
                </div>
                <div style="clear: both"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnClose" data-bs-dismiss="modal">Close</button>
                    <button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>

                </div>
            </form>


        </div>
    </div>
</div>
</div>


<article>

    <section>

        <div class = "wrapper3">
            <div class="container-fluid">

                <div class = "row3">
                    <table class = "outputTable" id="output" style="width: 80%; height: 20%; text-align: center">
                        <colgroup>
                            <col span="1" style="width: 10%">
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
                            <th style='text-align: center'>MAC Address</th>
                            <th style='text-align: center'>When Added </th>
                            <th style='text-align: center'>Notes</th>
                            <th style='text-align: center'>Add Notes</th>
                            <th style='text-align: center'>Port List</th>
                            <!--                            <th style='text-align: center'>Notes</th>-->
                        </tr>


                        <?php

                        $sql = 'CALL getDevices()';
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();


                        while ($row = $result->fetch_assoc()) {
                            echo "<tr style='text-align: center' >";
                            echo "<td style='text-align: center'>" . $row['hostName'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['ipAddress'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['macAddress'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['scanTimestamp'] . "</td>";
                            echo "<td style='text-align: left'>" . $row['notes'] . "</td>";
                            echo "<td><button type='button' data-bs-toggle='modal' data-bs-target='#addNotesModal' data-id='$row[ipAddress]' >Add Notes</button></td>";
                            echo "<td><a href='portList.php?id=$row[ipAddress]'>Port List</a>";
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




</script>
</body>
</html>
