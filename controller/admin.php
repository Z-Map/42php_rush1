<?php
	if (krnl_IsAdmin())
	{
		$db = krnl_MysqlConnect();
		switch ($_POST["submit"])
		{
			case "modify_article":
				krnl_UpdateArticle();
				break;
			case "remove_article":

				break;
			case "add_article":

				break;
			case "modify_user":
				krnl_UpdateArticle();
				break;
			case "remove_user":

				break;
			case "modify_category":

				break;
			case "remove_category":

				break;
		}
		$articles = krnl_GetArticles($db);
		$users = krnl_UserList($db);
		$categories = krnl_GetCategories($db);
		mysqli_close($db);
		?>
		<div id="admin_page">
			<h1>Articles</h1>
			<div><?php
				foreach($articles as $item)
				{
					?>
						<form action="index.php" method="POST" class="admin_form">
							<input placeholder="Titre" type="text" name="title" value="<?php echo $item['title']; ?>">
							<input placeholder="Prix" type="text" name="price" value="<?php echo $item['price']; ?>">
							<input placeholder="Lien image" type="text" name="img" value="<?php echo $item['img']; ?>">
							<input type="hidden" name="id" value="<?php echo $item['id']; ?>">
							<input type="hidden" name="page" value="7">
							<button type="submit" value="modify_article">Modifier</button>
							<button type="submit" value="remove_article">Supprimer</button>
						</form>
					<?php
				}
				?>
				<br>
				<form action="index.php" method="POST" class="admin_form">
					<input placeholder="Titre" type="text" name="title">
					<input placeholder="Prix" type="text" name="price">
					<input placeholder="Lien image" type="text" name="img">
					<input type="hidden" name="page" value="7">
					<button type="submit" value="add_article">Ajouter</button>
				</form>
			</div>
			<h1>Utilisateurs</h1>
			<div><?php
				foreach($users as $user)
				{
					?>
						<form action="index.php" method="POST" class="admin_form">
							<input placeholder="Login" type="text" name="login" value="<?php echo $user['login']; ?>">
							<input placeholder="Mail" type="text" name="mail" value="<?php echo $user['mail']; ?>">
							<input placeholder="Password" type="password" name="password" value="">
							<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
							<input type="hidden" name="page" value="7">
							<button type="submit" value="modify_user">Modifier</button>
							<button type="submit" value="remove_user">Supprimer</button>
						</form>
					<?php
				}
				?>
			</div>
			<h1>Categories</h1>
			<div><?php
				foreach($categories as $item)
				{
					?>
						<form action="index.php" method="POST" class="admin_form">
							<input placeholder="Titre" type="text" name="category" value="<?php echo $item['category']; ?>">
							<input placeholder="Priorité" type="text" name="priority" value="<?php echo $item['priority']; ?>">
							<input placeholder="Parent" type="text" name="parent" value="<?php echo $item['parent']; ?>">
							<input placeholder="Lien image" type="text" name="img" value="<?php echo $item['img']; ?>">
							<input type="hidden" name="id" value="<?php echo $item['id']; ?>">
							<input type="hidden" name="page" value="7">
							<button type="submit" value="modify_category">Modifier</button>
							<button type="submit" value="remove_category">Supprimer</button>
						</form>
					<?php
				}
				?>
				<br>
				<form action="index.php" method="POST" class="admin_form">
					<input placeholder="Titre" type="text" name="category">
					<input placeholder="Priorité" type="text" name="priority">
					<input placeholder="Parent" type="text" name="parent">
					<input placeholder="Lien image" type="text" name="img">
					<input type="hidden" name="page" value="7">
					<button type="submit" value="add_article">Ajouter</button>
				</form>
			</div>
		</div>
		<?php
	}
	else
		echo "<h1>You are not admin !</h1>"
?>
