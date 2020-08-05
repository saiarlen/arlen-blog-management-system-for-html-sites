
<?php
/*
 * Login file
 * This page used for initial user login
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

if (file_exists("admin/inc/login.php")){
    require_once("admin/inc/login.php");
}
if (function_exists('arlen_Auth')){
    arlen_Auth($conn);
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
    <form class="box" method="POST">
        <h1>Login</h1>
        <input class="form-control" type="text" id= "user" name="user" placeholder="Username">
        <input class="form-control" type="password" id="pass" name="pass" placeholder="Password">
        <input type="submit" id="login" name="login" value="Login">
        <div id= "response"></div>
    </form>

    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="admin/deps/js/jquery.min.js"></script>
    <script src="admin/deps/js/popper.min.js"></script>
    <script src="admin/deps/js/bootstrap.min.js"></script>
    <script src="admin/deps/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="admin/deps/js/arlen-script.js"></script>


</body>

</html>