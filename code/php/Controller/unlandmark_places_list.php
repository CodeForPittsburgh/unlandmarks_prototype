<?php

include("../Model/PlacesClass.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$places = new PlacesClass();
$result = $places->select_all();
echo '<select id="landmark_places_list" onchange="mySelected()">';

while ($row = pg_fetch_row($result)) {

    $id = $row[0];
    $name = $row[1];
    echo '<option value="' . $id . '">' . $name . '</option>';
}

echo "</select>";


