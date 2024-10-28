<?php
session_start();
include("connect.php");
$tbname=$_SESSION['tbname'];
$name=$_SESSION['name'];
$usrid=$_SESSION['user_id'];
//echo $usrid;
$msg=$_POST['message'];
//echo $msg;
$sendSql="INSERT INTO Request_table (user_id,message) VALUES ('$usrid','$msg'); ";
$sendQuery=mysqli_query($conn,$sendSql);
if ($sendQuery) {
    header("Location:request.php");
            exit();
}
else{
    echo "Insertion Failed";
}
?>