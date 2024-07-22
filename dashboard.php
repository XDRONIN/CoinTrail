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
   $credSql="SELECT SUM(amount) FROM $tbname WHERE COD='credit';";//credit amount
   $credResult = mysqli_query($conn,$credSql);
   $credRow = mysqli_fetch_array($credResult);
   $credAmount= $credRow["0"];
   $debSql="SELECT SUM(amount) FROM $tbname WHERE COD='debit';";//debit amount
   $debResult = mysqli_query($conn,$debSql);
   $debRow = mysqli_fetch_array($debResult);
   $debAmount= $debRow["0"];
   $essSql="SELECT SUM(amount) FROM $tbname WHERE catogory='Essentials';";//Essentials amount
   $essResult = mysqli_query($conn,$essSql);
   $essRow = mysqli_fetch_array($essResult);
   $essAmount= $essRow["0"];
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
<script>
  let tbname="<?php echo $tbname?>";
  let credAmount="<?php echo$credAmount?>";//credit
  let debAmount="<?php echo$debAmount?>";//debit
  let essAmount="<?php echo$essAmount?>";//Essentials
  console.log(credAmount);
  console.log(debAmount);
  console.log(essAmount);
  let balance=credAmount - debAmount;
  console.log(balance);
</script>
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
    <div class="balance"><b><script>document.write(balance,"$")</script></b></div>
    <div class="container">
      <div class="overview">
      <div class="tooltip" style="background-color: #FA5555;">

         <img src="shopping-cart (copy).png" class="icons">
          <div class="tooltiptext">Essentials</div>
          <div class="value"><script>document.write(essAmount,"$")</script></div>
      </div>
      <div class="tooltip" style="background-color: #F7FB76;">

      <img src="bill (copy).png" class="icons">
<div class="tooltiptext">Bills</div>
    <div class="value">$$</div>
</div>   
<div class="tooltip" style="background-color: #8DED8E;">

          <img src="piggy-bank (copy).png" class="icons">
          <div class="tooltiptext">Savings</div>
          <div class="value">$$</div>
      </div>
      <div class="tooltip" style="background-color: #2D7D8F;">

         <img src="money (copy).png" class="icons">
          <div class="tooltiptext">Others</div>
          <div class="value">$$</div>
      </div>
      <div class="transactions">
        <p></p>
      </div>
      </div>
      
      <div class="piechart"></div>
    </div>   
 
</body>

</html>