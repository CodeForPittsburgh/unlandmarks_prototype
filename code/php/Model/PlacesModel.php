<?php

include("PlacesClass.php");
include("AddressClass.php");
include("LandmarkTypeClass.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$places = new PlacesClass();
$address = new AddressClass();
$landmarktype = new LandmarkTypeClass();

//$result = $places->select_lowest_id();
$result = $places->select_all();
while ($row = pg_fetch_row($result)) {

    $places_id = $row[0];
    $landmark_name = $row[1];
    $nick_name = $row[2];
    echo 'ID: ' . $places_id . "<BR>";
    echo ' NAME: ' . $landmark_name . "<BR>";
    echo ' NICK NAME: ' . $nick_name . "<BR>";
   
}
//$result = $places->select_all_id(54);
////print "Result " . $result . "<BR>";
////echo '<select id="landmark_places_list">';
//
//while ($row = pg_fetch_row($result)) {
//
//    $places_id = $row[0];
//    $landmark_name = $row[1];
//    $nickname = $row[2];
//    
//    $address_id = $row[3];
//    $address->setAddress_id($address_id);
//    $address_results = $address->select_address_by_id();
//    
//    $address_info = $address->getCurrent_address();
//    
//    $original_use_type_id = $row[4];
//    $landmarktype->setLandmark_type_id($original_use_type_id);
//    $landmarktype->select_landmark_by_id();
//    $original_description = $landmarktype->getLandmark_type_description();
//    $original_use = $row[5];
//    $end_date = $row[6];
//    
//    $current_use_type_id = $row[7];
//    $landmarktype->setLandmark_type_id($current_use_type_id);
//    $landmarktype->select_landmark_by_id();
//    $current_description = $landmarktype->getLandmark_type_description();
//    
//    $current_use = $row[8];
//    $stories__id = $row[9];
//    $verification_indicator = $row[10];
//    $created_by = $row[11];
//    $created_time = $row[12];
//    $updated_by = $row[13];
//    $updated_time = $row[14];
//    $verified_by = $row[15];
//    $verified_time = $row[16];
//    echo 'table id="place_detail">';
//   echo '                 <tr>';
//   echo '                     <td class="label">Street address</td>';
//   echo '                     <td class="wideField"><input class="field" id="place_address" value="'.$address_info.'" disabled></td>';
//   echo '                 </tr>';
//      echo '                     <td class="label">Original Description</td>';
//   echo '                     <td class="wideField"><input class="field" id="original_description" value="'.$original_description.'" disabled></td>';
//   echo '                 </tr>';
//      echo '                     <td class="label">Current Description</td>';
//   echo '                     <td class="wideField"><input class="field" id="current_description" value="'.$current_description.'" disabled></td>';
//   echo '                 </tr>';
//   echo '  </table>';
//}

//echo "</select>";
/*
 * $places_id = $row[0];
  $landmark_name = $row[1];
  $nickname = $row[2];,
  $address_id = $row[3];
  $original_use_type_id = $row[4];
  $original_use = $row[5];
  $end_date = $row[6];
  $current_use_type_id = $row[7];
  $current_use = $row[8];
  $stories__id = $row[9];
  $verification_indicator = $row[10];
  $created_by = $row[11];
  $created_time = $row[12];
  $updated_by = $row[13];
  $updated_time = $row[14];
  $verified_by = $row[15];
  $verified_time = $row[16];
 * 
 *   address_id,
  current_address,
  lat,
  lng,
  geocode_source,
  location_latlng,
  verification_indicator,
  created_by,
  created_time,
  updated_by,
  updated_time,
  verified_by,
  verified_time
 * 
 * echo 'table id="place_detail">';
   echo '                 <tr>
   echo '                     <td class="label">Street address</td>';
   echo '                     <td class="slimField"><input class="field" id="street_number"';
   echo '                                                  disabled></td>';
   echo '                     <td class="wideField" colspan="2"><input class="field" id="route"';
   echo '                                                              disabled></td>';
   echo '                 </tr>';
 * echo '  </table>';
                    <tr>
                        <td class="label">City</td>
                        <!-- Note: Selection of address components in this example is typical.
                             You may need to adjust it for the locations relevant to your app. See
                             https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
                        -->
                        <td class="wideField" colspan="3"><input class="field" id="locality"
                                                                 disabled></td>
                    </tr>
                    <tr>
                        <td class="label">State</td>
                        <td class="slimField"><input class="field"
                                                     id="administrative_area_level_1" disabled></td>
                        <td class="label">Zip code</td>
                        <td class="wideField"><input class="field" id="postal_code"
                                                     disabled></td>
                    </tr>
                    <tr>
                        <td class="label">Country</td>
                        <td class="wideField" colspan="3"><input class="field"
                                                                 id="country" disabled></td>
                    </tr>
                    <tr>
                        <td class="label">Latitude</td>
                        <td class="wideField" colspan="3"><input class="field"
                                                                 id="latitude" disabled></td>
                    </tr>
                    <tr>
                        <td class="label">Longitude</td>
                        <td class="wideField" colspan="3"><input class="field"
                                                                 id="longitude" disabled></td>
                    </tr>
                    <tr>
                        <td class="label">Landmark Name</td>
                        <td class="wideField" colspan="3"><input class="field"
                                                                 id="landmark_name" required ></td>
                    </tr>
                    <tr>
                        <td class="label">Nickname</td>
                        <td class="wideField" colspan="3"><input class="field"
                                                                 id="nickname" ></td>
                    </tr>
                </table>
 */