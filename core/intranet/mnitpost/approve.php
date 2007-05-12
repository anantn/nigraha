<?php
	include ("auth.php");
	require_once ("../../protected/envi.php");
	mysql_select_db("mnitpost");
	$arr = $_COOKIE['posts'];
	$arr = unserialize($arr);
	foreach($arr as $foo)
	{	$val = explode(",", $foo);
		if($val[0]=='MNIT' AND $val[1]=='Webmaster') $isallowed = 1;
		else $isallowed = 0;
	}
	if($isallowed == 0) 
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
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css" href="post.css" />
<title>Approve News/Notice at MNIT</title>
<script type="text/javascript" src="popup.js"></script>
</head>
<body>
<div id="title">
  <h1>THE MNIT POST </h1>
</div>
<div id="container">
  <div id="sidebar">
    <h2>&nbsp;</h2>
    <a class="menu" href="index.php">Home</a> <a class="menu" href="addpost.php">Post</a> <a class="menu" href="archived.php">View All</a> <a class="menu"></a> <a class="menu" href="../../index.php">MNIT Home</a> <a class="menu" href="../index.php">IntraNET</a></div>

	<div id="main">
    <h2>News/Notice Approval</h2>
    <p>Click on the item to view more information about it... You can approve, return for further changes or reject completely in case the item is not needed atall!</p>
    <?php
	if(isset($_POST['sort']))
	{
	  	switch($_POST['sort'])
		{
			case '1': //only news
				echo "<table width=\"100%\" border=\"0\">
    		<form id=\"sortform\" method=\"post\" action=\"approve.php\" name=\"sortform\">
 		   <tr>
          <td>Item Type </td>
          <td><span class=\"style1\">
            <select name=\"sort\" id=\"type\">
              <option value=\"0\">All</option>
              <option value=\"1\" selected=\"selected\">News</option>
              <option value=\"2\">Notice</option>
            </select>
          </span></td>
          <td><input type=\"submit\" name=\"Submit\" value=\"Sort!\" /></td>
    </tr></form></table><hr>
					<h2>news</h2>
					<table width=\"100%\" border=\"1\">
    				<tr>
				        <td><strong>Headline </strong></td>
				        <td><strong>Post By </strong></td>
				        <td><strong>Area </strong></td>
				    </tr>";
			$query1 = mysql_query("SELECT * FROM news WHERE status = 'pending'");
			if(mysql_num_rows($query1)==0) echo "There are no new items to approve!!";
			while ($row = mysql_fetch_assoc($query1))
			{			
				echo "<tr><td><a href=\"doapp.php?type=news&id=".$row['idno']."\" onclick=\"return openWin(this);\">".substr($row['headline'],0,25)."...</a></td><td>".$row['postby']."</td><td>".$row['itemarea']."</td></tr>";
			}
			echo "</table>";
			break;
			
			
			case '2': //only notice
				echo "<table width=\"100%\" border=\"0\">
    		<form id=\"sortform\" method=\"post\" action=\"approve.php\" name=\"sortform\">
 		   <tr>
          <td>Item Type </td>
          <td><span class=\"style1\">
            <select name=\"sort\" id=\"type\">
              <option value=\"0\">All</option>
              <option value=\"1\">News</option>
              <option value=\"2\" selected=\"selected\">Notice</option>
            </select>
          </span></td>
          <td><input type=\"submit\" name=\"Submit\" value=\"Sort!\" /></td>
    </tr></form></table><hr>
					<h2>notice</h2><table width=\"100%\" border=\"1\">
				    <tr>
				        <td><strong>Headline </strong></td>
				        <td><strong>Post By </strong></td>
				        <td><strong>Area </strong></td>
				      </tr>";
			$query2 = mysql_query("SELECT * FROM notices WHERE status = 'pending'");
			if(mysql_num_rows($query2)==0) echo "There are no new items to approve!!";
			while ($row = mysql_fetch_assoc($query2))
			{	
				echo "<tr><td><a href=\"doapp.php?type=notices&id=".$row['idno']."\" onclick=\"return openWin(this);\">".substr($row['headline'],0,25)."...</a></td><td>".$row['postby']."</td><td>".$row['itemarea']."</td></tr>";
			}
			echo "</table>";
			break;
			
			case '0': //all
				echo "<table width=\"100%\" border=\"0\">
    		<form id=\"sortform\" method=\"post\" action=\"approve.php\" name=\"sortform\">
 		   <tr>
          <td>Item Type </td>
          <td><span class=\"style1\">
            <select name=\"sort\" id=\"type\">
              <option value=\"0\" selected=\"selected\">All</option>
              <option value=\"1\">News</option>
              <option value=\"2\">Notice</option>
            </select>
          </span></td>
          <td><input type=\"submit\" name=\"Submit\" value=\"Sort!\" /></td>
    </tr></form></table><hr><h2>news</h2><table width=\"100%\" border=\"1\">
				    <tr>
				        <td><strong>Headline </strong></td>
				        <td><strong>Post By </strong></td>
				        <td><strong>Area </strong></td>
				      </tr>";
				$query1 = mysql_query("SELECT * FROM news WHERE status = 'pending'");
				if(mysql_num_rows($query1)==0) echo "There are no new items to approve!!";
				while ($row = mysql_fetch_assoc($query1))	
				{	
					echo "<tr><td><a href=\"doapp.php?type=news&id=".$row['idno']."\" onclick=\"return openWin(this);\">".substr($row['headline'],0,25)."...</a></td><td>".$row['postby']."</td><td>".$row['itemarea']."</td></tr>";
				}
				echo "</table>";
				echo "<br><h2>notice</h2><table width=\"100%\" border=\"1\">
				    <tr>
				        <td><strong>Headline </strong></td>
				        <td><strong>Post By </strong></td>
				        <td><strong>Area </strong></td>
				      </tr>";
				$query2 = mysql_query("SELECT * FROM notices WHERE status = 'pending'");
				if(mysql_num_rows($query2)==0) echo "There are no new items to approve!!";
				while ($row = mysql_fetch_assoc($query2))
				{			
					echo "<tr><td><a href=\"doapp.php?type=notices&id=".$row['idno']."\" onclick=\"return openWin(this);\">".substr($row['headline'],0,25)."...</a></td><td>".$row['postby']."</td><td>".$row['itemarea']."</td></tr>";
				}
				echo "</table>";
				break;
		}
	}
	else echo "<table width=\"100%\" border=\"0\">
    		<form id=\"sortform\" method=\"post\" action=\"approve.php\" name=\"sortform\">
 		   <tr>
          <td>Item Type </td>
          <td><span class=\"style1\">
            <select name=\"sort\" id=\"type\">
              <option value=\"0\">All</option>
              <option value=\"1\">News</option>
              <option value=\"2\">Notice</option>
            </select>
          </span></td>
          <td><input type=\"submit\" name=\"Submit\" value=\"Sort!\" /></td>
    </tr></form></table><hr><br>Choose a sort to display the list of pending posts...";
	
	?>	  
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
