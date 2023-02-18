<?php
include ("dbconn.php");

//$forDelete = "C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultDevices.xml";
//$forDelete1 = "C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultOS.xml";
//
//
//
//unlink ($forDelete);
//unlink ($forDelete1);

//$sql = ('UPDATE Marker SET marker = 0 WHERE ID=1');
//$stmt = $conn->prepare($sql);
//$stmt->prepare($sql);
//$stmt->execute();


exec('c:\WINDOWS\system32\cmd.exe /B /c START C:\Users\sarge\source\scanFeb.bat');

$file = "C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultOS.xml";

function filesExist (){

    if (file_exists($file)){
    header('Location: saveScans.php');
    }
    else {
        echo "File Does Not Exists";
        sleep(60);
        filesExist();
    }
}

filesExist();


//
//sleep(1800);
//
//
//
//header('Location: homePage.php');

//echo "finished";
