<?php

function krnl_Title($headcfg = null)
{
	global $html_head;
	if (!$headcfg)
		return ($html_head['title']);
	return ($headcfg['title']);
}
