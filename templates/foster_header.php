<?php
include_once("./database/config.php");

$fostername = $_SESSION['fostername'];

$sql = "SELECT * FROM fosters WHERE fostername='$fostername'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$img=$row['image'];

$fostername= $_SESSION['fostername'];
$foster_id= $_SESSION['foster_id'];

?>


<!--Top bar-->
<div class="header">
    <div class="header-left"></div>
    <!--User Menu-->
    <div class="header-right">
        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    <span class="badge notification-active"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>
                            <?php												
                            $sql = "SELECT * FROM post_comments where user_id=$foster_id LIMIT 8";
							$result = mysqli_query($conn, $sql);
								if($result){
								    while($row=mysqli_fetch_assoc($result)){
                                        $commenter_name=$row['commenter_name'];
                                        $commenter_img=$row['commenter_img'];
                                        $role=$row['role'];
                                        
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
                            <li>
                                <a href="#">
                                    <img src="<?php echo $path."/".$commenter_img?>" alt="">
                                    <h3><?php echo $commenter_name?></h3>
                                    <p>has commented on your post.</p>
                                </a>
                            </li>
                            <?php
                                    }
                                }
                            ?>
                            <li>
                                <div class="d-flex justify-content-center" style="padding-top:20px;">
                                    End of notification

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown" style="margin-right:40px;">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="./images/fosters/<?php echo $img?>" alt="" height="60px">
                    </span>
                    <span class="user-name"><?php echo $fostername?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="foster_profile.php"><i class="dw dw-user1"></i>My Profile</a>
                    <a class="dropdown-item" href="logout.php"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Side bar-->
<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.php">
            <h4 style="color:white;margin-left:30px;">PawCenter</h4>
        </a>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="foster_home.php" class="dropdown-toggle no-arrow" style="padding-left:40px;">
                        <i class="fa fa-home" style="padding-right:20px;"></i><span class="mtext">Home</span>
                    </a>
                </li>
                <li>
                    <a href="foster_appointments.php" class="dropdown-toggle no-arrow" style="padding-left:40px;">
                        <i class="fa-solid fa-user-doctor" style="padding-right:20px;"></i><span class="mtext">My
                            Appointments</span>
                    </a>
                </li>
                <li>
                    <a href="foster_vets.php" class="dropdown-toggle no-arrow" style="padding-left:40px;">
                        <i class="fa-solid fa-user-doctor" style="padding-right:20px;"></i><span class="mtext">Nearby
                            Vets</span>
                    </a>
                </li>
                <li>
                    <a href="foster_vet_appointments.php" class="dropdown-toggle no-arrow" style="padding-left:40px;">
                        <i class="fa-solid fa-calendar" style="padding-right:20px;"></i><span class="mtext">Vet
                            Appointments</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>