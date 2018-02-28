<?php
session_start();
include 'koneksi.php';

$id = isset($_GET['ID']) ? $_GET['ID'] : '';

if (!empty($id)){
	$sql = mysqli_query($connect,"SELECT article_image FROM article WHERE article_id = $id");
	$row = mysqli_fetch_array($sql);
	unlink("../images/$row[article_image]");
	mysqli_query($connect,"DELETE FROM article WHERE article_id = '$id'");
	header("location:../article.php");
} else {
	header("location:../article.php");
}
?>