<?php
	include ("auth.php");
	require_once ("../../protected/conn_lib.php");
	mysql_select_db("library");
	$query = mysql_query("SELECT * FROM books WHERE status = 'Approved' AND generated = '0'");
	$num = mysql_num_rows($query);
	$arr = $_COOKIE['posts'];
	$arr = unserialize($arr);
		foreach($arr as $foo)
	{	$val = explode(",", $foo);
		if($val[0]=='Library' AND $val[1]=='Advisor') 
		{	$is = 1;
		}
		else
		{	$is = 0;
		}
	}		
	if($is==0)
	{	echo"Illegal Operation! NO HACKING ALLOWED!!<meta HTTP-EQUIV=\"refresh\" content=0;url=\"index.php\">";
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css" href="library.css" />
<title>Purchasal Enquiry Generation</title>
</head>
<body>
<div id="title">
  <h1>MNIT LIBRARY </h1>
</div>
<div id="container">
  <div id="sidebar">
    <h2>&nbsp;</h2>
    <a class="menu" href="index.php">Home</a> <a class="menu" href="addbook.php">Recommend</a> <a class="menu" href="status.php">Status</a> <a class="menu"></a> <a class="menu" href="../../index.php">MNIT Home</a> <a class="menu" href="../index.php">IntraNET</a></div>
  <div id="main">
    <h2>Purchasal Report Generation</h2>
    <p>IMPORTANT INSTRUCTIONS! Once you click the Generate Report link, a printable page of a sample enquiry for quotation will popup with the list of all books that have been approved but the report for those have not yet been generated.</p>
	<p>ALSO THIS IS A ONE-TIME PROCESS! Once a report of these books are generated, they cannot be generated again!</p>
    <p>There are <? echo $num ?> books for which the report has not been generated. Are you sure you want to do this? (The report opens in a new page)</p>
<? if($num!=0) echo "<p><a href=\"genrep.php\" target=\"_blank\">Generate Report</a></p>"; ?>
	<p>&nbsp;</p>
    <p class="credits">&copy; 2005 MNIT</p>
  </div>
  <div id="footer"></div>
</div>
</body>
</html>