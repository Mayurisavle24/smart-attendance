<?php
session_start();
include "db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}

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

$filename = "Attendance_Report_" . date('Ymd') . ".csv";

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

$output = fopen('php://output', 'w');

fputcsv($output, array('Name', 'Date', 'Day', 'Week', 'Month', 'Year', 'Status'));

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $timestamp = strtotime($row['date']);
        $day = date('l', $timestamp);
        $week = date('W', $timestamp);
        $month = date('F', $timestamp);
        $year = date('Y', $timestamp);
        
        fputcsv($output, array($row['name'], $row['date'], $day, $week, $month, $year, $row['status']));
    }
}

fclose($output);
exit();
?>
