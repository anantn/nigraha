<?php
	require_once '../protected/envi.php';
        ob_start();
        $getfid = mysql_query("SELECT userid FROM profile_faculty WHERE alias='".$_POST['alias']."'");
        $gotfid = mysql_fetch_assoc($getfid);
        $getsid = mysql_query("SELECT userid FROM profile_student WHERE alias='".$_POST['alias']."'");
        $gotsid = mysql_fetch_assoc($getsid);

        if($gotsid['userid']=='') $userid=$gotfid['userid'];
        else $userid=$gotsid['userid'];

		$ds=ldap_connect("localhost");
		ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
		$person=strtolower($_POST['alias']);
		$dn = "o=departments,dc=mnit,dc=ac,dc=in";
		$filter="(uid=$person)";
		$sr=ldap_search($ds, $dn, $filter);
		$info = ldap_get_entries($ds, $sr);
		$dn1 = $info[0]["dn"];
		$ldapbind = ldap_bind($ds, $dn1, $_POST['password']);
		if ($ldapbind)
        {	if (strval(substr($userid,0,1))=="0")
			{	$check = "SELECT fullname, accesslvl, dept, alias, posts FROM profile_student WHERE userid = '".$userid."'";
				$result = mysql_query($check) or die(mysql_error());
				$array = mysql_fetch_array($result);
				$dcheck = $array['accesslvl'];
				if($dcheck=='ban')
				{	echo "Sorry But you have been banned! Please contact a SysAd or your HOD to determine the cause. Most likely, it would be due to non-compliance to the Acceptable User policy";
					exit();
				}
				setcookie("userid", $userid);
				setcookie("type", 'student');
				setcookie("auth", 1);
				setcookie("name", $array['fullname']);
				setcookie("access", $array['accesslvl']);
				setcookie("dept", $array['dept']);
				setcookie("alias", $array['alias']);
				setcookie("posts", $array['posts']);
				echo"<link href=\"intrastyle.css\" type=\"text/css\" rel=\"stylesheet\" />";
				echo"<span class=\"header\">You are logged in... Please wait while you are redirected or click <a href=\"intrahome.php\">here</a> to go...</span>";
				echo"<meta HTTP-EQUIV=\"refresh\" content=2;url=\"intrahome.php\">";
			}
			else
			{	$check = "SELECT fullname, accesslvl, dept, alias, posts FROM profile_faculty WHERE userid = '".$userid."'";
				$result = mysql_query($check) or die(mysql_error());
				$array = mysql_fetch_array($result);
				$dcheck = $array['accesslvl'];
				if($dcheck=='ban')
				{	echo "Sorry But you have been banned! Please contact a SysAd or your HOD to determine the cause. Most likely, it would be due to non-compliance to the Acceptable User policy";
					exit();
				}
				setcookie("userid", $userid);
				setcookie("type", 'faculty');
				setcookie("auth", 1);
				setcookie("name", $array['fullname']);
				setcookie("access", $array['accesslvl']);
				setcookie("dept", $array['dept']);
				setcookie("alias", $array['alias']);
				setcookie("posts", $array['posts']);
				echo"<link href=\"intrastyle.css\" type=\"text/css\" rel=\"stylesheet\" />";
				echo"<span class=\"header\">You are logged in... Please wait while you are redirected or click <a href=\"intrahome.php\">here</a> to go...</span>";
				echo"<meta HTTP-EQUIV=\"refresh\" content=2;url=\"intrahome.php\">";
			}
		}
		else
		{	echo"<link href=\"intrastyle.css\" type=\"text/css\" rel=\"stylesheet\">";
			echo"<span class=\"header\">You have entered Incorrect Details. Please Ensure that your userid and password are correct";
			echo"<br>You are being redirected to the intranet login page. If your browser doesn't support redirection, click <a href=\"index.php\">here</a> to go...</span>";
			echo"<meta HTTP-EQUIV=\"refresh\" content=3;url=\"index.php\">";
		}	
?>
