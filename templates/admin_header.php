<?php
include_once("./database/config.php");

$adminname = $_SESSION['adminname'];

$sql = "SELECT * FROM `admin` WHERE adminname='$adminname'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$img=$row['image'];

$adminname= $_SESSION['adminname'];

?>


<!--Top bar-->
<div class="header">
    <div class="header-left"></div>
    <!--admin Menu-->
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown" style="margin-right:40px;">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="./images/admin/<?php echo $img?>" alt="" height="60px">
                    </span>
                    <span class="user-name"><?php echo $adminname?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="admin_profile.php"><i class="dw dw-user"></i>My Profile</a>
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
        <div class="sidebar-menu" >
            <ul id="accordion-menu" >
                <li>
                    <a href="admin_home.php" class="dropdown-toggle no-arrow" style="padding-left:40px;">
                        <i class="fa fa-home" style="padding-right:20px;"></i><span class="mtext">Home</span>
                    </a>
                </li>
                <li>
                    <a href="admin_users.php" class="dropdown-toggle no-arrow" style="padding-left:40px;">
                    <i class="fa-solid fa-user" style="padding-right:20px;"></i><span class="mtext">Manage Users</span>
                    </a>
                </li>
                <li>
                    <a href="admin_fosters.php" class="dropdown-toggle no-arrow" style="padding-left:40px;">
                    <i class="fa fa-users" style="padding-right:20px;"></i><span class="mtext">Manage Fosters</span>
                    </a>
                </li>
                <li>
                    <a href="admin_vets.php" class="dropdown-toggle no-arrow" style="padding-left:40px;">
                    <i class="fa-solid fa-user-doctor" style="padding-right:20px;"></i><span class="mtext">Manage Vets</span>
                    </a>
                </li>
                <li>
                    <a href="admin_posts.php" class="dropdown-toggle no-arrow" style="padding-left:40px;">
                    <i class="fa-solid fa-user-doctor" style="padding-right:20px;"></i><span class="mtext">Manage Posts</span>
                    </a>
                </li>
                <li>
                    <a href="admin_verify_fosters.php" class="dropdown-toggle no-arrow" style="padding-left:40px;">
                    <i class="fa-solid fa-user-check" style="padding-right:20px;"></i><span class="mtext">Verify Fosters</span>
                    </a>
                </li>
                <li>
                    <a href="admin_verify_vets.php" class="dropdown-toggle no-arrow" style="padding-left:40px;">
                    <i class="fa-solid fa-user-check" style="padding-right:20px;"></i><span class="mtext">Verify Vets</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>