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
				<h2>Author Add</h2>
				<div class="content clearfix">
					<?php
					
						include 'proses/koneksi.php';
						
						$id = isset($_GET['ID']) ? $_GET['ID'] : '';
						$sql = mysqli_query($connect,"SELECT * FROM category WHERE category_id = '$id'");
						$row = mysqli_fetch_array($sql);
					?>
					<?= (isset($_SESSION['form']) ? "<p class='alert'>$_SESSION[form]</p>" : '') ?>
					<form id="form" action="proses/proses_category_edit.php" method="post">
						<input type="hidden" name="id" value="<?= $id ?>">
						<table>
							<tr>
								<td><label for="name">Name</label></td>
								<td><input type="text" name="name" id="name" maxlength="50" class="" value="<?= $row['category_name'] ?>" required></td>
							</tr>
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
		
		<script src="js/valid.js"></script>
		<script src="js/nav.js"></script>
	</body>
</html>
<?php
	} else {
		header("location:login.php");
	}
?>