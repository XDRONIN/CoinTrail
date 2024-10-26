<?php
session_start();
include("connect.php");
$tbname=$_SESSION['tbname'];
$name=$_SESSION['name'];


$janArray=array();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT TRANSACTIONS</title>
</head>


  
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
<script>
</script>
<script
      type="text/javascript"
      src="https://www.gstatic.com/charts/loader.js"
    ></script>
    <script type="text/javascript">
        const all=document.getElementById('all');
  const ess=document.getElementById('ess');
  const bill=document.getElementById('bill');
  const sav=document.getElementById('sav');
  const oth=document.getElementById('oth');
  function setReport(){
    if(all.checked){
<?php 

for ($j=1; $j <=12 ; $j++) { 
  $janQuery="SELECT catogory, SUM(amount) AS total_amount FROM $tbname WHERE YEAR(DOT) = 2024 AND MONTH(DOT) = $j AND COD='debit' ";
  $janSql=mysqli_query($conn,$janQuery);
  
  
  
    $janRow=mysqli_fetch_array($janSql);
    $janArray[$j]=$janRow[1];
   // echo $janArray[$i];
  
  
}


?>
let jsArray = <?php echo json_encode($janArray) ?>;
console.log(jsArray);
google.charts.load("current", { packages: ["bar"] });
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ["Expenses", "Debit"],
          ["Jan", Number(jsArray[1])],
          ["Feb", jsArray[2]],
          ["Mar", jsArray[3]],
          ["Apr", jsArray[4]],
          ["May", jsArray[5]],
          ["Jun", jsArray[6]],
          ["Jul", jsArray[7]],
          ["Aug", jsArray[8]],
          ["Sep", jsArray[9]],
          ["Oct", jsArray[10]],
          ["Nov", jsArray[11]],
          ["Dec", jsArray[12]],
        ]);

        var options = {
          title: "Expenses of Each Month",
          width: 900,
          legend: { position: "none" },
          chart: {
            title: " Expenses of Each Month",
          },
          bars: "vertical", // Required for Material Bar Charts.
          axes: {
            y: {
              0: { side: "top", label: "Amount Spend $" }, // Top x-axis.
            },
          },
          bar: { groupWidth: "90%" },
        };

        var chart = new google.charts.Bar(document.getElementById("top_x_div"));
        chart.draw(data, options);
      }

}}
setReport();

    </script>

<center><h2>Detailed Reports</h2></center>
    <!---The Pie Chart Script-->
   <center> <div id="top_x_div" style="width: 1900px; height: 700px"></div><center>
</body>
</html>