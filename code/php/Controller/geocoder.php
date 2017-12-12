<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//INSERT INTO unlandmark.address( current_address, geocode_source, location_latlng) VALUES ('3380 Boulevard of the Allies', 'USER',(ST_GeomFromText('POINT(10.809003 54.097834)',4326)) );
//update your_table set geom=st_SetSrid(st_MakePoint(longitude, latitude), 4326);
$sampleurl = "https://maps.googleapis.com/maps/api/geocode/xml?address=+200+block+Jacksonia+St,+Pittsburgh,+PA&key=AIzaSyCb3EA0lfao273s6Jkp8tfTzJfUSkswpOw";
//SELECT st_asewkt('0101000020E6100000BBD05CA79138444055A1815836FD53C0')


$googlekey = "AIzaSyCb3EA0lfao273s6Jkp8tfTzJfUSkswpOw";
$address = "4429+Kennywood+Blvd";
$city = "West+Mifflin";
$state = "PA";
$zipcode = "15122";
$googleaddress = "https://maps.googleapis.com/maps/api/geocode/xml?address=+" . $address . ",+" . $city . ",+" . $state . ",+" . $zipcode . "&key=" . $googlekey;
//print $sampleurl . "<BR>";
print $googleaddress . "<BR>";
getCurl($googleaddress);
processXML();

function getCurl($address) {
    $filename = "addresstest.xml";

    $ch = curl_init($address);
    $fp = fopen($filename, "w");

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    ////curl_setopt($ch, CURLOPT_TRANSFERTEXT,1);
    ////curl_setopt($ch, CURLOPT_HEADER, 0);
    ////curl_setopt($ch, CURLPROTO_FTPS,1);

    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
}

function processXML() {
    $filename = "addresstest.xml";
    //$fp = fopen($filename, "r");
    /*
      <GeocodeResponse>
      <status>OK</status>
      <result>
      <geometry>
      <location>
      <lat>40.4316580</lat>
      <lng>-80.0412980</lng>
      </location>
      </geometry>
      </result>
      </GeocodeResponse>
     */
    $xml = simplexml_load_file($filename) or die("Error: Cannot open object");
    //print_r($xml);
    //print "<BR>";
    //print "LAT " . $xml->result->geometry->location->lat . "<BR>";
    //print "LNG " . $xml->result->geometry->location->lng . "<BR>";
    mapit($xml);

    //fclose($fp);
}

function mapit($xml) {
    //https://www.google.com/maps/place/4429+Kennywood+Blvd,+West+Mifflin,+PA+15122
    print "LAT " . $xml->result->geometry->location->lat . "<BR>";
    print "LNG " . $xml->result->geometry->location->lng . "<BR>";
}

$address_data = "PA Route 51 and Lewis Run Road, Pleasant Hills, PA 15236";
BuildAddress($address_data);

function BuildAddress($address_data) {
    $address_fields = str_getcsv($address_data);
    print_r($address_fields);
    print "<BR>";
    $address = str_replace(" ", "+", trim($address_fields[0]));
    print $address . "<BR>";
    $city = str_replace(" ", "+", trim($address_fields[1]));
    print $city . "<BR>";

    $state_temp = explode(" ", trim($address_fields[2]));
    $state = $state_temp[0];
    print $state . "<BR>";
    $zipcode = $state_temp[1];
    print $zipcode . "<BR>";
    $googlekey = "AIzaSyCb3EA0lfao273s6Jkp8tfTzJfUSkswpOw";
    $googleaddress = "https://maps.googleapis.com/maps/api/geocode/xml?address=+" . $address . ",+" . $city . ",+" . $state . ",+" . $zipcode . "&key=" . $googlekey;
//print $sampleurl . "<BR>";
    print $googleaddress . "<BR>";
    getCurl($googleaddress);
    processXML();
}
