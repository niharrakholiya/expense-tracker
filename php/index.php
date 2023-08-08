<?php
include('header.php');

if(isset($_POST['login']))
{ 	
	$username=$_POST['username'];
	$password=$_POST['password'];
	$captcha=$_POST['captcha'];
    $stored_captcha=$_SESSION['CAPTCHA_CODE'];

	$res=mysqli_query($con,"select * from users where username='$username'");
	if(mysqli_num_rows($res)>0)
	{
			$row=mysqli_fetch_assoc($res);
			$verify=password_verify($password,$row['password']);
			//$verify1=captcha_verify($captcha,$row['captcha']);
			if($verify==1 && $verify==1)
		{
				$_SESSION['UID']=$row['id'];
				$_SESSION['UNAME']=$row['username'];
				$_SESSION['UROLE']=$row['role'];
				
			if($captcha=='')
            {
                echo "Please enter captcha";
            }
			if($captcha==$stored_captcha && $captcha!='')
            {
				if($_SESSION['UROLE']=='User')
				{
					redirect('dashboard.php');
				}else{
	
					redirect('category.php');
				}
                
            }
			else{
                echo "captcha is invalid";
            }
		}
			
			else{
				echo "please enter valid password";
				}
			
		}
	else{
		echo "please enter valid username ";
	}
}
?>
<h2>Login</h2>
<form method="post">
	<table>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username" required></td>

</tr>
<tr>
			<td>Password</td>
			<td><input type="password" name="password" required></td>
			
</tr>
<tr>
			<td>Captcha</td>
			<td><input type="captcha" name="captcha" required></td>
			
			
			
		</tr>
		
		<tr>
			<td></td>
			<td><img src="captcha.php" alt="captcha image"></td>
		</tr>
<tr>
			<td></td>
			<td><input type="submit" name="login" value="Login" ></td>
			
</tr>
</table>
</form>
<?php
include('footer.php');
?>