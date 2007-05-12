<?php
	include ("auth.php");
	require_once ("../../protected/conn_hostel.php");
	switch($_COOKIE['access'])
	{	case 'sadmin': $acc = 'Super Administrator';
						break;
		case 'dadmin': $acc = 'Department Administrator';
						break;
		case 'admin': $acc = 'Global Administrator';
						break;
		case 'post': $acc = 'Global Posting';
						break;
		case 'dpost': $acc = 'Department Posting';
						break;
		case 'user': $acc = 'Ordinary User';
						break;				
		case 'ban': $acc = 'Banned!';
						break;		
	}		
	function sentenceCase($s)
	{	$str = strtolower($s);
		$cap = true;
		$ret = '';
  		for($x = 0; $x < strlen($str); $x++)
		{	$letter = substr($str, $x, 1);
			if($letter == "." || $letter == "!" || $letter == "?")
			{	$cap = true;
       		}
			elseif($letter != " " && $cap == true)
			{	$letter = strtoupper($letter);
	    	    $cap = false;
	    	}
		$ret .= $letter;
			}
     return $ret;
	 }			
	$arr = $_COOKIE['posts'];
	$arr = unserialize($arr);
	foreach($arr as $foo)
	{	$val = explode(",", $foo);
		if($val[0]=='HO' AND $val[1]=='Incharge') $is = 1;
		else if($val[0]=='HO' AND $val[1]=='MessAssist') $is = 2;
		else if($val[0]=='HO' AND $val[1]=='Warden') $is = 3;
		else $is = 0;
	}			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<meta name="description" content="_your description goes here_" />
<meta name="keywords" content="_your,keywords,goes,here_" />
<meta name="author" content="_RAHUL MURMURIA (MNIT BATCH 2004)_  / Original design: Andreas Viklund - http://andreasviklund.com/" />
<link rel="stylesheet" type="text/css" href="academic.css" />
<title>MNIT - Hostel Information System</title>
</head>

<body>
<div id="thetop">
</div>

<div id="container">
<div id="main">

<div id="logo">
<h1>[MNIT]</h1>
<p><br />
  <img src="p-hostel.gif" alt="" width="150" height="143" /><br />
  <br />
The Hostel Information System</p>
</div>

<div id="intro">
<h2><a id="maincontent"></a>Welcome to MNIT Hostels! </h2>
<p align="justify">The MNIT Hostel Information System enables you to: 
					<li>Search Hostel List</li>
					<li>Check and pay For Mess Bills</li>
					<li>Monitor Transactions of Caution Deposits</li>
					<li>Take part in hostel specific forums</li>
					<li>Post complaints to Hostel Athorities</li>
					<li>See the Warden's Page</li><br> 
					and a lot more... Just click on the links in the right pane.</p>
</div>
<div id="intro">
<h2><a id="maincontent"></a>Current User:</h2>
<p><? echo $_COOKIE['name'] ?><br /><? echo $acc ?><br /><? echo sentencecase($_COOKIE['type']) ?></p>
</div>
<div class="clear">&nbsp;</div>
</div>

<div id="sidebar">

<h2 class="sidelink menuheader"><a id="sitemenu"></a>Your Menu :</h2>
<a class="sidelink" href="index.php">Home</a>
<span class="hide"> | </span>
<a class="sidelink" href="hostel.php">Go to Hostel Homepages</a>
<a class="sidelink" href="search.php">Find a student</a>
<a class="sidelink" href="messcheck.php">Check mess bill</a>
<span class="hide"> | </span>
<?	if($is==1)
		echo"<a class=\"sidelink\" href=\"allot.php\">Allot Rooms</a><span class=\"hide\"> | </span>";
	if($is==2)
		echo"<a class=\"sidelink\" href=\"messentry.php\">Enter Mess Bill</a><span class=\"hide\"> | </span>";
	if($is==3)
		echo"<a class=\"sidelink\" href=\"warden.php\">Warden's Page</a><span class=\"hide\"> | </span>";
?>
<br>
<span class="hide"> | </span>
<a class="sidelink" href="../intrahome.php">Back to IntraNET  </a>
<span class="hide"> | </span>
<a class="hide" href="#top" accesskey="1">Top of page</a>

<h3>Tutorials</h3>
<p>Links to the tutorials: <br />
- <a href="index.html">For Students </a><br />
- <a href="text-only.html">For Administration</a></p>
</div>
<div class="clear">&nbsp;</div>
</div>

<div id="footer">&copy; 2005 MNIT</div>

</body>
</html>