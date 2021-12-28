<?php

    include("config.php");

    session_start();

    if(!isset($_SESSION["email"])){

        header("Location: login.php");
        exit();
    }

    $email_var = $_SESSION["email"];
    $sql = "SELECT userid, username, email, password FROM users WHERE email='$email_var'";
    $result = $con->query($sql);

    if($result->num_rows>0){

        while($row = $result->fetch_assoc()){

            $userid = $row["userid"];
            $username = $row["username"];
            $useremail = $row["email"];
        }
    }else{
        
        $username = "Error occured while retriving data. Try again!";

    }
?>