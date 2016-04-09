<?php
if (isset($_POST['login']))
{
	if (user_register($_POST['login'], $_POST['mail'], $_POST['passwd']) === true)
		echo "Registration ok\n";
	else
		echo "Registration failure\n";
}
?>

<form action='./index.php' method='POST'>
	<input type='hidden' name='page' value='6' />
	<table>
		<tr>
			<td>Login</td>
			<td><input name='login' /></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input name='mail' /></td>
		</tr>
		<tr>
			<td>Mot de passe</td>
			<td><input name='passwd' type='password' /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' value='Envoyer' /></td>
		</tr>
	</table>
</form>
