<?php
session_start();
include("connect.php");
$tbname=$_SESSION['tbname'];
$name=$_SESSION['name'];


$janArray=array();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selected_year = $_POST['year'];
    //echo "<p>Selected Year: $selected_year</p>";
} else {
    // Default year, if no year is selected yet
    $selected_year = date('Y');
   // echo "<p>Selected Year: $selected_year</p>";
}
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
<br>

<form method="POST" id="yearForm">
    <label for="year">Select Year:</label>
    <select name="year" id="year" onchange="this.form.submit()">
    <?php
        // Generate options for the year dropdown (example: from 2000 to current year)
        $current_year = date('Y');
        for ($i = 2000; $i <= $current_year; $i++) {
            $selected = ($i == $selected_year) ? 'selected' : '';
            echo "<option value='$i' $selected>$i</option>";
        }
        ?>
    </select>
</form>
<script>
</script>
<script
      type="text/javascript"
      src="https://www.gstatic.com/charts/loader.js"
    ></script>
    <?php
// First calculate all the different arrays we might need
$allArray = array();
$essArray = array();
$billArray = array();
$savArray = array();
$othArray = array();

for ($j=1; $j <= 12; $j++) {
    // All categories
    $query = "SELECT SUM(amount) AS total_amount FROM $tbname 
              WHERE YEAR(DOT) =$selected_year  AND MONTH(DOT) = $j AND COD='debit'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $allArray[$j] = $row['total_amount'] ?? 0;
    
    // Essentials
    $query = "SELECT SUM(amount) AS total_amount FROM $tbname 
              WHERE YEAR(DOT) = $selected_year  AND MONTH(DOT) = $j AND COD='debit' 
              AND catogory='Essentials'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $essArray[$j] = $row['total_amount'] ?? 0;
    
    // Bills
    $query = "SELECT SUM(amount) AS total_amount FROM $tbname 
              WHERE YEAR(DOT) = $selected_year  AND MONTH(DOT) = $j AND COD='debit' 
              AND catogory='Bills'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $billArray[$j] = $row['total_amount'] ?? 0;
    
    // Savings
    $query = "SELECT SUM(amount) AS total_amount FROM $tbname 
              WHERE YEAR(DOT) = $selected_year AND MONTH(DOT) = $j AND COD='debit' 
              AND catogory='Savings'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $savArray[$j] = $row['total_amount'] ?? 0;
    
    // Others
    $query = "SELECT SUM(amount) AS total_amount FROM $tbname 
              WHERE YEAR(DOT) = $selected_year  AND MONTH(DOT) = $j AND COD='debit' 
              AND catogory='Others'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $othArray[$j] = $row['total_amount'] ?? 0;
}
?>

<script type="text/javascript">
const all = document.getElementById('all');
const ess = document.getElementById('ess');
const bill = document.getElementById('bill');
const sav = document.getElementById('sav');
const oth = document.getElementById('oth');

// Store all the PHP arrays as JavaScript variables
const allData = <?php echo json_encode($allArray); ?>;
const essData = <?php echo json_encode($essArray); ?>;
const billData = <?php echo json_encode($billArray); ?>;
const savData = <?php echo json_encode($savArray); ?>;
const othData = <?php echo json_encode($othArray); ?>;

function setReport() {
    let currentData;
    
    if (all.checked) {
        currentData = allData;
    } else if (ess.checked) {
        currentData = essData;
    } else if (bill.checked) {
        currentData = billData;
    } else if (sav.checked) {
        currentData = savData;
    } else if (oth.checked) {
        currentData = othData;
    }
    
    google.charts.load("current", { packages: ["bar"] });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ["Expenses", "Debit"],
            ["Jan", Number(currentData[1])],
            ["Feb", Number(currentData[2])],
            ["Mar", Number(currentData[3])],
            ["Apr", Number(currentData[4])],
            ["May", Number(currentData[5])],
            ["Jun", Number(currentData[6])],
            ["Jul", Number(currentData[7])],
            ["Aug", Number(currentData[8])],
            ["Sep", Number(currentData[9])],
            ["Oct", Number(currentData[10])],
            ["Nov", Number(currentData[11])],
            ["Dec", Number(currentData[12])],
        ]);

        var options = {
            title: "Expenses of Each Month",
            width: 900,
            legend: { position: "none" },
            chart: {
                title: "Expenses of Each Month",
            },
            bars: "vertical",
            axes: {
                y: {
                    0: { side: "top", label: "Amount Spent $" },
                },
            },
            bar: { groupWidth: "90%" },
        };

        var chart = new google.charts.Bar(document.getElementById("top_x_div"));
        chart.draw(data, options);
    }
}

// Initial load
setReport();

// Add event listeners
const inputs = document.querySelectorAll('.input');
inputs.forEach(input => {
    input.addEventListener('click', setReport);
});
</script>
<center><h2>Detailed Reports</h2></center>
    <!---The Pie Chart Script-->
   <center> <div id="top_x_div" style="width: 1900px; height: 700px"></div><center>
</body>
</html>