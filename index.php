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
	<?php 
	
	include "./includes/topbar.php";
	include "./includes/header.php";
	include "./includes/nav.php";
	
	?>


   <div class="trending-light d-md-block d-lg-block d-none">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="trending-title">Trending Now</h3>
					<div id="trending-slide" class="owl-carousel owl-theme trending-slide">
					<?php 
                        $sql = 'SELECT * FROM `news_articles` WHERE image_url != "" ORDER BY publishedAt DESC LIMIT 5';
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                        ?>
						<div class="item">
						   <div class="post-content">
						      <h2 class="post-title title-small">
						         <a href="post-details.php?article_id=<?php echo $row['article_id']; ?>"><?php echo $row['title'] ?></a>
						      </h2>
						   </div><!-- Post content end -->
						</div><!-- Item end -->
						<?php } ?>
					</div><!-- Carousel end -->
				</div><!-- Col end -->
			</div><!--/ Row end -->
		</div><!--/ Container end -->
	</div><!--/ Trending end -->

	<section class="featured-post-area no-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12 pad-r">
					<div id="featured-slider" class="owl-carousel owl-theme featured-slider content-bottom">
					<?php 
                        $sql = 'SELECT * FROM news_articles WHERE image_url != "" ORDER BY RAND() LIMIT 4;';
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                        ?>
						<div class="item" style="background-image:url(<?php echo $row['image_url'] ?>)">
							<div class="featured-post">
						 		<div class="post-content">
						 			<a class="post-cat" href="#"><?php echo $row['category'] ?></a>
						 			<h2 class="post-title title-extra-large">
									 <a href="post-details.php?article_id=<?php echo $row['article_id']; ?>"><?php echo $row['title'] ?></a>
						 			</h2>
						 			<span class="post-date"><?php echo date(DATE_RFC1123, strtotime($row['publishedAt'])) ?></span>
						 		</div>
						 	</div><!--/ Featured post end -->
							
						</div><!-- Item 1 end -->
					<?php } ?>
					</div><!-- Featured owl carousel end-->
				</div><!-- Col 6 end -->

				<div class="col-lg-4 col-md-12 pad-l">
					<div class="row">
					<?php 
                        $sql = 'SELECT * FROM news_articles WHERE image_url != "" ORDER BY RAND() LIMIT 2;';
                        $result = mysqli_query($conn, $sql);
						$i=1;
                        while($row = mysqli_fetch_assoc($result)){
                        ?>
						<div class="col-md-12">
							<div class="post-overaly-style text-center <?php echo (($i == 1) ? 'first' : '')  ?> clearfix">
								<div class="post-thumb">
									<a href="#"><img class="img-fluid" src="<?php echo $row['image_url'] ?>" alt="" /></a>
								</div>
								<div class="post-content">
						 			<a class="post-cat" href="#"><?php echo $row['category'] ?></a>
						 			<h2 class="post-title title-medium">
									 <a href="post-details.php?article_id=<?php echo $row['article_id']; ?>"><?php echo $row['title'] ?></a>
						 			</h2>
					 			</div><!-- Post content end -->
							</div><!-- Post Overaly end -->
						</div><!-- Col end -->
						<?php $i++; } ?>
						<!-- <div class="col-md-12">
							<div class="post-overaly-style text-center clearfix">
								<div class="post-thumb">
									<a href="#"><img class="img-fluid" src="images/news/tech/game1.jpg" alt="" /></a>
								</div>
								<div class="post-content">
						 			<a class="post-cat" href="#">Games</a>
						 			<h2 class="post-title title-medium">
						 				<a href="#">Historical heroes and robot dinosaurs: New games...</a>
						 			</h2>
					 			</div>Post content end -->
							</div><!-- Post Overaly end -->
						</div><!-- Col end -->

					</div><!-- Row end -->
				</div><!-- Col 6 end -->

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- Feature area end -->

	<section class="block-wrapper">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 col-md-12">
					<div class="block color-dark-blue">
						<h3 class="block-title"><span>Travel</span></h3>
						<div class="post-overaly-style clearfix">
							<div class="post-thumb">
								<a href="#">
									<img class="img-fluid" src="images/news/lifestyle/travel1.jpg" alt="" />
								</a>
							</div>
							
							<div class="post-content">
					 			<h2 class="post-title">
					 				<a href="#">10 Hdrenaline fuelled activities that will chase the…</a>
					 			</h2>
					 			<div class="post-meta">
					 				<span class="post-date">Mar 03, 2017</span>
					 			</div>
				 			</div><!-- Post content end -->
							
						</div><!-- Post Overaly Article end -->

						<div class="list-post-block">
							<ul class="list-post">
								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-fluid" src="images/news/lifestyle/travel2.jpg" alt="" />
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href="#">Early tourists choices to the sea of Maldives in fancy dress…</a>
								 			</h2>
								 			<div class="post-meta">
								 				<span class="post-date">Mar 13, 2017</span>
								 			</div>
							 			</div><!-- Post content end -->
									</div><!-- Post block style end -->
								</li><!-- Li 1 end -->

							</ul><!-- List post end -->
						</div><!-- List post block end -->
					</div><!-- Block end -->
				</div><!-- Travel Col end -->

				<div class="col-lg-4 col-md-12">
					<div class="block color-aqua">
						<h3 class="block-title"><span>Gadgets</span></h3>
						<div class="post-overaly-style clearfix">
							<div class="post-thumb">
								<a href="#">
									<img class="img-fluid" src="images/news/tech/gadget1.jpg" alt="" />
								</a>
							</div>
							
							<div class="post-content">
					 			<h2 class="post-title">
					 				<a href="#">The best MacBook Pro alternatives in 2017 for Apple users</a>
					 			</h2>
					 			<div class="post-meta">
					 				<span class="post-date">Mar 03, 2017</span>
					 			</div>
				 			</div><!-- Post content end -->
						</div><!-- Post Overaly Article end -->

						<div class="list-post-block">
							<ul class="list-post">
								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-fluid" src="images/news/tech/gadget2.jpg" alt="" />
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href="#">Samsung Gear S3 review: A whimper, when smartwatches need...</a>
								 			</h2>
								 			<div class="post-meta">
								 				<span class="post-date">Jan 13, 2017</span>
								 			</div>
							 			</div><!-- Post content end -->
									</div><!-- Post block style end -->
								</li><!-- Li 1 end -->

								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-fluid" src="images/news/tech/gadget3.jpg" alt="" />
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href="#">Panasonic's new Sumix CH7 an ultra portable filmmaker's drea…</a>
								 			</h2>
								 			<div class="post-meta">
								 				<span class="post-date">Mar 11, 2017</span>
								 			</div>
							 			</div><!-- Post content end -->
									</div><!-- Post block style end -->
								</li><!-- Li 2 end -->

								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-fluid" src="images/news/tech/gadget4.jpg" alt="" />
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href="#">Soaring through Southern Patagonia with the Premium Byrd dro…</a>
								 			</h2>
								 			<div class="post-meta">
								 				<span class="post-date">Feb 19, 2017</span>
								 			</div>
							 			</div><!-- Post content end -->
									</div><!-- Post block style end -->
								</li><!-- Li 3 end -->
							</ul><!-- List post end -->
						</div><!-- List post block end -->
					</div><!-- Block end -->
				</div><!-- Gadget Col end -->

				<div class="col-lg-4 col-md-12">
					<div class="block color-violet">
						<h3 class="block-title"><span>Health</span></h3>
						<div class="post-overaly-style clearfix">
							<div class="post-thumb">
								<a href="#">
									<img class="img-fluid" src="images/news/lifestyle/health1.jpg" alt="" />
								</a>
							</div>
							
							<div class="post-content">
					 			<h2 class="post-title">
					 				<a href="#">That wearable on your wrist could soon track your health as …</a>
					 			</h2>
					 			<div class="post-meta">
					 				<span class="post-date">Mar 03, 2017</span>
					 			</div>
				 			</div><!-- Post content end -->
						</div><!-- Post Overaly Article end -->

						<div class="list-post-block">
							<ul class="list-post">
								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-fluid" src="images/news/lifestyle/health2.jpg" alt="" />
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href="#">Can't shed those Gym? The problem might be in your health</a>
								 			</h2>
								 			<div class="post-meta">
								 				<span class="post-date">Mar 13, 2017</span>
								 			</div>
							 			</div><!-- Post content end -->
									</div><!-- Post block style end -->
								</li><!-- Li 1 end -->

								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-fluid" src="images/news/lifestyle/health3.jpg" alt="" />
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href="#">Deleting fears from the brain means you might never need to …</a>
								 			</h2>
								 			<div class="post-meta">
								 				<span class="post-date">Jan 11, 2017</span>
								 			</div>
							 			</div><!-- Post content end -->
									</div><!-- Post block style end -->
								</li><!-- Li 2 end -->

								<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="#">
												<img class="img-fluid" src="images/news/lifestyle/health4.jpg" alt="" />
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href="#">Smart packs parking sensor tech and beeps when collisions</a>
								 			</h2>
								 			<div class="post-meta">
								 				<span class="post-date">Feb 19, 2017</span>
								 			</div>
							 			</div><!-- Post content end -->
									</div><!-- Post block style end -->
								</li><!-- Li 3 end -->
							</ul><!-- List post end -->
						</div><!-- List post block end -->
					</div><!-- Block end -->
				</div><!-- Health Col end -->

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- 1st block end -->

	<section class="block-wrapper solid-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-4 pad-r">
					<div class="post-overaly-style text-center first clearfix">
						<div class="post-thumb">
							<a href="#"><img class="img-fluid" src="images/news/tech/gadget2.jpg" alt="" /></a>
						</div>
						<div class="post-content">
				 			<a class="post-cat" href="#">Gadgets</a>
				 			<h2 class="post-title">
				 				<a href="#">Samsung Gear S3 review: A whimper, when…</a>
				 			</h2>
				 			<div class="post-meta">
							 	<span class="post-date">Feb 06, 2017</span>
							</div>
			 			</div><!-- Post content end -->
					</div><!-- Post Overaly end -->
				</div><!-- Col end -->

				<div class="col-md-4 pad-0">
					<div class="post-overaly-style text-center clearfix">
						<div class="post-thumb">
							<a href="#"><img class="img-fluid" src="images/news/lifestyle/health5.jpg" alt="" /></a>
						</div>
						<div class="post-content">
				 			<a class="post-cat" href="#">Health</a>
				 			<h2 class="post-title">
				 				<a href="#">Netcix cuts out the chill with an integrated personal...</a>
				 			</h2>
				 			<div class="post-meta">
							 	<span class="post-date">Feb 06, 2017</span>
							</div>
			 			</div><!-- Post content end -->
					</div><!-- Post Overaly end -->
				</div><!-- Col end -->

				<div class="col-md-4 pad-l">
					<div class="post-overaly-style text-center clearfix">
						<div class="post-thumb">
							<a href="#"><img class="img-fluid" src="images/news/tech/game1.jpg" alt="" /></a>
						</div>
						<div class="post-content">
				 			<a class="post-cat" href="#">Games</a>
				 			<h2 class="post-title">
				 				<a href="#">Historical heroes and robot dinosaurs: New games...</a>
				 			</h2>
				 			<div class="post-meta">
							 	<span class="post-date">Feb 06, 2017</span>
							</div>
			 			</div><!-- Post content end -->
					</div><!-- Post Overaly end -->
				</div><!-- Col end -->

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- Section solid end -->

	<section class="block-wrapper p-bottom-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="more-news block color-default">
						<h3 class="block-title"><span>More News</span></h3>

						<div id="more-news-slide" class="owl-carousel owl-theme more-news-slide">
							<div class="item">
								<div class="post-block-style post-float-half clearfix">
									<div class="post-thumb">
										<a href="#">
											<img class="img-fluid" src="images/news/video/video1.jpg" alt="" />
										</a>
									</div>
									<a class="post-cat" href="#">Video</a>
									<div class="post-content">
							 			<h2 class="post-title">
							 				<a href="#">KJerry's will sell food cream that tastes like your favorite video</a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-author"><a href="#">John Doe</a></span>
							 				<span class="post-date">Mar 29, 2017</span>
							 			</div>
							 			<p>Lumbersexual meh sustainable Thundercats meditation kogi. Tilde Pitchfork vegan, gentrify minim elit semiotics non messenger bag Austin which roasted ...</p>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style 1 end -->

								<div class="gap-30"></div>

								<div class="post-block-style post-float-half clearfix">
									<div class="post-thumb">
										<a href="#">
											<img class="img-fluid" src="images/news/tech/game5.jpg" alt="" />
										</a>
									</div>
									<a class="post-cat" href="#">Games</a>
									<div class="post-content">
							 			<h2 class="post-title">
							 				<a href="#">Oazer and Lacon bring eSport expertise to new PS4 controllers</a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-author"><a href="#">John Doe</a></span>
							 				<span class="post-date">Mar 27, 2017</span>
							 			</div>
							 			<p>Pityful a rethoric question ran over her cheek When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of he...</p>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style 2 end -->

								<div class="gap-30"></div>

								<div class="post-block-style post-float-half clearfix">
									<div class="post-thumb">
										<a href="#">
											<img class="img-fluid" src="images/news/tech/game4.jpg" alt="" />
										</a>
									</div>
									<a class="post-cat" href="#">Games</a>
									<div class="post-content">
							 			<h2 class="post-title">
							 				<a href="#">Super Tario Run isn’t groundbreaking, but it has Mintendo charm</a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-author"><a href="#">John Doe</a></span>
							 				<span class="post-date">Feb 24, 2017</span>
							 			</div>
							 			<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and ...</p>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style 3 end -->

								<div class="gap-30"></div>

								<div class="post-block-style post-float-half clearfix">
									<div class="post-thumb">
										<a href="#">
											<img class="img-fluid" src="images/news/tech/robot5.jpg" alt="" />
										</a>
									</div>
									<a class="post-cat" href="#">Robotics</a>
									<div class="post-content">
							 			<h2 class="post-title">
							 				<a href="#">Robots in hospitals can be quite handy to navigate around the ho…</a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-author"><a href="#">John Doe</a></span>
							 				<span class="post-date">Feb 24, 2017</span>
							 			</div>
							 			<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and ...</p>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style 4 end -->
							</div><!-- Item 1 end -->

							<div class="item">
								<div class="post-block-style post-float-half clearfix">
									<div class="post-thumb">
										<a href="#">
											<img class="img-fluid" src="images/news/video/video2.jpg" alt="" />
										</a>
									</div>
									<a class="post-cat" href="#">Video</a>
									<div class="post-content">
							 			<h2 class="post-title">
							 				<a href="#">TG G6 will have dual 13-megapixel cameras on the back</a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-author"><a href="#">John Doe</a></span>
							 				<span class="post-date">Mar 29, 2017</span>
							 			</div>
							 			<p>Lumbersexual meh sustainable Thundercats meditation kogi. Tilde Pitchfork vegan, gentrify minim elit semiotics non messenger bag Austin which roasted ...</p>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style 5 end -->

								<div class="gap-30"></div>

								<div class="post-block-style post-float-half clearfix">
									<div class="post-thumb">
										<a href="#">
											<img class="img-fluid" src="images/news/video/video3.jpg" alt="" />
										</a>
									</div>
									<a class="post-cat" href="#">Video</a>
									<div class="post-content">
							 			<h2 class="post-title">
							 				<a href="#">Breeze through 17 locations in Europe in this breathtaking v…</a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-author"><a href="#">John Doe</a></span>
							 				<span class="post-date">Mar 31, 2017</span>
							 			</div>
							 			<p>Pityful a rethoric question ran over her cheek When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of he...</p>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style 6 end -->

								<div class="gap-30"></div>

								<div class="post-block-style post-float-half clearfix">
									<div class="post-thumb">
										<a href="#">
											<img class="img-fluid" src="images/news/lifestyle/architecture1.jpg" alt="" />
										</a>
									</div>
									<a class="post-cat" href="#">Architecture</a>
									<div class="post-content">
							 			<h2 class="post-title">
							 				<a href="#">Science meets architecture in robotically woven, solar...</a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-author"><a href="#">John Doe</a></span>
							 				<span class="post-date">Mar 23, 2017</span>
							 			</div>
							 			<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and ...</p>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style 7 end -->

								<div class="gap-30"></div>

								<div class="post-block-style post-float-half clearfix">
									<div class="post-thumb">
										<a href="#">
											<img class="img-fluid" src="images/news/tech/game1.jpg" alt="" />
										</a>
									</div>
									<a class="post-cat" href="#">Robotics</a>
									<div class="post-content">
							 			<h2 class="post-title">
							 				<a href="#">Historical heroes and robot dinosaurs: New games on our…</a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-author"><a href="#">John Doe</a></span>
							 				<span class="post-date">Feb 24, 2017</span>
							 			</div>
							 			<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and ...</p>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style 8 end -->
							</div><!-- Item 2 end -->
							
						</div><!-- More news carousel end -->
					</div><!--More news block end -->
				</div><!-- Content Col end -->

				<div class="col-lg-4 col-md-12">
					<div class="sidebar sidebar-right">

						<div class="widget color-default">
							<h3 class="block-title"><span>Popular News</span></h3>

							<div class="post-overaly-style clearfix">
								<div class="post-thumb">
									<a href="#">
										<img class="img-fluid" src="images/news/lifestyle/health4.jpg" alt="" />
									</a>
								</div>
								
								<div class="post-content">
						 			<a class="post-cat" href="#">Health</a>
						 			<h2 class="post-title">
						 				<a href="#">Smart packs parking sensor tech and beeps when col…</a>
						 			</h2>
						 			<div class="post-meta">
						 				<span class="post-date">Feb 06, 2017</span>
						 			</div>
					 			</div><!-- Post content end -->
							</div><!-- Post Overaly Article end -->


							<div class="list-post-block">
								<ul class="list-post">
									<li class="clearfix">
										<div class="post-block-style post-float clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-fluid" src="images/news/tech/gadget3.jpg" alt="" />
												</a>
												<a class="post-cat" href="#">Gadgets</a>
											</div><!-- Post thumb end -->

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a href="#">Panasonic's new Sumix CH7 an ultra portable filmmaker's drea…</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-date">Mar 13, 2017</span>
									 			</div>
								 			</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 1 end -->

									<li class="clearfix">
										<div class="post-block-style post-float clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-fluid" src="images/news/lifestyle/travel5.jpg" alt="" />
												</a>
												<a class="post-cat" href="#">Travel</a>
											</div><!-- Post thumb end -->

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a href="#">Hynopedia helps female travelers find health care...</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-date">Jan 11, 2017</span>
									 			</div>
								 			</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 2 end -->

									<li class="clearfix">
										<div class="post-block-style post-float clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-fluid" src="images/news/tech/robot5.jpg" alt="" />
												</a>
												<a class="post-cat" href="#">Robotics</a>
											</div><!-- Post thumb end -->

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a href="#">Robots in hospitals can be quite handy to navigate around...</a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-date">Feb 19, 2017</span>
									 			</div>
								 			</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 3 end -->

								</ul><!-- List post end -->
							</div><!-- List post block end -->

						</div><!-- Popular news widget end -->

						<div class="widget m-bottom-0">
							<h3 class="block-title"><span>Newsletter</span></h3>
							<div class="ts-newsletter">
								<div class="newsletter-introtext">
									<h4>Get Updates</h4>
									<p>Subscribe our newsletter to get the best stories into your inbox!</p>
								</div>

								<div class="newsletter-form">
									<form action="#" method="post">
										<div class="form-group">
											<input type="email" name="email" id="newsletter-form-email" class="form-control form-control-lg" placeholder="E-mail" autocomplete="off">
											<button class="btn btn-primary">Subscribe</button>
										</div>
									</form>
								</div>
							</div><!-- Newsletter end -->
						</div><!-- Newsletter widget end -->
					</div><!--Sidebar right end -->
				</div><!-- Sidebar col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- 3rd block end -->

	<section class="ad-content-area text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<img class="img-fluid" src="images/banner-ads/ad-content-two.png" alt="" />
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- Ad content two end -->

	<footer id="footer" class="footer">
         <div class="footer-main">
            <div class="container">
               <div class="row">
                  <div class="col-lg-3 col-sm-12 footer-widget">
                     <h3 class="widget-title">Trending Now</h3>
                     <div class="list-post-block">
                        <ul class="list-post">
                           <li class="clearfix">
                              <div class="post-block-style post-float clearfix">
                                 <div class="post-thumb">
                                    <a href="#">
                                       <img class="img-fluid" src="images/news/lifestyle/health2.jpg" alt="" />
                                    </a>
                                 </div><!-- Post thumb end -->
   
                                 <div class="post-content">
                                     <h2 class="post-title title-small">
                                        <a href="#">Can't shed those Gym? The problem might...</a>
                                     </h2>
                                     <div class="post-meta">
                                        <span class="post-date">Mar 13, 2017</span>
                                     </div>
                                  </div><!-- Post content end -->
                              </div><!-- Post block style end -->
                           </li><!-- Li 1 end -->
   
                           <li class="clearfix">
                              <div class="post-block-style post-float clearfix">
                                 <div class="post-thumb">
                                    <a href="#">
                                       <img class="img-fluid" src="images/news/lifestyle/health3.jpg" alt="" />
                                    </a>
                                 </div><!-- Post thumb end -->
   
                                 <div class="post-content">
                                     <h2 class="post-title title-small">
                                        <a href="#">Deleting fears from the brain means you…</a>
                                     </h2>
                                     <div class="post-meta">
                                        <span class="post-date">Jan 11, 2017</span>
                                     </div>
                                  </div><!-- Post content end -->
                              </div><!-- Post block style end -->
                           </li><!-- Li 2 end -->
   
                           <li class="clearfix">
                              <div class="post-block-style post-float clearfix">
                                 <div class="post-thumb">
                                    <a href="#">
                                       <img class="img-fluid" src="images/news/lifestyle/health4.jpg" alt="" />
                                    </a>
                                 </div><!-- Post thumb end -->
   
                                 <div class="post-content">
                                     <h2 class="post-title title-small">
                                        <a href="#">Smart packs parking sensor tech...</a>
                                     </h2>
                                     <div class="post-meta">
                                        <span class="post-date">Feb 19, 2017</span>
                                     </div>
                                  </div><!-- Post content end -->
                              </div><!-- Post block style end -->
                           </li><!-- Li 3 end -->
                        </ul><!-- List post end -->
                     </div><!-- List post block end -->
                     
                  </div><!-- Col end -->
   
                  <div class="col-lg-3 col-sm-12 footer-widget widget-categories">
                     <h3 class="widget-title">Hot Categories</h3>
                     <ul>
                        <li>
                           <a href="#"><span class="catTitle">Robotics</span><span class="catCounter"> (5)</span></a>
                        </li>
                        <li>
                           <a href="#"><span class="catTitle">Games</span><span class="catCounter"> (6)</span></a>
                        </li>
                        <li>
                           <a href="#"><span class="catTitle">Gadgets</span><span class="catCounter"> (5)</span></a>
                        </li>
                        <li>
                           <a href="#"><span class="catTitle">Travel</span><span class="catCounter"> (5)</span></a>
                        </li>
                        <li>
                           <a href="#"><span class="catTitle">Health</span><span class="catCounter"> (5)</span></a>
                        </li>
                        <li>
                           <a href="#"><span class="catTitle">Architecture</span><span class="catCounter"> (5)</span></a>
                        </li>
                        <li>
                           <a href="#"><span class="catTitle">Food</span><span class="catCounter"> (5)</span></a>
                        </li>
                     </ul>
                     
                  </div><!-- Col end -->
   
                  <div class="col-lg-3 col-sm-12 footer-widget twitter-widget">
                     <h3 class="widget-title">Latest Tweets</h3>
                     <ul>
                        <li>
                           <div class="tweet-text">
                           <span>About 13 days ago</span>
                           Please, Wait for the next version of our templates to update #Joomla 3.7 
                           <a href="#">https://t.co/LlEv8HgokN</a>
                           </div>
                        </li>
                        <li>
                           <div class="tweet-text">
                           <span>About 15 days ago</span>
                           #WordPress 4.8 is here!
                           <a href="#">https://t.co/uDjRH4Gya9</a>
                           </div>
                        </li>
                        <li>
                           <div class="tweet-text">
                           <span>About 1 month ago</span>
                           Please, Wait for the next version of our templates to update #Joomla 3.7 
                           <a href="#">https://t.co/LlEv8HgokN</a>
                           </div>
                        </li>
                     </ul>
                  </div><!-- Col end -->
   
                  <div class="col-lg-3 col-sm-12 footer-widget">
                     <h3 class="widget-title">Post Gallery</h3>
                     <div class="gallery-widget">
                        <a href="#"><img class="img-fluid" src="images/news/lifestyle/health1.jpg" alt="" /></a>
                        <a href="#"><img class="img-fluid" src="images/news/lifestyle/food3.jpg" alt="" /></a>
                        <a href="#"><img class="img-fluid" src="images/news/lifestyle/travel4.jpg" alt="" /></a>
                        <a href="#"><img class="img-fluid" src="images/news/lifestyle/architecture1.jpg" alt="" /></a>
                        <a href="#"><img class="img-fluid" src="images/news/tech/gadget1.jpg" alt="" /></a>
                        <a href="#"><img class="img-fluid" src="images/news/tech/gadget2.jpg" alt="" /></a>
                        <a href="#"><img class="img-fluid" src="images/news/tech/game2.jpg" alt="" /></a>
                        <a href="#"><img class="img-fluid" src="images/news/tech/robot5.jpg" alt="" /></a>
                        <a href="#"><img class="img-fluid" src="images/news/lifestyle/travel5.jpg" alt="" /></a>
                     </div>
                  </div><!-- Col end -->
   
               </div><!-- Row end -->
            </div><!-- Container end -->
         </div><!-- Footer main end -->
   
         <div class="footer-info text-center">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="footer-info-content">
                        <div class="footer-logo">
                           <img class="img-fluid" src="images/logos/footer-logo.png" alt="" />
                        </div>
                        <p>News247 Worldwide is a popular online newsportal and going source for technical and digital content for its influential audience around the globe. You can reach us via email or phone.</p>
                        <p class="footer-info-phone"><i class="fa fa-phone"></i> +(785) 238-4131</p>
                        <p class="footer-info-email"><i class="fa fa-envelope-o"></i> <a href="https://demo.themewinter.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e1848588958e93a18f849692d3d5d6cf828e8c">[email&#160;protected]</a></p>
                        <ul class="unstyled footer-social">
                           <li>
                              <a title="Rss" href="#">
                                 <span class="social-icon"><i class="fa fa-rss"></i></span>
                              </a>
                              <a title="Facebook" href="#">
                                 <span class="social-icon"><i class="fa fa-facebook"></i></span>
                              </a>
                              <a title="Twitter" href="#">
                                 <span class="social-icon"><i class="fa fa-twitter"></i></span>
                              </a>
                              <a title="Google+" href="#">
                                 <span class="social-icon"><i class="fa fa-google-plus"></i></span>
                              </a>
                              <a title="Linkdin" href="#">
                                 <span class="social-icon"><i class="fa fa-linkedin"></i></span>
                              </a>
                              <a title="Skype" href="#">
                                 <span class="social-icon"><i class="fa fa-skype"></i></span>
                              </a>
                              <a title="Skype" href="#">
                                 <span class="social-icon"><i class="fa fa-dribbble"></i></span>
                              </a>
                              <a title="Skype" href="#">
                                 <span class="social-icon"><i class="fa fa-pinterest"></i></span>
                              </a>
                              <a title="Skype" href="#">
                                 <span class="social-icon"><i class="fa fa-instagram"></i></span>
                              </a>
                           </li>
                        </ul>
                     </div><!-- Footer info content end -->
                  </div><!-- Col end -->
               </div><!-- Row end -->
            </div><!-- Container end -->
         </div><!-- Footer info end -->
   
   </footer><!-- Footer end -->
   
      <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12 col-md-6">
                     <div class="copyright-info">
                        <span>Copyright © 2017 News247 All Rights Reserved. Designed By Tripples</span>
                     </div>
                  </div>
   
                  <div class="col-sm-12 col-md-6">
                     <div class="footer-menu">
                        <ul class="nav unstyled">
                           <li><a href="#">Site Terms</a></li>
                           <li><a href="#">Privacy</a></li>
                           <li><a href="#">Advertisement</a></li>
                           <li><a href="#">Cookies Policy</a></li>
                           <li><a href="#">Contact Us</a></li>
                        </ul>
                     </div>
                  </div>
               </div><!-- Row end -->
   
               <div id="back-to-top" class="back-to-top">
                  <button class="btn btn-primary" title="Back to Top">
                     <i class="fa fa-angle-up"></i>
                  </button>
               </div>
   
            </div><!-- Container end -->
      </div><!-- Copyright end -->


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