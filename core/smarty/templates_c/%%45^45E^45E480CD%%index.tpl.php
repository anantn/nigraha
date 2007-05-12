<?php /* Smarty version 2.6.9, created on 2006-01-09 18:58:32
         compiled from index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  if ($this->_tpl_vars['main_page']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "body.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  else: ?>

<?php echo '
<script type="text/javascript">
function openWin(myURL)
{       window.open(myURL.href,"win",\'width=600,height=400,resizable=no,top=no,left=no,scrollbars=yes,statusbars=no\');
		return false;
}
</script>
'; ?>


<div id="mainbar">
    <?php $_from = $this->_tpl_vars['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['heading'] => $this->_tpl_vars['sec']):
?>
        <h1><?php echo $this->_tpl_vars['heading']; ?>
</h1>
        <?php $_from = $this->_tpl_vars['sec']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['con']):
?>
            <?php if ($this->_tpl_vars['con']['type'] == 'data'): ?>
                <p><?php echo $this->_tpl_vars['con']['data']; ?>
</p>
            <?php else: ?>
                <a href=<?php echo $this->_tpl_vars['path_root']; ?>
popup.php?secid=<?php echo $this->_tpl_vars['con']['secid']; ?>
&pid=<?php echo $this->_tpl_vars['con']['paraid']; ?>
&table=<?php echo $this->_tpl_vars['table']; ?>
 
                   onClick="return openWin(this);"><?php echo $this->_tpl_vars['con']['data']; ?>
</a><br>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    <?php endforeach; endif; unset($_from);  endif; ?>
</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>