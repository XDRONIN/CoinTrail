<?php
session_start();
include("connect.php");
$tbname=$_SESSION['tbname'];
$amount=$_POST['amount'];
$catogory=$_POST['catogory'];
$scatogory=$_POST['scatogory'];
$date=$_POST['date'];
$id=$_POST['id'];
//echo $amount;
//echo $catogory;
//echo $scatogory;
//echo $date;
//echo $id;
if($catogory){
    $sql="UPDATE $tbname SET amount='$amount',catogory='$catogory',scatogory='$scatogory',DOT='$date' WHERE id='$id'";
    $query=mysqli_query($conn,$sql);
    if($query){
       header("Location:view.php");
       exit();
    }
    else{
        echo "Update Unsuccessfull";
    }
}
else{
    $sql="UPDATE $tbname SET amount='$amount',DOT='$date' WHERE id='$id'";
    $query=mysqli_query($conn,$sql);
    if($query){
        header("Location:view.php");
        exit();
    }
    else{
        echo "Update Unsuccessfull";
    }

}

?>