<?php
// Check if the form has been submitted and if 'response' is set
if (isset($_POST['response'])) {
    // Fetch the 'response' value
    $response = $_POST['response'];
    $reqId = $_POST['req_id'];
    //echo $reqId;
    // Process the response as needed
    //echo "The response received is: " . htmlspecialchars($reqId);
} else {
    echo "No response received.";
}
$newResponse=json_encode($response);
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
 <link rel="stylesheet" href="sendResponse.css">
 
<body>
<div class="navbar">
        
      <h2 class="logo">Coin<span class="span1">Trail</span></h2>
     
      <div class="profile">Admin</div></div>
     <div class="container">
      <form method="POST" action="sendAction.php">
     <center><textarea id="myTextarea" class="auto-resize-textarea" placeholder="Paste your text here..."></textarea><center>
     <button class="butt" type="submit">Send!</button>
     </form>
    </div>  
    
     
</body>
<script>
    const response=<?php echo $newResponse ;?>;
    console.log(response);
  const textarea = document.getElementById('myTextarea');
    textarea.value=response;
  
  
  </script>
</html>