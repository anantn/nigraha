<?php
	require_once 'auth.php'	;
	require_once '../protected/envi.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Welcome to the IntraNET</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="Layout2, 404 creative studios" />
<meta name="description" content="simple css driven layout" />
<link href="intrastyle.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../popup_big.js"></script>
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
				<li id="active"><a href="intrahome.php" id="current">Home</a></li>
				<?php
					if($_COOKIE['type']=='student')
					{			echo "<li><a href=\"hostel\">Hostels</a></li>";
								echo "<li><a href=\"academic\">Academic Performance</a></li>";
								echo "<li><a href=\"irc.php\">The Student Zone</a></li>";
								echo "<li><a href=\"mail.php\">WebMail</a></li>";
								echo "<li><a href=\"profile.php\">Create/Modify your Profile</a></li>";
								echo "<li><a href=\"library/index.php\">Library</a></li>";
								echo "<li><a href=\"logout.php\">Logout</a></li>";
					}
					else
					{	switch($_COOKIE['access'])
						{	case 'sadmin':
								echo "<li><a href=\"auser.php\">Manage Users</a></li>";
							case 'admin':
								if($_COOKIE["access"]!='sadmin') echo "<li><a href=\"muser.php\">Manage Users</a></li>";
								echo "<li><a href=\"cms.php\">Manage Content</a></li>";
							case 'dadmin':
								echo "<li><a href=\"deptcms.php\">Department CMS</a></li>";
								echo "<li><a href=\"duser.php\">Manage Department Users</a></li>";
							case 'post':;
							case 'dpost':
								echo "<li><a href=\"mnitpost/addpost.php\">Post News/Notices</a></li>";
							case 'user':
								echo "<li><a href=\"library/index.php\">Library</a></li>";
								echo "<li><a href=\"academic\">Academic MS</a></li>";
								echo "<li><a href=\"hostel\">Hostels MS</a></li>";
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
								
								<div class="newsItem">The MNIT POST in finally open! Now you can post any News/Notice, get it approved, rejected or returned for reconsideration and View old archives!</div>
								<div class="readNewsLink"><a href="mnitpost/index.php">Go to the The MNIT Post</a></div>
								<div class="newsItem">Documentation released for the Intranet! In-Depth Tutorials, How-To's and inside developer's views Included!</div>
								<div class="readNewsLink"><a href="index.html">Go to the IntraDocs</a></div>
								<div class="newsItem">Need Help on some particular feature or service of the Intranet? Contact the Webmaster or any SysAdmin NOW!</div>
								<div class="readNewsLink"><a href="index.html">Contact Support</a></div>
							</div>
						</div>
					</td>
					<td valign="top" class="rightColumn">
						<h2>Welcome to the IntraNET, <?php echo $_COOKIE['name']?>!</h2>
						<p class="subHeader">Your access level is 
						<?php
							switch($_COOKIE['access'])
							{	case 'sadmin':
									echo " Super Administrator";
									break;
								case 'admin':
									echo " Administrator";
									break;
								case 'dadmin':
									echo "Department Administrator";
									break;
								case 'post':
									echo " User + Posting Allowed";
									break;
								case 'dpost':
									echo " Departmental Posting Allowed";
									break;
								case 'user':
									echo " Ordinary User";
									break;
							}
						?> and you have access to the following services:
						<p>
						<ul>
							<?php
							if ($_COOKIE['type']=='student')
							{
								switch($_COOKIE['access'])
								{	case 'sadmin':
										echo "<li><a href=\"auser.php\">Manage Users</a></li>";
									case 'admin':
										if($_COOKIE['access']!='sadmin') echo "<li><a href=\"muser.php\">Manage User Accounts</a></li>";
										echo "<li><a href=\"cms.php\">Website Content Management</a></li>";
									case 'dadmin':
										echo "<li><a href=\"deptcms.php\">Department CMS</a></li>";
										echo "<li><a href=\"duser.php\">Manage Department Users</a></li>";
									case 'post':;
									case 'dpost':
										echo "<li><a href=\"mnitpost/addpost.php\">Post News/Notices</a></li>";
									case 'user':
										echo "<b><br>You can use the tabs above to access:<br></b>";
										echo "<li>Hostel Information</li>";
										echo "<li>Academic Performance</li>";
										echo "<li>The Student Zone (NewsGroups, IRC and Mailing Lists)</li>";
										echo "<li>WebMail @ MNIT.ac.in</li>";
										echo "<li><a href=\"academic\">Academic Performance</a></li>";
										echo "<li><a href=\"profile.php\">Create/Modify your Profile</a></li>";
										echo "<li><a href=\"library/index.php\">Library</a></li>";
										echo "<li>Maintain your Home Page</li>";
										echo "<li><a href=\"../forum/\" onclick=\"return openWin(this);\">The MNIT Discussion Forum</a></li>";
								}
							}
							else
							{
								echo "<b>You can use the Tabs above or the Links below to navigate:<br></b>";
								echo "<li>WebMail @ MNIT.ac.in</li>";
								echo "<li><a href=\"profile.php\">Create/Modify your Profile</a></li>";	
								echo "<li><a href=\"library/index.php\">Library</a></li>";
								echo "<li>Maintain your Home Page</li>";
								echo "<li><a href=\"academic\">Academic MS</a></li>";
								echo "<li><a href=\"academic\">Hostels MS</a></li>";
								echo "<li><a href=\"../forum/\" onclick=\"return openWin(this);\">The MNIT Discussion Forum</a></li>";								
							}
							?>
						</ul>
					  </p>
				</td>
			</tr>
		</table>
	</div>
	<div id="divBaseLinks"><a href="index.html">Home</a> | <a href="index.html">Sitemap</a></div>
	<!-- begin bottom rounded corner styles -->
	<b class="rbottom"><b class="r4"></b> <b class="r3"></b> <b class="r2"></b> <b class="r1"></b></b>
	<!-- end bottom rounded corner styles -->
</div> 
<div class="spacer">&nbsp;</div>
</body>
</html>