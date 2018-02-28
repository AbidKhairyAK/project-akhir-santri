<?php
	session_start();
	$_SESSION['form'] = '';
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
		<div id="container" class="admin clearfix">
			<?php
				$file = basename(__FILE__,'.php');
				include 'admin_header.php';
				include 'admin_sidebar.php';
			?>
			<div id="main" class="clearfix">
				<h2>Category Data</h2>
				<a href="category_add.php" class="add">Add Category</a>
				<div class="content clearfix">
					<table id="table" class="display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include 'proses/koneksi.php';
							
							$sql = mysqli_query($connect,"SELECT * FROM category ORDER BY category_name ASC");
							$no = 1;
							while($row = mysqli_fetch_array($sql)){
								echo "<tr>
										<td>".$no++."</td>
										<td>".$row['category_name']."</td>
										<td>
											<a class='edt' href='category_edit.php?ID=$row[category_id]'>Edit</a>
											<a class='del' href='proses/proses_category_delete.php?ID=$row[category_id]'>Delete</a>
										</td>
									</tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/plugin/datatables/datatables.min.js"></script>
		<script src="js/table.js"></script>
		<script src="js/nav.js"></script>
	</body>
</html>
<?php
	} else {
		header("location:login.php");
	}
?>