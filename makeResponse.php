<?
if (isset($_POST['req_id']) && isset($_POST['user_id'])) {
    $req_id = $_POST['req_id'];
    $user_id = $_POST['user_id'];
    echo $req_id;
    echo $user_id;
} else {
    echo "Invalid submission. Request ID or User ID is missing.";
}
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
 <link rel="stylesheet" href="makeResponse.css">
 
<body>
<div class="navbar">
        
      <h2 class="logo">Coin<span class="span1">Trail</span></h2>
     
      <div class="profile">Admin</div>
     
      
    </div>  
</body>
</html>