<?php

session_start();
include 'koneksi.php';

$id = isset($_POST['id']) ? $_POST['id'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';

if (!empty($name)){
	$_SESSION['form'] = '';
	mysqli_query($connect,"UPDATE category SET category_name = '$name' WHERE category_id = '$id'");
	header("location:../category.php");
} else {
	$_SESSION['form'] = "Please fill the form!";
	header("location:../category_edit.php");
}

?>