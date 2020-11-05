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
		<!-- Start top-post Area -->
		<section class="top-post-area pt-10">
			<div class="container no-padding">
				<div class="row">
					<div class="col-lg-12">
						<div class="hero-nav-area">
							<h1 class="text-white">Blog Posts</h1>
							<p class="text-white link-nav"><a href="example-index.html">Home </a> <span class="lnr lnr-arrow-right"></span><a href="#">Archive Posts</a></p>
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
							<h4 class="cat-title">All Blogs</h4>

							<?php foreach ($ar->posts as $arpost) { ?>

								<!-- Posts archieve loop -->
								<div class="single-latest-post row align-items-center">
									<div class="col-lg-5 post-left">
										<div class="feature-img relative">
											<div class="overlay overlay-bg"></div>
											<img class="img-fluid" src="<?php echo $arpost[$pImage]; ?>" alt="">
										</div>
										<?php if(!empty($arpost[$pTags])): ?>
										<ul class="tags">
										<?php foreach($ar->arUni($arpost[$pTags]) as $tag){  ?>
											
											<li><span><?php $ar->arTag($tag); ?></span></li>

										<?php } ?>
										</ul>
										<?php endif; ?>
									</div>
									<div class="col-lg-7 post-right">
										<a href="blog/<?php echo $arpost[$pUrl]; ?>">
											<h4><?php echo $arpost[$pTitle]; ?></h4>
										</a>
										<ul class="meta">
											<li><a href="#"><span class="lnr lnr-user"></span><?php echo $arpost[$pAuthor]; ?></li>
											<li><a href="#"><span class="lnr lnr-calendar-full"></span><?php echo $ar->arDate($arpost[$pDate], 0); ?></a>
											</li>
										</ul>
										<p class="excert">
											<?php echo $arpost[$pExcerpt]; ?>
										</p>
										<?php if(!empty($arpost[$pCategory])): ?>
										<ul class="cats">
											<?php foreach($ar->arUni($arpost[$pCategory]) as $category){  ?>
											<li><span><?php $ar->arCat($category); ?></span></li>
											
											<?php } ?>
										</ul>
										<?php endif; ?>
									</div>
								</div>
								<!-- Loop End -->
							<?php } ?>

							<!-- Pagination -->

							<div class="paging">
								<?php $ar->arpag(array(
									"enable" => true,
									"pagcontainer" => "ul",
									"pagcontainerid" => "",
									"pagcontainerclass" => "",
									"pagitemwrp" => "li",
									"pagitemclass" => "",
									"pagitemlinkclass" => "",
									"prebtnclass" => "first",
									"nxtbtnclass" => "last",
									"navbtnstyle" => 0
									
								)); ?>
								
							</div>

							<!-- End of pagination -->

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