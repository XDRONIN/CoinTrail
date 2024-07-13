<?php 
include"connect.php";
$name=$_POST["name"];
$email=$_POST["email"];
$psswrd=$_POST["psswrd"];
$sql="INSERT into users (name,email,psswrd) values ('$name','$email','$psswrd')";
$qry=mysqli_query($conn, $sql);
if($qry){
    echo "YOUR REGISTRATION WAS SUCCESSFULL";
   echo "<button target='login.php'>
    login
    </button>;";
}
else{

    echo "YOUR REGISTRATION FAILED";
}

?>