<?php include_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/all.css">
    <link rel="stylesheet" href="../styles/index.css">
    <title>Admin Page</title>
    <style>
        /* admin side panel styles */
        body{
            background-color: #eceff3;
        }
        :root{
            --offcanvas-width: 100px;
            --topNavbarHeight: 56px;
        }
        main{
            margin-left: var(--offcanvas-width);
        }
        .nav{
            /*position: absolute!important;*/
            top: 0!important;
            bottom: 0!important;
            height: 100%!important;
            left: 0!important;
            background: #fff!important;
            width: 90px!important;
            overflow: hidden!important;
            position:  fixed!important;
            transition: width 0.2s linear!important;
            box-shadow: 0 20px 35ox rgba(0, 0, 0, 0.1)!important;
        }
        .logo{
            text-align: center!important;
            display: flex!important;
            transition: all 0.5s ease!important;
            margin: 10px 0 0 10px!important;
        }
        .logo img{
            width: 45px!important;
            height: 45px!important;
            border-radius: 50%!important;
            margin-left: -150px;
        }
        .logo .span{
            font-weight: bold!important;
            padding-left: 15px!important;
            font-size: 18px!important;
            text-transform: uppercase!important;
        }
        .side_bar_link{
            position: relative!important;
            color: rgb(85, 83, 83)!important;
            font-size: 14px!important;
            display: table!important;
            width: 300px!important;
            padding: 10px!important;
            text-decoration: none!important;
        }
        .fas{
            position: relative!important;
            width: 70px!important;
            height: 40px!important;
            top: 14px!important;
            font-size: 20px!important;
            text-align: center!important;
            margin-left: -30px;
        }
        .side_bar_nav_item{
            position: relative!important;
            top: 12px!important;
            margin-left: 10px!important;
        }
        /* span{
            position: relative!important;
            top: 12px!important;
            margin-left: -10px!important;
        } */
        .side_bar_link:hover{
            background: #eee!important;
        }
        .nav:hover{
            width: 280px!important;
            transition: all 0.5s ease!important;
        }
        .logout{
            /*position: absolute!important;*/
            /*bottom: -100!important;*/
            margin-top: 60px;
        }

        .side_bar_list{
            list-style: none;
            
        }
    </style>
</head>
<body>
    <nav class="nav mt-5">
        <ul class="mt-3">
            <li class="side_bar_list">
                <a href="index.php" class="side_bar_link logo">
                    <img src="../img/car 5.png" alt="">
                    <span class="side_bar_nav_item span">Dashboard</span>
                </a>
            </li>
            <li class="side_bar_list">
                <a href="index.php" class="side_bar_link">
                    <i class="fas fa-home"></i>
                    <span class="side_bar_nav_item span">Home</span>
                </a>
            </li>
            <li class="side_bar_list">
                <a href="admins.php" class="side_bar_link">
                    <i class="fas fa-user-graduate"></i>
                    <span class="side_bar_nav_item span">Admins</span>
                </a>
            </li>
            <li class="side_bar_list">
                <a href="users.php?page=active_insurances" class="side_bar_link">
                    <i class="fas fa-user"></i>
                    <span class="side_bar_nav_item span">Users</span>
                </a>
            </li>
            <li class="side_bar_list">
                <a href="services.php" class="side_bar_link">
                    <i class="fas fa-handshake"></i>
                    <span class="side_bar_nav_item span">Services</span>
                </a>
            </li>
            <li class="side_bar_list">
                <a href="claims.php" class="side_bar_link">
                    <i class="fas fa-chart-bar"></i>
                    <span class="side_bar_nav_item span">Claims</span>
                </a>
            </li>
            <li class="side_bar_list">
                <a href="messages.php" class="side_bar_link">
                    <i class="fas fa-envelope-open-text"></i>
                    <span class="side_bar_nav_item span">Messages</span>
                </a>
            </li>
            <!-- <li class="side_bar_list">
                <a href="#" class="side_bar_link">
                    <i class="fas fa-cog"></i>
                    <span class="side_bar_nav_item span">Setting</span>
                </a>
            </li> -->
           <!--  <li class="side_bar_list">
                <a href="#" class="side_bar_link">
                    <i class="fas fa-question-circle"></i>
                    <span class="side_bar_nav_item span">Help</span>
                </a>
            </li> -->
            <li class="side_bar_list" style="">
                <a href="../logout.php" class="side_bar_link logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="side_bar_nav_item span">Log out</span>
                </a>
            </li>
        </ul>
    </nav>
    
    <!-- <?php //include_once 'footer.php'; ?> -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/index.js"></script>
</body>
</html>