<?php
	session_start();
	if (isset($_SESSION['login'])){
		header("location:admin.php");
	} else {
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
		<div id="container" class="login clearfix">
			<div class="wrapper">
				<h1>Al-Wahdah</h1>
				<div id="form" class="clearfix">
					<form id="valid" action="proses/proses_login.php" method="post">
						<input type="text" name="email" id="email" maxlength="100" placeholder="Masukkan Username atau Email Anda" required>
						<input type="password" name="pass" id="pass" minlength="5" maxlength="20" placeholder="Masukkan Password Anda" required>
						<input type="submit" value="SUBMIT">
						<?php
						if (isset($_SESSION['empty']) && $_SESSION['empty'] == true){
							echo "<div class='alert'>Please fill the form!</div>";
						} else if (isset($_SESSION['wrong']) && $_SESSION['wrong'] == true){
							echo "<div class='alert'>Your data doesn't exist!</div>";
						}
						?>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
<?php } ?>