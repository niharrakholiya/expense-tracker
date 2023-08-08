<?php
// session_start();
include 'config.php';
$msg="";
if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($con, $_POST['name']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $password = $_POST['password'];


   $select_users = mysqli_query($con, "SELECT * FROM `users` WHERE username = '$username'") or die('query failed');
   $password=password_hash($password,PASSWORD_DEFAULT);
   if(mysqli_num_rows($select_users) > 0){
      $msg = "user already exist!";
   }else{
    $sql="insert into users(username,password,role) values('$username','$password','User')";
    mysqli_query($con,$sql);
         mysqli_query($con, "INSERT INTO `registration` (username, email, password) VALUES('$username', '$email', '$password')") or die('query failed');
        
         header('location:index.php');
      
   }

}

?>
<script>
    document.title="Registration";
    </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

   
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    
   
    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

</head>
<body>



<!-- <?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?> -->
<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/expenses1.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <p style="text-align:center; color:blue; font-size:30px"><b>Registration</b></p>
                        <br>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="name" placeholder="Username" Required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="text" name="email" placeholder="Email"Required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password"Required>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit">Register</button>
                                <a href="index.php">Already Have an Account?</a>
                                </form>
                                <div class="msg"><?php
                                echo $msg?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    
        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        
        <!-- Main JS-->
        <script src="js/main.js"></script>
</body>
</html>