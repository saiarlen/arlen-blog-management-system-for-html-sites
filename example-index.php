<!DOCTYPE html>
<html lang="Us-en" class="no-js">
<?php require_once("ARclass.php"); ?>

<head>
	<!-- Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Saiarlen">
	<meta charset="UTF-8">
	<title>Arlen Blog Management System Sample Site</title>

	<!-- Css -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="example-page-assets/css/linearicons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="example-page-assets/css/main.css">
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
				</nav><!-- #nav-menu-container -->
			</div>
		</div>
	</header>

	<div class="site-main-container">
		<!-- Start top-banner Area -->
		<section class="top-post-area pt-10">
			<div class="container no-padding">
				<div class="row small-gutters">
					<div class="col-lg-12 top-post-left">
						<div class="feature-image-thumb relative">

							<img class="img-fluid" src="example-page-assets/img/bnr.jpg" alt="saiarlen">
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
					<div class="col-lg-12 post-list">
						<!-- Start latest-post Area -->
						<div class="latest-post-wrap">
							<h4 class="cat-title">Latest Blogs</h4>

							<div class="row">
								<?php foreach ($ar->arRecent(3) as $arRecent) { ?>
									<div class="col-md-4">
										<div class="single-latest-post row align-items-center">
											<div class="col-lg-12 post-left">
												<div class="feature-img relative">
													<div class="overlay overlay-bg"></div>
													<img class="img-fluid" src="<?php echo $arRecent[$pImage]; ?>" alt="<?php echo $arRecent[$pImgalt]; ?>">
												</div>
											</div>
											<div class="col-lg-12 post-right">
												<a href="<?php $ar->blogpath($arRecent[$pUrl]); ?>">
													<h4><?php echo $arRecent[$pTitle]; ?></h4>
												</a>
												<ul class="meta">
													<li><a href="#"><span class="lnr lnr-user"></span><?php echo $arRecent[$pAuthor]; ?></a>
													</li>
													<li><a href="#"><span class="lnr lnr-calendar-full"></span><?php echo $ar->arDate($arRecent[$pDate], 1); ?></a>
													</li>

												</ul>
												<p class="excert">
													<?php echo $arRecent[$pExcerpt]; ?>
												</p>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
						<!-- End latest-post Area -->
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
				<p class="footer-text m-0 col-md-12">Design and Developed by <a href="www.saiarlen.com">Saiarlen</a></p>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js"></script>
	<script src="example-page-assets/js/superfish.min.js"></script>
	<script src="example-page-assets/js/main.js"></script>
</body>

</html>