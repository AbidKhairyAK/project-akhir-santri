<?php

session_start();

include 'koneksi.php';

$email = isset($_POST['email']) ? $_POST['email'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';


if (!empty($email) && !empty($pass)){
	$_SESSION['empty'] = false;
	$sql = mysqli_query($connect,"SELECT * FROM author WHERE author_pass='$pass' AND (author_email='$email' OR author_name='$email')");
	$result = mysqli_num_rows($sql);
	if ($result){
		$row = mysqli_fetch_array($sql);
		$_SESSION['wrong'] = false;
		$_SESSION['login'] = true;
		$_SESSION['author_id'] = $row['author_id'];
		$_SESSION['author_name'] = $row['author_name'];
		$_SESSION['author_email'] = $row['author_email'];
		header("location:../admin.php");
	} else {
		$_SESSION['wrong'] = true;
		header("location:../login.php");
	}
} else {
	$_SESSION['empty'] = true;
	header("location:../login.php");
}

?>