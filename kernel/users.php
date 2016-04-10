<?php
//renvoi true si $login est dans la liste des utilisateurs, sinon false
function	krnl_UserCheck(&$db, $login)
{
	$login = mysqli_real_escape_string($db, $login);
	$ret = @mysqli_query($db, "SELECT `id` FROM `users` WHERE `login` = '$login' LIMIT 1;");
	$data = mysqli_fetch_assoc($ret);
	if (isset($data['id']))
		return (true);
	return (false);
}

//ajoute un utilisateur a la liste des users en memoire
//retourne true si l utilisateur a bien ete ajoute, sinon false
function	krnl_UserAdd(&$db, $login, $mail, $passwd)
{
	if ((!strlen($passwd)) || (!strlen($login)) || (!strlen($mail)))
		return (false);
	$login = htmlentities($login);
	if (krnl_UserCheck($db, $login) !== false)
		return (false);
	$login = mysqli_real_escape_string($db, $login);
	$passwd = hash("whirlpool", $passwd);
	$mail = mysqli_real_escape_string($db, $mail);
	$req = "INSERT INTO `rush00`.`users` (`id`, `login`, `passwd`, `mail`) VALUES (NULL, '$login', '$passwd', '$mail');";
	return (@mysqli_query($db, $req));
}

//supprime $login de la liste des utilisateurs,
//renvoi true si l utilisateur a ete delete, sinon false
function	krnl_UserDel(&$db, $user_id)
{
	$user_id = intval($user_id);
	if (!$user_id)
		return (false);
	$req = "DELETE FROM `rush00`.`users` WHERE `users`.`id` = $user_id LIMIT 1";
	return (@mysqli_query($db, $req));
}

//authentifie l utilisateur $login si son mot de passe correspond a celui de la bdd
//renvoi true si tout est ok, sinon false,
//remplis la variable $_SESSION['user'] avec un tableau associatif des champs sql
function	krnl_UserAuth(&$db, $login, $passwd)
{
	$login = mysqli_real_escape_string($db, $login);
	$ret = @mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '$login' LIMIT 1;");
	$data = mysqli_fetch_assoc($ret);
	if (!isset($data['id']))
		return (false);
	if (hash("whirlpool", $passwd) === $data['passwd'])
	{
		$_SESSION['user'] = $data;
		return (true);
	}
	return (false);
}

// Renvoi la liste des users
function	krnl_UserList(&$db)
{
	$req = "SELECT * FROM `users`;";
	$ret = @mysqli_query($db, $req);
	if (!$ret)
		return (null);
	$users = [];
	while (($data = mysqli_fetch_assoc($ret)))
		$users[] = $data;
	return ($users);
}

function	krnl_UserIsAdmin()
{
	if (!isset($_SESSION['user']))
		return (false);
	return ($_SESSION['user']['login'] === 'admin');
}
?>
