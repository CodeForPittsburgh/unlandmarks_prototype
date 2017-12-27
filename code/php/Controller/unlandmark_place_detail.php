<?php

include_once("../Model/PlacesClass.php");
include("../Model/AddressClass.php");
include("../Model/LandmarkTypeClass.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

global $places, $address, $landmarktype;
$places = new PlacesClass();
$address = new AddressClass();
$landmarktype = new LandmarkTypeClass();
$x = "name";
header("Content-Type: application/json; charset=UTF-8");

$my_json = filter_input(INPUT_GET, $x);
//var_dump(json_decode($my_json, true));
$model_data = json_decode($my_json, true);
$places_id = $model_data["places_id"];

// $top needs to be the first asc order place
if (strlen($places_id) === 0) {
    //echo '<p>No Data</p>';
    $top = $places->select_lowest_id();
    setPlaces_id($top);
    getPlacesData();
} else {
    //echo '<p>Data ' . $places_id .'</p>';

//var_dump(json_decode($my_json, true));
    //$model_data = json_decode($my_json, true);
    // setPlaces_id($model_data["places_id"]);
    setPlaces_id($places_id);
    getPlacesData();
}

// $top needs to be the first asc order place


function setPlaces_id($places_id) {
    global $places;
    $places->setPlaces_id($places_id);
}

function getPlacesData() {
    global $places, $address, $landmarktype;
    $result = $places->select_all_id();
//print "Result " . $result . "<BR>";
//echo '<select id="landmark_places_list">';
    echo '<table id="landmark_place_detail">';
    while ($row = pg_fetch_row($result)) {

        $places_id = $row[0];
        $landmark_name = $row[1];
        $nickname = $row[2];

        $address_id = $row[3];
        $address->setAddress_id($address_id);
        $address_results = $address->select_address_by_id();

        $address_info = $address->getCurrent_address();
        //print "ADDRESS " . $address_info . "<BR>";

        $original_use_type_id = $row[4];
        $landmarktype->setLandmark_type_id($original_use_type_id);
        $landmarktype->select_landmark_by_id();
        $original_description = $landmarktype->getLandmark_type_description();
        //print "ORIGINAL " . $original_description . "<BR>";

        $original_use = $row[5];
        $end_date = $row[6];

        $current_use_type_id = $row[7];
        $landmarktype->setLandmark_type_id($current_use_type_id);
        $landmarktype->select_landmark_by_id();
        $current_description = $landmarktype->getLandmark_type_description();
        //print "CURRENT " . $current_description . "<BR>";

        $current_use = $row[8];
        $stories__id = $row[9];
        $verification_indicator = $row[10];
        $created_by = $row[11];
        $created_time = $row[12];
        $updated_by = $row[13];
        $updated_time = $row[14];
        $verified_by = $row[15];
        $verified_time = $row[16];


        echo '<tr>';
        echo '<td id="place_address">' . $address_info . ' </td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td id="original_description">' . $original_description . ' </td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td id="original_use">' . $original_use . ' </td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td id="current_description">' . $current_description . ' </td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td id="current_use">' . $current_use . ' </td>';
        echo '</tr>';
    }
    echo '  </table>';
    return "echo '<p>Worked</p>'";
}
