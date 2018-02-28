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
				<h2>Comment Data</h2>
				<div class="content clearfix">
					<table id="table" class="display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Comment</th>
								<th>On Article</th>
								<th>Reply</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include 'proses/koneksi.php';
							include 'function/library.php';
							
							$sql = mysqli_query($connect,"SELECT * FROM comment ORDER BY comment_date DESC");
							$no = 1;
							while($row = mysqli_fetch_array($sql)){
								echo "
									<tr>
										<td>".$no++."</td>
										<td>".substr(people($row['people_id']),0,10)."</td>
										<td>".substr($row['comment_content'],0,10)." </td>
										<td>".substr(article($row['article_id']),0,10)."</td>
										<td>".substr(comment($row['comment_reply']),0,10)."</td>
										<td>".$row['comment_date']."</td>
										<td>
											<a class='rpl' href='comment_reply.php?ID=$row[comment_id]&reply=$row[comment_reply]'>Reply</a>
											<a class='dtl' href='comment_detail.php?ID=$row[comment_id]'>Detail</a> ".
											((people_email($row['people_id']) == $_SESSION['author_email']) ? 
												"<a class='edt' href='comment_edit.php?ID=$row[comment_id]'>Edit</a>" : ''
											)
											." <a class='del' href='proses/proses_comment_delete.php?ID=$row[comment_id]'>Delete</a>
										</td>
									</tr>
								";
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