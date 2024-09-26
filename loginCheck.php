<?php
session_start();
include"connect.php"; 
    $email=$_POST["email"];
    $psswrd=$_POST["psswrd"];
    $sql="SELECT * from users WHERE email='$email' ";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)> 0){
        $row=mysqli_fetch_assoc($result);
        $db_psswrd=$row["psswrd"];
        
        if(password_verify($psswrd,$db_psswrd)){

            $_SESSION["email"]=$email;//stores email in session superglobal array for dashboard to access
            header("Location:http://localhost/MiniProject/dashboard.php");
            exit();
        }
        else{

            echo "<script>alert('wrong password');</script>";
            
         

        }
    }
    else{

        echo "<script>alert('wrong email');</script>";
    }
?>