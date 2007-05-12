<?php

/* Low level abstraction. mySQL/LDAP intricacies handled here */

mysql_connect('localhost', 'root', 'password');

function sendResponse($code, $res)
{
    $res->response[0]['code'] = $code;
    switch($code) {
        case 101:   break;
        case 102:   $res->response[0] = 'Invalid API Key!'; break;
        case 201:   $res->response[0] = 'Invalid Userdata!'; break;
        case 301:   $res->response[0] = 'Authentication Failed!'; break;
        case 302:   $res->response[0] = 'Alias Unavailable!'; break;
        case 303:   $res->response[0] = 'Invalid Course Code!'; break;
        case 401:   $res->response[0] = 'Authentication Succeeded!'; break;
        case 402:   $res->response[0] = 'Account Created!'; break;
        case 403:   $res->response[0] = 'Courses Retrieved!'; break;
        case 501:   $res->response[0] = 'Server Error!'; break;
    }
    header('Content-Type: text/xml');
    header('Content-Length: '.strlen($res->asXML()));
    echo $res->asXML();
    exit;
}

function validateTemp($userid, $pass)
{
    mysql_select_db('mnit_temp');
    $res = mysql_query("SELECT passtemp FROM students WHERE userid = '$userid'");
    $res = mysql_fetch_assoc($res);

    if ($pass == $res['passtemp'])
        return true;
    else
        return false;
}

function checkAlias($alias)
{
    mysql_select_db('mnit_profiles');
    $scheck = mysql_query("SELECT * FROM students WHERE alias= '$alias'");
    $fcheck = mysql_query("SELECT * FROM faculty WHERE alias= '$alias'");

    if ((mysql_num_rows($scheck) == 0) and (mysql_num_rows($fcheck) == 0))
        return true;
    else
        return false;
} 

function createAccount($det)
{
    $alias = strtolower($det['ali']);
    $batch = "0".$det['dep'][2];
    $year = "20".substr($det['uid'], 0, 2);
    $branch = $det['dep'][1];
    $uid = substr($det['uid'], 1, 5);
    $gid = "20".substr($det['uid'], 0, 4);

    $uquery = mysql_query("INSERT INTO students VALUES(
                            '".$det['uid']."',
                            '".$alias."',
                            'user',
                            '".mysql_real_escape_string($det['nam'])."',
                            '".$det['gen']."',
                            '".$det['bgp']."',
                            '".mysql_real_escape_string($det['nat'])."',
                            '".$det['res'][0]."',
                            '".$det['mar']."',
                            '".$det['dep'][0]."',
                            ".$det['dep'][1].",
                            '".$det['ema']."',
                            ".intval($year).", '',
                            '".mysql_real_escape_string($det['fat'][0])."',
                            '".mysql_real_escape_string($det['fat'][1])."',
                            '".$det['pho']."',
                            '".mysql_real_escape_string($det['add'])."',
                            '".mysql_real_escape_string($det['res'][1])."',
                            '".mysql_real_escape_string($det['mot'])."',
                            '', '', '', '', '')");

    if (!$uquery)
        return false;

    $ds = ldap_connect('localhost');
    ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
    if ($ds) {
        $r = ldap_bind($ds, 'cn=root,dc=mnit,dc=ac,dc=in', 'password');
        if (!$r) return false;
        $info['uid'] = $alias;
        $info['cn'] = $det['nam'];
        $info['sn'] = $det['nam'];
        $info['mail'] = $alias."@mnit.ac.in";
        $info['objectClass'][0] = "inetOrgPerson";
        $info['objectClass'][1] = "posixAccount";
        $info['objectClass'][2] = "top";
        $info['userPassword'] = $det['pas'];
        $info['loginShell'] = "/bin/bash";
        $info['uidNumber'] = $uid;
        $info['gidNumber'] = $gid;
        $info['homeDirectory'] = "/home/".$alias;
        $info['employeeType'] = "ug";
        $dn="uid=".$alias.",ou=".$year.",ou=students,ou=".$det['dep'][0].",ou=departments,dc=mnit,dc=ac,dc=in";
        $done = ldap_add($ds, $dn, $info);
        ldap_close($ds);
    } else {
        return false;
    }

    return true;
}

function getCourseInfo($code)
{
    mysql_select_db('mnit_master');
    $get = mysql_query("SELECT * FROM syllabus WHERE code = '".$code."'");
    if (!$get)
        return false;
    else
        return mysql_fetch_assoc($get);
}

?>
