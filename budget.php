<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget</title>
</head>
<body>
    
<button>ADD</button>
<div class="budget_add">
    <form method="POST" action="" >
        <div id="form">
        TOTAL BUDGET:<input type="text" value="Total" name="item0" readonly> <input type="number" name="price0">
</div>

    </form>
    <button class="add_item" onclick="addItem()">Add Item</button>
</div>

</body>
<script>
    const budget_add=document.querySelector('.budget_add');
    let counter=0;
   const form=document.getElementById("form");
    //form.addEventListener("submit",(e)=>{
    //    e.preventDefault();
   // })
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
    form.appendChild(newPrice);
    form.appendChild(newItem);
   
    
    


}

</script>
</html>