<?php
include_once("./database/config.php");

session_start();
$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header("Location: user_login.php");
}

$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$image = $row['image'];
$user_id=$row['user_id'];



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
		<div class="pd-ltr-20">
			<div class="row">
				<div class="col-xl-12 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Vet Appointments</h2>
						<table class="table" style="font-size: 14px;">
							<thead>
								<th>Image</th>
								<th>Vet Name</th>
								<th>Pet's Name</th>
								<th>Meeting Time</th>
								<th>Contact</th>
								<th>Email</th>
								<th>Address</th>
								<th>Action</th>
							</thead>

							<tbody>
								<?php 
									$sql = "SELECT * FROM vet_appointment WHERE `user_id`=$user_id";
									$result = mysqli_query($conn, $sql);
									if($result){
										while($row=mysqli_fetch_assoc($result)){

										$vet_id=$row['vet_id'];
										$vet_image=$row['vet_image'];
										$vet_name=$row['vet_name'];
										$pet_name=$row['pet_name'];
										$date=$row['date'];
										$time=$row['time'];
										$contact=$row['contact'];
										$email=$row['email'];
										$appointment_id=$row['appointment_id'];


										$sql1 = "SELECT * FROM `vets` WHERE vet_id='$vet_id'";
										$result1 = mysqli_query($conn, $sql1);
										$row1=mysqli_fetch_assoc($result1);

										$address=$row1['clinic_address'] ." ".$row1['clinic_city']."-". $row1['clinic_zip'];
								?>
								<tr>
									<td><img src="./images/vets/<?php echo $vet_image ?>"
											style="width:60px;border-radius: 20%;" alt="profile"> <span
											style="padding-left:20px;"></span></td>
									<td><?php echo $vet_name ?></td>
									<td><?php echo $pet_name ?></td>
									<td><?php $part = explode('-', $date); echo $part[2]."-".$part[1]."-".$part[0]." ".$time ?>
									</td>
									<td><?php echo $contact ?></td>
									<td><?php echo $email ?></td>
									<td><?php echo $address ?></td>
									<td><a href="user_delete_vet_appointment.php?id=<?php echo $appointment_id ?>" class="btn btn-danger" style="padding:8px;"><i class="fa fa-trash"></i></a>
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