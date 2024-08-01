<?php
session_start();
include("connect.php");
if (isset($_SESSION["tbname"])){//getting the user table name
    $tbname=$_SESSION["tbname"];
    $dbconn= mysqli_connect("localhost","root","",$tbname);
    //echo $tbname;
}
    $COD=$_POST['cod'];
    $amount=$_POST['amount'];
    $DOT=$_POST['DOT'];
    $catogory=$_POST['catogory'];
    $scatogory=$_POST['scatogory'];
    //echo $COD;
    //echo $amount;
    //echo $DOT;
    //echo $catogory;
   // echo $scatogory;
    $sql="INSERT INTO $tbname (COD, amount, catogory, scatogory, DOT) VALUES ('$COD', '$amount', '$catogory', '$scatogory', '$DOT')";
    $query=mysqli_query($dbconn,$sql);
    /*if($query){
        echo "INSERTED";}
        else{
            echo "not INSERTED";
        }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Details</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
</head>
<link rel="stylesheet" href="transaction2.css">
<body><center>
<?php if($query){
        echo "<h1 class='p1'> Transaction Inserted <span class='span1'> Successfully!</span></h1>";}
        else{
            echo "not INSERTED";
        }?><center>
   <center> <div class="img-container">
        <img src="transaction2.jpg" class="img">
    </div><center>
    <div class="buttons"> 
    <button class='butt' onclick="window.location.href='http://localhost/MiniProject/transactions.php'">
    Add Another →
    </button >
    <button class='butt' onclick="window.location.href='http://localhost/MiniProject/dashboard.php'">
   Dashboard →
    </button >
    </div>
</body>
</html>