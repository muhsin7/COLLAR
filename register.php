<?php
	$conn = new mysqli("localhost","root","root","collar");
	if(isset($_POST['register'])){
		// session_start();
		// $name = mysqli_real_escape_string($_POST['name']);
		// $email = mysqli_real_escape_string($_POST['email']);
		// $username = mysqli_real_escape_string($_POST['username']);
		// $password = mysqli_real_escape_string($_POST['password']);
		// $password2 = mysqli_real_escape_string($_POST['password2']);
		// 	if($password==$password2){
		// 		$password=md5($password);
		// 		$sql = "INSERT INTO loginform (name, username, password, email) VALUES ('$username', '$email', '$password')";
		// 		mysqli_query($conn, $sql);
		// 		echo "registered";
		// 	}else{
		// 		echo "nope";
		// 	}
        session_start();
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password2 = $_POST['password2'];
        $password = $_POST['password'];
        // $conn = mysqli_connect("localhost","root","root","collar")
        $conn->query("INSERT INTO loginform (name,username,password,email) VALUES ('$name','$username','$password','$email')");
        echo "
        INSERTED BOI
        NAME: $name<br />
        USERNAME: $username<br />
        PASSWORD: $password<br />
        Confirm password: $password2<br />
        EMAIL: $email<br />
        ";
	}
?>
