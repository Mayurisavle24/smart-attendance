<?php
include "db.php";

$username = "admin";
$password = "admin123";

// Check if admin exists
$check = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");

if (mysqli_num_rows($check) > 0) {
    // Update
    $sql = "UPDATE admin SET password='$password' WHERE username='$username'";
    if (mysqli_query($conn, $sql)) {
        echo "Admin password updated to '$password'.\n";
    } else {
        echo "Error updating password: " . mysqli_error($conn) . "\n";
    }
} else {
    // Insert
    $sql = "INSERT INTO admin (username, password, email) VALUES ('$username', '$password', 'admin@example.com')";
    if (mysqli_query($conn, $sql)) {
        echo "Admin user created with password '$password'.\n";
    } else {
        echo "Error creating admin: " . mysqli_error($conn) . "\n";
    }
}
?>
