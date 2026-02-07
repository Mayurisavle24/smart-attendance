<?php
include "db.php";

$query = "SHOW COLUMNS FROM students LIKE 'class'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    echo "Column 'class' missing. Adding it now...\n";
    $alter = "ALTER TABLE students ADD COLUMN class VARCHAR(50) AFTER phone";
    if (mysqli_query($conn, $alter)) {
        echo "Column 'class' added successfully.\n";
    } else {
        echo "Error adding column: " . mysqli_error($conn) . "\n";
    }
} else {
    echo "Column 'class' already exists.\n";
}
?>
