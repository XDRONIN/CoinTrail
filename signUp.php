<!DOCTYPE html>
<head><title>Sign Up!</title></head><body>
    <link rel="stylesheet" href="signUp.css">
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
<?php 
include"connect.php";
$name=$_POST["name"];
$email=$_POST["email"];
$psswrd=$_POST["psswrd"];
$sql="INSERT into users (name,email,psswrd) values ('$name','$email','$psswrd')";
$qry=mysqli_query($conn, $sql);
if($qry){
    echo "<h1 class='p1'>YOUR REGISTRATION WAS<span class='span1'> SUCCESSFULL</span></h1>";
    echo"<div class='ill'><img class='img' src='signUP.jpg' class='img'></div>";
   echo "<button class='butt' onclick=\"window.location.href='http://localhost/MiniProject/login.php';\">
   Log In →
    </button >";
}
else{

    echo "<p class='p2'>YOUR REGISTRATION FAILED</p>";
}

?>
</body>
</html>