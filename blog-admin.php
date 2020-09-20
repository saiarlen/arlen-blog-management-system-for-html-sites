<?php
/*
 * Login file
 * This page used for initial user login
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */
session_start();
if (isset($_SESSION["arlenUserTest"])) {
    header("location: admin/home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Login Page">
    <meta name="author" content="saiarlen">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="admin/deps/img/fav.png">
    <title>Arlen Blog Management Login</title>
    <!-- Custom CSS -->
    <link href="admin/deps/css/bootstrap.css" rel="stylesheet">
    <link href="admin/deps/css/login-style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
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
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="admin/deps/img/text-logo.png" /></span>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" id="arloginform" method="POST">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" id="aruser" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="login-username"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="login-password" id="arpass" required>
                                </div>
                                <div toggle="#arpass" class="fa fa-fw fa-eye eyefield-icon toggle-password"></div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock m-r-5"></i> Lost password?</button>
                                        <button class="btn btn-success float-right" type="submit" value="login" id="arlogsub">Login</button>
                                    </div>
                                </div>
                                <div class="response-wrapper">
                                    <div class="load-wrapp">
                                        <!-- Loader -->
                                        <div class="arload">
                                            <div class="bar"></div>
                                        </div>
                                    </div>
                                    <div id="arlogresponse"></div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <!-- ============================================================== -->
                <!-- Recover form -->
                <!-- ============================================================== -->
                <div id="recoverform">
                    <div class="text-center m-t-10">
                        <span class="text-white ">Enter your registered e-mail address below and we will send you username and instructions to how recover a password.</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <form class="col-12" method="POST">
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input type="text" id="recov-email" class="form-control form-control-lg" placeholder="Email Address">
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-success" href="javascript:void(0)" id="to-login" name="action">Back To Login</a>
                                    <button class="btn btn-info float-right" id="arrecsub" type="submit" value="recover">Recover</button>
                                </div>
                                <div class="col-12 text-center min-ht">
                                    <div id="arrecresponse"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.css -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="admin/deps/js/jquery.min.js"></script>
    <script src="admin/deps/js/popper.min.js"></script>
    <script src="admin/deps/js/bootstrap.min.js"></script>
    <script src="admin/deps/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="admin/deps/js/login.js"></script>
</body>

</html>