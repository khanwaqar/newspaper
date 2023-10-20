<div class="trending-bar d-md-block d-lg-block d-none">
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
						         <a href="post_detail.php?article_id=<?php echo $row['article_id']; ?>"><?php echo $row['title'] ?></a>
						      </h2>
						   </div><!-- Post content end -->
						</div><!-- Item end -->
						<?php } ?>
					</div><!-- Carousel end -->
				</div><!-- Col end -->
			</div><!--/ Row end -->
		</div><!--/ Container end -->
    </div><!--/ Trending end -->