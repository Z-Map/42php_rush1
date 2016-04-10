<?php
session_start();

$html_head = array();
$html_config = array();
$html_content = array();

require_once("kernel/core.php");

function getpage()
{
	if (isset($_POST['page']))
		$pid = intval($_POST['page']);
	else if (isset($_GET['page']))
		$pid = intval($_GET['page']);
	$pages = array(1 => "home.php",
		2 => "login.php",
		3 => "articles.php",
		4 => "cart.php",
		5 => "profile.php",
		6 => "register.php",
		8 => "category.php",
		7 => "admin.php",
		9 => "logout.php",
		10 => "login.php",
		11 => "cart.php",
		12 => "addcart.php");
	if (isset($pages[$pid]))
		return ($pages[$pid]);
	return ($pages[1]);
}

$html_head = krnl_HtmlHeadInit("Chr0nos store");
$html_config = krnl_HtmlConfigInit();
$html_content = krnl_HtmlContentInit();

ob_start();

include 'controller/'.getpage();

$html_content['plain_content'] = ob_get_contents();

ob_end_clean();

include 'struct/frame.php';
?>
