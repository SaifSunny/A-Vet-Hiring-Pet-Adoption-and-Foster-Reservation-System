<?php
include_once("./database/config.php");

session_start();
date_default_timezone_set('Asia/Dhaka');

$fostername = $_SESSION['fostername'];
$img = $_SESSION['image'];

if (!isset($_SESSION['fostername'])) {
    header("Location: foster_login.php");
}

$commenter_name = $_GET['commenter_name'];
$role = $_GET['role'];

$address="";
$education1="";
$education2="";

if($role==0){
	$sql = "SELECT * FROM users WHERE username='$commenter_name'";
	$result = mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);
	$path="images/users";
	$display="none";

}
if($role==1){
	$sql = "SELECT * FROM fosters WHERE fostername='$commenter_name'";
	$result = mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);
	$path="images/fosters";
	$display="none";


}
if($role==2){
	$sql = "SELECT * FROM vets WHERE vetname='$commenter_name'";
	$result = mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);

	$address=$row['clinic_address']." ".$row['clinic_city']."-".$row['clinic_zip'];
	$education1=$row['education1'];
	$education2=$row['education2'];
	$path="images/vets";
	$display="";



}


$image=$row['image'];
$name=$row['firstname']." ".$row['lastname'];
$contact=$row['contact'];
$email=$row['email'];

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
	<?php include_once("./templates/foster_header.php");?>
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
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="product-slider">
									<div class="product-slide">
										<img src="<?php echo $path."/".$image?>" alt="">
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="col-md-12">
									<div class="product-detail-desc card-box" style="padding:30px;">
										<h4 class="mb-20 pt-20" style="color:#222"><?php echo $name?> <br> <small
												style="font-size:16px;"><?php echo $education1." ".$education2?></small>
										</h4>
										<hr>

										<p style="color:#222;">Contact: <?php echo $contact?></p>
										<p style="color:#222;">Email: <?php echo $email?></p>
										
										<p style="color:#222; display:<?php echo $display?>;">Clinic Address: <?php echo $address?></p>
										<div class="price" style="font-size:25px;">
										<i class="fa-brands fa-facebook" style="margin-right:10px;"></i>
											<i class="fa-brands fa-twitter" style="margin-right:10px;"></i>
											<i class="fa-brands fa-instagram"></i>
										</div>
									</div>
								</div>

							</div>
						</div>
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