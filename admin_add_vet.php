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

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $reg_id = $_POST['reg_id'];
    $birthday = $_POST['birthday'];
    $vetname = $_POST['vetname'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $education1 = $_POST['education1'];
    $education2 = $_POST['education2'];
    $year1 = $_POST['year1'];
    $year2 = $_POST['year2'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];

    $date = date("Y-m-d");

    $p = $_POST['password'];
    $error = "";
    $cls="";
 
    $name = $_FILES['file']['name'];
    $target_dir = "images/vets/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    if (strlen($p) > 5) {
    
        $query = "SELECT * FROM vets WHERE vetname = '$vetname'";
        $query_run = mysqli_query($conn, $query);
        if (!$query_run->num_rows > 0) {

            $query = "SELECT * FROM vets WHERE reg_id = '$reg_id' AND email = '$email'";
            $query_run = mysqli_query($conn, $query);
            if(!$query_run->num_rows > 0){

                // Check extension
                if( in_array($imageFileType,$extensions_arr) ){

                    // Upload file
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){

                        // Convert to base64 
                        $image_base64 = base64_encode(file_get_contents('images/vets/'.$name));
                        $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

                        // Insert record

                        $query2 = "INSERT INTO vets(firstname,lastname,reg_id,education1,education2,year1,year2,gender,contact,clinic_address,clinic_city,clinic_zip, vetname,email,`password`, join_date, `image`,  `status`)
                        VALUES ('$firstname','$lastname','$reg_id','$education1','$education2','$year1','$year2','$gender','$contact','$address','$city','$zip','$vetname', '$email', '$password', '$date', '$name', '1')";
                        $query_run2 = mysqli_query($conn, $query2);
            
                        if ($query_run2) {
                            $cls="success";
                            $error = "Vet Successfully Added.";
                        } 
                        else {
                            $cls="danger";
                            $error = mysqli_error($conn);
                        }

                    }else{
                        $cls="danger";
                        $error = 'Unknown Error Occurred.';
                    }
                }else{
                    $cls="danger";
                    $error = 'Invalid File Type';
                }
            }
            else{
                $cls="danger";
                $error = "Vet Already Exists";
            }
            
        }else{
            $cls="danger";
            $error = "vetname Already Exists";
        }
    }else{
        $cls="danger";
        $error = 'Password has to be minimum of 6 charecters.';
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
	<?php include_once("./templates/admin_header.php");?>
	<!-- Navigation  -->

	<!--main section-->
	<div class="main-container">
		<div class="pd-ltr-20 height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="blog-wrap">
					<div class="container pd-0">
						<form action="" method="POST" enctype='multipart/form-data'>
							<div class="row" style="padding-top:30px;color:#222;">
								<div class="col-md-4">
									<div class="card mx-auto"
										style="text-align:center;padding-top:50px;padding-bottom:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
										<h4 class="card-title" style="padding-bottom:20px;color:#222;">Profile Image</h4>
										<div class="card-body">
											<div class="row">
											<div class="col-md-12">
													<div class="col-md-12" style="width: 250px; height: 250px;">
														<img src="./images/vets/vet.png" width="100%"
															height="100%" style="text-align:center; margin-left:30px;">
													</div>
													<div class="col-md-12" style="padding-top:20px;">
														<label for="file" class="form-label">Profile Image</label>
														<div class="d-flex justify-content-center"
															style="padding-top:10px; padding-left:40px;">
															<input type="file" name="file" id="file">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-8">

									<div class="card mx-auto"
										style="text-align:center;padding:50px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
										<h4 class="card-title" style="color:#222;">Add Vet</h4>
										<div class="card-body" style="padding:0 60px;">

											<div class="alert alert-<?php echo $cls;?>">
												<?php 
													if (isset($_POST['submit'])){
														echo $error;
													}
												?>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label style="padding-bottom:10px;">First Name</label>
														<input type="text" class="form-control" name="firstname"
															id="firstname" placeholder="First Name">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label style="padding-bottom:10px;">Last Name</label>
														<input type="text" class="form-control" name="lastname"
															id="lastname" placeholder="Last Name">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group" style="padding:10px">
														<label style="padding-bottom:10px;">Licence NO.</label>
														<input type="text" class="form-control" name="reg_id"
															id="reg_id" placeholder="Licence No.">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label style="padding-bottom:10px;">Graduation</label>
														<input type="text" class="form-control" name="education1"
															id="education1" placeholder="Graduation">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label style="padding-bottom:10px;">Year</label>
														<input type="month" class="form-control" name="year1" id="year1"
															placeholder="Graduation Year">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label style="padding-bottom:10px;">Post Graduation</label>
														<input type="text" class="form-control" name="education2"
															id="education2" placeholder="Post Graduation">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label style="padding-bottom:10px;">Year</label>
														<input type="month" class="form-control" name="year2" id="year2"
															placeholder="Post Graduation Year">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label style="padding-bottom:10px;">Gender</label>
														<select class="form-control" name="gender" id="gender"
															placeholder="Gender" required>
															<option>-- Select Gender --</option>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label style="padding-bottom:10px;">Birthday</label>
														<input type="date" class="form-control" name="birthday"
															id="birthday" placeholder="Birthday">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label style="padding-bottom:10px;">Contact</label>
														<input type="text" class="form-control" name="contact"
															id="contact" placeholder="Contact">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label style="padding-bottom:10px;">Email</label>
														<input type="text" class="form-control" name="email" id="email"
															placeholder="Email">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label style="padding-bottom:10px;">Username</label>
														<input type="text" class="form-control" name="vetname"
															id="vetname" placeholder="Username">
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label style="padding-bottom:10px;">Password</label>
														<input type="text" class="form-control" name="password"
															id="password" placeholder="Password">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-12">
													<div class="form-group" style="padding:10px">
														<label style="padding-bottom:10px;">Clinic Address</label>
														<input type="text" class="form-control" name="address"
															id="address" placeholder="Address">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label style="padding-bottom:10px;">Clinic City</label>
														<input type="text" class="form-control" name="city" id="city"
															placeholder="City">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label style="padding-bottom:10px;">Clinic Zip</label>
														<input type="text" class="form-control" name="zip" id="zip"
															placeholder="Zip">
													</div>
												</div>
											</div>


											<div class="d-flex justify-content-end" style="padding-top:20px;">
												<button type="submit" name="submit" class="btn btn-success"
													style="margin-right:10px;"><i
														class="fas fa-plus-square"></i>&nbsp;&nbsp;Add
													Vet</button>
												<a href="admin_vets.php" class="btn btn-primary">Go Back</a>
											</div>


										</div>
									</div>
								</div>


							</div>

						</form>
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