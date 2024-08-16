<?php
session_start();
include("connect.php");
$tbname=$_SESSION['tbname'];
$name=$_SESSION['name'];
$tranSql="SELECT COD,amount,DOT,catogory,scatogory FROM $tbname ORDER BY id DESC";
$tranResult = mysqli_query($conn,$tranSql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Entries</title>
</head>
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
 <link rel="stylesheet" href="view.css">
<body>
<div class="navbar">
        <a href="dashboard.php">Home</a>
      <h2 class="logo">Coin<span class="span1">Trail</span></h2>
     
      <div class="profile"><?php echo $name?></div>
    </div>  
    <div class="options">
    <label for="catogory">Choose a Catogory:</label>

<select name="catogory" id="catogory">
  <option value="Essentials">Essentials</option>
  <option value="Bills">Bills</option>
  <option value="Savings">Savings</option>
  <option value="Others">Others</option>
</select>
    </div>
    <div class="transactions">
        <center><h2 class="tranHead">Last Entries:</h2><br></center>
        <?php 
        $i==1;
         while ( $tranRow = mysqli_fetch_array($tranResult)) {
         
          if($tranRow[0]=="debit" ){
            
          if($tranRow[3]=="Essentials"){
            echo "<div class='tranRow' style='background-color: #FA5555;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div><br>";
          }
          else if($tranRow[3]== "Bills"){
            echo "<div class='tranRow' style='background-color: #F7FB76;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div><br>";
          }
          else if($tranRow[3]== "Savings"){
            echo "<div class='tranRow' style='background-color: #8DED8E;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div><br>";
          }
          else if($tranRow[3]== "Others"){
            echo "<div class='tranRow' style='background-color: #2D7D8F;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div><br>";
          }
          

        }
          elseif($tranRow[0]=="credit" ){
            echo "<div class='tranRow' style='background-color: #24977b;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]."</div><br>";}
            $i++;
           }
        
        
        ?>
      </div>
</body>
</html>