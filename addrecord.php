<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$msg = "";
$msgClass = "";

if (isset($_POST['save'])) {

    $newUser = isset($_POST['newUser']) ? trim($_POST['newUser']) : "";
    $newPass = isset($_POST['newPass']) ? trim($_POST['newPass']) : "";

    if ($newUser === "" || $newPass === "") {
        $msg = "Please fill all fields.";
        $msgClass = "error";
    } else {

        $conn = mysqli_connect("localhost", "root", "", "lab10");
        if (!$conn) {
            exit("Connection failed: " . mysqli_connect_error());
        }

        // Check duplicate username
        $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$newUser'");

        if ($check && mysqli_num_rows($check) > 0) {
            $msg = "Username already exists!";
            $msgClass = "error";
        } else {
            $sql = "INSERT INTO users (username, password) VALUES ('$newUser', '$newPass')";
            $res = mysqli_query($conn, $sql);

            if ($res) {
                $msg = "Record added successfully!";
                $msgClass = "success";
            } else {
                $msg = "Insert failed: " . mysqli_error($conn);
                $msgClass = "error";
            }
        }

        mysqli_close($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Add Record</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
  <h2>Add a record</h2>
  <p class="small">Create a new user in the system.</p>

  <?php if ($msg !== "") { ?>
    <div class="alert <?php echo $msgClass; ?>">
      <?php echo htmlspecialchars($msg); ?>
    </div>
  <?php } ?>

  <form method="post" action="addrecord.php">
    <label>New Username</label>
    <input type="text" name="newUser" required>

    <label>New Password</label>
    <input type="text" name="newPass" required>

    <div class="actions">
      <input type="submit" name="save" value="Save">
      <a class="btn secondary" href="menu.php">Back</a>
    </div>
  </form>
</div>

</body>
</html>
