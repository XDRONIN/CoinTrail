<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div class="budget_add">
    <form method="POST" action="test.php" id="form" >
        <input type="submit">
        
        TOTAL BUDGET:<input type="text" value="Total" name="item0" readonly> <input type="number" name="price0">


    </form>
    <button class="add_item" onclick="addItem()">Add Item</button>
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
    console.log(newItem.name) ;
    let newPrice= document.createElement('input');
    newPrice.type="number";
    newPrice.name="price"+counter;
    console.log(newPrice.name) ;
    form.appendChild(newItem);
    form.appendChild(newPrice);
   
    
    


}

</script>
</html>