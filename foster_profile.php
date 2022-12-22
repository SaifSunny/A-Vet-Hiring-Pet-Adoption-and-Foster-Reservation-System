<?php
include_once("./database/config.php");

session_start();
$fostername = $_SESSION['fostername'];

if (!isset($_SESSION['fostername'])) {
    header("Location: foster_login.php");
}

$sql = "SELECT * FROM fosters WHERE fostername='$fostername'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$image = $row['image'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$gender=$row['gender'];
$birthday=$row['birthday'];
$blood_group=$row['blood_group'];
$contact=$row['contact'];
$address=$row['address'];
$city=$row['city'];
$zip=$row['zip'];
$nid=$row['nid'];
$email=$row['email'];
$fee=$row['fee'];

if (isset($_POST['submit_img'])) {

    $error = "";
    $cls="";
 
    $name = $_FILES['file']['name'];
    $target_dir = "images/fosters/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){

        // Upload file
        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){

            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents('images/fosters/'.$name));
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

            // Update Record
            $query2 = "UPDATE fosters SET `image`='$name' WHERE fostername='$fostername'";
            $query_run2 = mysqli_query($conn, $query2);

            $query3 = "UPDATE `recent` SET `image`='$name' WHERE `name`='$fostername'";
            $query_run3 = mysqli_query($conn, $query3);

            if ($query_run2 && $query_run3) {
                echo "<script> alert('Profile Image Successfully Updated.');
                window.location.href='foster_home.php';</script>";
            } 
            else {
                $cls="danger";
                $error = "Cannot Update Profile Image";
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

if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender=$_POST['gender'];
    $birthday=$_POST['birthday'];
    $blood_group=$_POST['blood_group'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];
    $nid=$_POST['nid'];
    $email=$_POST['email'];
    $fee=$_POST['fee'];

    $error = "";
    $cls="";

        // Update Record
        $query2 = "UPDATE fosters SET firstname='$firstname',lastname='$lastname',nid='$nid',email='$email',
        birthday='$birthday', blood_group='$blood_group', gender='$gender', contact='$contact',fee='$fee',
        `address`='$address', city='$city', zip='$zip' WHERE fostername='$fostername'";
        $query_run2 = mysqli_query($conn, $query2);
        
        if ($query_run2) {
            $cls="success";
            $error = "Profile Successfully Updated.";
        } 
        else {
            $cls="danger";
            $error = "Cannot Update Profile";
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
	<?php include_once("./templates/foster_header.php");?>
	<!-- Navigation  -->

	<!--main section-->
	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="row">
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Personal Information</h2>

						<form action="" method="POST" style="margin:30px; margin-top:0;">
							<div class="row">
								<div class="col-md-12">
									<div class="alert alert-<?php echo $cls;?>">
										<?php 
											if (isset($_POST['submit']) || isset($_POST['submit_img'])){
												echo $error;
										}?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" style="padding:10px">
										<label style="padding-bottom:10px;">First Name</label>
										<input type="text" class="form-control" name="firstname" id="firstname"
											value="<?php echo $firstname?>" placeholder="First Name" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" style="padding:10px">
										<label style="padding-bottom:10px;">Last Name</label>
										<input type="text" class="form-control" name="lastname" id="lastname"
											value="<?php echo $lastname?>" placeholder="Last Name" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group" style="padding:10px">
										<label style="padding-bottom:10px;">Date of Birth</label>
										<input type="date" class="form-control" name="birthday" id="birthday"
											value="<?php echo $birthday?>" placeholder="Birthday" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" style="padding:10px">
										<label style="padding-bottom:10px;">NID No.</label>
										<input type="text" class="form-control" name="nid" id="nid"
											value="<?php echo $contact?>" placeholder="NID" required>

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group" style="padding:10px">
										<label style="padding-bottom:10px;">Gender</label>
										<input type="text" class="form-control" name="gender" id="gender"
											value="<?php echo $gender?>" placeholder="Gender" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" style="padding:10px">
										<label style="padding-bottom:10px;">Blood Group</label>
										<input type="text" class="form-control" name="blood_group" id="blood_group"
											value="<?php echo $blood_group?>" placeholder="Blood Group" required>

									</div>
								</div>
							</div>
							<div class="row">
							<div class="col-md-6">
									<div class="form-group" style="padding:10px">
										<label style="padding-bottom:10px;">Contact</label>
										<input type="text" class="form-control" name="contact" id="contact"
											value="<?php echo $contact?>" placeholder="Contact" required>

									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" style="padding:10px">
										<label style="padding-bottom:10px;">Email</label>
										<input type="text" class="form-control" name="email" id="email"
											value="<?php echo $email?>" placeholder="Email" required>

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group" style="padding:10px">
										<label style="padding-bottom:10px;">Address</label>
										<input type="text" class="form-control" name="address" id="address"
											value="<?php echo $address?>" placeholder="Address" required>

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group" style="padding:10px">
										<label style="padding-bottom:10px;">City</label>
										<input type="text" class="form-control" name="city" id="city"
											value="<?php echo $city?>" placeholder="City" required>

									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" style="padding:10px">
										<label style="padding-bottom:10px;">Zip</label>
										<input type="text" class="form-control" name="zip" id="zip"
											value="<?php echo $zip?>" placeholder="Zip" required>

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group" style="padding:10px">
										<label style="padding-bottom:10px;">Fee</label>
										<input type="text" class="form-control" name="fee" id="fee"
											value="<?php echo $fee?>" placeholder="Fee" required>

									</div>
								</div>
							</div>
							<div class="info__foter">
								<div class="d-flex justify-content-end" style="padding-top:10px;">
									<button type="submit" name="submit" class="btn btn-success"
										style="margin-right:10px;"><i class="fa fa-edit"></i> Update</button>
								</div>
							</div>

						</form>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height pd-20" >
						<h2 class="h4 mb-20">Profile Image</h2>
						<form action="" method="POST" enctype='multipart/form-data'>
							<div class="row ">
								<div class="col-md-12" style="padding-top:30px;">
									<div class="d-flex justify-content-center" style="width: 200px; height: 200px;">
										<img src="./images/fosters/<?php echo $image;?>" width="100%" height="100%"
											style="text-align:center; margin-left:120px;">
									</div>
									<div class="col-md-12" style="padding-top:20px;">
										<div class="d-flex justify-content-center" style="padding-top:10px;">
											<label for="file" class="form-label">Profile Image</label>

										</div>
										<div class="d-flex justify-content-center" style="padding-top:10px;padding-left:30px;">
											<input type="file" name="file" id="file" >
										</div>
										<div class="d-flex justify-content-center"
											style="padding-top:20px; text-align:center;">
											<button type="submit" name="submit_img" class="btn btn-success"
												style="margin-top:10px;margin-bottom:40px;"><i class="fa fa-edit"></i> Update
												Image</button>
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