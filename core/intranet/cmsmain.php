<?php
	require_once 'auth.php'	;
	require_once ("../protected/envi.php");
	require_once ($basedir."protected/conn.php?db=mnit");
	if($_COOKIE['access']=='sadmin' OR $_COOKIE['access']=='admin')
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
<title>Welcome to the MNIT CMS! Editing: <?php echo $_REQUEST['table'];?></title>
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
								echo "<li><a href=\"dmanage.html\">Manage Department</a></li>";
							case 'post':
								
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
						<h2>The MNIT (Main Website) CMS</h2>
						<p class="subHeader">
							The Basic Structure of the Academic Section is displayed below.<br>Click on any node to edit it.
							<a href="cms.php">Back to CMS Home</a>
						<p>
						<ul>
							<li>Home Page</li>
								<ul><li><a href="modify.php?node=sidebar">Side 'More...' bar</a></li>
										<li>Note: Changing this Side Bar will reflect on all pages across the site</li>
								</ul>
							<li><?php echo $_REQUEST['table']?></li>
								<?php	
									$iniquery = mysql_query("SELECT max(sectionid) FROM info_".$_REQUEST['table']);
									$bigno = mysql_fetch_row($iniquery);
									$i = 1;
									echo "<ul>";
									while ($i <= $bigno[0])
									{	$query = mysql_query("SELECT * FROM info_".$_REQUEST['table']." WHERE sectionid=".$i);
										$num = mysql_num_rows($query);
										$j = 1;
										while ($j <= $num)
										{	$subquery = mysql_query("SELECT * FROM info_".$_REQUEST['table']." WHERE sectionid=".$i." AND paraid='".$j."'");
											$test = mysql_fetch_assoc($subquery);
											if ($test['paratype'] == 'data' AND substr($test['paraid'], -1, 1) != 'd')
											{	echo "<li><a href=\"modify.php?node=".$i."&pid=".$j."&tab=".$_REQUEST['table']."\">Data: ".$test['sectionname']."</a></li>";
												echo "<ul><li>".substr($test['data'],0,40)."...</li></ul>";
											}
											else if ($test['paratype'] == 'popup')
											{	echo "<li><a href=\"modify.php?node=".$i."&pid=".$j."&tab=".$_REQUEST['table']."\">Popup: ".$test['sectionname']."</a></li>";
												echo "<ul><li>".substr($test['data'],0,40)."...</li>";
												echo "<li><a href=\"modify.php?node=".$i."&pid=".$j."d&tab=".$_REQUEST['table']."\">Popup Data: ".$test['sectionname']."</a></li></ul>";
											}
											$j = $j + 1;
										}
										$i = $i + 1;	
									}
								?>
								</ul>
								</ul>
								</p>
								<p>
								<form name="create" action="screate.php?table=<?php echo $_REQUEST['table']?>" method="post">
							        <ul><li>Create a new Section by name: <input type="text" name="name">
								<input type="Submit" value="Go!">
								</li>
								<li>Add a new popup to one of the sections: 
								<select name="popnew" id="popnew">
								<option value="#" selected="selected"></option>
								</select>
								</ul>
                                                                </form>
								</p>
				</td>
			</tr>
		</table>
	</div>
	<div id="divBaseLinks"><a href="index.php">Home</a> | <a href="index.php">Sitemap</a></div>
	<!-- begin bottom rounded corner styles -->
	<b class="rbottom"><b class="r4"></b> <b class="r3"></b> <b class="r2"></b> <b class="r1"></b></b>
	<!-- end bottom rounded corner styles -->
</div> 
<div class="spacer">&nbsp;</div>
</body>
</html>