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
    $_SESSION["tbname"]=$tbname;
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
   $billSql="SELECT SUM(amount) FROM $tbname WHERE catogory='Bills';";//Bills amount
   $billResult = mysqli_query($conn,$billSql);
   $billRow = mysqli_fetch_array($billResult);
   $billAmount= $billRow["0"];
   $savSql="SELECT SUM(amount) FROM $tbname WHERE catogory='Savings';";//Savings amount
   $savResult = mysqli_query($conn,$savSql);
   $savRow = mysqli_fetch_array($savResult);
   $savAmount= $savRow["0"];
   $othSql="SELECT SUM(amount) FROM $tbname WHERE catogory='Others';";//Others amount
   $othResult = mysqli_query($conn,$othSql);
   $othRow = mysqli_fetch_array($othResult);
   $othAmount= $othRow["0"];
   $tranSql="SELECT COD,amount,DOT,catogory,scatogory FROM $tbname ORDER BY id DESC";
   $tranResult = mysqli_query($conn,$tranSql);
  
   
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
  let billAmount="<?php echo$billAmount?>";//Bills
  let savAmount="<?php echo$savAmount?>";//Savings
  let othAmount="<?php echo$othAmount?>";//Others
  let transAmount="<?php echo $tranAmount[0]?>"
  console.log(transAmount);
  
  let balance=credAmount - debAmount;
  
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
          ['Essentials', Number (essAmount)],
          ['Bills', Number( billAmount)],
          ['Savings', Number( savAmount)],
          ['Others', Number( othAmount)],
          
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
    <div class="sidebar">
      <div class="page"><a href="http://localhost/MiniProject/transactions.php"> Transactions</a></div>
      <div class="page"><a href="view.php">Custom View</a></div>
      <div class="page"><a href="AI.php">AI Assistant</a></div>
    </div>
    <div class="balance">
      <img src="wallet.png" height="56px" width="56px">  &nbsp;
      <b><script>document.write(balance,"$")</script></b>
    </div>
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
    <div class="value"><script>document.write(billAmount,"$")</script></div>
</div>   
<div class="tooltip" style="background-color: #8DED8E;">

          <img src="piggy-bank (copy).png" class="icons">
          <div class="tooltiptext">Savings</div>
          <div class="value" ><script>document.write(savAmount,"$")</script></div>
      </div>
      <div class="tooltip" style="background-color: #2D7D8F;">

         <img src="money (copy).png" class="icons">
          <div class="tooltiptext">Others</div>
          <div class="value"><script>document.write(othAmount,"$")</script></div>
      </div>
      <div class="transactions">
        <center><h2 class="tranHead">Last Entries:</h2><br></center>
        <?php 
         for ($i = 1; $i <= 5; $i++) {
          $tranRow = mysqli_fetch_array($tranResult);
          if($tranRow[0]=="debit" ){
            
          if($tranRow[3]=="Essentials"){
            echo "<div class='tranRow' style='background-color: #FA5555;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div><br>";
          }
          else if($tranRow[3]== "Bills"){
            echo "<div class='tranRow' style='background-color: #F7FB76;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div><br>";
          }
          else if($tranRow[3]== "Savings"){
            echo "<div class='tranRow' style='background-color: #8DED8E;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div><br>";
          }
          else if($tranRow[3]== "Others"){
            echo "<div class='tranRow' style='background-color: #2D7D8F;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]." &nbsp; ".$tranRow[4]."</div><br>";
          }

        }
          else{
            echo "<div class='tranRow' style='background-color: #24977b;' >".$tranRow[1]."$ &nbsp; ".$tranRow[2]." &nbsp; ".$tranRow[3]."</div><br>";}
           }
        
        
        ?>
      </div>
      </div>
      
      <div class="piechart">
      <div id="chart_div"></div>
      </div>
    </div>   
 
</body>
<script>
      let sidebar=document.querySelector(".sidebar");
      let menu=document.getElementById("burger");
      menu.addEventListener('click',()=>{
        
        sidebar.classList.toggle("active");
      
      })
    </script>
</html>