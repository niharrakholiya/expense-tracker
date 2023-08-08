<?php
// Assuming you have a database connection established
// ...
include('header.php');
// Check if the request form is submitted
if(isset($_POST['submit'])) {
   // Get the user input
   $requesterId = $_SESSION['UNAME'];
   $receiverId = $_POST['p_username'];
   $amount = $_POST['amount'];
   // Perform input validation and ensure the necessary fields are provided

   // Store the request in the database
   $sql = "INSERT INTO request (r_username,p_username, amount) VALUES ('$requesterId', '$receiverId', '$amount')";
   mysqli_query($con, $sql);

   // Optionally, you can also send notifications or take additional actions as needed

   // Redirect to a success page or show a success message
  
   header('Location: dashboard.php');
  
}
?>
<script>
    document.title="Request";
    document.getElementById("request_link").classList.add('active');   
 </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Request</title>
</head>
<!-- <body>
    <h1>Money Request Form</h1> -->
    <body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <br><br>
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/expenses1.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                
<div class="form-group">
        <label for="receiver_id">Receiver user:</label>
        <input  class="au-input au-input--full" type="text" name="p_username" id="receiver_id" required><br><br>
</div>
        <div class="form-group">
        <label for="amount">Amount:</label>
        <input class="au-input au-input--full" type="text" name="amount" id="amount" required><br><br>
</div>
        <div class="form-group">
        <input class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit" value="Submit">
</div>
    </form>
</body>
</html>
<?php
include('footer.php');
?>