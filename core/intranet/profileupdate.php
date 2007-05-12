<?php
	require_once 'auth.php'	;
	require_once '../protected/conn.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Manage your Profile</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Keywords" content="Layout2, 404 creative studios" />
<meta name="Description" content="simple css driven layout" />
<link href="intrastyle.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="container"> <b class="rtop"><b class="r1"></b><b class="r2"></b> <b class="r3"></b> <b class="r4"></b></b>
  <div id="pageHeader"><img src="header.gif" /></div>
  <div id="divPageContent">
    <div id="navcontainer">
      <ul id="navlist">
        <li id="active"><a href="intrahome.php" id="current">Home</a></li>
        <?php
					if($_COOKIE['type']=='student')
					{			echo "<li><a href=\"mess.php\">Mess Dues</a></li>";
								echo "<li><a href=\"acad.php\">Academic Performance</a></li>";
								echo "<li><a href=\"irc.php\">The Student Zone</a></li>";
								echo "<li><a href=\"mail.php\">WebMail</a></li>";
								echo "<li class=\"active\"><a href=\"profile.php\">Create/Modify your Profile</a></li>";
								echo "<li><a href=\"logout.php\">Logout</a></li>";
					}
					else
					{	switch($_COOKIE['access'])
						{	case 'sadmin':
								echo "<li><a href=\"auser.php\">Manage Administrators</a></li>";
							case 'admin':
								echo "<li><a href=\"muser.php\">Manage Users</a></li>";
								echo "<li><a href=\"cms.php\">Manage Content</a></li>";
							case 'dadmin':
								echo "<li><a href=\"deptcms.php\">Department CMS</a></li>";
								echo "<li><a href=\"duser.php\">Manage Department Users</a></li>";
							case 'post':
							case 'dpost':
								echo "<li><a href=\"mnitpost/addpost.php\">Post News / Notices</a></li>";
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
        <td width="260" valign="top" class="leftColumn"><div id="sideBarNews"> <br />
            <div id="newsHeader">MyPanel</div>
            <div id="sideBarNewsContent">
              <?php
									
									if($_COOKIE['type']=='student')
										$data = mysql_query("SELECT * FROM profile_student WHERE userid = '".$_COOKIE['userid']."'");
									else
										$data = mysql_query("SELECT * FROM profile_faculty WHERE userid = '".$_COOKIE['userid']."'");
									$stored = mysql_fetch_assoc($data);									
								?>
				<div class="newsItem">The MNIT POST in finally open! Now you can post any News/Notice, get it approved, rejected or returned for reconsideration and View old archives!</div>
								<div class="readNewsLink"><a href="mnitpost/index.php">Go to the The MNIT Post</a></div>
								
              <div class="newsItem">Documentation released for the Intranet! In-Depth Tutorials, How-To's and inside developer's views Included!</div>
              <div class="readNewsLink"><a href="index.html">Go to the IntraDocs</a></div>
              <div class="newsItem">Need Help on some particular feature or service of the Intranet? Contact the Webmaster or any SysAdmin NOW!</div>
              <div class="readNewsLink"><a href="index.html">Contact Support</a></div>
            </div>
          </div></td>
		<?php
			if($_COOKIE['type']=='student')
			{	if(isset($_POST['options'])) $kix = $_POST['options'];
				else $kix = ' ';
				$show = serialize($kix);
				$updat = mysql_query("UPDATE profile_student SET paddress = '".$_POST['address']."', fathersname = '".$_POST['fname']."', mothersname = '".$_POST['mname']."', phone = '".$_POST['phno']."', altmail = '".$_POST['email']."', about = '".$_POST['abt']."', showfields = '".$show."' WHERE CONVERT( userid USING utf8 ) = '".$_COOKIE['userid']."'");
			}
			else
			{	if(isset($_POST['options'])) $kix = $_POST['options'];
				else $kix = ' ';
				$show = serialize($kix);
				$updat = mysql_query("UPDATE profile_faculty SET paddress = '".$_POST['address']."',  phone = '".$_POST['phno']."', altmail = '".$_POST['email']."', about = '".$_POST['abt']."', showfields = '".$show."' WHERE CONVERT( userid USING utf8 ) = '".$_COOKIE['userid']."'");
			}
		?>		 
        <td width="695" valign="top" class="rightColumn"><h2>Your Profile has been updated!</h2>
		<p><a href="intrahome.php">Click here</a> to return to the IntraNET home or <a href="http://intra.mnit.ac.in/personal/<? echo $_COOKIE['alias'] ?>" target="_blank">Click Here</a> to view your home page</p>
      	</td>
      </tr>
      <tr>
        <td valign="top" class="leftColumn">&nbsp;</td>
        <td valign="top" class="rightColumn">&nbsp;</td>
      </tr>
    </table>
  </div>
  <div id="divBaseLinks"><a href="index.html">Home</a> | <a href="index.html">Sitemap</a></div>
  <b class="rbottom"><b class="r4"></b> <b class="r3"></b> <b class="r2"></b> <b class="r1"></b></b> </div>
<div class="spacer">&nbsp;</div>
</body>
</html>
