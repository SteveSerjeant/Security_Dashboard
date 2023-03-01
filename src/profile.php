<?php

session_start();

//if (isset($_SESSION['loggedin'])) {
//
//
//    echo "Hello!";
//
//} else {
//    header("Location: index.php?err=" . base64_encode("notlogged"));
//    exit;
//
//
//}
//echo "Hello!";

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "dbconn.php";

?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Security Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    stylesheet for the username and password icons-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <!--bootstrap css or alerts-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="../css/forNavbar.css" type="text/css">

</head>
<header>
    <?php include 'header.php' ?>
</header>


<nav>
    <div class="wrapper3">
        <?php include 'navbar.php'?>

    </div>
</nav>

<body>
<?php

$error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
if ($error == "length") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Password must be at least 10 characters.</div>";}

$error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
if ($error == "lengthTwo") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Confirm Password must be at least 10 characters.</div>";}

$error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
if ($error == "match") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Password and Confirm Password do not match, please try again.</div>";}

?>


<div class="login">
    <h1>Change Password</h1>
    <form action="updatePassword.php" method="post">



        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" required>

        <label for="confirmPassword">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="confirmPassword" placeholder="Confirm Password" id="confirmPassword" required>


        <input type="submit" name="btnLogin" value="Submit">


    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script src="../javascript/for-alerts.js"></script>

</body>

<footer>
    <?php
    include_once ("footer.php");
    ?>
</footer>






