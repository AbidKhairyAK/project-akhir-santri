<?php

session_start();
include 'koneksi.php';

$name = isset($_POST['name']) ? $_POST['name'] : '';

if (!empty($name)){
	$_SESSION['form'] = '';
	mysqli_query($connect,"INSERT INTO category VALUES('','".$name."')");
	header("location:../category.php");
} else {
	$_SESSION['form'] = "Please fill the form!";
	header("location:../category_add.php");
}

?>