<?php
/*
 * New password Form
 * This page used for recover password
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

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
    <link rel="icon" type="image/png" sizes="16x16" href="deps/img/fav.png">
    <title>Arlen Blog Management Recover</title>
    <!-- Custom CSS -->
    <link href="deps/css/bootstrap.css" rel="stylesheet">
    <link href="deps/css/login-style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<?php if ($_GET["type"] === "rpass" && !empty($_GET["login"])) :

    $retuser = $_GET["login"];
    $retkey = $_GET["key"];

?>

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
                    <div id="passrecform">
                        <div class="text-center p-t-20 p-b-20">
                            <span class="db"><img src="deps/img/text-logo.png" /></span>
                        </div>
                        <!-- Form -->
                        <?php if (isset($_COOKIE["arlenpr"]) && md5($retkey) == $_COOKIE["arlenpr"]) { ?>
                            <div id="passrecform">
                                <form class="form-horizontal m-t-20" method="POST">
                                    <div class="row p-b-30">
                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-warning text-white" id="login-username"><i class="ti-pencil"></i></span>
                                                </div>
                                                <input type="password" class="form-control form-control-lg" placeholder="New Password" aria-label="Password" aria-describedby="login-password" id="arrecnpass" required>
                                                <input type="hidden" id="arnuser" value="<?php echo $retuser; ?>" required>
                                            </div>
                                            <div toggle="#arpass" class="fa fa-fw fa-eye eyefield-icon toggle-password"></div>
                                        </div>
                                    </div>
                                    <div class="row border-top border-secondary">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="p-t-20">
                                                    <a class="btn btn-info" href="../blog-admin.php">Back to Login</a>
                                                    <button class="btn btn-success float-right" type="submit" value="pass" id="arpassnup">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        <?php } else { ?>
                            <div class="text-center m-t-10">
                                <span class="text-danger ">Your session has expired please try again</span>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20 text-center">
                                        <a class="btn btn-info" href="../blog-admin.php">Back to Login</a>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
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
        <script src="deps/js/jquery.min.js"></script>
        <script src="deps/js/popper.min.js"></script>
        <script src="deps/js/bootstrap.min.js"></script>
        <script src="deps/js/perfect-scrollbar.jquery.min.js"></script>
        <script src="deps/js/login.js"></script>
    </body>
<?php
else :
    echo "<script>alert('Something Went Wrong! Please try Again.');location.href = '../blog-admin.php';</script>";
endif; ?>

</html>