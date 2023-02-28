<?php
session_start();

include "dbconn.php";

if (!isset($_POST['username'], $_POST['password'], $_POST['confirmPassword']) ){

    exit('Please fill out all required fields!');
}
    if ($stmt = $conn->prepare('SELECT id, password FROM users WHERE username = ?')){

        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();

        $stmt->store_result();

        if ($stmt->num_rows > 0){
            $stmt->close();
            header('Location: register.php?err=' .base64_encode("exists"));

        }

        else {
            $username = trim($_POST["username"]);
//            $password = trim($_POST["password"]);
//            $confirmPassword = trim($_POST["confirmPassword"]);
//            echo "Password = " . $password . "<br>";
//            echo "Confirm Password = " . $confirmPassword . "<br>";

            //password and check passwords
            if (strlen(trim($_POST["password"])) < 10){
                header('Location: register.php?err=' .base64_encode("length"));
            }
            else {
                $password = trim($_POST["password"]);
//                echo "Password = " . $password . "<br>";

            }

            if (strlen(trim($_POST["confirmPassword"])) < 10){
                header('Location: register.php?err=' .base64_encode("lengthTwo"));
            }
            else {
                $confirmPassword = trim($_POST["confirmPassword"]);
                if ($password != $confirmPassword) {
                    header('Location: register.php?err=' . base64_encode("match"));

                } else {
                    echo "Password = " . $password . "<br>";
                    echo "Confirm Password = " . $confirmPassword . "<br>";
                }

                    $sql = "INSERT INTO users(username, password) VALUES (?,?)";
                    var_dump($sql);
                    if ($stmt1 = mysqli_prepare($conn, $sql)) {


                        mysqli_stmt_bind_param($stmt1, "ss", $username, $password);
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        echo $password;

                        if (mysqli_stmt_execute($stmt1)) {
                            header('Location: index.php?err=' . base64_encode("saved"));

                        } else {
                            echo "Error, Please Try Again.";
                        }
                    }


            }

            }

}
mysqli_close($conn);





?>

