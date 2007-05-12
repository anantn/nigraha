<?php
	require_once 'auth.php'	;
	require_once '../protected/conn.php';
	if($_COOKIE['access']=='sadmin')
	{}
	else
	{	echo"<span class=\"header\">You are not authorised to view this Page. You are being redirected to the login page</span>";
		echo"<br>If your browser doesn't support redirection, Click <a href=\"index.php\">Here</a> to go...";
		echo"<meta HTTP-EQUIV=\"refresh\" content=0;url=\"index.php\">";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Manage Users</title>
<style type="text/css">
<!--
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style>
<script language="JavaScript" src="jsval.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
<!--
        function initValidation()
        {
			var objForm = document.forms["register"];
            objForm.err = "Hey! You have not filled the Access Field Properly! Please check it and then Submit:\n\n";
            
           	objForm.newAccessLvl.required = 1;
            objForm.newAccessLvl.exclude = '-1';
		}
//-->
</script>
</head>
<body onload="initValidation()">
<form id="form1" name="form1" method="post" action="ausermod.php" onsubmit="return validateCompleteForm(this);">
  <?php
	if(isset($_POST['userid']))
	{	if($_POST['type']=='Student')
		{	$upd = mysql_query("UPDATE profile_student SET accesslvl = '".$_POST['newAccessLvl']."' WHERE CONVERT( userid USING utf8 ) = '".$_POST['userid']."'");	
			echo "<span class=\"style1\">Changes Updated! <a href=\"\" onClick=\"window.close();\">Click Here</a> to close this window";
			exit();
		}
		else
		{	$upd = mysql_query("UPDATE profile_faculty SET accesslvl = '".$_POST['newAccessLvl']."' WHERE CONVERT( userid USING utf8 ) = '".$_POST['userid']."'");	
			echo "<span class=\"style1\">Changes Updated! <a href=\"\" onClick=\"window.close();\">Click Here</a> to close this window";
			exit();
		}
	}
	else
	{}
?>
  <table width="100%" border="0">
    <tr>
      <td width="203"><span class="style1">UserID:</span></td>
      <td width="201"><span class="style1"><?php echo $_REQUEST['id'] ?></span></td>
      <td width="295" rowspan="5"><p class="style1"><strong>Legend</strong><br />
          sadmin - Super Adminsitrator<br />
          admin - Global Administrator<br />
          dadmin - Department Administrator<br />
          post - Global Posting<br />
          dpost - Department Posting<br />
          user - Ordinary User<br />
          ban - Banned </p></td>
    </tr>
    <?php
		if($_REQUEST['t']=='stud')
		{	$res = mysql_query("SELECT * FROM profile_student WHERE userid='".$_REQUEST['id']."'");
			$arr = mysql_fetch_assoc($res);
			$type = 'Student';
		}
		else
		{	$res = mysql_query("SELECT * FROM profile_faculty WHERE userid='".$_REQUEST['id']."'");
			$arr = mysql_fetch_assoc($res);
			$type = 'Faculty';
		}
	?>
    <tr>
      <td><span class="style1">Name:</span></td>
      <td><span class="style1"><?php echo $arr['fullname'] ?></span></td>
    </tr>
    <tr>
      <td><span class="style1">Account Type: </span></td>
      <td><span class="style1"><?php echo $type ?></span></td>
    </tr>
    <tr>
      <td><span class="style1">Current Access Level:</span></td>
      <td><span class="style1"><?php echo $arr['accesslvl'] ?></span></td>
    </tr>
    <tr>
      <td><span class="style1">Change Access Level To: </span></td>
      <td><span class="style1">
        <label></label>
        <select name="newAccessLvl" id="newAccessLvl">
          <option value="-1">Select a level...</option>
          <option value="sadmin">Super Administrator</option>
          <option value="admin">Global Administrator</option>
          <option value="dadmin">Department Adminsitrator</option>
          <option value="post">Global Posting</option>
          <option value="dpost">Department Posting</option>
          <option value="user">Ordinary User</option>
          <option value="ban">Banned</option>
        </select>
        </span></td>
    </tr>
    <tr>
      <td><input type="hidden" name="userid" id="userid" value="<?php echo $arr['userid'] ?>" /></td>
      <td><input type="hidden" name="type" id="type" value="<?php echo $type ?>" /></td>
      <td width="295">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><div align="center">
          <input type="submit" name="Submit" value="Change!" />
        </div></td>
    </tr>
  </table>
</form>
</body>
</html>
