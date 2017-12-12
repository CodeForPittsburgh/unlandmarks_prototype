<?php
include("PlacesClass.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$places = new PlacesClass();

  $places->setlandmark_name("Grain Towers");
  $places->setone_line("Charitiers");
  $places->setnickname("Grain Towers");
  $places->setplaces_type_id(1);
  $places->setaddress_id(1);
  $places->setlandmark_status_id(1);
  $places->setcurrent_use("Parking Lot");
  $places->setlandmark_url_type_id(1);
  $places->setstart_date('1950-01-01');
  $places->setstart_date_confidence(100);
  $places->setend_date('1968-01-01');
  $places->setend_date_confidence(100);
  $places->sethistoric_address_id(1);
  $places->sethistory_summary(1);
  $places->setverification_indicator('TRUE');
  
  $result = $places->insert();
  print "Result " . $result . "<BR>";
