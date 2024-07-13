<?php
include"connect.php"; 
    $email=$_POST["email"];
    $psswrd=$_POST["psswrd"];
    $sql="SELECT * from users WHERE email='$email' ";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)> 0){
        $row=mysqli_fetch_assoc($result);
        if($psswrd==$row["psswrd"]){

            echo "logged in"; 
        }
        else{

            echo "<script>alert('wrong password');</script>";
         

        }
    }
    else{

        echo "<script>alert('wrong email');</script>";
    }
?>