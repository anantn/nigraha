<?php
	include ("auth.php");
	require_once ("../../protected/conn_lib.php");
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Refresh" content="10" />
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css" href="library.css" />
<title>Approve Books</title>
<script type="text/javascript" src="popup.js"></script>
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
    <h2>Book Approval</h2>
    <p>Click on the book's title to view more information about it... The Page refreshes every 10 seconds, however you may manually refresh it to reflect the latest changes!</p>
    <table width="100%" border="0">
      <tr>
        <td><strong>Book Title </strong></td>
        <td><strong>Author</strong></td>
        <td><strong>Book Type </strong></td>
      </tr>
		<?php
			$query = mysql_query("SELECT * FROM books WHERE status = 'Pending'");
			while ($row = mysql_fetch_assoc($query))
			{	if($_COOKIE['access']=='dadmin')
				{	if($row['dept']==$_COOKIE['dept'])
						echo "<tr><td><a href=\"doapp.php?id=".$row['idno']."\" onclick=\"return openWin(this);\">".$row['title']."</a></td><td>".$row['author']."</td><td>".$row['booktype']."</td></tr>";
				}
				else
				{		echo "<tr><td><a href=\"doapp.php?id=".$row['idno']."\" onclick=\"return openWin(this);\">".$row['title']."</a></td><td>".$row['author']."</td><td>".$row['booktype']."</td></tr>";
				}
			}
			echo "</table>";
		?>	  
    </table>
    <p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p class="credits">&copy; 2005 MNIT</p>
  </div>
  <div id="footer"></div>
</div>
</body>
</html>
