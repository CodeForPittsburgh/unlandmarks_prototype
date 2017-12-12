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

    private $places_id;
    private $landmark_name;
    private $one_line;
    private $nickname;
    private $places_type_id;
    private $address_id;
    private $landmark_status_id;
    private $current_use;
    private $landmark_url_type_id;
    private $start_date;
    private $start_date_confidence;
    private $end_date;
    private $end_date_confidence;
    private $historic_address_id;
    private $history_summary;
    private $verification_indicator;
    private $updated_by;
    private $updated_time;


    function getPlaces_id() {
        return $this->places_id;
    }

    function getLandmark_name() {
        return addSingleQuote($this->landmark_name);

    }

    function getOne_line() {
        return addSingleQuote($this->one_line);
    }

    function getNickname() {
        return addSingleQuote($this->nickname);
    }

    function getPlaces_type_id() {
        return $this->places_type_id;
    }

    function getAddress_id() {
        return $this->address_id;
    }

    function getLandmark_status_id() {
        return $this->landmark_status_id;
    }

    function getCurrent_use() {
        return addSingleQuote($this->current_use);
    }

    function getLandmark_url_type_id() {
        return $this->landmark_url_type_id;
    }

    function getStart_date() {
        return addSingleQuote($this->start_date);
    }

    function getStart_date_confidence() {
        return $this->start_date_confidence;
    }

    function getEnd_date() {
        return addSingleQuote($this->end_date);
    }

    function getEnd_date_confidence() {
        return $this->end_date_confidence;
    }

    function getHistoric_address_id() {
        return $this->historic_address_id;
    }

    function getHistory_summary() {
        return addSingleQuote($this->history_summary);
    }

    function getVerification_indicator() {
        return $this->verification_indicator;
    }

    function getUpdated_by() {
        return $this->updated_by;
    }

    function getUpdated_time() {
        return $this->updated_time;
    }

    function setPlaces_id($places_id) {
        $this->places_id = $places_id;
    }

    function setLandmark_name($landmark_name) {
        $this->landmark_name = $landmark_name;
    }

    function setOne_line($one_line) {
        $this->one_line = $one_line;
    }

    function setNickname($nickname) {
        $this->nickname = $nickname;
    }

    function setPlaces_type_id($places_type_id) {
        $this->places_type_id = $places_type_id;
    }

    function setAddress_id($address_id) {
        $this->address_id = $address_id;
    }

    function setLandmark_status_id($landmark_status_id) {
        $this->landmark_status_id = $landmark_status_id;
    }

    function setCurrent_use($current_use) {
        $this->current_use = $current_use;
    }

    function setLandmark_url_type_id($landmark_url_type_id) {
        $this->landmark_url_type_id = $landmark_url_type_id;
    }

    function setStart_date($start_date) {
        $this->start_date = $start_date;
    }

    function setStart_date_confidence($start_date_confidence) {
        $this->start_date_confidence = $start_date_confidence;
    }

    function setEnd_date($end_date) {
        $this->end_date = $end_date;
    }

    function setEnd_date_confidence($end_date_confidence) {
        $this->end_date_confidence = $end_date_confidence;
    }

    function setHistoric_address_id($historic_address_id) {
        $this->historic_address_id = $historic_address_id;
    }

    function setHistory_summary($history_summary) {
        $this->history_summary = $history_summary;
    }

    function setVerification_indicator($verification_indicator) {
        $this->verification_indicator = $verification_indicator;
    }

    function setUpdated_by($updated_by) {
        $this->updated_by = $updated_by;
    }

    function setUpdated_time($updated_time) {
        $this->updated_time = $updated_time;
    }

//    public function delete($places_id)
//    {
//        $sql = "DELETE FROM places WHERE places_id={$places_id}";
//        $this->resetLastSqlError();
//        $result = $this->query($sql);
//        $this->lastSql = $sql;
//        if (!$result) {
//            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
//        }
//        return $this->affected_rows;
//    }


    public function insert() {
//        if ($this->isPkAutoIncrement) {
//            $this->deptNo = "";
//        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO unlandmark.places
            (landmark_name, one_line, nickname, places_type_id, 
            address_id, landmark_status_id, current_use, landmark_url_type_id, 
            start_date, start_date_confidence, end_date, end_date_confidence, 
            historic_address_id, history_summary, verification_indicator)
                
            VALUES({$this->getlandmark_name()}, 
            {$this->getone_line()}, 
            {$this->getnickname()},
            {$this->getplaces_type_id()},
            {$this->getaddress_id()},
            {$this->getlandmark_status_id()}, 
            {$this->getcurrent_use()},
            {$this->getlandmark_url_type_id()}, 
            {$this->getstart_date()},
            {$this->getstart_date_confidence()},
            {$this->getend_date()},
            {$this->getend_date_confidence()}, 
            {$this->gethistoric_address_id()},
            {$this->gethistory_summary()}, 
            {$this->getverification_indicator()}
            
            )
SQL;
        //$this->resetLastSqlError();
        print "SQL " . $sql . "<BR>";
        //$result = "RESULT";

        $result = pg_query(DBCONN,$sql);
//        $this->lastSql = $sql;
//        if (!$result) {
//            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
//        } else {
//            $this->allowUpdate = true;
//            if ($this->isPkAutoIncrement) {
//                $this->deptNo = $this->insert_id;
//            }
//        }
        return $result;
    }

    /**
     * Updates a specific row from the table departments with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param string $deptNo the primary key dept_no value of table departments which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
//    public function update($deptNo)
//    {
//        // $constants = get_defined_constants();
//        if ($this->allowUpdate) {
//            $sql = <<< SQL
//            UPDATE
//                departments
//            SET 
//				dept_name={$this->parseValue($this->deptName,'notNumber')}
//            WHERE
//                dept_no={$this->parseValue($deptNo,'string')}
//SQL;
//            $this->resetLastSqlError();
//            $result = $this->query($sql);
//            if (!$result) {
//                $this->lastSqlError = $this->sqlstate . " - ". $this->error;
//            } else {
//                $this->select($deptNo);
//                $this->lastSql = $sql;
//                return $result;
//            }
//        } else {
//            return false;
//        }
//    }
}
