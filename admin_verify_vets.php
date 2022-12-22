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
							<div class="col-md-12">
								<div class="card-box mb-30" style="padding:20px;">
									<div class="d-flex justify-content-between">
										<div>
											<h5 class="pd-20 h5 mb-0">Manage Vets</h5>
										</div>
									</div>
									<table class="table" style="font-size: 14px;text-align:center;">
										<thead>
											<th>Image</th>
											<th>Name</th>
											<th>Licence No.</th>
											<th>Education</th>
											<th>Gender</th>
											<th>Contact</th>
											<th>Email</th>
											<th>Action</th>
										</thead>

										<tbody>
											<?php 
												$sql = "SELECT * FROM vets WHERE `status`='0'";
												$result = mysqli_query($conn, $sql);
												if($result){
													while($row=mysqli_fetch_assoc($result)){
													$name=$row['firstname'] ." ". $row['lastname'];
													$reg_id=$row['reg_id'];
													$education=$row['education1']."/ ".$row['education2'];
													$gender=$row['gender'];
													$contact=$row['contact'];
													$email=$row['email'];
													$status=$row['status'];
													$image=$row['image'];
													$id=$row['vet_id'];
											?>
											<tr>
												<td><img src="./images/vets/<?php echo $image ?>"
														style="width:60px;border-radius: 20%;" alt="profile"> <span
														style="padding-left:20px;"></span></td>
												<td><?php echo $name ?></td>
												<td><?php echo $reg_id ?></td>
												<td><?php echo $education ?></td>
												<td><?php echo $gender ?></td>
												<td><?php echo $contact ?></td>
												<td><?php echo $email ?></td>
												<td><a href="admin_vet_verification.php?id=<?php echo $id?>"
														class="btn btn-success"
														style="padding:8px;"><i
															class="fa fa-check"></i></a>
													<a href="admin_delete_vet.php?id=<?php echo $id?>"
														class="btn btn-danger" style="padding:8px;"><i
															class="fa fa-trash"></i></a>
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