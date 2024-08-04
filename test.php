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


for($i= 0;$i<50;$i++){
    $nextItem=$_POST['item'.$i.''];
    $nextPrice=$_POST['price'.$i.''];
   // echo''.$nextItem.'';
   if($nextItem!=null && $nextPrice!=null){
    $insertSql="INSERT INTO $bTb (item,price) VALUES ('$nextItem','$nextPrice')";
    $insertQuery=mysqli_query($conn,$insertSql);
    
   }
   elseif($nextItem!=null){
    $insertSql2="INSERT INTO $bTb (item) VALUES ('$nextItem')";
    $insertQuery2=mysqli_query($conn,$insertSql2);

}
   else{
    break;//exit loop if no more values added
}

}
  
 
       ?>