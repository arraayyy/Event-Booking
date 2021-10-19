<?php
    session_start();

    include_once "connect.php";
    include_once "functions.php";    

    $user_data = check_login($conn);
    $userID = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
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

        <!---------- CARD FOR USER ----------> 
        <div class="card mt-5 px-3 py-3 container align-items-center bg-dark text-white" style="width: 35rem;">
            <span class="card-header h3 text-center text-secondary fw-bold fs-2">USER</span>

            <!---------- USER NAME ----------> 
            <div class="card-body border-0">
                <h5 class="card-title mt-4">
                    <?php echo  $user_data['name']; ?>
                </h5>
            </div>

            <!---------- LOGOUT ----------> 
            <a href="logout.php">
                <button class="btn btn-dark btn-outline-light mt-3 mb-2" name="logout" id="logout">
                    Logout
                </button>
            </a>

             <!---------- HR ---------->
             <hr width="500px;" size="7">

             <!---------- TABS ---------->
            <ul class="nav nav-pills mt-2" id="myTab" role="tablist">

                <!---------- DISPLAY EVENTS TAB ---------->
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="display_event" data-bs-toggle="tab" data-bs-target="#disEvent" type="button" role="tab" aria-controls="home" aria-selected="true">Display Events</button>
                </li>

                <!---------- BOOKED EVENTS TAB ---------->
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="booked_tab" data-bs-toggle="tab" data-bs-target="#booked" type="button" role="tab" aria-controls="profile" aria-selected="false">Booked Events</button>
                </li>
            </ul>

            <hr width="305px;" size="6">

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="disEvent" role="tabpanel" aria-labelledby="display-event">
                    <div class="container">

                        <?php
                            $displayAllEvent = "SELECT * FROM `events`";
                            $displayAllEvent_res = $conn->query($displayAllEvent);

                            if($displayAllEvent_res->num_rows > 0){
                                while($AllEvent_row = $displayAllEvent_res->fetch_assoc()){ 
                        ?>

                        <!---------- DISPLAY ---------->
                        <div class="card mt-5 px-3 py-3 bg-dark border border-outline-light" style="width: 27rem;">
                            
                            <!---------- EVENT IMAGE ---------->
                            <img src="img/<?php echo $AllEvent_row['event_image']?>" class="card-img-top" height="auto" width="auto" alt="<?php echo $AllEvent_row['event_image']?>">
                                
                            <!---------- EVENT NAME ---------->
                            <div class="card-body">
                                <h5 class="card-title text-light fw-bold fs-4 text-center" style="font-family:'Fira Sans', sans-serif;"><?php echo $AllEvent_row['event_name']?></h5>
                            </div>
                            
                            <!---------- BUTTON ---------->
                            <div class="container text-center">
                                <form method="post"action="book.php">
                                    <button class="btn btn-dark btn-outline-primary" name="submit_book" type="submit" value="<?php echo $AllEvent_row['event_id']?>">BOOK</button>
                                </form>
                            </div>
                        </div>

                        <?php
                        }
                    }
                        ?>
                    </div>
                </div>

                <div class="tab-pane fade" id="booked" role="tabpanel" aria-labelledby="booked-tab">
                    <div class="container">
                        <?php
                            $Event = "SELECT * FROM bookings RIGHT JOIN events ON bookings.event_id = events.event_id && bookings.user_id = $userID";
                            $Event_res = $conn->query($Event);
                            
                            if($Event_res-> num_rows > 0){
                                while($Event_row = $Event_res->fetch_assoc()){ 
                        ?>
                                <div class="card mt-5 px-3 py-3 bg-dark border border-outline-light" style="width: 27rem;">
                                    
                                    <img src="img/<?php echo $Event_row['event_image']?>" class="card-img-top" height="auto" width="auto" alt="<?php echo $AllEvent_row['event_image']?>">
                                    
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