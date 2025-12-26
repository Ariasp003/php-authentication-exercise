<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Menu</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
  <h2>Menu</h2>
  <p class="small">Welcome, <b><?php echo htmlspecialchars($user); ?></b></p>

  <div class="nav">
  <a href="addrecord.php">Add a record</a>
  <a href="viewusers.php">View Users</a>
  <a href="mysecret.php">MySecret</a>
  <a href="logout.php">Logout</a>
</div>

</div>

</body>
</html>
