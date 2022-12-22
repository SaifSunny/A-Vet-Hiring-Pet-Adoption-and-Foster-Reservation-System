<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$user_img=$row['image'];
$user_id=$row['user_id'];


if (!isset($_SESSION['username'])) {
    header("Location: user_login.php");
}

$foster_id=$_GET['id'];

$sql = "SELECT * FROM fosters WHERE foster_id='$foster_id'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$name=$row['firstname'] ." ". $row['lastname'];
$image=$row['image'];
$gender=$row['gender'];
$contact=$row['contact'];
$email=$row['email'];
$address=$row['address'];
$city=$row['city'];
$zip=$row['zip'];
$fee=$row['fee'];
$about=$row['about'];

if(isset($_POST['submit'])){

    $time = $_POST['time'];
    $date = $_POST['date'];
    $pname = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $message = $_POST['message'];
  
    $query = "SELECT * FROM foster_appointment WHERE user_id = '$user_id' AND foster_id = '$foster_id' AND `date` = '$date' AND `time` = '$time'";
    $query_run = mysqli_query($conn, $query);
    if(!$query_run->num_rows > 0){

        $query = "SELECT * FROM foster_appointment WHERE foster_id = '$foster_id' AND `date` = '$date' AND `time` = '$time'";
        $query_run = mysqli_query($conn, $query);
        if(!$query_run->num_rows > 0){
            $query2 = "INSERT INTO foster_appointment(`user_id`, foster_id, user_image, foster_image, `user_name`, foster_name, pet_name, `date`, `time`, contact, email, `message`)
            VALUES ('$user_id', '$foster_id', '$user_img', (SELECT `image` FROM fosters WHERE foster_id='$foster_id'), '$username', (SELECT CONCAT(firstname,' ',lastname) FROM fosters WHERE foster_id='$foster_id'), '$pname', '$date', '$time', '$contact','$email', '$message')";
            $query_run2 = mysqli_query($conn, $query2);
                    
            if ($query_run2) {
              $cls="success";
              $error = "Appointment Successfully Placed.";
            } 
            else {
              $cls="danger";
              $error = mysqli_error($conn);
            }
        }
        else{
            $cls="danger";
            $error ="Schedule Not Free. Select Another time.";
        }
    }else{
        $cls="danger";
        $error ="Appointment Already Placed.";
    }
  
  
}

?>

<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>PawCenter</title>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
		rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
		integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

	<!-- Navigation  -->
	<?php include_once("./templates/user_header.php");?>
	<!-- Navigation  -->

	<!--main section-->
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="product-wrap">
					<div class="product-detail-wrap mb-30">
						<div class="row">
							<div class="col-lg-12"></div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="product-slider">
									<div class="product-slide">
										<img src="images/fosters/<?php echo $image?>" alt="">
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="col-md-12">
									<div class="product-detail-desc card-box" style="padding:30px;">
										<h4 class="mb-20 pt-20" style="color:#222"><?php echo $name?> <br> <small
												style="font-size:16px;"><?php echo $address." ".$city."-".$zip?></small>
										</h4>
										<hr>

										<p style="color:#222;"><?php echo $about ?></p>
										<div class="price">
											Hiring Fee: <ins>Tk. <?php echo $fee?></ins>
										</div>
									</div>
								</div>


								<div class="col-md-12" style="margin-top:30px;">
									<div class="product-detail-desc pd-20 card-box height-100-p" style="padding:30px;">
										<h5 class="mb-4" style="font-weight:700;color:#222;">Make Appoinment</h5>
										<ul class="list-unstyled lh-35"
											style="color:#222;font-weight:600;padding: 0px 20px; ">
											<li class="d-flex justify-content-between align-items-center">
												<a href="#">Monday - Friday</a>
												<span>9:00 AM - 8:00 PM</span>
											</li>
											<li class="d-flex justify-content-between align-items-center">
												<a href="#">Saturday</a>
												<span>9:00 AM - 8:00 PM</span>
											</li>
											<li class="d-flex justify-content-between align-items-center">
												<a href="#">Sunday</a>
												<span>Holiday</span>
											</li>
										</ul>
										<div class="sidebar-contatct-info mt-4">
											<p class="mb-0">Need Urgent Help?</p>
											<h3 class="text-color-2"><?php echo $contact?></h3>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

					<h4 class="mb-20" style="color:#222;">Book an Appointment</h4>
					<div class="product-list">
						<ul class="row">
							<div class="col-md-12" style="margin-bottom:70px;">
								<div class="product-detail-desc card-box" style="padding:30px;">
									<form action="" method="post" role="form" style="padding: 0 40px; color:#222;">
										<div class="row">
											<div class="col-md-12">
											<div class="alert alert-<?php echo $cls;?>">
												<?php 
													if (isset($_POST['submit'])){
														echo $error;
													}
												?>
											</div>
											</div>
											<div class="col-md-12 form-group">
												<label for="name" style="padding-bottom:10px;">Pet Name</label>
												<input type="text" name="name" class="form-control" id="name"
													placeholder="Pet Name" data-rule="minlen:4"
													data-msg="Please enter at least 4 chars">
											</div>
										</div>
										<div class="row">

											<div class="col-md-6 form-group mt-3">
												<label for="email" style="padding-bottom:10px;">Email</label>

												<input type="email" class="form-control" name="email" id="email"
													placeholder="Email" data-rule="email"
													data-msg="Please enter a valid email">
											</div>
											<div class="col-md-6 form-group mt-3">
												<label for="contact" style="padding-bottom:10px;">Contact</label>

												<input type="tel" class="form-control" name="contact" id="contact"
													placeholder="Your Contact" data-rule="minlen:11"
													data-msg="Please enter a valid Contact Number">
											</div>
											<div class="col-md-6 form-group mt-3">
												<label for="contact" style="padding-bottom:10px;">Appointment
													Date</label>
												<input type="date" name="date" class="form-control" id="date"
													placeholder="Appointment Date">
											</div>
											<div class="col-md-6 form-group mt-3">
												<label for="contact" style="padding-bottom:10px;">Appointment
													Time</label>
												<input type="time" name="time" class="form-control" id="time"
													placeholder="Appointment Time">
											</div>
										</div>

										<div class="form-group mt-3">
											<label for="contact" style="padding-bottom:10px;">Message</label>
											<textarea class="form-control" name="message" rows="5"
												placeholder="Message (Optional)"></textarea>
										</div>
										<div class="row d-flex">
											<div class="col-md-12 justify-content-center" style="margin: 20px 0">
												<button type="submit" name="submit" class="btn btn-success">Schedule Appointment</button>
											</div>
										</div>
									</form>


								</div>
							</div>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard.js"></script>
</body>

</html>