

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="collar_css.css">
    </head>
    <body>
        <?php
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
