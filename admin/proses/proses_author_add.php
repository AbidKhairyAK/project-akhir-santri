<?php

session_start();
include 'koneksi.php';

$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

if (!empty($name) && !empty($email) && !empty($pass)){
	$_SESSION['form'] = '';
	
	$sql = mysqli_query($connect,"SELECT * FROM author WHERE author_name = '$name' OR author_email = '$email'");
	$result = mysqli_num_rows($sql);
	if ($result){
		$_SESSION['form'] = "Your name or email already exist!";
		header("location:../author_add.php");
		exit();
	}
	
	mysqli_query($connect,"INSERT INTO people VALUES('','".$name."','".$email."',null)");
	$sql = mysqli_query($connect,"SELECT people_id FROM people WHERE people_name = '$name'");
	$row = mysqli_fetch_array($sql);
	
	mysqli_query($connect,"INSERT INTO author VALUES('$row[poeple_id]','".$name."','".$email."','".$pass."')");
	header("location:../author.php");
} else {
	$_SESSION['form'] = "Please fill the form!";
	header("location:../author_add.php");
}

?>