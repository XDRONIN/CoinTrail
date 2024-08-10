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
    let btb=[];//stores the balbe name of each budget
    let parts;
    let budget;
    let counter=0;//controls btb array
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
        <script> btb[counter]='<?php echo $bTb;?>';
         parts = btb[counter].split('_');
         budget=parts.slice(2).join('');
         console.log(btb[counter])
         counter++;
        </script>
        <form  method="post">
            <input type="text" name="Btb-input" class="Btb-input" style="display: none;"><!-- stores the table name of the particular budget for deletion/edit  not visble in DOM-->
        <center><h2 class="bud-name"><script>document.write(budget)</script></h2></center><br>
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
<div class="buttons">
<button class="dltButton" formaction="deletion.php"></button>
<button class="editButt" formaction="edit.php"></button></div>
</form>
</div><?php } ?>
    
    
    
    </div>
</body>
<script>
    let inputs=document.querySelectorAll('.Btb-input');//takes all the inputs in the array inputs
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].value=btb[i];//for each input field in inputs a values fron btb array (Budget table names) is given
        
    }
</script>
</html>