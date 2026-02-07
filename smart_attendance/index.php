<?php
session_start();
if(isset($_SESSION['admin'])){
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Smart Attendance System - Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="auth-page">

<?php if(isset($_GET['error'])): ?>
    <div style="position:fixed; top:20px; left:50%; transform:translateX(-50%); background:var(--danger); color:white; padding:10px 20px; border-radius:8px; z-index:1000; box-shadow:var(--shadow-md);">
        Invalid Username or Password!
    </div>
<?php endif; ?>

<?php if(isset($_GET['logout'])): ?>
    <div style="position:fixed; top:20px; left:50%; transform:translateX(-50%); background:var(--success); color:white; padding:10px 20px; border-radius:8px; z-index:1000; box-shadow:var(--shadow-md);">
        Successfully Logged Out!
    </div>
    <script>setTimeout(() => { window.location.href='index.php'; }, 3000);</script>
<?php endif; ?>

<div class="login-box">
    <h2><i class="fas fa-user-shield"></i> Admin Login</h2>
    <p style="text-align:center; color:#666; margin-bottom:20px;">Smart Attendance System</p>

    <form action="backend/login_check.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>






