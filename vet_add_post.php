<?php
include_once("./database/config.php");
date_default_timezone_set("Asia/Dhaka");
session_start();
$vetname = $_SESSION['vetname'];
$vet_id = $_SESSION['vet_id'];

if (!isset($_SESSION['vetname'])) {
    header("Location: vet_login.php");
}


if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $category = $_POST['category'];
    $details = $_POST['details'];
    $age = $_POST['age'];
    $disabilities = $_POST['disabilities'];
    $trained = $_POST['trained'];
    $vaccinated = $_POST['vaccinated'];

    $date = date("Y-m-d h:i:s");

    $error = "";
    $cls="";
 
    $name = $_FILES['file']['name'];
    $target_dir = "images/posts/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");


            $query = "SELECT * FROM posts WHERE post_title = '$title' AND post_details = '$details'";
            $query_run = mysqli_query($conn, $query);
            if(!$query_run->num_rows > 0){

                // Check extension
                if( in_array($imageFileType,$extensions_arr) ){

                    // Upload file
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){

                        // Convert to base64 
                        $image_base64 = base64_encode(file_get_contents('images/posts/'.$name));
                        $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

                        // Insert record

                        $query2 = "INSERT INTO posts(post_user_name, `post_title`, post_date, post_category, post_img, post_details, pet_age, disabilities, is_trained, `vaccinated`,user_id)
                        VALUES ('$vetname', '$title', '$date', '$category', '$name', '$details', '$age', '$disabilities', '$trained', '$vaccinated', '$vet_id')";
                        $query_run2 = mysqli_query($conn, $query2);
            
                        if ($query_run2) {
                            $cls="success";
                            $error = "Post Successfully Added.";
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
                $error = "Post Already Exists";
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
	<?php include_once("./templates/vet_header.php");?>
	<!-- Navigation  -->

	<!--main section-->
	<div class="main-container">
		<div class="pd-ltr-20 height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="blog-wrap">
					<div class="container pd-0">
						<form action="" method="POST" enctype='multipart/form-data'>
							<div class="row" style="padding-top:30px;color:#222;">
								<div class="col-md-8">
									<div class="card mx-auto"
										style="text-align:center;padding:50px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); color:#222;">
										<h4 class="card-title" style="color:#222;">Add Post</h4>
										<div class="card-body" style="padding:0 60px;">

											<div class="alert alert-<?php echo $cls;?>">
												<?php 
													if (isset($_POST['submit'])){
														echo $error;
													}
												?>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group" style="padding:10px">
														<label>Post Image</label>
														<input type="file" name="file" id="file" class="form-control">
													</div>

												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label>Post Title</label>
														<input type="text" class="form-control" name="title" id="title"
															placeholder="Post Title" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label>Category</label>
														<select class="form-control" name="category" id="category"
															placeholder="Category" required>
															<option>-- Select Category --</option>
															<option value="Adoption">Adoption</option>
															<option value="Foster">Foster</option>
															<option value="Petcare">Pet Care</option>
															<option value="Pethealth">Pet Health</option>
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group" style="padding:10px">
														<label>Post Details</label>
														<textarea name="details" id="details" class="form-control"
															placeholder="Post Details.." required></textarea>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label>Pet Age</label>
														<input type="text" class="form-control" name="age" id="age"
															placeholder="Pet Age (optional)">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label>Disabilities</label>
														<select class="form-control" name="disabilities"
															id="disabilities">
															<option value="">-- Select Option(Optional) --</option>
															<option value="Yes">Yes</option>
															<option value="No">No</option>
														</select>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label>Is Trained</label>
														<select class="form-control" name="trained" id="trained">
															<option value="">-- Select Option(Optional) --</option>
															<option value="Yes">Yes</option>
															<option value="No">No</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group" style="padding:10px">
														<label>Vaccinated</label>
														<select class="form-control" name="vaccinated" id="vaccinated">
															<option value="">-- Select Option(Optional) --</option>
															<option value="Yes">Yes</option>
															<option value="No">No</option>
														</select>
													</div>
												</div>
											</div>

											<div class="d-flex justify-content-end" style="padding-top:20px;">
												<button type="submit" name="submit" class="btn btn-success"
													style="margin-right:10px;">&nbsp;&nbsp;ADD
													POST</button>
												<a href="vet_home.php" class="btn btn-primary">GO BACK</a>
											</div>

										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-12" >
								<?php
									$sql = "SELECT * from posts WHERE post_category='Adoption'";
									$result = mysqli_query($conn, $sql);
									$row_cnt = $result->num_rows;

									$sql1 = "SELECT * from posts WHERE post_category='Foster'";
									$result1 = mysqli_query($conn, $sql1);
									$row_cnt1 = $result1->num_rows;

									$sql2 = "SELECT * from posts WHERE post_category='Petcare'";
									$result2 = mysqli_query($conn, $sql2);
									$row_cnt2 = $result2->num_rows;

									$sql3 = "SELECT * from posts WHERE post_category='Pethealth'";
									$result3 = mysqli_query($conn, $sql3);
									$row_cnt3 = $result3->num_rows;
								?>

								<div class="card-box mb-30">
									<h5 class="pd-20 h5 mb-0">Categories</h5>
									<div class="list-group">
										<a href="vet_posts.php?category=Adoption"
											class="list-group-item d-flex align-items-center justify-content-between">Adoption
											<span class="badge badge-primary badge-pill"><?php echo $row_cnt?></span></a>
										<a href="vet_posts.php?category=Foster"
											class="list-group-item d-flex align-items-center justify-content-between">Foster
											<span class="badge badge-primary badge-pill"><?php echo $row_cnt1?></span></a>
										<a href="vet_posts.php?category=Petcare"
											class="list-group-item d-flex align-items-center justify-content-between">Pet
											Care
											<span class="badge badge-primary badge-pill"><?php echo $row_cnt2?></span></a>
										<a href="vet_posts.php?category=Pethealth"
											class="list-group-item d-flex align-items-center justify-content-between">Pet
											Health
											<span class="badge badge-primary badge-pill"><?php echo $row_cnt3?></span></a>
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