<?php


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch the data from the POST request
    $credit = isset($_POST['credit']) ? $_POST['credit'] : 0;
    $debit = isset($_POST['debit']) ? $_POST['debit'] : 0;
    $essentials = isset($_POST['essentials']) ? $_POST['essentials'] : 0;
    $bills = isset($_POST['bills']) ? $_POST['bills'] : 0;
    $savings = isset($_POST['savings']) ? $_POST['savings'] : 0;
    $others = isset($_POST['others']) ? $_POST['others'] : 0;
    //$user= isset($_POST['user']) ? $_POST['user'] : 0;
    
    // echo "<h1>User Data Received</h1>";
    // echo "<p>Credit: $credit</p>";
    // echo "<p>Debit: $debit</p>";
    // echo "<p>Essentials: $essentials</p>";
    // echo "<p>Bills: $bills</p>";
    // echo "<p>Savings: $savings</p>";
     //echo "<p>Others: $user</p>";
    
    
} else {
    // Handle the case where the form is not submitted (optional)
    echo "<p>No data submitted.</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Chart Data</title>
    <style>
               #data-display {
                display: flex;
  flex: 1;
  flex-direction: column;
  font-size: 20px;
  min-width: 190px;
  max-width: fit-content;
  background: #00ffa0;
  padding: 1rem;
  border-radius: 1rem;
  border: 0.5vmin solid #05060f;
  box-shadow: 0.4rem 0.4rem #05060f;
  align-items: center;

  color: black;
  min-height: 200px;
  max-height: fit-content;
  margin: 10px;
        }

        .piechart {
         display: flex;
        justify-content: center;

        flex-basis: 200px;
        flex: 1;
}
.container {
  display: flex;
  margin-top: 50px;
  padding: 10px;
  min-width: 100vh;
  min-height: 100vh;
}
    </style>
</head>
</head>
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
 <link rel="stylesheet" href="editTransaction.css">
 
<body>
<div class="navbar">
        <a href="adDash.php">Home</a>
      <h2 class="logo">Coin<span class="span1">Trail</span></h2>
     
      <div class="profile"><?php echo $name?></div>
    </div>  
    <div class="container">
    <div id="data-display"></div>
    <div class="piechart">
      <div id="chart_div"></div>
      </div>

    </div>
<script>
// Fetch data from PHP variables and store them in JavaScript variables
var credit = <?php echo json_encode($credit); ?>;
var debit = <?php echo json_encode($debit); ?>;
var essentials = <?php echo json_encode($essentials); ?>;
var bills = <?php echo json_encode($bills); ?>;
var savings = <?php echo json_encode($savings); ?>;
var others = <?php echo json_encode($others); ?>;

// Function to display data in the div
function displayUserData() {
    var displayDiv = document.getElementById('data-display');
    
    // Create content to display
    var content = `
        <h1>User Financial Data</h1>
        <p><strong>Credit:</strong> ${credit}</p>
        <p><strong>Debit:</strong> ${debit}</p>
        <p><strong>Essentials:</strong> ${essentials}</p>
        <p><strong>Bills:</strong> ${bills}</p>
        <p><strong>Savings:</strong> ${savings}</p>
        <p><strong>Others:</strong> ${others}</p>
    `;
    
    // Set the content of the div
    displayDiv.innerHTML = content;
}

// Call the function to display the data
displayUserData();
</script>
<!---The Pie Chart Script-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        
        data.addColumn('string', 'Catogory');
        data.addColumn('number', 'Amount');
        
        data.addRows([
          ['Essentials', Number (essentials)],
          ['Bills', Number( bills)],
          ['Savings', Number( savings)],
          ['Others', Number( others)],
          
        ]);

        // Set chart options
        var options = {'title':'Spending Overview',
                       slices: {0: {color: '#FA5555'}, 1:{color: '#F7FB76'}, 2:{color: '#8DED8E'}, 3: {color: '#2D7D8F'}},
                       'width':1300,
                        is3D: true,
                        pieSliceTextStyle:{color: 'black', fontName: 'outfit', fontSize: '20'},
                        titleTextStyle:{ color: '#24977b',
                                          fontName: 'outfit',
                                          fontSize: 30,
                                          bold: true,
                                          },
    
                       'height':940};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
   
</body>
</html>