<?php
    session_start();

    include "connect.php";
    include "functions.php";    
    
    $user_data = check_login($conn);
    $id = $_SESSION['user_id'];

    // echo $id;

    if(isset($_POST['submit_book'])){
        $new = $_POST['submit_book'];

        $query="INSERT INTO `bookings`(`event_id`,`user_id`) VALUES('$new','$id')";

        $result=mysqli_query($conn,$query);
        // echo $result;
        // echo $query;
        if($result){
            header("Location:user1.php");
        }else{
            echo("ERROR: ".$query."<br>".mysqli_error($conn));
        }
       
    }

    if(isset($_POST['delete_book'])){
        $bookingid = $_POST['delete_book'];

        // deleting booked event
        $sqldeleteEvent = "DELETE FROM `bookings` WHERE `booking_id` = $bookingid && `user_id` = $id";

        // check if insert is successful
        if(mysqli_query($conn, $sqldeleteEvent)){
            header("Location: user1.php");
        }
        else{
            echo("ERROR: ".$sqldeleteEvent."<br>".mysqli_error($conn));
        }
    }
?>



