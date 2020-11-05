<?php
/*
 * Header Template 
 * header template part
 * @version   1.0.0
 * @author Saiarlen
 * @url http://saiarlen.com
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html
 */

// Config file
if (file_exists("inc/config.php")) {
    require_once("inc/config.php");
}

//Core Functions
if (file_exists("inc/core.php")) {
    require_once("inc/core.php");
}


// Check user login or not
if (!isset($_SESSION["arlenUserTest"])) {
    header('Location: ../blog-admin.php');
}

//Settings function init
$appSettings = arSettings($conn);
$appdboard = json_decode($appSettings[0], true); //for all comman site settings

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Arlen Blog Management System For Static Sites">
    <meta name="author" content="Saiarlen">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php arFn($appdboard['favic'], 'deps/img/fav.png'); ?>">
    <title><?php arFn($appdboard['titlepfx'], 'Arlen'); ?> | <?php echo $page_title; ?></title>
    <!-- Custom CSS -->

    <link href="deps/css/multicheck.css" rel="stylesheet">
    <link href="deps/css/bootstrap.css" rel="stylesheet">
    <link href="deps/css/animate.css" rel="stylesheet">
    <link href="deps/css/dashboard.css" rel="stylesheet">
    <link href="deps/css/select2.min.css" rel="stylesheet">
    <link href="deps/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="deps/css/arlen-style.css" rel="stylesheet">

    <!-- Jquery -->
    <script src="deps/js/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="home.php">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!-- Dark Logo icon -->
                            <img src="<?php arFn($appdboard['iconlogo'], 'deps/img/icon-logo.png'); ?>" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="<?php arFn($appdboard['iconlogo'], 'deps/img/text-logo.png'); ?>" alt="homepage" class="light-logo" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
                                <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="post-add-new.php">New Post</a>
                                <a class="dropdown-item" href="categories.php">New Category</a>
                                <a class="dropdown-item" href="tags.php">New Tag</a>
                            </div>
                        </li>

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Setting icon -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link waves-effect waves-dark" href="settings.php" aria-expanded="false">
                                <div class="mdi mdi-settings font-24 rotating"></div>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End of Setting icon -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">

                            <a id="imgaload" class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img id="proimg" src="<?php arUserIdentifier($conn, $loginuser, 1); ?>" alt="user" class="rounded-circle" width="31" height="31">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="my-profile.php"><i class="fas fa-user m-r-5 m-l-5"></i>
                                    My Profile</a>
                                <?php if (arUserIdentifier($conn, $loginuser, 3) == "superadmin") : ?>
                                    <a class="dropdown-item" href="manage-users.php"><i class="fas fa-users m-r-5 m-l-5"></i> Manage Users</a>
                                    <a class="dropdown-item" href="add-new-profile.php"><i class="fas fa-user-plus m-r-5 m-l-5"></i> Add New Author</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="settings.php"><i class=" fas fa-cog m-r-5 m-l-5"></i>
                                        Settings</a>
                                <?php endif; ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="inc/logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>

                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link " href="home.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="media.php" aria-expanded="false"><i class="mdi mdi-folder-image"></i><span class="hide-menu">Media</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-pencil-box"></i><span class="hide-menu">Posts </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="post-add-new.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Add New </span></a>
                                </li>
                                <li class="sidebar-item"><a href="all-posts.php" class="sidebar-link"><i class="mdi mdi-note-multiple"></i><span class="hide-menu"> All Posts
                                        </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="categories.php" aria-expanded="false"><i class="mdi mdi-view-column"></i><span class="hide-menu">Categories</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tags.php" aria-expanded="false"><i class="mdi mdi-tag-multiple"></i><span class="hide-menu">Tags</span></a></li>
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-note-text"></i><span class="hide-menu">My
                                    Blogs</span></a></li> -->
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-puzzle"></i><span class="hide-menu">Addons</span></a></li> -->

                        <?php if ($appdboard['htab'] == 1) : ?>
                            <?php if (arUserIdentifier($conn, $loginuser, 3) == "superadmin") : ?>
                                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-help-circle"></i><span class="hide-menu">Help </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="mdi mdi-file"></i><span class="hide-menu">Documentation</span></a>
                                        </li>
                                        <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="mdi mdi-video"></i><span class="hide-menu"> Tutorials </span></a>
                                        </li>
                                        <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="mdi mdi-comment-question-outline"></i><span class="hide-menu"> FAQ's
                                                </span></a></li>
                                        <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu"> Support </span></a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">