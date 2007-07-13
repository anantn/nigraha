<?php
        if(isset($_POST['userid']) AND isset($_POST['password']) AND $_POST['userid']!='' AND $_POST['password']!='') {
            $conn = mysql_connect("localhost", "root", "password") or die(mysql_error());
            mysql_select_db("mnit_temp", $conn);
            if(strval(substr($_POST['userid'],0,1))=="0") {
                $res = mysql_query("SELECT * FROM students WHERE userid='".$_POST['userid']."'") or die(mysql_error());
                $arr = mysql_fetch_assoc($res);
                if($arr['passtemp']==$_POST['password']) {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
<script type="text/javascript" src="js/popup.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
<title>MNIT Registration Step 2</title>
  <script language="JavaScript" src="js/gen_validatorv2.js" type="text/javascript"></script>
</head>

<body bgcolor="#FFFFFF">
  <table align="center" border="0" width="75%" cellspacing="0" cellpadding="3">
    <tr>
      <td width="100%" valign="bottom">
        <table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td bgcolor="#000000">
              <table border="0" width="100%" cellspacing="0" cellpadding="2">
                <tr>
                  <td width="90%" nowrap bgcolor="#FFE880"><b>MNIT Account Registration (Even Semester) 2007</b></td>

                  <td width="10%" align="right" valign="bottom" nowrap bgcolor="#FFE880"><small><b>Step
                  2</b></small></td>
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
                  <td bgcolor="#C080F0"><font size="-2" face=
                  "Verdana, Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;</font></td>
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
                  <td bgcolor="#FFC040"><font size="-2" face=
                  "Verdana, Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;</font></td>
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
                  <td bgcolor="#80C0F0"><font size="-2" face=
                  "Verdana, Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;</font></td>
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
                  <td bgcolor="#80F0C0"><font size="-2" face=
                  "Verdana, Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;</font></td>
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
                  <td bgcolor="#F09090"><font size="-2" face=
                  "Verdana, Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;</font></td>
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
                        <td bgcolor="#C080F0"><font size="-2" face=
                        "Verdana, Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;</font></td>
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
                        <td bgcolor="#FFC040"><font size="-2" face=
                        "Verdana, Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;</font></td>
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
                        <td bgcolor="#80C0F0"><font size="-2" face=
                        "Verdana, Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;</font></td>
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
                        <td bgcolor="#80F0C0"><font size="-2" face=
                        "Verdana, Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;</font></td>
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
                        <td bgcolor="#F09090"><font size="-2" face=
                        "Verdana, Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;</font></td>
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
                        <td width="99%" valign="top" bgcolor="#E0E0E0">
                          <p align="justify"><font face="Verdana, Arial, Helvetica, sans-serif">You have successfully
                          been validated! Please proceed by filling in all the details that we require to create your
                          account. ALL Fields are COMPULSORY!</font></p>
                          <form name="register" method="post" action="register.php">
                            <table width="100%" border="0">
                              <tr>
                                <td width="25%"><font face="Verdana, Arial, Helvetica, sans-serif">UserID:</font></td>

                                <td width="40%"><font face="Verdana, Arial, Helvetica, sans-serif"><input name="show"
                                type="text" disabled id="show" size="15" maxlength="15" value=
                                "<?php echo $arr['userid'] ?>"> <input name="userid" type="hidden" id="userid" size=
                                "15" maxlength="15" value="<?php echo $arr['userid'] ?>"></font></td>

                                <td width="35%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Sorry but
                                you can't change your UserID!</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Full Name:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><input name="show3" id="show3"
                                disabled type="text" size="30" maxlength="30" value="<?php echo $arr['name'] ?>">
                                <input name="FullName" id="FullName" type="hidden" size="30" maxlength="30" value=
                                "<?php echo $arr['name'] ?>"></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">We know your name, but
                                just make sure that there are no mistakes in its spelling! If there is, please get in
                                touch with a SysAdmin immediatly!</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Date of Birth:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">
                                <input name="dob" id="dob" size="12" maxlength="10" value=""></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Please enter date of birth in the DD-MM-YYYY format only!</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Gender</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><select name="Gender" id=
                                "Gender">
                                  <option value="">
                                  </option>

                                  <option value="M">
                                    Male
                                  </option>

                                  <option value="F">
                                    Female
                                  </option>
                                </select></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Choose your gender</font></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Nationality:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">
                                <input name="nationality" id="nationality" size="50" maxlength="50" value=
                                "Indian"></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Please enter the country you belong to.</font></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Blood Group:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">
                                <input name="bloodgp" id="bloodgp" size="5" maxlength="3" value=
                                ""></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Do not use any special characters. eg: O+, AB, A+ etc.</font></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Marital Status:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">
                                <select name="MaritalStatus" id="MaritalStatus">
                                  <option value="unmarried">
                                    Unmarried
                                  </option>

                                  <option value="married">
                                    Married
                                  </option>

                                  <option value="divorced">
                                    Divorced
                                  </option>
                                </select></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Please enter your marital status</font></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Residence Type:</font></td>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><select name="residenttype" id="residenttype">
                                  <option value="hosteller">
                                    Hosteller
                                  </option>
                                  <option value="dayscholar">
                                    Day Scholar
                                  </option>

                                </select></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Are you a hosteller or a dayscholar?</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Category:</font></td>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><select name="category" id="category">
                                  <option value="General">
                                    General
                                  </option>
                                  <option value="SC">
                                    SC
                                  </option>
                                  <option value="ST">
                                    ST
                                  </option>
                                  <option value="OBC">
                                    OBC
                                  </option>
                                </select></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Your category</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Current Address:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">
                                <textarea name="Address" id="Address" cols="30" rows="5" wrap="VIRTUAL">
</textarea></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Please enter your
                                current residing Address (enter MNIT Hostel for hostellers)</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Department:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><input name="show2" type="text"
                                disabled id="show2" size="2" maxlength="15" value="<?php echo $arr['dept'] ?>">
                                <input name="dept" type="hidden" id="dept" size="2" maxlength="15" value=
                                "<?php echo $arr['dept'] ?>"></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">We know this too, just
                                checking! If you think value in the field is incorrect, please contact a SysAdmin
                                immediately!</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Semester:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><input name="show4" type="text"
                                disabled id="show4" size="2" maxlength="15" value="<?php echo $arr['semester'] ?>">
                                <input name="Semester" type="hidden" id="Semester" size="2" maxlength="15" value=
                                "<?php echo $arr['semester'] ?>"></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">If this is not the correct semester you are registering for, please contact a System Administrator</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Batch Number:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><input name="Group" id="Group"
                                type="text" maxlength="1" size="1"></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Your Batch (eg:- if you
                                are in CP1 enter 1)</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Alias:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><input name="Alias" id="Alias"
                                type="text" size="20" maxlength="20"> @ mnit.ac.in</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">A preferred username for
                                your new emaild ID. No underscores (_) allowed! Your email will not be activated immediately
                                but you will be notified when it is.</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Password:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><input name="Password1" id=
                                "Password1" type="password" size="15" maxlength="15"></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Choose a new password
                                that you can remember. Please use one that is atleast 6 characters long!</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Password Again:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><input name="Password2" id=
                                "Password2" type="password" size="15" maxlength="15"></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Please enter your
                                password again, because we want to make sure that you're not making any
                                mistakes!</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Alternate Email ID:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><input name="email" id=
                                "email" type="text" size="30" maxlength="50"></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Enter any existing email-id that you are using.</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Father's Name:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><input name="fname" id=
                                "fname" type="text" size="30" maxlength="30"></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Enter your father's name</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Occupation:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><input name="foccupation" id=
                                "foccupation" type="text" size="30" maxlength="30"></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Enter your father's Occupation</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Contact Phone:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><input name="fphone" id=
                                "fphone" type="text" size="30" maxlength="30"></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Enter your father's Day Contact Number in a standard format (like +91-44-26284593)</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Mother's Name:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><input name="mname" id="mname" type="text" size="30" maxlength="30"></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Enter your mother's name</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Permanent Address:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">
                                <textarea name="Paddress" id="Paddress" cols="30" rows="5" wrap="VIRTUAL">
</textarea></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Enter your permanent Address.</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Concession:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><input name="concession" id="concession" type="text" size="30" maxlength="30"></font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Enter the name of the nearest Bus/Train terminus to your hometown, to avail student concession.</font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>
                              
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td colspan="3">
                                  <p><font face="Verdana, Arial, Helvetica, sans-serif">Before you submit the form,
                                  please make sure that all the details you filled in are correct. Also, please make
                                  sure that you read the Acceptable User Policy and fully accept it and agree to abide
                                  by the rules that the policy lays out!</font></p>

                                  <p><font face="Verdana, Arial, Helvetica, sans-serif"><a href="policy.html" onclick=
                                  "return openWin(this);">Click here to read the Acceptable User Policy</a></font></p>

                                  <div align="center">
                                    <font face="Verdana, Arial, Helvetica, sans-serif"><strong>User Policy Accepted
                                    :</strong> <input name="Agree" id="Agree" type="checkbox" value="1" unchecked /></font>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>


                              <tr>
                                <td colspan="3">
                                  <div align="center">
                                    <font face="Verdana, Arial, Helvetica, sans-serif"><input type="submit" value=
                                    "Submit"></font>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </form>
                          
                                  <script language="JavaScript" type="text/javascript">
   function DoCustomCheck()
   {
        var frm = document.forms["register"];
        if(frm.Password1.value != frm.Password2.value)
        {
            alert('The Password and verified password does not match!');
            return false;
        }
        else
        {
            return true;
        }

        if(frm.Agree.checked == false)
        {
            alert('Please accept the AUP by selecting the Checkbox!');
            return false;
        }
        else
        {
            return true;
        }
    }
                  
                    
  var frmvalidator  = new Validator("register");
  frmvalidator.addValidation("dob","req","Please fill your Date of Birth");
  frmvalidator.addValidation("dob","regexp=^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[012])-(19[8|9][0-9])$", "Invalid Date, use the DD-MM-YYYY format!"); 
   
  frmvalidator.addValidation("Gender","req","Please select your gender");
  
  frmvalidator.addValidation("nationality","req","Please enter your nationality");
  frmvalidator.addValidation("nationality","alpha","No digits allowed in nationality");
  
//  frmvalidator.addValidation("bloodgp","req","Please enter your blood group");
  
  frmvalidator.addValidation("Address","req", "Please enter your current address");
  
  frmvalidator.addValidation("Group","req", "Please enter your group id");
  frmvalidator.addValidation("Group","num","Please enter an integer for group id!");
  frmvalidator.addValidation("Group","gt=0","Batch number should be in between 1 and 4");
  frmvalidator.addValidation("Group","lt=5","Batch number should be in between 1 and 4");

  frmvalidator.addValidation("Alias","req", "Please select an Alias for your self!");
  frmvalidator.addValidation("Alias","minlen=3","Alias too short!");
  frmvalidator.addValidation("Alias","maxlen=15","Alias too long!");
  frmvalidator.addValidation("Alias","regexp=^[a-zA-Z][a-zA-Z0-9\.]{2,14}$","Please stick to the format in the alias!");

  
  frmvalidator.addValidation("Password1","req", "Please choose a password for yourself!");
  frmvalidator.addValidation("Password1","minlen=6","Password has to be atleast 6 characters long!");
  frmvalidator.addValidation("Password1","maxlen=15","Password has to be less than 15 characters long!");
  frmvalidator.addValidation("Password1","regexp=^[a-zA-Z0-9_]{6,15}$","Enter a valid password!");

  frmvalidator.addValidation("Password2","req", "Please verify password fields!");

  frmvalidator.addValidation("email","req", "Enter your email ID!");
  frmvalidator.addValidation("email","email", "Invalid email ID!"); 
  frmvalidator.addValidation("fname","req", "Please enter your father's name!");
  frmvalidator.addValidation("foccupation","req", "Please enter your father's occupation!");
  frmvalidator.addValidation("fphone","req", "Please enter your father's Day Contact number!");
  frmvalidator.addValidation("fphone","minlen=9","please enter phone number along with STD Code (like +91-44-26284593)");
   
  frmvalidator.addValidation("mname","req", "Please enter your mother's name!");
  frmvalidator.addValidation("Paddress","req", "Please enter your permanent Address!");
//  frmvalidator.addValidation("concession","req", "Please fill the concession field");
  frmvalidator.setAddnlValidationFunction("DoCustomCheck"); 
        </script>

                        </td>

                        <td width="1%" valign="top" bgcolor="#E0E0E0">&nbsp;</td>
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
    <font face="Verdana, Arial, Helvetica, sans-serif"><small><b>&#169; 2005-2007 Malaviya National Institute of
    Technology</b></small></font>
  </center>
  <?php
			} else {
            	echo "Sorry! But that is NOT your temporary password! Please enter the password EXACTLY as given in the envelope!";
                echo '<br> You are being redirected to the previous page to retry, <a href="index.php">Click Here</a> if you do not wish to wait!<br>'; } 
  		} else {
  			echo "Faculty regitration not available at this time!";
  		}
  	} else {
  		echo "Sorry! But you have entered and invalid userID / password! Please enter the details EXACTLY as given in the envelope!";
  		echo '<br>You are being redirected to the previous page to retry, <a href="index.php">Click Here</a> if you do not wish to wait!'; 
    }
 ?>
</body>
</html>
