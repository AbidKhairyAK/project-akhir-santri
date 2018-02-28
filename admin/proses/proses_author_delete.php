<?php
session_start();
include 'koneksi.php';

$id = isset($_GET['ID']) ? $_GET['ID'] : '';

if (!empty($id)){
	mysqli_query($connect,"DELETE FROM author WHERE author_id = '$id'");
	header("location:../author.php");
} else {
	header("location:../author.php");
}
?>