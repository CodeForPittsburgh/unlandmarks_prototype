<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../Controller/DBConnectController.php';
$conn = pg_main();
$SQL = "SELECT * FROM unlandmark.landmark_type order by landmark_type_description";
$result = query_pg($conn, $SQL);


echo "<select id='former_landmark_type'>";

while ($row = pg_fetch_row($result)) {

    $id = $row[0];
    $name = $row[1];
    echo '<option value="' . $id . '">' . $name . '</option>';
}

echo "</select>";

echo "<p>Date ended - calendar</p>";
echo "<p>Please enter a short description of the Unlandmark</p>";
echo "  <form>";
echo '    <div class="form-group">';
echo '     <label for="comment">Comment:</label>';
echo '      <textarea class="form-control" rows="5" id="unlandmark_description"></textarea>';
echo '    </div>';
echo '  </form>';
echo "<p>Unlandmark current location type - pull down</p>";

echo "<select id='current_landmark_type'>";
$result2 = query_pg($conn, $SQL);
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