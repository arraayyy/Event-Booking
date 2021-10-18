<?php
    include "connect.php"; 

    $id = $_GET['edit']; // id
    $qry = mysqli_query($conn,"SELECT * FROM events WHERE event_id = '$id'"); 
    $data = mysqli_fetch_array($qry); // fetch data

    if(isset($_POST['submit'])) // when update button is clicked 
    {
        $fullname = $_POST['eventName'];
        $edit = mysqli_query($conn,"UPDATE events SET event_name = '$fullname' WHERE event_id = '$id'"); // update
        
        if($edit) {
            header("Location: index.php"); 
            exit;
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
</head>
<body>
    <form method="POST" class="form-inline">
        <div class="row">
            <div class="col-md-4">
                <input type="text" class="form-control" name="eventName" value="<?php echo $data['event_name'] ?>" placeholder="Enter Full Name" Required>
            </div>
            <div class="col-md-4">
                <button class="btn btn-dark btn-outline-primary" onclick="#display" type="submit" name="submit">Update</button>
            </div>
        </div>
    </form>  
</body>
</html>



