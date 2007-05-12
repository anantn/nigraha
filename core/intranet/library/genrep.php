<?php
	include ("auth.php");
	require_once ("../../protected/conn_lib.php");
	mysql_select_db("library");
	$query = mysql_query("SELECT * FROM books WHERE status = 'Approved' AND generated = '0'");
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Report Generated!</title>
<style type="text/css">
<!--
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; font-size: 24px; }
-->
</style>
</head>
<body>
<p class="style2">The Library,<br />
  Malaviya National Institute of Technology,<br />
  Jaipur 302017</p>
<span class="style1">
<? $today = date("d-m-Y");
   echo "<p class=\"style2\">".$today."</p>";
?>
</span>
<p align="center" class="style3">Book Report</p>
<table width="100%" border="1">
  <tr>
    <td class="style1"><strong>Book Title </strong></td>
    <td class="style2">Author</td>
    <td class="style2">Publisher</td>
    <td class="style2">Edition</td>
    <td class="style2">ISBN</td>
    <td class="style2">Approx. Cost (Rs.) </td>
    <td class="style2">Book Type </td>
  </tr>

<?	while ($row = mysql_fetch_assoc($query))
	{   
?>		
  <tr>
	<td class="style1"><? echo $row['title'] ?></td>
	<td class="style1"><? echo $row['author'] ?></td>
	<td class="style1"><? echo $row['publisher'] ?></td>
	<td class="style1"><? echo $row['edition'] ?></td>
	<td class="style1"><? echo $row['ISBN'] ?></td>
	<td class="style1"><? echo $row['appcost'] ?></td>
	<td class="style1"><? echo $row['booktype'] ?></td>
  </tr>
<? 	$exec = mysql_query("UPDATE books SET generated = '1' WHERE idno = ".$row['idno']);
	}
?>
</table>

</body>
</html>
