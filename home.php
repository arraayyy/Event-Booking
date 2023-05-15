<?php
    include "connect.php";
    include "functions.php";    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>

        
        <div class="overlay"></div>
        <!---------- BACKGROUND IMG ---------->
        <img src="./img/simple.png">
        
        <!--<div class="container"> 
            <div class="d-flex h-100 align-items-center">
                <h1 class="text-white ">WELCOME TO GYL'S EVENT</h1>
            </div>
                 -->
        <div class="container">
            <!-- <div class="w-auto position-absolute top-0 end-0  align-items-right m-5">
                <a href="login.php" class="btn btn-light btn-outline-dark " >Login</a>
                &nbsp;
                <a href="register.php" class="btn btn-light btn-outline-dark ">Register</a>
            </div> -->

         </div>

            <div class="container h-100">
            <div class="d-flex h-100 align-items-center">
                <div class="w-100">
                    
                    <!---------- CARD FOR FORM ----------> 
                    <div class="container card mt-5 px-3 py-3 container bg-transparent text-white" style="width: 25rem;">   
                        <div class="row align-items-center">
                            <h1 class="text-center">GYL'S EVENT</h1>
                        </div>
                        
                       
                    </div>
                    
                    <div class="w-auto text-center m-5">
                        <a href="login.php" class="btn btn-outline-info " >Login</a>
                        &nbsp;
                        <a href="register.php" class="btn btn-outline-warning" >Register</a>
                    </div>
                </div>
            </div>
        </div>
        
    </header>
</body>
</html>