<?php
	$userline = NULL;
	if ($_SESSION['user'] !== null)
	{
		$userline = "\t\t\t".'<li><a href="./index.php?page=9"><i class="fa fa-eject fa-lg"></i> Logout</a></li>'."\n";
		if ($_SESSION['user']['login'] === 'admin')
			$userline .= '<li><a href="./index.php?page=7"><i class="fa fa-usb fa-lg"></i> Admin</a></li>';
	}
	else
		$userline = "\t\t\t".'<li><a href="./index.php?page=10"><i class="fa fa-arrow-circle-o-up fa-lg"></i> Login</a></li>
		<li><a href="./index.php?page=6"><i class="fa fa-chevron-circle-down fa-lg"></i> Register</a></li>'."\n";
?>

<nav id="mainMenu" >
	<ul>
		<li><a href="./index.php?page=1"><i class="fa fa-home fa-lg"></i> Home</a></li>
		<li><a href="./index.php?page=3"><i class="fa fa-female fa-lg"></i> Articles</a></li>
		<li><a href="./index.php?page=8"><i class="fa fa-female fa-lg"></i> Categories</a></li>
		<?php echo $userline; ?>
		<li><a href="./index.php?page=11"><i class="fa fa-cart-arrow-down fa-lg"></i> Cart</a></li>
	</ul>
</nav>
