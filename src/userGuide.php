<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <title>User Guide</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/userGuide.css" type="text/css">
    <link rel="stylesheet" href="../css/forNavbar.css" type="text/css">

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

<h1 class="title">This is the User Guide</h1>

</body>

<footer>
    <?php
    include_once ("footer.php");
    ?>
</footer>

</html>


