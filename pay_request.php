<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the request ID from the AJAX request
    $requestId = $_POST['request_id'];

    // Fetch the requested amount and receiver username from the database
    $sql = "SELECT amount, p_username FROM request WHERE id = '$requestId'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $amount = $row['amount'];
    $receiverUsername = $row['p_username'];

    // Perform the payment process here (you may implement your own logic)
    // If the payment is successful, remove the request from the database and update the total amount

    // Remove the request from the database
    $deleteSql = "DELETE FROM request WHERE id = '$requestId'";
    if (mysqli_query($con, $deleteSql)) {
        // Update the total amount in the database or any other relevant logic
        $updateTotalSql = "UPDATE users SET total_amount = total_amount - '$amount' WHERE username = '$receiverUsername'";
        if (mysqli_query($con, $updateTotalSql)) {
            // Send a success response
            http_response_code(200);
            echo "Payment successful";
        } else {
            // Send an error response if the total amount update fails
            http_response_code(500);
            echo "Failed to update total amount";
        }
    } else {
        // Send an error response if the request deletion fails
        http_response_code(500);
        echo "Failed to remove request";
    }
} else {
    // Send an error response for invalid request method
    http_response_code(405);
    echo "Invalid request method";
}

mysqli_close($con);
?>
