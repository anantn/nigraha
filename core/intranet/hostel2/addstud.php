<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en"><head>

<link rel="stylesheet" type="text/css" href="safe.css"><title>Add Students</title>


<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="expires" content="Wed, 11 Jun 2001 00:00:01 GMT">
<meta name="description" content="Undergraduate, Graduate and Part-time course admissions at MNIT">
<meta name="keywords" content="mnit, university, undergraduate, graduate, admissions, postgraduate, prospectus, part-time, degree, degrees, course, courses">
<meta name="build" content="mnit template v1">
<script language="JavaScript" type="text/javascript">

<!-- Begin
function handler(){
var URL = document.form.site.options[document.form.site.selectedIndex].value;
window.location.href = URL;
}
// End -->

</script></head><body>

<table summary="" class="width100" border="0" cellpadding="5" cellspacing="5">
<tbody><tr>
<td id="leftcol" valign="top">
<a name="top"></a>
<div class="textcenter">
<a href="http://www.mnit.ac.in/">
<img src="mnit_logo.gif" alt="MNIT page" height="107" width="107"></a>
</div>

<a href="#content">
<img src="blank.gif" alt="Skip navigation" height="1" width="150"></a>
<hr>


<a href="http://mnit.ac.in/">Home</a><br><hr>

<a href="http://mnit.ac.in/aboutmnit/">About MNIT</a><br><hr>
<a href="http://mnit.ac.in/academic/">Academic</a><br><hr>
<a href="http://mnit.ac.in/admissions/">Admissions</a><br><hr>
<a href="http://mnit.ac.in/administration/">Administration</a><br><hr>

<a href="http://mnit.ac.in/departments/">Departments</a><br><hr>
<a href="http://mnit.ac.in/students/">Students</a><br><hr>
<a href="http://mnit.ac.in/libraries/">Libraries</a><br><hr>
<a href="http://mnit.ac.in/placement/">Placement</a><br><hr>

<a href="http://mnit.ac.in/creativearts/">Creative Arts</a><br><hr>


</td>

<td id="rightcol" valign="top">
<table summary="" border="0" width="100%">
<tbody><tr width="100%">

<td align="left" valign="right" width="100%">
<a name="content"></a><h1>My MNIT</h1>
<p>Enter New Student Information:</td>

<td align="left" valign="right" width="100%">
<p><label for="search">
<img src="searchblue.gif" alt="Site Search:" width="107" height="14">&nbsp;</label><br>
 
<!--<label for="logo"><img src="../images/logo.gif" width="107" height="100" alt="Institute Logo:">&nbsp;</label><br>-->
<label for="search">
<img src="atoz1.gif" alt="Institute Logo:" usemap="#AtoZ" align="bottom" height="54" width="255">&nbsp;</label><br>
<!--  <td rowspan="2"><img
 src="../images/atoz1.gif" alt="A to Z Index"
 width="255" height="54" border="0" usemap="#AtoZ">-->
</p></td>
</tr>
<tr><td colspan="2">

<img src="blueline.gif" alt="" height="3" width="100%"><br></td></tr>
<!--

<tr valign="top"><td><img src="../images/welcome.gif" width="200" height="16" alt="Welcome to MNIT Jaipur"></td><td>&nbsp;</td></tr>
-->
<tr valign="top"><td colspan="2">

<?php
        $hostname  = 'localhost';
        $dbname = 'Hostel';
        $username = 'root';
        $password = '';
?>

<form method="POST" action="">
<div align="center">
    <center>
    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="75%" height="230">
      <tr>
        <td width="340" height="50">Student ID:</td>
        <td width="340" height="50">
        <input type="text" name="StudentID" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="50">Name:</td>
        <td width="340" height="50">
        <input type="text" name="StudentName" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="50">Bank Account No.</td>
        <td width="340" height="50"><input type="text" name="BankAC" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="50">Branch:</td>
        <td width="340" height="50"><select size="1" name="Branch">
        <option>Architecture</option>
        <option>Civil</option>
        <option>Computer</option>
        <option>Chemical</option>
        <option>Eletrical</option>
        <option>Electronics</option>
        <option>Mechanical</option>
        <option>Metallurgy</option>
        <option>Information technology</option>
        </select></td>
      </tr>
      <tr>
        <td width="340" height="50">Semester:</td>
        <td width="340" height="50"><select size="1" name="Semester">
        <option>I</option>
        <option>II</option>
        <option>III</option>
        <option>IV</option>
        <option>V</option>
        <option>VI</option>
        <option>VII</option>
        <option>VIII</option>
        <option>IX</option>
        <option>X</option>
        </select></td>
      </tr>
      <tr>
        <td width="340" height="50">Father's Name:</td>
        <td width="340" height="50">
        <input type="text" name="FatherName" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="50">Father's Occupation:</td>
        <td width="340" height="50">
        <input type="text" name="FatherOccupation" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="50">Contact Telephone No.</td>
        <td width="340" height="50">
        <input type="text" name="ContactTelephoneNo" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="50">Permanent Address:</td>
        <td width="340" height="50">
        <input type="text" name="PermanentAddress" size="45"></td>
      </tr>
      <tr>
        <td width="340" height="50">Telephone No.</td>
        <td width="340" height="50">
        <input type="text" name="TelephoneNo" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="50">Local guardian Name:</td>
        <td width="340" height="50"><input type="text" name="LGName" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="50">Local guardian Occupation:</td>
        <td width="340" height="50">
        <input type="text" name="LGOccupation" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="50">Address:</td>
        <td width="340" height="50">
        <input type="text" name="LGAddress" size="45"></td>
      </tr>
      <tr>
        <td width="340" height="51">Contact No.:</td>
        <td width="340" height="51">
        <input type="text" name="LGContactNo" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="51">Physical Ailment:</td>
        <td width="340" height="51">
        <input type="text" name="PhysicalAilment" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="51">Physically Challenged:</td>
        <td width="340" height="51">
        <select size="1" name="PhysicallyChallenged">
        <option>NO</option>
        <option>Yes</option>
        </select></td>
      </tr>
      <tr>
        <td width="340" height="51">Current Hostel No.</td>
        <td width="340" height="51">
        <input type="text" name="CurrentHostelNo" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="51">Room No.</td>
        <td width="340" height="51"><input type="text" name="RoomNo" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="51">Embassy Address:</td>
        <td width="340" height="51">
        <input type="text" name="EmbassyAddress" size="45"></td>
      </tr>
      <tr>
        <td width="340" height="51">Passport No.:</td>
        <td width="340" height="51">
        <input type="text" name="PassportNo" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="51">Visa:</td>
        <td width="340" height="51">
        <input type="text" name="VisaNumber" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="51">Auto Type:</td>
        <td width="340" height="51">
        <input type="text" name="AutoType" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="51">Registration No:</td>
        <td width="340" height="51"><input type="text" name="RegNo" size="20"></td>
      </tr>
      <tr>
        <td width="340" height="51">Mobile No.:</td>
        <td width="340" height="51">
        <input type="text" name="MobileNumber" size="20"></td>
      </tr>
    </table>
    </center>
  </div>
  <p align="center"><input type="submit" value="Submit" name="Submit"><input type="reset" value="Reset" name="B2"></p>
</form>

<p>&nbsp;</p>
<p>&nbsp;</td>
                                      
                                      </tr>
                                      <tr>
<!--                                       <td valign="top" width="196"
 eight="9">         <br>
                           </td>
                                     </tr>
                                                                        
                                                              
  </tbody>                                  
</table>

</td>
<td>

</td></tr>
</table>
</p>

</td>

<td rowspan="2" id="rhinfo"><center> -->
<!--text
<img src="../images/student22.gif" width="60" height="50" alt="MNIT students">
</center>
<h2>Useful information</h2>

<div class="bbullet">
Financial and scholarship information for <a href="admission/financing.html">undergraduates</a>, <a href="admission/financing.html">graduates</a> and <a href="admission/financing.html">international students</a><span class="hidden">;</span></div>

<div class="bbullet">
<a href="admissions/international.html">International Student Guide</a><span class="hidden">;</span></div>
<div class="bbullet">
<a href="/"></a><span class="hidden">;</span></div>


<div class="bbullet"><a href=""></a><span class="hidden">;</span></div>

                       
                     


-->

</tr>
</tbody></table>
<hr>
<div id="footer"><a href="http://mnit.ac.in/contact/">Contact</a>.  Enquiries to Webmaster@mnit.ac.in</div>

</td></tr>
</tbody></table>



<!--start of search-->                                                                    
<map name="AtoZ"><area shape="rect" coords="224,28,247,54" href="http://mnit.ac.in/search/searchresult.php?search=z" alt="Z"><area shape="rect" coords="206,28,228,54" href="http://mnit.ac.in/search/searchresult.php?search=y" alt="Y"><area shape="rect" coords="190,28,205,54" href="http://mnit.ac.in/search/searchresult.php?search=x" alt="X"><area shape="rect" coords="168,28,189,54" href="http://mnit.ac.in/search/searchresult.php?search=w" alt="W"><area shape="rect" coords="153,28,167,54" href="http://mnit.ac.in/search/searchresult.php?search=v" alt="V"><area shape="rect" coords="134,28,152,54" href="http://mnit.ac.in/search/searchresult.php?search=u" alt="U"><area shape="rect" coords="115,28,133,54" href="http://mnit.ac.in/search/searchresult.php?search=t" alt="T"><area shape="rect" coords="95,28,114,54" href="http://mnit.ac.in/search/searchresult.php?search=s" alt="S"><area shape="rect" coords="76,28,95,54" href="http://mnit.ac.in/search/searchresult.php?search=r" alt="R"><area shape="rect" coords="54,28,76,54" href="http://mnit.ac.in/search/searchresult.php?search=q" alt="Q"><area shape="rect" coords="39,28,57,54" href="http://mnit.ac.in/search/searchresult.php?search=p" alt="P"><area shape="rect" coords="18,28,36,54" href="http://mnit.ac.in/search/searchresult.php?search=o" alt="O"><area shape="rect" coords="0,28,19,54" href="http://mnit.ac.in/search/searchresult.php?search=n" alt="N"><area shape="rect" coords="224,0,247,25" href="http://mnit.ac.in/search/searchresult.php?search=m" alt="M"><area shape="rect" coords="206,0,228,25" href="http://mnit.ac.in/search/searchresult.php?search=l" alt="L"><area shape="rect" coords="190,0,209,25" href="http://mnit.ac.in/search/searchresult.php?search=k" alt="K"><area shape="rect" coords="180,0,198,25" href="http://mnit.ac.in/search/searchresult.php?search=j" alt="J"><area shape="rect" coords="155,0,172,25" href="http://mnit.ac.in/search/searchresult.php?search=i" alt="I"><area shape="rect" coords="134,0,152,25" href="http://mnit.ac.in/search/searchresult.php?search=h" alt="H"><area shape="rect" coords="115,0,133,25" href="http://mnit.ac.in/search/searchresult.php?search=g" alt="G"><area shape="rect" coords="95,0,114,25" href="http://mnit.ac.in/search/searchresult.php?search=f" alt="F"><area shape="rect" coords="76,0,95,25" href="http://mnit.ac.in/search/searchresult.php?search=e" alt="E"><area shape="rect" coords="57,0,76,25" href="http://mnit.ac.in/search/searchresult.php?search=d" alt="D"><area shape="rect" coords="39,0,57,25" href="http://mnit.ac.in/search/searchresult.php?search=c" alt="C"><area shape="rect" coords="18,0,36,25" href="http://mnit.ac.in/search/searchresult.php?search=b" alt="B"><area shape="rect" coords="0,0,19,25" href="http://mnit.ac.in/search/searchresult.php?search=a" alt="A"><area shape="rect" coords="4,6,146,19" href="http://mnit.ac.in/search/searchresult.php?search=" alt="Index of MNIT sites"></map>
           <!-- InstanceEnd --><br>

<!-- New Code Added -->
<?php
if (isset($_POST["Submit"]))
{
    $studentid = $_POST["StudentID"];
    $studentname = $_POST["StudentName"];
    $bankac = $_POST["BankAC"];
    $branch = $_POST["Branch"];
    $semester = $_POST["Semester"];
    $fathername = $_POST["FatherName"];
    $fatheroccupation = $_POST["FatherOccupation"];
    $contactphone = $_POST["ContactTelephoneNo"];
    $address = $_POST["PermanentAddress"];
    $telephone = $_POST["TelephoneNo"];
    $lgname = $_POST["LGName"];
    $lgoccu = $_POST["LGOccupation"];
    $lgadd = $_POST["LGAddress"];
    $lgno = $_POST["LGContactNo"];
    $physicalailment = $_POST["PhysicalAilment"];
    $physicallychallenged = $_POST["PhysicallyChallenged"];
    $currhostelno = $_POST["CurrentHostelNo"];
    $currroomno = $_POST["RoomNo"];
    $embassyaddress = $_POST["EmbassyAddress"];
    $passport = $_POST["PassportNo"];
    $visa = $_POST["VisaNumber"];
    $autotype = $_POST["AutoType"];
    $regno = $_POST["RegNo"];
    $mobileno = $_POST["MobileNumber"];
    
    $sql = "INSERT INTO 'tblstudents' (StudentID, StudentName, BankAc, Branch, Semester, FathersName, Occupation, ContactTeleNo, PermanentAddress, TeleNo, LGName, OccupationLG, Address, ContactNo, EmbassyAdd, PassportNo, Visa, AutoType, RegNo, MobileNo, PhysicalAilment, PhysicallChallenged, CurrHostelNo, RoomNo) VALUES ('$studentid','$studentname', '$bankac', '$branch', '$semester', '$fathername', '$fatheroccupation','$contactphone','$address','$telephone','$lgname','$lgoccu','$lgadd','$lgno','$embassyaddress', '$passport', '$visa', '$autotype', '$regno',         '$mobileno', '$physicalailment','$physicallychallenged', '$currhostelno', '$currroomno');";

    echo $sql;
    echo "<br><br>";
    $conn= mysql_connect( $hostname, $username, $password);
    mysql_select_db( $dbname) or die("Error".$mysql_error());

    $ret = mysql_query($sql);
    echo "No. of rows affected:".mysql_affected_rows()."  Error(if any)".mysql_error();
}
?>

</body></html>

