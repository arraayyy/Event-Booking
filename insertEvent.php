<?php
     include "connect.php" ;

    //  include("functions.php");    
    if(isset($_POST['submitNewEvent'])) {

      // get from 
      $id = $_POST['id'];
      $name = $_POST['event_name'];
      $event_loc= $_POST['event_loc'];
      $image = $_POST['event_image'];
      
  
      // echo "$id";

      // insert to database
      $query = "INSERT INTO events(`user_id`,`event_name`,`event_image`,`event_loc`) VALUES ('$id','$name','$image','$event_loc')";
      $result = mysqli_query($conn, $query);   

      session_start();
      header("Location: index.php");
    }

?>

