<?php
include "db.php";
$username = "admin";
$password = "admin123";
$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) === 1){
    echo "SUCCESS: Login credentials 'admin/admin123' are valid in the database.\n";
} else {
    echo "ERROR: Login credentials 'admin/admin123' NOT found or invalid.\n";
}
?>
