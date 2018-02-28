<?php

session_start();
include 'koneksi.php';

$id = isset($_POST['id']) ? $_POST['id'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$old_pass = isset($_POST['old_pass']) ? $_POST['old_pass'] : '';
$new_pass = isset($_POST['new_pass']) ? $_POST['new_pass'] : '';

$check = mysqli_query($connect,"SELECT author_pass FROM author WHERE author_id = '$id'");
$real_pass = mysqli_fetch_array($check);

if (!empty($name) && !empty($email) && $old_pass == $real_pass['0'] ){
	$_SESSION['form'] = '';
	$opt = ((!empty($new_pass)) ? ", author_pass = '$new_pass'" : '');
	mysqli_query($connect,"UPDATE author 
							SET author_name = '".$name."', author_email = '".$email."'".$opt."
							WHERE author_id = '$id'");
	header("location:../author.php");
} else {
	$_SESSION['form'] = "Please fill the form with correct data!";
	header("location:../author_edit.php");
}

?>