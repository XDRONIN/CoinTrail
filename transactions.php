<?php
session_start();
include("connect.php");
if (isset($_SESSION["tbname"])){//getting the user table name
    $tbname=$_SESSION["tbname"];
    //echo $tbname;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD TRANSACTIONS</title>
</head>
<link rel="stylesheet" href="transactions.css">
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
<body>
    <div class="navbar">
      <h2 class="logo">Coin<span class="span1">Trail</span></h2>
      <div class="profile">NAME</div>
    </div>
    <div class="container">
        <div class="img">
            <img src="transactions.jpg">
        </div>
        <div class="details"></div>
    </div>
</body>
</html>