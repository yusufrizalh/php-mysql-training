<?php

require_once "../../config/database.php";

if (isset($_GET['course_id']) && !empty(trim($_GET['course_id']))) {
    $course_id = $_GET['course_id'];
    $sql = "DELETE FROM courses WHERE cou_id = '$course_id'";

    if ($con->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Course was deleted!');</script>";
        echo "<script type='text/javascript'>location.href='http://localhost/training-php/web/pages/courses/index.php';</script>";
    } else {
        echo "Error: " . $sql . " - " . $con->error;
    }

    $con->close();
}
