<?php
 include("connect.php");
 $countSql="SELECT COUNT(name) FROM users;";
 $countQuery=mysqli_query($conn,$countSql);
 $countResult=mysqli_fetch_array($countQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
 <link rel="stylesheet" href="adDash.css">
 
<body>
<div class="navbar">
        <a href="dashboard.php">Home</a>
      <h2 class="logo">Coin<span class="span1">Trail</span></h2>
     
      <div class="profile">Admin</div>
      
    </div>  
    <div>
        <p>User Count : <?php echo $countResult[0];?></p>
    </div>
</body>
</html>