<?php

    require('config.php');
    session_start();
    $err_msg = null;

    $data = null;

    if(isset($_POST['login_user'])){

        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query = "SELECT userid, email, password FROM `users` WHERE email= '$email' and password = '$password'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));

        $rows = mysqli_num_rows($result);

        if($rows == 1){

            $_SESSION['email'] = $email;
            $data = $rows['userid'];
            header('Location: add_data.php');
        }else{

            $err_msg = "Oops something is wrong. Try again!";
        }


    }

    $_SESSION['uid'] = $data;

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
            <form  class="login-form" action="login.php" method="post">

                <div class="container">

                    <div class="row">
                        <div class="col-sm-3">


                            <h1>Login</h1>
                            <h2><?php echo $err_msg ?></h2>
                            <p>Fill up the form below:</p>

                            <hr class="mb-2">
                            <!-- Form design-->
                            <!-- Get Username, email id and password for the registration purpose -->

                            <label for="username"><b>Email</b></label>
                            <input class="form-control" type="text" name="email" required>

                            <label for="password"><b>Password</b></label>
                            <input class="form-control" type="password" name="password" required>
                            
                            <hr class="mb-2">

                            <input class="btn btn-primary" type="submit" name="login_user" value="Login ">

                            <hr class="mb-2">
                            <p> Not a user? <a href="register.php"><b>Register</b></a>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>