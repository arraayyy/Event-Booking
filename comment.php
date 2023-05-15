<?php
    session_start();

    include "connect.php";
    include "functions.php";    
    
    $user_data = check_login($conn);
    $id = $_SESSION['user_id'];

    echo $id;

    if(isset($_POST['postNewComment'])) {

        // get from 
        $event_id = $_POST['event_id'];
        $user_comment= $_POST['comment'];
        
    
        // echo "$id";
  
        // insert to database
        $query = "INSERT INTO forum(`user_id`,`user_comment`,`event_id`) VALUES ('$id','$user_comment','$event_id')";
        $result = mysqli_query($conn, $query);   
        if($result){
            // after submitting the comment, redirect to the view.php event page 
            header("Location:view.php?view=" . $event_id);

            // header("Location:view.php?view='$event_id'");
        }else{
            echo("ERROR: ".$query."<br>".mysqli_error($conn));
        }
      }
  ?>