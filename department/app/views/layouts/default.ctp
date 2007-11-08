<?php
/* SVN FILE: $Id: default.ctp 5847 2007-10-22 03:39:01Z phpnut $ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2007, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2007, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake.libs.view.templates.layouts
 * @since			CakePHP(tm) v 0.10.0.1076
 * @version			$Revision: 5847 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2007-10-21 22:39:01 -0500 (Sun, 21 Oct 2007) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php print $html->charset('UTF-8') ?>
	<?php print $javascript->link('prototype') ?>
	<?php print $javascript->link('scriptaculous.js') ?>
	<title>
		<?php echo $title_for_layout;?>
	</title>
	<link rel="icon" href="<?php echo $this->webroot;?>favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="<?php echo $this->webroot;?>favicon.ico" type="image/x-icon" />
	<?php echo $html->css('style');?>
	<?php echo $scripts_for_layout;?>
</head>
<body>
	<div class="header">
		<div class="header_interior"><img src="<?php echo $this->webroot;?>images/logo.gif" alt="Logo" width="44" height="44" style="float:left; margin-right:10px;" /> 
  		<h1 class="title"><a href="<?php echo $this->webroot;?>">MNIT Faculty Pages</a></h1></div>
	</div>
	<div class="content_body">
		<div class="content_interior">
		<?php echo $content_for_layout;?>
		</div>
		<br clear="all" />
	</div>
	<div class="footer"><div class="footer-inner">
		<div style="text-align:center;">Copyright 2007, <a href="http://www.mnit.ac.in/">Malaviya National Institute of Technology</a></div>
		<div style="text-align:center;">Powered by <a href="http://code.kix.in/projects/nigraha">Nigraha</a></div>
	</div>
	<br clear="all" />
</body>
</html>
	<?php echo $cakeDebug?>
</body>
</html>
