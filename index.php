<?php
session_start();

function getpage()
{
	if (isset($_POST['page']))
	$pid = intval($_POST['page']);
	else if (isset(_GET['page']))
		$pid = intval($_GET['page'])
	$pages = array(1 => "home.php",
		2 => "login.php",
		3 => "articles.php",
		4 => "cart.php",
		5 => "profile.php",
		6 => "register.php",
		7 => "admin.php");
	if (isset($pages[$pid]))
		return ($pages[$pid]);
	return ($pages[1]);
}

require_once("kernel/core.php");

include 'struct/frame.php';

?>
