<!DOCTYPE html>
<html lang="en">
<?php include "./connection/connection.php" ?>

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

	<?php include "./includes/trending.php" ?>

	<?php include "./includes/topbar.php" ?>

	<!-- Header start -->
	<?php include "./includes/header.php" ?>

	<?php include "./includes/nav.php" ?>

	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				
				<div class="error-page text-center col">
					<div class="error-code">
						<h2><strong>404</strong></h2>
					</div>
					<div class="error-message">
						<h3>Oops... Page Not Found!</h3>
					</div>
					<div class="error-body">
						Try using the button below to go to main page of the site <br>
						<a href="index.php" class="btn btn-primary">Back to Home Page</a>
					</div>
				</div>

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
</html>