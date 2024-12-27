<?php
session_start();
include "connect.php"; 

$email = $_POST["email"];
$psswrd = $_POST["psswrd"];
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $db_psswrd = $row["psswrd"];
    
    if (password_verify($psswrd, $db_psswrd)) {
        $_SESSION["email"] = $email; // Store email in session for dashboard access
        header("Location: http://localhost/MiniProject/dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = 'Password is incorrect'; // Store error in session
        header("Location: http://localhost/MiniProject/login.php");
        exit();
    }
} else {
    $_SESSION['error'] = 'Email is incorrect'; // Store error in session
    header("Location: http://localhost/MiniProject/login.php");
    exit();
}
?>
