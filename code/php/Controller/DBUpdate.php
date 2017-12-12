<?php
include("../Model/AddressClass.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$x = "x";
header("Content-Type: application/json; charset=UTF-8");
$my_json = filter_input(INPUT_GET, $x);
 var_dump(json_decode($my_json, true));
 $address_model_data = json_decode($my_json, true);
 print $address_model_data["address"]. "\n";
 print $address_model_data["lat"] . "\n";
 print $address_model_data["lng"]. "\n";
//if (strlen($my_json) > 1) {
//    $filename = "../../Data/JsonTest.json";
//    $fp = fopen($filename, "w") or exit("Unable to open file!");
//    fwrite($fp, $my_json);
//    fclose($fp);
//    print "Done";
//} else {
//    print "Length ERROR";
//}
//
$address = new AddressClass();
//
$address->setcurrent_address($address_model_data["address"]);
$address->setlat($address_model_data["lat"]);
$address->setlng($address_model_data["lng"]);
$address->setgeocode_source("USER");
////$address->setlocation_latlng("0101000020E61000009D4B7155D90054C085ED27637C3C4440");
////$address->setlocation_latlng(ST_GeomFromText('POINT(-80.013265 40.472546)', 4326));
//
//
$result = $address->insert();
print "Result " . $result . "\n";