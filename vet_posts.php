<?php
include_once("./database/config.php");

session_start();

$vetname = $_SESSION['vetname'];

if (!isset($_SESSION['vetname'])) {
    header("Location: vet_login.php");
}

$category = $_GET['category'];
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
						<div class="row">
							<div class="col-md-8 col-sm-12">
								<div class="d-flex justify-content-between" style="padding-bottom:10px;">
									<div>
										<h5 class="pd-20 h5 mb-0">Latest Posts</h5>
									</div>
									<div style="padding:15px;">
										<a href="vet_add_post.php" class="btn btn-success">ADD POST</a>
									</div>
								</div>
								<div class="blog-list" style="overflow-y:scroll; height:100vh;">
									<ul>
										<?php
										$sql = "SELECT * FROM posts WHERE post_category='$category' ORDER BY post_id DESC";
										$result = mysqli_query($conn, $sql);
										if($result){
										while($row=mysqli_fetch_assoc($result)){
															
											$post_user_name=$row['post_user_name'];
											$post_date=$row['post_date'];
											$post_category=$row['post_category'];
											$post_id=$row['post_id'];
											$pet_age=$row['pet_age'];
											$disabilities=$row['disabilities'];
											$is_trained=$row['is_trained'];
											$post_img=$row['post_img'];
											$post_title=$row['post_title'];
											$post_details=$row['post_details'];
									?>
										<li>
											<div class="row no-gutters">
												<div class="col-lg-4 col-md-12 col-sm-12">
													<div class="blog-img">
														<img src="images/posts/<?php echo $post_img?>" alt=""
															class="bg_img">
													</div>
												</div>
												<div class="col-lg-8 col-md-12 col-sm-12">
													<div class="blog-caption">
														<div class="pt-10" style="margin-bottom:20px;">
															<span style="margin-right:20px;"><i
																	class="fa fa-calendar"></i> <span
																	style="color:#222;">&nbsp;<?php echo $post_date?></span></span>
															<span><i class="fa fa-clipboard"></i> <span
																	style="color:#222;">&nbsp;<?php echo $post_category?></span></span>
														</div>
														<h4><a href="#"><?php echo $post_title?></a></h4>
														<div class="blog-by">
															<p style="color:#222;"><?php echo $post_details?></p>
															<div class="pt-10">
																<a href="vet_post_details.php?post_id=<?php echo $post_id?>"
																	class="btn btn-outline-primary">Read
																	More</a>
															</div>
														</div>
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