<?php

function krnl_GetTitle($headcfg = null)
{
	global $html_head;
	if (!$headcfg)
		return ($html_head['title']);
	return ($headcfg['title']);
}

function krnl_Title($headcfg = null)
{
	echo krnl_GetTitle($headcfg);
}
