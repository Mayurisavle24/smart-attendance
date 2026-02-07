<?php
include 'db.php';
$res = mysqli_query($conn, "SELECT username, password FROM admin");
while($row = mysqli_fetch_assoc($res)) {
    echo "User: " . $row['username'] . " | Pass: " . $row['password'] . "\n";
}
?>
