<?php
	require_once 'auth.php'	;
	require_once '../protected/conn.php';
	if($_COOKIE['access']=='sadmin' OR $_COOKIE['access']=='admin' OR $_COOKIE['access']=='dadmin' OR $_COOKIE['access']=='post' OR $_COOKIE['access']=='dpost')
	{}
	else
	{	echo"<span class=\"header\">You are not authorised to view this Page. You are being redirected to the login page</span>";
		echo"<br>If your browser doesn't support redirection, Click <a href=\"index.php\">Here</a> to go...";
		echo"<meta HTTP-EQUIV=\"refresh\" content=0;url=\"index.php\">";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>MNIT CMS - Post News/Notices</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="Layout2, 404 creative studios" />
<meta name="description" content="simple css driven layout" />
<link href="intrastyle.css" type="text/css" rel="stylesheet" />


</head>
<body>
<div id="container">
	<!-- begin top rounded corner styles -->
	<b class="rtop"><b class="r1"></b><b class="r2"></b> <b class="r3"></b> <b class="r4"></b></b>
	<!-- end top rounded corner styles -->
	<div id="pageHeader"><img src="header.gif"></div>
	<div id="divPageContent">
		<div id="navcontainer">
			<ul id="navlist">
				<li><a href="intrahome.php" id="current">Home</a></li>
				<?php
					if($_COOKIE['type']=='student')
					{			echo "<li><a href=\"mess.php\">Mess Dues</a></li>";
								echo "<li><a href=\"acad.php\">Academic Performance</a></li>";
								echo "<li><a href=\"irc.php\">The Student Zone</a></li>";
								echo "<li><a href=\"mail.php\">WebMail</a></li>";
								echo "<li><a href=\"profile.php\">Create/Modify your Profile</a></li>";
								echo "<li><a href=\"logout.php\">Logout</a></li>";
					}
					else
					{	switch($_COOKIE['access'])
						{	case 'sadmin':
								echo "<li><a href=\"madmin.php\">Manage Administrators</a></li>";
							case 'admin':
								echo "<li><a href=\"muser.php\">Manage Users</a></li>";
								echo "<li id=\"active\"><a href=\"cms.php\">Manage Content</a></li>";
							case 'dadmin':
								echo "<li><a href=\"dmanage.php\">Manage Department</a></li>";
							case 'post':
								echo "<li><a href=\"post.php\">Post News/Notices</a></li>";
							case 'dpost':
								echo "<li><a href=\"post.php\">Post Departmental Notices</a></li>";
							case 'user':
								echo "<li><a href=\"logout.php\">Logout</a></li>";
								break;
						}
					}
				?>
			</ul>
		</div> 
		<table border="0" cellpadding="5" cellspacing="0">
			<tr>
					<td valign="top" class="leftColumn">
						<div id="sideBarNews">
							<br>
							<div id="newsHeader">MyPanel</div>
							<div id="sideBarNewsContent">
							<?php
								switch ($_COOKIE['access'])
								{	case 'sadmin':;
									case 'admin':
										echo "<div class=\"newsItem\"><a href=\"napp.php?where=mnithome\">There are 0 Unapproved News Items</a></div>";
									case 'dadmin':
										echo "<div class=\"newsItem\"><a href=\"napp.php?where=mnitdept\">There are 0 Unapproved Department Notes</a></div>";
									case 'post':;
									case 'dpost':;
									case 'user':
										echo "<div class=\"newsItem\"><a href=\"#\">You Have 0 New Messages</a></div>";
										break;
								}
							?>
							<div class="newsItem">Documentation released for the Intranet! In-Depth Tutorials, How-To's and inside developer's views Included!</div>
							<div class="readNewsLink"><a href="index.php">Go to the IntraDocs</a></div>
							<div class="newsItem">Need Help on some particular feature or service of the Intranet? Contact the Webmaster or any SysAdmin NOW!</div>
							<div class="readNewsLink"><a href="index.php">Contact Support</a></div>
						</div>
						</div>
					</td>
					<td valign="top" class="rightColumn">
				<h2>The MNIT Post</h2>
				<p class="subHeader">
					 Click to post your news/notice.
			       </p>
                      <form name="mnitpost" action="postform.php" method="post">
						<table width="75%" border=0 cellspacing=0 cellpadding=0>
						<tr><td><b>Subject: </b></td>
						<td colspan="2"><input type="text" name="subject" size="80"></input></td></tr>
						<tr><td colspan="3"><br></td></tr>
						<tr><td colspan="3">
						<textarea id="postitem" name="postitem" cols=70 rows=10></textarea></td></tr>
						<tr><td colspan="3"><select name="postin">
						<?php 
						switch ($_COOKIE['access'])
                        {
						  case 'sadmin':;
						  case 'admin':;
						  case 'post':
						  	echo "<option value=\"\">Choose one...</option><option value=\"newsmnit\">Post News on MNIT Home</option><option value=\"noticemnit\">Post Notice on MNIT Home</option><option value=\"tendermnit\">Post Tender on MNIT Home</option>";
						  case 'dadmin':;
						  case 'dpost':
				   	      	echo "<option value=\"newsdept\">Post News on Department Home</option><option value=\"noticedept\">Post Notice on Department Home</option>"; 
						  break;
						}
						?>
						</select></td></tr>
                        
						<tr><td><input type="submit" value="Post Item!"></input></td>
						<td><input type="reset" value="Reset Text!"></input></td>
						<td><a href="intrahome.php">Go back to Intranet Home!</a></td>
					</tr></table></form>
					<br>
				</p>
				</td>
			</tr>
		</table>
	</div>
	<div id="divBaseLinks"><a href="../index.php">MNIT Home</a> | <a href="../index.php">Sitemap</a></div>
	<!-- begin bottom rounded corner styles -->
	<b class="rbottom"><b class="r4"></b> <b class="r3"></b> <b class="r2"></b> <b class="r1"></b></b>
	<!-- end bottom rounded corner styles -->
</div> 
<div class="spacer">&nbsp;</div>
</body>
</html>