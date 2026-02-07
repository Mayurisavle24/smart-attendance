<?php
include "backend/db.php";


// Filters
$filter_date = $_GET['date'] ?? '';
$filter_month = $_GET['month'] ?? '';
$filter_year = $_GET['year'] ?? '';

$query = "SELECT students.name, attendance.date, attendance.status
          FROM attendance
          JOIN students ON attendance.student_id = students.id
          WHERE 1=1";

if (!empty($filter_date)) {
    $query .= " AND attendance.date = '$filter_date'";
}
if (!empty($filter_month)) {
    $query .= " AND MONTH(attendance.date) = '$filter_month'";
}
if (!empty($filter_year)) {
    $query .= " AND YEAR(attendance.date) = '$filter_year'";
}

$query .= " ORDER BY attendance.date DESC";

$result = mysqli_query($conn, $query);
?>
<?php include "includes/header.php"; ?>

<div class="table-container">
    <h2 style="margin-bottom:20px; color:var(--primary-dark);">Attendance Report</h2>

    <!-- Filter Form -->
    <form method="GET" style="margin-bottom: 20px; display: flex; gap: 10px; flex-wrap: wrap; background: #f1f3f5; padding: 15px; border-radius: 8px;">
        <div style="flex:1; min-width: 150px;">
            <label style="font-size:12px; font-weight:600; color:#555;">Date</label>
            <input type="date" name="date" value="<?php echo $filter_date; ?>" style="margin-bottom:0;">
        </div>
        
        <div style="flex:1; min-width: 150px;">
            <label style="font-size:12px; font-weight:600; color:#555;">Month</label>
            <select name="month" style="margin-bottom:0;">
                <option value="">All Months</option>
                <?php
                for($m=1; $m<=12; $m++){
                    $selected = ($filter_month == $m) ? 'selected' : '';
                    echo "<option value='$m' $selected>" . date('F', mktime(0,0,0,$m,1)) . "</option>";
                }
                ?>
            </select>
        </div>

        <div style="flex:1; min-width: 150px;">
            <label style="font-size:12px; font-weight:600; color:#555;">Year</label>
            <select name="year" style="margin-bottom:0;">
                <option value="">All Years</option>
                <?php
                $current_year = date("Y");
                for($y=$current_year; $y>=$current_year-5; $y--){
                   $selected = ($filter_year == $y) ? 'selected' : '';
                   echo "<option value='$y' $selected>$y</option>";
                }
                ?>
            </select>
        </div>

        <div style="display:flex; align-items:end;">
            <button type="submit" class="btn-submit" style="padding: 10px 20px; margin-bottom:0;">Filter</button>
            <a href="attendance_report.php" style="margin-left:10px; padding: 10px 15px; background:#6c757d; color:white; border-radius:8px; display:inline-block; font-size:14px; font-weight:600;">Reset</a>
        </div>
    </form>
    
    <div style="text-align: right; margin-bottom: 15px;">
        <a href="backend/export_csv.php?date=<?php echo $filter_date; ?>&month=<?php echo $filter_month; ?>&year=<?php echo $filter_year; ?>" class="btn-submit" style="background-color: var(--success); text-decoration: none; padding: 10px 20px; color: white; border-radius: 8px; font-weight: 600; display: inline-flex; align-items: center;">
            <i class="fas fa-file-csv" style="margin-right: 8px;"></i> Export to CSV
        </a>
    </div>

    <table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Date</th>
        <th>Day</th>
        <th>Week</th>
        <th>Month</th>
        <th>Year</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) { 
            $timestamp = strtotime($row['date']);
            $day = date('l', $timestamp);
            $week = date('W', $timestamp);
            $month = date('F', $timestamp);
            $year = date('Y', $timestamp);
    ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $day; ?></td>
        <td><?php echo $week; ?></td>
        <td><?php echo $month; ?></td>
        <td><?php echo $year; ?></td>
        <td>
            <span style="color: <?php echo ($row['status']=='Present')?'green':'red'; ?>; font-weight:bold;">
                <?php echo $row['status']; ?>
            </span>
        </td>
    </tr>
    <?php 
        } 
    } else {
        echo "<tr><td colspan='7' style='text-align:center;'>No records found</td></tr>";
    }
    ?>
    </tbody>
    </table>
</div>

<?php include "includes/footer.php"; ?>
