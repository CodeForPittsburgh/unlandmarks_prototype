<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//include '../Model/LandmarkTypeClass.php';


//global $landmarktype;
$landmarktype2 = new LandmarkTypeClass();
$result2 = $landmarktype2->select_landmark_type_description();
//$SQL = "SELECT * FROM unlandmark.landmark_type order by landmark_type_description";

echo "<select id='current_landmark_type'>";
//$result2 = query_pg($conn, $SQL);
while ($row = pg_fetch_row($result2)) {

    $id = $row[0];
    $name = $row[1];
    echo '<option value="' . $id . '">' . $name . '</option>';
}
echo "</select>";
echo "<p>Please enter a short description of the Unlandmark current location</p>";
echo "  <form>";
echo '    <div class="form-group">';
echo '     <label for="comment">Comment:</label>';
echo '      <textarea class="form-control" rows="5" id="current_description"></textarea>';
echo '    </div>';
echo '  </form>';