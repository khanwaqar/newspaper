<!DOCTYPE html>
<html lang="en">
<?php 
include("./connection/connection.php");
$post_id = $_GET['article_id'];

if(empty($_GET['article_id'])){
    header("Location: 404.php");
}
$ideas_sql = "SELECT * FROM news_articles WHERE article_id = '$post_id';";
$query = mysqli_query($conn, $ideas_sql);
$record = mysqli_fetch_assoc($query);

?>
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>News247 - News Magazine Newspaper HTML Template</title>

	<!-- Mobile Specific Metas
	================================================== -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="title" content="<?php echo $record['title']; ?>">
	<meta name="description" content="<?php echo $record['description'] ?>">
	<meta name="keywords" content="<?php echo $record['keywords'] ?>">

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
	include "./includes/trending.php";
	include "./includes/topbar.php";
	include "./includes/header.php";
	include "./includes/nav.php";
	?>

	<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
     					<li><a href="#">Home</a></li>
     					<li><?php echo ucfirst($record['$category']) ?></li>
     				</ol>
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</div><!-- Page title end -->

	<section class="block-wrapper no-sidebar">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
					<div class="single-post">
						
						<div class="post-title-area">
							<a class="post-cat" href="#"><?php echo $record['category'] ?></a>
							<h2 class="post-title">
				 				<?php echo $record['title'] ?>
				 			</h2>
				 			<div class="post-meta">
								<span class="post-author">
									By <a href="#"><?php echo ucfirst($record['source']) ?></a>
								</span>
								<span class="post-date"><i class="fa fa-clock-o"></i> <?php echo date(DATE_RFC1123, strtotime($record['publishedAt'])) ?></span>
								<span class="post-hits"><i class="fa fa-eye"></i> 21</span>
								<span class="post-comment"><i class="fa fa-globe"></i>
								<a href="#" class="comments-link"><span><?php echo ucfirst($record['country']) ?></span></a></span>
							</div>
						</div><!-- Post title end -->

						<div class="post-content-area">
							<div class="post-media post-featured-image">
								<img src="<?php echo $record['image_url'] ?>" class="img-fluid" alt="">
							</div>
							<div class="entry-content">
								<?php echo $record['content'] ?>

							</div><!-- Entery content end -->

							<div class="tags-area clearfix">
								<div class="post-tags">
									<span>Tags:</span>
		   							<?php if(!empty($record['keywords'])) {
										$keywords = explode(",", $record['keywords']);
										foreach($keywords as $keyword){
									?>
										<a href="#">#<?php echo $keyword ?></a>
									<?php }} ?>
									
	   						</div>
							</div><!-- Tags end -->

							<div class="share-items clearfix">
   							<ul class="post-social-icons unstyled">
   								<li class="facebook">
   									<a href="#">
   									<i class="fa fa-facebook"></i> <span class="ts-social-title">Facebook</span></a>
   								</li>
   								<li class="twitter">
   									<a href="#">
   									<i class="fa fa-twitter"></i> <span class="ts-social-title">Twitter</span></a>
   								</li>
   								<li class="gplus">
   									<a href="#">
   									<i class="fa fa-google-plus"></i> <span class="ts-social-title">Google +</span></a>
   								</li>
   								<li class="pinterest">
   									<a href="#">
   									<i class="fa fa-pinterest"></i> <span class="ts-social-title">Pinterest</span></a>
   								</li>
   							</ul>
   						</div><!-- Share items end -->

						</div><!-- post-content end -->
					</div><!-- Single post end -->
					<?php 
					$sql = "(select *from news_articles WHERE id > ".$record['id']." ORDER BY Id ASC LIMIT 1) UNION (select *from news_articles WHERE id < ".$record['id']." ORDER BY Id DESC LIMIT 1);";
					$resp = mysqli_query($conn, $sql);
					$res[] = mysqli_fetch_assoc($resp);
					$res[] = mysqli_fetch_assoc($resp);

					?>
					<nav class="post-navigation clearfix">
						<div class="post-previous">
							<a href="post-details.php?article_id=<?php echo $res[1]['article_id']; ?>">
								<span><i class="fa fa-angle-left"></i>Previous Post</span>
								<h3>
									<?php echo $res[1]['title'] ?>
								</h3>
							</a>
						</div>
						<div class="post-next">
							<a href="post-details.php?article_id=<?php echo $res[0]['article_id']; ?>">
									<span>Next Post <i class="fa fa-angle-right"></i></span>
								<h3>
									<?php echo $res[0]['title'] ?>
								</h3>
							</a>
						</div>       
					</nav><!-- Post navigation end -->

					<div class="author-box">
						<div class="author-img pull-left">
							<img src="images/news/author.png" alt="">
						</div>
						<div class="author-info">
							<h3>Elina Themen</h3>
							<p class="author-url"><a href="#">http://www.newsdaily247.com</a></p>
							<p>Selfies labore, leggings cupidatat sunt taxidermy umami fanny pack typewriter hoodie art party voluptate. Listicle meditation paleo, drinking vinegar sint direct trade.</p>
							<div class="authors-social">
                        <span>Follow Me: </span>
                        <a href="#"><i class="fa fa-behance"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                    </div>
						</div>
					</div> <!-- Author box end -->

					<div class="related-posts block">
						<h3 class="block-title"><span>Related Posts</span></h3>

						<div id="latest-news-slide" class="owl-carousel owl-theme latest-news-slide">
							<div class="item">
								<div class="post-block-style clearfix">
									<div class="post-thumb">
										<a href="#"><img class="img-fluid" src="images/news/lifestyle/travel5.jpg" alt="" /></a>
									</div>
									<a class="post-cat" href="#">Health</a>
									<div class="post-content">
							 			<h2 class="post-title title-medium">
							 				<a href="#">Hynopedia helps female travelers find health care in Maldivs</a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-author"><a href="#">John Doe</a></span>
							 				<span class="post-date">Feb 19, 2017</span>
							 			</div>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style end -->
							</div><!-- Item 1 end -->

							<div class="item">
								<div class="post-block-style clearfix">
									<div class="post-thumb">
										<a href="#"><img class="img-fluid" src="images/news/lifestyle/health5.jpg" alt="" /></a>
									</div>
									<a class="post-cat" href="#">Health</a>
									<div class="post-content">
							 			<h2 class="post-title title-medium">
							 				<a href="#">Netcix cuts out the chill with an integrated...</a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-author"><a href="#">John Doe</a></span>
							 				<span class="post-date">Feb 19, 2017</span>
							 			</div>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style end -->
							</div><!-- Item 2 end -->

							<div class="item">
								<div class="post-block-style clearfix">
									<div class="post-thumb">
										<a href="#"><img class="img-fluid" src="images/news/lifestyle/travel3.jpg" alt="" /></a>
									</div>
									<a class="post-cat" href="#">Travel</a>
									<div class="post-content">
							 			<h2 class="post-title title-medium">
							 				<a href="#">This Aeroplane that looks like a butt is the largest aircraft in the world</a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-author"><a href="#">John Doe</a></span>
							 				<span class="post-date">Feb 19, 2017</span>
							 			</div>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style end -->
							</div><!-- Item 3 end -->

							<div class="item">
								<div class="post-block-style clearfix">
									<div class="post-thumb">
										<a href="#"><img class="img-fluid" src="images/news/lifestyle/travel4.jpg" alt="" /></a>
									</div>
									<a class="post-cat" href="#">Travel</a>
									<div class="post-content">
							 			<h2 class="post-title title-medium">
							 				<a href="#">19 incredible photos from Disney's 'Star Wars' cruise algore</a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-author"><a href="#">John Doe</a></span>
							 				<span class="post-date">Feb 19, 2017</span>
							 			</div>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style end -->
							</div><!-- Item 4 end -->
						</div><!-- Carousel end -->

					</div><!-- Related posts end -->

					<!-- Post comment start -->
					<div id="comments" class="comments-area block">
						<h3 class="block-title"><span>03 Comments</span></h3>

						<ul class="comments-list">
							<li>
								<div class="comment">
									<img class="comment-avatar pull-left" alt="" src="images/news/user1.png">
									<div class="comment-body">
										<div class="meta-data">
											<span class="comment-author">Michelle Aimber</span>
											<span class="comment-date pull-right">January 17, 2017 at 1:38 pm</span>
										</div>
										<div class="comment-content">
										<p>High Life tempor retro Truffaut. Tofu mixtape twee, assumenda quinoa flexitarian aesthetic artisan vinyl pug. Chambray et Carles Thundercats cardigan actually, magna bicycle rights.</p></div>
										<div class="text-left">
											<a class="comment-reply" href="#">Reply</a>
										</div>	
									</div>
								</div><!-- Comments end -->

								<ul class="comments-reply">
									<li>
										<div class="comment">
											<img class="comment-avatar pull-left" alt="" src="images/news/user2.png">
											<div class="comment-body">
												<div class="meta-data">
													<span class="comment-author">Genelia Dusteen</span>
													<span class="comment-date pull-right">January 17, 2017 at 1:38 pm</span>
												</div>
												<div class="comment-content">
												<p>Farm-to-table selfies labore, leggings cupidatat sunt taxidermy umami fanny pack typewriter hoodie art party voluptate cardigan banjo.</p></div>
												<div class="text-left">
													<a class="comment-reply" href="#">Reply</a>
												</div>	
											</div>
										</div><!-- Comments end -->
									</li>
								</ul><!-- comments-reply end -->
									<div class="comment last">
										<img class="comment-avatar pull-left" alt="" src="images/news/user1.png">
										<div class="comment-body">
											<div class="meta-data">
												<span class="comment-author">Michelle Aimber</span>
												<span class="comment-date pull-right">January 17, 2017 at 1:38 pm</span>
											</div>
											<div class="comment-content">
											<p>VHS Wes Anderson Banksy food truck vero. Farm-to-table selfies labore, leggings cupidatat sunt taxidermy umami fanny pack typewriter hoodie art party voluptate cardigan banjo.</p></div>
											<div class="text-left">
												<a class="comment-reply" href="#">Reply</a>
											</div>	
										</div>
									</div><!-- Comments end -->
							</li><!-- Comments-list li end -->
						</ul><!-- Comments-list ul end -->
					</div><!-- Post comment end -->

					<div class="comments-form">
						<h3 class="title-normal">Leave a comment</h3>

						<form role="form">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control required-field" id="message" placeholder="Your Comment" rows="10" required></textarea>
									</div>
								</div><!-- Col end -->

								<div class="col-md-12">
									<div class="form-group">
										<input class="form-control" name="name" id="name" placeholder="Your Name" type="text" required>
									</div>
								</div><!-- Col end -->

								<div class="col-md-12">
									<div class="form-group">
										<input class="form-control" name="email" id="email" placeholder="Your Email" type="email" required>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<input class="form-control" placeholder="Your Website" type="text" required>
									</div>
								</div>
							</div><!-- Form row end -->
							<div class="clearfix">
								<button class="comments-btn btn btn-primary" type="submit">Post Comment</button> 
							</div>
						</form><!-- Form end -->
					</div><!-- Comments form end -->

				</div><!-- Content Col end -->

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