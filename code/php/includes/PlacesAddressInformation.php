<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$address = 'address';
$lat = 'lat';
$lng = 'lng';
$landmark_name = 'landmark_name';
$nickname = 'nickname';

$my_address = filter_input(INPUT_GET, $address);
$my_lat = filter_input(INPUT_GET, $lat);
$my_lng = filter_input(INPUT_GET, $lng);
$my_landmark_name = filter_input(INPUT_GET, $landmark_name);
$my_nickname = filter_input(INPUT_GET, $nickname);

echo '<input readonly type="text" id="autocomplete" value='.$my_address .'><br>';
echo '<input readonly type="text" id="latitude" value='.$my_lat .'><br>';
echo '<input readonly type="text" id="longitude" value='.$my_lng .'><br>';
echo '<input readonly type="text" id="landmark_name" value='.$my_landmark_name .'><br>';
echo '<input readonly type="text" id="nickname" value='.$my_nickname .'><br>';
