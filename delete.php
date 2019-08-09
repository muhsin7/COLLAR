<?php
    session_start();
    date_default_timezone_set('Asia/Kolkata');

    $host = "localhost";
    $user = "root";
    $pass = "root";
    $db = "collar";
    $conn = new mysqli($host,$user,$pass,$db);
    $id = $_GET['id'];
    $conn->query("DELETE FROM posts WHERE postID=$id");
    $conn->query("DELETE FROM comments WHERE postID=$id");
    header("Location: collar_main.php");

 ?>
