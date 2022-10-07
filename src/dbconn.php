<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'mysql';
$DATABASE_NAME = 'securitydashboard';

$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ($conn === false){

    die ("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
