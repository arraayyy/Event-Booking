<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "event_booking";

    $conn = mysqli_connect($server, $username, $password, $database);

    if (!$conn){
        die("Connection Failed" . mysqli_connect_error());
    }
?>