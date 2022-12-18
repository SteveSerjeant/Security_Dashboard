<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pop-Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/popup.css" type="text/css">
    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="../css/dashboardNavbar.css" type="text/css">
</head>
<body>
<header>
    <?php include 'header.php' ?>
</header>
<?php
$notes = $_POST['note'];
echo "$notes";
?>
<button onclick="togglePopup()" class="first-button">Sign In</button>

<div class="popup" id="popup1">
    <div class="content">
        <div class="close-btn" onclick="togglePopup()">×</div>
        <h1>Sign In</h1>
        <div class="input-field"><input placeholder="Email" class="validate"></div>
        <div class="input-field"><input placeholder="Password" class="validate"></div>
        <button class="second-button">Sign in</button>
        <p>Don't have an account? <a href="/signup.html">Sign Up</a></p>
    </div>

</div>
</body>

<script>
    function togglePopup() {
        document.getElementById("popup1").classList.toggle("active");
    }

</script>

<?php
