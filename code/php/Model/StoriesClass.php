<?php

include_once("bean.config.php");

/**
 * Description of StoriesClass
 *
 * @author Mark
 */
class StoriesClass {

    private $stories_id;
    private $research_url_id;
    private $research_notes;
    private $research_sources;
    private $personal_history_text;
    private $personal_history_subject;
    private $personal_history_recorder;
    private $followup_email;
    private $verification_indicator;
    private $created_by;
    private $created_time;
    private $updated_by;
    private $updated_time;
    private $verified_by;
    private $verified_time;

    function getStories_id() {
        return $this->stories_id;
    }

    function getResearch_url_id() {
        return $this->research_url_id;
    }

    function getResearch_notes() {
        return addSingleQuote($this->research_notes);
    }

    function getResearch_sources() {
        return addSingleQuote($this->research_sources);
    }

    function getPersonal_history_text() {
        return addSingleQuote($this->personal_history_text);
    }

    function getPersonal_history_subject() {
        return addSingleQuote($this->personal_history_subject);
    }

    function getPersonal_history_recorder() {
        return addSingleQuote($this->personal_history_recorder);
    }

    function getFollowup_email() {
        return addSingleQuote($this->followup_email);
    }

    function getVerification_indicator() {
        return addSingleQuote($this->verification_indicator);
    }

    function getCreated_by() {
        return $this->created_by;
    }

    function getCreated_time() {
        return $this->created_time;
    }

    function getUpdated_by() {
        return $this->updated;
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

    function setStories_id($stories_id) {
        $this->stories_id = $stories_id;
    }

    function setResearch_url_id($research_url_id) {
        $this->research_url_id = $research_url_id;
    }

    function setResearch_notes($research_notes) {
        $this->research_notes = $research_notes;
    }

    function setResearch_sources($research_sources) {
        $this->research_sources = $research_sources;
    }

    function setPersonal_history_text($personal_history_text) {
        $this->personal_history_text = $personal_history_text;
    }

    function setPersonal_history_subject($personal_history_subject) {
        $this->personal_history_subject = $personal_history_subject;
    }

    function setPersonal_history_recorder($personal_history_recorder) {
        $this->personal_history_recorder = $personal_history_recorder;
    }

    function setFollowup_email($followup_email) {
        $this->followup_email = $followup_email;
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

        $sql = <<< SQL
            INSERT INTO unlandmark.stories
            (research_url_id,
            research_notes,
            research_sources,
            personal_history_text,
            personal_history_subject,
            personal_history_recorder,
            followup_email,
            verification_indicator)
                
            VALUES(
                {$this->getResearch_url_id()},
                {$this->getResearch_notes()},
                {$this->getResearch_sources()},
                {$this->getPersonal_history_text()},
                {$this->getPersonal_history_subject()},
                {$this->getPersonal_history_recorder()},
                {$this->getFollowup_email()},
                {$this->getVerification_indicator()}
            )
SQL;
        echo $sql . "<BR>";
        $results = pg_query(DBCONN, $sql);
        return $results;
    }
    public function select_all() {

        $sql = <<< SQL
            select 
            stories_id,
            research_url_id,
            research_notes,
            research_sources,
            personal_history_text,
            personal_history_subject,
            personal_history_recorder,
            followup_email,
            verification_indicator,
            created_by,
            created_time,
            updated_by,
            updated_time,
            verified_by,
            verified_time

             from unlandmark.stories   

SQL;
        echo $sql . "<BR>";
        $results = pg_query(DBCONN, $sql);
        return $results;
    }
}
