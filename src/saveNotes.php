<?php

include_once ("dbconn.php");

$toSave = $_POST['toSave'];
echo $toSave."<br>";

if (isset($_POST['submit'])) {

    echo "Save was pressed!"."<br>";
//    $ip =- $conn->real_escape_string($_POST['id']);
    $ip = $conn->real_escape_string($_POST['id']);

    echo $ip;

//    $stmt = 'CALL saveNotes(?,?)';
//    $stmt = $conn->prepare($forSave);
//    $stmt->bind_param("s,s", $ip, $forSave);


    $stmt = $conn->prepare("CALL saveNotes(?,?)");
    $stmt->bind_param('ss', $ip, $toSave);

    if (!$stmt->execute())
    {
        echo "ERROR: " . $stmt->error;
    }

    else
    {
        $stmt->close();
        mysqli_close($conn);
        header('Location: tempLandingPage.php');
    }
}
//$id = $_GET['id'];



