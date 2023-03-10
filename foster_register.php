<?php

include './database/config.php';
error_reporting(0);

session_start();

if (isset($_SESSION['fostername'])) {
    header("Location: foster_home.php");
}

if (isset($_POST['submit'])) {

    $fostername = $_POST['fostername'];
    $email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$p = $_POST['password'];
    $error = "";
    $cls="danger";

    if ($password == $cpassword) {
            if (strlen($p) > 5) {

                $query = "SELECT * FROM fosters WHERE fostername = '$fostername'";
                $query_run = mysqli_query($conn, $query);

                if (!$query_run->num_rows > 0) {
                    $query = "SELECT * FROM fosters WHERE fostername = '$fostername' AND email = '$email'";
                    $query_run = mysqli_query($conn, $query);

                    if(!$query_run->num_rows > 0){
                        $query2 = "INSERT INTO fosters(fostername,email,`password`)
                        VALUES ('$fostername', '$email', '$password')";
                        $query_run2 = mysqli_query($conn, $query2);

                        if ($query_run2) {
                            $_SESSION['fostername'] = $_POST['fostername'];
                            echo "<script> alert('Regestration Successfull.');
                            window.location.href='foster_profile.php';
                            </script>";
                            
                        } 
                        else {
                            $error = "Cannot Register";
                        }
                    }
                    else{
                        $error = "foster Already Exists";
                    }

                } 
                else {
                    $error = "fostername Already Exists";
                }
            } 
            else {
                $error =  "Password has to be minimum of 6 charecters";
            }
    } 
    else {
        $error = 'Passwords did not Matched.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/login.css">


</head>

<body id="top"
    style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(images/bg.jpg);width: 100%;min-height: 100vh;background-position: center;background-size: cover;display: flex;justify-content: center;align-items: center;">

    <section>
        <div class="container">
            <form action="" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign Up</p>
                <div class="alert alert-<?php echo $cls;?>">
                    <?php 
                        if (isset($_POST['submit'])){
                        echo $error;
                    }?>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Username" name="fostername" value="<?php echo $fostername; ?>" required>
                </div>
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password"
                        value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Confirm Password" name="cpassword"
                        value="<?php echo $_POST['cpassword']; ?>" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Register</button>
                </div>
                <p class="login-register-text">Have an account? <a href="foster_login.php">Login Here</a>.</p>
            </form>
        </div>

    </section>

    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="js/popper.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="jquery.easing.js"></script>


</body>

</html>