<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['admin'])){
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Attendance Admin</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<button class="mobile-nav-toggle" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i>
</button>

<div class="sidebar" id="sidebar">
    <div style="margin-bottom: 30px;">
        <a href="dashboard.php" style="text-decoration:none; display: flex; align-items: center; gap: 10px;">
            <img src="images/logo.png" alt="Logo" style="width: 50px; height: auto; filter: drop-shadow(0px 2px 4px rgba(0,0,0,0.1));">
            <h2 style="color:#0033cc; font-size: 16px; font-weight: 800; text-transform: uppercase; line-height: 1.2; margin: 0; text-align: left;">
                Vivekanand<br>College
            </h2>
        </a>
    </div>
    <a href="dashboard.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>"><i class="fas fa-home"></i> Dashboard</a>
    <a href="view_student.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'view_student.php' ? 'active' : ''; ?>"><i class="fas fa-users"></i> View Students</a>
    <a href="add_student.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'add_student.php' ? 'active' : ''; ?>"><i class="fas fa-user-plus"></i> Add Student</a>
    <a href="mark_attendance.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'mark_attendance.php' ? 'active' : ''; ?>"><i class="fas fa-check-circle"></i> Mark Attendance</a>
    <a href="attendance_report.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'attendance_report.php' ? 'active' : ''; ?>"><i class="fas fa-chart-bar"></i> Attendance Report</a>
    <a href="about.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>"><i class="fas fa-info-circle"></i> About College</a>
    <a href="backend/logout.php" style="margin-top:auto; color:var(--danger);"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<div class="main">

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('active');
    }
</script>
