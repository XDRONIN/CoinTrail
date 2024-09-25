<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login or sighnuo</title>
</head>
<link rel="stylesheet" href="login.css">
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
<body>
<p class="logo">Coin<span class="span1">Trail</span></p>
   
<div class="bigWrap">

<div class="ill"><img src="login2.jpg" class="img"></div>
<div class="seperator"></div>
<div class="wrapper">
 <div class="card-switch">
            <label class="switch">
               <input type="checkbox" class="toggle">
               <span class="slider"></span>
               <span class="card-side"></span>
               <div class="flip-card__inner">
                  <div class="flip-card__front">
                     <div class="title">Log in</div>
                     <form class="flip-card__form" action="loginCheck.php" method="POST">
                        <input class="flip-card__input" name="email" placeholder="Email" type="email">
                        <input class="flip-card__input" name="psswrd" placeholder="Password" type="password" id="password1">
                        <img src="eye-close.png" id="eye1" class="eye">
                        <button class="flip-card__btn" >Let`s go!</button>
                     </form>
                  </div>
                  <div class="flip-card__back">
                     <div class="title">Sign up</div>
                     <form class="flip-card__form" action="signUp.php" method="POST">
                        <input class="flip-card__input" placeholder="Name" type="name" name="name">
                        <input class="flip-card__input"  placeholder="Email" type="email" name="email">
                        <input class="flip-card__input"  placeholder="Password"  type="password" name="psswrd" id="password">
                        <img src="eye-close.png" id="eye" class="eye">
                        <button class="flip-card__btn" style="margin-top: 0;">Confirm!</button>
                     </form>
                  </div>
               </div>
            </label>
        </div>   
   </div>
</div>
</body>
<script>
   let eyeicon=document.getElementById('eye');
   let eyeicon1=document.getElementById('eye1');
   let password=document.getElementById('password');
   let password1=document.getElementById('password1');
   eyeicon.onmouseover=function(){
      eyeicon.src="eye-open.png";
      password.type="text";
      

   }
   eyeicon.onmouseleave=function(){
      eyeicon.src="eye-close.png";
      password.type="password";
   }
   eyeicon1.onmouseover=function(){
      eyeicon1.src="eye-open.png";
      password1.type="text";
      

   }
   eyeicon1.onmouseleave=function(){
      eyeicon1.src="eye-close.png";
      password1.type="password";
   }
</script>
</html>