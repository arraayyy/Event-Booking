<?php
    session_start();

    include_once "connect.php";
    include_once "functions.php";    

    $user_data = check_login($conn);
    // $_SESSION['user']=$user_data['']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div>
        <form action="" method="post">
        <!----------------USER NAME  ------------------------->
        <strong><p><?php echo  $user_data['name']; ?></p></strong>
        <!----------------LOGOUT BTN  ------------------------->
        <a href="logout.php"><input type="button" name="logout"  id="logout" value="Logout"></a>
        <hr>
        
        <br>
        <hr>
        <!-- <input type="button" name="display_event"  id="display_event" value="Display Events">
        <input type="button" name="booked_event"  id="booked_event" value="Booked Events"> -->
        
        <!-- .................BELOW IS FOR TAGS .................-->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                    <button class="nav-link" id="display-tab" data-bs-toggle="tab" data-bs-target="#display" type="button" role="tab" aria-controls="display" aria-selected="true">Display Event</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#booked" type="button" role="tab" aria-controls="home" aria-selected="false">Booked Event</button>
            </li>
        </ul>
        <div class="tab-pane fade" id="display" role="tabpanel" aria-labelledby="display-tab">
                    <div class="container">
                        <?php
                            $displayAllEvent = "SELECT * FROM `events`";
                            $displayAllEvent_res = $conn->query($displayAllEvent);

                            if($displayAllEvent_res->num_rows > 0){
                                while($AllEvent_row = $displayAllEvent_res->fetch_assoc()){ 
                                    ?>
                                    <div class="card h-90">
                                        
                                            <img src="img/<?php echo $AllEvent_row['event_image']?>" class="card-img-top" height="auto" width="auto" alt="<?php echo $AllEvent_row['event_image']?>">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $AllEvent_row['event_name']?></h5>
                                            </div>
                                        <form method="post"action="book.php">
                                            <button name="submit_book" type="submit" value="<?php echo $AllEvent_row['event_id']?>">Book</button>
                                        </form>
                                   
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
           
        <div class="tab-pane fade" id="booked" role="tabpanel" aria-labelledby="home-tab">
            <h2>Events</h2>
                <div>
                    <img src="">
                    <h3>EVENT NAME</h3>
                    <form action="">
                    <button name="book" id="book">Book</button>
                    </form>
                    <!-- <input type="button" name="book"  id="book" value="Book"> -->
                </div>
        </div> 
    </div>
    
</body>

</html>