<?php

session_start();
include 'koneksi.php';

$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

$article = isset($_POST['article']) ? $_POST['article'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';
$reply = isset($_POST['reply']) ? $_POST['reply'] : 'NULL';
$date = date("Y-m-d H:i:s",time());

if (!empty($name) && !empty($email) && !empty($phone) && !empty($content)){
	$_SESSION['form'] = '';
	
	$sql = mysqli_query($connect,"SELECT people_name, people_email FROM people WHERE people_name = '$name' AND people_email = '$email'");
	$result = mysqli_num_rows($sql);
	
	if ($result == null){
		mysqli_query($connect,"INSERT INTO people VALUES('','".$name."','".$email."','".$phone."')");
	}
	
	$sql = mysqli_query($connect,"SELECT people_id FROM people WHERE people_name = '$name' AND people_email = '$email'");
	$row = mysqli_fetch_array($sql);
	
	$id = $row['people_id'];
	
	mysqli_query($connect,"INSERT INTO comment VALUES('','$id','".$content."','$date','$article',$reply)");
	
	$_SESSION['more'] = true;
	header("location:../../post.php?ID=$article");
} else {
	echo $_SESSION['form'] = "Please fill the form with correct data!";
	header("location:../post.php?ID=$article");
}

?>