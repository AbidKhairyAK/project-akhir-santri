<?php
	session_start();
	if (isset($_SESSION['login'])){
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Al-Wahdah - Admin</title>
	</head>
	<body>
		<div id="container" class="admin clearfix">
			<h1>Halaman Admin</h1>
			<a href="logout.php">Logout</a>
			<ul class="navbar">
				<li><a href="admin.php">Home</a></li>
				<li><a href="article.php">Article</a></li>
				<li><a href="author.php">Author</a></li>
				<li><a href="category.php">Category</a></li>
				<li><a href="comment.php">Comment</a></li>
				<li><a href="people.php">People</a></li>
			</ul>
			<hr>
			<h2>People Edit</h2>
			<?php
			
				include 'proses/koneksi.php';
				
				$id = isset($_GET['ID']) ? $_GET['ID'] : '';
				$sql = mysqli_query($connect,"SELECT * FROM people WHERE people_id = '$id'");
				$row = mysqli_fetch_array($sql);
			?>
			<?= (isset($_SESSION['form']) ? "<p class='alert'>$_SESSION[form]</p>" : '') ?>
			<form id="form" action="proses/proses_people_edit.php" method="post">
				<input type="hidden" name="id" value="<?= $id ?>">
				<table>
					<tr>
						<td><label for="name">Name</label></td>
						<td><input type="text" name="name" id="name" maxlength="50" class="" value="<?= $row['people_name'] ?>" required></td>
					</tr>
					<tr>
						<td><label for="email">Email</label></td>
						<td><input type="email" name="email" id="email" maxlength="50" class="" value="<?= $row['people_email'] ?>" required></td>
					</tr>
					<tr>
						<td><label for="phone">Phone</label></td>
						<td><input type="text" name="phone" id="phone" minlength="11" maxlength="20" class="" value="<?= $row['people_phone'] ?>" required></td>
					</tr>
					<tr>
						<td><input type="submit" value="SUBMIT" class=""></td>
					</tr>
				</table>
			</form>
			<?= (isset($_SESSION['form']) ? $_SESSION['form'] : '') ?>
		</div>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/plugin/validation/dist/jquery.validate.min.js"></script>
		<script>
			$('#form').validate({
				rules: {
					phone: {
						number: true
					}
				}
			});
		</script>
	</body>
</html>
<?php
	} else {
		header("location:login.php");
	}
?>