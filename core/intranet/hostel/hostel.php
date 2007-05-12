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
<title>MNIT - Hostel Homepages</title>
</head>

<body>
<div id="thetop">
</div>

<div id="container">
<div id="main">

<div id="intro">
<h2><a id="maincontent"></a>Visit Our Hostels!</h2>

<p align="justify">Click on the hostel to go to homepage:</p>
<center>
<table width="80%" border="0">
<tr>	<td>
<p><br /><img src="p-hostel.gif" alt="" width="112" height="100" /><br />
<br /><a>Hostel 1</a></p></td>	
<td>
<p><br /><img src="p-hostel.gif" alt="" width="112" height="100" /><br />
<br />Hostel 2</p></td>	</tr>

<tr>	<td>
<p><br /><img src="p-hostel.gif" alt="" width="112" height="100" /><br />
<br />Hostel 3</p></td>	
<td>
<p><br /><img src="p-hostel.gif" alt="" width="112" height="100" /><br />
<br />Hostel 4</p></td>	</tr>

<tr>	<td>
<p><br /><img src="p-hostel.gif" alt="" width="112" height="100" /><br />
<br />Hostel 5</p></td>	
<td>
<p><br /><img src="p-hostel.gif" alt="" width="112" height="100" /><br />
<br />Hostel 6</p></td>	</tr>

<tr>	<td>
<p><br /><img src="p-hostel.gif" alt="" width="112" height="100" /><br />
<br />Hostel 7</p></td>	
<td>
<p><br /><img src="p-hostel.gif" alt="" width="112" height="100" /><br />
<br />Hostel 8</p></td>	</tr>
</table></center>	
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
<a class="sidelink" href="messcheck.php">Check mess bill</a>
<span class="hide"> | </span>
<?	if($is==1)
		echo"<a class=\"sidelink\" href=\"allot.php\">Allot Rooms</a>
		<a class=\"sidelink\" href=\"search.php\">Find a student</a>
		<span class=\"hide\"> | </span>";
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