<html>
<head>
  <title>MNIT Registration Service Page</title>
  <script language="JavaScript" src="../js/gen_validatorv2.js" type="text/javascript"></script>
  <script type="text/javascript" src="../js/popup.js"></script>

</head>

<body bgcolor="#FFFFFF" link="#2080D0" vlink="#0060B0" alink="#000000" marginheight="10">
<?php
        $conn = mysql_connect("localhost", "root", "password") or die(mysql_error());
        mysql_select_db("mnit_profiles", $conn);
        /*
        $check_dup = mysql_query("SELECT * FROM students WHERE userid='".$_POST['userid']."'") or die(mysql_error());
        $got_dup = mysql_num_rows($check_dup);
         */
        $res = mysql_query("SELECT * FROM students WHERE userid='".$_POST['userid']."'") or die('This student belongs to ARCHITECTURE or FIRST YEAR. Please keep the form seperate <a href=\"index.php\">and enter next student!');
        $arr = mysql_fetch_assoc($res);
        if(isset($_POST['userid']) AND isset($_POST['password']) AND $_POST['userid']!='' AND $_POST['password']=='rhelesv4') {
            
                
?>
  <table align="center" border="0" width="75%" cellspacing="0" cellpadding="3">
    <tr>
      <td width="100%" valign="bottom">
        <table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td bgcolor="#000000">
              <table border="0" width="100%" cellspacing="0" cellpadding="2">
                <tr>
                  <td width="92%" nowrap bgcolor="#FFE880"><b>MNIT Online Registration (Even Semester) 2007</b></td>

                  <td width="8%" align="right" valign="bottom" nowrap bgcolor="#FFE880"><small><b>Step
                  1</b></small></td>
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
                          <p align="justify"><font face="Verdana, Arial, Helvetica, sans-serif">Please enter as many fields as possible...</font></p>
                          <hr>
                          <form name="form1" method="post" action="register.php">
                            <table width="100%" border="0">
                              <tr>
                                <td width="243"><font face="Arial, Helvetica, sans-serif">CollegeID:</font></td>

                                <td width="437"><input name="userid" type="text" id="userid" size="16" maxlength=
                                "6" value="<?php echo $arr['userid'] ?>"></td>
                              </tr>
                              <tr>
                                <td><font face="Arial, Helvetica, sans-serif">Fee Type:</font></td>
                                <td>
                                    <font face="Verdana, Arial, Helvetica, sans-serif">
                                    <select name="fee" id="fee">
                                        <option value="0">
                                            Select Fee Category
                                        </option>

                                        <option value="GD">
                                            General Day Scholar (5100)
                                        </option>

                                        <option value="GH">
                                            General Hosteller (6200)
                                        </option>

                                        <option value="SD">
                                            SC/ST/Girls Day Scholar (100)
                                        </option>

                                        <option value="SH">
                                            SC/ST/Girls Hosteller (1200)
                                        </option>

                                        <option value="DA">
                                            DASA (100)
                                        </option>
                                    </select>
                                    </font>
                                </td>
                              </tr>
                              <tr>
                                <td><font face="Arial, Helvetica, sans-serif">DD No:</font></td>
                                <td><input name="ddno" type="text" id="ddno" size="14" maxlength="12"></td>
                              </tr>

                              <tr>
                                <td><font face="Arial, Helvetica, sans-serif">DD Date (YYYY-MM-DD):</font></td>
                                <td><input name="ddate" type="text" id="ddate" size="14" maxlength="12"></td>
                              </tr>

                              <tr>
                                <td><font face="Arial, Helvetica, sans-serif">Challan No:</font></td>
                                <td><input name="challanno" type="text" id="challanno" size="14" maxlength="12"></td>
                              </tr>

                              <tr>
                                <td><font face="Arial, Helvetica, sans-serif">Bank:</font></td>
                                <td><input name="bankname" type="text" id="bankname" size="50" maxlength="50"></td>
                              </tr>

                              <tr>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><hr>Category:</font></td>
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
                              </tr>                            
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Full Name:</font></td>

                                <td><input name="FullName" id="FullName" type="text" size="30" maxlength="30" value=
                                "<?php echo $arr['fullname'] ?>"></td>
                              </tr>  
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Semester:</font></td>

                                <td><input name="Semester" type="text" id="Semester" size="2" maxlength="15" value="<?php echo $arr['semester'] ?>"></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Batch Number:</font></td>

                                <td><input name="Group" id="Group" type="text" maxlength="1" size="1"></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Date of Birth:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">
                                <input name="dob" id="dob" size="12" maxlength="10" value="<?php echo $arr['dob']; ?>"> (format:- DD-MM-YYYY)</font></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Father's Name:</font></td>

                                <td><input name="fname" id="fname" type="text" size="30" maxlength="30" value="<?php echo $arr['fathersname']; ?>"></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Occupation:</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif"><input name="foccupation" id=
                                "foccupation" type="text" size="30" maxlength="30" value="<?php echo $arr['foccupation']; ?>"></font></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Mother's Name:</font></td>

                                <td><input name="mname" id="mname" type="text" size="30" maxlength="30" value="<?php echo $arr['mothersname']; ?>"></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Nationality:</font></td>
                                <td><input name="nationality" id="nationality" size="50" maxlength="50" value="Indian"></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Blood Group:</font></td>
                                <td><input name="bloodgp" id="bloodgp" size="5" maxlength="3" value="<?php echo $arr['bloodgp']; ?>"></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Department:</font></td>
                                <td><input name="dept" type="text" id="dept" size="2" maxlength="15" value="<?php echo $arr['dept'] ?>"></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Residence Type:</font></td>
                                <td><select name="residenttype" id="residenttype">
                                  <option value="hosteller">
                                    Hosteller
                                  </option>
                                  <option value="dayscholar">
                                    Day Scholar
                                  </option>
                                </select></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Sex:</font></td>
                                <td><select name="Gender" id="Gender">
                                  <option value="">
                                  </option>
                                  <option value="M">
                                    Male
                                  </option>
                                  <option value="F">
                                    Female
                                  </option>
                                </select></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Marital Status:</font></td>
                                <td><select name="MaritalStatus" id="MaritalStatus">
                                  <option value="unmarried">
                                    Unmarried
                                  </option>

                                  <option value="married">
                                    Married
                                  </option>

                                  <option value="divorced">
                                    Divorced
                                  </option>
                                </select></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Permanent Address:</font></td>
                                <td><textarea name="Paddress" id="Paddress" cols="30" rows="5" wrap="VIRTUAL"><?php echo $arr['faddress']; ?></textarea></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Contact Phone:</font></td>
                                <td><input name="fphone" id="fphone" type="text" size="30" maxlength="30" value="<?php echo $arr['fphone']; ?>"></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Email ID:</font></td>
                                <td><input name="email" id="email" type="text" size="30" maxlength="50" value="<?php echo $arr['email']; ?>"></font></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Current Address:</font></td>
                                <td><textarea name="Address" id="Address" cols="30" rows="5" wrap="VIRTUAL"><?php echo $arr['caddress']; ?></textarea></td>
                              </tr>
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Concession:</font></td>
                                <td><input name="concession" id="concession" type="text" size="30" maxlength="30" value="<?php echo $arr['concession']; ?>"></td>
                              </tr>
                              <tr>
                              <td><?php if (trim($arr['alias']) == '') $arr['alias'] = $arr['dept'].$arr['userid']; ?></td>
                                <td><input name="Alias" id="Alias" type="hidden" size="20" maxlength="20" value="<?php echo $arr['alias']; ?>"></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td><input name="Password1" id="Password1" type="hidden" size="15" maxlength="15" value="rhelesv4"></td>
                              </tr>
                              <tr>
                                <td width="243">&nbsp;</td>
                                <td width="437">&nbsp;</td>
                              </tr>
                            
                              <tr>
                                <td>&nbsp;</td>

                                <td><input type="submit" name="Submit" value="Validate!"></td>
                              </tr>
                            </table>
                          </form>
        <script language="JavaScript" type="text/javascript">
  var frmvalidator  = new Validator("form1");
  frmvalidator.addValidation("userid","req","Please enter the studentID");
  frmvalidator.addValidation("userid","maxlen=6","Invalid studentID");
  frmvalidator.addValidation("userid","minlen=6","Invalid studentID");
  frmvalidator.addValidation("userid","numeric","Invalid studentID");
  frmvalidator.addValidation("fee","req");
  
  frmvalidator.addValidation("ddno","numeric","Invalid DDNo");
  frmvalidator.addValidation("ddno","req","Please enter DDNo");
  
  frmvalidator.addValidation("ddate","req","Please fill the DD-Date");
  frmvalidator.addValidation("ddate","regexp=^(2006|2007)-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$", "Invalid Date, use the YYYY-MM-DD format!");
  
  frmvalidator.addValidation("challanno","req", "Please fill the ChallanNo");
  frmvalidator.addValidation("challanno","numeric", "Invalid ChallanNo");
  frmvalidator.addValidation("bankname","req", "Please fill the bank name");

  frmvalidator.addValidation("dob","req","Please fill your Date of Birth");
  frmvalidator.addValidation("dob","regexp=^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[012])-(19[8|9][0-9])$", "Invalid Date, use the DD-MM-YYYY format!"); 
  frmvalidator.addValidation("Gender","req","Please select gender");
  frmvalidator.addValidation("nationality","req","Please enter your nationality");
  frmvalidator.addValidation("nationality","alpha","No digits allowed in nationality");
  frmvalidator.addValidation("email","email", "Invalid email ID!"); 
  frmvalidator.addValidation("Paddress","req", "Please enter your permanent Address!");

        </script>

                          <p>&nbsp;</p>

                          <p>&nbsp;</p>
                        </td>

                        <td bgcolor="#E0E0E0" valign="top">&nbsp;</td>
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
  <?php
	} else {
            echo "Wrong Service Password!!!";
            echo '<br> Please <a href="index.php">retry</a>!<br>';  
	}
 ?>
</body>
</html>
