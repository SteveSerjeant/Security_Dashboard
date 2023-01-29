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
    <?php
    include 'header.php';
    include_once ("dbconn.php");

    ?>
</header>
<nav>
    <div class=""wrapper">
    <?php include 'navbar.php';?>

    </div



</nav>
<?php

$id = $_GET['id'];
echo "IP Address: " . $id . "<br><br>";

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
    }
    $stmt->close();
    mysqli_close($conn);
    echo "Display data";
}


?>



</body>

<footer>
    <?php

    include_once ("footer.php");

    ?>
</footer>
