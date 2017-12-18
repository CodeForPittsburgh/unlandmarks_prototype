<?php

include '../Model/LandmarkTypeClass.php';
$unlandmark_type = new LandmarkTypeClass();

$result = $unlandmark_type->select_all_landmark_types();

echo '<table border="1" cellspacing="2" cellpadding="2">';
echo "<tr>";
echo "<th>Description</th>";
echo "<th>Displayed?</th>";
echo "</tr>";

while ($row = pg_fetch_row($result)) {
    $id = $row[0];
    $description = $row[1];
    $verification = $row[2];
    echo "<tr>";

    echo "<td>$description </td>";
    if ($verification === 't') {
        echo '<td><input type="checkbox"  id="id'.$id.'" checked/></td>';
    } else {
        echo '<td><input type="checkbox"  id="id'.$id.'" unchecked/></td>';
    }
}

echo "</table>";
