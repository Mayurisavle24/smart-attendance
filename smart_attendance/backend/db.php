<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "attendance_db");

if (!$conn) {
    die("DB Connection Failed: " . mysqli_connect_error());
}
?>

