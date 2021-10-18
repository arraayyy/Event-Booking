<?php
    session_start();

    include_once "config.php";
    include_once "functions.php";    
    
    $user_data = check_login($conn);
    $id = $_SESSION['user_id'];

    // echo $id;

    if(isset($_POST['submit_book'])){
        $new = $_POST['submit_book'];

        $query="INSERT INTO booking('event_id','user_id') VALUE('$new','$id')";

        $result=mysqli_query($conn,$query);
        

    }
?>

