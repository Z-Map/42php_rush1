<?php
	$userline = NULL;
	if ($_SESSION['user'] !== null)
		$userline = "\t\t\t".'<li><a href="./index.php?page=9"><i class="fa fa-female fa-lg"></i>Logout</a></li>'."\n";
	else
		$userline = "\t\t\t".'<li><a href="./index.php?page=10"><i class="fa fa-male fa-lg"></i>Login</a></li>
		<li><a href="./index.php?page=6"><i class="fa fa-female fa-lg"></i>Register</a></li>'."\n";
?>

<nav id="mainMenu" >
	<ul>
		<li><a href="./index.php?page=1"><i class="fa fa-home fa-lg"></i> Home</a></li>
		<li><a href="./index.php?page=3"><i class="fa fa-female fa-lg"></i>Articles</a></li>
		<li><a href="./index.php?page=8"><i class="fa fa-female fa-lg"></i>Lol 2</a></li>
		<?php echo $userline; ?>
	</ul>
</nav>
