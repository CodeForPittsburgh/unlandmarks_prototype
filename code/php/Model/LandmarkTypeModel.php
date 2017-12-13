<?php
include("LandmarkTypeClass.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LandmarkTypeModel
 *
 * @author Mark
 */

$landmark_type = new LandmarkTypeClass();

$landmark_type->setLandmark_type_description("Parking Lot");
$result = $landmark_type->insert();
print "Result " . $result . "<BR>";
print "Landmark_type_id " . $landmark_type->getLandmark_type_id();

