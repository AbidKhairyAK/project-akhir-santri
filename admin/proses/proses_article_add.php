<?php

session_start();
include 'koneksi.php';

$title 		= isset($_POST['title']) ? $_POST['title'] : '';
$category 	= isset($_POST['category']) ? $_POST['category'] : '';
$content 	= isset($_POST['content']) ? $_POST['content'] : '';
$tags 		= isset($_POST['tags']) ? $_POST['tags'] : '';
$quote 		= isset($_POST['quote']) ? $_POST['quote'] : '';
$status 	= isset($_POST['status']) ? $_POST['status'] : '';

$image_name 	= isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';
$image_size 	= isset($_FILES['image']['size']) ? $_FILES['image']['size'] : '';
$image_type 	= isset($_FILES['image']['type']) ? $_FILES['image']['type'] : '';
$image_tmp_name = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : '';
$image_ext 		= explode('.',$image_name);
$image_ext 		= end($image_ext);

$author 	= $_SESSION['author_id'];
$date 		= date("Y-m-d H:i:s",time());

$folder = "../images/";

if (!empty($title) && !empty($content)){
	$_SESSION['form'] = '';
	
	if (!empty($image_name)){
		$img_sql = mysqli_query($connect,"SELECT article_image FROM article");
		$img_row = mysqli_fetch_array($img_sql);
		$rand = rand(11111,99999);
		$search = array_search($rand,$img_row);
		while (is_int($search)){
			$rand = rand(11111,99999);
			$search = array_search($rand,$img_row);
		}
		$image_name = $rand.'.'.$image_ext;
		move_uploaded_file($image_tmp_name,$folder.$image_name);
	} else {
		$image_name = null;
	}
	
	mysqli_query($connect,"INSERT INTO article VALUES('','".$title."','".$content."','".$quote."','".$image_name."','".$category."','".$author."','".$date."','".$status."','".$tags."')");
	header("location:../article.php");
} else {
	$_SESSION['form'] = "Please fill the form!";
	header("location:../article_add.php");
}

?>