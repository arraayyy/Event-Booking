<?php
    session_start();

    include "connect.php";
    include "functions.php";
    $user_data = check_login($conn);
    // $userID = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <style>
        html, body {
            width: 100%;
            height: 100%;
            margin: 0 auto;
        }
        body {
            background: url("./img/simple.png") no-repeat fixed center ;
        }
    
    </style>
</head>
<body>
    <div class="container">

        <!---------- CARD FOR ADMIN ----------> 
        <div class="card mt-5 px-3 py-3 container align-items-center bg-dark text-white" >
            <span class="card-header h3 text-center text-secondary fw-bold fs-2"> <?php echo  $user_data['name']; ?></span>
         

            <!---------- ADMIN NAME ----------> 
            <div class="card-body border-0">
                <h5 class="card-title mt-4">
                    <?php echo  $user_data['location']; ?>
                </h5>
            </div>

            <!---------- LOGOUT ----------> 
            <a href="logout.php">
                <button class="btn btn-dark btn-outline-light mt-3 mb-2" name="logout"  id="logout">
                    Logout
                </button>
            </a>

            <!---------- HR ---------->
            <hr width="500px;" size="7">

            <!---------- TABS ---------->
            <ul class="nav nav-pills mt-2" id="myTab" role="tablist">

                <!---------- CREATE EVENT TAB ---------->
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="event_tab" data-bs-toggle="tab" data-bs-target="#event" type="button" role="tab" aria-controls="home" aria-selected="true">Create Event</button>
                </li>


                 <!---------- DISPLAY TAB ---------->
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="display-tab" data-bs-toggle="tab" data-bs-target="#display" type="button" role="tab" aria-controls="display" aria-selected="false">Display</button>
                </li>
                <!---------- JOINED EVENT TAB ---------->
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="joined-tab" data-bs-toggle="tab" data-bs-target="#joined" type="button" role="tab" aria-controls="joined" aria-selected="false">Joined Event</button>
                </li>
            </ul>

            <!---------- HR ---------->
            <hr width="305px;" size="6">

            <!---------- TABS' CONTENT ---------->
            <div class="tab-content" id="myTabContent">

                <!---------- CREATE EVENT CONTENT ---------->
                <div class="tab-pane fade show active" id="event" role="tabpanel" aria-labelledby="event_tab">
                    
                     <!---------- FORM OF CREATE EVENT ---------->
                    <form action="insertEvent.php" method="POST">
                        <div class="mt-3">
                            <label class="form-label">Event Name</label>
                            <input type="hidden" name="id" value="<?php echo $user_data['user_id'];?>" required>
                            <input autocomplete="off" type="text" class="form-control bg-dark text-white" name="event_name" id="event_name">
                            
                            <label class="form-label mt-3">Location</label>
                            <input tautocomplete="off" ype="text" class="form-control bg-dark text-white" name="event_loc" id="event_loc" required>
                        </div>
         
                        <!------------------ UPLOAD IMAGE ------------------>
                        <div class="mt-3">
                            <label class="form-label">Event Image</label>
                            <input type="file" class="form-control bg-dark text-white" name="event_image" id="event_image" accept="image/png, image/jpeg, image/jpg" required>
                        </div>
                        
                        <!---------- HR ---------->
                        <hr size="5">

                        <!------------------SUBMIT ------------------------->
                        <div class="mt-4 text-center">
                            <button class="btn btn-dark btn-outline-primary" name="submitNewEvent" id="submitNewEvent">Submit</button>
                        </div>
                    </form> 
                </div>

                <!---------- DISPLAY CONTENT ---------->
                <div class="tab-pane fade" id="display" role="tabpanel" aria-labelledby="display-tab">
                    
                    <!---------- EVENT WORD ---------->
                    <h3 class="text-white h3 text-center mt-3 fw-bold" style="font-family:'Fira Sans', sans-serif;">EVENTS</h3>
       
                    <!---------- TABLE---------->
                    <div class="container">
                        
                        
                        <div class="row">
                            
                            <!-- COL 1 -->
                            <div class="col">
                                <?php
                                $location = $user_data['location'];

                                $displayAllEvent = "SELECT * FROM `events` WHERE event_loc = '$location'";
                                $displayAllEvent_res = $conn->query($displayAllEvent);

                                if($displayAllEvent_res->num_rows > 0){
                                    while($AllEvent_row = $displayAllEvent_res->fetch_assoc()){ 
                                ?>
                                <!---------- DISPLAY CARD ---------->
                                <div class="card mt-5 mb-5 px-3 py-3 bg-dark border border-outline-light">
                                    <!---------- DISPLAY IMAGE ---------->
                                    <img src="img/<?php echo $AllEvent_row['event_image']?>" class="card-img-top" style="width: 25rem; height: auto" alt="<?php echo $AllEvent_row['event_image']?>">
                                    <!---------- EVENT NAME ---------->
                                    <div class="card-body">
                                        <h5 class="card-title text-light fw-bold fs-4 text-center" style="font-family:'Fira Sans', sans-serif;">
                                            <?php echo $AllEvent_row['event_name']?>
                                        </h5>
                                        <h6 class="text-center">
                                            <?php echo $AllEvent_row['event_loc'] ?>
                                        </h6>
                                        <p class="text-muted text-center">
                                            <?php echo $AllEvent_row['status'] ?>
                                        </p>
                                        <?php
                                            $id = $AllEvent_row['event_id'];
                                            $eventDetails ="SELECT COUNT(users_detail.name) as total FROM bookings,events,users_detail WHERE bookings.event_id = events.event_id AND events.event_id = '$id' AND bookings.user_id = users_detail.user_id";
                                            $qry = $conn->query($eventDetails);
                                            $data = mysqli_fetch_array($qry);
                                        ?>
                                        <p class="text-center">
                                        <img src="./img/users.png" alt=""> <?php echo $data['total']?> 
                                        </p>
                                        <?php
                                            
                                        ?>
                                        
                                    </div>
                                    <!---------- BUTTONS ---------->
                                    <div class="container row">
                                        <div class="col-sm-12 text-center">

                                            <div class="row text-center"> 
                                            <!---------- UPDATE BUTTON ---------->
                                            <div class="col-md-3">
                                                <?php
                                                    if($user_data['user_id'] == $AllEvent_row['user_id']) {
                                                ?>  
                                                    <a href="update.php?edit=<?php echo $AllEvent_row['event_id']; ?>">
                                                        <button class="btn btn-dark btn-outline-primary" name="edit" id="edit">Update</button>
                                                    </a> 
                                                <?php
                                                    }
                                                ?> 
                                            </div>
                                             <!---------- JOIN BUTTON ---------->
                                             <div class="col-md-3">
                                                <form method="post"action="book.php">
                                                    <?php
                                                        $e_id =$AllEvent_row['event_id'];
                                                        $u_id = $user_data['user_id'];
                                                        $booking_j = "SELECT * FROM bookings WHERE  event_id = '$e_id' AND user_id ='$u_id'";
                                                        $query_books = $conn->query($booking_j);
                                                        if(mysqli_num_rows($query_books) == 0){
                                                    ?>
                                                        <button class="btn btn-dark btn-outline-success" name="submit_book" type="submit" id="join" value="<?php echo $AllEvent_row['event_id']?>" >
                                                        Join
                                                        </button>
                                                    <?php        
                                                        }else{
                                                            
                                                        ?>
                                                            <button class="btn btn-dark btn-outline-success" name="submit_book" type="submit" id="join" value="" disabled>
                                                            Joined
                                                            </button>
                                                        <?php
                                                            
                                                        }
                                                    ?>
                                                </form>
                                             </div>
                                             <!---------- VIEW BUTTON ---------->
                                             <div class="col-md-3">
                                                <a href="view.php?view=<?php echo $AllEvent_row['event_id']; ?>">
                                                    <button class="btn btn-dark btn-outline-warning" name="view" id="view">View</button>
                                                </a>
                                            </div>
                                            <!---------- DELETE BUTTON ---------->
                                            <div class="col-md-3">
                                                <?php
                                                    if($user_data['user_id'] == $AllEvent_row['user_id']) {
                                                ?>
                                                    <a href="delete.php?delete=<?php echo $AllEvent_row['event_id']; ?>">
                                                        <button class="btn btn-dark btn-outline-danger" name="edit" id="edit">Delete</button>
                                                    </a>
                                                <?php
                                                    }
                                                ?> 
                                            </div> 
                                           
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <?php
                                        }
                                    }
                                ?>                                                                                                                            
                            </div>
                            
                          
                            <!-- COL 2 -->
                            <div class="col">
                                <?php

                                $location = $user_data['location'];

                                $displayAllEvent = "SELECT * FROM `events` WHERE NOT event_loc = '$location'";
                                $displayAllEvent_res = $conn->query($displayAllEvent);

                                if($displayAllEvent_res->num_rows > 0){
                                    while($AllEvent_row = $displayAllEvent_res->fetch_assoc()){ 
                                ?>
                                <!---------- DISPLAY CARD ---------->
                                <div class="card mt-5 mb-5 px-3 py-3 bg-dark border border-outline-light">
                                    <!---------- DISPLAY IMAGE ---------->
                                    <img src="img/<?php echo $AllEvent_row['event_image']?>" class="card-img-top" style="width: 25rem; height: auto" alt="<?php echo $AllEvent_row['event_image']?>">
                                    <!---------- EVENT NAME ---------->
                                    <div class="card-body">
                                        <h5 class="card-title text-light fw-bold fs-4 text-center" style="font-family:'Fira Sans', sans-serif;">
                                            <?php echo $AllEvent_row['event_name']?>
                                        </h5>
                                        <h6 class="text-center">
                                            <?php echo $AllEvent_row['event_loc'] ?>
                                        </h6>
                                        <p class="text-center text-muted">
                                            <?php echo $AllEvent_row['status'] ?>
                                        </p>
                                        <?php
                                            $id = $AllEvent_row['event_id'];
                                            $eventDetails ="SELECT COUNT(users_detail.name) as total FROM bookings,events,users_detail WHERE bookings.event_id = events.event_id AND events.event_id = '$id' AND bookings.user_id = users_detail.user_id";
                                            $qry = $conn->query($eventDetails);
                                            $data = mysqli_fetch_array($qry);
                                        ?>
                                        <p class="text-center">
                                           <img src="./img/users.png" alt=""> <?php echo $data['total']?> 
                                        </p>
                                        <?php
                                            
                                        ?>
                                    </div>
                                    <!---------- BUTTONS ---------->
                                    <div class="container row">
                                        <div class="col-sm-12 text-center">
                                            
                                            <div class="row text-center">
                                            <!---------- UPDATE BUTTON ---------->
                                            <div class="col-md-3">
                                            <?php
                                                if($user_data['user_id'] == $AllEvent_row['user_id']) {
                                            ?>  
                                                
                                                <a href="update.php?edit=<?php echo $AllEvent_row['event_id']; ?>">
                                                    <button class="btn btn-dark btn-outline-primary" name="edit" id="edit">Update</button>
                                                </a> 
                                            <?php
                                                }
                                            ?> 
                                            </div>
                                            <!---------- JOIN BUTTON ---------->
                                            <div class="col-md-3">
                                            <form method="post"action="book.php">
                                                    
                                                    <?php
                                                        $e_id =$AllEvent_row['event_id'];
                                                        $u_id = $user_data['user_id'];
                                                        $booking_j = "SELECT * FROM bookings WHERE  event_id = '$e_id' AND user_id ='$u_id'";
                                                        $query_books = $conn->query($booking_j);
                                                        if(mysqli_num_rows($query_books) == 0){
                                                            // echo "wala_ka_apil";
                                                    ?>
                                                        <button class="btn btn-dark btn-outline-success" name="submit_book" type="submit" id="join" value="<?php echo $AllEvent_row['event_id']?>" >
                                                        Join
                                                        </button>
                                                    <?php        
                                                        }else{
                                                            // echo "ka_apil";
                                                        ?>
                                                            <button class="btn btn-dark btn-outline-success" name="submit_book" type="submit" id="join" value="" disabled>
                                                            Joined
                                                            </button>
                                                        <?php
                                                            
                                                        }
                                                    ?>
                                                
                                            </form>
                                            </div>
                                             <!---------- VIEW BUTTON ---------->
                                             <div class="col-md-3">
                                                <a href="view.php?view=<?php echo $AllEvent_row['event_id']; ?>">
                                                    <button class="btn btn-dark btn-outline-warning" name="view" id="view">View</button>
                                                </a>
                                            </div>
                                            <!---------- DELETE BUTTON ---------->
                                            <div class="col-md-3">
                                            <?php
                                                if($user_data['user_id'] == $AllEvent_row['user_id']) {
                                            ?>
                                                <a href="delete.php?delete=<?php echo $AllEvent_row['event_id']; ?>">
                                                    <button class="btn btn-dark btn-outline-danger" name="edit" id="edit">Delete</button>
                                                </a>
                                            <?php
                                                }
                                            ?> 
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                <?php
                                        }
                                    }
                                ?>                                                                                                                               
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <!---------- JOINED TAB CONTENT ---------->
                <div class="tab-pane fade mb-5" id="joined" role="tabpanel" aria-labelledby="booked-tab">
                    <div class="container">
                        <?php
                            $userID = $user_data['user_id'];
                            $Event = "SELECT * FROM bookings,events WHERE bookings.user_id = '$userID' AND bookings.event_id = events.event_id";
                            $Event_res = $conn->query($Event);
                            
                            if($Event_res-> num_rows > 0){
                                while($Event_row = $Event_res->fetch_assoc()){ 
                        ?>
                    
                        <!---------- DISPLAY CARD ---------->
                                <div class="card mt-5 px-3 py-3 bg-dark border border-outline-light" style="width: 27rem;">
                                    
                                    <img src="img/<?php echo $Event_row['event_image']?>" class="card-img-top" height="auto" width="auto" alt="<?php echo $Event_row['event_image']?>">
                                    
                                    <div class="card-body">
                                        <h5 class="card-title text-light fw-bold fs-4 text-center" style="font-family:'Fira Sans', sans-serif;"><?php echo $Event_row['event_name']?></h5>
                                    </div>

                                    <div class="container text-center">
                                        <form method="post"action="book.php">
                                            <button class="btn btn-dark btn-outline-danger" name="delete_book" type="submit" value="<?php echo $Event_row['booking_id']?>">CANCEL</button>
                                        </form>
                                    </div>
                                </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div> 
            </div>
        </div> 
    </div>


</body>
</html>