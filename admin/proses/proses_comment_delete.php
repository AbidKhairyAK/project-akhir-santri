<?php
session_start();
include 'koneksi.php';

$id = isset($_GET['ID']) ? $_GET['ID'] : '';

if (!empty($id)){
	mysqli_query($connect,"DELETE FROM comment WHERE comment_id = '$id'");
	header("location:../comment.php");
} else {
	header("location:../comment.php");
}
?>