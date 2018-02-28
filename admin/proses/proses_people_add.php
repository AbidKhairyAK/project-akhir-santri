<?php

session_start();
include 'koneksi.php';

$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

if (!empty($name)){
	$_SESSION['form'] = '';
	mysqli_query($connect,"INSERT INTO people VALUES('','".$name."','".$email."','".$phone."')");
	header("location:../people.php");
} else {
	$_SESSION['form'] = "Please fill the form!";
	header("location:../people_add.php");
}

?>