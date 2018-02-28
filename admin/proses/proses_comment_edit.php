<?php

session_start();
include 'koneksi.php';

$id = isset($_POST['id']) ? $_POST['id'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';
$date = date("Y-m-d H:i:s",time());

if (!empty($content) ){
	$_SESSION['form'] = '';
	mysqli_query($connect,"UPDATE comment 
							SET comment_content = '".$content."',  comment_date= '".$date."'
							WHERE comment_id = '$id'");
	header("location:../comment.php");
} else {
	$_SESSION['form'] = "Please fill the form with correct data!";
	header("location:../comment_edit.php");
}

?>