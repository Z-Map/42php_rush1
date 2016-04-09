<?php

function krnl_html_head_init($title = 'A Web Site')
{
	return (array(
		'title' => $title,
		'charset' => 'utf-8',

	));
}

function krnl_html_config_init()
{
	return (array(
		'context' => '',
	));
}

function krnl_html_content_init()
{
	return (array(
		'plain_content' => "",
		''
	));
}
