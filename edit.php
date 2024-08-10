<?php
session_start();
$name=$_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="edit.css">
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
      <div class="profile"><?php echo $name?></div>
</div>

<?php
include('connect.php'); 
$bTb=$_POST['Btb-input'];
//echo''.$bTb.'';?>
<script> btb='<?php echo $bTb;?>';
         parts = btb.split('_');
         budget=parts.slice(2).join('');
         //console.log(btb)
         
        </script>
<div class="container">
<div class="card">
<h2 class="bud-name"><script>document.write(budget)</script></h2><br>
<form method="post" action="editaction.php" id="form">
        
<?php

$showSql="SELECT * FROM $bTb ";
$showQuery= mysqli_query($conn,$showSql);
$showRow=mysqli_fetch_array($showQuery);
$counter=0;
while($showRow=mysqli_fetch_array($showQuery)){
    ?>
    <input type="text" name='<?php echo "item".$counter?>' value='<?php echo $showRow['1']?>' class="input">
    <input type="number" name='<?php echo "price".$counter?>' value='<?php echo $showRow['2']?>' class="input">
    <br>
    


<?php }
?>
<center><input class="btn" type="submit" style="margin-bottom: none;"></center>
</form> 
<button class="add_item btn" style="margin-top: none; color : #323232" onclick="addItem()">Add Item</button>
</div></div>
</body>

</html>