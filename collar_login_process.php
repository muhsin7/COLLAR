<?php
	session_start();
	
	$host = "localhost";
	$user = "root";
	$pass = "root";
	$db = "collar";
	$conn = new mysqli($host,$user,$pass,$db);

	if(isset($_POST['username'])){
		$username=$_POST['username'];
		$password=$_POST['password'];

        $result = $conn->query("SELECT * FROM loginform WHERE username='$username' AND password='$password' AND name='$name' AND email='$email'");
        $rows = $result->num_rows;

		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $_POST['password'];
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['email'] = $_POST['email'];

		if($rows==1){
			echo "Logged in!";
			exit();
		}
		else{
			echo "Account details not valid";
			exit();
		}
	}

?>
