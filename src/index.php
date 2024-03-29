<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Security Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    stylesheet for the username and password icons-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

<!--bootstrap css or alerts-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
<!--    /*for alert messages*/-->
    <link rel="stylesheet" href="../css/forAlerts.css" type="text/css">


</head>
<body>
<?php
$error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
if ($error == "wrong") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Incorrect Login Credentials</div>";}

$error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
if ($error == "wrong??") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Wrong</div>";}

$error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
if ($error == "wrong1") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Wrong Password</div>";}

$error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
if ($error == "wrong2") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Wrong Username/div>";}


include "functions.php";
?>
<br>

<div class="login">
    <h1>Dashboard Login</h1>
    <form action="authenticate.php" method="post">
        <label for="email">
            <i class="fas fa-user"></i>
        </label>
<!--        need to change this to email without changing the size of the box!-->
        <input type="text" name="email" placeholder="Email" id="email" required>
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <input type="submit" name="btnLogin" value="Submit">
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script src="../javascript/for-alerts.js"></script>

</body>

</html>


