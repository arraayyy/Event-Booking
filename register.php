<?php 

    include("connect.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // something was posted
        $user_name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];

        if(!empty($user_name) && !empty($email) && !empty($password) && !empty($name)){
            // save to database
            $query = "INSERT INTO `users_detail` (`username`, `password`, `email`, `name`) VALUE ('$user_name', '$password', '$email', '$name')";
            
            mysqli_query($conn, $query);

            // header("Location: login.php");
            // die;
        } else {
            echo "Please enter some valid information";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">

        <!---------- FORM FOR REGISTER ---------->
        <form action="" method="POST" class="card mt-4 bg-dark border border-outline-light px-3 py-3" style="width: 20rem;">
            <div class="card-header h4 text-center fw-bold">REGISTER</div>
                <div class="row align-items-center">

                    <!---------- USERNAME ---------->
                    <div class="mt-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control bg-dark text-white" id="username" name="username" required>
                    </div>

                    <!---------- PASSWORD ---------->
                    <div class="mt-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control bg-dark text-white" id="password" name="password" required>
                    </div>

                    <!---------- NAME ---------->
                    <div class="mt-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control bg-dark text-white" id="name" name="name" required>
                    </div>

                    <!---------- EMAIL ---------->
                    <div class="mt-4">
                        <label for="name" class="form-label">Username</label>
                        <input type="email" class="form-control bg-dark text-white" id="email" name="email" required>
                    </div>

                    <!---------- REGISTER BUTTON ---------->
                    <div class="mt-4 text-center">
                        <button class="btn btn-dark btn-outline-primary ">Register</button>
                    </div>

                </div>
            
        </form>
    </div>
</body>
</html>