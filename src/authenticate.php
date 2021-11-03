<?php
session_start();
// connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'mysql';
$DATABASE_NAME = 'securitydashboard';
// Establish connection with above info.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ($con === false) {

    die("Connection Error." . mysqli_connect_error());

}
// prepare our sql statement, will eventually change to stored procedure once working
//if (isset($_POST["Login"]))
//{
// $sql = 'SELECT id, password FROM users WHERE email = ?';
// $stmt = $con->prepare($sql);
// $stmt-> bind_param("s", $_POST["email"]);
// if(!$stmt->execute())
// {
//     echo "ERROR: " . $stmt->error;
// }
// else
// {
//     $result = $stmt->get_result();
//     if($result->num_rows > 0)
//     {
//         while ($row = $result->fetch_assoc())
//         {
//             if(password_verify(trim($_POST["password"]), $row["password"]))
//             {
//                 echo "AUTHENTICATED<br>ROLE: " . $row["UserType"];
//                 session_regenerate_id();
//                 $_SESSION["email"] = htmlspecialchars($_POST["email"]);
//                 $_SESSION["Type"] = $row["userType"];
//                 $_SESSION["userid"] = $row["id"];
//                 echo "Type";
//
//                 header('Location: landingPage.php');
//
//                 switch ($_SESSION["Type"])
//                {
//                    case "main":
//                        header('Location: landingPage.php');
//                        break;
//                    case "other":
//                         header('Location: landingPageOther.php');
//                         break;
//                    //default for users being mis-authenticated
//                    default:
//                        header('Location: logoff.php');
//                        break;
//
//                }
//
//             }
//             else {
//            // Incorrect password
//            echo 'Incorrect username and/or password!';
//            }
//
//         }
//
//         }
//
//     }
//
//}

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
    // Could not get the data that should have been sent.
    exit('Please fill both the username and password fields!');
}

// Prepare our SQL statement.
if ($stmt = $con->prepare('SELECT id, password, userType FROM users WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    // Store the result from prepared statement
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $userType);
        $stmt->fetch();
        if ($_POST['password'] === $password) {
            // Verification success! User has logged-in!
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
//            $userType = blank;
            $_SESSION['userType'] = $userType;


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

            }



        } else {
            // Incorrect password
            echo 'Go away!';
            // | Incorrect password
            header('Location: index.php?err=' . base64_encode("wrong"));
            die();
        }
    } else {
        // Incorrect username
        header('Location: index.php?err=' . base64_encode("wrong"));
        die();
    }


    $stmt->close();
}
?>
