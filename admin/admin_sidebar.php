<div id="sidebar">
	<div class="bio">
		<div><img src="images/capture.png" alt="author"></div>
		<p><?= $_SESSION['author_name'] ?> - Author</p>
	</div>
	<?php
		$admin = ($file == 'admin') ? "class='active'" : '';
		$artc = (($file == 'article') || ($file == 'article_add') || ($file == 'article_edit') || ($file == 'article_delete') || ($file == 'article_detail')) ? "class='active'" : '';
		$author = (($file == 'author') || ($file == 'author_add') || ($file == 'author_edit') || ($file == 'author_delete')) ? "class='active'" : '';
		$category = (($file == 'category') || ($file == 'category_add') || ($file == 'category_edit') || ($file == 'category_delete')) ? "class='active'" : '';
		$comment = (($file == 'comment') || ($file == 'comment_add') || ($file == 'comment_edit') || ($file == 'comment_delete') || ($file == 'comment_detail') || ($file == 'comment_reply')) ? "class='active'" : '';
		$people = (($file == 'people') || ($file == 'people_add') || ($file == 'people_edit') || ($file == 'people_delete')) ? "class='active'" : '';
	?>
	<ul class="nav">
		<li <?= $admin ?>><a href="admin.php">Home</a></li>
		<li <?= $artc ?>><a href="article.php">Article</a></li>
		<li <?= $author ?>><a href="author.php">Author</a></li>
		<li <?= $category ?>><a href="category.php">Category</a></li>
		<li <?= $comment ?>><a href="comment.php">Comment</a></li>
		<li <?= $people ?>><a href="people.php">People</a></li>
	</ul>
</div>