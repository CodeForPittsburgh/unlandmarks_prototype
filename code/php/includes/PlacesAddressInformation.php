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

//echo '<p>' . $my_address . '</p>';
//echo '<p>' . $my_lat . '</p>';
//echo '<p>' . $my_lng . '</p>';
//echo '<p>' . $my_landmark_name . '</p>';
//echo '<p>' . $my_nickname. '</p>';

echo '<input readonly type="text" id="autocomplete" value='.$my_address .'><br>';
echo '<input readonly type="text" id="latitude" value='.$my_lat .'><br>';
echo '<input readonly type="text" id="longitude" value='.$my_lng .'><br>';
echo '<input readonly type="text" id="landmark_name" value='.$my_landmark_name .'><br>';
echo '<input readonly type="text" id="nickname" value='.$my_nickname .'><br>';

//echo '<p id="autocomplete" value = "$my_address" >' . $my_address;
//echo '<p id="latitude">' . $my_lat;
//echo '<p id="longitude">' . $my_lng;
//echo '<p id="landmark_name">' . $my_landmark_name;
//echo '<p id="nickname">' . $my_nickname;


//echo '<table>';
//echo '<tr>';
//echo '<td id="autocomplete>';
//echo $my_address;
//echo '</td>';
//echo '</tr>';
//echo '<tr>';
//echo '<td id="latitude>';
//echo $my_lat;
//echo '</td>';
//echo '</tr>';
//echo '<tr>';
//echo '<td id="longitude>';
//echo $my_lng;
//echo '</td>';
//echo '</tr>';
//echo '<tr>';
//echo '<td id="landmark_name>';
//echo $my_landmark_name;
//echo '</td>';
//echo '</tr>';
//echo '<tr>';
//echo '<td id="nickname>';
//echo $my_nickname;
//echo '</td>';
//echo '</tr>';
//echo '</table>';
