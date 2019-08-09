<?php
    session_start();
    date_default_timezone_set('Asia/Kolkata');

    $host = "localhost";
    $user = "root";
    $pass = "root";
    $db = "collar";
    $conn = new mysqli($host,$user,$pass,$db);

    if (isset($_POST['submit'])) {
        $postid = $_POST['postID'];
        $usr = $_SESSION['username'];
        $date = date("Y/m/d")." ".(date("h:i:sa"));
        $res = $conn->query("INSERT INTO comments (postID,user,content) VALUES ($postid,'$date','$usr','$comment')");

        header("location: comments.php?=".$_POST['id']);
    }
 ?>
