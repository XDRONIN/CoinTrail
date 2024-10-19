<?php
session_start();
include("connect.php");
$tbname=$_SESSION['tbname'];
$name=$_SESSION['name'];

$janArray=array();
for ($j=1; $j <=12 ; $j++) { 
  $janQuery="SELECT catogory, SUM(amount) AS total_amount FROM $tbname WHERE YEAR(DOT) = 2024 AND MONTH(DOT) = $j AND COD='debit' GROUP BY catogory;";
  $janSql=mysqli_query($conn,$janQuery);
  
  
  for ($i=0; $i <4; $i++) { 
    $janRow=mysqli_fetch_array($janSql);
    $janArray[$j][$i]=$janRow[1];
   // echo $janArray[$i];
  }
  
}
echo '<script>
    let jsArray = ' . json_encode($janArray) . ';
   

    
</script>';



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
          

// Iterate through the object
      for (let key in jsArray) {
  // Check if the property is indeed an array
      if (Array.isArray(jsArray[key])) {
    // Iterate through the array and replace null with 0
      jsArray[key] = jsArray[key].map(item => item === null ? 0 : item);
  }
}

console.log(jsArray);
          
    
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Catogory', 'Essentials', 'Bills', 'Savings', 'Others',
          { role: 'annotation' } ],
        ['Jan', ...jsArray[1], ''],
        ['Feb', ...jsArray[2], ''],
        ['Mar', ...jsArray[3], ''],
        ['Apr', ...jsArray[4], ''],
        ['May', ...jsArray[5], ''],
        ['Jun', ...jsArray[6], ''],
        ['Jul', ...jsArray[7], ''],
        ['Aug', ...jsArray[8], ''],
        ['Sep', ...jsArray[9], ''],
        ['Oct', ...jsArray[10], ''],
        ['Nov', ...jsArray[11], ''],
        ['Dec', ...jsArray[12], ''],
        
      ]);

      var options = {
        width: 1000,
        height: 665,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        isStacked: true,
        
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