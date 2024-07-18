<?php 
session_start();
include("connect.php");
if (isset($_SESSION["email"])){//getting the email from session
    $email = $_SESSION["email"];
    $idsql="SELECT id FROM users WHERE email='$email'";
    $idresult = mysqli_query($conn,$idsql);
    $idrow = mysqli_fetch_array($idresult);
   // echo"".$idrow["0"];
    $tbname="user_".$idrow[0];
    //echo $tbname;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    DASHBOARD<br>
    <?php 
    $sql="SELECT * FROM $tbname";
    
    $result = mysqli_query($conn,$sql);
    
    if($row = mysqli_fetch_array($result)){
    while ($row) {
        echo "".$row["0"]."".$row["1"].$row["2"].$row["3"].$row["4"].$row["5"];
        $row = mysqli_fetch_array($result) ;
    } }
    else{
        echo "error";
    }
    ?>
</body>
</html>