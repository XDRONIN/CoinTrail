<?php
session_start();
 include("connect.php");
 $sql = "SELECT user_id,req_id,status,message FROM Request_table;";
 $query=mysqli_query($conn,$sql);
 $req_details = array();

if ($query) {
    while ($row = mysqli_fetch_assoc($query)) {
        $req_details[] = array(
            'user_id' => $row['user_id'],
            'req_id' => $row['req_id'],
            'status' => $row['status'],
            'message' => $row['message']
        );
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

$json_req_details = json_encode($req_details);
//print_r($req_details);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Hub</title>
</head>
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
 <link rel="stylesheet" href="response.css">
 
<body>
<div class="navbar">
        
      <h2 class="logo">Coin<span class="span1">Trail</span></h2>
     
      <div class="profile">Admin</div>
     
      
    </div>  
    <div id="request-container"></div>
</body>
<script>
    const reqDetails = <?php echo $json_req_details; ?>;
   // console.log(reqDetails); 
   reqDetails.forEach((request) => {
       
        const div = document.createElement('div');
        div.className = 'request-item';
        
        
        div.innerHTML = `
            <h4>User: ${request.user_id}</h4>
            <p>Status: ${request.status}</p>
            <p>Message: ${request.message}</p>
            <form action="makeResponse.php" method="POST">
                <input type="hidden" name="req_id" value="${request.req_id}">
                <input type="hidden" name="user_id" value="${request.user_id}">
                <button type="submit" class="butt">Respond with Ai</button>
            </form>
        `;
        
        // Append the div to a container element on the page
        document.getElementById('request-container').appendChild(div);
    });
</script>
</html>