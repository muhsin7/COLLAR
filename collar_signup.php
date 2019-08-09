<!doctype html>
<html>
<?php
	session_start();
	$conn = new mysqli("localhost","root","root","collar");

	if(isset($_POST['register'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
		$password = $_POST['password'];
        $password2 = $_POST['password2'];

		if($password == $password2){
			$conn->query("INSERT INTO loginform (name,username,password,email) VALUES ('$name','$username','$password','$email')");
			header("Location: collar_login.php");
		}else{
			$_SESSION['pass_error'] = "The passwords you entered did not match, please try again";
		}
	}
?>
<head>


	<title>COLLAR</title>
	<link rel="icon" type="image/png" href="collar3.png" sizes="32x32">
	<!-- CSS STYLE STARTS HERE -->
<link rel="stylesheet" type="text/css" href="collar_css.css">	<!--CSS STYLE END-->


	<HEADER class="top" id="home">
		<center>
			<img src="collar3.png">
		</center>
		<center class="title_collar"><i>COLLAR</i></center>
		<center quote>"Alone we can do so little; together we can do so much." - Helen Keller</center>
		<br />
		<center login_signup><b>Sign up</b></center>
		<form method="post" action="collar_signup.php">
			<center>
				<input type = "text" name = "name" placeholder = "Enter your name..."/ required><br /><br />
				<input type = "email" name = "email" placeholder = "Enter your email..."/ required><br /><br />
				<input type = "text" name = "username" placeholder = "Enter your username..."/ required><br /><br />
				<input type = "password" name = "password" placeholder = "Enter your password..."/ required><br /><br />
				<input type = "password" name = "password2" placeholder = "Enter your password again..."/ required><br />
				<br /><input submit type="submit" value = "Sign Up" name = "register"/>

			</center>
		</form>
		<br />
		<div class = "login_error" align="center">
			<?php echo $_SESSION["pass_error"]; ?>
		</div>
		<br /><br /><br />
		<div class="link">
			<a href="collar_login.php">Log in &rarr;</a>
		</div>

	</HEADER>


	<!--FOOTER NAVIGATION-->
	<hr />
	<footer>
		<table class="navi" style="padding-top: 0px;">

			<tr style="height: 100px;">
				<td colspan="10">Unofficial &copy; Muhsin Mohamed 2019</td>
			</tr>
		</table>
	</footer>

</head>
