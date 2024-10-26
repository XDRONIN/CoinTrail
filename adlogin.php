<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
</head>
<?php
include("connect.php");
$sql="SELECT psswrd from Admin WHERE id=1;";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);
$password=$row[0];
$message = "";
if(isset($_POST['password'])) {
    $submitted_password = $_POST['password'];
    
    // Use strict comparison and consider using password_verify() if passwords are hashed
    if($submitted_password === $password) {
        // Password matches
        header("Location:adDash.php");
        exit();
        //echo "Login successful!";
    } else {
        // Password doesn't match
        $message = "Invalid password!";
    }
}
//echo $password;

?>
<style>
 /* From Uiverse.io by 0xnihilism */ 
.card {
  width: 300px;
  padding: 20px;
  background: #fff;
  border: 6px solid #000;
  box-shadow: 12px 12px 0 #000;
  transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
  transform: translate(-5px, -5px);
  box-shadow: 17px 17px 0 #000;
}

.card__title {
  font-size: 32px;
  font-weight: 900;
  color: #000;
  text-transform: uppercase;
  margin-bottom: 15px;
  display: block;
  position: relative;
  overflow: hidden;
}

.card__title::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 90%;
  height: 3px;
  background-color: #000;
  transform: translateX(-100%);
  transition: transform 0.3s;
}

.card:hover .card__title::after {
  transform: translateX(0);
}

.card__content {
  font-size: 16px;
  line-height: 1.4;
  color: #000;
  margin-bottom: 20px;
}

.card__form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.card__form input {
  padding: 10px;
  border: 3px solid #000;
  font-size: 16px;
  font-family: inherit;
  transition: transform 0.3s;
  width: calc(100% - 26px); /* Adjust for padding and border */
}

.card__form input:focus {
  outline: none;
  transform: scale(1.05);
  background-color: #000;
  color: #ffffff;
}

.card__button {
  border: 3px solid #000;
  background: #000;
  color: #fff;
  padding: 10px;
  font-size: 18px;
  left: 20%;
  font-weight: bold;
  text-transform: uppercase;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition: transform 0.3s;
  width: 50%;
  height: 100%;
}

.card__button::before {
  content: "Login";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 105%;
  background-color: #24977b;;
  color: #000;
  display: flex;
  align-items: center;
  justify-content: center;
  transform: translateY(100%);
  transition: transform 0.3s;
}

.card__button:hover::before {
  transform: translateY(0);
}

.card__button:active {
  transform: scale(0.95);
}

@keyframes glitch {
  0% {
    transform: translate(2px, 2px);
  }
  25% {
    transform: translate(-2px, -2px);
  }
  50% {
    transform: translate(-2px, 2px);
  }
  75% {
    transform: translate(2px, -2px);
  }
  100% {
    transform: translate(2px, 2px);
  }
}

.glitch {
  animation: glitch 0.3s infinite;
}


</style>
<body>
<center>
<?php 
   
    if($message != "") {
        echo "<p>$message</p>";
    }
    ?>

<div class="card" style="margin-top: 10%;">
  <span class="card__title">Admin Login</span>
  <p class="card__content">
    Enter The Admin Password.
  </p>
  <form class="card__form" method="POST" action="adlogin.php">
    <input required="true" type="password" placeholder="Password" name="password" />
    <button class="card__button" type="submit ">Enter</button>
  </form>
</div>

</div>
<center>
</body>
</html>