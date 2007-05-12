<?php
 include 'config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en"><head>

<link rel="stylesheet" type="text/css" href="safe.css"><title>MNIT Jaipur:My MNIT</title>
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
</td>
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
<a name="content"></a>
<img src="blueline.gif" alt="" height="3" width="100%"><br></td></tr>
<!--
<tr valign="top"><td><img src="../images/welcome.gif" width="200" height="16" alt="Welcome to MNIT Jaipur"></td><td>&nbsp;</td></tr>
-->
<tr valign="top"><td colspan="2">
<h4>MNIT Jaipur</h4>
             <p>
<?php
if (!isset($_POST['Submit'])){
?>
<form method="POST" action="">
  <div align="center">
    <center>
    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="461" height="206">
      <tr>
        <td width="461" height="45" colspan="2"><u><b>Search Students</b></u></td>
      </tr>
      <tr>
        <td width="180" height="38">Name:</td>
        <td width="275" height="38"><input type="text" name="Name" size="20"></td>
      </tr>
      <tr>
        <td width="180" height="39">Semester:</td>
        <td width="275" height="39"><select size="1" name="Semester">
<option></option>
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
        <td width="180" height="39">Student ID:</td>
        <td width="275" height="39">
        <input type="text" name="StudentID" size="20"></td>
      </tr>
      <tr>
        <td width="180" height="39">Branch:</td>
        <td width="275" height="39"><input type="text" name="Branch" size="20"></td>
      </tr>
    </table>
    </center>
  </div>
  <p align="center"><input type="submit" value="Submit" name="Submit"></p>
</form>
<?}
else
{
  $name = $_POST["Name"];
  $studentid = $_POST["StudentID"];
  $semester = $_POST["Semester"];
  $branch = $_POST["Branch"];
  
  $sql = "SELECT ID, StudentID, StudentName, Semester, Branch From tblstudents Where ";
  
    if($studentid != "") $sql = $sql . " StudentID Like '%" . $studentid . "%' AND ";
    if($name != '') $sql = $sql . " StudentName Like '%" .$name. "%' AND ";
    if($branch !='') $sql = $sql . " Branch Like '%" . $branch . "%' AND ";
    if($semester != '') $sql = $sql . " Semester Like '%" . $semester . "%'";
    
    $conn= mysql_connect( $hostname, $username, $password);
    mysql_select_db( $dbname) or die("Error".$mysql_error());
    
    if (substr($sql,strlen($sql)-6,6)=="Where "){
      $sql = substr($sql,0,strlen($sql)-6);
    }
    if (substr($sql,strlen($sql)-4,4)=="AND "){
      $sql = substr($sql,0,strlen($sql)-3);
    }
    $ret = mysql_query($sql)
        or die("Invalid Query:$sql<br>".mysql_error());
    if (mysql_affected_rows()==0){
      echo "No students record found!";
    }
    ?>
    <table size="1" border=1>
     <tr>
        <td>
          Student ID
        </td>
        <td>
          Name
        </td>
        <td>
          Semester
        </td>
        <td>
          Branch
        </td>
        <td>
          Hostel No.
        </td>
        <td>
          Room No.
        </td>
     </tr>
<?php
    while ($row = mysql_fetch_array($ret))
    {
        //print_r ($row);
      $read = mysql_query("SELECT * FROM studentroom WHERE StudentID = ".$row['ID'])
                or die("Invalid Query:".mysql_error( ));
      if (mysql_affected_rows()>0){
            $row1 = mysql_fetch_array($read)
                or die("Invalid Row Data:".mysql_error( ));
            $roomkeyid = $row1["RoomKeyID"];
            //////////////////
            $read = mysql_query("Select HostelID, RoomNo  From TblRoomKey Where RoomKeyID = " . $roomkeyid);
            $row1 = mysql_fetch_array($read);
            $hostelid = $row1["HostelID"];
            $roomno = $row1["RoomNo"];
            //////////////////
            if ($hostelid != ''){
             $read = mysql_query("Select HostelName From TblHostel Where HostelID = " . $hostelid) or
                            die ("Error Select HostelName From TblHostel Where HostelID = " . $hostelid);
             $row1 = mysql_fetch_array($read);
             $hostelname = $row1["HostelName"];
             //////////////////
            }
            echo "<tr>";
            echo "<td>".$row['StudentID']."</td>";
            echo "<td>".$row['StudentName']."</td>";
            echo "<td>".$row['Semester']."</td>";
            echo "<td>".$row['Branch']."</td>";
            echo "<td>".$hostelname."</td>";
            echo "<td>".$roomno."</td>";
            echo "</tr>";
        }
      else{
            echo "<tr>";
            echo "<td>".$row['StudentID']."</td>";
            echo "<td>".$row['StudentName']."</td>";
            echo "<td>".$row['Semester']."</td>";
            echo "<td>".$row['Branch']."</td>";
            echo "<td>Not reg.</td>";
            echo "<td>Not reg.</td>";
            echo "</tr>";
       }
    
    }
    echo "</table>";
    echo "<a href='search1.php'>Search Again</a> <a href='index.htm'>Home</a>";
}
?>
<br>
 <br>
 </p>
         </td></tr><tr>
</tr>
</tbody></table>
<hr>
<div id="footer"><a href="http://mnit.ac.in/contact/">Contact</a>.  Enquiries to Webmaster@mnit.ac.in</div>

</td></tr>
</tbody></table>



<!--start of search-->                                                                    
<map name="AtoZ"><area shape="rect" coords="224,28,247,54" href="http://mnit.ac.in/search/searchresult.php?search=z" alt="Z"><area shape="rect" coords="206,28,228,54" href="http://mnit.ac.in/search/searchresult.php?search=y" alt="Y"><area shape="rect" coords="190,28,205,54" href="http://mnit.ac.in/search/searchresult.php?search=x" alt="X"><area shape="rect" coords="168,28,189,54" href="http://mnit.ac.in/search/searchresult.php?search=w" alt="W"><area shape="rect" coords="153,28,167,54" href="http://mnit.ac.in/search/searchresult.php?search=v" alt="V"><area shape="rect" coords="134,28,152,54" href="http://mnit.ac.in/search/searchresult.php?search=u" alt="U"><area shape="rect" coords="115,28,133,54" href="http://mnit.ac.in/search/searchresult.php?search=t" alt="T"><area shape="rect" coords="95,28,114,54" href="http://mnit.ac.in/search/searchresult.php?search=s" alt="S"><area shape="rect" coords="76,28,95,54" href="http://mnit.ac.in/search/searchresult.php?search=r" alt="R"><area shape="rect" coords="54,28,76,54" href="http://mnit.ac.in/search/searchresult.php?search=q" alt="Q"><area shape="rect" coords="39,28,57,54" href="http://mnit.ac.in/search/searchresult.php?search=p" alt="P"><area shape="rect" coords="18,28,36,54" href="http://mnit.ac.in/search/searchresult.php?search=o" alt="O"><area shape="rect" coords="0,28,19,54" href="http://mnit.ac.in/search/searchresult.php?search=n" alt="N"><area shape="rect" coords="224,0,247,25" href="http://mnit.ac.in/search/searchresult.php?search=m" alt="M"><area shape="rect" coords="206,0,228,25" href="http://mnit.ac.in/search/searchresult.php?search=l" alt="L"><area shape="rect" coords="190,0,209,25" href="http://mnit.ac.in/search/searchresult.php?search=k" alt="K"><area shape="rect" coords="180,0,198,25" href="http://mnit.ac.in/search/searchresult.php?search=j" alt="J"><area shape="rect" coords="155,0,172,25" href="http://mnit.ac.in/search/searchresult.php?search=i" alt="I"><area shape="rect" coords="134,0,152,25" href="http://mnit.ac.in/search/searchresult.php?search=h" alt="H"><area shape="rect" coords="115,0,133,25" href="http://mnit.ac.in/search/searchresult.php?search=g" alt="G"><area shape="rect" coords="95,0,114,25" href="http://mnit.ac.in/search/searchresult.php?search=f" alt="F"><area shape="rect" coords="76,0,95,25" href="http://mnit.ac.in/search/searchresult.php?search=e" alt="E"><area shape="rect" coords="57,0,76,25" href="http://mnit.ac.in/search/searchresult.php?search=d" alt="D"><area shape="rect" coords="39,0,57,25" href="http://mnit.ac.in/search/searchresult.php?search=c" alt="C"><area shape="rect" coords="18,0,36,25" href="http://mnit.ac.in/search/searchresult.php?search=b" alt="B"><area shape="rect" coords="0,0,19,25" href="http://mnit.ac.in/search/searchresult.php?search=a" alt="A"><area shape="rect" coords="4,6,146,19" href="http://mnit.ac.in/search/searchresult.php?search=" alt="Index of MNIT sites"></map>
           <!-- InstanceEnd --><br>

</body></html>
