<?php
session_start();
include("connect.php");
$tbname=$_SESSION['tbname'];
$pattern = $tbname."_";


$sql="SELECT table_name FROM information_schema.tables WHERE table_schema = '$db_name' AND table_name LIKE '$pattern%'";
$query=mysqli_query($conn,$sql);
//$row=mysqli_fetch_array($query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget</title>
</head>
<body>
    <button onclick =" window.location.href='insertBudget.php'">ADD BUDGET</button>
    <div container>
    <?php 
    while($row=mysqli_fetch_array($query)){
        //echo $pattern;
       // echo "".$row["0"];
       $bTb=$row['0'];

    
    ?>
    <div class="card">
    <?php 
        $cardSql="SELECT * FROM $bTb WHERE id > 1";
        $cardQuery= mysqli_query($conn,$cardSql);
        while($cardRow=mysqli_fetch_array($cardQuery)){
            echo"".$cardRow["1"]." ".$cardRow["2"];
        
}?><br></div><?php } ?>
    
    
    
    </div>
</body>
</html>