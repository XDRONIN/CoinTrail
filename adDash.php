<?php
session_start();
 include("connect.php");
 $countSql="SELECT COUNT(name) FROM users;";
 $countQuery=mysqli_query($conn,$countSql);
 $countResult=mysqli_fetch_array($countQuery);
 $users = [];

// SQL query to select all IDs from users table
$idSql = "SELECT id FROM users;";
$idQuery = mysqli_query($conn, $idSql);

if ($idQuery) {
    while ($idResult = mysqli_fetch_array($idQuery)) {
        $users[] = "user_" . $idResult['id'];
    }
} else {
    echo "Query failed: " . mysqli_error($conn);
}
// echo $users[0];
// echo $users[1];
// echo $users[2];
$_SESSION['users'] = $users;
// 2D array to hold user data for each user
$userData = [];
foreach ($users as $tbname) {
    //echo $tbname;
    // // Credit amount
     $credSql = "SELECT SUM(amount) FROM `{$tbname}` WHERE COD='credit'";
     $credResult = mysqli_query($conn, $credSql);
     $credAmount = $credResult ? mysqli_fetch_array($credResult)[0] : 0;
    
     // Debit amount
     $debSql = "SELECT SUM(amount) FROM `{$tbname}` WHERE COD='debit'";
     $debResult = mysqli_query($conn, $debSql);
     $debAmount = $debResult ? mysqli_fetch_array($debResult)[0] : 0;
    
    // // Essentials amount
     $essSql = "SELECT SUM(amount) FROM `{$tbname}` WHERE catogory='Essentials'";
     $essResult = mysqli_query($conn, $essSql);
     $essAmount = $essResult ? mysqli_fetch_array($essResult)[0] : 0;
    
    // Bills amount
    $billSql = "SELECT SUM(amount) FROM `{$tbname}` WHERE catogory='Bills'";
    $billResult = mysqli_query($conn, $billSql);
    $billAmount = $billResult ? mysqli_fetch_array($billResult)[0] : 0;
    
    // Savings amount
    $savSql = "SELECT SUM(amount) FROM `{$tbname}` WHERE catogory='Savings'";
    $savResult = mysqli_query($conn, $savSql);
    $savAmount = $savResult ? mysqli_fetch_array($savResult)[0] : 0;
    
    // Others amount
    $othSql = "SELECT SUM(amount) FROM `{$tbname}` WHERE catogory='Others'";
    $othResult = mysqli_query($conn, $othSql);
    $othAmount = $othResult ? mysqli_fetch_array($othResult)[0] : 0;
    
    // Store data for each user in the 2D array
    $userData[$tbname] = [
        'credit' => $credAmount ,
        'debit' => $debAmount ,
        'essentials' => $essAmount ,
        'bills' => $billAmount ,
        'savings' => $savAmount ,
        'others' => $othAmount 
    ];
    //echo $userData[$tbname]['bills'];  
    echo "<script>var userData = " . json_encode($userData) . ";</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
 <link rel="stylesheet" href="adDash.css">
 
<body>
<div class="navbar">
        
      <h2 class="logo">Coin<span class="span1">Trail</span></h2>
     
      <div class="profile">Admin</div>
     
      
    </div>  
    <div>
        <p>User Count : <?php echo $countResult[0];?></p>
    </div>
    <div id="user-data-container"></div>

<script>
    // Function to create divs for each user and display their data
    function displayUserData() {
        const container = document.getElementById('user-data-container');

        for (const [user, data] of Object.entries(userData)) {
            // Create a container div for each user
            const userDiv = document.createElement('div');
            userDiv.className = 'user-container';

            // Add user ID title
            const userTitle = document.createElement('h3');
            userTitle.innerText = `Data for ${user}`;
            userDiv.appendChild(userTitle);

            // Add each data field for the user
            for (const [key, value] of Object.entries(data)) {
                const dataDiv = document.createElement('div');
                dataDiv.innerText = `${key.charAt(0).toUpperCase() + key.slice(1)}: ${value}`;
                userDiv.appendChild(dataDiv);
            }
            // Create a form for the user
            const form = document.createElement('form');
            //form.action = 'viewUserChart.php'; // Target page
            form.method = 'POST';

            // Add hidden input fields to pass user data
            for (const [key, value] of Object.entries(data)) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = key; // Field name (e.g., credit, debit)
                input.value = value; // Field value
                form.appendChild(input);
            }
            const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'user'; // user
                input.value = user; //user value
                form.appendChild(input);
            // Create a button to submit the form
            var button1 = document.createElement('button');
            button1.type = 'button'; // Set to button type
            button1.innerText = 'View Chart';
            button1.onclick = function() {
             form.action = 'viewUserChart.php'; // Set the action for this button
             form.submit(); // Submit the form
             };
            form.appendChild(button1);
            var button2 = document.createElement('button');
            button2.type = 'button'; // Set to button type
            button2.innerText = 'All Transactions';
            button2.onclick = function() {
                form.action = 'viewUserTransaction.php'; // Set the action for this button
                form.submit(); // Submit the form
            };
            form.appendChild(button2);

            // Append the form to the userDiv
            userDiv.appendChild(form);
            // Append userDiv to the main container
            container.appendChild(userDiv);
        }
    }

    // Call the function to display user data
    displayUserData();
</script>
</body>
</html>