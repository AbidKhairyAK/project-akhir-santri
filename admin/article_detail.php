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
	</head>
	<body>
		<div id="container" class="admin form clearfix">
			<?php
				$file = basename(__FILE__,'.php');
				include 'admin_header.php';
				include 'admin_sidebar.php';
			?>
			<div id="main" class="clearfix">
				<h2>Article Detail</h2>
				<div class="content clearfix">
					<?php
						include 'proses/koneksi.php';
						include 'function/library.php';
						
						$id = isset($_GET['ID']) ? $_GET['ID'] : '';
						
						$sql = mysqli_query($connect,"SELECT * FROM article WHERE article_id = $id");
						$row = mysqli_fetch_array($sql);
					?>
					<form id="form" action="proses/proses_article_edit.php" method="post" enctype="multipart/form-data">
						<input type="hidden" value="<?= $id ?>" name="id">
						<table>
							<tr>
								<td><label for="title">Title</label></td>
								<td><input type="text" name="title" id="title" maxlength="255" class="" value="<?= $row['article_title'] ?>" disabled></td>
							</tr>
							<tr>
								<td><label for="category">Category</label></td>
								<td>
									<select name="category" disabled>
										<?php
											include 'proses/koneksi.php';
											$sql = mysqli_query($connect,"SELECT * FROM category ORDER BY category_name ASC");
											while ($cat = mysqli_fetch_array($sql)){
												$check = (($row['category_id'] == $cat['category_id']) ? 'selected' : '');
												echo "<option value='$cat[category_id]' $check>$cat[category_name]</option>";
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td><label for="content">Content</label></td>
								<td><textarea type="text" name="content" id="content" class="" disabled> <?= $row['article_content'] ?></textarea></td>
							</tr>
							<tr>
								<td><label for="quote">Quote</label></td>
								<td><input type="text" name="quote" id="quote" value="<?= $row['article_quote'] ?>" disabled></td>
							</tr>
							<tr>
								<td><label for="tags">Tags</label></td>
								<td><input type="text" name="tags" id="tags" value="<?= $row['article_tags'] ?>" class="" disabled></td>
							</tr>
							<tr>
								<td><label for="image">Image</label></td>
								<td>
									<table>
										<tr>
											<td>Current :</td>
											<td><img src="images/<?= $row['article_image'] ?>" alt="" style="width:200px;"></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td><label for="status">Status</label></td>
								<td>
									<label>
										<input type="radio" name="status" id="stasus" class="" value="1" checked disabled><span class="radio"><b></b></span><font> Publish</font>
									</label>
									<br>
									<label>
										<input type="radio" name="status" id="status" class="" value="0" disabled><span class="radio"><b></b></span><font> Draft</font>
									</label>
								</td>
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
		
		<script src="js/ck.js"></script>
		<script src="js/nav.js"></script>
		<script src="js/input_file.js"></script>
	</body>
</html>
<?php
	} else {
		header("location:login.php");
	}
?>