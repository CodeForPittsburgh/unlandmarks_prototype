<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$x = "name";
header("Content-Type: application/json; charset=UTF-8");

$my_json = filter_input(INPUT_GET, $x);
//var_dump(json_decode($my_json, true));
$model_data = json_decode($my_json, true);
$places_id = $model_data["places_id"];
echo $places_id;