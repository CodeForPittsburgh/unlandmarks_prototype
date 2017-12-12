<?php

include("AddressClass.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$address = new AddressClass();

$address->setcurrent_address("3100 Staho Way, Pittsburgh, PA 15212, USA");
$address->setlat("40.4734353");
$address->setlng("-80.0303114");
$address->setgeocode_source("USER");
//$address->setlocation_latlng("0101000020E61000009D4B7155D90054C085ED27637C3C4440");
//$address->setlocation_latlng(ST_GeomFromText('POINT(-80.013265 40.472546)', 4326));


$result = $address->insert();
print "Result " . $result . "<BR>";
