<?php
if (isset($_POST['id']))
{
	krnl_ArticleAddToCart($_POST['id']);
	header("Location: ./index.php?page=11");
}
else
	header("Location: ./index.php");
?>
