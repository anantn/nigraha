<?php /* Smarty version 2.6.10, created on 2005-10-27 12:58:31
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_image', 'index.tpl', 14, false),array('modifier', 'capitalize', 'index.tpl', 26, false),)), $this); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="academic.css" />
<title><?php echo $this->_tpl_vars['global_title']; ?>
</title>
</head>
<body>
<div id="thetop">
</div>
<div id="container">
  <div id="main">
    <div id="logo">
      <h1><?php echo $this->_tpl_vars['root_name']; ?>
</h1>
      <br>
      <p><?php echo smarty_function_html_image(array('file' => $this->_tpl_vars['root_logo'],'width' => 150,'height' => 143), $this);?>
<br>
        <br>
        <?php echo $this->_tpl_vars['root_title']; ?>
 </p>
    </div>
    <div id="intro">
      <h2><?php echo $this->_tpl_vars['main_title1']; ?>
</h2>
      <p align="justify"><?php echo $this->_tpl_vars['main_content1']; ?>
</p>
    </div>
    <div id="intro">
      <h2><?php echo $this->_tpl_vars['main_title2']; ?>
</h2>
      <p><?php echo $this->_tpl_vars['cook_name']; ?>
<br />
        <?php echo $this->_tpl_vars['ud_acc']; ?>
<br />
        <?php echo ((is_array($_tmp=$this->_tpl_vars['cook_type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 </p>
    </div>
    <div class="clear">&nbsp;</div>
  </div>
  <div id="sidebar">
    <h2 class="sidelink menuheader"><?php echo $this->_tpl_vars['side_title']; ?>
</h2>
    <?php $_from = $this->_tpl_vars['side_link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr_data']):
?> <a class="sidelink" href="<?php echo $this->_tpl_vars['curr_data']['url']; ?>
"><?php echo $this->_tpl_vars['curr_data']['name']; ?>
</a> <?php endforeach; endif; unset($_from); ?>       </div>
<div class="clear">&nbsp;</div>
</div>
<div id="footer">&copy; 2005 <?php echo $this->_tpl_vars['global_iname']; ?>
</div>
</body>
</html>