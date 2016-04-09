<?php
//renvoi true si $login est dans la liste des utilisateurs, sinon false
function	krnl_UserCheck(&$userlist, $login)
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
function	krnl_UserAdd(&$userlist, $login, $mail, $passwd)
{
	if (krnl_UserCheck($userlist, $login) !== false)
		return (false);
	$user['login'] = $login;
	$user['passwd'] = hash("whirlpool", $passwd);
	$user['mail'] = $mail;
	$userlist[] = $user;
	return (true);
}

//ajoute l utilisateur $user a la base de donne
function	krnl_UserRegister($login, $mail, $passwd)
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
	if (krnl_UserAdd($userlist, $login, $mail, $passwd) === true)
	{
		file_put_contents($pwf, serialize($userlist));
		return (true);
	}
	return (false);
}
?>
