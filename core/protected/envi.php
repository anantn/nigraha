<?php
	$basedir = "http://172.16.1.14/";
	$server = "localhost";
	$user = "root";
	$pass = "password";
	$conn = mysql_connect($server, $user, $pass);
	mysql_select_db('mnit');
	
	$arr=array('home', 'acad', 'admin', 'gov', 'research', 'stud', 'insti', 'intra');
	
	require('/usr/share/php/smarty/libs/Smarty.class.php');
	$mnit = new Smarty();

	$mnit->template_dir = '/var/www/smarty/templates';
	$mnit->compile_dir = '/var/www/smarty/templates_c';
	$mnit->cache_dir = '/var/www/smarty/cache';
	$mnit->config_dir = '/var/www/smarty/configs';

	$mnit->assign('thefullname', 'Malaviya National Institute of Technology');
	$mnit->assign('theshortname', 'MNIT');
	$mnit->assign('thearray',$arr);
	$mnit->assign('path_root',$basedir);
	$mnit->assign('path_images',$basedir."images/");
?>
