<?php
error_reporting(0);
if (isset($_POST['newpass']))
{	$conn = mysql_connect("localhost", "root", "w3csra2") or die(mysql_error());
	mysql_select_db("mnit", $conn);
	$ds=ldap_connect("localhost");
	ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
	$person=strtolower($_COOKIE['alias']);
	$dn = "o=departments,dc=mnit,dc=ac,dc=in";
	$filter = "(uid=$person)";
	$sr = ldap_search($ds, $dn, $filter);
	$info = ldap_get_entries($ds, $sr);
	$dn1 = $info[0]["dn"];
	$ldapbind = ldap_bind($ds, $dn1, $_POST['oldpass']);
	if ($ldapbind)
	{	$r=ldap_bind($ds, "cn=MNITAdmin, dc=mnit, dc=ac, dc=in", "LdapXeon$#");
		$new["userPassword"] = '{md5}' . base64_encode(pack('H*', md5($_POST['newpass'])));
		ldap_modify($ds, $dn1, $new);
		ldap_close($ds);
		echo "Password Changed Successfully! <a href=\"\" onClick=\"window.close();\">Click Here</a> to close the window!";
		echo "<p><center><img src=\"../images/koala.gif\"></p>";
	}
	else
	{	echo "<b>Hey you entered your old password wrongly! <a href=\"passchange.php\">Click Here</a> to try again!</b>";
		echo "<p><br><center><img src=\"../images/koala.gif\"></p>";
	}
}
else
{	
?>
<html>
<style type="text/css">
<!--
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style>
<head>
<script language="javascript" src="jsval.js"></script>
<script language="javascript">
<!--
        function initValidation()
        {
			var objForm = document.forms["change"];
            objForm.err = "Hey! You have not filled the following fields Properly! Please check them and then Submit:\n\n";
            
            objForm.oldpass.required = 1;
            objForm.oldpass.minlength = 6;
			objForm.oldpass.regexp = /^(?=.*[a-zA-Z\d])(?!.*[\W_\x7B-\xFF]).{6,15}$/;
			
			objForm.newpass.required = 1;
            objForm.newpass.minlength = 6;
			objForm.newpass.regexp = /^(?=.*[a-zA-Z\d])(?!.*[\W_\x7B-\xFF]).{6,15}$/
			
			objForm.newpass1.required = 1;
            objForm.newpass1.minlength = 6;
			objForm.newpass1.equals = "newpass";	
			objForm.newpass1.regexp = /^(?=.*[a-zA-Z\d])(?!.*[\W_\x7B-\xFF]).{6,15}$/
		}
//-->
</script>
</head>
<body onLoad="initValidation()">
<form name="change" id="change" method="post" action="passchange.php">
  <table width="100%" border="0">
    <tr>
      <td width="18%"><span class="style1">Old Password </span></td>
      <td width="18%"><input name="oldpass" id="oldpass" type="password"></td>
      <td width="64%" rowspan="4"><center><img src="../images/bison.gif"></center></td>
    </tr>
    <tr>
      <td><span class="style1">New password </span></td>
      <td><input name="newpass" id="newpass" type="password"></td>
    </tr>
    <tr>
      <td><span class="style1">New Password Again </span></td>
      <td><input name="newpass1" id="newpass1" type="password"></td>
    </tr>
    <tr>
      <td><input name="Submit" type="submit" value="Submit"></td>
      <td><span class="style1"></span></td>
    </tr>
  </table>
</form>
</body>
</html>
<? } ?>