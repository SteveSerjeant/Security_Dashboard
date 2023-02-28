<?php

session_start();

require_once "dbconn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //username validation

    if (!empty(trim($_POST["username"]))){

        $sql = "SELECT * FROM users WHERE username = ?";

        if ($stmt = mysqli_stmt_prepare($conn, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $username);
            $username = trim($_POST["username"]);

            if (mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_store_result($stmt) == 1){
                    echo "Username already exists!";
                }
                else {
                    $username = trim($_POST["username"]);
                }

            }
            else {
                echo "Error, please try again.";
            }

            mysqli_stmt_close($stmt);



        }

    }
}
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Security Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    stylesheet for the username and password icons-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <!--bootstrap css or alerts-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">

</head>
<body>
<?php

$error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
if ($error == "exists") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Username already exists!</div>";}

$error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
if ($error == "length") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Password must be at least 10 characters.</div>";}

$error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
if ($error == "lengthTwo") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Confirm Password must be at least 10 characters.</div>";}

$error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
if ($error == "match") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Password and Confirm Password do not match, please try again.</div>";}

?>


<div class="login">
    <h1>Register</h1>
    <form action="saveUser.php" method="post">

        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="username" placeholder="Username" id="username" required>

        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" required>

        <label for="confirmPassword">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="confirmPassword" placeholder="Confirm Password" id="confirmPassword" required>


        <input type="submit" name="btnLogin" value="Submit">

        <p>Already registered? <a href="index.php">Sign In</a>.</p>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script src="../javascript/for-alerts.js"></script>

</body>

</html>
