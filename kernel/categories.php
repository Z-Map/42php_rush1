<?php
function	krnl_CategoryList(&$db)
{
	$ret = mysqli_query($db, "SELECT * FROM `categories`;");
	if (!$ret)
		return (null);
	$cats = [];
	while (($data = mysqli_fetch_assoc($ret)))
		$cats[] = $data;
	return ($cats);
}
?>
