<?php
	//include ("auth.php");
	require_once ("../../protected/envi.php");
	mysql_select_db("mnitpost");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css" href="post.css" />
<title>News/Notices at MNIT</title>
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
    <h2>News/Notice list </h2>
    <p>Click on the item to view more information about it... </p>
    <?php
	if(isset($_POST['sort']))
	{
	  	switch($_POST['sort'])
		{
			case '1': //only active news
				echo "<table width=\"100%\" border=\"0\">
    		<form id=\"sortform\" method=\"post\" action=\"\" name=\"sortform\">
 		   <tr>
          <td>Item Type </td>
          <td><span class=\"style1\">
            <select name=\"sort\" id=\"type\">
              <option value=\"0\">All Posts</option>
              <option value=\"1\" selected=\"selected\">Active News</option>
              <option value=\"2\">Active Notices</option>
              <option value=\"3\">Central Posts</option>
              <option value=\"4\">Your Department Posts</option>
              <option value=\"5\">Internal Posts</option>              
            </select>
          </span></td>
          <td><input type=\"submit\" name=\"Submit\" value=\"Sort!\" /></td>
    </tr></form></table><hr>
					<h2>news</h2>
					<table width=\"100%\" border=\"1\">
    				<tr>
				        <td><strong>Headline </strong></td>
				        <td><strong>Approved On </strong></td>
				        <td><strong>Area </strong></td>
					<td><strong>Department </strong></td>
				    </tr>";
			$query1 = mysql_query("SELECT * FROM news WHERE status = 'active'");
			if(mysql_num_rows($query1)==0) echo "There are no items in active mode!!";
			while ($row = mysql_fetch_assoc($query1))
			{			
				echo "<tr><td><a href=\"doview.php?type=news&id=".$row['idno']."\" onclick=\"return openWin(this);\">".substr($row['headline'],0,25)."...</a></td><td>".$row['approvedon']."</td><td>".$row['itemarea']."</td><td>".$row['dept']."</td></tr>";
			}
			echo "</table>";
			break;
			
			
			case '2': //only notices
				echo "<table width=\"100%\" border=\"0\">
    		<form id=\"sortform\" method=\"post\" action=\"\" name=\"sortform\">
 		   <tr>
          <td>Item Type </td>
          <td><span class=\"style1\">
            <select name=\"sort\" id=\"type\">
              <option value=\"0\">All Posts</option>
              <option value=\"1\">Active News</option>
              <option value=\"2\" selected=\"selected\">Active Notices</option>
              <option value=\"3\">Central Posts</option>
              <option value=\"4\">Your Department Posts</option>
              <option value=\"5\">Internal Posts</option>
            </select>
          </span></td>
          <td><input type=\"submit\" name=\"Submit\" value=\"Sort!\" /></td>
    </tr></form></table><hr>
					<h2>notice</h2><table width=\"100%\" border=\"1\">
				    <tr>
				        <td><strong>Headline </strong></td>
				        <td><strong>Approved On </strong></td>
				        <td><strong>Area </strong></td>
					<td><strong>Department </strong></td>
				      </tr>";
			$query2 = mysql_query("SELECT * FROM notices WHERE status = 'active'");
			if(mysql_num_rows($query2)==0) echo "There are no items in active mode!!";
			while ($row = mysql_fetch_assoc($query2))
			{	
				echo "<tr><td><a href=\"doview.php?type=notices&id=".$row['idno']."\" onclick=\"return openWin(this);\">".substr($row['headline'],0,25)."...</a></td><td>".$row['approvedon']."</td><td>".$row['itemarea']."</td><td>".$row['dept']."</td></tr>";
			}
			echo "</table>";
			break;
			
			case '3': //only mnit central posts
				echo "<table width=\"100%\" border=\"0\">
    		<form id=\"sortform\" method=\"post\" action=\"\" name=\"sortform\">
 		   <tr>
          <td>Item Type </td>
          <td><span class=\"style1\">
            <select name=\"sort\" id=\"type\">
              <option value=\"0\">All Posts</option>
              <option value=\"1\">Active News</option>
              <option value=\"2\">Active Notices</option>
              <option value=\"3\" selected=\"selected\">Central Posts</option>
              <option value=\"4\">Your Department Posts</option>
              <option value=\"5\">Internal Posts</option>
            </select>
          </span></td>
          <td><input type=\"submit\" name=\"Submit\" value=\"Sort!\" /></td>
    </tr></form></table><hr>
					<h2>notice</h2><table width=\"100%\" border=\"1\">
				    <tr>
				        <td><strong>Headline </strong></td>
				        <td><strong>Last Modified On </strong></td>
				        <td><strong>Status </strong></td>
				      </tr>";
				$query1 = mysql_query("SELECT * FROM news WHERE itemarea = 'central'");
				if(mysql_num_rows($query1)==0) echo "There are no items to be displayed!!";
				while ($row = mysql_fetch_assoc($query1))	
				{	
					echo "<tr><td><a href=\"doview.php?type=news&id=".$row['idno']."\" onclick=\"return openWin(this);\">".substr($row['headline'],0,25)."...</a></td><td>".$row['status']."</td><td>".$row['itemarea']."</td></tr>";
				}
				echo "</table>";
				echo "<br><h2>notice</h2><table width=\"100%\" border=\"1\">
				   <tr>
				        <td><strong>Headline </strong></td>
				        <td><strong>Last Modified On </strong></td>
				        <td><strong>Status </strong></td>
				      </tr>";
			$query2 = mysql_query("SELECT * FROM notices WHERE itemarea = 'central'");
			if(mysql_num_rows($query2)==0) echo "There are no items in active mode!!";
			while ($row = mysql_fetch_assoc($query2))
			{	
				echo "<tr><td><a href=\"doview.php?type=notices&id=".$row['idno']."\" onclick=\"return openWin(this);\">".substr($row['headline'],0,25)."...</a></td><td>".$row['lastmodified']."</td><td>".$row['status']."</td></tr>";
			}
			echo "</table>";
			break;
			
			
			case '4': //Your Department Posts only
				echo "<table width=\"100%\" border=\"0\">
    		<form id=\"sortform\" method=\"post\" action=\"\" name=\"sortform\">
 		   <tr>
          <td>Item Type </td>
          <td><span class=\"style1\">
            <select name=\"sort\" id=\"type\">
              <option value=\"0\">All Posts</option>
              <option value=\"1\">Active News</option>
              <option value=\"2\">Active Notices</option>
              <option value=\"3\">Central Posts</option>
              <option value=\"4\" selected=\"selected\">Your Department Posts</option>
              <option value=\"5\">Internal Posts</option>
            </select>
          </span></td>
          <td><input type=\"submit\" name=\"Submit\" value=\"Sort!\" /></td>
    </tr></form></table><hr><h2>news</h2><table width=\"100%\" border=\"1\">
				    <tr>
				        <td><strong>Headline </strong></td>
				        <td><strong>Last Modified On </strong></td>
				        <td><strong>Status </strong></td>
				      </tr>";
				$query1 = mysql_query("SELECT * FROM news WHERE itemarea = 'department'");
				if(mysql_num_rows($query1)==0) echo "There are no items to be displayed!!";
				while ($row = mysql_fetch_assoc($query1))	
				{	
					echo "<tr><td><a href=\"doview.php?type=news&id=".$row['idno']."\" onclick=\"return openWin(this);\">".substr($row['headline'],0,25)."...</a></td><td>".$row['lastmodified']."</td><td>".$row['status']."</td></tr>";
				}
				echo "</table>";
				echo "<br><h2>notice</h2><table width=\"100%\" border=\"1\">
				    <tr>
				        <td><strong>Headline </strong></td>
				        <td><strong>Last Modified On </strong></td>
				        <td><strong>Status </strong></td>
				      </tr>";
				$query2 = mysql_query("SELECT * FROM notices WHERE itemarea = 'department'");
				if(mysql_num_rows($query2)==0) echo "There are no items to be displayed!!";
				while ($row = mysql_fetch_assoc($query2))
				{			
					echo "<tr><td><a href=\"doview.php?type=notices&id=".$row['idno']."\" onclick=\"return openWin(this);\">".substr($row['headline'],0,25)."...</a></td><td>".$row['lastmodified']."</td><td>".$row['status']."</td></tr>";
				}
				echo "</table>";
				break;
				
				case '5': //College's Internal Posts only
				echo "<table width=\"100%\" border=\"0\">
    		<form id=\"sortform\" method=\"post\" action=\"\" name=\"sortform\">
 		   <tr>
          <td>Item Type </td>
          <td><span class=\"style1\">
            <select name=\"sort\" id=\"type\">
              <option value=\"0\">All Posts</option>
              <option value=\"1\">Active News</option>
              <option value=\"2\">Active Notices</option>
              <option value=\"3\">Central Posts</option>
              <option value=\"4\">Your Department Posts</option>
              <option value=\"5\" selected=\"selected\">Internal Posts</option>
            </select>
          </span></td>
          <td><input type=\"submit\" name=\"Submit\" value=\"Sort!\" /></td>
    </tr></form></table><hr><h2>news</h2><table width=\"100%\" border=\"1\">
				    <tr>
				        <td><strong>Headline </strong></td>
				        <td><strong>Last Modified On </strong></td>
				        <td><strong>Status </strong></td>
				      </tr>";
				$query1 = mysql_query("SELECT * FROM news WHERE itemarea = 'intenal'");
				if(mysql_num_rows($query1)==0) echo "There are no items to be displayed!!";
				while ($row = mysql_fetch_assoc($query1))	
				{	
					echo "<tr><td><a href=\"doview.php?type=news&id=".$row['idno']."\" onclick=\"return openWin(this);\">".substr($row['headline'],0,25)."...</a></td><td>".$row['lastmodified']."</td><td>".$row['status']."</td></tr>";
				}
				echo "</table>";
				echo "<br><h2>notice</h2><table width=\"100%\" border=\"1\">
				    <tr>
				        <td><strong>Headline </strong></td>
				        <td><strong>Last Modified On </strong></td>
				        <td><strong>Status </strong></td>
				      </tr>";
				$query2 = mysql_query("SELECT * FROM notices WHERE itemarea = 'internal'");
				if(mysql_num_rows($query2)==0) echo "There are no items to be displayed!!";
				while ($row = mysql_fetch_assoc($query2))
				{			
					echo "<tr><td><a href=\"doview.php?type=notices&id=".$row['idno']."\" onclick=\"return openWin(this);\">".substr($row['headline'],0,25)."...</a></td><td>".$row['lastmodified']."</td><td>".$row['status']."</td></tr>";
				}
				echo "</table>";
				break;
			
			case '0': //all
				echo "<table width=\"100%\" border=\"0\">
    		<form id=\"sortform\" method=\"post\" action=\"\" name=\"sortform\">
 		   <tr>
          <td>Item Type </td>
          <td><span class=\"style1\">
            <select name=\"sort\" id=\"type\">
              <option value=\"0\" selected=\"selected\">All Posts</option>
              <option value=\"1\">Active News</option>
              <option value=\"2\">Active Notices</option>
              <option value=\"3\">Central Posts</option>
              <option value=\"4\">Your Department Posts</option>
              <option value=\"5\">Internal Posts</option>
            </select>
          </span></td>
          <td><input type=\"submit\" name=\"Submit\" value=\"Sort!\" /></td>
    </tr></form></table><hr><h2>news</h2><table width=\"100%\" border=\"1\">
				    <tr>
				        <td><strong>Headline </strong></td>
				        <td><strong>Last Modified On </strong></td>
				        <td><strong>Status </strong></td>
				        <td><strong>Area </strong></td>
				      </tr>";
				$query1 = mysql_query("SELECT * FROM news");
				if(mysql_num_rows($query1)==0) echo "There are no items in the database!!";
				while ($row = mysql_fetch_assoc($query1))	
				{	
					echo "<tr><td><a href=\"doview.php?type=news&id=".$row['idno']."\" onclick=\"return openWin(this);\">".substr($row['headline'],0,15)."...</a></td><td>".$row['lastmodified']."</td><td>".$row['status']."</td><td>".$row['itemarea']."</td></tr>";
				}
				echo "</table>";
				echo "<br><h2>notice</h2><table width=\"100%\" border=\"1\">
				   <tr>
				        <td><strong>Headline </strong></td>
				        <td><strong>Last Modified On </strong></td>
				        <td><strong>Status </strong></td>
				        <td><strong>Area </strong></td>
				      </tr>";
				$query2 = mysql_query("SELECT * FROM notices");
				if(mysql_num_rows($query2)==0) echo "There are no items in the database!!";
				while ($row = mysql_fetch_assoc($query2))
				{			
					echo "<tr><td><a href=\"doview.php?type=notices&id=".$row['idno']."\" onclick=\"return openWin(this);\">".substr($row['headline'],0,15)."...</a></td><td>".$row['lastmodified']."</td><td>".$row['status']."</td><td>".$row['itemarea']."</td></tr>";
				}
				echo "</table>";
				break;
		}
	}
	else echo "<table width=\"100%\" border=\"0\">
    		<form id=\"sortform\" method=\"post\" action=\"\" name=\"sortform\">
 		   <tr>
          <td>Item Type </td>
          <td><span class=\"style1\">
            <select name=\"sort\" id=\"type\">
              <option value=\"0\">All Posts</option>
              <option value=\"1\">Active News</option>
              <option value=\"2\" selected=\"selected\">Active Notices</option>
              <option value=\"3\">Central Posts</option>
              <option value=\"4\">Your Department Posts</option>
              <option value=\"5\">Internal Posts</option>
            </select>
          </span></td>
          <td><input type=\"submit\" name=\"Submit\" value=\"Sort!\" /></td>
    </tr></form></table><hr><br>Choose a sort to display the list of required posts...";
	
	?>	  
    <p>&nbsp;</p>
	<p>&nbsp;</p>
    <p class="credits">&copy; 2005 MNIT</p>
  </div>
  <div id="footer"></div>
</div>
</body>
</html>