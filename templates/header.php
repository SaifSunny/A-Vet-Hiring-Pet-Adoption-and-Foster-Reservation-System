<head>
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-family: "poppins";
        }

        .dropdown-content a:hover {
            background-color: rgba(127, 180, 50);
            color:white;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>
</head>


<!-- Navbar -->
<div class="nav__area nav__transparent" data-spy="affix" data-offset-top="197">
    <div class="container nav__row">
        <!-- nav__logo-Start -->
        <div class="nav__logo">
            <!-- Text-Logo-Markup -->
            <a href="index.php" class="nav__logo-image logo__light"><img src="images/logo-light.png" alt="Gority"></a>
            <a href="index.php" class="nav__logo-image logo__dark"><img src="images/logo-dark.png" alt="Gority"></a>
        </div>
        <!--nav__logo-End-->
        <div class="nav__toggle" id="nav-toggle">
            <i class="ri-function-line"></i>
        </div>
        <div class="nav__right" id="nav-right">
            <div class="nav__close" id="nav-close">
                <i class="ri-close-line"></i>
            </div>
            <!-- nav__menu-Start -->
            <nav class="nav__menu" id="nav-menu">
                <ul class="nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#about">About</a></li>
                    <li><a href="index.php#services">Services</a></li>
                    <li><a href="index.php#vets">Vets</a></li>
                    <li><a href="index.php#testimonials">Testimonials</a></li>
                    <li><a href="index.php#posts">Latest Posts</a></li>
                    <li><a href="index.php#contact">Contact</a></li>

                </ul>
            </nav>
            <!-- nav__menu-End -->

            <!--Action-Button-->
            <div class="dropdown">
                <button class="dropbtn primary__button">Login</button>
                <div class="dropdown-content">
                    <a href="user_login.php">User Login</a>
                    <a href="foster_login.php">Foster login</a>
                    <a href="vet_login.php">Vet login</a>
                    <a href="admin_login.php">Admin login</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Navbar -->