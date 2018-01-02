<?php

include_once("bean.config.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PlacesClass
 *
 * @author Mark
 */
class PlacesClass {

    private $places_id; // serial NOT NULL,
    private $landmark_name; // varchar(128),
    private $nickname; // varchar(128),
    private $address_id; // integer,
    private $original_use_type_id; // integer,
    private $original_use; // text,
    private $end_date; // varchar(20),
    private $current_use_type_id; // integer,
    private $current_use; // text,
    private $stories__id; // integer,
    private $verification_indicator; // boolean default FALSE,
    private $created_by; // varchar(20),
    private $created_time; // timestamp not null,
    private $updated_by; // varchar(20),
    private $updated_time; // timestamp,
    private $verified_by; // varchar(20),
    private $verified_time; // timestamp,

    function getPlaces_id() {
        return $this->places_id;
    }

    function getLandmark_name() {
        return $this->landmark_name;
    }

    function getNickname() {
        return $this->nickname;
    }

    function getAddress_id() {
        return $this->address_id;
    }

    function getOriginal_use_type_id() {
        return $this->original_use_type_id;
    }

    function getOriginal_use() {
        return $this->original_use;
    }

    function getEnd_date() {
        return $this->end_date;
    }

    function getCurrent_use_type_id() {
        return $this->current_use_type_id;
    }

    function getCurrent_use() {
        return $this->current_use;
    }

    function getStories__id() {
        return $this->stories__id;
    }

    function getVerification_indicator() {
        return $this->verification_indicator;
    }

    function getCreated_by() {
        return $this->created_by;
    }

    function getCreated_time() {
        return $this->created_time;
    }

    function getUpdated_by() {
        return $this->updated_by;
    }

    function getUpdated_time() {
        return $this->updated_time;
    }

    function getVerified_by() {
        return $this->verified_by;
    }

    function getVerified_time() {
        return $this->verified_time;
    }

    function setPlaces_id($places_id) {
        $this->places_id = $places_id;
    }

    function setLandmark_name($landmark_name) {
        $this->landmark_name = addSingleQuote(pg_escape_string($landmark_name));
    }

    function setNickname($nickname) {
        $this->nickname = addSingleQuote(pg_escape_string($nickname));
    }

    function setAddress_id($address_id) {
        $this->address_id = $address_id;
    }

    function setOriginal_use_type_id($original_use_type_id) {
        $this->original_use_type_id = $original_use_type_id;
    }

    function setOriginal_use($original_use) {
        $this->original_use = addSingleQuote(pg_escape_string($original_use));
    }

    function setEnd_date($end_date) {
        $this->end_date = addSingleQuote($end_date);
    }

    function setCurrent_use_type_id($current_use_type_id) {
        $this->current_use_type_id = $current_use_type_id;
    }

    function setCurrent_use($current_use) {
        $this->current_use = addSingleQuote(pg_escape_string($current_use));
    }

    function setStories__id($stories__id) {
        $this->stories__id = $stories__id;
    }

    function setVerification_indicator($verification_indicator) {
        $this->verification_indicator = $verification_indicator;
    }

    function setCreated_by($created_by) {
        $this->created_by = $created_by;
    }

    function setCreated_time($created_time) {
        $this->created_time = $created_time;
    }

    function setUpdated_by($updated_by) {
        $this->updated_by = $updated_by;
    }

    function setUpdated_time($updated_time) {
        $this->updated_time = $updated_time;
    }

    function setVerified_by($verified_by) {
        $this->verified_by = $verified_by;
    }

    function setVerified_time($verified_time) {
        $this->verified_time = $verified_time;
    }

    public function insert() {
//        if ($this->isPkAutoIncrement) {
//            $this->deptNo = "";
//        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO unlandmark.places
            (landmark_name, nickname, address_id, original_use_type_id, 
            original_use, end_date, current_use_type_id, current_use, stories__id, 
            verification_indicator)
                
            VALUES({$this->getLandmark_name()},
            {$this->getNickname()},
            {$this->getAddress_id()},
            {$this->getOriginal_use_type_id()},
            {$this->getOriginal_use()}, 
            {$this->getEnd_date()},
            {$this->getCurrent_use_type_id()},
            {$this->getCurrent_use()},
            {$this->getStories__id()},
            {$this->getVerification_indicator()}
            )
SQL;
        //$this->resetLastSqlError();
        //print "SQL " . $sql . "<BR>";
        //$result = "RESULT";

        $result = pg_query(DBCONN, $sql);

        return $result;
    }

    public function select_all() {
        $sql = <<< SQL
            select 
            places_id,
            landmark_name, 
            nickname, 
            address_id,
            original_use_type_id, 
            original_use,
            end_date, 
            current_use_type_id, 
            current_use,
            stories__id, 
            verification_indicator, 
            created_by,
            created_time,
            updated_by,
            updated_time,
            verified_by,
            verified_time
                from unlandmark.places
                order by landmark_name
 
SQL;
        //$this->resetLastSqlError();
        //print "SQL " . $sql . "<BR>";
        //$result = "RESULT";

        $result = pg_query(DBCONN, $sql);

        return $result;
    }

    public function select_all_id() {
        $sql = <<< SQL
            select * from unlandmark.places
            where places_id = {$this->getPlaces_id()}
 
SQL;
        //$this->resetLastSqlError();
        //print "SQL " . $sql . "<BR>";
        //$result = "RESULT";

        $result = pg_query(DBCONN, $sql);

        return $result;
    }

    public function select_lowest_id() {
        $sql = <<< SQL
            SELECT places_id, landmark_name
                FROM unlandmark.places
                order by landmark_name
                limit 1
 
SQL;
        //$this->resetLastSqlError();
        //print "SQL " . $sql . "<BR>";
        //$result = "RESULT";

        $result = pg_query(DBCONN, $sql);

        $row = pg_fetch_row($result);
        return $row[0];
    }

}
