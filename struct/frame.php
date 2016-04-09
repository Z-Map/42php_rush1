<?php

if (empty($html_head))
	$html_head = krnl_HtmlHeadInit();

if (empty($html_head))
	$html_config = krnl_HtmlConfigInit();

if (empty($html_head))
	$html_content = krnl_HtmlContentInit();

?>
<!DOCTYPE html>

<html>
	<head charset="<?php echo $html_head['charset']; ?>" >
		<title><?php echo $html_head['title']; ?></title>
		<link rel="stylesheet" type="text/css" href="ressources/design.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	</head>
	<body>
		<?php if (!@include $html_config['context'].'header.php')  include 'header.php'; ?>
		<?php if (!@include $html_config['context'].'nav.php')  include 'nav.php'; ?>

		<?php echo krnl_GetFormatedContent($html_content, $html_config, $html_head); ?>

		<?php if (!@include $html_config['context'].'footer.php')  include 'footer.php'; ?>
	</body>
</html>
