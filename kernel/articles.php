<?php
function	krnl_GetArticles(&$db)
{
	$req = "SELECT * FROM `articles` ORDER BY `title`;";
	$ret = mysqli_query($db, $req);
	$articles = [];
	while (($data = mysqli_fetch_assoc($ret)))
	{
		$articles[] = $data;
	}
	return ($articles);
}

//ajoute l article Id au pannier
function	krnl_ArticleAddToCart($itemId)
{
	if (!isset($_SESSION['cart']))
		$_SESSION['cart'][$itemId] = 1;
	else
		$_SESSION['cart'][$itemId]++;
}

//vide le panier
function	krnl_ArticleClearCart()
{
	if (isset($_SESSION['cart']))
		unset($_SESSION['cart']);
}
?>
