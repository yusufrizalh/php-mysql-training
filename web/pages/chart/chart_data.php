<?php
require_once "../../config/database.php";

$sql = "SELECT cat.cat_name AS cat_name, COUNT(cou.cou_id) AS count_of_courses_per_category FROM categories cat JOIN courses cou ON cou.fk_cat_id = cat.cat_id GROUP BY cat.cat_name;";
$result = $con->query($sql);
$jsonArray = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jsonArrayItem = array();
        $jsonArrayItem['label'] = $row['cat_name'];
        $jsonArrayItem['value'] = $row['count_of_courses_per_category'];
        array_push($jsonArray, $jsonArrayItem);
    }
}

$con->close();

header('Content-Type: application/json');
echo json_encode($jsonArray);
