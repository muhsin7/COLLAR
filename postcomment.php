<?php
    session_start();
    date_default_timezone_set('Asia/Kolkata');

    $comment = $_POST['comment'];
    $conn = new mysqli('localhost','root','root','collar');
    $postid = $_POST['postID'];
    $usr = $_SESSION['username'];
    $date = date("Y/m/d")." ".(date("h:i:sa"));
    $res = $conn->query("INSERT INTO comments (postID,date,user,content) VALUES ($postid,'$date','$usr','$comment')");
    if ($res) {
        echo "Worked";
    } else {
        echo "Nope";
    }

    // echo "$postid $comment $usr";
 ?>
