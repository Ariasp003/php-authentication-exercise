<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>My Secret</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
  <h2>My Secret</h2>
  <p class="small">Only logged-in users can see this.</p>

  <?php
    $sec = rand(1, 5);
    $msg = "";

    switch ($sec) {
      case 1: $msg = "I'm 50 years old."; break;
      case 2: $msg = "My favorite color is Blue."; break;
      case 3: $msg = "My pet animal is a Dolphin."; break;
      case 4: $msg = "I live in Iskele."; break;
      case 5: $msg = "My secret hobby is Playing Football."; break;
    }
  ?>

  <div class="alert success"><?php echo htmlspecialchars($msg); ?></div>

  <a class="link" href="menu.php">← Back to Menu</a>
</div>

</body>
</html>
