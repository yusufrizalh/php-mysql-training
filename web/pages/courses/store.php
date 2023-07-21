<?php

require_once "../../config/database.php";

if (isset($_POST['save'])) {
    $cou_name = $_POST['cou_name'];
    $cou_price = $_POST['cou_price'];
    $cou_duration = $_POST['cou_duration'];
    $cou_description = $_POST['cou_description'];
    $fk_cat_id = $_POST['fk_cat_id'];

    $sql = "INSERT INTO courses(cou_name, cou_price, cou_duration, cou_description, fk_cat_id) VALUES('$cou_name', '$cou_price', '$cou_duration', '$cou_description', '$fk_cat_id')";

    if ($con->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('New course was stored');</script>";
        echo "<script type='text/javascript'>location.href='http://localhost/training-php/web/pages/courses/index.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('New course failed to stored');</script>";
    }

    $con->close();
}
