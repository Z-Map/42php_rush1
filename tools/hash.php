#!/usr/bin/php
<?php
$salt = "";
if ($argc == 2)
	echo hash("whirlpool", $argv[1].$salt)."\n";
?>
