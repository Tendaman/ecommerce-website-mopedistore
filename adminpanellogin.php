<?php
session_start();
@include 'config.php';
@include 'functions.php';
@include 'loginheader.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password)){
        $query = "SELECT * FROM `admins` WHERE `user_name` = '$user_name' limit 1";
        $result = mysqli_query($conn, $query);
        if($result){
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] === $password){
                    $_SESSION['user_id'] = $user_data['id'];
                    echo "<script> location.href='admin.php'; </script>";
                    die;
                }
            }
        }
        echo "Wrong information added!";
    }else{
        echo "All fields are required";
    }
}
?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $user_id = random_num(5);

    if(!empty($user_name) && !empty($email) && !empty($phone_number) && !empty($password)){
        $query = "INSERT INTO `admins` (`id`, `user_name`, `email`, `phone_number`, `password`) values ('$user_id', '$user_name', '$email', '$phone_number', '$password')";
        mysqli_query($conn, $query);
        echo "<script> location.href='login.php'; </script>";
        echo "Signup Successful";
        die;
    }else{
        echo "All fields are required";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Login</title>
        <link rel="stylesheet" href="css/indexstyle.css" />
        
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

        <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Flickity CSS link -->
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="home">
            <div class="lban3">
                <div class="start-nav">
                    <h1>Mopedi Store Admin Panel</h1>
                    <p>Welcome To Mopedi Store Admin Panel. Control Mopedi Store Admin Duties here</p>
                </div>
            </div>
            <div class="form_container">
                <i class="uil uil-times form_close"></i>
                <div class="form login_form">
                    <form method="post" id="loginForm" >
                        <h2>Admin Login</h2>

                        <div class="input_box">
                            <input type="text" placeholder="Enter your username" required name="user_name"><br><br>
                            <i class="uil uil-user username"></i>
                        </div>
                        <div class="input_box">
                            <input type="password" placeholder="Enter your password" required name="password"><br><br>
                            <i class="uil uil-lock password"></i>
                            <i class="uil uil-eye-slash pw_hide"></i>
                        </div>
                        <div class="option_field">
                            <span class="checkbox">
                                <input type="checkbox" id="check" />
                                <label for="check">Remember me</label>
                            </span>
                            <a href="#" class="forgot_pw">Forgot password?</a>
                        </div>
                        <input class="button" id="loginButton" type="submit" value="login">Login Now</input><br><br>

                        <div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
                    </form>
                </div>

                <div class="form signup_form">
                    <form id="signupForm" method="post">
                        <h2>Admin Sign-up</h2>
                        <div class="input_box">
                            <input id="text" type="text" placeholder="Create a username" required name="user_name"><br><br>
                            <i class="uil uil-user username"></i>
                        </div>
                        <div class="input_box">
                            <input id="text" type="email" placeholder="Enter your email" required name="email"><br><br>
                            <i class="uil uil-envelope-alt email"></i>
                        </div>
                        <div class="input_box">
                            <input id="text" type="number" placeholder="Enter your phone number" required name="phone_number"><br><br>
                            <i class="uil uil-phone phone_num"></i>
                        </div>
                        <div class="input_box">
                            <input id="text" type="password" placeholder="Enter your password" required name="password"><br><br>
                            <i class="uil uil-lock password"></i>
                            <i class="uil uil-eye-slash pw_hide"></i>
                        </div>
                        <div class="input_box">
                            <input id="text" type="password" placeholder="Confirm your password" required name="confirm_password"><br><br>
                            <i class="uil uil-lock password"></i>
                            <i class="uil uil-eye-slash pw_hide"></i>
                        </div>

                        <input class="button" type="submit" id="signupButton" value="signup">Signup Now</input><br><br>
                        <div class="login_signup">Already have an account? <a href="#" id="login">Login</a></div>
                </div>
                </form>
            </div>
        </di>
    <script src="js/scripts.js"></script> 
    <script src="js/script.js"></script> 
</body>
</html>