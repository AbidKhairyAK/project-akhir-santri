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
		<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900,900i" rel="stylesheet">
	</head>
	<body>
	
		<div id="container" class="post clearfix">
			
<?php 
	$file = basename(__FILE__,'.php');
	include 'blog_header.php'; 
?>
			
			<div id="main" class="clearfix">
				<div class="wrapper">
					<div class="content clearfix">
						<div class="wrapper">
<?php
	include 'admin/proses/koneksi.php';
	include 'function/library.php';
	
	$id = isset($_GET['ID']) ? $_GET['ID'] : '';
	
	$sql = mysqli_query($connect,"SELECT * FROM article WHERE article_id = '$id' ORDER BY article_date DESC");
	$row = mysqli_fetch_array($sql);
?>
							<p class="category"><?= category($row['category_id']) ?></p>
							<p class="date"><?= date("M d",strtotime($row['article_date'])) ?></p>
							<h2 class="title"><?= $row['article_title'] ?></h2>
							<img src="<?= (($row['article_image']) ? "admin/images/$row[article_image]" : '') ?>" alt="">
							<span class="text">
<?php
	$text = $row['article_content'];
	$start1 = strpos($text,'<p>');
	$end1 = strrpos($text,'</p>',-10);
	$parg1 = substr($text,$start1,$end1-$start1+4);
	
	$start2 = strrpos($text,'<p>');
	$end2 = strrpos($text,'</p>',$start2);
	$parg2 = substr($text,$start2,$end2-$start2+4);
	
	$quote = (($row['article_quote'] != null) ? "<p class='quote'> $row[article_quote] </p>" : '');
	
	echo $parg1.$quote.$parg2;
?>
							</span>
							<img src="images/social.png" alt="social" class="social">
							<span class="tag">
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
							</span>
						</div>
						
						<hr>
						
						<div class="comment">
							<div class="wrapper">
								<p class="cmnt_count"><?= $count = cmnt_count($row['article_id']) ?> Comments</p>
								<div class="cmnt_form">
									<form id="form" action="admin/proses/proses_comment_add.php" method="post">
										<table width="100%">
											<tr>
												<td>
													<span class="cmnt_image"><img src="" alt=""></span>
												</td>
												<td>
													<label for="name"><span class="trigger"></span></label>
													<textarea type="text" id="cmnt_text" class="cmnt_text" name="content" placeholder="Tulis komentar anda di sini..." required></textarea>
												</td>
											</tr>
										</table>
										<div class="cmnt_bio">
											<p>Silahkan Lengkapi Kolom Di Bawah :</p>
											<input type="hidden" name="article" id="article" value="<?= $row['article_id'] ?>">
											<div>
												<input type="text" name="name" id="name" maxlength="50" placeholder="Nama" required>
											</div>
											<div>
												<input type="email" name="email" id="email" maxlength="50" placeholder="Email" required>
											</div>
											<div>
												<input type="text" name="phone" id="phone" minlength="5" maxlength="14" placeholder="No. Telepon" required>
											</div>
											<button type="submit">SUBMIT</button>
										</div>
									</form>
								</div>
<?php
	$sql_cmnt = mysqli_query($connect,"SELECT * FROM comment WHERE article_id = '$id' AND comment_reply IS NULL ORDER BY comment_date DESC");
	$inc = 0;
	if (isset($_POST['more'])){
	    $_SESSION['lmt'] += 2;
	} else {
	    $_SESSION['lmt'] = 2;
	}
	$lmt = $_SESSION['lmt'];
	
	while(($cmnt = mysqli_fetch_array($sql_cmnt)) && ($inc < $lmt)){
		$now = strtotime($cmnt['comment_date']);
		$ago = time() - $now;
		
		if ($ago <= 60){
			$time = floor($ago)." Seconds ago";
		} else if ($ago > 60 && $ago <= 3600){
			$time = floor($ago / 60)." Minutes ago";
		} else if ($ago > 3600 && $ago <= 86400){
			$time = floor($ago / 60 / 60)." Hours ago";
		} else if ($ago > 86400 && $ago <= 259200){
			$time = floor($ago / 60 / 60 / 24)." Days ago";
		} else if ($ago > 259200){
			$time = date("F d Y",$now);
		}
		
?>
								<div class="cmnt clearfix">
									<span class="cmnt_image">
										<img src="" alt="">
									</span>
									<div class="cmnt_data">
										<p class="cmnt_name"><?= people($cmnt['people_id']) ?></p>
										<p class="cmnt_date"> &bullet; <?= $time ?></p>
										<span class="cmnt_content"><?= $cmnt['comment_content'] ?></span>
									</div>
								</div>
<?php $inc++; } ?>
								<form action="" method="post">
									<input type="hidden" name="more" value="more">
									<button type="submit" class="cmnt_more" id="<?= (($lmt >= $count) ? "none" : "") ?>">Load more comments</button>
								</form>
							</div> <!--Penutup Wrapper-->
						</div> <!--Penutup Comment-->
					</div> <!--Penutup Content-->
				</div> <!--Penutup Wrapper-->
			</div> <!--Penutup Main-->
			<span class="<?= ((isset($_POST['more']) || ($_SESSION['more'] == true)) ? 'scroll' : '') ?>" style="display:block;height:2px;width:100%;"></span>
<?php include 'blog_footer.php'; ?>
			
		</div> <!-- Penutup Container -->
		
		<script src="admin/js/jquery-3.2.1.min.js"></script>
		<script src="admin/js/plugin/validation/dist/jquery.validate.min.js"></script>
		<script src="admin/js/script.js"></script>
		<script>
			$("#form").validate({
				rules: {
					phone: {
						required: true,
						number: true
					}
				}
			});
			$('document').ready(function(){
				$('html,body').animate({
					scrollTop: $('.scroll').offset().top - $(window).height()
				},'fast');
			});
		</script>
	</body>
</html>