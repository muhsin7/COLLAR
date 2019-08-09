<!-- <html>
<div class="topbar">
    <img src="user.png" alt="usericon" align="left">
    <div username>
        User: <?php //echo $_SESSION['username'] ?>
        <a href="logout.php">Logout</a>
    </div>
</div>
</html> -->
<?php
    date_default_timezone_set('Asia/Kolkata');
    session_start();

    $comment = $_POST['comment'];
    $conn = new mysqli('localhost','root','root','collar');
    $postid = $_POST['postID'];
    $usr = $_SESSION['username'];
    $date = date("Y/m/d")." ".(date("h:i:sa"));
    $res = $conn->query("INSERT INTO comments (postID,date,user,content) VALUES ($postid,'$date','$usr','$comment')");


    $host = "localhost";
    $user = "root";
    $pass = "root";
    $db = "collar";
    $conn = new mysqli($host,$user,$pass,$db);
    // http://localhost/collar/post.php?id=69
    $id = $_GET["id"];
    $res = $conn->query("SELECT * FROM posts WHERE postID=$id");
    $row = $res->fetch_assoc();
    $author = $row["author"];
    $date = $row['date'];
    $text = $row["text"];
    $topic = $row["topic"];
    $summary = $row["summary"];
    if ($row['file'] != "null") {
        $path = $row['file'];
        $file = $row['filename'];
        $link = "<a class='attachment' href='./files/$path'>$file</a>";
    }else{
        $link = "<b>No file attached</b>";
    }
    echo "<table class = 'box'>
        <td>
            <h1>$topic</h1>
            <i>Created on: $date</i>
            <div> Created by: ".$author." <br />
            </div>
            <h5>Summary: $summary</h5>
            <h5>$text</h5>
            File attached: <i>$link</i>
        </td>
    </table>";
    if (isset($_POST['submit'])) {
        $postid = $_POST['postID'];
        $usr = $_SESSION['username'];
        $date = date("Y/m/d")." ".(date("h:i:sa"));
        $res = $conn->query("INSERT INTO comments (postID,user,content) VALUES ($postid,'$date','$usr','$comment')");
    }

 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>COLLAR Post #<?php echo $id; ?></title>
        <link rel="stylesheet" type="text/css" href="collar_css.css">
        <link rel="icon" type="image/png" href="collar3.png" sizes="32x32">
    </head>
    <body class="top">
        <div class="topbar">
            <img src="user.png" alt="usericon" align="left">
            <div username>
                User: <?php echo $_SESSION['username'] ?>
                <img src="collar.png" height="20px" width="20px" style="padding-left: 39%">COLLAR
                <a href="logout.php">Logout</a>
                <a href="collar_main.php">Home</a>
            </div>
        </div>
         <form class="post_form" action='comments.php?id=<?php echo $_GET['id']; ?>' method="post" id="new_post">
 			Comment: <br /><input type="text" name="comment" value="">
 			<br />
 			<center>
                <input type="none" hidden readonly name="postID" value="<?php echo $id; ?>">
 				<input type="submit" name="submit" value="Submit">
 			</center>
 		</form>

        <?php
        $id = $_GET['id'];
        $conn = new mysqli("localhost","root","root","collar");
        $result = $conn->query("SELECT * FROM comments WHERE postID = $id");
        while($row=$result->fetch_assoc()){
            $com_date = $row["date"];
            $user = $row["user"];
            $content = $row["content"];
            // echo "date: $comm_date<br />user:$user<br />content:$content";
            echo "<br /><br />
            <table class = 'box'>
                <td>
                    <i>Commented on: $com_date</i>
                    <div> Commented by: $user <br />
                    </div>
                    <h5>Comment: $content</h5>
                </td>
            </table>";
        }
         ?>
    </body>
</html>
