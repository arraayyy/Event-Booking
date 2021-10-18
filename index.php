<?php
    session_start();

    include_once "connect.php";
    include_once "functions.php";    
    
    $user_data = check_login($conn);
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
        <div class="card mt-5 px-3 py-3 container align-items-center bg-dark text-white" style="width: 35rem;">
            <span class="card-header h3 text-center text-secondary fw-bold fs-2">ADMIN</span>
         

            <!---------- ADMIN NAME ----------> 
            <div class="card-body border-0">
                <h5 class="card-title mt-4">
                    <?php echo  $user_data['name']; ?>
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

                 <!---------- CREATE USER TAB ---------->
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="user_tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="profile" aria-selected="false">Create User</button>
                </li>

                 <!---------- DISPLAY TAB ---------->
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="display-tab" data-bs-toggle="tab" data-bs-target="#display" type="button" role="tab" aria-controls="display" aria-selected="false">Display</button>
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
                            <input type="text" class="form-control bg-dark text-white" name="event_name" id="event_name">
                        </div>
         
                        <!------------------ UPLOAD IMAGE ------------------>
                        <div class="mt-3">
                            <label class="form-label">Event Image</label>
                            <input type="file" class="form-control bg-dark text-white" name="event_image" id="event_image" accept="image/png, image/jpeg, image/jpg">
                        </div>
                        
                        <!---------- HR ---------->
                        <hr size="5">

                        <!------------------SUBMIT ------------------------->
                        <div class="mt-4 text-center">
                            <button class="btn btn-dark btn-outline-primary" name="submitNewEvent" id="submitNewEvent">Submit</button>
                        </div>
                    </form> 
                </div>

                <!---------- CREATE USER CONTENT ---------->
                <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user_tab">
                    <?php include_once "register.php"; ?>
                </div>

                <!---------- DISPLAY CONTENT ---------->
                <div class="tab-pane fade" id="display" role="tabpanel" aria-labelledby="display-tab">
                    
                    <!---------- EVENT WORD ---------->
                    <h3 class="text-white h3 text-center mt-3 fw-bold" style="font-family:'Fira Sans', sans-serif;">EVENTS</h3>

                    <!---------- CARD ---------->
                    <div class="container">
                        <?php
                            $displayAllEvent = "SELECT * FROM `events`";
                            $displayAllEvent_res = $conn->query($displayAllEvent);

                            if($displayAllEvent_res->num_rows > 0){
                                while($AllEvent_row = $displayAllEvent_res->fetch_assoc()){ 
                        ?>
                        
                        <!---------- DISPLAY CARD ---------->
                        <div class="card mt-5 px-3 py-3 bg-dark border border-outline-light" style="width: 27rem;">
                                        
                            <!---------- DISPLAY IMAGE ---------->
                            <img src="img/<?php echo $AllEvent_row['event_image']?>" class="card-img-top" height="auto" width="auto" alt="<?php echo $AllEvent_row['event_image']?>">
                            
                            <!---------- EVENT NAME ---------->
                            <div class="card-body">
                                <h5 class="card-title text-light fw-bold fs-4 text-center" style="font-family:'Fira Sans', sans-serif;"><?php echo $AllEvent_row['event_name']?></h5>
                            </div>
                            
                            <!---------- BUTTONS ---------->
                            <div class="container row">
                                <div class="col-sm-12 text-center">

                                    <!---------- UPDATE BUTTON ---------->
                                    <a href="edit.php?edit=<?php echo $AllEvent_row['event_id']; ?>">
                                        <!-- <input type="button" name="edit"  id="edit" data-bs-target="#diNo" value="Update" > -->
                                        <button class="btn btn-dark btn-outline-primary" name="edit" id="edit" data-bs-target="#diNo">Update</button>
                                    </a>  
                                    
                                    <!---------- DELETE BUTTON ---------->
                                    <a href="delete.php?delete=<?php echo $AllEvent_row['event_id']; ?>">
                                        <button class="btn btn-dark btn-outline-danger" name="edit" id="edit" data-bs-target="#diNo">Delete</button>
                                    </a>
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
</body>
</html>