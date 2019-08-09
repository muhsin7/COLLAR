<!doctype html>
<?php
	session_start();
	date_default_timezone_set('Asia/Kolkata');

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
	}



	/*
	if ($num_rows = $result->num_rows){
		for($i = 0; $i < $num_rows; $i++){
			$posts .= "
			<br /><br />
			<table class = 'box'>
				<td>
					<h1>$topic</h1>
					<i>Created on: $date</i>
					<h6>Summary: $summary</h6>
					<h5>$text</h5>
				</td>
			</table>

			";
		}
	}*/
	if(isset($_POST['submit'])){
        $date = date("Y/m/d")." ".date("h:i:sa");
        $topic = $_POST['topic'];
        $summary = $_POST['summary'];
        $text = $_POST['text'];
		$author = $_SESSION['username'];
        $conn = mysqli_connect("localhost","root","root","collar");
		if($topic=""||$summary=""||$text=""){
			$_SESSION["empty"] = "Please fill out all fields";
		}else {
			$_SESSION["empty"] = "";
		}
		$conn->query("INSERT INTO posts (date,author,topic,summary,text) VALUES ('$date','$author','$topic','$summary','$text')");
	}
?>

<script type="text/javascript">
	function hide_show() {
		var x = document.getElementById("new_post")
		if (x.style.display == "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}

		var text = document.getElementById("button_text");
		// console.log(text.innerHTML)
		var image = document.getElementById("plus_minus");
		console.log(image.src)
		if (text.innerHTML == "New post"){
			text.innerHTML ="Minimize";
		}else{
			text.innerHTML = "New post";
		}

		if (text.innerHTML == "New post"){
			// image.src = "plus.png";
			image.setAttribute("src", "plus.png");
		}else if (text.innerHTML == "Minimize") {
			image.setAttribute("src","minus.png");
		}
	}
</script>
<html>
<head>
	<div class="topbar">
		<img src="user.png" alt="usericon" align="left">
		<div username>
			User: <?php echo $_SESSION['username'] ?>
			<img src="collar.png" height="20px" width="20px" style="padding-left: 39%">COLLAR
			<a href="logout.php">Logout</a>
		</div>
	</div>

	<!-- logo/icon -->
	<link rel="icon" type="image/png" href="collar3.png" sizes="32x32">
	<!-- css styling link -->
	<link rel="stylesheet" type="text/css" href="collar_css.css">

	<HEADER class="top" id="home" style="padding-top: 100px;">
		<center>
			<img src="collar3.png">
		</center>
		<center class="title_collar"><i>COLLAR</i></center>
		<center>
			<button type="button" id="" name="button" class="new_post_button" onclick="hide_show()">
				<img src="plus.png" alt="plus/minus icon" id="plus_minus">
					<div text id="button_text">
						New post
					</div>
			</button>
			<br />
		</center>
		<form class="post_form" action="post_process.php" enctype="multipart/form-data" method="post" id="new_post">
			Topic: <br /><input type="text" name="topic">
			<br />
			Summary: <br /><input type="text" name="summary">
			<br />
			Text: <br /><input type="text" name="text" value="" text>
			Upload file:<br /><input type="file" name="upload" value="">
			<br />
			<center>
				<input type="submit" name="submit" value="Submit">
			</center>
		</form>
		<!-- <div style="color: rgb(177,13,0); font-style: italic;">
			<?php echo $_SESSION["empty"]; ?>
		</div> -->


		<?php
			$query = "SELECT * FROM posts ORDER BY postID DESC";
			$result = $conn->query($query);
			while($row = $result->fetch_assoc()){
				$postID = $row["postID"];
				$date = $row["date"];
				$topic = $row["topic"];
				$summary = $row["summary"];
				$text = $row["text"];
				$author = $row["author"];
				
				if ($row['file'] != "null") {
					$path = $row['file'];
					$file = $row['filename'];
					$link = "<a class='attachment' href='./files/$path' target='_blank'>$file</a>";
				}else{
					$link = "<b>No file attached</b>";
				}

				if (($_SESSION['username']==$author) || $_SESSION['username']=="admin"){
					$delete = "
					<tr>
						<td><a href='delete.php?id=$postID' class='delete'>[DELETE POST]</a></td>
					</tr>
					";
				}else{
					$delete = "";
				}
				echo "
				<br /><br />
				<table class = 'box'>
					$delete
					<tr>
						<td>
							<h1>$topic</h1>
							<i>Created on: $date</i>
							<div> Created by: $author <br />
							</div>
							<h5>Summary: $summary</h5>
							<h5>$text</h5>
							File attached: <i>$link</i>
						</td>
						<td>
							<a href='comments.php?id=$postID' class='link'>Comment</a>
						</td>
					</tr>

				</table>
				";
			}
		?>

	</HEADER>

<body>
	<?php
		// global $posts;
		// echo $posts;
	?>
</body>
	<hr />
	<footer>
		<table class="navi">
			<tr style="height: 100px;">
				<td colspan="10">Unofficial &copy; Muhsin Mohamed 2019</td>
			</tr>
		</table>
	</footer>
</head>
</html>
