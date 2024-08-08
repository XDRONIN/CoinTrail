<?php
session_start();
 $name=$_SESSION['name'];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
 <link rel="stylesheet" href="insertBudget.css">
<body>
<div class="navbar">
<h2 class="logo">Coin<span class="span1">Trail</span></h2>
      <div class="profile"><?php echo $name?></div>
</div>
<div class="container">
    <div class="ill"><img src="budget.jpg" class="img"></div>

<div class="budget_add">
    <form method="POST" action="insertion.php" id="form" >
        <input type="submit" class="btn" style="color: #24977b;"><br>
        <input type="text" name="bName" placeholder="BUDGET NAME" class="input"><br>
        
        <input type="text" value="Total" name="item0" readonly class="input"> <input type="number" name="price0" class="input" placeholder="Add Max Budget"><br>


    </form>
    <button class="add_item btn" onclick="addItem()">Add Item</button>
</div>
</div>
</body>
<script>
    const budget_add=document.querySelector('.budget_add');
    let counter=0;
   const form=document.getElementById("form");
    /*form.addEventListener("submit",(e)=>{
       e.preventDefault();
       //console.log("Submitted");
      
       //echo''.$item1.''.$price1.'';
       
       console.log();
    })*/
function addItem(){ 
    
    counter=counter+1;
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
   
    
    


}

</script>
</html>