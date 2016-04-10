<?php
$db = krnl_MysqlConnect();
$articles = krnl_GetArticles($db);
mysqli_close($db);
?>
<h1>Articles</h1>
<table>
<?php
	$max_items_per_lines = 4;
	$p = 0;
	foreach ($articles as &$item)
	{
		if ($p == $max_items_per_lines)
			echo "<tr>\t\n";
		echo "\t\t\t<td>
			<form action='./index.php' method='POST'>
				<span class='article_title'>{$item['title']}</span><br />\n
				<img class='article_img' style='max-width:200px;' src='{$item['img']}' alt='image' title='Photo' /><br />
				<span class='article_price'>{$item['price']}</span><br />
				<input type='submit' value='Add to cart' name='order' />
				<input type='hidden' name='id' value='{$item['id']}' />
				<input type='hidden' name='page' value='1' />
			</form>
		</td>\n";
		if ($p == $max_items_per_lines)
		{
			echo "</tr>\n";
			$p = 0;
		}
		else
			$p++;
	}
?>
</table>
