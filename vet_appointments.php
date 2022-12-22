<?php
include_once("./database/config.php");

session_start();
$vetname = $_SESSION['vetname'];

if (!isset($_SESSION['vetname'])) {
    header("Location: vet_login.php");
}

$sql = "SELECT * FROM vets WHERE vetname='$vetname'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$image = $row['image'];
$vet_id=$row['vet_id'];



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
	<?php include_once("./templates/vet_header.php");?>
	<!-- Navigation  -->

	<!--main section-->
	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="row">
				<div class="col-xl-12 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">My Appointments</h2>
						<table class="table" style="font-size: 14px;">
							<thead>
								<th>Image</th>
								<th>User Name</th>
								<th>Pet's Name</th>
								<th>Meeting Time</th>
								<th>Contact</th>
								<th>Email</th>
								<th>Address</th>
								<th>Action</th>
							</thead>

							<tbody>
								<?php 
									$sql = "SELECT * FROM vet_appointment WHERE `vet_id`=$vet_id AND status='0'";
									$result = mysqli_query($conn, $sql);
									if($result){
										while($row=mysqli_fetch_assoc($result)){

										$user_id=$row['user_id'];
										$user_image=$row['user_image'];
										$user_name=$row['user_name'];
										$pet_name=$row['pet_name'];
										$date=$row['date'];
										$time=$row['time'];
										$contact=$row['contact'];
										$email=$row['email'];
										$appointment_id=$row['appointment_id'];

										if($user_id<10000){
											$sql1 = "SELECT * FROM `users` WHERE user_id='$user_id'";
											$result1 = mysqli_query($conn, $sql1);
											$row1=mysqli_fetch_assoc($result1);
											$image1 =$row1['image'];
											$path="images/users";
											$address=$row1['address'] ." ".$row1['city']."-". $row1['zip'];
										}else{
											$sql2 = "SELECT * FROM `fosters` WHERE foster_id='$user_id'";
											$result2 = mysqli_query($conn, $sql2);
											$row2=mysqli_fetch_assoc($result2);
											$image1 =$row2['image'];
											$path="images/fosters";
											$address=$row2['address'] ." ".$row2['city']."-". $row2['zip'];
										}

									
								?>
								<tr>
									<td><img src="<?php echo $path."/".$image1 ?>"
											style="width:60px;border-radius: 20%;" alt="profile"> <span
											style="padding-left:20px;"></span></td>
									<td><?php echo $user_name ?></td>
									<td><?php echo $pet_name ?></td>
									<td><?php $part = explode('-', $date); echo $part[2]."-".$part[1]."-".$part[0]." ".$time ?>
									</td>
									<td><?php echo $contact ?></td>
									<td><?php echo $email ?></td>
									<td><?php echo $address ?></td>
									<td><a href="vet_delete_appointment.php?id=<?php echo $appointment_id ?>" class="btn btn-danger" style="padding:8px;"><i class="fa fa-trash"></i></a>
									<td><a href="vet_complete_appointment.php?id=<?php echo $appointment_id ?>" class="btn btn-success" style="padding:8px;"><i class="fa fa-check"></i></a>
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