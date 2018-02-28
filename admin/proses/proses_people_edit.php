<?php

session_start();
include 'koneksi.php';

$id = isset($_POST['id']) ? $_POST['id'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

if (!empty($name)){
	$_SESSION['form'] = '';
	mysqli_query($connect,"UPDATE people 
							SET people_name = '$name', people_email = '$email', people_phone = '$phone' 
							WHERE people_id = '$id'");
	header("location:../people.php");
} else {
	$_SESSION['form'] = "Please fill the form!";
	header("location:../people_edit.php");
}

?>