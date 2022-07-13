<?php
session_start();
// connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'mysql';
$DATABASE_NAME = 'securitydashboard';
// Establish connection with above info.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
echo "connected";
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ($con === false) {

    die("Connection Error." . mysqli_connect_error());

}
if (isset($_POST["btnLogin"]))
{

    $sql = 'CALL ValidateEmail(?)';
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $_POST["email"]);
    if (!$stmt->execute())
    {
        echo "ERROR: " . $stmt->error;
    }
    else
    {
        $result = $stmt->get_result();
        if($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                if (password_verify(trim($_POST["password"]), $row["password"]))
                {
                    session_regenerate_id();
                    $_SESSION["email"] = htmlspecialchars($_POST["email"]);
                    $_SESSION["type"] = $row["userType"];
                    $_SESSION["id"] = $row["id"];

                    switch ($_SESSION["userType"])
                    {
                        case "main":
                            header('Location: landingPage.php');
                            break;
                        case "other":
                            header('Location: landingPageOther.php');
                            break;
                        //default for users being mis-authenticated
                        default:
                            header('Location: logoff.php');
                            break;

                    }
                }
                else
                {
                    // | Incorrect username or password
                    header('Location: index.php?err=' . base64_encode("incorrect-details"));
                    die();
                }
            }
        }
        else
        {
            // | Incorrect username or password
            header('Location: index.php?err=' . base64_encode("wrong!"));
            die();
        }
    }
    $stmt->close();
}
echo "???";


