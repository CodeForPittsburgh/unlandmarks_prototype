<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function pg_main() {
    $database = "postgres";
    $hostname = "howe-hp";
    $username = "postgres";
    $password = "win95sux";
    $connect_timeout = 60;
    $port = 5432;


    $dbconn = pg_connect('host=' . $hostname . ' port=' . $port . ' dbname=' . $database . ' user=' . $username . ' password=' . $password . ' connect_timeout=' . $connect_timeout);
    return $dbconn;
}

function query_pg($dbconn, $SQL) {
    $result = pg_query($dbconn, $SQL);
    return $result;
//    while ($row = pg_fetch_row($result)) {
//
//        //$zone[$rowcount] = $row[0];
//        //$zonecounts[$rowcount] = $row[1];
//    }
}

function close_pg() {
    pg_close();
}
