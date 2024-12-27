<?php
session_start();
include("connect.php");
$tbname=$_SESSION['tbname'];
$name=$_SESSION['name'];
$tranSql="SELECT COD,amount,DOT,catogory,scatogory FROM $tbname ORDER BY id DESC";
$tranResult = mysqli_query($conn,$tranSql);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Use the dates in your query
    //echo "Start Date: $start_date, End Date: $end_date";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Entries</title>
</head>
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
 <link rel="stylesheet" href="view.css">
<body>
<div class="navbar">
        <a href="dashboard.php">Home</a>
      <h2 class="logo">Coin<span class="span1">Trail</span></h2>
     
      <div class="profile"><?php echo $name?></div>
    </div> 
    <form id="dateForm" action="view.php" method="POST">
    <div class="con">
    
    <div class="all-options">
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="start_date" />
      </div>

      <div class="all-options">
        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="end_date"  />
      </div>
      
    </div> 
    <button class="add2" type="submit" name="submit">Set Date</button>
    </form>

    <div class="all-options box">
      
                <div class="option">
                    <input  value="All" name="catogory" type="radio" class="input" checked="checked" id="all"/>
                        <div class="btn all">
                    <span class="span">All</span>
                         </div>
                </div>
                <div class="option">
                    <input  value="Essentials" name="catogory" type="radio" class="input" id="ess" />
                        <div class="btn es">
                    <span class="span">Essentials</span>
                         </div>
                </div>
                <div class="option">
                    <input  value="Bills" name="catogory" type="radio" class="input" id="bill" />
                        <div class="btn bi">
                    <span class="span">Bills</span>
                         </div>
                </div>
                <div class="option">
                    <input  value="Savings" name="catogory" type="radio" class="input" id="sav" />
                        <div class="btn sa">
                    <span class="span">Savings</span>
                         </div>
                </div>
                <div class="option">
                    <input  value="Others" name="catogory" type="radio" class="input" id="oth" />
                        <div class="btn ot">
                    <span class="span">Others</span>
                         </div>
                </div>
</div>
<div class="but-container"><button onclick =" window.location.href='report.php'" class="add">View Report</button></div>
<center><h2 class="tranHead">Entries:</h2><br></center>
    <div class="transactions" id="trans">
        
        
      </div>
</body>
<script>
  const tranDiv=document.getElementById('trans');
  const all=document.getElementById('all');
  const ess=document.getElementById('ess');
  const bill=document.getElementById('bill');
  const sav=document.getElementById('sav');
  const oth=document.getElementById('oth');
  let sDate=document.getElementById('startDate');
  let eDate=document.getElementById('endDate');
  
  function setView(){
    sDate.value="<?php echo $start_date;?>";
  eDate.value="<?php echo $end_date;?>";
    if(sDate.value != 0 && eDate.value != 0){
      //console.log(sDate.value , eDate.value);
      if(all.checked){
      //console.log('all');
      <?php $tranSql="SELECT * FROM $tbname WHERE DOT BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC";?>
      tranDiv.innerHTML=` <?php 
         $tranResult = mysqli_query($conn,$tranSql);
        $i==1;
         while ( $tranRow = mysqli_fetch_array($tranResult)) {
         
          if($tranRow[1]=="debit" ){
            
          if($tranRow[3]=="Essentials"){
            echo "<form method='POST'><div class='tranRow' style='background-color: #FA5555;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]." &nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]." &nbsp; ".$tranRow[5]."
            <div class='buttons'>
            <button class='dltButton' formaction='dltTransaction.php'></button>
            <button class='editButt' formaction='editTransaction.php'></button></div></div></form>";
          }
          else if($tranRow[3]== "Bills"){
            echo "<form method='POST'><div class='tranRow' style='background-color: #F7FB76;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]." &nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]." &nbsp; ".$tranRow[5]."
            <div class='buttons'>
            <button class='dltButton' formaction='dltTransaction.php'></button>
            <button class='editButt' formaction='editTransaction.php'></button></div></form></div>";
          }
          else if($tranRow[3]== "Savings"){
            echo "<form method='POST'><div class='tranRow' style='background-color: #8DED8E;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]." &nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]." &nbsp; ".$tranRow[5]."
            <div class='buttons'>
            <button class='dltButton' formaction='dltTransaction.php'></button>
            <button class='editButt' formaction='editTransaction.php'></button></div></form></div>";
          }
          else if($tranRow[3]== "Others"){
            echo "<form method='POST'><div class='tranRow' style='background-color: #2D7D8F;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]."&nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]." &nbsp; ".$tranRow[5]."
            <div class='buttons'>
            <button class='dltButton' formaction='dltTransaction.php'></button>
            <button class='editButt' formaction='editTransaction.php'></button></div></form></div>";
          }
          

        }
          elseif($tranRow[1]=="credit" ){
            echo "<form method='POST'><div class='tranRow' style='background-color: #24977b;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]." &nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[5]." &nbsp; ".$tranRow[3]."
            <div class='buttons'>
            <button class='dltButton' formaction='dltTransaction.php'></button>
            <button class='editButt' formaction='editTransaction.php'></button></div>
           </form> </div>";}
            $i++;
           }
        
        
        ?>`;
    }
    else if(ess.checked){
      <?php $tranSql="SELECT * FROM $tbname WHERE DOT BETWEEN '$start_date' AND '$end_date' AND catogory='Essentials' ORDER BY id DESC";?>
      tranDiv.innerHTML=` <?php 
         $tranResult = mysqli_query($conn,$tranSql);
        $i==1;
         while ( $tranRow = mysqli_fetch_array($tranResult)) {
         
          if($tranRow[1]=="debit" ){
            
            if($tranRow[3]=="Essentials"){
              echo "<form method='POST'><div class='tranRow' style='background-color: #FA5555;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]." &nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]." &nbsp; ".$tranRow[5]."
              <div class='buttons'>
              <button class='dltButton' formaction='dltTransaction.php'></button>
              <button class='editButt' formaction='editTransaction.php'></button></div></div></form>";
            }
          else if($tranRow[3]== "Bills"){
            echo "<div class='tranRow' style='background-color: #F7FB76;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Savings"){
            echo "<div class='tranRow' style='background-color: #8DED8E;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Others"){
            echo "<div class='tranRow' style='background-color: #2D7D8F;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          

        }
          elseif($tranRow[1]=="credit" ){
            echo "<div class='tranRow' style='background-color: #24977b;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]."</div>";}
            $i++;
           }
        
        
        ?>`;

    }
    else if(bill.checked){
      //console.log('bill');
      <?php $tranSql="SELECT * FROM $tbname WHERE DOT BETWEEN '$start_date' AND '$end_date' AND  catogory='Bills' ORDER BY id DESC";?>
      tranDiv.innerHTML=` <?php 
         $tranResult = mysqli_query($conn,$tranSql);
        $i==1;
         while ( $tranRow = mysqli_fetch_array($tranResult)) {
         
          if($tranRow[1]=="debit" ){
            
          if($tranRow[3]=="Essentials"){
            echo "<div class='tranRow' style='background-color: #FA5555;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Bills"){
            echo "<form method='POST'><div class='tranRow' style='background-color: #F7FB76;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]." &nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]." &nbsp; ".$tranRow[5]."
            <div class='buttons'>
            <button class='dltButton' formaction='dltTransaction.php'></button>
            <button class='editButt' formaction='editTransaction.php'></button></div></form></div>";
          }
          else if($tranRow[3]== "Savings"){
            echo "<div class='tranRow' style='background-color: #8DED8E;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Others"){
            echo "<div class='tranRow' style='background-color: #2D7D8F;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          

        }
          elseif($tranRow[1]=="credit" ){
            echo "<div class='tranRow' style='background-color: #24977b;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]."</div>";}
            $i++;
           }
        
        
        ?>`;
    }
    else if(sav.checked){
     // console.log('sav');
      <?php $tranSql="SELECT * FROM $tbname WHERE DOT BETWEEN '$start_date' AND '$end_date' AND  catogory='Savings' ORDER BY id DESC";?>
      tranDiv.innerHTML=` <?php 
         $tranResult = mysqli_query($conn,$tranSql);
        $i==1;
         while ( $tranRow = mysqli_fetch_array($tranResult)) {
         
          if($tranRow[1]=="debit" ){
            
          if($tranRow[3]=="Essentials"){
            echo "<div class='tranRow' style='background-color: #FA5555;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Bills"){
            echo "<div class='tranRow' style='background-color: #F7FB76;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Savings"){
            echo "<form method='POST'><div class='tranRow' style='background-color: #8DED8E;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]." &nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]." &nbsp; ".$tranRow[5]."
            <div class='buttons'>
            <button class='dltButton' formaction='dltTransaction.php'></button>
            <button class='editButt' formaction='editTransaction.php'></button></div></form></div>";
          }
          else if($tranRow[3]== "Others"){
            echo "<div class='tranRow' style='background-color: #2D7D8F;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          

        }
          elseif($tranRow[1]=="credit" ){
            echo "<div class='tranRow' style='background-color: #24977b;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]."</div>";}
            $i++;
           }
        
        
        ?>`;
    }
    else if(oth.checked==true){
      //console.log('oth');
      <?php $tranSql="SELECT * FROM $tbname WHERE DOT BETWEEN '$start_date' AND '$end_date' AND  catogory='Others' ORDER BY id DESC";?>
      tranDiv.innerHTML=` <?php 
         $tranResult = mysqli_query($conn,$tranSql);
        $i==1;
         while ( $tranRow = mysqli_fetch_array($tranResult)) {
         
          if($tranRow[1]=="debit" ){
            
          if($tranRow[3]=="Essentials"){
            echo "<div class='tranRow' style='background-color: #FA5555;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Bills"){
            echo "<div class='tranRow' style='background-color: #F7FB76;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Savings"){
            echo "<div class='tranRow' style='background-color: #8DED8E;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Others"){
            echo "<form method='POST'><div class='tranRow' style='background-color: #2D7D8F;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]." &nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]." &nbsp; ".$tranRow[5]."
            <div class='buttons'>
            <button class='dltButton' formaction='dltTransaction.php'></button>
            <button class='editButt' formaction='editTransaction.php'></button></div></form></div>";
          }
          

        }
          elseif($tranRow[1]=="credit" ){
            echo "<div class='tranRow' style='background-color: #24977b;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]."</div>";}
            $i++;
           }
        
        
        ?>`;
    }

      
    }
    else{
    if(all.checked){
      //console.log('all');
      <?php $tranSql="SELECT * FROM $tbname ORDER BY id DESC";?>
      tranDiv.innerHTML=` <?php 
         $tranResult = mysqli_query($conn,$tranSql);
        $i==1;
         while ( $tranRow = mysqli_fetch_array($tranResult)) {
         
          if($tranRow[1]=="debit" ){
            
          if($tranRow[3]=="Essentials"){
            echo "<form method='POST'><div class='tranRow' style='background-color: #FA5555;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]." &nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]." &nbsp; ".$tranRow[5]."
            <div class='buttons'>
            <button class='dltButton' formaction='dltTransaction.php'></button>
            <button class='editButt' formaction='editTransaction.php'></button></div></div></form>";
          }
          else if($tranRow[3]== "Bills"){
            echo "<form method='POST'><div class='tranRow' style='background-color: #F7FB76;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]." &nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]." &nbsp; ".$tranRow[5]."
            <div class='buttons'>
            <button class='dltButton' formaction='dltTransaction.php'></button>
            <button class='editButt' formaction='editTransaction.php'></button></div></form></div>";
          }
          else if($tranRow[3]== "Savings"){
            echo "<form method='POST'><div class='tranRow' style='background-color: #8DED8E;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]." &nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]." &nbsp; ".$tranRow[5]."
            <div class='buttons'>
            <button class='dltButton' formaction='dltTransaction.php'></button>
            <button class='editButt' formaction='editTransaction.php'></button></div></form></div>";
          }
          else if($tranRow[3]== "Others"){
            echo "<form method='POST'><div class='tranRow' style='background-color: #2D7D8F;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]."&nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]." &nbsp; ".$tranRow[5]."
            <div class='buttons'>
            <button class='dltButton' formaction='dltTransaction.php'></button>
            <button class='editButt' formaction='editTransaction.php'></button></div></form></div>";
          }
          

        }
          elseif($tranRow[1]=="credit" ){
            echo "<form method='POST'><div class='tranRow' style='background-color: #24977b;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]." &nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[5]." &nbsp; ".$tranRow[3]."
            <div class='buttons'>
            <button class='dltButton' formaction='dltTransaction.php'></button>
            <button class='editButt' formaction='editTransaction.php'></button></div>
           </form> </div>";}
            $i++;
           }
        
        
        ?>`;
    }
    else if(ess.checked){
      <?php $tranSql="SELECT * FROM $tbname WHERE catogory='Essentials' ORDER BY id DESC";?>
      tranDiv.innerHTML=` <?php 
         $tranResult = mysqli_query($conn,$tranSql);
        $i==1;
         while ( $tranRow = mysqli_fetch_array($tranResult)) {
         
          if($tranRow[1]=="debit" ){
            
            if($tranRow[3]=="Essentials"){
              echo "<form method='POST'><div class='tranRow' style='background-color: #FA5555;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]." &nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]." &nbsp; ".$tranRow[5]."
              <div class='buttons'>
              <button class='dltButton' formaction='dltTransaction.php'></button>
              <button class='editButt' formaction='editTransaction.php'></button></div></div></form>";
            }
          else if($tranRow[3]== "Bills"){
            echo "<div class='tranRow' style='background-color: #F7FB76;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Savings"){
            echo "<div class='tranRow' style='background-color: #8DED8E;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Others"){
            echo "<div class='tranRow' style='background-color: #2D7D8F;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          

        }
          elseif($tranRow[1]=="credit" ){
            echo "<div class='tranRow' style='background-color: #24977b;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]."</div>";}
            $i++;
           }
        
        
        ?>`;

    }
    else if(bill.checked){
      //console.log('bill');
      <?php $tranSql="SELECT * FROM $tbname WHERE catogory='Bills' ORDER BY id DESC";?>
      tranDiv.innerHTML=` <?php 
         $tranResult = mysqli_query($conn,$tranSql);
        $i==1;
         while ( $tranRow = mysqli_fetch_array($tranResult)) {
         
          if($tranRow[1]=="debit" ){
            
          if($tranRow[3]=="Essentials"){
            echo "<div class='tranRow' style='background-color: #FA5555;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Bills"){
            echo "<form method='POST'><div class='tranRow' style='background-color: #F7FB76;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]." &nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]." &nbsp; ".$tranRow[5]."
            <div class='buttons'>
            <button class='dltButton' formaction='dltTransaction.php'></button>
            <button class='editButt' formaction='editTransaction.php'></button></div></form></div>";
          }
          else if($tranRow[3]== "Savings"){
            echo "<div class='tranRow' style='background-color: #8DED8E;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Others"){
            echo "<div class='tranRow' style='background-color: #2D7D8F;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          

        }
          elseif($tranRow[1]=="credit" ){
            echo "<div class='tranRow' style='background-color: #24977b;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]."</div>";}
            $i++;
           }
        
        
        ?>`;
    }
    else if(sav.checked){
     // console.log('sav');
      <?php $tranSql="SELECT * FROM $tbname WHERE catogory='Savings' ORDER BY id DESC";?>
      tranDiv.innerHTML=` <?php 
         $tranResult = mysqli_query($conn,$tranSql);
        $i==1;
         while ( $tranRow = mysqli_fetch_array($tranResult)) {
         
          if($tranRow[1]=="debit" ){
            
          if($tranRow[3]=="Essentials"){
            echo "<div class='tranRow' style='background-color: #FA5555;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Bills"){
            echo "<div class='tranRow' style='background-color: #F7FB76;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Savings"){
            echo "<form method='POST'><div class='tranRow' style='background-color: #8DED8E;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]." &nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]." &nbsp; ".$tranRow[5]."
            <div class='buttons'>
            <button class='dltButton' formaction='dltTransaction.php'></button>
            <button class='editButt' formaction='editTransaction.php'></button></div></form></div>";
          }
          else if($tranRow[3]== "Others"){
            echo "<div class='tranRow' style='background-color: #2D7D8F;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          

        }
          elseif($tranRow[1]=="credit" ){
            echo "<div class='tranRow' style='background-color: #24977b;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]."</div>";}
            $i++;
           }
        
        
        ?>`;
    }
    else if(oth.checked==true){
      //console.log('oth');
      <?php $tranSql="SELECT * FROM $tbname WHERE catogory='Others' ORDER BY id DESC";?>
      tranDiv.innerHTML=` <?php 
         $tranResult = mysqli_query($conn,$tranSql);
        $i==1;
         while ( $tranRow = mysqli_fetch_array($tranResult)) {
         
          if($tranRow[1]=="debit" ){
            
          if($tranRow[3]=="Essentials"){
            echo "<div class='tranRow' style='background-color: #FA5555;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Bills"){
            echo "<div class='tranRow' style='background-color: #F7FB76;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Savings"){
            echo "<div class='tranRow' style='background-color: #8DED8E;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div>";
          }
          else if($tranRow[3]== "Others"){
            echo "<form method='POST'><div class='tranRow' style='background-color: #2D7D8F;' ><input type='text' name ='id' value='".$tranRow[0]."' style='display: none;'>".$tranRow[1]." &nbsp;".$tranRow[2]."$ &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]." &nbsp; ".$tranRow[5]."
            <div class='buttons'>
            <button class='dltButton' formaction='dltTransaction.php'></button>
            <button class='editButt' formaction='editTransaction.php'></button></div></form></div>";
          }
          

        }
          elseif($tranRow[1]=="credit" ){
            echo "<div class='tranRow' style='background-color: #24977b;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]."</div>";}
            $i++;
           }
        
        
        ?>`;
    }
  }
  }
setView();
const inpts = document.querySelectorAll('.input');
//console.log(inpts)
for (let i = 0; i < inpts.length; i++) {
    inpts[i].addEventListener('click',()=>{setView()});
  
}

</script>
</html>