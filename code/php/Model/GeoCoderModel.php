<?php
include 'GeoCoderClass.php';
include("AddressClass.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$address_data = "Bothwell Avenue, Pittsburgh, PA 15214, USA";
$GeoCoder = new GeoCoderClass();
$GeoCoder->BuildAddress($address_data);
$address = new AddressClass();
$address->setCurrent_address($address_data);
$address->setLat($GeoCoder->getLat());
$address->setLng($GeoCoder->getLng());
$address->setGeocode_source("GEOCODER");
$result = $address->insert();
print "Result " . $result . "<BR>";

