<?php

include("../Model/LandmarkTypeClass.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$landmark_type = new LandmarkTypeClass();
$x = "name";
header("Content-Type: application/json; charset=UTF-8");
$my_json = filter_input(INPUT_GET, $x);

$model_data = json_decode($my_json, true);
$ltd = $model_data["landmark_type_data"];
$lti = $model_data["landmark_type_id"];
$vi = $model_data["verification_indcator"];
$msg = "Landmark type ". $ltd . "<BR>";
if ($ltd === null) {
    update($lti, $vi);
    $msg .= " \tRecord updated: " . "<BR>";
} else {
    insert($ltd);
    $msg .= " \tRecord added: " . "<BR>";
}

print $msg . "\n";
header("Location:../view/message.php?message=" . $msg . "");

function insert($landmark_type_data) {
    $verification_indicator = 'true';

    $landmark_type = new LandmarkTypeClass();
    $landmark_type->setLandmark_type_description(strtoupper($landmark_type_data));

    $landmark_type->setVerification_indicator($verification_indicator);
    $result = $landmark_type->insert();
    print "Result " . $result . "<BR>";
    print "Landmark_type_id " . $landmark_type->getLandmark_type_id() . "<BR>";
}

function update($landmark_type_id, $verification_indcator) {
    $landmark_type = new LandmarkTypeClass();
    $landmark_type->setLandmark_type_id($landmark_type_id);
    $landmark_type->setVerification_indicator($verification_indcator);
    $result = $landmark_type->update_landmark_verification();
    print "Result " . $result . "<BR>";
    print "Landmark_type_id " . $landmark_type->getLandmark_type_id() . "<BR>";
}
