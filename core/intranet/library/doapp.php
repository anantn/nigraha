<?php
	if(isset($_GET['id']))
	{}
	else
	{	echo "<script language=\"javascript\">window.close();</script>";
		exit();
	}
	include ("auth.php");
	require_once ("../../protected/conn_lib.php");
	mysql_select_db("library");
	$arr = $_COOKIE['posts'];
	$arr = unserialize($arr);
	foreach($arr as $foo)
	{	$val = explode(",", $foo);
		if($val[0]=='Library' AND $val[1]=='Advisor') $isallowed = 1;
		else $isallowed = 0;
	}		
	if($_COOKIE['access']=='dadmin' OR $_COOKIE['access']=='sadmin' OR $_COOKIE['access']=='admin' OR $isallowed==1)
	{}
	else
	{	echo"<span class=\"header\">You are not authorised to view this Page. You are being redirected to the login page</span>";
		echo"<br>If your browser doesn't support redirection, Click <a href=\"../index.php\">Here</a> to go...";
		echo"<meta HTTP-EQUIV=\"refresh\" content=0;url=\"index.php\">";
		exit();
	}	
	$getdata = mysql_query("SELECT * FROM books WHERE idno = ".$_GET['id']);
	$thedata = mysql_fetch_assoc($getdata);
	if($_COOKIE['access']=='dadmin')
	{	if($thedata['dept']!=$_COOKIE['dept']) 
		{	echo"Illegal Operation! NO HACKING ALLOWED!!<meta HTTP-EQUIV=\"refresh\" content=0;url=\"index.php\">";
			exit();
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<title>Approve Book #<? echo $thedata['idno'] ?></title>
</head>
<body>
<?php
	if(isset($_POST['idis']))
	{	if($_POST['status']=='1')
		{	$updat = mysql_query("UPDATE books SET status = 'Approved' WHERE idno = ".$_POST['idis']);
			echo "The Book has been approved and has been forwarded to the librarian to make the purchase";
			echo "<br /><a href=\"\" onClick=\"window.close();\">Click here</a> to close the window!";
		}
		else
		{	$updat = mysql_query("UPDATE books SET status = 'Rejected' WHERE idno = ".$_POST['idis']);
			echo "The Book has been rejected and will NOT be forwarded to the librarian to make the purchase";
			echo "<br /><a href=\"\" onClick=\"window.close();\">Click here</a> to close the window!";
		}
	}
	else
	{	
?>
<table width="100%" border="1">
  <tr>
    <td width="20%"><strong>Title</strong></td>
    <td width="80%"><? echo $thedata['title'] ?></td>
  </tr>
  <tr>
    <td><strong>Author</strong></td>
    <td><? echo $thedata['author'] ?></td>
  </tr>
  <tr>
    <td><strong>Publisher</strong></td>
    <td><? echo $thedata['publisher'] ?></td>
  </tr>
  <tr>
    <td><strong>Edition</strong></td>
    <td><? echo $thedata['edition'] ?></td>
  </tr>
  <tr>
    <td><strong>ISBN</strong></td>
    <td><? echo $thedata['ISBN'] ?></td>
  </tr>
  <tr>
    <td><strong>Approx. Cost </strong></td>
    <td><? echo $thedata['title'] ?></td>
  </tr>
  <tr>
    <td><strong>Type</strong></td>
    <td><? echo $thedata['booktype'] ?></td>
  </tr>
  <tr>
    <td><strong>Recommended On </strong></td>
    <td><? echo $thedata['recoon'] ?></td>
  </tr>
</table>
<br />
<form id="form1" method="post" action="">
  <input type="hidden" name="idis" id="idis" value="<? echo $thedata['idno'] ?>" />
  <select name="status" id="status">
    <option value="1">Approve</option>
    <option value="0">Reject</option>
  </select>
  <input type="submit" name="Submit" value="Go!" />
</form>
<p>&nbsp;</p>
<? } ?>
</body>
</html>
