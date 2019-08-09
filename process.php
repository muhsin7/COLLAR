<?php
    $conn = new mysqli("localhost","root","root","collar");
    $result = $conn->query("SELECT * FROM loginform");
    echo $result->num_rows;
 ?>
