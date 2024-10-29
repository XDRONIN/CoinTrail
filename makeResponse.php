<?php
include('connect.php');
if (isset($_POST['req_id']) && isset($_POST['user_id'])) {
    $req_id = $_POST['req_id'];
    $user_id = $_POST['user_id'];
    $msg = $_POST['msg'];
    
    
} else {
    echo "Invalid submission. Request ID or User ID is missing.";
}
//echo $msg;
// echo $user_id;
$jsonmsg = json_encode($msg);

$tbname="user_".$user_id;
$Sql="SELECT * FROM $tbname ;";
$Result = mysqli_query($conn,$Sql);
   
$transactions=array();
$i=0;

while($Row = mysqli_fetch_array($Result)){
$transactions[$i]=array($Row["1"],$Row["2"],$Row["3"],$Row["4"],$Row["5"]);
$i++;

}
$jsonTransactions = json_encode($transactions);
$fetchSql="SELECT apiKey FROM API WHERE id=1";//fetch api key from database to eliminate exposure
$fetchQuery=mysqli_query($conn,$fetchSql);
$apiKey=mysqli_fetch_array($fetchQuery);

?>
<script>
    
    let msg = <?php echo $jsonmsg;?>;
   
 let transactions =<?php echo $jsonTransactions?>;
 //console.log(msg);

</script>
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
   <div style="display: flex;"> <img src="AI.png" style="margin-top: 5px; margin-left:15px; width:70px; height:61px;">
   <div style="width: 100%; display:flex; justify-content:flex-end; align-items:center;"> 
    <form action="sendResponse.php" method="POST" id="form"><button class="butt" id="send-response" >Send this response</button></form></div>
</div>

   <div class="spinner">
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
</div>
<h2 id="h2"></h2>
    <div class="output" >
     
    </div>
    <div class="prompt-div" id="prompt-div">
        <input type="text" class="prompt" id="prompt" placeholder="Enter Your Question.."> 
        <script>
            prpInput=document.getElementById('prompt');
            prpInput.value=msg;

        </script>
        <button id="submit" class="submit" type="submit" > <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        width="40"
        height="40"
      >
        <path fill="none" d="M0 0h24v24H0z"></path>
        <path
          fill="#fff"
          d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"
        ></path>
      </svg></button>
    </div>
    <script type="importmap">
    
  {
    "imports": {
      "@google/generative-ai": "https://esm.run/@google/generative-ai"
    }
  }
</script>
<script type="module">
  import { GoogleGenerativeAI } from "@google/generative-ai";

// Fetch your API_KEY
const API_KEY = `<?php echo $apiKey['0']?>`;

// Access your API key (see "Set up your API key" above)
const genAI = new GoogleGenerativeAI(API_KEY);

// ...

// The Gemini 1.5 models are versatile and work with most use cases
const model = genAI.getGenerativeModel({ model: "gemini-1.5-flash" });
let output = document.querySelector(".output");
const spinner = document.querySelector(".spinner");
const h2=document.getElementById("h2");


let genButton = document.getElementById("submit");
let prmpt;
const chat = model.startChat({
  history: [
    {
      role: "user",
      parts: [{ text: `
        The input 'transactions' is a 2D array containing financial transaction records with the following structure:

        transactions = [
     Array of transaction records where each transaction contains:
     [0]: Transaction Type (String: "credit" or "debit")
     [1]: Amount (Number)
     [2]: Main Category (String)
     [3]: Sub-Category (String)
     [4]: Transaction Date (String)
        ] ` }],
    },
    {
      role: "model",
      parts: [{ text: "Great to meet you. What would you like to know?" }],
    },
  ],
});
showLoading();
let result = await chat.sendMessage("hello");
//console.log(result.response.text());
let newOutput=addLineBreaks(result.response.text());
hideLoading()
h2.innerText = 'Powered Using Gemini Ai'
output.innerText = `${newOutput}`;
genButton.addEventListener("click", async () => {
  output.innerText = ``;
  h2.innerText = ``;
  showLoading();
  prmpt = document.getElementById("prompt").value;
  prmpt = prmpt + `Transactions = ${transactions}  ---Requirements:
        1. Base all analysis ONLY on the data provided in the transactions array
        2. Do not make assumptions about transactions outside this dataset
        3. Do not use external data or knowledge for the analysis
        4.Always double check every math calculations`;
        //console.log(prmpt);
  result = await chat.sendMessage(prmpt);
  //console.log(result.response.text());
   newOutput=addLineBreaks(result.response.text());
  //console.log(newOutput)
  hideLoading()
  output.innerText = `${newOutput}`;
  //console.log(prmpt);
});
function addLineBreaks(text) {
  // Replace '#' and '*' with empty string
  const processedText = text.replace(/[#*]/g, " ");
  return processedText;

}
function showLoading() {
  spinner.style.display = "flex";
}
function hideLoading() {
  spinner.style.display = "none";
}
const form = document.getElementById("form");
document.getElementById("send-response").addEventListener("click", function() {
     const hiddenInput = document.createElement("input");
     hiddenInput.type = "hidden";
     hiddenInput.name = "response";      
     hiddenInput.value = newOutput;      

    
    form.appendChild(hiddenInput);

    
     document.body.appendChild(form);

    
     form.submit();
    
    //console.log(newOutput)
    })
</script>

</body>

</html>