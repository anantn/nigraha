<?php
	if(isset($_GET['id']))
	{}
	else
	{	echo "<script language=\"javascript\">window.close();</script>";
		exit();
	}
	//include ("auth.php");
	require_once ("../../protected/envi.php");
	mysql_select_db("mnitpost");
		
	
	$getdata = mysql_query("SELECT * FROM ".$_GET['type']." WHERE idno = ".$_GET['id']);
	$thedata = mysql_fetch_assoc($getdata);
	if($_COOKIE['access']=='dadmin')
	{	if($thedata['dept']!=$_COOKIE['dept']) 
		{	echo"Illegal Operation! YOU DONOT HAVE PERMISSIONS TO VIEW OTHER DEPARTMENT'S POSTS!!<meta HTTP-EQUIV=\"refresh\" content=0;url=\"index.php\">";
			exit();
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<title>View <? echo $_GET['type'] ?> #<? echo $thedata['idno'] ?></title>
</head>
<body>

<table width="100%" border="1">
  <tr>
    <td width="20%"><strong>Headline </strong></td>
    <td width="80%"><? echo $thedata['headline'] ?></td>
  </tr>
  <tr>
    <td><strong>Full Story </strong></td>
    <td><? echo $thedata['data'] ?></td>
  </tr>
  <tr>
    <td><strong>Posted By </strong></td>
    <td><? echo $thedata['postby'] ?></td>
  </tr>
  <tr>
    <td><strong>Posted On </strong></td>
    <td><? echo $thedata['postedon'] ?></td>
  </tr>
  <tr>
    <td><strong>Status </strong></td>
    <td><? echo $thedata['status'] ?></td>
  </tr>
  <tr>
    <td><strong>Last Modified </strong></td>
    <td><? echo $thedata['lastmodified'] ?></td>
  </tr>
</table>
<br />
<? echo "<br /><a href=\"\" onClick=\"window.close();\">Click here</a> to close the window!";?>
		
<p>&nbsp;</p>

</body>
</html>
