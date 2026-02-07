<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "db.php";

if(!isset($_SESSION['admin'])){
    header("Location: ../index.php");
    exit();
}

$name    = $_POST['name'];
$roll_no = $_POST['roll_no'];
$class   = $_POST['class'];
$email   = $_POST['email'];
$phone   = $_POST['phone'];

$sql = "INSERT INTO students (name, roll_no, class, email, phone)
        VALUES ('$name', '$roll_no', '$class', '$email', '$phone')";

if(mysqli_query($conn, $sql)){
    header("Location: ../add_student.php?success=1");
} else {
    die("Error: " . mysqli_error($conn));
}
?>
