<?php
// properties
$host = "127.0.0.1";    // ip loopback (localhost)
$user = "root";         // typical user root
$password = "";         // typical password null
$database = "db_phpmysql";
// create new connection between php and mysql
$con = new mysqli(
    $host,
    $user,
    $password,
    $database
);
// connection check
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    // echo "<h1>Connection succeed</h1>";
}
