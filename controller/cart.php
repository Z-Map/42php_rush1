<?php
if (isset($_SESSION['cart']))
{
	$db = krnl_MysqlConnect();
	$articles = [];
	$total['price'] = 0;
	$total['quantity'] = 0;
	foreach ($_SESSION['cart'] as $id => $quantity)
	{
		$item = krnl_ArticleById($db, $id);
		$item['quantity'] = $quantity;
		$total['price'] += $item['price'] * $quantity;
		$total['quantity'] += $quantity;
		$articles[] = $item;
	}
	mysqli_close($db);
	if (!count($articles))
		header("Location: ./index.php?page=13");
}
?>

<h1>Cart content</h1>
<table class='cart'>
	<tr>
		<th>Designation</th>
		<th class='quantity'>Quantity</th>
		<th>Price</th>
		<th>Unit price</th>
	</tr>
<?php
foreach ($articles as &$item)
{
	echo "<tr class='cart'>
		<td>{$item['title']}</td>
		<td class='quantity'>{$item['quantity']}</td>
		<td>".$item['price'] * $item['quantity']."&euro;</td>
		<td>{$item['price']}&euro;</td>
	</tr>\n";
}
	echo "<tr><td colspan=4 class='noborder'></td></tr>
	<tr><th>Total</th><td>{$total['quantity']}</td><td>{$total['price']}&euro;</td></tr>"
?>
</table>
