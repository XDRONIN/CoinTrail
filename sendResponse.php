<?php
// Check if the form has been submitted and if 'response' is set
if (isset($_POST['response'])) {
    // Fetch the 'response' value
    $response = $_POST['response'];

    // Process the response as needed
    echo "The response received is: " . htmlspecialchars($response);
} else {
    echo "No response received.";
}
?>
