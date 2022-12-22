<?php

include './database/config.php';
error_reporting(0);

session_start();

if (isset($_SESSION['adminname'])) {
    header("Location: admin_home.php");
}

if (isset($_POST['submit'])) {

    $error = "";
    $cls="danger";

	$adminname = $_POST['adminname'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM admin WHERE adminname='$adminname'";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) {

        $sql = "SELECT * FROM admin WHERE `password`='$password'";
        $result = mysqli_query($conn, $sql);
    
        if ($result->num_rows > 0) {
            $sql = "SELECT * FROM admin WHERE adminname='$adminname' AND password='$password'";
            $result = mysqli_query($conn, $sql);
        
            if ($result->num_rows > 0) {
                $_SESSION['adminname'] = $_POST['adminname'];

                $sql = "INSERT INTO recent(`image`, `name`, `role`) VALUES ((SELECT `image` FROM admin WHERE adminname='$adminname'), '$adminname', 'Admin')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    header("Location: admin_home.php");
                }
                
            } else {
                $error="Woops! Someting Went Wrong.";
            }
    
        } else {
            $error= "Woops! Password is Incorrect.";
        }

	} else {
		$error= "Woops! Username is Incorrect.";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>

    <!--====== STYLESHEETS ======-->
    <link rel="stylesheet" href="css/swiper-bundle-min.css" />
    <link rel="stylesheet" href="css/bootstrap-min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/remixicon.css">
    <link rel="stylesheet" href="css/theme-icon.css">
    <link rel="stylesheet" href="css/lity-min.css">
    <link rel="stylesheet" href="css/theme.css">

    <!--====== MAIN STYLESHEET ======-->
    <link rel="stylesheet" href="css/login.css">

    <link href="style.css" rel="stylesheet">
    <script src="js/vendor/modernizr.js"></script>

</head>

<body id="top" style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(images/bg3.jpg);width: 100%;min-height: 100vh;background-position: center;background-size: cover;display: flex;justify-content: center;align-items: center;">

    <section>
        <div class="container">
            <form action="" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                <div class="alert alert-<?php echo $cls;?>" style="color:black;">
                    <?php 
                        if (isset($_POST['submit'])){
                            echo $error;
                        }
                    ?>
                </div>
                <div class="input-group"  style="color:black;">
                    <input type="text" placeholder="adminname" name="adminname" value="" required>
                </div>
                <div class="input-group"  style="color:black;">
                    <input type="password" placeholder="Password" name="password" value="" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn primary__button">Login</button>
                </div>
                <p class="login-register-text">Don't have an account? <a href="admin_register.php">Register Here</a>.</p>
            </form>
        </div>

    </section>

    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="plugins/bootstrap/js/popper.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/counterup/jquery.easing.js"></script>


</body>

</html>