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
$msg = "Address: " . $model_data["address"] . "<BR>";
$msg .= " \tLat: " . $model_data["lat"] . "<BR>";
$msg .= " \t Lng: " . $model_data["lng"] . "<BR>";
$msg .= "\tformer_landmark_type: " . $model_data["former_landmark_type"] . "<BR>";
$msg .= "\toriginal_description: " . $model_data["original_description"] . "<BR>";
$msg .= "\tenddate: " . $model_data["enddate"] . "<BR>";
$msg .= "\tcurrent_landmark_type: " . $model_data["current_landmark_type"] . "<BR>";
$msg .= "\tcurrent_description: " . $model_data["current_description"] . "<BR>";
$msg .= "\tlandmark_name: " . $model_data["landmark_name"] . "<BR>";
$msg .= "\tnickname: " . $model_data["nickname"] . "<BR>";

$address = new AddressClass();
//
$address->setcurrent_address($model_data["address"]);
$address->setlat($model_data["lat"]);
$address->setlng($model_data["lng"]);
$address->setgeocode_source(get_current_user());

$result = $address->insert();
//$msg .= "\t Result " . $result;
$msg .= " \tAddress_id: " . $address->getAddress_id(). "<BR>";

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


$result2 = $places->insert();
//$msg .= " \tResult " . $result2 . "<BR>";
$msg .= " \tLandmark_type_id: " . $landmark->getLandmark_type_id() . "<BR>";
if ($landmark->getLandmark_type_id() > 0) {
    $msg .= " \tRecord added: " . "<BR>";
} else {
    $msg .= " \tRecord added failed: " . "<BR>";
}
//$msg = "Record added Landmark_type_id " . $landmark->getLandmark_type_id();
print $msg . "\n";
header("Location:../view/message.php?message=" . $msg . "");

//$msg = "database successfully update";
//phpAlert($msg);
////header("Location:../index.php");
//
//function phpAlert($msg) {
//    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
//    //header("Location:../index.php");
//}
