<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('connect.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch message and reqId
    $message = $_POST['message'];
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $reqId = $_POST['reqId'];
    
    
    //echo "Message: " . htmlspecialchars($message) . "<br>";
    //echo "Request ID: " . htmlspecialchars($reqId);
    $sql = "INSERT INTO Response_table (req_id, response) VALUES ('$reqId', '$message')";
    $sql2 = "UPDATE Request_table SET status = 'Responded' WHERE req_id = $reqId;";

// Execute the query
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);

    // Check if insertion was successful
    if ($result && $result2) {
        header("Location:response.php");
        exit();
        //echo "New record created successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method.";
}


?>