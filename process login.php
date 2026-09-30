<?php
session_start();
require 'db_connect.php';
​if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = $_POST['username'];
$password = $_POST['password'];
​// In a real application, you would hash and verify passwords
// For this example, we will assume a simple check against fixed values
if ($username === 'teacher' && $password === 'password123') {
$_SESSION['teacher_logged_in'] = true;
header("Location: attendance.php");
exit();
} else {
echo "Invalid username or password.";
}
}
?>
