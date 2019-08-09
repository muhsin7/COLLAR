<?php

$conn = new mysqli("localhost","root","root","collar");
$result = $conn->query("SELECT * FROM posts");
$posts = "";
while($row = $result->fetch_assoc()){
    $postID = $row["postID"];
    $date = $row["date"];
    $topic = $row["topic"];
    $summary = $row["summary"];
    $text = $row["text"];
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
echo $posts;
 ?>
