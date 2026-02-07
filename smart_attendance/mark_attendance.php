<?php
session_start();
include "backend/db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}

$students = mysqli_query($conn, "SELECT * FROM students");

if (isset($_POST['submit'])) {
    $date = date("Y-m-d");
    foreach ($_POST['status'] as $id => $status) {
        mysqli_query($conn,
            "INSERT INTO attendance (student_id, date, status)
             VALUES ('$id','$date','$status')");
    }
    $success_msg = "Attendance marked successfully for $date";
}
?>
<?php include "includes/header.php"; ?>

<div class="form-container">
    <h2 style="margin-bottom:20px; color:var(--primary-dark);">Mark Attendance</h2>
    
    <?php if(isset($success_msg)): ?>
        <div style="background:#d4edda; color:#155724; padding:10px; border-radius:5px; margin-bottom:15px;">
            <?php echo $success_msg; ?>
        </div>
    <?php endif; ?>

    <form method="POST">
    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($students)) { ?>
            <tr>
                <td><?php echo $row['name']; ?> (<?php echo $row['roll_no']; ?>)</td>
                <td>
                    <select name="status[<?php echo $row['id']; ?>]">
                        <option value="Present">Present</option>
                        <option value="Absent">Absent</option>
                    </select>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <br>
    <button name="submit" class="btn-submit">Submit Attendance</button>
    </form>
</div>

<?php include "includes/footer.php"; ?>


