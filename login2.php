<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "lab10");
if (!$conn) {
    exit("Connection failed: " . mysqli_connect_error());
}

$username = isset($_POST['username']) ? trim($_POST['username']) : "";
$password = isset($_POST['password']) ? trim($_POST['password']) : "";

if ($username === "" || $password === "") {
    header("Location: login.php?error=1");
    exit();
}

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $_SESSION['user'] = $username;
    header("Location: menu.php");
} else {
    header("Location: login.php?error=1");
}

mysqli_close($conn);
exit();
?>
