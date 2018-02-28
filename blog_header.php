<div id="header" class="clearfix">
				<div class="wrapper">
					<h1 class="logo">Al-Wahdah</h1>
					<ul class="menu">
						<?php
							$home = ($file == 'index') ? "class='active'" : '';
							$post = ($file == 'post') ? "class='active'" : '';
						?>
						<li <?= $home ?>><a href="index.php">HOME</a></li>
						<li><a href="#">ABOUT</a></li>
						<li <?= $post ?>><a href="#">ARCHIVE</a></li>
						<li><a href="#">CONTACT</a></li>
						<li id="search">
							<label>
								<div class="search">
									<form action="search.php" method="post">
										<input type="text" name="search" placeholder="search...">
										<button type="submit">
											<i class="fa fa-arrow-circle-right"></i>
										</button>
									</form>
								</div>
								<i class="fa fa-search" aria-hidden="true"></i>
							</label>
						</li>
						<li class="nav clearfix">
							<span></span>
							<span></span>
							<span></span>
						</li>
						<div class="lay clearfix">
							<div class="wrapper">
								<a href="index.php">HOME</a>
								<a href="#">ABOUT</a>
								<a href="#">ARCHIEVE</a>
								<a href="#">CONTACT</a>
							</div>
						</div>
					</ul>
				</div>
			</div>  <!-- Penutup Header -->