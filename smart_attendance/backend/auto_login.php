<?php
session_start();
$_SESSION['admin'] = 'admin';
header("Location: ../dashboard.php");
exit();
?>
