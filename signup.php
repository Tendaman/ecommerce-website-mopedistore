<?php
session_start();

    @include 'config.php';
    @include 'functions.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($email) && !empty($phone_number) && !empty($password)){
            $user_id = random_num(20);
            $query = "INSERT INTO `users` (`id`, `user_name`, `email`, `phone_number`, `password`) values ('$user_id', '$user_name', '$email', '$phone_number', '$password')";
            mysqli_query($conn, $query);
            header("Location: login.php");
            die;
        }else{
            echo "All fields are required";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
    </head>
    <body>
        <style type="text/css">
            #text{
                height: 25px;
                border-radius: 5px;
                padding: 4px;
                border: solid thin #aaa;
                width: 100%;
            }

            #input_txt{
                font-size: 18px;
                color: white;
            }

            #button{
                padding: 10px;
                width: 100px;
                color: white;
                background-color: lightblue;
                border: none;
            }

            #box{
                background-color: grey;
                margin: auto;
                width: 300px;
                padding: 20px;
            }
        </style>

        <div id="box">
            <form method="post">
                <div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
                <div id="input_txt">Username</div>
                <input id="text" type="text" name="user_name"><br><br>
                <div id="input_txt">Email</div>
                <input id="text" type="text" name="email"><br><br>
                <div id="input_txt">Phone number</div>
                <input id="text" type="number" name="phone_number"><br><br>
                <div id="input_txt">Password</div>
                <input id="text" type="password" name="password"><br><br>
                <div id="input_txt">Confirm Password</div>
                <input id="text" type="password" name="confirm_password"><br><br>
                <input id="button" type="submit" value="signup"><br><br>
                <div style="font-size: 20px;margin: 10px;color: white;">Already have an account?</div>
                <a href="login.php">Login</a><br><br>
            </form>
        </div>
    </body>
</html>