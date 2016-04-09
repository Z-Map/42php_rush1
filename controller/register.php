<?php
//renvoi true si $login est dans la liste des utilisateurs, sinon false
function	user_check(&$userlist, $login)
{
	if ($userlist === null)
		return (false);
	foreach ($userlist as $user)
		if ($user['login'] === $login)
			return (true);
	return (false);
}

//ajoute un utilisateur a la liste des users en memoire
//retourne true si l utilisateur a bien ete ajoute, sinon false
function	user_add(&$userlist, $login, $mail, $passwd)
{
	if (user_check($userlist, $login) !== false)
		return (false);
	$user['login'] = $login;
	$user['passwd'] = hash("whirlpool", $passwd);
	$user['mail'] = $mail;
	$userlist[] = $user;
	return (true);
}

//ajoute l utilisateur $user a la base de donne
function	user_register($login, $mail, $passwd)
{
	if ((!strlen($login)) || (!strlen($passwd)) || (!strlen($mail)))
		return (false);
	$private_dir = "./database/";
	$pwf = "$private_dir/users.db";
	if (!file_exists($private_dir))
		mkdir($private_dir);
	if (!file_exists($pwf))
		$userlist = NULL;
	else
		$userlist = unserialize(file_get_contents($pwf));
	if (user_add($userlist, $login, $mail, $passwd) === true)
	{
		file_put_contents($pwf, serialize($userlist));
		return (true);
	}
	return (false);
}

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
