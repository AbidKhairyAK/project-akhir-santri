<?php

function author($id)
{
	include 'admin/proses/koneksi.php';
	$sql = mysqli_query($connect,"SELECT * FROM author WHERE author_id = '$id'");
	$func = mysqli_fetch_array($sql);
	return $func['author_name'];
}

function article($id)
{
	include 'admin/proses/koneksi.php';
	$sql = mysqli_query($connect,"SELECT * FROM article WHERE article_id = '$id'");
	$func = mysqli_fetch_array($sql);
	return $func['article_title'];
}

function article_ctn($id)
{
	include 'admin/proses/koneksi.php';
	$sql = mysqli_query($connect,"SELECT * FROM article WHERE article_id = '$id'");
	$func = mysqli_fetch_array($sql);
	return $func['article_content'];
}

function article_ttl($id)
{
	include 'admin/proses/koneksi.php';
	$sql = mysqli_query($connect,"SELECT COUNT(article_title) AS title FROM article WHERE article_status = '1' AND article_title LIKE '%".$id."%' OR article_content LIKE '%".$id."%'");
	$func = mysqli_fetch_array($sql);
	return $func['title'];
}

function category($id)
{
	include 'admin/proses/koneksi.php';
	$sql = mysqli_query($connect,"SELECT * FROM category WHERE category_id = '$id'");
	$func = mysqli_fetch_array($sql);
	return $func['category_name'];
}

function comment($id)
{
	include 'admin/proses/koneksi.php';
	$sql = mysqli_query($connect,"SELECT * FROM comment WHERE comment_id = '$id'");
	$func = mysqli_fetch_array($sql);
	return $func['comment_content'];
}
function cmnt_count($id)
{
	include 'admin/proses/koneksi.php';
	$sql = mysqli_query($connect,"SELECT COUNT(comment_id) AS cmnt FROM comment WHERE article_id = '$id' AND comment_reply IS NULL");
	$func = mysqli_fetch_array($sql);
	return $func['cmnt'];
}

function people($id)
{
	include 'admin/proses/koneksi.php';
	$sql = mysqli_query($connect,"SELECT * FROM people WHERE people_id = '$id'");
	$func = mysqli_fetch_array($sql);
	return $func['people_name'];
}

function people_email($id)
{
	include 'admin/proses/koneksi.php';
	$sql = mysqli_query($connect,"SELECT * FROM people WHERE people_id = '$id'");
	$func = mysqli_fetch_array($sql);
	return $func['people_email'];
}

?>