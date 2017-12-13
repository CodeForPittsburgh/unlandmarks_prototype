<?php

include("PlacesClass.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$places = new PlacesClass();

$places->setLandmark_name("Grain Silos");
$places->setNickname("Silos");
$places->setAddress_id(1);
$places->setOriginal_use_type_id(1);
$places->setOriginal_use("Stored Grain");
$places->setEnd_date("01/01/1987");
$places->setCurrent_use_type_id(1);
$places->setCurrent_use("Parking lot");
$places->setStories__id(1);
$places->setVerification_indicator("TRUE");

$result = $places->insert();
print "Result " . $result . "<BR>";
