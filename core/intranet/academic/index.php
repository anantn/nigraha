<?php
	include ("auth.php");
	require_once ("../../protected/conn_acad.php");
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
		if($val[0]=='AA' AND $val[1]=='Incharge') $is = 1;
		else $is = 0;
		if($val[0]==$_COOKIE['dept'] AND $val[1]=='HOD') $is = 2;
	}			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<meta name="description" content="_your description goes here_" />
<meta name="keywords" content="_your,keywords,goes,here_" />
<meta name="author" content="_your name goes here_  / Original design: Andreas Viklund - http://andreasviklund.com/" />
<link rel="stylesheet" type="text/css" href="academic.css" />
<title>MNIT - Academic Management System</title>
</head>

<body>
<div id="thetop">
</div>

<div id="container">
<div id="main">

<div id="logo">
<h1>[MNIT]</h1>
<p><br />
  <img src="p-academic.gif" alt="" width="150" height="143" /><br />
  <br />
The Academic Management System</p>
</div>

<div id="intro">
<h2><a id="maincontent"></a>Welcome to MNIT AcaD! </h2>
<p align="justify">The MNIT Academic Management System enables all faculty, students and administration of the institution to carry out all their academic duties in a more easier, professional and modern manner! Please ensure that you are confident of using the system before you use it. It's easy to learn if you haven't yet, just take a look at the tutorials <a href="tutorial.php">here</a></p>
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
<a class="sidelink" href="course.php">Courses</a>
<span class="hide"> | </span>
<?	if($_COOKIE['type']=='student') echo "<a class=\"sidelink\" href=\"report.php\">Progress Report</a><span class=\"hide\"> | </span>"; 
	if($is==1)
	{	echo"<a class=\"sidelink\" href=\"addcourse.php\">Add Courses</a><span class=\"hide\"> | </span>";
		echo"<a class=\"sidelink\" href=\"courselist.php\">Make Course Lists</a><span class=\"hide\"> | </span>";
	}
	if($_COOKIE['type']=='faculty') echo "<a class=\"sidelink\" href=\"data.php\">Data Entry</a><span class=\"hide\"> | </span>"; 
	if($is==2)
		echo"<a class=\"sidelink\" href=\"allot.php\">Allot Courses</a><span class=\"hide\"> | </span>";
?>
<a class="sidelink" href=""></a>
<span class="hide"> | </span>
<a class="sidelink" href="../intrahome.php">Back to IntraNET  </a>
<span class="hide"> | </span>
<a class="hide" href="#top" accesskey="1">Top of page</a>

<h3>Tutorials</h3>
<p>Links to the tutorials: <br />
- <a href="index.html">For Students </a><br />
- <a href="noimg.html">For Faculty </a><br />
- <a href="text-only.html">For Administration</a></p>
</div>
<div class="clear">&nbsp;</div>
</div>

<div id="footer">&copy; 2005 MNIT</div>

</body>
</html>