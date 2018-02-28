<?php
session_start();
include 'koneksi.php';

$id = isset($_GET['ID']) ? $_GET['ID'] : '';

if (!empty($id)){
	mysqli_query($connect,"DELETE FROM people WHERE people_id = '$id'");
	header("location:../people.php");
} else {
	header("location:../people.php");
}
?>