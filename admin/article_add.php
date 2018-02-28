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
				<h2>Article Add</h2>
				<div class="content clearfix">
					<?= (isset($_SESSION['form']) ? "<p class='alert'>$_SESSION[form]</p>" : '') ?>
					<form id="form" action="proses/proses_article_add.php" method="post" enctype="multipart/form-data">
						<table>
							<tr>
								<td><label for="title">Title</label></td>
								<td><input type="text" name="title" id="title" maxlength="255" class="" required></td>
							</tr>
							<tr>
								<td><label for="category">Category</label></td>
								<td>
									<select name="category">
										<?php
											include 'proses/koneksi.php';
											$sql = mysqli_query($connect,"SELECT * FROM category ORDER BY category_name ASC");
											while ($cat = mysqli_fetch_array($sql)){
												echo "<option value='$cat[category_id]'>$cat[category_name]</option>";
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td><label for="content">Content</label></td>
								<td><textarea type="text" name="content" id="content" class="" required></textarea></td>
							</tr>
							<tr>
								<td><label for="quote">Quote</label></td>
								<td><input type="text" name="quote" id="quote" class=""><span class="ex">(Optional)</span></td>
							
							</tr>
							<tr>
								<td><label for="tags">Tags</label></td>
								<td><input type="text" name="tags" id="tags" class=""><span class="ex">(Optional, Separate with comma)</span></td>
							</tr>
							<tr>
								<td><label for="image">Image</label></td>
								<td>
									<label id="img">
										<p>Choose file</p>
										<input type="file" name="image" id="image" class="">
										<input type="text" disabled>
									</label>
									<span class="ex">(Optional)</span>
								</td>
							</tr>
							<tr>
								<td><label for="status">Status</label></td>
								<td>
									<label>
										<input type="radio" name="status" id="stasus" class="" value="1" checked required><span class="radio"><b></b></span><font> Publish</font>
									</label>
									<br>
									<label>
										<input type="radio" name="status" id="status" class="" value="0" required><span class="radio"><b></b></span><font> Draft</font>
									</label>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value="SUBMIT" class=""><input type="reset" value="RESET" class=""></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/plugin/validation/dist/jquery.validate.min.js"></script>
		<script src="js/plugin/ckeditor/ckeditor.js"></script>
		<script src="js/plugin/ckeditor/style.js"></script>
		
		<script src="js/valid.js"></script>
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