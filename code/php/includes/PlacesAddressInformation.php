<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$address = 'address';
$lat = 'lat';
$lng = 'lng';
$my_address = filter_input(INPUT_GET, $address, FILTER_SANITIZE_STRING);
$my_lat = filter_input(INPUT_GET, $lat, FILTER_SANITIZE_STRING);
$my_lng = filter_input(INPUT_GET, $lng, FILTER_SANITIZE_STRING);
//$my_message = "Now is the time for all good men and women to code";
//print "Address " . $my_address . "<BR>";
//print "Lat " . $my_lat . "<BR>";
//print "Lng " . $my_lng . "<BR>";
//echo "<p id=autocomplete>".$my_address;
//echo "<p id=latitude>".$my_lat;
//echo "<p id=longitude>".$my_lng ;
echo '<input type="text" id="autocomplete" value="'.$my_address.'"><br>';
//print "Address Again " . $my_address . "<BR>";
echo '<input type="text" id="latitude" value='.$my_lat.'><br>';
echo '<input type="text" id="longitude" value='.$my_lng.'><br>';
//echo '<input type="text" id="longmessage" value="'.$my_message.'"><br>';
