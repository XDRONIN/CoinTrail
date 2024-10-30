<?php
session_start();
include("connect.php");
$tbname=$_SESSION['tbname'];

$name=$_SESSION['name'];
if (isset($_POST['req_id'])) {
    // Fetch the request ID
    $req_id = $_POST['req_id'];
    //echo $req_id;
}
$sql="SELECT response FROM Response_table WHERE req_id = $req_id";
$query=mysqli_query($conn,$sql);
$result=mysqli_fetch_array($query);
$jsonMessage=json_encode($result[0]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Responses</title>
</head>
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
 <link rel="stylesheet" href="seeResponse.css">
 
<body>
<div class="navbar">
        <a href="dashboard.php">Home</a>
      <h2 class="logo">Coin<span class="span1">Trail</span></h2>
     
      <div class="profile"><?php echo $name?></div>
    </div>  
    <center><div id="messageContainer" class="card"></div> </center>
</body>
<script>
    const msg=<?php echo $jsonMessage;?>;
    const otptDiv=document.getElementById('messageContainer');
    otptDiv.innerText=`${msg}`;

</script>
</html>
