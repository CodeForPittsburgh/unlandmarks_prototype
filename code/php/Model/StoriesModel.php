<?php

include("StoriesClass.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//global $stories;
$stories = new StoriesClass();
add_new($stories);
get_all($stories);

function add_new($stories) {
    //global $stories;
    $stories->setResearch_url_id(3);
    $stories->setResearch_notes("NOTE3");
    $stories->setResearch_sources("SOURCES3");
    $stories->setPersonal_history_text("HISTORY3");
    $stories->setPersonal_history_subject("SUBJECT3");
    $stories->setPersonal_history_recorder("RECORDER3");
    $stories->setFollowup_email("myanme3@msn.com");
    $stories->setVerification_indicator("FALSE");


    $result = $stories->insert();
    echo "Result " . $result . "<BR>";
}

function get_all($stories) {
    //global $stories;
    $result = $stories->select_all();
    echo "Result " . $result . "<BR>";
    while ($row = pg_fetch_row($result)) {
        $stories_id = $row[0];
        $research_url_id = $row[1];
        $research_notes = $row[2];
        $research_sources = $row[3];
        $personal_history_text = $row[4];
        $personal_history_subject = $row[5];
        $personal_history_recorder = $row[6];
        $followup_email = $row[7];
        $verification_indicator = $row[8];
        $created_by = $row[9];
        $created_time = $row[10];
        $updated_by = $row[11];
        $updated_time = $row[12];
        $verified_by = $row[13];
        $verified_time = $row[14];

        echo 'stories_id: ' . $stories_id. "<BR>";
        echo 'research_url_id: ' . $research_url_id. "<BR>";
        echo 'research_notes: ' . $research_notes. "<BR>";
        echo 'research_sources: ' . $research_sources. "<BR>";
        echo 'personal_history_text: ' . $personal_history_text. "<BR>";
        echo 'personal_history_subject: ' . $personal_history_subject. "<BR>";
        echo 'personal_history_recorder: ' . $personal_history_recorder. "<BR>";
        echo 'followup_email: ' . $followup_email. "<BR>";
        echo 'verification_indicator: ' . $verification_indicator. "<BR>";
        echo 'created_by: ' . $created_by. "<BR>";
        echo 'created_time: ' . $created_time. "<BR>";
        echo 'updated_by: ' . $updated_by. "<BR>";
        echo 'updated_time: ' . $updated_time. "<BR>";
        echo 'verified_by: ' . $verified_by. "<BR>";
        echo 'verified_time: ' . $verified_time. "<BR>";
    }
}
