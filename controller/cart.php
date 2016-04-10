<?php
if (isset($_SESSION['cart']))
{
	$db = krnl_MysqlConnect();
	$articles = [];
	foreach ($_SESSION['cart'] as $id => $quantity)
	{
		$item = krnl_ArticleById($db, $id);
		$item['quantity'] = $quantity;
		$articles[] = $item;
	}
	mysqli_close($db);
}
?>

<h1>Cart content</h1>
<table class='cart'>
	<tr>
		<th>Designation</th>
		<th class='quantity'>Quantity</th>
	</tr>
<?php
foreach ($articles as &$item)
{
	echo "<tr>
		<td>{$item['title']}</td>
		<td class='quantity'>{$item['quantity']}</td>
	</tr>\n";
}
?>
</table>
