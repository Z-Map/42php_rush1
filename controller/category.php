<?php
$db = krnl_MysqlConnect();
$cats = krnl_CategoryList($db);
mysqli_close($db);
?>

<table>
	<?php
	foreach ($cats as &$cat)
	{
		echo "<tr>
			<td>
				<a href='./index.php?page=3&cat={$cat['id']}'>
					<img src='{$cat['img']}' alt='{$cat['category']}' title='{$cat['category']}' />
				</a>
			</td>
		</tr>";
	}
	?>
</table>
