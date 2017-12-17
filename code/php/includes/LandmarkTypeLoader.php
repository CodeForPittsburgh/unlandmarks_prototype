<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../Controller/DBConnectController.php';
include '../Model/LandmarkTypeClass.php';


global $landmarktype;
$landmarktype = new LandmarkTypeClass();
//$result = $landmarktype->select_landmark_type_description();

$landmark_type_id[0] = 'former_landmark_type';
$landmark_type_id[1] = 'current_landmark_type';
$row_id[0] = 'original_description';
$row_id[1] = 'current_description';
$message[0] = 'Please enter a short description of the Unlandmark original location';
$message[1] = 'Please enter a short description of the Unlandmark current location';
$pulldown[0] = 'Unlandmark location type - pull down';
$pulldown[1] = 'Unlandmark current location type - pull down';
//$conn = pg_main();
//$SQL = "SELECT * FROM unlandmark.landmark_type order by landmark_type_description";
//$result = query_pg($conn, $SQL);

for ($x = 0; $x < 2; $x++) {
    echo '<div class="col-sm-4">';

    echo '<p>' . $pulldown[$x] . '</p>';

    echo "<select id=" . $landmark_type_id[$x] . ">";
    $result = $landmarktype->select_landmark_type_description();
    while ($row = pg_fetch_row($result)) {

        $id = $row[0];
        $name = $row[1];
        echo '<option value="' . $id . '">' . $name . '</option>';
    }

    echo "</select>";

    echo "<p>" . $message[$x] . "</p>";
    echo "  <form>";
    echo '    <div class="form-group">';
    echo '     <label for="comment">Comment:</label>';
    echo '      <textarea class="form-control" rows="5" id="' . $row_id[$x] . '"></textarea>';
    echo '    </div>';
    echo '  </form>';

    if ($x === 0) {
        echo '</div>';
    }
    if ($x === 1) {
        echo '<p>Need code to handle when ready to save</p>';
        echo '<button id="Enable" type="button" onclick="enableButton()">Enable &raquo;</button>';

        echo '<button id="Save" type="button" disabled onclick="msgme()">Save &raquo;</button>';
        echo '</div>';
    }
}

