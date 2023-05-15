<?php
    include "connect.php"; 
    
    $id = $_GET['view']; // id
    

    // $eventDetails ="SELECT * FROM bookings,events,users_detail WHERE bookings.event_id = events.event_id AND events.event_id = '$id' AND bookings.user_id = users_detail.user_id";
    
    // $qry = mysqli_query($conn,$eventDetails); 
    // $data = mysqli_fetch_array($qry); // fetch data



    //  include("functions.php");    
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">   
    <!-- <style>
        html, body {
            width: 100%;
            height: 100%;
            margin: 0 auto;
        }
        body {
            background: url("./img/simple.png") no-repeat fixed center ;
        }
    
    </style> -->
</head>

<body>
<header>

    <div class="overlay"></div>
    
    <img src="./img/simple.png">

    <div class="container overflow-auto h-100">
            <div class="d-flex h-100 align-items-center">
                    <div class="w-100">
                    
                        <!---------- CARD FOR FORM ----------> 
                        <div class="container">
                            <div class="card mt-5 px-3 py-3 mb-3 mt-3 container bg-transparent text-white" style="width: 40rem;">
                                <?php
                                    $eventDetails ="SELECT * FROM events WHERE events.event_id = '$id'";
                                    $qry = $conn->query($eventDetails);
                                    // $qry = mysqli_query($conn,$eventDetails); 
                                    // $data = mysqli_fetch_array($qry); // fetch data
                                    if($qry->num_rows >= 0){
                                        while($data = $qry->fetch_assoc()){
                                ?> 
                            
                            
                            <div class="card-header border border-outline-dark h3 text-center bg-transparent fw-bold fs-2 mb-3"><?php echo $data['event_name']?></div>

                                    <!-- <img src="img/<?php echo $data['event_image']?>" class="card-img-top" style="width: 25rem; height: auto" alt="<?php echo $data['event_image']?>"> -->
                                <?php
                                        }
                                    }
                                ?>      
                                <!-- <div class="card mt-5 mb-5 px-3 py-3 bg-transparent text-dark border border-outline-dark"> -->
                                <div class=" mb-5 px-3 py-1 bg-transparent text-white">
                                    <!---------- EVENT NAME ---------->
                                    <div class="card-body">
                                        <h3>ATTENDEES</h3>
                                        <?php
                                            $eventUser ="SELECT users_detail.name FROM bookings,events,users_detail WHERE bookings.event_id = events.event_id AND events.event_id = '$id' AND bookings.user_id = users_detail.user_id";
                                            $qry = $conn->query($eventUser);
                                            // $qry = mysqli_query($conn,$eventDetails); 
                                            // $data = mysqli_fetch_array($qry); // fetch data
                                            if($qry->num_rows > 0){
                                                while($user = $qry->fetch_assoc()){
                                        ?> 

                                        <P>
                                        <?php echo $user['name'] ?> 
                                        </P>
                                        <?php
                                                }
                                            }
                                        ?>                 

                                    </div>
                                    <hr size="5">
                                </div>
                                <!-- DISCUSSION BOARD -->
                                <form action="comment.php" method="POST">
                                    <div class="mt-3">
                                        <label class="form-label">Comment:</label>
                                        <input type="hidden" name="event_id" value="<?php echo $id;?>">
                                        <input autocomplete="off" type="text" class="form-control bg-transparent text-white" name="comment" id="comment">
                                    </div>
         
                                    <!------------------SUBMIT ------------------------->
                                        <div class="mt-4 text-center">
                                            <button class="btn btn-dark btn-outline-light" name="postNewComment" id="postNewComment">Submit</button>
                                        </div>
                                </form> 
                                <!------------------SUBMIT ------------------------->
                                <hr size="5">
                                <div class="card-body">
                                        <h3 class="text-center p-4 text-underline">DISCUSSION BOARD</h3>
                                        <?php
                                            $displayComment ="SELECT * FROM forum,users_detail,events WHERE forum.event_id = events.event_id AND events.event_id = '$id' AND forum.user_id = users_detail.user_id";
                                            $qry = $conn->query($displayComment);
                                            // $qry = mysqli_query($conn,$eventDetails); 
                                            // $data = mysqli_fetch_array($qry); // fetch data
                                            if($qry->num_rows > 0){
                                                while($user = $qry->fetch_assoc()){
                                        ?> 

                                        <figure class="text-center">
                                            <blockquote class="blockquote">
                                                <p><?php echo $user['user_comment'] ?></p>
                                            </blockquote>
                                            <figcaption class="blockquote-footer" style="color: #748a87 !important;">
                                            <?php echo $user['name'] ?> <cite title="Source Title"></cite>
                                            </figcaption>
                                        </figure>
                                        <P>
                                        
                                        </P>
                                        <?php
                                                }
                                            }
                                        ?>                 
                                    </div>
                                
                                <div class="text-center ">
                                    <a href="index.php"><button class="btn btn-danger">Back</button></a>
                                </div>
    
                        </div>

      
                    </div>
                </div>
            </div>
    </header>
</body>
</html>


