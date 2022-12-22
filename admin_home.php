<?php
include_once("./database/config.php");

session_start();

$adminname = $_SESSION['adminname'];

if (!isset($_SESSION['adminname'])) {
    header("Location: admin_login.php");
}

$sql = "SELECT * FROM `admin` WHERE adminname='$adminname'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$img=$row['image'];
$admin_id=$row['admin_id'];

$_SESSION['image'] = $img;
$_SESSION['admin_id'] = $row['admin_id'];
$_SESSION['adminname'] = $row['adminname'];
$zip = $row['zip'];

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
	<?php include_once("./templates/admin_header.php");?>
	<!-- Navigation  -->

	<!--main section-->
	<div class="main-container">
		<div class="pd-ltr-20 height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="blog-wrap">
					<div class="container pd-0">
						<div class="row">
							<div class="col-md-3">
								<div class="card-box mb-30" style="text-align:center;">
									<h5 class="pd-20 h5 mb-0">Users</h5>
									<?php
										$sql = "SELECT * from users";
										$result = mysqli_query($conn, $sql);
										$row_cnt = $result->num_rows;
									?>
									<h1 style="padding-bottom:25px;"><?php echo $row_cnt?></h1>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card-box mb-30" style="text-align:center;">
									<h5 class="pd-20 h5 mb-0">Vets</h5>
									<?php
										$sql = "SELECT * from vets";
										$result = mysqli_query($conn, $sql);
										$row_cnt = $result->num_rows;
									?>
									<h1 style="padding-bottom:25px;"><?php echo $row_cnt?></h1>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card-box mb-30" style="text-align:center;">
									<h5 class="pd-20 h5 mb-0">Fosters</h5>
									<?php
										$sql = "SELECT * from fosters";
										$result = mysqli_query($conn, $sql);
										$row_cnt = $result->num_rows;
									?>
									<h1 style="padding-bottom:25px;"><?php echo $row_cnt?></h1>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card-box mb-30" style="text-align:center;">
									<h5 class="pd-20 h5 mb-0">Appointments</h5>
									<?php
										$sql = "SELECT * from vet_appointment";
										$result = mysqli_query($conn, $sql);
										$row_cnt = $result->num_rows;
									?>
									<h1 style="padding-bottom:25px;"><?php echo $row_cnt?></h1>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="card-box mb-30">
									<h5 class="pd-20 h5 mb-0">Vets</h5>
									<table class="table">
										<thead>
											<th>ID</th>
											<th>Name</th>
											<th>Licence No.</th>
											<th>Education</th>
											<th>Status</th>
										</thead>
										<tbody>
											<?php 
												$sql = "SELECT * FROM vets ORDER BY vet_id DESC LIMIT 10;";
												$result = mysqli_query($conn, $sql);
												if($result){
													while($row=mysqli_fetch_assoc($result)){
																		
													$name=$row['firstname']."  ".$row['lastname'];
													$education=$row['education1'].", ".$row['education2'];
													$reg_id=$row['reg_id'];
													$vet_id=$row['vet_id'];
													$status=$row['status'];

													
													if($status == 1){
														$type = "success";
														$msg = "Verified";
													}else{
														$type = "danger";
														$msg = "Unverified";
													}
											?>

											<tr>
												<td style="font-size:14px; font-weight:600;"><?php echo $vet_id ?></td>
												<td style="font-size:14px; font-weight:600;"><?php echo $name ?></td>
												<td style="font-size:14px; font-weight:600;"><?php echo $reg_id ?></td>
												<td style="font-size:14px; font-weight:600;"><?php echo $education ?>
												</td>
												<td style="font-size:14px; font-weight:600;"><button
														style="border-radius: 40px; padding:5px 14px; font-size:10px; font-weight:600"
														class="btn btn-<?php echo $type?>"><?php echo $msg?></button>
												</td>
											</tr>
											<?php 
													}
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card-box mb-30">
									<h5 class="pd-20 h5 mb-0">Recent Users</h5>
									<table class="table">
										<tbody>
											<?php 
												$sql = "SELECT DISTINCT `name`, `role`, `image` FROM recent ORDER BY sl DESC LIMIT 8;";
												$result = mysqli_query($conn, $sql);
												if($result){
												while($row=mysqli_fetch_assoc($result)){
																	
													$name=$row['name'];
													$image=$row['image'];
													$role=$row['role'];

													if($role=="Admin"){
													$path= "images/admin";
													}
													elseif ($role=="Foster"){
													$path= "images/fosters";
													}
													
													elseif ($role=="Vet"){
													$path= "images/vets";
													}
													else{
													$path= "images/users";
													}
													echo '<tr>
													<td style="font-size:14px; font-weight:600;"> <img src="./'.$path.'/'.$image.'" style="width:40px;border-radius: 20%;" alt="profile"> <span style="padding-left:20px;;">'.$name.'</span></td>
													<td style="font-size:14px; font-weight:600; color:#bbb;">'.$role.'</td>
													</tr>';
												}
												}
											?>
										</tbody>
									</table>
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