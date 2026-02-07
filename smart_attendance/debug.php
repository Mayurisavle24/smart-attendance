<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>System Diagnostic Tool</h1>";

// 1. PHP Check
echo "<h3>1. PHP Status</h3>";
echo "PHP Version: " . phpversion() . "<br>";
echo "Current File: " . __FILE__ . "<br>";

// 2. Database Check
echo "<h3>2. Database Status</h3>";
$host = "localhost";
$user = "root";
$pass = "";
$db = "attendance_db";

$conn = @mysqli_connect($host, $user, $pass);
if (!$conn) {
    echo "<span style='color:red;'>FAILED: Cannot connect to MySQL Server (Host/User/Pass incorrect)</span><br>";
} else {
    echo "<span style='color:green;'>SUCCESS: Connected to MySQL Server</span><br>";
    if (!@mysqli_select_db($conn, $db)) {
        echo "<span style='color:red;'>FAILED: Connected to Server, but Database '$db' NOT FOUND</span><br>";
    } else {
        echo "<span style='color:green;'>SUCCESS: Database '$db' found and accessible</span><br>";
        
        $res = mysqli_query($conn, "SELECT COUNT(*) as count FROM admin");
        if ($res) {
            $row = mysqli_fetch_assoc($res);
            echo "Admin Table Check: Success (" . $row['count'] . " records found)<br>";
        } else {
            echo "<span style='color:red;'>FAILED: Admin table missing or inaccessible</span><br>";
        }
    }
}

// 3. Session Check
echo "<h3>3. Session Status</h3>";
if (session_start()) {
    echo "<span style='color:green;'>SUCCESS: Session started successfully</span><br>";
    $_SESSION['debug_test'] = "working";
    echo "Session Test Value Set: " . $_SESSION['debug_test'] . "<br>";
} else {
    echo "<span style='color:red;'>FAILED: Session could not be started</span><br>";
}

// 4. File Structure Check
echo "<h3>4. File Path Check</h3>";
$files = ['index.php', 'dashboard.php', 'css/style.css', 'backend/login_check.php', 'includes/header.php'];
foreach ($files as $f) {
    if (file_exists($f)) {
        echo "<span style='color:green;'>FOUND: $f</span><br>";
    } else {
        echo "<span style='color:red;'>MISSING: $f</span><br>";
    }
}

echo "<hr><p>Please tell me which section shows an error (RED text) above.</p>";
?>
