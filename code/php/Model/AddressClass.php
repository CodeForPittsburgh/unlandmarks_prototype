<?php

include_once("bean.config.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddressClass
 *
 * @author Mark
 */
class AddressClass {

    private $address_id;
    private $current_address;
    private $lat;
    private $lng;
    private $geocode_source;
    private $location_latlng;
    private $updated_by;
    private $updated_time;

    function getAddress_id() {
        return $this->address_id;
    }

    function getCurrent_address() {
        return addSingleQuote($this->current_address);
    }

    function getLat() {
        return $this->lat;
    }

    function getLng() {
        return $this->lng;
    }

    function getGeocode_source() {
        return addSingleQuote($this->geocode_source);
    }

    function getLocation_latlng() {
        return addSingleQuote($this->location_latlng);
    }

    function getUpdated_by() {
        return $this->updated_by;
    }

    function getUpdated_time() {
        return $this->updated_time;
    }

    function setAddress_id($address_id) {
        $this->address_id = $address_id;
    }

    function setCurrent_address($current_address) {
        $this->current_address = $current_address;
    }

    function setLat($lat) {
        $this->lat = $lat;
    }

    function setLng($lng) {
        $this->lng = $lng;
    }

    function setGeocode_source($geocode_source) {
        $this->geocode_source = $geocode_source;
    }

    function setLocation_latlng($location_latlng) {
        $this->location_latlng = $location_latlng;
    }

    function setUpdated_by($updated_by) {
        $this->updated_by = $updated_by;
    }

    function setUpdated_time($updated_time) {
        $this->updated_time = $updated_time;
    }

    public function insert() {

        $sql = <<< SQL
            INSERT INTO unlandmark.address
            (current_address, lat, lng, geocode_source, location_latlng)
                
            VALUES({$this->getcurrent_address()}, 
            {$this->getlat()}, 
            {$this->getlng()},
            {$this->getgeocode_source()},
            ST_GeomFromText('POINT({$this->getlng()} {$this->getlat()})', 4326)
            )
SQL;
        //$this->resetLastSqlError();
        print "SQL " . $sql . "<BR>";
        //$result = "RESULT";

        $result = pg_query(DBCONN, $sql);
//        $this->lastSql = $sql;
//        if (!$result) {
//            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
//        } else {
//            $this->allowUpdate = true;
//            if ($this->isPkAutoIncrement) {
//                $this->deptNo = $this->insert_id;
//            }
//        }
        $this->select_address_id();
        return $result;
    }

    public function select_address_id() {
        $sql = <<< SQL
            select address_id from unlandmark.address

             where current_address = {$this->getcurrent_address()}
           and lat = '{$this->getlat()}'
           and lng = '{$this->getlng()}'

SQL;
        //$this->resetLastSqlError();
        print "SQL " . $sql . "<BR>";
        //$result = "RESULT";

        $results = pg_query(DBCONN, $sql);
        $row = pg_fetch_row($results);
        $this->setAddress_id($row[0]);
    }

}
