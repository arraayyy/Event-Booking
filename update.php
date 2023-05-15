<?php
    include "connect.php"; 

    $id = $_GET['edit']; // id
    $qry = mysqli_query($conn,"SELECT * FROM events WHERE event_id = '$id'"); 
    $data = mysqli_fetch_array($qry); // fetch data

    if(isset($_POST['submit'])) // when update button is clicked 
    {
        $fullname = $_POST['eventName'];
        $stats = $_POST['status'];
        $edit = mysqli_query($conn,"UPDATE events SET event_name = '$fullname', status='$stats' WHERE event_id = '$id'"); // update
        
        if($edit) {
            header("Location: index.php"); 
            die;
        } else {
            echo mysqli_error();
        }    	
    }

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
</head>
</head>
<body>
<header>

    <div class="overlay"></div>
    
    <img src="./img/simple.png">

    <div class="container h-100">
                <div class="d-flex h-100 align-items-center">
                    <div class="w-100">

                        <!---------- CARD FOR FORM ----------> 
                        <div class="container">
                            <form class="card mt-5 px-3 py-3 container bg-transparent text-white" style="width: 30rem;" method = "POST">
                                <div class="card-header h3 text-center bg-dark fw-bold fs-2">EDIT EVENT NAME</div>

                                    <select class="form-select mt-4 bg-dark text-white" name="status" aria-label="Default select example">
                                        <?php
                                            if($data['status'] == 'Upcoming'){
                                                ?>
                                                <option  selected><?php echo $data['status'] ?></option>
                                                <option value="Ongoing">Ongoing</option>
                                                <option value="Ended">Ended</option>
                                                <?php
                                            }else if($data['status'] == 'Ongoing'){
                                                ?>
                                                <option  selected><?php echo $data['status'] ?></option>
                                                <option value="Upcoming">Upcoming</option>
                                                <option value="Ended">Ended</option>
                                                <?php
                                            }else if($data['status'] == 'Ended'){
                                                ?>
                                                <option  selected><?php echo $data['status'] ?></option>
                                                <option value="Upcoming">Upcoming</option>
                                                <option value="Ongoing">Ongoing</option>
                                                <?php
                                            }else{
                                                ?>
                                                <option  selected value="Upcoming">Upcoming</option>
                                                <option value="Ongoing">Ongoing</option>
                                                <option value="Ended">Ended</option>
                                                <?php
                                            }
                                        ?>
                                        
                                    </select>

                                    <div class="row align-items-center">
                                        <div class="row mt-4 text-center">
                                            <div class="col-md-8">
                                                <input autocomplete="off" type="text" class="form-control w-5" name="eventName" value="<?php echo $data['event_name'] ?>" Required>
                                            </div>
                                            
                                            <div class="col-md-2 ">
                                                <button class="btn btn-outline-primary" type="submit" name="submit">Update</button>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <button class="btn btn-outline-danger mx-3 "><a href="index.php" style="color:white; text-decoration:none;">Back</a></button>
                                            <div>
                                        </div> 
                                </div>
                            </form>
                            

                            
                          
                        </div>
                        
                    </div>
                </div>
            </div>
    </header>
    
</body>
</html>



