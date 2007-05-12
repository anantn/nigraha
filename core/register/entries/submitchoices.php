<?php
      $conn = mysql_connect("localhost", "root", "password") or die(mysql_error());
      mysql_select_db("mnit_profiles", $conn);
      $res = mysql_query("SELECT * FROM students WHERE userid='".$_POST['userid']."'") or die(mysql_error());
      $arr = mysql_fetch_assoc($res);
                
?>
<html>
<head>
  <title>MNIT Registration Step 5</title>
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
                  5</b></small></td>
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
                                $count=1;
                                while(isset($_POST['add'.$count])) {
                                  if($_POST['add'.$count]!='') $courses[]=$_POST['add'.$count];
                                  $count++;
                                }
                                if (($arr['semester'] == 6) and (isset($_POST['miniproj'])) and (trim($_POST['facultymp']) != ''))
                                    $courses[] = trim($_POST['facultymp'])." - MP";
                                $toadd = serialize($courses);
                                $squery = mysql_query("UPDATE students SET courses='".$toadd."' WHERE userid = '".$arr['userid']."'");
                            ?>
                            All Done!<br>
                            The student has been registered for the following courses:
                            <center><h3>MALAVIYA NATIONAL INSTITUTE OF TECHNOLOGY, JAIPUR</h3></center>
                            <table width="100%" border="0">
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Branch: <?php echo $arr['dept'] ?>
                                </font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Semester: <?php echo $arr['semester'] ?></font></td>

                                <td width="35%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo date("F j, Y, g:i a"); ?></font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td width="25%"><font face="Verdana, Arial, Helvetica, sans-serif">Student ID: <?php echo $arr['userid'] ?>
                                </font></td>

                                <td width="40%"><font face="Verdana, Arial, Helvetica, sans-serif">
                                <?php echo $arr['fullname'] ?></font></td>
                                

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Year Of Joining: <?php echo $arr['yearofjoin'] ?></font></td>
                              </tr>
                            
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>
                              
                            </table><table width="100%" border="1">
                              <tr>
                                <td><center><strong>Course Code</strong></center></td>
                                <td><center><strong>Title</strong></center></td> 
                                <td><center><strong>Credits</strong></center></td>
                                <td><center><strong>Category</strong></center></td>
                              </tr>
                              <?php 
                                mysql_select_db("mnit_master");
                                $credits=0;
                                foreach($courses as $code) {
                                  $que1 = mysql_query("SELECT * FROM syllabus WHERE code='".$code."'") or die(mysql_error());
                                  $list = mysql_fetch_assoc($que1);
                                                                    
                                  echo "<tr>
                                  <td><center>".$code."</center></td>
                                  <td><center>".$list['title']."</center></td>"; 
                                  $dispcredit=$list['credits'];
                                  if($list['credits']=='') $dispcredit=3;
                                  $credits+=$dispcredit;
                                  echo "<td><center>".$dispcredit."</center></td>
                                  <td><center>".$list['area']."</center></td></tr>";
                                  
                                }
                                echo"<tr>
                                  <td colspan=2>TOTAL CREDITS</td> 
                                  <td><center>".$credits."</center></td>
                                  <td>&nbsp; </td>
                                  </tr>";
                              ?>
                            </table>
                            
                        </p>
                        <p><a href="index.php">NEXT REGISTRATION!</a></p>
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
