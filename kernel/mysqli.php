<?php
require_once('config.php');

function	krnl_MysqlConnect()
{
	$sql = getSqlConfig();
	return (@mysqli_connect($sql['host'], $sql['user'], $sql['pass'], $sql['db'], $sql['port']));
}
?>
