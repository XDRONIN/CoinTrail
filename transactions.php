<?php
session_start();
include("connect.php");
if (isset($_SESSION["tbname"])){//getting the user table name
    $tbname=$_SESSION["tbname"];
    echo $tbname;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD TRANSACTIONS</title>
</head>
<body>
    
</body>
</html>