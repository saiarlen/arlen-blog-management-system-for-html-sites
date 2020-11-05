<!DOCTYPE html>
<html lang="Us-en" class="no-js">
<?php require_once("ARclass.php"); ?>


<head>
    <!-- Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Saiarlen">
    <meta charset="UTF-8">
    <title><?php echo $ar->post[$pTitle]; ?></title>

    <!-- Css -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $ar->mainurl ?>/example-page-assets/css/linearicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $ar->mainurl ?>/example-page-assets/css/main.css">
</head>

<body>
    <header>
        <div class="container main-menu" id="main-menu">
            <div class="row align-items-center justify-content-between">
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="example-index.html">Home</a></li>
                        <li><a href="example-blogs.html">Blogs</a></li>
                        <li><a href="#">Documantation</a></li>
                    </ul>
                    <span class="ex-logo">
                        <!-- Logo -->
                        <a href="<?php echo $ar->mainurl ?>"><img
                                src="<?php echo $ar->mainurl ?>/example-page-assets/img/logo.png" alt="logo"></a>
                    </span>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </header>

    <div class="site-main-container">
        <!-- Start top-post Area -->
        <section class="top-post-area pt-10">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-nav-area">
                            <h1 class="text-white">Single Post</h1>
                            <p class="text-white link-nav"><a href="example-index.html">Home </a> <span
                                    class="lnr lnr-arrow-right"></span><a href="post-single.html">Single Post </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End top-post Area -->
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <!-- Start single-post Area -->
                        <div class="single-post-wrap">
                            <div class="feature-img-thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="<?php echo $ar->post[$pImage]; ?>"
                                    alt="<?php echo $ar->post[$pImgalt]; ?>">
                            </div>
                            <div class="content-wrap">

                                <?php if(!empty($ar->post[$pCategory])): ?>
                                <ul class="tags mt-10">
                                    <?php foreach($ar->arUni($ar->post[$pCategory]) as $category){  ?>
                                    <li><a href="#"><?php $ar->arCat($category); ?></a></li>
                                    <?php } ?>
                                </ul>
                                <?php endif; ?>
                                <a href="#">
                                    <h3><?php echo $ar->post[$pTitle]; ?></h3>
                                </a>
                                <ul class="meta pb-20">
                                    <li><a href="#"><span
                                                class="lnr lnr-user"></span><?php echo $ar->post[$pAuthor]; ?></a></li>
                                    <li><a href="#"><span
                                                class="lnr lnr-calendar-full"></span><?php echo $ar->arDate($ar->post[$pDate], 0); ?></a>
                                    </li>

                                </ul>
                                <?php echo $ar->post[$pContent]; ?>

                                <div class="navigation-wrap justify-content-between d-flex">
                                    <a class="prev" href="<?php $ar->arPrvNext($ar->post[$pId], "prev") ?>"><span
                                            class="lnr lnr-arrow-left"></span>Prev Post</a>
                                    <a class="next" href="<?php $ar->arPrvNext($ar->post[$pId], "nxt") ?>">Next
                                        Post<span class="lnr lnr-arrow-right"></span></a>
                                </div>

                            </div>
                            <div class="comment-form">
                                <h4>Post Comment</h4>
                                <div id="disqus_thread"></div>
                            </div>
                        </div>
                        <!-- End single-post Area -->
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebars-area">
                            <div class="single-sidebar-widget most-popular-widget">
                                <h6 class="title">Most Recent</h6>
                                <?php foreach ($ar->arRecent(5) as $arRecent) { ?>
                               
                                <div class="single-list flex-row d-flex">
                                    <div class="thumb">
                                        <img src="<?php echo $arRecent[$pImage]; ?>" alt="<?php echo $arRecent[$pImgalt]; ?>" width="100px">
                                    </div>
                                    <div class="details">
                                        <a href="<?php $ar->blogpath($arRecent[$pUrl]); ?>">
                                            <h6><?php echo $arRecent[$pTitle]; ?></h6>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span><?php echo $ar->arDate($arRecent[$pDate], 2); ?></a></li>
                                            <li><a href="#"><span class="lnr lnr-user"></span><?php echo $arRecent[$pAuthor]; ?></a></li>
                                        </ul>
                                    </div>
                                </div>

                            <?php } ?>
                                
                            </div>



                            <div class="single-sidebar-widget social-network-widget">
                                <h6 class="title">Share on Social Networks</h6>
                                <ul class="social-list">
                                    <li class="d-flex justify-content-between align-items-center fb">
                                        <div class="icons d-flex flex-row align-items-center">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                            <p>Facebook</p>
                                        </div>
                                        <a href="<?php $ar->arsocialshare('facebook') ?>" target="_blank">Share Now</a>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center tw">
                                        <div class="icons d-flex flex-row align-items-center">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                            <p>Twitter</p>
                                        </div>
                                        <a href="<?php $ar->arsocialshare('twitter') ?>" target="_blank">Share Now</a>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center ln">
                                        <div class="icons d-flex flex-row align-items-center">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                            <p>Linkedin</p>
                                        </div>
                                        <a href="<?php $ar->arsocialshare('linkedin') ?>" target="_blank">Share Now</a>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center pn">
                                        <div class="icons d-flex flex-row align-items-center">
                                            <i class="fa fa-pinterest" aria-hidden="true"></i>
                                            <p>Pinterest</p>
                                        </div>
                                        <a href="<?php $ar->arsocialshare('pinterest') ?>" target="_blank">Share Now</a>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center gp">
                                        <div class="icons d-flex flex-row align-items-center">
                                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                                            <p>Google Plus</p>
                                        </div>
                                        <a href="<?php $ar->arsocialshare('googleplus') ?>" target="_blank">Share Now</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End latest-post Area -->
    </div>

    <!-- start footer Area -->
    <footer class="footer-area">
        <div class="container">
            <div class="footer-bottom row align-items-center">
                <p class="footer-text col-md-12">Design and Developed by <a href="www.saiarlen.com">Saiarlen</a></p>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js"></script>
    <script src="<?php echo $ar->mainurl ?>/example-page-assets/js/superfish.min.js"></script>
    <script src="<?php echo $ar->mainurl ?>/example-page-assets/js/main.js"></script>

</body>

</html>
