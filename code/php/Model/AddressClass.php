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
    private $verification_indicator;
    private $created_by;
    private $created_time;
    private $updated_by;
    private $updated_time;
    private $verified_by;
    private $verified_time;
    private $AddressClassResults;
    
    function getCreated_by() {
        return $this->created_by;
    }

    function setCreated_by($created_by) {
        $this->created_by = $created_by;
    }

    
    function getVerification_indicator() {
        return $this->verification_indicator;
    }

    function getCreated_time() {
        return $this->created_time;
    }

    function getVerified_by() {
        return $this->verified_by;
    }

    function getVerified_time() {
        return $this->verified_time;
    }

    function setVerification_indicator($verification_indicator) {
        $this->verification_indicator = $verification_indicator;
    }

    function setCreated_time($created_time) {
        $this->created_time = $created_time;
    }

    function setVerified_by($verified_by) {
        $this->verified_by = $verified_by;
    }

    function setVerified_time($verified_time) {
        $this->verified_time = $verified_time;
    }

        function getAddressClassResults() {
        return $this->AddressClassResults;
    }

    function setAddressClassResults($AddressClassResults) {
        $this->AddressClassResults = $AddressClassResults;
    }

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

    public function setAddress_id($address_id) {
        $this->address_id = $address_id;
    }

    public function setCurrent_address($current_address) {
        $this->current_address = $current_address;
    }

    public function setLat($lat) {
        $this->lat = $lat;
    }

    public function setLng($lng) {
        $this->lng = $lng;
    }

    public function setGeocode_source($geocode_source) {
        $this->geocode_source = $geocode_source;
    }

    public function setLocation_latlng($location_latlng) {
        $this->location_latlng = $location_latlng;
    }

    public function setUpdated_by($updated_by) {
        $this->updated_by = $updated_by;
    }

    public function setUpdated_time($updated_time) {
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
       // print "SQL " . $sql . "<BR>";
        //$result = "RESULT";

        $results = pg_query(DBCONN, $sql);
        $this->setAddressClassResults($results);

        $this->select_address_id();
        return $results;
    }

    public function select_address_id() {
        $sql = <<< SQL
            select address_id from unlandmark.address

             where current_address = {$this->getcurrent_address()}
           and lat = '{$this->getlat()}'
           and lng = '{$this->getlng()}'

SQL;
        //$this->resetLastSqlError();
        //print "SQL " . $sql . "<BR>";
        //$result = "RESULT";

        $results = pg_query(DBCONN, $sql);
        $this->setAddressClassResults($results);
        $row = pg_fetch_row($results);
        $this->setAddress_id($row[0]);
    }

    public function select_address_by_id() {
        $sql = <<< SQL
            select address_id,
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
        from unlandmark.address
            where address_id = {$this->getAddress_id()}

SQL;
        //$this->resetLastSqlError();
        //print "SQL " . $sql . "<BR>";
        //$result = "RESULT";

        $results = pg_query(DBCONN, $sql);
        $this->setAddressClassResults($results);
        $this->setAddressData();
    }

    public function setAddressData() {
        $results = $this->getAddressClassResults();
        $rows = pg_fetch_row($results);

        $this->setAddress_id($rows[0]);
        $this->setCurrent_address($rows[1]);
        $this->setLat($rows[2]);
        $this->setLng($rows[3]);
        $this->setGeocode_source($rows[4]);
        $this->setLocation_latlng($rows[5]);
        $this->setVerification_indicator($rows[6]);
        $this->setCreated_by($rows[7]);
        $this->setCreated_time($rows[8]);
        $this->setUpdated_by($rows[9]);
        $this->setUpdated_time($rows[10]);
        $this->setVerified_by($rows[11]);
        $this->setVerified_time($rows[12]);
    }

}
