<?php
	session_start();
	if (isset($_SESSION['login'])){
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Al-Wahdah - Admin</title>
		<link href="js/plugin/datatables/datatables.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900,900i" rel="stylesheet">
		<link href="css/style2.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			span.cke_toolbox {
				display: none;
			}
		</style>
	</head>
	<body>
		<div id="container" class="admin form clearfix">
			<?php
				$file = basename(__FILE__,'.php');
				include 'admin_header.php';
				include 'admin_sidebar.php';
			?>
			<div id="main" class="clearfix">
				<h2>Comment Edit</h2>
				<div class="content clearfix">
					<?php
					
						include 'proses/koneksi.php';
						include 'function/library.php';
						
						$id = isset($_GET['ID']) ? $_GET['ID'] : '';
						$sql = mysqli_query($connect,"SELECT * FROM comment WHERE comment_id = '$id'");
						$row = mysqli_fetch_array($sql);
					?>
					<?= (isset($_SESSION['form']) ? "<p class='alert'>$_SESSION[form]</p>" : '') ?>
					<form id="form" action="proses/proses_comment_edit.php" method="post">
						<input type="hidden" name="id" value="<?= $id ?>">
						<table>
							<tr>
								<td><label for="article">Article</label></td>
								<td><input type="text" name="article" id="article" value="<?= article($row['article_id']) ?>" class="" disabled></td>
							</tr>
							<tr>
								<td><label for="content">Comment</label></td>
								<td><textarea type="text" name="content" id="content" class="" required><?= $row['comment_content'] ?></textarea></td>
							</tr>
							<?php if (!empty($row['comment_reply'])){?>
							<tr>
								<td><label for="reply">Reply for</label></td>
								<td><textarea type="text" name="reply" id="content2" class="" disabled><?= comment($row['comment_reply']) ?></textarea></td>
							</tr>
							<?php } ?>
							<tr>
								<td></td>
								<td><input type="submit" value="SUBMIT" class=""></td>
							</tr>
						</table>
					</form>
					<?= (isset($_SESSION['form']) ? $_SESSION['form'] : '') ?>
				</div>
			</div>
		</div>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/plugin/validation/dist/jquery.validate.min.js"></script>
		<script src="js/plugin/ckeditor/ckeditor.js"></script>
		<script src="js/plugin/ckeditor/style.js"></script>
		
		<script src="js/valid.js"></script>
		<script src="js/ck2.js"></script>
		<script src="js/ck.js"></script>
		<script src="js/nav.js"></script>
	</body>
</html>
<?php
	} else {
		header("location:login.php");
	}
?>