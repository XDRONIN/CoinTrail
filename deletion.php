<?php
include('connect.php'); 
$bTb=$_POST['Btb-input'];
//echo''.$bTb.'';

$dltsql="DROP TABLE $bTb";
$result = mysqli_query($conn,$dltsql);
if($result){
   // echo "DELETION SUUCESSFULL";
   header("Location:http://localhost/MiniProject/budget.php
    ");
    exit();
}
else{
    echo "DELETION FAILED";}
?>