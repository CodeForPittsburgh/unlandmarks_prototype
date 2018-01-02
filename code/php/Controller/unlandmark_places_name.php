<?php

include_once("../Model/PlacesClass.php");


global $places;
$places = new PlacesClass();

$x = "name";
header("Content-Type: application/json; charset=UTF-8");

$my_json = filter_input(INPUT_GET, $x);
//echo " message " . $my_json ." ***";
//var_dump(json_decode($my_json, true));
$model_data = json_decode($my_json, true);
//print_r($model_data);
$places_id = $model_data["places_id"];

getPlacesData($places_id);


function getPlacesData($places_id) {
    //echo "getPlacesData " . $places_id . "<BR>";
    global $places;
    $places->setPlaces_id($places_id);
    $result = $places->select_all_id();


    $row = pg_fetch_row($result);
    $bob = $row[1];
    echo $bob;

}
