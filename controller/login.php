<?php
if (isset($_POST['submit']))
{
	$db = krnl_MysqlConnect();
	if (krnl_UserAuth($db, $_POST['login'], $_POST['passwd']))
		echo "Authentification successful\n";
	else
		echo "Authentification failure\n";
	mysqli_close($db);
}
?>

<h1>Login</h1>
<form action='./index.php' method='POST'>
	<table>
		<tr>
			<td>
				Login
			</td>
			<td>
				<input name='login' />
			</td>
		</tr>
		<tr>
			<td>
				Password
			</td>
			<td>
				<input name='passwd' type='password' />
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type='submit' name='submit' value='Submit' />
			</td>
		</tr>
	</table>
	<input type='hidden' name='page' value='10' />
</form>
