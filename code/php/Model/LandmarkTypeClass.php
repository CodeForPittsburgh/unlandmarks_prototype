<?php
include_once("bean.config.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LandmarkType
 *
 * @author Mark
 */
class LandmarkTypeClass {
    private $landmark_type_id;
    private $landmark_type_description;
    
    function getLandmark_type_id() {
        return $this->landmark_type_id;
    }

    function getLandmark_type_description() {
        return $this->landmark_type_description;
    }

    function setLandmark_type_id($landmark_type_id) {
        $this->landmark_type_id = $landmark_type_id;
    }

    function setLandmark_type_description($landmark_type_description) {
        $this->landmark_type_description = addSingleQuote($landmark_type_description);
    }
public function insert() {

        $sql = <<< SQL
            INSERT INTO unlandmark.landmark_type
            (landmark_type_description)
            VALUES({$this->getLandmark_type_description()} )
            
SQL;
        //$this->resetLastSqlError();
        print "SQL " . $sql . "<BR>";
        //$result = "RESULT";

        $result = pg_query(DBCONN, $sql);
        $this->select_landmark_type_id();
        return $result;
    }

    public function select_landmark_type_id() {
        print "Description {$this->getLandmark_type_description()} <BR>";
        $sql = <<< SQL
            select landmark_type_id from unlandmark.landmark_type

             where landmark_type_description = {$this->getLandmark_type_description()}


SQL;
        //$this->resetLastSqlError();
        print "SQL " . $sql . "<BR>";
        //$result = "RESULT";

        $results = pg_query(DBCONN, $sql);
        $row = pg_fetch_row($results);
        $this->setLandmark_type_id($row[0]);
    }


}
