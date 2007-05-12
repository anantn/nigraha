<?php
      $conn = mysql_connect("localhost", "root", "password") or die(mysql_error());
      mysql_select_db("mnit_profiles", $conn);
      $res = mysql_query("SELECT * FROM students WHERE userid='".$_POST['userid']."'") or die(mysql_error());
      $arr = mysql_fetch_assoc($res);
                
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=us-ascii">

  <title>MNIT Registration Step 4</title>
<script type="text/javascript" src="newjs/popup.js"></script>
<script language="javascript" src="newjs/gen_validatorv2.js" type="text/javascript"></script>
<script language="javascript" src="js/MochiKit.js" type="text/javascript"></script>
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
                  4</b></small></td>
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
                          <p align="justify"><font face="Verdana, Arial, Helvetica, sans-serif">Your account has been activated. Please choose the courses you wish to take up this semester.</font></p>
                          <form name="coursechoice" method="post" action="submitchoices.php">
                            <table width="100%" border="0">
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Branch: <input name="show2" type="text"
                                disabled id="show2" size="2" maxlength="15" value="<?php echo $arr['dept'] ?>">
                                <input name="dept" type="hidden" id="dept" size="2" maxlength="15" value=
                                "<?php echo $arr['dept'] ?>"></font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">Semester: <?php echo $arr['semester'] ?></font></td>

                                <td width="35%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo date("F j, Y, g:i a"); ?></font></td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td width="25%"><font face="Verdana, Arial, Helvetica, sans-serif">Student ID: <input name="show"
                                type="text" disabled id="show" size="15" maxlength="15" value=
                                "<?php echo $arr['userid'] ?>" /> <input name="userid" type="hidden" id="userid" size=
                                "15" maxlength="15" value="<?php echo $arr['userid'] ?>" /></font></td>

                                <td width="40%"><font face="Verdana, Arial, Helvetica, sans-serif"><input name="show3" id="show3"
                                disabled type="text" size="30" maxlength="30" value="<?php echo $arr['fullname'] ?>" />
                                <input name="FullName" id="FullName" type="hidden" size="30" maxlength="30" value=
                                "<?php echo $arr['fullname'] ?>" /></font></td>
                                

                                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Year Of Joining: <?php echo $arr['yearofjoin'] ?></font></td>
                              </tr>
                            
                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>

                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>
                              <tr>
                                <td colspan=3><center><font face="Verdana, Arial, Helvetica, sans-serif">List of available courses: 
                                    <a href="show.php?semester=<?php echo $arr['semester']; ?>&dept=<?php echo $arr['dept']; ?>" onclick="return openWin(this);">Department Electives</a> |
                                    <a href="show.php?insti=1" onclick="return openWin(this);">Institute Electives</a> |
                                    <a href="show.php?dept=<?php echo $arr['dept']; ?>" onclick="return openWin(this);">All Courses</a>
                                </center></font></td>
                              </tr>
                            </table>
                            <?php
                               mysql_select_db("mnit_academic", $conn);
                               $que = mysql_query("SELECT * FROM syllabus WHERE semester='".$arr['semester']."' and dept='".$arr['dept']."' ") or die(mysql_error());
                            ?>
                            <table width="100%" border="1">
                              <tr>
                                <td><center><strong>Course Code</strong></center></td>
                                <td><center><strong>Title</strong></center></td> 
                                <td><center><strong>Credits</strong></center></td>
                              </tr>
                              <?php 
                                $count=0;
                                while($list = mysql_fetch_assoc($que)) {
                                    $count++;
                                    echo "
                                        <tr>
                                            <td><center><input type=\"text\" id=\"add".$count."\" name=\"add".$count."\" value=\"".$list['code']."\" size=\"7\" maxlength=\"6\" /></center></td>
                                            <td><center><div id=\"addtitle".$count."\">".$list['title']."</div></center></td> 
                                            <td><center><div id=\"addcredit".$count."\">".$list['credits']."</div></center></td>
                                        </tr>";
                                }
                              
                                echo "
                                <tr>
                                    <td colspan=\"3\">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan=\"3\"><center><strong>Enter Back Papers if Any</strong></center></td> 
                                </tr>";

                                for($c=0; $c<3; $c++) {
                                    $count++; $curid = 'add'.$count;
                                    echo "
                                        <tr>
                                            <td><center><input type=\"text\" id=\"add".$count."\" name=\"add".$count."\" size=\"7\" maxlength=\"6\" /></center></td>
                                            <td><center><div id=\"addtitle".$count."\"></div></center></td> 
                                            <td><center><div id=\"addcredit".$count."\"></div></center></td>
                                        </tr>";
                                }

                                if ($arr['semester'] == 6) {
                                    echo "
                                    <tr>
                                        <td colspan=\"3\">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan=\"3\"><center>Select checkbox if you wish to enroll for mini-project (3 credits) and enter faculty guide's name</center></td> 
                                    </tr>      
                                    <tr>
                                        <td><center><input type=\"checkbox\" name=\"miniproj\" value=\"1\">Mini Project</input></center></td>
                                        <td><center>Faculty Guide: <input type=\"text\" name=\"facultymp\" size=\"30\" maxlength=\"30\" /></center></td> 
                                        <td><center>Make sure you have already spoken to the faculty about your miniproject before selecting this!</center></td>
                                    </tr>";
                                }
                            ?>
                              
                            </table>
                            <div style="visibility:hidden" id="totalnocourses"><?php echo $count; ?></div>
                            <table width="100%" border="0">
                              <tr>
                                <td>
                                  <p><font face="Verdana, Arial, Helvetica, sans-serif">Please take a moment to read the above data again and crosscheck for correctness. Once submitted, you cannot change the choices. 
                                  You can check the course codes in the lists provided above the table.</font></a></p>

                                  <div align="center">
                                    <font face="Verdana, Arial, Helvetica, sans-serif"><strong>Confirm Choices</strong> <input name="Agree" id="Agree" type="checkbox" value="1" unchecked /></font>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td><font face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              </tr>

                              <tr>
                                <td>
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
                                var frm = document.forms["coursechoice"];
        
                                if(frm.Agree.checked)
                                {
                                    return true;
                                }
                                else
                                {
                                    alert('Please Confirm your choices!');
                                    return false;
                                }
                            }
      
                            var frmvalidator  = new Validator("coursechoice");
                            frmvalidator.setAddnlValidationFunction("DoCustomCheck");

                            var theNode = MochiKit.DOM.getElement("totalnocourses");
                            var num = parseInt(theNode.innerHTML);

                            function loadXMLDoc(dname) 
                            {
                                var xmlDoc;
                                // code for IE
                                if (window.ActiveXObject)
                                {
                                    xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
                                }
                                // code for Mozilla, Firefox, Opera, etc.
                                else if (document.implementation && document.implementation.createDocument)
                                {
                                    xmlDoc=document.implementation.createDocument("","",null);
                                }
                                else
                                {
                                    alert('Your browser cannot handle this script');
                                }
                                xmlDoc.async=false;
                                xmlDoc.load(dname);
                                return(xmlDoc);
                            }

                            gotResponse = function(daid, req)
                            {
                                var xml = req.responseXML;
                                var code = xml.getElementsByTagName("response").item(0).attributes.getNamedItem("code");

                                var cor = xml.getElementsByTagName("course");
                                var cou = cor.item(0);
                                var dataNodes = cou.childNodes;
                                var title = MochiKit.DOM.scrapeText(dataNodes[1]);
                                var credits = MochiKit.DOM.scrapeText(dataNodes[6]);

                                var editTitle = MochiKit.DOM.getElement("addtitle"+daid);
                                var editCredits = MochiKit.DOM.getElement("addcredit"+daid);
                                editTitle.innerHTML = title; editCredits.innerHTML = credits;
    
                                if (MochiKit.Base.compare(code.value, 303) != 1)
                                {
                                    editTitle.innerHTML = "COURSE NOT FOUND!";
                                    editCredits.innerHTML = "0";
                                }
                            }

                            fillDetails = function(which)
                            {
                                var box = (which.src());
                                var req = loadXMLDoc("../web/getCourseReq.xml");
                                var nod = req.getElementsByTagName("mnit-request");
                                var att = nod.item(0).attributes;
                                var editFor = att.getNamedItem("for"); editFor.value = box.value;
                                var editApi = att.getNamedItem("api"); editApi.value = "standardjs";

                                var d = MochiKit.Async.doXHR("http://172.16.1.20/register/anant/web/", {'method': 'POST', 'sendContent': req, 'headers':{'Content-type': 'text/xml'}});
                                d.addCallback(gotResponse, box.id.substr(3));
                            }
    
                            for (var x = 1; x <= num; x++)
                            {
                                MochiKit.Signal.connect("add"+x, "onchange", fillDetails);
                            }

                          </script>


                          <p><strong>Section Officer(Academic)</strong>
                          Instructions to students:
                          <ol>
                            <li>Academic Programme and the Syllabi must be consulted before filling.</li>
                            <li>Course Code is the only basis of recording choices and hence must exercize caution in filling them.</li>
                            <li>Total credits including those of back papers must not exceede the overall limit for the given semester</li>
                          </ol>
                        </p>
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
    <font face="Verdana, Arial, Helvetica, sans-serif"><small><b>&#169; 2005 Malaviya National Institute of
    Technology</b></small></font>
  </center>
</body>
</html>
