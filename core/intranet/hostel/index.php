<?php
include('../../smarty/Smarty.class.php');
$smarty = new Smarty;
$smarty->template_dir = 'templates/'; 
$smarty->compile_dir = 'templates_c/'; 
$smarty->config_dir = 'configs/'; 
$smarty->cache_dir = 'cache/'; 
$smarty->caching = false;

$smarty->assign("root_name","[MNIT]");
$smarty->assign("root_logo","p-hostel.gif");
$smarty->assign("root_title","The Hostel Information System");
$smarty->assign("main_title1","Welcome to MNIT Hostels!");
$smarty->assign("main_content1","The MNIT Hostel Information System enables you to:<li>Search Hostel List</li><li>Check and pay For Mess Bills</li><li>Monitor Transactions of Caution Deposits</li><li>Post complaints to Hostel Athorities</li><li>See the Warden's Page</li><br>and a lot more... Just click on the links in the right pane.");
$smarty->assign("main_title2","Current User: ");
$smarty->assign("side_title","Your Menu: ");

$arr = $_COOKIE['posts'];
$arr = unserialize($arr);
//foreach($arr as $foo)
{	$val = explode(",", $arr);
	if($val[0]=='HO') $smarty->assign("ud_post",$val[1]);
	else $smarty->assign("ud_post","NonHO");
}			

/* cookies also to be included in master .inc */
$smarty->assign("cook_name", $_COOKIE['name']);
$smarty->assign("cook_type", $_COOKIE['type']);

/* include in master .inc */
switch($_COOKIE['access'])
{	case 'sadmin': $smarty->assign("ud_acc","Super Administrator");
		break;
	case 'dadmin': $smarty->assign("ud_acc","Department Administrator");
		break;
	case 'admin': $smarty->assign("ud_acc","Global Administrator");
		break;
	case 'post': $smarty->assign("ud_acc","Global Posting");
		break;
	case 'dpost': $smarty->assign("ud_acc","Department Posting");
		break;
	case 'user': $smarty->assign("ud_acc","Ordinary User");
		break;				
	case 'ban': $smarty->assign("ud_acc","Banned!");
		break;		
}		
/* end include */

/* global vars store data common to the entire page */
$gp0 = "Warden";
$gp1 = "InCharge";
$gp2 = "MessAssist";
$sidelink = array();
$smarty->assign("global_title", "MNIT Hostel Information System");
switch($ud_post)
{	case $gp0:	;
	case $gp1:	array_push($sidelink, array("name" => "Allot Rooms", "url" => "allot.php"));
	case $gp2: 	array_push($sidelink, array("name" => "Mess Dues Entries", "url" => "messentry.php"));
				array_push($sidelink, array("name" => "Find a Student", "url" => "search.php"));
	default: 	array_push($sidelink, array("name" => "Check Mess Dues", "url" => "messcheck.php"));
				array_push($sidelink, array("name" => "Hostel Information", "url" => "hostel.php"));
				array_push($sidelink, array("name" => "Home", "url" => "index.php"));
				array_push($sidelink, array("name" => "Back to IntraNET", "url" => "../index.php"));
				break;											
}
$smarty->assign("side_link",$sidelink);
$smarty->assign("global_iname","MNIT");
//include ("auth.php");
require_once ("../../protected/conn_hostel.php");
$smarty->display('index.tpl');
?>
