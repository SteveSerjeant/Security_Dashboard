<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Notes</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!--    <link rel="stylesheet" href="../css/popup.css" type="text/css">-->
    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="../css/forNavbar.css" type="text/css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style type="text/css">
        .wrapper {
            width: 300px;
            margin: 0 auto;
            background-color: red;
        }
        #noteTitle {
            text-align: center;
        }
    </style>

</head>
<body>
<header>
    <?php include 'header.php' ?>
</header>

<nav>
    <div class=""wrapper">
    <?php include 'navbar.php'?>

    </div>
</nav>
<?php

$ip = $_GET['id'];

?>

<div class="wrapper">
    <div class="container-fluid" style="background-color: green; margin-top: 30px">

            <div class="row">
                <div class="col-md-12">
                    <h2 id="noteTitle">Add Notes</h2>
                </div>
                <form action="saveNotes.php" method="post">
                    <div class="form-group">
                        <label>Enter Notes</label>
                        <input type="text" name="toSave" id="toSave" class="form-control">
                    </div>
                    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                    <input type="submit" class="btn btn-primary" name="submit" value="Save">

                </form>

            </div>

    </div>
</div>


</body>
<footer>
    <?php
    include_once ("footer.php");
    ?>
</footer>



<?php
