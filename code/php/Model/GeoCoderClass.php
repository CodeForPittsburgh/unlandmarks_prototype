<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GeoCoderClass
 *
 * @author Mark
 */
class GeoCoderClass {
    function getLat() {
        return $this->lat;
    }

    function getLng() {
        return $this->lng;
    }

    function setLat($lat) {
        $this->lat = $lat;
    }

    function setLng($lng) {
        $this->lng = $lng;
    }

        private $lat;
    private $lng;

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
        $this->mapit($xml);

        //fclose($fp);
    }

    function mapit($xml) {
        //https://www.google.com/maps/place/4429+Kennywood+Blvd,+West+Mifflin,+PA+15122
        print "LAT " . $xml->result->geometry->location->lat . "<BR>";
        $this->setLat($xml->result->geometry->location->lat);
        
        print "LNG " . $xml->result->geometry->location->lng . "<BR>";
        $this->setLng($xml->result->geometry->location->lng);
    }

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
        $this->getCurl($googleaddress);
        $this->processXML();
    }

}
