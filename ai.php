<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ai Assistant </title>
</head>
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
 <link rel="stylesheet" href="ai.css">
<body>
     <div class="navbar">
        <a href="dashboard.php">Home</a>
      <h2 class="logo">Coin<span class="span1">Trail</span></h2>
      <div class="profile">NAME</div>
    </div>
    <div class="output" style="height: 200px; width:100%;"></div>
    <div class="prompt-div" id="prompt-div">
        <input type="text" class="prompt" id="prompt" placeholder="Enter Your Question.."> 
        <button id="submit" class="submit" > <svg
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
<script type="module" src="ai.js"></script>
</body>

</html>