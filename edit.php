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
<div style="display: block; height: 2px; width:100%"></div>
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

<form method="post" action="editaction.php" id="form">
<input class="btn" type="submit" style="margin: 0px;">
 <center><h2 class="bud-name" style="margin-top: 0px;"><script>document.write(budget)</script></h2></center> <br> 
 <input type="text" value="<?php echo $bTb?>" style="display: none;" name="Btb-input"><!-- Sends the tb name to be updated to the editaction.php--> 
<?php

$showSql="SELECT * FROM $bTb ";
$showQuery= mysqli_query($conn,$showSql);

$counter=0;
while($showRow=mysqli_fetch_array($showQuery)){
    if($counter!= 0){
        
    
    ?>
   
    <input type="text" name='<?php echo "item".$counter?>' value='<?php echo $showRow['1']?>' class="input">
    <input type="number" name='<?php echo "price".$counter?>' value='<?php echo $showRow['2']?>' class="input">
    <br>
    


<?php
$counter++;
 }
else{ ?> 
<input type="text" name='<?php echo "item".$counter?>' value='<?php echo $showRow['1']?>' class="input" readonly><!--TOTAL  -->
    <input type="number" name='<?php echo "price".$counter?>' value='<?php echo $showRow['2']?>' class="input"><br>
<?php }
}
?>

</form> 
<button class="add_item btn" style="margin-top: none; color : #323232" onclick="addItem()">Add Item</button>
</div></div>
</body>
<script>
   counter=<?php echo $counter;?>;
   const form=document.getElementById("form");
    /*form.addEventListener("submit",(e)=>{
       e.preventDefault();
       //console.log("Submitted");
      
       //echo''.$item1.''.$price1.'';
       
       console.log();
    })*/
function addItem(){ 
    
    
    let newItem= document.createElement('input');
    newItem.type="text";
    newItem.name="item"+counter;
    newItem.placeholder="Add Item Name";
    newItem.classList.add('input');
    //console.log(newItem.name) ;
    let newPrice= document.createElement('input');
    newPrice.type="number";
    newPrice.name="price"+counter;
    //console.log(newPrice.name) ;
    let br=document.createElement('br')
    newPrice.placeholder="Add Item Price"
    newPrice.classList.add('input');
    form.appendChild(newItem);
    form.appendChild(br);
    form.appendChild(newPrice);
    form.appendChild(br);
    counter=counter+1;
    
    


}

</script>
</html>