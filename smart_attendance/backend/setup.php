<?php
include "db.php";

/* Admin table */
mysqli_query($conn, "
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100)
)
");

/* Students table */
mysqli_query($conn, "
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    roll_no VARCHAR(20),
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(15),
    class VARCHAR(50)
)
");

/* Attendance table */
mysqli_query($conn, "
CREATE TABLE IF NOT EXISTS attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    date DATE,
    status ENUM('Present','Absent'),
    FOREIGN KEY (student_id) REFERENCES students(id)
)
");

echo "All tables created successfully!";
?>
