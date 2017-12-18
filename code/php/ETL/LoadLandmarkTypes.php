
<!DOCTYPE html>
<html>
    <head>
        <title>UnlandMark Location Data</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="icon" href="images/favicon.ico">

    </head>
</html>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../Model/LandmarkTypeClass.php';


global $landmarktype;
$landmarktype = new LandmarkTypeClass();

$filename = "../../Data/LandmarkCountyTypes.csv";
parseFile($filename);

function parseFile($filename) {

    $fp = fopen($filename, "r") or exit("Unable to open file!");

    while (!feof($fp)) {
        $pieces = fgetcsv($fp);
        display($pieces);
    }
    fclose($fp);
}

function display($pieces) {

    buildPlacesType($pieces);
}

function buildPlacesType($pieces) {
    global $landmarktype;
    $landmarktype->setLandmark_type_description($pieces[0]);
    $landmarktype->insert();
}
