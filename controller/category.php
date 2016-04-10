<?php
$db = krnl_MysqlConnect();
$cats = krnl_CategoryList($db);
mysqli_close($db);
?>

<table>
	<tr>
	<?php
	foreach ($cats as &$cat)
	{
		echo "<td>
				<a href='./index.php?page=3&cat={$cat['id']}'>
					<img class='catimg' src='{$cat['img']}' alt='{$cat['category']}' title='{$cat['category']}' />
					<br />{$cat['category']}
				</a>
			</td>
		";
	}
	?>
	</tr>
</table>
