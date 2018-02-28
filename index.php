<?php
    session_start();
?>
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
			?> <!-- Header -->
			
			<div id="main" class="clearfix">
				<div class="wrapper">
					<?php
						include 'admin/proses/koneksi.php';
						include 'function/library.php';
						
						$content = 5;
						$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
						$start = ($page > 1) ? ($page * $content) - $content : 0;
						
						$query = mysqli_query($connect,"SELECT * FROM article WHERE article_status = '1'");
						$result = mysqli_num_rows($query);
						$total = ceil($result/$content);
						
						$sql = mysqli_query($connect,"SELECT * FROM article WHERE article_status = '1' ORDER BY article_date DESC LIMIT $start, $content");
						while($row = mysqli_fetch_array($sql)){
					?>
					<div class="content clearfix">
						<p class="category mobile"><?= category($row['category_id']) ?></p>
						<?= (($row['article_image']) ? "<img src='admin/images/$row[article_image]' alt='Content Image'>" : '') ?>
						<div class="wrapper">
							<p class="category"><?= category($row['category_id']) ?></p>
							<p class="date"><?= date("M d",strtotime($row['article_date'])) ?></p>
							<h2 class="title"><a href="<?= "post.php?ID=$row[article_id]" ?>"><?= $row['article_title'] ?></a></h2>
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
			
			<div class="pagging">
				<?php for($x=1;$x<=$total;$x++){ ?> <!-- Pagging -->
				<a class="<?= (($page == $x) ? 'paged' : '') ?>" href="<?= "?page=$x" ?>"><?= $x ?></a>
				<?php } ?> <!-- Footer -->
			</div>
			<?php include 'blog_footer.php'; session_destroy(); ?>
		</div> <!-- Penutup Container -->
		
		<script src="admin/js/jquery-3.2.1.min.js"></script>
		<script src="admin/js/script.js"></script>
	</body>
</html>