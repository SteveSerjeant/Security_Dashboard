

<?php
session_start();

include "dbconn.php";

$id = $_SESSION['id'];

//echo $id;

//password and check passwords
if (strlen(trim($_POST["password"])) < 10){
    header('Location: profile.php?err=' .base64_encode("length"));
}
else {
    $password = trim($_POST["password"]);
//                echo "Password = " . $password . "<br>";

}

if (strlen(trim($_POST["confirmPassword"])) < 10){
    header('Location: profile.php?err=' .base64_encode("lengthTwo"));
}
else {
    $confirmPassword = trim($_POST["confirmPassword"]);
    if ($password != $confirmPassword) {
        header('Location: profile.php?err=' . base64_encode("match"));

    } else {


        $sql = "UPDATE users SET password = ? WHERE id = ?";
        echo "Stuck here!<br>";
//    var_dump($sql);
        if ($stmt10 = mysqli_prepare($conn, $sql)) {
            echo "Password = " . $password . "<br>";
            echo "Confirm Password = " . $confirmPassword . "<br>";
            echo "Now stuck here!<br>";

            mysqli_stmt_bind_param($stmt10, "si", $password, $id);

            $id = $_SESSION['id'];
            $password = password_hash($password, PASSWORD_DEFAULT);
//            echo $password."<br>";

//        echo $password;

            if (mysqli_stmt_execute($stmt10)) {
                header('Location: homePage.php?err=' . base64_encode("updated"));

            } else {
                echo "Error, Please Try Again.<br>";
                echo $id . "<br>";
            }
    }

        $stmt10->close();


    }


}

