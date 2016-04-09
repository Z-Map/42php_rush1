<?php

function krnl_HtmlHeadInit($title = 'A Web Site')
{
	return (array(
		'title' => $title,
		'charset' => 'utf-8',

	));
}

function krnl_HtmlConfigInit()
{
	return (array(
		'context' => '',
	));
}

function krnl_HtmlContentInit()
{
	return (array(
		'plain_content' => "",
		''
	));
}
