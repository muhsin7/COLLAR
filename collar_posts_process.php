<?php
    $host = "localhost";
    $user = "root";
    $password = "root";
    $db = "collar";

    // $con = mysqli_connect($host, $user, $password);
    // mysqli_select_db($con, $db);
    $conn = new mysqli("localhost","root","root","collar");
    // $date = "2019-01-29 00:00:00";
    // $result = $conn->query("SELECT * FROM posts WHERE date='2019-01-29 00:00:00' AND topic='first post' AND summary='this is the first post on collar' AND text='Lorem ipsum dolor sit amen'");
    // $rows = $result->num_rows;
    // echo $rows;
    if(isset($_POST['submit'])){
		session_start();
        $date = date("Y/m/d")." ".date("h:i:sa");
        $topic = $_POST['topic'];
        $summary = $_POST['summary'];
        $text = $_POST['text'];
        $conn->query("INSERT INTO posts (date,topic,summary,text) VALUES ('$date','$topic','$summary','$text')");
        // $result = $conn->query("SELECT * FROM posts WHERE date='$date' AND topic='$topic' AND summary='$summary' AND text='$text'");
        // $result = $conn->query("SELECT * FROM posts");
        // $rows = $result->num_rows;
        //
        // if($rows==1){
        //     echo "Posted!";
        //     exit();
        // }
        // else{
        //     // echo "Error";
        //     echo "Number of posts".$rows;
        //     // exit();
        // }
	}


 ?>
