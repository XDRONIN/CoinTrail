<?php 
session_start();
include("connect.php");
if (isset($_SESSION["email"])){//getting the email from session
    $email = $_SESSION["email"];
    $idsql="SELECT id FROM users WHERE email='$email'";
    $idresult = mysqli_query($conn,$idsql);
    $idrow = mysqli_fetch_array($idresult);
   // echo"".$idrow["0"];
    $tbname="user_".$idrow[0];
   //echo $tbname;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="dashboard.css">
<body>
    <div class="navbar"></div>
    <div class="balance"></div>
    <div class="container">
      <div class="overview"></div>
      <div class="piechart"></div>
    </div>   
 
</body>
</html>