<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header("Location: user_login.php");
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
		<div class="pd-ltr-20 height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="product-wrap" style="margin-bottom:30px;">
					<div class="product-list">
						<ul class="row">
						<?php
							$sql = "SELECT * FROM fosters WHERE `status` ='1'";
							$result = mysqli_query($conn, $sql);
							if($result){
							while($row=mysqli_fetch_assoc($result)){
												
								$name=$row['firstname'] ." ". $row['lastname'];
								$image=$row['image'];
								$foster_id=$row['foster_id'];
								$fee=$row['fee'];
								$city=$row['city'];
						?>
							<li class="col-lg-4 col-md-6 col-sm-12">
								<div class="product-box">
									<div class="producct-img"><img src="images/fosters/<?php echo $image?>" alt=""></div>
									<div class="product-caption">
										<h4 style="font-size:25px;"><a href="user_foster_profile.php?id=<?php echo $foster_id?>"><?php echo $name?></a> <br> <span style="font-size:20px;"><?php echo $city?></span></h4>
										<div class="price">
											Hiring fee: <ins>Tk. <?php echo $fee?></ins>
										</div>
									</div>
								</div>
							</li>
							<?php
									}
								}
							?>
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