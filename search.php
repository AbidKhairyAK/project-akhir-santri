<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Al-Wahdah</title>
		<link rel="stylesheet" type="text/css" href="admin/css/style.css">
		<link rel="stylesheet" type="text/css" href="admin/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i" rel="stylesheet">
	</head>
	<body>
	
		<div id="container" class="home clearfix">
		
			<?php
				$file = basename(__FILE__,'.php');
				include 'blog_header.php';
				session_start();
				session_destroy();
			?> <!-- Header -->
			
			<div id="main" class="clearfix">
				<div class="wrapper">
					<?php
						include 'admin/proses/koneksi.php';
						include 'function/library.php';
						
						$search = isset($_POST['search']) ? $_POST['search'] : '';
						
						$sql = mysqli_query($connect,"SELECT * FROM article 
													WHERE article_status = '1' AND article_title LIKE '%".$search."%' OR article_content LIKE '%".$search."%' 
													ORDER BY article_date DESC");						
					?>
					
					<div class="content result clearfix">
						<div class="wrapper">
							<h2 class="">Search result for <strong>&laquo;<?= $search ?>&raquo;</strong></h2>
							<p><?= article_ttl($search) ?> Items Found</p>
						</div>
					</div>
					
					<?php while($row = mysqli_fetch_array($sql)){ ?>
					<div class="content clearfix">
						<img src="<?= (($row['article_image']) ? "admin/images/$row[article_image]" : '') ?>" alt="Content Image">
						<div class="wrapper">
							<p class="category"><?= category($row['category_id']) ?></p>
							<p class="date"><?= date("M d",strtotime($row['article_date'])) ?></p>
							<h2 class="title"><?= $row['article_title'] ?></h2>
							<?= (($row['article_quote'] != null) ? "<p class='quote'> $row[article_quote] </p>" : '') ?>
							<div class="text">
								<?php
									$text = $row['article_content'];
									$start = strpos($text,'<p>');
									$end = strpos($text,'</p>',$start);
									$parg = substr($text,$start,$end-$start+4);
									echo $parg;
								?>
							</div>
							<a href="<?= "post.php?ID=$row[article_id]" ?>" class="more">READ MORE</a>
							<div class="tag">
								<?php 
									if ($row['article_tags'] != null){
										$tags = explode(',',$row['article_tags']);
										$len = count($tags);
										$len = (($len < 3) ? $len : 3);
										for($x=0;$x<$len;$x++ ){
											echo "<a href='#'>#$tags[$x] </a>";
										}
									} 
								?>
							</div>
						</div>
					</div> <!--Penutup Content-->
					<?php } ?>
				</div> <!--Penutup Wrapper-->
			</div> <!--Penutup Main-->
			
			<?php include 'blog_footer.php'; ?>
			
		</div> <!-- Penutup Container -->
		
		<script src="admin/js/jquery-3.2.1.min.js"></script>
		<script>
			$('document').ready(function(){
				$('.search input').focus(function(){
					$('.search').addClass('scale');
				});
				$('.search input').focusout(function(){
					$('.search').removeClass('scale');
				});				
			});
		</script>
	</body>
</html>