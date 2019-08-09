<?php
	session_start();
	date_default_timezone_set('Asia/Kolkata');

	$host = "localhost";
	$user = "root";
	$password = "root";
	$db = "collar";
	$conn = new mysqli($host,$user,$password,$db);

	if(isset($_POST['username'])){
		$username=$_POST['username'];
		$password=$_POST['password'];

		$sql="SELECT * FROM loginform WHERE username='$username'";
		$q = $conn->query($sql);
		$verify = $q->fetch_assoc();

		if(isset($password)){
			if($verify["password"] == $password){
				header("Location: collar_main.php");
				$_SESSION['username'] = $_POST['username'];
			}else{
				$_SESSION["error"] = "ERROR <br />Either the login or password is invalid. Please try again.";
			}
		}
	}

	// $_SESSION['username'] = $username;
	// $conn = new mysqli("localhost","root","root","collar");
	// $res = $conn->query("SELECT * FROM loginform WHERE username='$username'"); // res = result
	// $row = $res->fetch_assoc();
	// $_SESSION['name']= $row['name'];
	// $_SESSION['email']= $row['email'];
?>
<!doctype html>
<html>
<head>

	<title>COLLAR</title>
	<!-- linking the css style sheet and icon -->
	<link rel="icon" type="image/png" href="collar3.png" sizes="32x32">
	<link rel="stylesheet" type="text/css" href="collar_css.css">


	<HEADER class="top" id="home">
		<center>
			<img src="collar3.png">
		</center>
		<center collar_login_signup class="title_collar"><i>COLLAR</i></center>
		<center quote>"Alone we can do so little; together we can do so much." - Helen Keller</center>
		<br />
		<center login_signup><b>Login</b></center>
		<form method="POST" action="collar_login.php">
			<center>
				<input type = "text" name = "username" placeholder = "Enter your username..." required/>
				<input type = "password" name = "password" placeholder = "Enter your password..." required/>
				<center>
					<input submit type="submit" value ="Login" />
			</center>
		</form>
		<br />
		<div class = "login_error">
			<?php echo $_SESSION["error"]; ?>
		</div>
		<br /><br /><br />
		<div class="link">
			<a href="collar_signup.php">Sign up &rarr;</a>
		</div>
	</HEADER>


	<hr />
	<footer>
		<table class="navi" style="padding-top: 0px;">
			<tr style="height: 100px;">
				<td colspan="10">Unofficial &copy; Muhsin Mohamed 2019</td>
			</tr>
		</table>
	</footer>

</head>
