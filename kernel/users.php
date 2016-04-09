<?php
//renvoi true si $login est dans la liste des utilisateurs, sinon false
function	krnl_UserCheck(&$db, $login)
{
	$login = htmlentities($login);
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
	if (krnl_UserCheck($db, $login) !== false)
		return (false);
	$login = htmlentities($login);
	$passwd = hash("whirlpool", $passwd);
	$mail = htmlentities($mail);
	$req = "INSERT INTO `rush00`.`users` (`id`, `login`, `passwd`, `mail`) VALUES (NULL, '$login', '$pass', '$mail');";
	return (@mysqli_query($db, $req));
}

//supprime $login de la liste des utilisateurs,
//renvoi true si l utilisateur a ete delete, sinon false
function	krnl_UserDel(&$db, $user_id)
{
	$user_id = intval($user_id);
	if (!$user_id)
		return (false);
	$req = "DELETE FROM `rush00`.`users` WHERE `users`.`id` = $user_id";
	return (@mysqli_query($db, $req));
}
?>
