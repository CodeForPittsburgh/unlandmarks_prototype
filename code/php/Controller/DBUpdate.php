<?php

include("../Model/AddressClass.php");
include("../Model/PlacesClass.php");
include("../Model/LandmarkTypeClass.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$x = "x";
header("Content-Type: application/json; charset=UTF-8");
$my_json = filter_input(INPUT_GET, $x);
var_dump(json_decode($my_json, true));
$model_data = json_decode($my_json, true);
print $model_data["address"] . "\n";
print $model_data["lat"] . "\n";
print $model_data["lng"] . "\n";
print $model_data["former_landmark_type"] . "\n";
print $model_data["original_description"] . "\n";
print $model_data["enddate"] . "\n";
print $model_data["current_landmark_type"] . "\n";
print $model_data["current_description"] . "\n";
print $model_data["landmark_name"] . "\n";
print $model_data["nickname"] . "\n";

/*
 *  ["former_landmark_type"]=>
  string(9) "Empty Lot"
  ["original_description"]=>
  string(18) "Under Construction"
  ["enddate"]=>
  string(10) "12/19/1999"
  ["current_landmark_type"]=>
  string(8) "Building"
  ["current_description"]=>
  string(8) "Moved in"
 */
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
$address->setcurrent_address($model_data["address"]);
$address->setlat($model_data["lat"]);
$address->setlng($model_data["lng"]);
$address->setgeocode_source(get_current_user());
////$address->setlocation_latlng("0101000020E61000009D4B7155D90054C085ED27637C3C4440");
////$address->setlocation_latlng(ST_GeomFromText('POINT(-80.013265 40.472546)', 4326));
//
//
$result = $address->insert();
print "Result " . $result . "\n";
print "Address_id " . $address->getAddress_id();

$landmark = new LandmarkTypeClass();
$places = new PlacesClass();

$places->setLandmark_name($model_data["landmark_name"]);
$places->setNickname($model_data["nickname"]);
$places->setAddress_id($address->getAddress_id());
$landmark->setLandmark_type_description($model_data["former_landmark_type"]);
$landmark->select_landmark_type_id();
$places->setOriginal_use_type_id($landmark->getLandmark_type_id());

$places->setOriginal_use($model_data["original_description"]);
$places->setEnd_date($model_data["enddate"]);

$landmark->setLandmark_type_description($model_data["current_landmark_type"]);
$landmark->select_landmark_type_id();
$places->setCurrent_use_type_id($landmark->getLandmark_type_id());

$places->setCurrent_use($model_data["current_description"]);
$places->setStories__id(1);
$places->setVerification_indicator('FALSE');


//$places->setlandmark_name($model_data["landmark_name"]);
//$places->setOriginal_use($model_data["original_description"]);
//$places->setnickname($model_data["nickname"]);
//$landmark->setLandmark_type_description($model_data["former_landmark_type"]);
//$landmark->select_landmark_type_id();
//$places->setplaces_type_id($landmark->getLandmark_type_id());
//$places->setaddress_id($address->getAddress_id());
//$places->setlandmark_status_id(1);
////$landmark->setLandmark_type_description("current_landmark_type");
//$places->setcurrent_use($model_data["current_description"]);
//$places->setlandmark_url_type_id(1);
//$places->setstart_date('1950-01-01');
//$places->setstart_date_confidence(100);
//$places->setend_date($model_data["enddate"]);
//$places->setend_date_confidence(100);
//$places->sethistoric_address_id(1);
//$places->sethistory_summary(1);
//$places->setverification_indicator('FALSE');

$result2 = $places->insert();
print "Result " . $result2 . "<BR>";
print "Landmark_type_id " . $landmark->getLandmark_type_id();
