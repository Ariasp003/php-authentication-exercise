<?php
session_start();

// protect page
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// connect DB
$conn = mysqli_connect("localhost", "root", "", "lab10");
if (!$conn) {
    exit("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT username FROM users";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Available Users</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
  <h2>Available Users</h2>
  <p class="small">List of users registered in the system.</p>

  <?php if ($result && mysqli_num_rows($result) > 0) { ?>
    <table style="width:100%; border-collapse:collapse;">
      <tr style="background:#f1f5f9;">
        <th style="text-align:left; padding:10px; border:1px solid #e5e7eb;">#</th>
        <th style="text-align:left; padding:10px; border:1px solid #e5e7eb;">Username</th>
      </tr>

      <?php
      $i = 1;
      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td style='padding:10px; border:1px solid #e5e7eb;'>".$i."</td>";
          echo "<td style='padding:10px; border:1px solid #e5e7eb;'>".htmlspecialchars($row['username'])."</td>";
          echo "</tr>";
          $i++;
      }
      ?>
    </table>
  <?php } else { ?>
    <div class="alert error">No users found.</div>
  <?php } ?>

  <br>
  <a class="btn secondary" href="menu.php">← Back to Menu</a>
</div>

</body>
</html>

<?php mysqli_close($conn); ?>
