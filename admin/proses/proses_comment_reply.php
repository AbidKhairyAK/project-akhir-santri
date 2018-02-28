<?php

session_start();
include 'koneksi.php';

$article = isset($_POST['article']) ? $_POST['article'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';
$reply = !empty($_POST['reply']) ? $_POST['reply'] : $_POST['id'];
$date = date("Y-m-d H:i:s",time());
$people = $_SESSION['author_id'];

if (!empty($content) ){
	$_SESSION['form'] = '';
	mysqli_query($connect,"INSERT INTO comment VALUES(	
							'','".$people."','".$content."','".$date."','".$article."','".$reply."'
							)");
	header("location:../comment.php");
} else {
	$_SESSION['form'] = "Please fill the form with correct data!";
	header("location:../comment_edit.php");
}

?>