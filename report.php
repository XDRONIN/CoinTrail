<?php
session_start();
include("connect.php");
$tbname=$_SESSION['tbname'];
$name=$_SESSION['name'];
$janQuery="SELECT amount,catogory FROM $tbname WHERE MONTH(DOT) = 10 AND YEAR(DOT) = 2024";
$janSql=mysqli_query($conn,$janQuery);
$janRow=mysqli_fetch_array($janSql);
$i=1;
$janArray=array();




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT TRANSACTIONS</title>
</head>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Catogory', 'Essentials', 'Bills', 'Savings', 'Others',
          { role: 'annotation' } ],
        ['Jan', 10, 24, 20, 32, ''],
        ['Feb', 10, 24, 20, 32, ''],
        ['Mar', 10, 24, 20, 32, ''],
        ['Apr', 10, 24, 20, 32, ''],
        ['May', 10, 24, 20, 32, ''],
        ['Jun', 10, 24, 20, 32, ''],
        ['Jul', 10, 24, 20, 32, ''],
        ['Aug', 10, 24, 20, 32, ''],
        ['Sep', 10, 24, 20, 32, ''],
        ['Oct', 10, 24, 20, 32, ''],
        ['Nov', 10, 24, 20, 32, ''],
        ['Dec', 10, 24, 20, 32, ''],
        
      ]);

      var options = {
        width: 600,
        height: 400,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        isStacked: true
      };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
 <link rel="stylesheet" href="report.css">
 
<body>
<div class="navbar">
        <a href="dashboard.php">Home</a>
      <h2 class="logo">Coin<span class="span1">Trail</span></h2>
     
      <div class="profile"><?php echo $name?></div>
    </div>  
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
<center><h2>Detailed Reports</h2></center>
    <!---The Pie Chart Script-->
 <div id="barchart_material" style="width: 900px; height: 500px;"></div>
</body>
</html>