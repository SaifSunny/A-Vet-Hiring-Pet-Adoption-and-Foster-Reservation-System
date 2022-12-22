<?php
include_once("./database/config.php");
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== TITLE TAG ======-->
    <title>PawCenter</title>

    <!--====== STYLESHEETS ======-->
    <link rel="stylesheet" href="css/swiper-bundle-min.css" />
    <link rel="stylesheet" href="css/bootstrap-min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/remixicon.css">
    <link rel="stylesheet" href="css/theme-icon.css">
    <link rel="stylesheet" href="css/lity-min.css">
    <link rel="stylesheet" href="css/theme.css">

    <!--====== MAIN STYLESHEET ======-->
    <link href="style.css" rel="stylesheet">
    <script src="js/vendor/modernizr.js"></script>

</head>

<body data-spy="scroll" data-target=".nav__area" data-offset="50">

    <!-- Navigation  -->
    <?php include_once("./templates/header.php");?>
    <!-- Navigation  -->

    <main class="full-wrapper" id="home-section">

        <!--Home-->
        <header class="home__area v1 section__bg" style="background-image: url('images/header-bg-1.jpg')">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section__heading mb-0">
                            <h5 class="section__heading-sup-title anim_top">We Enjoy providing</h5>
                            <h1 class="section__heading-title anim_top">Best Care for Your Pets</h1>
                            <div class="section__heading-desc anim_top">
                                <p>Loking for vets or loking to Adopt. We provide all kinds of services.</p>
                            </div>
                            <a href="user_login.php" class="primary__button anim_top">Contact Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section__shape">
                <svg class="svg_element">
                    <use xlink:href="#svg__element-1" />
                </svg>
            </div>
        </header>
        <!--Home-->

        <!--About-->
        <section class="about__area v1 section__padding-top section__relative" id="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <figure class="about-image anim_left">
                            <img src="images/about-image.png" alt="">
                        </figure>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="section__heading mb-0">
                            <h5 class="section__heading-sup-title anim_top">About Us</h5>
                            <h2 class="section__heading-title anim_top">We are best for Your pet care</h2>
                            <div class="section__heading-desc anim_top">
                                <p>Em ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                            <ul class="check__list anim_top">
                                <li><i class="ri-checkbox-circle-line"></i>Vetenary Help</li>
                                <li><i class="ri-checkbox-circle-line"></i>Pet Adoption</li>
                                <li><i class="ri-checkbox-circle-line"></i>Foster care</li>
                                <li><i class="ri-checkbox-circle-line"></i>24 hour Services</li>
                            </ul>
                            <a href="user_login.php" class="primary__button anim_top">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section__shape shpae_1">
                <svg class="svg_element">
                    <use xlink:href="#svg__element-2" />
                </svg>
            </div>
            <div class="section__shape shpae_2">
                <svg class="svg_element">
                    <use xlink:href="#svg__element-3" />
                </svg>
            </div>
        </section>
        <!--About-Area-End-->

        <!--Service-->
        <section class="service__area section__padding" id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section__heading text-center">
                            <h5 class="section__heading-sup-title anim_top">Services</h5>
                            <h2 class="section__heading-title anim_top">We Provide Services</h2>
                        </div>
                    </div>
                </div>
                <div class="row items_space">
                    <div class="col-lg-4">
                        <div class="service__box anim_top service__1">
                            <div class="service__box-icon">
                                <i class="icon-service-1"></i>
                                <svg class="svg_element">
                                    <use xlink:href="#svg__element-4" />
                                </svg>
                            </div>
                            <h4 class="service__box-title"><a href="">Vetenary Help</a></h4>
                            <div class="service__box-desc">
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit</p>
                            </div>
                            <div class="service__box-bg">
                                <i class="icon-dog-line"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service__box anim_top service__2 active">
                            <div class="service__box-icon">
                                <i class="icon-service-2"></i>
                                <svg class="svg_element">
                                    <use xlink:href="#svg__element-4" />
                                </svg>
                            </div>
                            <h4 class="service__box-title"><a href="">Pet Adoption</a></h4>
                            <div class="service__box-desc">
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit</p>
                            </div>
                            <div class="service__box-bg">
                                <i class="icon-dog-line"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service__box anim_top service__3">
                            <div class="service__box-icon">
                                <i class="icon-service-3"></i>
                                <svg class="svg_element">
                                    <use xlink:href="#svg__element-4" />
                                </svg>
                            </div>
                            <h4 class="service__box-title"><a href="">Pet Fostering</a></h4>
                            <div class="service__box-desc">
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit</p>
                            </div>
                            <div class="service__box-bg">
                                <i class="icon-dog-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Service-->

        <!--Counter-->
        <section class="counter__area section__padding section__overlay section__bg"
            style="background-image: url('images/counter-bg.jpg')">
            <div class="container">
                <div class="row items_space">
                    <div class="col-md-3 col-sm-6">
                        <div class="counter__box anim_top">
                            <div class="counter__box-icon">
                                <i class="icon-star-user"></i>
                            </div>
                            <h3 class="counter__box-number h2"><span class="count number_count">1.5</span>k+</h3>
                            <h5 class="counter__box-title">Happy Clients</h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter__box anim_top">
                            <div class="counter__box-icon">
                                <i class="icon-hand-sheak"></i>
                            </div>
                            <h3 class="counter__box-number h2"><span class="count number_count">50</span>+</h3>
                            <h5 class="counter__box-title">Vets</h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter__box anim_top">
                            <div class="counter__box-icon">
                                <i class="icon-award"></i>
                            </div>
                            <h3 class="counter__box-number h2"><span class="count number_count">70</span>+</h3>
                            <h5 class="counter__box-title">Fosters</h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter__box anim_top">
                            <div class="counter__box-icon">
                                <i class="icon-hand-dog"></i>
                            </div>
                            <h3 class="counter__box-number h2"><span class="count number_count">200</span>+</h3>
                            <h5 class="counter__box-title">Adopted Pets</h5>
                        </div>
                    </div>

                </div>
            </div>
            <div class="section__shape">
                <svg class="svg_element">
                    <use xlink:href="#svg__element-1" />
                </svg>
            </div>
        </section>
        <!--Counter-->

        <!--Vets-->
        <section class="team__area section__padding-top section__relative">
            <div class="section__shape">
                <svg class="svg_element">
                    <use xlink:href="#svg__element-7" />
                </svg>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section__heading text-center">
                            <h5 class="section__heading-sup-title anim_top">Our Vets</h5>
                            <h2 class="section__heading-title anim_top">Meet the Vet Team</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper-container team_slider anim_top">
                            <div class="swiper-wrapper">
                                <?php
                                    $sql = "SELECT * FROM vets WHERE `status` ='1' LIMIT 4";
                                    $result = mysqli_query($conn, $sql);
                                    if($result){
                                    while($row=mysqli_fetch_assoc($result)){
                                                        
                                        $name=$row['firstname'] ." ". $row['lastname'];
                                        $image=$row['image'];
                                        $clinic_name=$row['clinic_name'];
                                        $vet_id=$row['vet_id'];
                                        $fee=$row['fee'];
                                        $city=$row['clinic_city'];
                                ?>
                                <div class="swiper-slide">
                                    <div class="team__box">
                                        <div class="team__box-image">
                                            <img src="images/vets/<?php echo $image?>" alt="">
                                        </div>
                                        <h5 class="team__box-name"><a href="user_login.php"><?php echo $name?></a></h5>
                                        <h6 class="team__box-position"><?php echo $clinic_name?></h6>
                                        <div class="social__links">
                                            <a href="#"><i class="ri-facebook-fill"></i></a>
                                            <a href="#"><i class="ri-twitter-fill"></i></a>
                                            <a href="#"><i class="ri-instagram-fill"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                        }
                                    }
                                ?>
  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Vets-->

        <!--posts-->
        <section class="posts__area section__padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section__heading text-center">
                            <h5 class="section__heading-sup-title anim_top">Adopt or Foster</h5>
                            <h2 class="section__heading-title anim_top">Adoption & Fostering Posts</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row items_space">
                                <?php
										$sql = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 3";
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
                            <div class="col-lg-4">
                                <div class="posts_box anim_top">
                                    <figure class="posts_box-thumb">
                                        <img src="images/posts/<?php echo $post_img?>" alt="">
                                    </figure>
                                    <div class="posts_box-details">
                                        <ul class="meta_list">
                                        <li>
                                                <span class="icon"><span class="ri-calendar-check-line"></span></span>
                                                <span class="value"><?php echo $post_category?></span>
                                            </li>
                                            <li>
                                                <span class="icon"><span class="ri-user-3-line"></span></span>
                                                <span class="value"><?php echo $post_user_name?></span>
                                            </li>

                                        </ul>
                                        <h4 class="title"><a href="user_login.php"><?php echo $post_title?></a></h4>
                                        <div class="desc">
                                            <p>Age: <?php echo $pet_age?></p>
                                            <p>Trained: <?php echo $is_trained?></p>
                                        </div>
                                        <a href="user_login.php" class="load_more">Load More</a>
                                    </div>
                                </div>
                            </div>
                            <?php
										}
									}
							?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--posts-->

        <!--Testimonial-->
        <section class="testimonial__area section__padding-top" id="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="section__heading pb-5 mb-n3  text-center text-lg-left">
                            <h5 class="section__heading-sup-title anim_top">Testimonial</h5>
                            <h2 class="section__heading-title anim_top">Client happy With Us</h2>
                            <div class="section__heading-desc anim_top">
                            </div>
                        </div>
                        <div class="slider__arrows anim_top justify-content-lg-start justify-content-center mb-4 mb-lg-0"
                            id="testimonial-arrow">
                            <button class="slider__arrow arrow_prev"><i class="icon-arrow-left"></i></button>
                            <button class="slider__arrow arrow_next"><i class="icon-arrow-right"></i></button>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="swiper-container testimonial_slider anim_right">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial__box">
                                        <div class="testimonial__box-image">
                                            <img src="images/test1.jpg" alt="">
                                        </div>
                                        <div class="testimonial__box-quote">
                                            <i class="icon-quote"></i>
                                        </div>
                                        <div class="testimonial__box-desc">
                                            <p>Loved the site. Helped a lot in times of Emergency.</p>
                                        </div>
                                        <h5 class="testimonial__box-name">Rezwana karim</h5>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial__box">
                                        <div class="testimonial__box-image">
                                            <img src="images/test2.jpg" alt="">
                                        </div>
                                        <div class="testimonial__box-quote">
                                            <i class="icon-quote"></i>
                                        </div>
                                        <div class="testimonial__box-desc">
                                            <p>I adopted my from a person I find on PawCenter Absolutely Loved the service.</p>
                                        </div>
                                        <h5 class="testimonial__box-name">Afsana Begum</h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonial-->

        <!--Contact-->
        <section class="contact__area section__padding">
            <div class="container">
                <div class="row items_space section__padding-bottom">
                    <div class="col-lg-4">
                        <div class="info__box anim_top">
                            <div class="info__box-icon">
                                <svg class="svg_element color__primary">
                                    <use xlink:href="#svg__element-10" />
                                </svg>
                                <i class="icon-phone"></i>
                            </div>
                            <h5 class="info__box-title">Phone Us</h5>
                            <div class="info__box-desc">
                                <p>+8801546758693</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="info__box anim_top">
                            <div class="info__box-icon">
                                <svg class="svg_element color__secondary">
                                    <use xlink:href="#svg__element-10" />
                                </svg>
                                <i class="icon-envelope"></i>
                            </div>
                            <h5 class="info__box-title">Email Drop Us</h5>
                            <div class="info__box-desc">
                                <p>pawcenter.bd@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="info__box anim_top">
                            <div class="info__box-icon">
                                <svg class="svg_element color__tertiary">
                                    <use xlink:href="#svg__element-10" />
                                </svg>
                                <i class="icon-map-marker"></i>
                            </div>
                            <h5 class="info__box-title">Location</h5>
                            <div class="info__box-desc">
                                <p>Mohammadpur, Dhaka<br> Bangladesh</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row contact__form-row no-gutters anim_top">
                    <div class="col-lg-6">
                        <div class="map__frame">
                            <img src="images/contact.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form class="contact__form" id="contact-form">
                            <h3 class="contact__form-title">Free Get In thouch</h3>
                            <div class="row">
                                <div class="col-sm-6 form-box">
                                    <input type="text" name="form-name" class="input_control" placeholder="Your Name">
                                </div>
                                <div class="col-sm-6 form-box">
                                    <input type="email" name="form-email" class="input_control"
                                        placeholder="Your Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-box">
                                    <input type="text" name="form-subject" class="input_control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-box">
                                    <textarea name="form-message" id="message" class="input_control"
                                        placeholder="Message"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="primary__button">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact-->

        <!-- Footer -->
        <?php include_once("./templates/footer.php");?>
        <!-- Footer -->

    </main>
    <!-- Full-Wrapper-End -->

    <!-- Progress_Scroll-To-Top -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
        <span class="icon"><i class="ri-arrow-up-line"></i></span>
    </div>

    <!--=======  SCRIPTS =======-->
    <script src="js/vendor/jquery-min.js"></script>
    <!--=======  PLUGINS =======-->
    <script src="js/bootstrap-min.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/ajaxchimp.js"></script>
    <script src="js/animatenumber-min.js"></script>
    <script src="js/contact-form.js"></script>
    <script src="js/imagesloaded-min.js"></script>
    <script src="js/isotope-pkgd-min.js"></script>
    <script src="js/lity-min.js"></script>
    <script src="js/scrollreveal-min.js"></script>
    <script src="js/swiper-bundle-min.js"></script>
    <!--=======  ACTIVE JS =======-->
    <script src="js/main.js"></script>
</body>

</html>