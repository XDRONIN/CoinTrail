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
    $getid="SELECT id FROM users WHERE email='$email'";
    $getIdQuery=mysqli_query($conn, $getid);
    $userId=mysqli_fetch_assoc($getIdQuery);
    $tableId="user_".$userId['id'];
    //echo $tableId;
   /* if($userId){
    echo $userId['id'];}
    else{
        echo "error";
    }*/
    $insertSql="CREATE TABLE $tableId(
        id INT(11) NOT NULL AUTO_INCREMENT,
        COD VARCHAR(20) NOT NULL , 
        amount INT(11) NOT NULL , 
        catogory VARCHAR(100)  ,
        scatogory VARCHAR(100) , 
        DOT DATE NOT NULL , PRIMARY KEY (id))";//DOT==Date Of Transation COD==Credit Or Debit
     $insertion=mysqli_query($conn, $insertSql);
     /*if($insertion){
        echo "inserted";   }
        else{
            echo "not inserted";}*/



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