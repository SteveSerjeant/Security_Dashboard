<?php

$fileOS = simplexml_load_file("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultOS.xml");

$timestampOS = $fileOS['startstr'];

foreach ($fileOS as $hostOS){
    $ipOS = $hostOS->address['addr'];
    echo $ipOS . "<br>";
    echo $timestampOS . "<br>";
    $os = $hostOS->os->osmatch['name'];
    echo $os . "<br><br>";
}
