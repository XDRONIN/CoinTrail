<?php
session_start();
include("connect.php");
$tbname=$_SESSION['tbname'];
$name=$_SESSION['name'];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT TRANSACTIONS</title>
</head>
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
 <link rel="stylesheet" href="editTransaction.css">
 
<body>
<div class="navbar">
        <a href="dashboard.php">Home</a>
      <h2 class="logo">Coin<span class="span1">Trail</span></h2>
     
      <div class="profile"><?php echo $name?></div>
    </div>  
    <div>
    <?php $id=$_POST['id'];
    //echo ''.$id.'';
    $sql="SELECT * FROM $tbname WHERE ID='$id'";
    $query=mysqli_query($conn,$sql);
    $result=mysqli_fetch_array($query);
   //echo $result[2];
    if($result[1]=='credit'){
    ?>
    <div class="container">
    <div class="card">
      <center><h2>Credit</h2></center>
    <form method="post" action="updateTransaction.php" >
    <b>Amount:</b><input type="number" name='amount' value='<?php echo $result[2]?>' class="input"><br>
   <b> Date:</b> &nbsp; &nbsp;   &nbsp;  <input type="date" name='date' value='<?php echo $result[5]?>' class="input"><br>
   <center> <input class="btn" type="submit"></center>
    </form>
    </div>
    </div>
    <?php } ?>
   <?php if($result[1]=='debit'){
    ?>
    <div class="container">
    
    <div class="card" style="padding: 50px;">
      <center><h2>Debit</h2></center>
    <form method="post" action="updateTransaction.php" >
    <b>Amount:</b><input type="number" name='amount' value='<?php echo $result[2]?>' class="input"><br>
    <b>Catogory:</b><input type="text" name='catogory' value='<?php echo $result[3]?>' class="input"><br>
    <b>Sub-Catogory:</b><input type="text" name='scatogory' value='<?php echo $result[4]?>' class="input"><br>
    
   <b> Date:</b> &nbsp;&nbsp;&nbsp;  <input type="date" name='date' value='<?php echo $result[5]?>' class="input"><br>
   <center> <input class="btn" type="submit"></center>
    </form>
    </div>
    </div>
    <?php } ?>
    </div>
</body>
</html>