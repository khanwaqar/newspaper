<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.themewinter.com/html/news247-bs4/category-style1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Oct 2023 07:37:50 GMT -->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>News247 - News Magazine Newspaper HTML Template</title>

	<!-- Mobile Specific Metas
	================================================== -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<!--Favicon-->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	
	<!-- CSS
	================================================== -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Template styles-->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive styles-->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Colorbox -->
	<link rel="stylesheet" href="css/colorbox.css">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
	
<body>

	<div class="body-inner">

	<!-- <div class="preload"></div> -->
	<?php 
	include("./connection/connection.php");
	include("./scripts/function.php");
	include "./includes/trending.php";
	include "./includes/topbar.php";
	include "./includes/header.php";
	include "./includes/nav.php";
	?>

	<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<ol class="breadcrumb">
     					<li><a href="#">Home</a></li>
     					<li>Latest News</li>
     				</ol>
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</div><!-- Page title end -->

	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">

					<div class="block category-listing">
						<h3 class="block-title"><span>Latest News</span></h3>

						<div class="row">

						<?php 
							$sql = "SELECT * FROM news_articles WHERE `image_url` != '' ORDER BY `publishedAt` DESC LIMIT 16;";
							$result = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_assoc($result)) {
							?>
							<div class="col-md-6">
								<div class="post-block-style post-grid clearfix">
									<div class="post-thumb">
										<a href="post-details.php?article_id=<?php echo $row['article_id']; ?>">
											<img class="img-fluid" src="<?php echo $row['image_url'] ?>" alt="" />
										</a>
									</div>
									<a class="post-cat" href="#"><?php echo $row['category'] ?></a>
									<div class="post-content">
							 			<h2 class="post-title title-large">
							 				<a href="post-details.php?article_id=<?php echo $row['article_id']; ?>"><?php echo $row['title'] ?></a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-author"><a href="#"><?php echo $row['source'] ?></a></span>
							 				<span class="post-date"><?php echo date(DATE_RFC1123, strtotime($row['publishedAt'])) ?></span>
											<a href="#" class="comments-link"><span><?php echo $row['country'] ?></span></a></span>
							 			</div>
							 			<p><?php echo limit_text($row['description'], 30) ?></p>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style end -->
							</div><!-- Col 1 end -->
							<?php } ?>


						</div><!-- Row end -->
					</div><!-- Block Lifestyle end -->

					<div class="paging">
		            <ul class="pagination">
		              <li class="active"><a href="#">1</a></li>
		              <li><a href="#">2</a></li>
		              <li><a href="#">3</a></li>
		              <li><a href="#">4</a></li>
		              <li><a href="#">»</a></li>
		              <li>
		              	<span class="page-numbers">Page 1 of 2</span>
		              </li>
		            </ul>
	          	</div><!-- Paging end -->


				</div><!-- Content Col end -->

				<?php include "./includes/sidebar.php" ?>

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end -->


	<?php include "./includes/footer.php" ?>


	<!-- Javascript Files
	================================================== -->

	<!-- initialize jQuery Library -->
	<script data-cfasync="false" src="https://demo.themewinter.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="js/jquery.js"></script>
	<!-- Bootstrap jQuery -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- Owl Carousel -->
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<!-- Color box -->
	<script type="text/javascript" src="js/jquery.colorbox.js"></script>
	<!-- Smoothscroll -->
	<script type="text/javascript" src="js/smoothscroll.js"></script>

	<!-- Template custom -->
	<script type="text/javascript" src="js/custom.js"></script>
	
	</div><!-- Body inner end -->
</body>

<!-- Mirrored from demo.themewinter.com/html/news247-bs4/category-style1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Oct 2023 07:37:50 GMT -->
</html>