<!DOCTYPE html>
<html lang = "en">

<head>
    <title>Port List</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="../css/dashboardNavbar.css" type="text/css">


</head>
<body class="portList">
<header>
    <?php include 'header.php' ?>
</header>
<nav>
    <div class=""wrapper">
    <?php include 'navbar.php';?>

    </div
    <td><a href='tempLandingPage.php'>Back</a></td>
</nav>
<?php
//$xmlData = simplexml_load_file("C:\Users\sarge\source\servicesFile.xml");
$xmlData = simplexml_load_file("C:\Users\sarge\source\servicesFile.xml");
//$xmlData = simplexml_load_string("C:\Users\sarge\source\servicesFile.xml");
//$xmlData = simplexml_load_string($xmlData);

//foreach ($xmlData->children() as $data){
//    echo "Shut Up: ",$data . "<br>";
//}

//foreach ($xmlData->host->address->addr as $addr){
//    echo "$addr";
//}

$xml = file_get_contents("C:\Users\sarge\source\servicesFile.xml");

//$xsl_doc = new DOMDocument();
//$xsl_doc->load("file.xsl");
//
//$proc = new XSLTProcessor();
//$proc->importStylesheet($xsl_doc);
//$newdom= $proc->transformToDoc($xsl_doc);
//
//print $newdom->saveXML();

$doc = new DOMDocument();
$doc->loadXML($xml);
$x = new DOMXPath($doc);
$host = $doc->getElementsByTagName("hostname");
$port = $doc->getElementsByTagName("port");
$xml="";
$name="";
$nameOutput = "";
foreach ($host as $host){

    $name = $host->getAttribute("name");
    echo "$name<br>";



}
foreach ($port as $port){

    $ports = $port->getAttribute("portid");
    echo "$ports<br>";

    foreach ($port as $port) {
        $ports = $port->getAttribute("portid");
        echo "$ports<br>";
    }

}

//var_dump(htmlentities($xml));
//var_dump(htmlentities($name));
//var_dump(htmlentities($nameOutput));





?>

<!--<p id="demo"></p>-->
<!---->
<!--<script>-->
<!--    const host = document.getElementsByTagName("host");-->
<!--    -->
<!--</script>-->

</body>

<footer>
    <?php

    include_once ("footer.php");

    ?>
</footer>
