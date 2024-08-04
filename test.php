<?php
session_start();
include("connect.php");
$tbName=$_SESSION['tbname'];
$bName=$_POST['bName'];
$bTb=$tbName.'_'.$bName.'';//BudgetTable 
//echo''.$bTb.'';
//Budget Table Creation 
$bCreateSql="CREATE TABLE $bTb(
    id INT(11) NOT NULL AUTO_INCREMENT,
    item VARCHAR(20) NOT NULL , 
    price INT(11) , PRIMARY KEY (id)
) ";
$bCreateQuery=mysqli_query($conn,$bCreateSql);


/*for($i= 0;$i<50;$i++){
    $nextItem=$_POST['item'.$i.''];
    $nextPrice=$_POST['price'.$i.''];
   // echo''.$nextItem.'';
   if($nextItem!=null && $nextPrice!=null){
    $sql1='INSERT INTO ';
    
   }
   elseif($nextItem!=null){
    $items[$i]=$nextItem;

}
else{
    break;
}

}*/
  

       ?>