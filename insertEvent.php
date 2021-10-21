<?php
     include "connect.php" ;

    //  include("functions.php");    
    if(isset($_POST['submitNewEvent'])) {

      // get from from
      $name = $_POST['event_name'];
      $image = $_POST['event_image'];

      // insert to database
      $query = "INSERT INTO events(`event_name`,`event_image`) VALUES ('$name','$image')";
      $result = mysqli_query($conn, $query);   
       
      session_start();
      header("Location: index.php");
    }

?>

