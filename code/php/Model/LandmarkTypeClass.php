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
    private $verification_indicator;
    private $created_by;
    private $created_time;
    private $updated_by;
    private $updated_time;
    private $verified_by;
    private $verified_time;
    private $LandmarkTypeClassResults;

    function getLandmarkTypeClassResults() {
        return $this->LandmarkTypeClassResults;
    }

    function setLandmarkTypeClassResults($LandmarkTypeClassResults) {
        $this->LandmarkTypeClassResults = $LandmarkTypeClassResults;
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

    function getVerification_indicator() {
        return $this->verification_indicator;
    }

    function setVerification_indicator($verification_indicator) {
        $this->verification_indicator = addSingleQuote($verification_indicator);
    }

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
        /*
         * INSERT INTO mailing_list (email)
          SELECT 'email(at)example.org'
          WHERE NOT EXISTS (
          SELECT * FROM mailing_list WHERE email='email(at)example.org'
          );
         * 
         *  VALUES({$this->getLandmark_type_description()} )
         */
        $sql = <<< SQL
            INSERT INTO unlandmark.landmark_type
            (landmark_type_description,verification_indicator)
                select {$this->getLandmark_type_description()},'true'
                where not exists
                (
                select * from unlandmark.landmark_type 
                    where landmark_type_description={$this->getLandmark_type_description()}
                )

            
SQL;
        //$this->resetLastSqlError();
        print "SQL " . $sql . "<BR>";
        //$result = "RESULT";

        $result = pg_query(DBCONN, $sql);
        $this->select_landmark_type_id();
        return $result;
    }

    public function select_landmark_type_id() {
        // print "Description {$this->getLandmark_type_description()} <BR>";
        $sql = <<< SQL
            select landmark_type_id from unlandmark.landmark_type

             where landmark_type_description = {$this->getLandmark_type_description()}
             and verification_indicator = 'TRUE'


SQL;
        //$this->resetLastSqlError();
        //print "SQL " . $sql . "<BR>";
        //$result = "RESULT";

        $results = pg_query(DBCONN, $sql);
        $row = pg_fetch_row($results);
        $this->setLandmark_type_id($row[0]);
    }

    public function select_landmark_type_description() {
        print "Description {$this->getLandmark_type_description()} <BR>";
        $sql = <<< SQL
                SELECT * FROM unlandmark.landmark_type
                where verification_indicator = 'TRUE'
                order by landmark_type_description
SQL;
        //$this->resetLastSqlError();
        //print "SQL " . $sql . "<BR>";
        //$result = "RESULT";

        $results = pg_query(DBCONN, $sql);
        return $results;
    }

    public function select_all_landmark_types() {
        $sql = <<< SQL
                SELECT landmark_type_id,landmark_type_description,verification_indicator FROM unlandmark.landmark_type
                order by landmark_type_description
SQL;
        //$this->resetLastSqlError();
        //print "SQL " . $sql . "\n";
        //$result = "RESULT";

        $results = pg_query(DBCONN, $sql);
        return $results;
    }

    public function select_landmark_verification($id) {
        $sql = <<< SQL
                select verification_indcator from unlandmark.landmark_type
                where landmark_type_id = $id
                
SQL;
        //$this->resetLastSqlError();
        //print "SQL " . $sql . "\n";
        //$result = "RESULT";

        $results = pg_query(DBCONN, $sql);
        return $results;
    }

    public function update_landmark_verification() {
        $sql = <<< SQL
                update unlandmark.landmark_type
                set verification_indicator = {$this->getVerification_indicator()} 
                where landmark_type_id = {$this->getLandmark_type_id()}
                
SQL;
        //$this->resetLastSqlError();
        print "SQL " . $sql . "\n";
        //$result = "RESULT";

        $results = pg_query(DBCONN, $sql);
        return $results;
    }

    public function select_landmark_by_id() {
        $sql = <<< SQL
            select landmark_type_id,
                landmark_type_description,
                verification_indicator,
                created_by,
                created_time,
                updated_by,
                updated_time,
                verified_by,
                verified_time 
            from unlandmark.landmark_type
                where landmark_type_id = {$this->getLandmark_type_id()}
                
SQL;


        $results = pg_query(DBCONN, $sql);
        $this->setLandmarkTypeClassResults($results);
        $this->setLandmarkData();

        //return $results;
    }

    public function setLandmarkData() {
        $results = $this->getLandmarkTypeClassResults();
        $rows = pg_fetch_row($results);
        $this->setLandmark_type_id($rows[0]);
        $this->setLandmark_type_description($rows[1]);
        $this->setVerification_indicator($rows[2]);
        $this->setCreated_by($rows[3]);
        $this->setCreated_time($rows[4]);
        $this->setUpdated_by($rows[5]);
        $this->setUpdated_time($rows[6]);
        $this->setVerified_by($rows[7]);
        $this->setVerified_time($rows[8]);
    }

    /*
     *   landmark_type_id,
      landmark_type_description,
      verification_indicator,
      created_by,
      created_time,
      updated_by,
      updated_time,
      verified_by,
      verified_time
     */
}
