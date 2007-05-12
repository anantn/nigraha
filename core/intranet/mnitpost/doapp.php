<?php
	if(isset($_GET['id']))
	{}
	else
	{	echo "<script language=\"javascript\">window.close();</script>";
		exit();
	}
	include ("auth.php");
	require_once ("../../protected/envi.php");
	mysql_select_db("mnitpost");
		
	if($_COOKIE['access']=='dadmin' OR $_COOKIE['access']=='sadmin' OR $_COOKIE['access']=='admin' OR $isallowed==1)
	{}
	else
	{	echo"<span class=\"header\">You are not authorised to view this Page. You are being redirected to the login page</span>";
		echo"<br>If your browser doesn't support redirection, Click <a href=\"../index.php\">Here</a> to go...";
		echo"<meta HTTP-EQUIV=\"refresh\" content=0;url=\"index.php\">";
		exit();
	}	
	$getdata = mysql_query("SELECT * FROM ".$_GET['type']." WHERE idno = ".$_GET['id']);
	$thedata = mysql_fetch_assoc($getdata);
	if($_COOKIE['access']=='dadmin')
	{	if($thedata['dept']!=$_COOKIE['dept']) 
		{	echo"Illegal Operation! YOU CANNOT APPROVE OTHER DEPARTMENT'S POSTS!!<meta HTTP-EQUIV=\"refresh\" content=0;url=\"index.php\">";
			exit();
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<title>Approve <? echo $_GET['type'] ?> #<? echo $thedata['idno'] ?></title>
</head>
<body>
<?php
	if(isset($_POST['idis']))
	{	if($_POST['status']=='1')
		{	$updat = mysql_query("UPDATE ".$_GET['type']." SET status = 'active' WHERE idno = ".$_POST['idis']);
			echo "The ".$_GET['type']." has been approved and has been forwarded to the News/Notice Board! Its is now available to all who have access.";
			echo "<br /><a href=\"\" onClick=\"window.close();\">Click here</a> to close the window!";
		}
		if($_POST['status']=='2')
		{	$updat = mysql_query("UPDATE ".$_GET['type']." SET status = 'returned' WHERE idno = ".$_POST['idis']);
			echo "The ".$_GET['type']." has been returned for reconsidering. The person who posted it should be notified";
			echo "<br /><a href=\"\" onClick=\"window.close();\">Click here</a> to close the window!";
		}
		if($_POST['status']=='3')
		{	$updat = mysql_query("UPDATE ".$_GET['type']." SET status = 'rejected' WHERE idno = ".$_POST['idis']);
			echo "The ".$_GET['type']." has been REJECTED! This means it will be archived in the database as discarded element. Are you sure you want to leave it that way? If not please approach the SuperAdmin and get this rejection UNDONE using phpMyAdmin...";
			echo "<br /><a href=\"\" onClick=\"window.close();\">Click here</a> to close the window!";
		}
	}
	else
	{	
?>
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
    <td><? echo $thedata['title'] ?></td>
  </tr>
</table>
<br />
<form id="form1" method="post" action="">
  <input type="hidden" name="idis" id="idis" value="<? echo $thedata['idno'] ?>" />
  <select name="status" id="status">
    <option value="1">Approve</option>
    <option value="2">Return</option>
    <option value="3">Reject</option>
  </select>
  <input type="submit" name="Submit" value="Go!" />
</form>
<p>&nbsp;</p>
<? } ?>
</body>
</html>
