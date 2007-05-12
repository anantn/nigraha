<?php
	require_once 'auth.php'	;
	require_once '../protected/conn.php';
	if($_COOKIE['access']=='sadmin' OR $_COOKIE['access']=='admin' OR $_COOKIE['access']=='dadmin')
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
<title>Welcome to the MNIT Departmental CMS!</title>
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
								echo "<li><a href=\"madmin.html\">Manage Administrators</a></li>";
							case 'admin':
								echo "<li><a href=\"muser.html\">Manage Users</a></li>";
								echo "<li id=\"active\"><a href=\"cms.php\">Manage Content</a></li>";
							case 'dadmin':
								echo "<li><a href=\"deptcms.php\">Manage Department</a></li>";
							case 'post':;
							case 'dpost':
								echo "<li><a href=\"mnitpost/addpost.php\">Post News/Notices</a></li>";
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
								<div class="newsItem">The MNIT POST in finally open! Now you can post any News/Notice, get it approved, rejected or returned for reconsideration and View old archives!</div>
								<div class="readNewsLink"><a href="mnitpost/index.php">Go to the The MNIT Post</a></div>
								
								<div class="newsItem">Documentation released for the Intranet! In-Depth Tutorials, How-To's and inside developer's views Included!</div>
								<div class="readNewsLink"><a href="index.php">Go to the IntraDocs</a></div>
								<div class="newsItem">Need Help on some particular feature or service of the Intranet? Contact the Webmaster or any SysAdmin NOW!</div>
								<div class="readNewsLink"><a href="index.php">Contact Support</a></div>
							</div>
						</div>
					</td>
					<td valign="top" class="rightColumn">
						<h2>The MNIT (Department) CMS</h2>
						<p class="subHeader">
							The Basic Structure of the site is displayed below. Click on any node to edit it.
						<p>
							<ul>
								<li><a href="dept/dcms.php?table=welcome">Welcome Page</a></li>
								<li><a href="dept/dcms.php?table=faculty">Faculty</a></li>
								<li><a href="dept/dcms.php?table=courses">Courses</a></li>
								<li><a href="dept/dcms.php?table=research">Research</a></li>
								<li><a href="dept/dcms.php?table=labs">Laboratories</a></li>
								<li><a href="dept/dcms.php?table=tour">Department Tour</a></li>
								<li><a href="dept/dcms.php?table=job">Job Notices</a></li>
							</ul>
							<br>To Edit the Home page click on any Node. Please ensure that you fully understand the way the data is stored on the database before undertaking any changes! In case of any doubt or for more info, refer the IntraDocs or contact any SysAdmin.
						</p>
				</td>
			</tr>
		</table>
	</div>
	<div id="divBaseLinks"><a href="../index.php">Home</a> | <a href="../index.php">Sitemap</a></div>
	<!-- begin bottom rounded corner styles -->
	<b class="rbottom"><b class="r4"></b> <b class="r3"></b> <b class="r2"></b> <b class="r1"></b></b>
	<!-- end bottom rounded corner styles -->
</div> 
<div class="spacer">&nbsp;</div>
</body>
</html>