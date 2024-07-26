<?php
session_start();
include("connect.php");
if (isset($_SESSION["tbname"])){//getting the user table name
    $tbname=$_SESSION["tbname"];
    //echo $tbname;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD TRANSACTIONS</title>
</head>
<link rel="stylesheet" href="transactions.css">
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
<body>
    <div class="navbar">
      <h2 class="logo">Coin<span class="span1">Trail</span></h2>
      <div class="profile">NAME</div>
    </div>
    <div class="container">
        <div class="img">
            <img src="transactions.jpg">
        </div>
        <div class="details">
            <div class="box">
                <div class="cod">
                    <div class="option">
                    <input type="radio" name="cod" id="cr" value="credit" class="input" checked="checked">
                    <div class="btn gr">
                     <span class="span">Credit</span>
                         </div>
                
                </div>
                    <div class="option">
                    <input type="radio" name="cod" id="de" value="debit" class="input">
                    <div class="btn rd">
                    <span class="span">Debit</span>
                        </div>
                </div>
                    
                </div>
                <div class="base-details">
                    <div style="display: flex; flex-direction:column;">
                    <label for="amount" class="label">Amount:</label><br>
                    <input type="number" name="amount" class="detail-input" placeholder="$$">
                    </div>
                    <div style="display: flex; flex-direction:column;">
                    <label for="date" class="label">Date of Transaction:</label><br>
                    <input type="date" name="date" class="detail-input" ><br>
                    </div>
                </div>
                <div class="hidden">
                <label for="catogory" class="label">Catogory: </label><br>
                <div class="debit-details">
                <div class="option">
                    <input checked="" value="Essentials" name="catogory" type="radio" class="input" />
                        <div class="btn es">
                    <span class="span">Essentials</span>
                         </div>
                </div>
                <div class="option">
                    <input  value="Bills" name="catogory" type="radio" class="input" />
                        <div class="btn bi">
                    <span class="span">Bills</span>
                         </div>
                </div>
                <div class="option">
                    <input  value="Savings" name="catogory" type="radio" class="input" />
                        <div class="btn sa">
                    <span class="span">Savings</span>
                         </div>
                </div>
                <div class="option">
                    <input  value="Others" name="catogory" type="radio" class="input" />
                        <div class="btn ot">
                    <span class="span">Others</span>
                         </div>
                </div>
            </div>    
                    <div style="display: flex; flex-direction:column;">
                    <label for="scatogory" class="label">Specify:</label><br>
                    <input type="text" name="scatogory" class="detail-input" placeholder="Groceries,Petrol...">
                    </div>
        </div>
               <center> <input type="submit" name="submit" value="Enter Details" class=" detail-input submit"><center>

        </div>
    </div>
</body>
<script>
    let hidden= document.querySelector('.hidden');
    let de = document.getElementById("de");
    let cr = document.getElementById("cr");
    cr.addEventListener('click',()=>{
        if (cr.checked){
            console.log(cr.value);
            hidden.style.display='none';
        }
    })
    de.addEventListener('click',()=>{
        if (de.checked){
            console.log(de.value);
            hidden.style.display='flex';
        }
    })
        
    
</script>
</html>