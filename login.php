<?php
$error = isset($_GET['error']);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
  <h2>Login</h2>
  <p class="small">Enter your username and password to continue.</p>

  <?php if ($error) { ?>
    <div class="alert error">Credentials are wrong. Try again.</div>
  <?php } ?>

  <form action="login2.php" method="post">
    <label>User Name</label>
    <input type="text" name="username" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <div class="actions">
      <input type="submit" value="Login">
      <input type="reset" value="Reset">
    </div>
  </form>

  <p class="small">Sample users: <b>a/b</b> or <b>c/d</b></p>
</div>

</body>
</html>
