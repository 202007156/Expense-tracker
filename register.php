<?php 
    require ('config.php');
    
    if(isset($_REQUEST['username']))
    {
        
        if($_REQUEST['password'] == $_REQUEST['cpassword']){

            $userName = stripslashes($_REQUEST['username']);
            $userName = mysqli_real_escape_string($con, $userName);

            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($con, $email);
           
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);

            $query = " INSERT INTO `users` (username, email, password) VALUES ('$userName', '$email', '$password')";
            
            $result = mysqli_query($con, $query);

            if($result){

                header("Location: login.php");
            }else
            {
                echo("Please check your registration credentials!");
            }

        }
    }


?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
    </head>

    <body>

        <!-- Check whether user submitted the form -->

        <div>
            <form action="" method="POST">

                <div class="container">

                    <div class="row">
                        <div class="col-sm-3">


                            <h1>Registeration</h1>
                            <p>Fill up the form below:</p>

                            <hr class="mb-2">
                            <!-- Form design-->
                            <!-- Get Username, email id and password for the registration purpose -->

                            <label for="username"><b>Username</b></label>
                            <input class="form-control" type="text" name="username" required>

                            <label for="email"><b>Email Address</b></label>
                            <input class="form-control" type="email" name="email" required>

                            <label for="password"><b>Password</b></label>
                            <input class="form-control" type="password" name="password" required>

                            <label for="cpassword"><b>Confirm Password</b></label>
                            <input class="form-control" type="password" name="cpassword" required>
                            
                            <hr class="mb-2">

                            <input class="btn btn-primary" type="submit" name="create" value="Register">
                            
                            <hr class="mb-2">

                            <p>Already a user <a href="login.php"><b>Login</b></a></p>


                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>