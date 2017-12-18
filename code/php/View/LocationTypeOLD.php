<?php
include("../Model/LandmarkTypeClass.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$landmark_type = new LandmarkTypeClass();
$x = "name";
header("Content-Type: application/json; charset=UTF-8");
$my_json = filter_input(INPUT_GET, $x);

$model_data = json_decode($my_json, true);
print $model_data["landmark_type_data"] . "\n";
insert($model_data["landmark_type_data"]);

function insert($landmark_type_data) {
$landmark_type = new LandmarkTypeClass();
    $landmark_type->setLandmark_type_description($landmark_type_data);
    $result = $landmark_type->insert();
    print "Result " . $result . "<BR>";
    print "Landmark_type_id " . $landmark_type->getLandmark_type_id() . "<BR>";
}
