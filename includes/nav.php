<div class="main-nav clearfix">
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-expand-lg col">
					<div class="site-nav-inner float-left">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <!-- End of Navbar toggler -->

						<div id="navbarSupportedContent" class="collapse navbar-collapse navbar-responsive-collapse">
							<ul class="nav navbar-nav">
								<li class="nav-item dropdown">
									<a href="index.php" class="nav-link">Home </a>
								</li>
                                <li>
									<a href="latest-updates.php">Latest News</a>
								</li>
								<li class="nav-item dropdown mega-dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
       								role="button" aria-haspopup="true" aria-expanded="false">Categories <i class="fa fa-angle-down"></i></a>
                                       <ul class="dropdown-menu" role="menu">
                                        <?php 
                                        $sql_cat = 'SELECT DISTINCT(category) FROM `news_articles` ORDER BY `category`';
                                        $rec = mysqli_query($conn, $sql_cat);
                                        while($catrow = mysqli_fetch_assoc($rec)){                                        
                                        ?>
										<li><a href="category-list.php?category=<?php echo $catrow['category'] ?>"><?php echo ucfirst($catrow['category']) ?></a></li>
                                        <?php } ?>
									</ul>
								</li><!-- Tab menu end -->

								<li>
									<a href="about.php">About</a>
								</li>

                                <li>
									<a href="contact.php">Contact</a>
								</li>
							</ul><!--/ Nav ul end -->
						</div><!--/ Collapse end -->

					</div><!-- Site Navbar inner end -->
				</nav><!--/ Navigation end -->

				<div class="nav-search">
					<span id="search"><i class="fa fa-search"></i></span>
				</div><!-- Search end -->
				
				<div class="search-block" style="display: none;">
					<input type="text" class="form-control" placeholder="Type what you want and enter">
					<span class="search-close">&times;</span>
				</div><!-- Site search end -->

			</div><!--/ Row end -->
		</div><!--/ Container end -->

	</div><!-- Menu wrapper end -->