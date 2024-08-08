<?php
session_start();
include("connect.php");
$tbname=$_SESSION['tbname'];
$name=$_SESSION['name'];
$pattern = $tbname."_";


$sql="SELECT table_name FROM information_schema.tables WHERE table_schema = '$db_name' AND table_name LIKE '$pattern%'";
$query=mysqli_query($conn,$sql);
//$row=mysqli_fetch_array($query);


?>
<script>
    let btb;
    let parts;
    let budget;
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget</title>
</head>
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
 <link rel="stylesheet" href="budget.css">
<body>
<div class="navbar">
<h2 class="logo">Coin<span class="span1">Trail</span></h2>
      <div class="profile"><?php echo $name?></div>
</div><div class="bud-details">
    <button onclick =" window.location.href='insertBudget.php'" class="add">ADD BUDGET</button>
    <h1 class="bud">Your&nbsp; <span style="color: #24977b;"> Budgets<span></h1></div>
    <div class="container">
    <?php 
    while($row=mysqli_fetch_array($query)){
        //echo $pattern;
       // echo "".$row["0"];
       $bTb=$row['0'];

    
    ?>
    <div class="card">
        <script> btb='<?php echo $bTb;?>';
         parts = btb.split('_');
         budget=parts.slice(2).join('');
        </script>
        <h2 class="bud-name"><script>document.write(budget)</script></h2><br>
    <?php 
        $cardSql="SELECT * FROM $bTb ";
        $cardQuery= mysqli_query($conn,$cardSql);
        $cardRow=mysqli_fetch_array($cardQuery);
        if($cardRow[0]==1){?>
        <h3 class="total"><?php  echo"".$cardRow["1"]." :   $".$cardRow["2"]."<br>";?></h3>
       <?php }
       
        while($cardRow=mysqli_fetch_array($cardQuery)){
            echo"".$cardRow["1"]." :   $".$cardRow["2"]."<br>";
        
}?>
<button class="dltButton"></button>
</div><?php } ?>
    
    
    
    </div>
</body>
</html>