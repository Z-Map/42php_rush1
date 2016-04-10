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

function	krnl_GetCategories(&$db)
{
	$req = "SELECT * FROM `categories`";
	$ret = mysqli_query($db, $req);
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

function	krnl_UpdateArticle(&$db, $data)
{
	$id = intval($data["id"]);
	$category = mysqli_real_escape_string($db, $data["category"]);
	$title = mysqli_real_escape_string($db, $data["title"]);
	$price = mysqli_real_escape_string($db, $data["price"]);
	$description = mysqli_real_escape_string($db, $data["description"]);
	$img = mysqli_real_escape_string($db, $data["img"]);
	$req = "UPDATE articles SET category='$category',
		title='$title', price='$price', img='$img', description='$description'
		WHERE `id` = $id;";
	$ret = mysqli_query($db, $req);
}

function	krnl_RemoveArticle(&$db, $id)
{
	$req = "DELETE FROM articles WHERE `id` = $id;";
	$ret = mysqli_query($db, $req);
}

function	krnl_AddArticle(&$db, $data)
{
	$category = mysqli_real_escape_string($db, $data["category"]);
	$title = mysqli_real_escape_string($db, $data["title"]);
	$price = mysqli_real_escape_string($db, $data["price"]);
	$description = mysqli_real_escape_string($db, $data["description"]);
	$img = mysqli_real_escape_string($db, $data["img"]);
	if ($title == "")
		return ;
	$req = "INSERT INTO `articles` (`category`, `title`, `price`, `description`, `img`) VALUES ('$category', '$title', '$price', '$description', '$img');";
	$ret = mysqli_query($db, $req);
}

?>
