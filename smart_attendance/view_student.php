<?php
include "includes/header.php";
include "backend/db.php";

$result = mysqli_query($conn, "SELECT * FROM students");
?>

<div class="table-container">
    <h2 style="margin-bottom:20px; color:var(--primary-dark);">Student List</h2>

    <table>
    <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Roll No</th>
      <th>Class</th>
      <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['roll_no']; ?></td>
      <td><?php echo $row['class']; ?></td>
      <td><?php echo $row['email']; ?></td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
</div>

<?php include "includes/footer.php"; ?>
