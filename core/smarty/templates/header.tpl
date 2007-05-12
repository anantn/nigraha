<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to MNIT.ac.in!</title>
<script language="javascript" src="ts_files/scroll.js"></script>
<link href="{$path_root}css/style.css" rel="stylesheet" type="text/css" />
</head>
{if $main_page}
    <body style="background-image:url({$path_images}pixel.gif);">
{/if}
<center>
{include file="menu.tpl"}
<div id="header">
    {if $main_page}
	    {html_image file=$root_logo width=90 height=95}
        <h1>{$heading}</h1>
    {else}
        <h3>{$heading}</h3>
    {/if}
    <h2>{$subheading}</h2>
</div>
