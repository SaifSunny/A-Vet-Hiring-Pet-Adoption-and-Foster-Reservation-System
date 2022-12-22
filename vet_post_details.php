<?php
include_once("./database/config.php");

session_start();
date_default_timezone_set('Asia/Dhaka');

$vetname = $_SESSION['vetname'];
$img = $_SESSION['image'];

if (!isset($_SESSION['vetname'])) {
    header("Location: vet_login.php");
}

$post_id = $_GET['post_id'];

$sql = "SELECT * FROM posts WHERE post_id='$post_id'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$post_user_name=$row['post_user_name'];
$post_date=$row['post_date'];
$post_category=$row['post_category'];
$pet_age=$row['pet_age'];
$disabilities=$row['disabilities'];
$is_trained=$row['is_trained'];
$post_img=$row['post_img'];
$post_title=$row['post_title'];
$post_details=$row['post_details'];
$vaccinated=$row['vaccinated'];
$user_id=$row['user_id'];

if (isset($_POST['submit'])) {

    $error = "";
    $cls="";
	

	$comment = $_POST['comment'];
	$date = date("Y-m-d h:i:sa");

        $sql = "INSERT INTO post_comments(post_id, commenter_img, commenter_name, comment, comment_date, `role`,user_id) 
		VALUES ($post_id, '$img', '$vetname', '$comment', '$date', '2', $user_id)";
        $result = mysqli_query($conn, $sql);
        if($result){
            $error="Comment Successfully Posted!";
			$cls="success";
        }
        else {
			$error="Woops! Someting Went Wrong.";
			$cls="danger";
		}
}

?>

<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>PawCenter - Post Details</title>

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
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="blog-wrap">
					<div class="container pd-0">
						<div class="row">
							<div class="col-md-8 col-sm-12">
								<div class="blog-detail card-box overflow-hidden mb-30">
									<div class="blog-img">
										<img src="images/posts/<?php echo $post_img?>" alt="">
									</div>
									<div class="blog-caption">
										<div class="pt-10" style="margin-bottom:20px;">
											<span style="margin-right:20px;"><i class="fa fa-user"></i> <span
													style="color:#222;">&nbsp;<?php echo $post_user_name?></span></span>
											<span style="margin-right:20px;"><i class="fa fa-calendar"></i> <span
													style="color:#222;">&nbsp;<?php echo $post_date?></span></span>
											<span><i class="fa fa-clipboard"></i> <span
													style="color:#222;">&nbsp;<?php echo $post_category?></span></span>
										</div>
										<h4 class="mb-10"><?php echo $post_title?></h4>
										<h5 class="mb-10" style="padding-top:20px;">Background</h5>
										<hr>
										<p><?php echo $post_details?>
										</p>
										<h5 class="mb-10" style="padding-top:20px;">Adout the Pet</h5>
										<hr>
										<ul>
											<li>Age: <?php echo $pet_age?></li>
											<li>Disabilities: <?php echo $disabilities?></li>
											<li>Trained: <?php echo $is_trained?></li>
											<li>Vaccinated: <?php echo $vaccinated?></li>
										</ul>

										<!-- Comment-List-Start -->
										<div class="comment__list-area" style="padding-top:30px;padding-bottom:30px;">
											<h4 class="comment__list-title">Comments </h4>
											<hr>
											<ol>
												<?php
													$sql = "SELECT * FROM post_comments WHERE post_id='$post_id'";
													$result = mysqli_query($conn, $sql);

													if($result){
													while($row=mysqli_fetch_assoc($result)){
																		
														$commenter_img=$row['commenter_img'];
														$commenter_name=$row['commenter_name'];
														$comment=$row['comment'];
														$comment_date=$row['comment_date'];
														$role=$row['role'];
														$comment_id=$row['comment_id'];

														if($role==0){
															$path="images/vets";
														}
														if($role==1){
															$path="images/fosters";
														}
														if($role==2){
															$path="images/vets";
														}

												?>
												<li>
													<div>
														<footer>
															<div class="d-flex">
																<div>
																	<img src="<?php echo $path."/".$commenter_img?>"
																		alt="" width="50" />
																</div>
																<div style="padding-left:30px;">
																	<p><a href="vet_commenter_profile.php?commenter_name=<?php echo $commenter_name?>&role=<?php echo $role?>"><?php echo $commenter_name?></a><br>
																		<?php echo $comment_date?></p>
																</div>
															</div>
														</footer>
														<!-- Comment__footer -->
														<div class="comment__desc">
															<p><?php echo $comment?></p>
														</div>
														<!-- Comment__desc -->
													</div>
													<!-- Comment__body -->
													<ul>
														<li>
															<?php

																$sql1 = "SELECT * FROM comment_reply WHERE comment_id ='$comment_id'";
																$result1 = mysqli_query($conn, $sql1);
																if($result1){

																while($row1=mysqli_fetch_assoc($result1)){
																					
																	$reply_img=$row1['reply_img'];
																	$reply_name=$row1['reply_name'];
																	$reply_message=$row1['reply_message'];
																	$reply_date=$row1['reply_date'];
																	$role=$row1['role'];

																	if($role==0){
																		$path="images/users";
																	}
																	if($role==1){
																		$path="images/fosters";
																	}
																	if($role==2){
																		$path="images/vets";
																	}

															?>
															<div>
																<footer>
																	<div class="d-flex">
																		<div>
																			<img src="<?php echo $path."/".$reply_img?>"
																				alt="" width="50" />
																		</div>
																		<div style="padding-left:30px;">
																			<p><?php echo $reply_name?><br>
																				<?php echo $reply_date?></p>
																		</div>
																	</div>
																</footer>
																<!-- Comment__footer -->
																<div class="comment__desc">
																	<p><?php echo $reply_message?>
																	</p>
																</div>
															</div>
															<!-- Comment__body -->
															<?php
																	}
																}
															?>
															<form
																action="vet_reply.php?comment_id=<?php echo $comment_id?>&post_id=<?php echo $post_id?>"
																method="POST">
																<div class="d-flex">
																	<input type="text" class="form-control" name="reply"
																		Placeholder="Reply" required>
																	<button type="submit" name="submit_reply"
																		class="btn btn-success"
																		style="margin-left:15px;">Reply</button>
																</div>
															</form>
														</li>

														<!-- #comment-## -->
													</ul>
													<!-- .children -->
												</li>
												<?php
														}
													}
												?>
											</ol>
										</div>
										<!-- Comment-List-End -->

										<!-- Comment-Form-Start -->
										<div class="comment__respond">
											<h4 class="comment__respond-title">Leave an Opinion</h4>
											<hr>
											<div class="alert alert-<?php echo $cls;?>">
												<?php 
													if (isset($_POST['submit'])){
														echo $error;
												}?>
											</div>
											<form method="POST" action="">
												<textarea name="comment" class="form-control"
													placeholder="Comment" required></textarea>
												<button type="submit" name="submit" class="btn btn-success"
													style="margin-top:20px;">Post Comment</button>
											</form>
										</div>
										<!-- Comment-Form-End -->
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
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
											<span
												class="badge badge-primary badge-pill"><?php echo $row_cnt?></span></a>
										<a href="vet_posts.php?category=Foster"
											class="list-group-item d-flex align-items-center justify-content-between">Foster
											<span
												class="badge badge-primary badge-pill"><?php echo $row_cnt1?></span></a>
										<a href="vet_posts.php?category=Petcare"
											class="list-group-item d-flex align-items-center justify-content-between">Pet
											Care
											<span
												class="badge badge-primary badge-pill"><?php echo $row_cnt2?></span></a>
										<a href="vet_posts.php?category=Pethealth"
											class="list-group-item d-flex align-items-center justify-content-between">Pet
											Health
											<span
												class="badge badge-primary badge-pill"><?php echo $row_cnt3?></span></a>
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