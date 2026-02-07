<?php
// Suppress output buffering to see errors immediately
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "--- STARTING SYSTEM HEALTH CHECK ---\n";

// 1. Check DB Connection
echo "[1] Checking Database Connection...\n";
include 'db.php';
if ($conn) {
    echo "SUCCESS: Connected to database 'attendance_db'.\n";
} else {
    echo "ERROR: Database connection failed.\n";
    exit(1);
}

// 2. Check Tables
echo "\n[2] Checking Tables...\n";
$tables = ['admin', 'students', 'attendance'];
foreach ($tables as $table) {
    if (mysqli_query($conn, "SELECT 1 FROM $table LIMIT 1")) {
        echo "SUCCESS: Table '$table' exists and is accessible.\n";
    } else {
        echo "ERROR: Table '$table' check failed. " . mysqli_error($conn) . "\n";
    }
}

// 3. Check Session Directory Writability
echo "\n[3] Checking Session Configuration...\n";
$sessionPath = session_save_path();
if (empty($sessionPath)) {
    $sessionPath = sys_get_temp_dir(); // Fallback if none set
}
echo "Session Path: $sessionPath\n";
if (is_writable($sessionPath)) {
    echo "SUCCESS: Session path is writable.\n";
} else {
    echo "WARNING: Session path might not be writable. Login might fail.\n";
}

echo "\n--- HEALTH CHECK COMPLETE ---\n";
?>
