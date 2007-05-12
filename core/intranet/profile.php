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
<script type="text/javascript" src="popup.js"></script>
</head>
<body>
<div id="container"> <b class="rtop"><b class="r1"></b><b class="r2"></b> <b class="r3"></b> <b class="r4"></b></b>
  <div id="pageHeader"><img src="header.gif" /></div>
  <div id="divPageContent">
    <div id="navcontainer">
      <ul id="navlist">
        <li><a href="intrahome.php">Home</a></li>
        <?php
					if($_COOKIE['type']=='student')
					{			echo "<li><a href=\"mess.php\">Mess Dues</a></li>";
								echo "<li><a href=\"acad.php\">Academic Performance</a></li>";
								echo "<li><a href=\"irc.php\">The Student Zone</a></li>";
								echo "<li><a href=\"mail.php\">WebMail</a></li>";
								echo "<li id=\"active\"><a href=\"profile.php\" id=\"current\">Create/Modify your Profile</a></li>";
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
        <td width="695" valign="top" class="rightColumn"><h2>Modify your Profile using the form below:</h2>
          <p>To change your Password, <a href="passchange.php" onclick="return openWin(this);">click here</a>. Other details may be changed/added here: </p>
          <form id="form1" name="form1" method="post" action="profileupdate.php">
            <table width="100%" border="0">
              <tr>
                <td><strong>Field</strong></td>
                <td><strong>Value</strong></td>
                <td><strong>Display on homepage? </strong></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4"><hr /></td>
              </tr>
              <tr>
                <td>Name</td>
                <td><input type="text" name="nam" value="<? echo $_COOKIE['name'] ?>" disabled="disabled" /></td>
                <td><input type="checkbox" name="nam" disabled="disabled" value="name" checked="checked"/></td>
                <td>You HAVE to display your name! </td>
              </tr>
              <tr>
                <td>Access Level </td>
                <td><input type="text" name="access" value="<? echo $_COOKIE['access'] ?>" disabled="disabled" /></td>
                <td><input type="checkbox" name="options[]" value="accesslvl" /></td>
                <td rowspan="2">You can't change these, but you can choose not to display them if you want! </td>
              </tr>
              <tr>
                <td>Gender</td>
                <td><input type="text" name="sex" value="<? echo $stored['gender'] ?>" disabled="disabled" /></td>
                <td><input type="checkbox" name="options[]" value="gender" /></td>
              </tr>
              <tr>
                <td>Address</td>
                <td><textarea name="address" rows="4" cols="25"><? echo $stored['paddress'] ?></textarea></td>
                <td><input type="checkbox" name="options[]" value="paddress" /></td>
                <td>Your Home/Permanent Address </td>
              </tr>
              <tr>
                <td>Phone</td>
                <td><input type="text" name="phno" value="<? echo $stored['phone'] ?>" /></td>
                <td><input type="checkbox" name="options[]" value="phone" /></td>
                <td>An Emergency Phone Number </td>
              </tr>
              <? if ($_COOKIE['type']=='student') { ?>
			  <tr>
                <td>Father's Name </td>
                <td><input type="text" name="fname" value="<? echo $stored['fathersname'] ?>" /></td>
                <td><input type="checkbox" name="options[]" value="fathersname" /></td>
                <td>Your Father's/Guardian's Name </td>
              </tr>
              <tr>
                <td>Mother's Name </td>
                <td><input type="text" name="mname" value="<? echo $stored['mothersname'] ?>" /></td>
                <td><input type="checkbox" name="options[]" value="mothersname" /></td>
                <td>Your Mother's Name </td>
              </tr>
			  <? } ?>
              <tr>
                <td>Alternate Email </td>
                <td><input type="text" name="email" value="<? echo $stored['altmail'] ?>" /></td>
                <td><input type="checkbox" name="options[]" value="altmail" /></td>
                <td>An Alternate (NonMNIT) email Address </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <? if ($_COOKIE['type']=='student') { ?>
			  <tr>
                <td>About You </td>
                <td><textarea name="abt" rows="4" cols="25"><? echo $stored['about'] ?></textarea></td>
                <td><input type="checkbox" name="options[]" value="about" /></td>
                <td>A short description of yourself! </td>
              </tr>
			  <? } ?>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4"><div align="center">
                    <input type="submit" name="Submit" value="Submit" />
                  </div></td>
              </tr>
            </table>
          </form></td>
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
