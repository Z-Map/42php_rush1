<?php

if (empty($html_head))
	$html_head = krnl_html_head_init();

if (empty($html_head))
	$html_config = krnl_html_config_init();

if (empty($html_head))
	$html_content = krnl_html_content_init();

?>
<!DOCTYPE html>

<html>
	<head charset="<?php echo $html_head['charset']; ?>" >
		<title><?php echo $html_head['title']; ?></title>
	</head>
	<body>
		<?php if (!@include $html_config['context'].'header.php')  include 'header.php'; ?>
		<h1>LOLILOL</h1>
		<?php if (!@include $html_config['context'].'nav.php')  include 'nav.php'; ?>

		<?php echo krnl_get_formated_content($html_content); ?>

		<?php if (!@include $html_config['context'].'footer.php')  include 'footer.php'; ?>
	</body>
</html>
