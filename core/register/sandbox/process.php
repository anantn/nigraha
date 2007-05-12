<?php

mysql_connect('localhost', 'root', 'password');
mysql_select_db('mnit_profiles');

$s = mysql_query("SELECT * FROM students WHERE userid = '".$_POST['userid']."'");
$s = mysql_fetch_assoc($s);

$batch = "0".$_POST['group'];
$year = "20".substr($_POST['userid'],0,2);
$branch = $s['dept'];
$uid = substr($_POST['userid'],1,5);
$gid = "20".substr($_POST['userid'],0,4);

$ds=ldap_connect("localhost");
ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
$r = ldap_bind($ds, "cn=root,dc=mnit,dc=ac,dc=in", "password") or die("Doesn't Bind!");
$info['uid'] = $s['alias'];
$info['cn'] = $s['fullname'];
$info['sn'] = $s['fullname'];
$info['mail'] = $s['alias']."@mnit.ac.in";
$info['objectClass'][0] = "inetOrgPerson";
$info['objectClass'][1] = "posixAccount";
$info['objectClass'][2] = "top";
$info['userPassword'] = $_POST['password1'];
$info['loginShell'] = "/bin/bash";
$info['uidNumber'] = $uid;
$info['gidNumber'] = $gid;
$info['homeDirectory'] = "/home/".$alias;
$info['employeeType'] = "ug";
$dn="uid=".$s['alias'].",ou=".$year.",ou=students,ou=".$branch.",ou=departments,dc=mnit,dc=ac,dc=in";
$done = ldap_add($ds, $dn, $info);
if (!$done)
    ldap_error($ds);
else
    echo 'Done!';

ldap_close($ds);

?>
