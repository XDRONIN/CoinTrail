<?php
session_start();
include("connect.php");
$tbname=$_SESSION['tbname'];
$id=$_POST['id'];
//echo $id;
$sql="DELETE  FROM $tbname WHERE id='$id'";
$query=mysqli_query($conn,$sql);
if($query){
    header("Location:view.php");
    exit();
 }
 else{
     echo "Update Unsuccessfull";
 }

?>