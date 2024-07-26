<?php
session_start();
include("connect.php");
if (isset($_SESSION["tbname"])){//getting the user table name
    $tbname=$_SESSION["tbname"];
    echo $tbname;
}
    $COD=$_POST['cod'];
    $amount=$_POST['amount'];
    $DOT=$_POST['DOT'];
    $catogory=$_POST['catogory'];
    $scatogory=$_POST['scatogory'];
    echo $COD;
    echo $amount;
    echo $DOT;
    echo $catogory;
    echo $scatogory;
    $sql="INSERT INTO $tbname (COD, amount, catogory, scatogory, DOT) VALUES ('$COD', '$amount', '$catogory', '$scatogory', '$DOT')";
    $query=mysqli_query($conn,$sql);
    if($query){
        echo "INSERTED";}
        else{
            echo "not INSERTED";
        }
?>