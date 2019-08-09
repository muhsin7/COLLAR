<?php
    session_start();
    date_default_timezone_set('Asia/Kolkata');
    function show_array($arr){
        $string = "";
        foreach ($arr as $key => $value) {
            $string .= "$key => $value, ";
        }
        $string = "[$string]";
        return $string;
    }
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $db = "collar";
    $conn = new mysqli($host,$user,$pass,$db);

    if(isset($_POST['submit'])){
        // session_start();
        $date = date("Y/m/d")." ".(date("h:i:sa"));
        $topic = $_POST['topic'];
        $summary = $_POST['summary'];
        $text = $_POST['text'];
        $author = $_SESSION['username'];
        if (isset($_FILES['upload'])) {
            // If someone has uploadeda file in the "$_FILES" object
            $upload = $_FILES['upload']; // Store in var upload
            $name = $upload['name']; // Get the original file name
            $temp = $upload['tmp_name']; // The temporary name of the file
            $extension = pathinfo($name)['extension']; // extension is needed for the final name
            $id = uniqid("file_",TRUE); // Generate unique file name
            $finalname = $id.".".$extension; // Combine everything into the final filename
            move_uploaded_file($temp,"./files/$finalname");
            $conn->query("INSERT INTO posts (date,topic,author,summary,text,file,filename) VALUES ('$date','$topic','$author','$summary','$text','$finalname','$name')");
            header("Location: collar_main.php");
            // echo "Done";
        } else{
            $conn->query("INSERT INTO posts (date,topic,author,summary,text) VALUES ('$date','$topic','$author','$summary','$text')");
            header("Location: collar_main.php");
        }
    }
 ?>
