<?php include "includes/header.php"; ?>

<div class="form-container">
    <h2 style="margin-bottom:20px; color:var(--primary-dark);">Add New Student</h2>

    <form action="backend/add_student.php" method="post">
        <label>Student Name</label>
        <input type="text" name="name" required placeholder="Enter full name">

        <label>Roll Number</label>
        <input type="text" name="roll_no" required placeholder="Ex: 101">

        <label>Phone</label>
        <input type="text" name="phone" required placeholder="Confidential">

        <label>Email</label>
        <input type="email" name="email" required placeholder="student@example.com">

        <label>Class/Course</label>
        <input type="text" name="class" required placeholder="Ex: BCA 1st Year">

        <button type="submit" class="btn-submit">Add Student</button>
    </form>
</div>

<?php
if(isset($_GET['success'])){
    echo "<p style='color:green;'>Student Added Successfully</p>";
}
?>

<?php include "includes/footer.php"; ?>




                                                                                                      