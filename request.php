<?php
session_start();
include("connect.php");
$tbname=$_SESSION['tbname'];
$name=$_SESSION['name'];
$usrid=$_SESSION['user_id'];
//echo $usrid;
$sql="SELECT status,message FROM Request_table WHERE user_id=$usrid;";
$query=mysqli_query($conn,$sql);
$newArr=array();
$i=0;
while($result=mysqli_fetch_array($query)){
  $newArr[$i] = [$result[0], $result[1]];
  $i++;
}
//echo $newArr[1][1];
$jsonNewArr = json_encode($newArr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
</head>
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
 <link rel="stylesheet" href="request.css">
 
<body>
<div class="navbar">
        <a href="dashboard.php">Home</a>
      <h2 class="logo">Coin<span class="span1">Trail</span></h2>
     
      <div class="profile"><?php echo $name?></div>
    </div>  
    <div class="butt-container">
    <button class="addButton">
        <span class="button__text">Make a Request</span>
        <span class="button__icon"
          ><svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke-linejoin="round"
            stroke-linecap="round"
            stroke="currentColor"
            height="24"
            fill="none"
            class="svg"
          >
            <line y2="19" y1="5" x2="12" x1="12"></line>
            <line y2="12" y1="12" x2="19" x1="5"></line>
          </svg>
        </span>
      </button>
    </div>
    <div id="popup" class="popup">
    <div class="popup-content">
        <span class="close">&times;</span>
        <center><form method="POST" action="sendRequest.php">
          <h2>Enter The Request</h2>
          <input name="message" type="text" class="input" required placeholder="Monthly analysis, Yearly Analysis...."><br>
          <button type="submit" class="btn" >Send!</button>
        </form><center>
    </div>
</div>
    <div class="req-container" id="req-container"></div>
</body>
<script>
  const popup = document.getElementById("popup");
const addButton = document.querySelector(".addButton");
const closeButton = document.querySelector(".close");
addButton.addEventListener("click", () => {
    popup.style.display = "flex";
});
closeButton.addEventListener("click", () => {
    popup.style.display = "none";
});
window.addEventListener("click", (event) => {
    if (event.target == popup) {
        popup.style.display = "none";
    }
});
const reqArray = <?php echo $jsonNewArr; ?>;
//console.log(reqArray);
const container = document.getElementById("req-container");

reqArray.forEach((item) => {
    const div = document.createElement("div");
    div.classList.add("popup-content");
    div.style.minHeight = "0px";
    const status = item[0];
    const message = item[1];

    div.innerHTML = `<strong>Status:</strong> ${status} <br><strong>Message:</strong> ${message}`;

    container.appendChild(div);
});
</script>
</html>