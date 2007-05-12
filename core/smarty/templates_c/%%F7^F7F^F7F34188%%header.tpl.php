<?php /* Smarty version 2.6.9, created on 2006-01-08 14:14:52
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_image', 'header.tpl', 15, false),)), $this); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to MNIT.ac.in!</title>
<script language="javascript" src="ts_files/scroll.js"></script>
<link href="<?php echo $this->_tpl_vars['path_root']; ?>
css/style.css" rel="stylesheet" type="text/css" />
</head>
<?php if ($this->_tpl_vars['main_page']): ?>
    <body style="background-image:url(<?php echo $this->_tpl_vars['path_images']; ?>
pixel.gif);">
<?php endif; ?>
<center>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="header">
    <?php if ($this->_tpl_vars['main_page']): ?>
	    <?php echo smarty_function_html_image(array('file' => $this->_tpl_vars['root_logo'],'width' => 90,'height' => 95), $this);?>

        <h1><?php echo $this->_tpl_vars['heading']; ?>
</h1>
    <?php else: ?>
        <h3><?php echo $this->_tpl_vars['heading']; ?>
</h3>
    <?php endif; ?>
    <h2><?php echo $this->_tpl_vars['subheading']; ?>
</h2>
</div>