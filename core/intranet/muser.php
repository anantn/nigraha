<?php
	require_once 'auth.php';
	require_once '../protected/conn.php';
	if($_COOKIE['access']=='admin')
	{}
	else
	{	echo"<span class=\"header\">You are not authorised to view this Page. You are being redirected to the login page</span>";
		echo"<br>If your browser doesn't support redirection, Click <a href=\"index.php\">Here</a> to go...";
		echo"<meta HTTP-EQUIV=\"refresh\" content=0;url=\"index.php\">";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Welcome to Administrator Management!</title>
<meta http-equiv="Refresh" content="30" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Keywords" content="Layout2, 404 creative studios" />
<meta name="Description" content="simple css driven layout" />
<link href="intrastyle.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../popup.js"></script>
</script>
</head>
<body>
<div id="container"> <b class="rtop"><b class="r1"></b><b class="r2"></b> <b class="r3"></b> <b class="r4"></b></b>
  <div id="pageHeader"><img src="header.gif" /></div>
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
								echo "<li id=\"active\"><a href=\"muser.php\">Manage Users</a></li>";
								echo "<li><a href=\"cms.php\">Manage Content</a></li>";
							case 'dadmin':
								echo "<li><a href=\"dmanage.php\">Manage Department</a></li>";
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
        <td width="315" valign="top" class="leftColumn"><div id="sideBarNews"> <br />
            <div id="newsHeader">MyPanel</div>
            <div id="sideBarNewsContent">
              <div class="newsItem">The MNIT POST in finally open! Now you can post any News/Notice, get it approved, rejected or returned for reconsideration and View old archives!</div>
								<div class="readNewsLink"><a href="mnitpost/index.php">Go to the The MNIT Post</a></div>
								
              <div class="newsItem">Documentation released for the Intranet! In-Depth Tutorials, How-To's and inside developer's views Included!</div>
              <div class="readNewsLink"><a href="index.php">Go to the IntraDocs</a></div>
              <div class="newsItem">Need Help on some particular feature or service of the Intranet? Contact the Webmaster or any SysAdmin NOW!</div>
              <div class="readNewsLink"><a href="index.php">Contact Support</a></div>
            </div>
          </div></td>
        <td width="619" valign="top" class="rightColumn"><h2>Manage Administrators</h2>
          <?php
							$squery = mysql_query("SELECT * FROM profile_student WHERE accesslvl LIKE '%admin' AND accesslvl != 'sadmin'");
	                        $fquery = mysql_query("SELECT * FROM profile_faculty WHERE accesslvl LIKE '%admin' AND accesslvl != 'sadmin'");
		  ?>
          <p><font size="1">Note: Changes made to Access Levels may not reflect on this page Immediately! Although this page automatically refreshes every 30 seconds, you may manually refresh it to view any changes you might have made</font></p>
          </p>
          <p class="subHeader"> Existing System Administrators <br />
            <font size="1">Legend: admin - Global Administrator, dadmin - Department Administrator.</font><br />
          </p>
          <p>
            <?php
							echo "<ul>";
							$i = 0;
							$smax = mysql_num_rows($squery);
							for($i=0;$i<$smax;$i=$i+1)
							{   echo "<li><a href=\"musermod.php?t=stud&id=".mysql_result($squery,$i,'userid')."\" onclick=\"return openWin(this);\">".mysql_result($squery, $i, 'fullname').", ".mysql_result($squery, $i, 'accesslvl').", Student(".mysql_result($squery,$i,'userid').")</a></li>";
							}
							echo"</ul><ul>";
							$i = 0;
							$fmax = mysql_num_rows($fquery);
							for($i=0;$i<$fmax;$i=$i+1)
							{	echo "<li><a href=\"musermod.php?t=fac&id=".mysql_result($squery,$i,'userid')."\" onclick=\"return openWin(this);\">".mysql_result($squery, $i, 'fullname').", ".mysql_result($squery, $i, 'accesslvl').", Faculty(".mysql_result($squery,$i,'userid').")</a></li>";
							}
							echo"</ul>";
			?>
          </p>
          <?php
							$squery = mysql_query("SELECT * FROM profile_student WHERE accesslvl LIKE '%post'");
	                        $fquery = mysql_query("SELECT * FROM profile_faculty WHERE accesslvl LIKE '%post'");
		  ?>
          <p class="subHeader"> Existing Posting Users <br />
            <font size="1">Legend: post - Global Posting, dpost - Department Posting.</font><br />
          </p>
          <p>
            <?php
							echo "<ul>";
							$i = 0;
							$smax = mysql_num_rows($squery);
							for($i=0;$i<$smax;$i=$i+1)
							{   echo "<li><a href=\"musermod.php?t=stud&id=".mysql_result($squery,$i,'userid')."\" onclick=\"return openWin(this);\">".mysql_result($squery, $i, 'fullname').", ".mysql_result($squery, $i, 'accesslvl').", Student(".mysql_result($squery,$i,'userid').")</a></li>";
							}
							echo"</ul><ul>";
							$i = 0;
							$fmax = mysql_num_rows($fquery);
							for($i=0;$i<$fmax;$i=$i+1)
							{	echo "<li><a href=\"musermod.php?t=fac&id=".mysql_result($squery,$i,'userid')."\" onclick=\"return openWin(this);\">".mysql_result($squery, $i, 'fullname').", ".mysql_result($squery, $i, 'accesslvl').", Faculty(".mysql_result($squery,$i,'userid').")</a></li>";
							}
							echo"</ul>";
			?>
          </p>
          <p class="subHeader"> Manage Ordinary Users </p>
          <p> <a href="msearch.php" onclick="return openWin(this)">Click here to search for users</a> </p></td>
        <td></td>      </td>
      </tr>
    </table>
  </div>
  <div id="divBaseLinks"><a href="../index.php">MNIT Home</a> | <a href="../index.php">Sitemap</a></div>
  <b class="rbottom"><b class="r4"></b> <b class="r3"></b> <b class="r2"></b> <b class="r1"></b></b> </div>
<div class="spacer">&nbsp;</div>
</body>
</html>
