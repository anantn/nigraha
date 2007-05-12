<?php
	include ("auth.php");
	require_once ("../../protected/conn_lib.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css" href="library.css" />
<title>Book Recommendations</title>
</head>
<body>
<div id="title">
  <h1>MNIT LIBRARY </h1>
</div>
<div id="container">
  <div id="sidebar">
    <h2>&nbsp;</h2>
    <a class="menu" href="index.php">Home</a> <a class="menu" href="addbook.php">Recommend</a> <a class="menu" href="status.php">Status</a> <a class="menu"></a> <a class="menu" href="../../index.php">MNIT Home</a> <a class="menu" href="../index.php">IntraNET</a></div>
  <?php
		$query = mysql_query("SELECT * FROM books WHERE status = 'Pending'");
		$num = mysql_num_rows($query);
		$arr = $_COOKIE['posts'];
		$arr = unserialize($arr);
		foreach($arr as $foo)
		{	$val = explode(",", $foo);
			if($val[0]=='Library' AND $val[1]=='Advisor') $isallowed = 1;
			else $isallowed = 0;
		}		
?>
  <div id="main">
    <h2>Welcome <? echo $_COOKIE["name"] ?></h2>
    <p>Please use the links on the right to navigate through the application. </p>
    <? if($_COOKIE['access']=='dadmin' OR $_COOKIE['access']=='sadmin' OR $_COOKIE['access']=='admin') echo "<p><b>You have ".$num." new books to <a href=\"approve.php\">approve</a>!<b></p>"; ?>
    <p><a href="addbook.php">Recommend a Book</a><br />
      <a href="status.php">View Status of Books</a><br />
      <? if($_COOKIE['access']=='dadmin' OR $_COOKIE['access']=='sadmin' OR $_COOKIE['access']=='admin') echo "<a href=\"approve.php\">Approve Books</a><br />"; ?>
      <? if($isallowed==1) echo"<a href=\"generate.php\">Generate Report</a></p>"; ?>
    <p><a href="../intrahome.php">Go back to MNIT IntraNET</a><br />
      <a href="../logout.php">Logout</a></p>
    <p>&nbsp;</p>
    <p class="credits">&copy; 2005 MNIT</p>
  </div>
  <div id="footer"></div>
</div>
</body>
</html>
