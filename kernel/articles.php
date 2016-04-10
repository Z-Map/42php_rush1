<?php
function	krnl_GetArticles(&$db)
{
	$req = "SELECT * FROM `articles` ORDER BY `title`;";
	$ret = mysqli_query($db, $req);
	$articles = [];
	while (($data = mysqli_fetch_assoc($ret)))
		$articles[] = $data;
	return ($articles);
}

//retourne la liste des articles dans la categorie de l id $catId
//null en cas d echec
function	krnl_ArticlesByCatId(&$db, $catId)
{
	$catId = intval($catId);
	$ret = mysqli_query($db, "SELECT * FROM `articles` WHERE `category` LIKE '%$catId%';");
	if (!$ret)
		return (null);
	$articles = [];
	while (($data = mysqli_fetch_assoc($ret)))
		$articles[] = $data;
	return ($articles);
}

//retourne l article avec l id $id
function	krnl_ArticleById(&$db, $id)
{
	$id = intval($id);
	$ret = mysqli_query($db, "SELECT * FROM `articles` WHERE `id` = $id;");
	if ($ret)
		return (mysqli_fetch_assoc($ret));
	return (null);
}

//ajoute l article Id au pannier
function	krnl_ArticleAddToCart($itemId)
{
	if (!isset($_SESSION['cart']))
		$_SESSION['cart'][intval($itemId)] = 1;
	else
		$_SESSION['cart'][intval($itemId)]++;
}

//vide le panier
function	krnl_ArticleClearCart()
{
	if (isset($_SESSION['cart']))
		unset($_SESSION['cart']);
}
?>
