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
		<div id="container" class="admin clearfix">
			<?php
				$file = basename(__FILE__,'.php');
				include 'admin_header.php';
				include 'admin_sidebar.php';
			?>
			<div id="main" class="clearfix">
				<h2>Article Data</h2>
				<a href="article_add.php" class="add">Add Article</a>
				<div class="content clearfix">
					<table id="table" class="display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Title</th>
								<th>Category</th>
								<th>Author</th>
								<th>Tags</th>
								<th>Post Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include 'proses/koneksi.php';
							include 'function/library.php';
							
							$sql = mysqli_query($connect,"SELECT * FROM article ORDER BY article_date DESC");
							$no = 1;
							while($row = mysqli_fetch_array($sql)){
								echo "<tr>
										<td>".$no++."</td>
										<td>".substr($row['article_title'],0,10)."</td>
										<td>".substr(category($row['category_id']),0,10)."</td>
										<td>".substr(author($row['author_id']),0,10)."</td>
										<td>".substr($row['article_tags'],0,10)."</td>
										<td>".$row['article_date']."</td>
										<td>".(($row['article_status'] == 1) ? "<span class='edt'>Publish</span>" : "<span class='dtl'>Draft</span>")."</td>
										<td>
											<a class='dtl' href='article_detail.php?ID=$row[article_id]'>Detail</a>
											<a class='edt' href='article_edit.php?ID=$row[article_id]'>Edit</a>
											<a class='del' href='proses/proses_article_delete.php?ID=$row[article_id]'>Delete</a>
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