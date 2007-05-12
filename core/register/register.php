<html>
<head>
  <title>MNIT Registration Step 3</title>
</head>

<body bgcolor="#FFFFFF" link="#2080D0" vlink="#0060B0" alink="#000000" marginheight="10">
  <table align="center" border="0" width="75%" cellspacing="0" cellpadding="3">
    <tr>
      <td width="100%" valign="bottom">
        <table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td bgcolor="#000000">
              <table border="0" width="100%" cellspacing="0" cellpadding="2">
                <tr>
                  <td width="92%" nowrap bgcolor="#FFE880"><b>MNIT Account Registration (Even Semester) 2007</b></td>

                  <td width="8%" align="right" valign="bottom" nowrap bgcolor="#FFE880"><small><b>Step
                  3</b></small></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>

      <td valign="bottom">
        <table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td bgcolor="#000000">
              <table border="0" width="100%" cellspacing="0" cellpadding="1">
                <tr>
                  <td bgcolor="#C080F0"><font size="-2">&nbsp;&nbsp;&nbsp;</font></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>

      <td valign="bottom">
        <table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td bgcolor="#000000">
              <table border="0" width="100%" cellspacing="0" cellpadding="1">
                <tr>
                  <td bgcolor="#FFC040"><font size="-2">&nbsp;&nbsp;&nbsp;</font></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>

      <td valign="bottom">
        <table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td bgcolor="#000000">
              <table border="0" width="100%" cellspacing="0" cellpadding="1">
                <tr>
                  <td bgcolor="#80C0F0"><font size="-2">&nbsp;&nbsp;&nbsp;</font></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>

      <td valign="bottom">
        <table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td bgcolor="#000000">
              <table border="0" width="100%" cellspacing="0" cellpadding="1">
                <tr>
                  <td bgcolor="#80F0C0"><font size="-2">&nbsp;&nbsp;&nbsp;</font></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>

      <td valign="bottom">
        <table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td bgcolor="#000000">
              <table border="0" width="100%" cellspacing="0" cellpadding="1">
                <tr>
                  <td bgcolor="#F09090"><font size="-2">&nbsp;&nbsp;&nbsp;</font></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

  <table align="center" width="75%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top">
        <table border="0" width="100%" cellspacing="0" cellpadding="3">
          <tr>
            <td>
              <table border="0" width="*%" cellspacing="0" cellpadding="2">
                <tr>
                  <td bgcolor="#000000">
                    <table border="0" width="100%" cellspacing="0" cellpadding="1">
                      <tr>
                        <td bgcolor="#C080F0"><font size="-2">&nbsp;&nbsp;&nbsp;</font></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td>
              <table border="0" width="*%" cellspacing="0" cellpadding="2">
                <tr>
                  <td bgcolor="#000000">
                    <table border="0" width="100%" cellspacing="0" cellpadding="1">
                      <tr>
                        <td bgcolor="#FFC040"><font size="-2">&nbsp;&nbsp;&nbsp;</font></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td>
              <table border="0" width="*%" cellspacing="0" cellpadding="2">
                <tr>
                  <td bgcolor="#000000">
                    <table border="0" width="100%" cellspacing="0" cellpadding="1">
                      <tr>
                        <td bgcolor="#80C0F0"><font size="-2">&nbsp;&nbsp;&nbsp;</font></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td>
              <table border="0" width="*%" cellspacing="0" cellpadding="2">
                <tr>
                  <td bgcolor="#000000">
                    <table border="0" width="100%" cellspacing="0" cellpadding="1">
                      <tr>
                        <td bgcolor="#80F0C0"><font size="-2">&nbsp;&nbsp;&nbsp;</font></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td>
              <table border="0" width="*%" cellspacing="0" cellpadding="2">
                <tr>
                  <td bgcolor="#000000">
                    <table border="0" width="100%" cellspacing="0" cellpadding="1">
                      <tr>
                        <td bgcolor="#F09090"><font size="-2">&nbsp;&nbsp;&nbsp;</font></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>

      <td width="100%" valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td>
              <table border="0" width="100%" cellspacing="0" cellpadding="2">
                <tr>
                  <td bgcolor="#000000">
                    <table border="0" width="100%" cellspacing="0" cellpadding="3">
                      <tr>
                        <td valign="top" bgcolor="#E0E0E0">
                          <p>
                            <?php
                                $conn1 = mysql_connect("localhost", "root", "password") or die(mysql_error());
                                mysql_select_db("mnit_profiles", $conn1);
                                        $alias = strtolower($_POST['Alias']);
                                        $batch = "0".$_POST['Group'];
                                        $year = "20".substr($_POST['userid'],0,2);
                                        $branch = $_POST['dept'];
                                        $uid = substr($_POST['userid'],1,5);
                                        $gid = "20".substr($_POST['userid'],0,4);

                                        $uquery = mysql_query("UPDATE students SET
                                                                alias = '".$_POST['Alias']."',
                                                                accesslvl = 'user', 
                                                                fullname = '".mysql_real_escape_string($_POST['FullName'])."',
                                                                dob = '".$_POST['dob']."',
                                                                gender = '".$_POST['Gender']."', 
                                                                bloodgp = '".$_POST['bloodgp']."',
                                                                nationality = '".mysql_real_escape_string($_POST['nationality'])."',
                                                                residencetype = '".$_POST['residenttype']."',
                                                                maritalstatus = '".$_POST['MaritalStatus']."',
                                                                category = '".$_POST['category']."',
                                                                dept = '".$_POST['dept']."',
                                                                semester = '".$_POST['Semester']."',
                                                                email = '".$_POST['email']."',
                                                                yearofjoin = ".intval($year).",
                                                                concession = '".mysql_real_escape_string($_POST['concession'])."',
                                                                fathersname = '".mysql_real_escape_string($_POST['fname'])."',
                                                                foccupation = '".mysql_real_escape_string($_POST['foccupation'])."',
                                                                fphone = '".$_POST['fphone']."',
                                                                faddress = '".mysql_real_escape_string($_POST['Paddress'])."',
                                                                caddress = '".mysql_real_escape_string($_POST['Address'])."',
                                                                mothersname = '".mysql_real_escape_string($_POST['mname'])."',
                                                                timeofreg = '".date('dmY')."'") or die(mysql_error());
                                        $ds=ldap_connect("localhost");
                                        ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
                                        if ($ds) {
                                            $r = ldap_bind($ds, "cn=root,dc=mnit,dc=ac,dc=in", "password") or die("Doesn't Bind!");
                                            $info['uid'] = $alias;
                                            $info['cn'] = $_POST['FullName'];
                                            $info['sn'] = $_POST['FullName'];
                                            $info['mail'] = $alias."@mnit.ac.in";
                                            $info['objectClass'][0] = "inetOrgPerson";
                                            $info['objectClass'][1] = "posixAccount";
                                            $info['objectClass'][2] = "top";
                                            $info['userPassword'] = $_POST['Password1'];
                                            $info['loginShell'] = "/bin/bash";
                                            $info['uidNumber'] = $uid;
                                            $info['gidNumber'] = $gid;
                                            $info['homeDirectory'] = "/home/".$alias;
                                            $info['employeeType'] = "ug";
                                            $dn="uid=".$alias.",ou=".$year.",ou=students,ou=".$_POST['dept'].",ou=departments,dc=mnit,dc=ac,dc=in";
                                            $done = ldap_add($ds, $dn, $info) or die("Oops! Contact a sysadmin immediately!".ldap_error());
                                            ldap_close($ds);
                                                echo "<p>Done!</p>  
                                                        <p><a href=\"index.php\">Click here for next student</a></p>
                                                    ";
                                        } else {
                                            echo "Unable to connect to LDAP server";
                                        }
                            ?>
                        </p>
                        <p><form name="test" method="post" action="courses.php"><input type="submit" value="Goto Academic Form"/></form></p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

  <center>
    <small><b>&#169; 2005-2007 Malaviya National Institute of Technology</b></small>
  </center>
</body>
</html>
