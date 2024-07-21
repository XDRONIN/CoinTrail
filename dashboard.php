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
    <link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
</head>
<link rel="stylesheet" href="dashboard.css">
<body>
    <div class="navbar">
      <div class="menu">
      <label class="burger" for="burger">
       <input type="checkbox" id="burger">
         <span></span>
         <span></span>
         <span></span>
          </label>
      
      </div>
      <h2 class="logo">Coin<span class="span1">Trail</span></h2>
      <div class="profile">NAME</div>
    </div>
    <div class="balance">$$</div>
    <div class="container">
      <div class="overview">
      <div class="tooltip" style="background-color: #FA5555;">

         <img src="shopping-cart (copy).png" class="icons">
          <div class="tooltiptext">Essentials</div>
      </div>
      <div class="tooltip" style="background-color: #F7FB76;">

      <img src="bill (copy).png" class="icons">
<div class="tooltiptext">Bills</div>
</div>   
<div class="tooltip" style="background-color: #8DED8E;">

          <img src="piggy-bank (copy).png" class="icons">
          <div class="tooltiptext">Savings</div>
      </div>
      <div class="tooltip" style="background-color: #2D7D8F;">

         <img src="money (copy).png" class="icons">
          <div class="tooltiptext">Others</div>
      </div>
      <div class="transactions">
        <p></p>
      </div>
      </div>
      
      <div class="piechart"></div>
    </div>   
 
</body>
<script>
  let tbname="<?php echo $tbname?>";
  console.log(tbname);
</script>
</html>