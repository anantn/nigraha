
<?php
	require_once '../auth.php';
	require_once '../../protected/conn_dept.php';
        mysql_select_db($_COOKIE['dept'],$depart);
	if($_COOKIE['access']=='sadmin' OR $_COOKIE['access']=='admin' OR $_COOKIE['access']=='dadmin')
	{}
	else
	{	echo"<span class=\"header\">You are not authorised to view this Page. You are being redirected to the login page</span>";
		echo"<br>If your browser doesn't support redirection, Click <a href=\"../index.php\">Here</a> to go...";
		echo"<meta HTTP-EQUIV=\"refresh\" content=0;url=\"../index.php\">";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Welcome to the MNIT CMS! Editing: Department <?php echo $_REQUEST['table']?> Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="Layout2, 404 creative studios" />
<meta name="description" content="simple css driven layout" />
<link href="../intrastyle.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="container">
	<!-- begin top rounded corner styles -->
	<b class="rtop"><b class="r1"></b><b class="r2"></b> <b class="r3"></b> <b class="r4"></b></b>
	<!-- end top rounded corner styles -->
	<div id="pageHeader"><img src="../header.gif"></div>
	<div id="divPageContent">
		<div id="navcontainer">
			<ul id="navlist">
				<li><a href="../intrahome.php" id="current">Home</a></li>
				<?php
					if($_COOKIE['type']=='student')
					{			echo "<li><a href=\"../mess.php\">Mess Dues</a></li>";
								echo "<li><a href=\"../acad.php\">Academic Performance</a></li>";
								echo "<li><a href=\"../irc.php\">The Student Zone</a></li>";
								echo "<li><a href=\"../mail.php\">WebMail</a></li>";
								echo "<li><a href=\"../profile.php\">Create/Modify your Profile</a></li>";
								echo "<li><a href=\"../logout.php\">Logout</a></li>";
					}
					else
					{	switch($_COOKIE['access'])
						{	case 'sadmin':
								echo "<li><a href=\"../madmin.php\">Manage Administrators</a></li>";
							case 'admin':
								echo "<li><a href=\"../muser.php\">Manage Users</a></li>";
								echo "<li id=\"active\"><a href=\"../cms.php\">Manage Main Content</a></li>";
							case 'dadmin':
								echo "<li><a href=\"../deptcms.php\">Manage Department</a></li>";
							case 'post':
								echo "<li><a href=\"../post.php\">Post News/Notices</a></li>";
							case 'dpost':
								echo "<li><a href=\"../post.php\">Post Departmental Notices</a></li>";
							case 'user':
								echo "<li><a href=\"../logout.php\">Logout</a></li>";
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
											echo "<div class=\"newsItem\"><a href=\"../napp.php?where=mnithome\">There are 0 Unapproved News Items</a></div>";
										case 'dadmin':
											echo "<div class=\"newsItem\"><a href=\"../napp.php?where=mnitdept\">There are 0 Unapproved Department Notes</a></div>";
										case 'post':;
										case 'dpost':;
										case 'user':
											echo "<div class=\"newsItem\"><a href=\"#\">You Have 0 New Messages</a></div>";
											break;
									}
								?>
								<div class="newsItem">Documentation released for the Intranet! In-Depth Tutorials, How-To's and inside developer's views Included!</div>
								<div class="readNewsLink"><a href="../index.php">Go to the IntraDocs</a></div>
								<div class="newsItem">Need Help on some particular feature or service of the Intranet? Contact the Webmaster or any SysAdmin NOW!</div>
								<div class="readNewsLink"><a href="../index.php">Contact Support</a></div>
							</div>
						</div>
					</td>
					<td valign="top" class="rightColumn">
						<h2>The CMS: Department <?php echo $_COOKIE['dept'] ?></h2>
						<p class="subHeader">
							The Basic Structure of the Department <?php echo $_REQUEST['table']?> Page is displayed below.<br>Click on any node to edit it.
							<a href="../deptcms.php">Back to Department CMS Home</a>
						<p>
						<ul>
							<li>General for all Pages</li>
								<ul><li><a href="#">Side 'More...' bar</a></li>
										<li>Note: Changing this Side Bar will reflect on all pages across the site</li>
								</ul>
							<li>Main Content Of The Page</li>
								<?php 
								        $inquery = mysql_query("SELECT max(sectionid) FROM info_".$_REQUEST['table']);
									$bigno = mysql_fetch_row($inquery);
									$i = 0;
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
                                                                                        else if ($test['paratype'] == 'header')
											  {     echo "<li><a href=\"modify.php?node=".$i."&pid=".$j."&tab=".$_REQUEST['table']."\">Header Data: ".$test['sectionname']."</a></li>";
											        echo "<ul><li>".substr($test['data'],0,40)."...</li></ul>";
                                                                                          }
											$j = $j + 1;
										}
										$i = $i + 1;	
									}
								?>
								</ul>
					  </p>
				</td>
			</tr>
		</table>
	</div>
	<div id="divBaseLinks"><a href="../../index.php">Home</a> | <a href="../../index.php">Sitemap</a></div>
	<!-- begin bottom rounded corner styles -->
	<b class="rbottom"><b class="r4"></b> <b class="r3"></b> <b class="r2"></b> <b class="r1"></b></b>
	<!-- end bottom rounded corner styles -->
</div> 
<div class="spacer">&nbsp;</div>
</body>
</html>