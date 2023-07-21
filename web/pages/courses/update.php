<?php

require_once "../../config/database.php";

if (isset($_POST['update'])) {
    $cou_id = $_POST['course_id'];
    $cou_name = $_POST['cou_name'];
    $cou_price = $_POST['cou_price'];
    $cou_duration = $_POST['cou_duration'];
    $cou_description = $_POST['cou_description'];
    $fk_cat_id = $_POST['fk_cat_id'];

    $sql = "UPDATE courses SET cou_name = '$cou_name', cou_price = '$cou_price', cou_duration = '$cou_duration', cou_description = '$cou_description', fk_cat_id = '$fk_cat_id' WHERE cou_id = '$cou_id'";

    if ($con->query($sql) == TRUE) {
        // echo "Course was updated";
        echo "<script type='text/javascript'>alert('Course was updated');</script>";
        echo "<script type='text/javascript'>location.href='http://localhost/training-php/web/pages/courses/index.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Course failed to updated');</script>";
    }

    $con->close();
}
