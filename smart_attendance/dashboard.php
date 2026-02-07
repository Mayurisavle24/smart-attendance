<?php include "includes/header.php"; ?>


<div class="banner">
    <div class="banner-text">
        <h1>Vivekanand College Attendance Portal</h1>
        <p>Admin Dashboard - Academic Year <?php echo date("Y"); ?>-<?php echo date("y")+1; ?></p>
    </div>
</div>

<div class="cards">
    <div class="card">
        <h3><i class="fas fa-user-plus fa-3x" style="color:var(--primary-color)"></i></h3>
        <h3 style="margin-top:15px;">Add Student</h3>
        <a href="add_student.php">Add New</a>
    </div>

    <div class="card">
        <h3><i class="fas fa-clipboard-check fa-3x" style="color:var(--success)"></i></h3>
        <h3 style="margin-top:15px;">Mark Attendance</h3>
        <a href="mark_attendance.php">Mark Now</a>
    </div>

    <div class="card">
        <h3><i class="fas fa-users fa-3x" style="color:var(--secondary-color)"></i></h3>
        <h3 style="margin-top:15px;">View Students</h3>
        <a href="view_student.php">View List</a>
    </div>

    <div class="card">
        <h3><i class="fas fa-chart-line fa-3x" style="color:var(--danger)"></i></h3>
        <h3 style="margin-top:15px;">Attendance Report</h3>
        <a href="attendance_report.php">Check Report</a>
    </div>
</div>

<?php include "includes/footer.php"; ?>





