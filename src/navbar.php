<!DOCTYPE html>



<head>

</head>

<header>
    <div id="top-header">

        <div id="logo">
            <img src="../img/logo2.png" />
        </div>
<!--                    <img id="logo" src="../img/logo2.png" />-->

        <nav >
            <div id="menu">
                <ul>
                    <li><a href="performScan.php" style="background-color: red">Scan</a> </li>
                    <li><a href="" title="Hover over column headers below for further info">Hover</a> </li>
                    <li><a href="showOS.php">OS</a></li>
                    <!-- Trigger/Open The Modal -->
                    <button id="myBtn">Hover Info</button>
                    <li><a href="homePage.php">Home</a> </li>
                    <li><a href="">Profile</a></li>
                    <li><a href="">Settings</a></li>
                    <li><a href="logoff.php">Log Out</a></li>

                </ul>

            </div>

        </nav>
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Some text in the Modal..</p>
        </div>
    </div>
    

</header>

<body>



<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>








