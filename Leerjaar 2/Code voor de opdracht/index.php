<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome to the Website</h1>

    <?php if (isset($_SESSION['username'])): ?>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! You are logged in.</p>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <p>You are not logged in. <a href="login_form.php">Login here</a></p>
    <?php endif; ?>
</body>
</html>