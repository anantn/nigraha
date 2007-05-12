<?php
include 'config.php';
?>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="safe.css"><title>Build Hostel
Database</title>
<meta http-equiv="pragma" content="no-cache">
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
<a name="content"></a><h1>MNIT Hostel Allocation</h1>
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


<!-- Section begins -->
<?php
if ($_POST['Submit']==''){
?>
<p>Help: No. of rooms is the total number of rooms of the given type (Single, Double, Triple) to be added in the database. Starting room number denote that with what room *number*, the numbering of room should start. If rooms are to be filled as occupied, just click on rooms filled button.
&nbsp;</p>
<p>For example if you want to add 40 rooms numbers starting from 70 of Single type to Hostel number 4, you will choose, Single at type, Hostel: 4 from the list, and Type 40 in no. of rooms and 70 in starting room no.&nbsp;</p>
<form method="POST">
  <div align="center">
    <center>
    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="499" height="327">
      <tr>
        <td width="499" height="62" colspan="2">
        <p align="center"><u><b><font size="4">Build Hostel Database</font></b></u></td>
      </tr>
      <tr>
        <td width="230" height="53">
        <p align="right">Select Room Type:</td>
        <td width="263" height="53"><select size="1" name="RoomType">
	<option value="1">Single</option>
	<option value="2">Double</option>
	<option value="3">Triple</option>
	</select></td>
      </tr>
      <tr>
        <td width="230" height="53">
        <p align="right">Hostel No:</td>
        <td width="263" height="53">

	<select name="HostelNo">
	<?php
	//PHP code
	//Read Hostel No. from Rooms and Add it
	//include "config.php";
	$conn = mysql_connect($hostname, $username, $password) or die(mysql_error());
	//echo "Connection:".$conn."\n";
	mysql_select_db($database)
		or die(mysql_error());
	$sql = "SELECT HostelName, HostelID From tblhostel Order By HostelName";
	$result = mysql_query($sql) or die("Invalid Query". mysql_error());
	while ($row = mysql_fetch_array($result))
		{
		echo "<option value =".$row['HostelID'].">".$row['HostelName']."</option>\n";
		}
	mysql_close();
	?>
        </select>
	</td>
      </tr>
      <tr>
        <td width="230" height="53">
        <p align="right">No. Of Rooms:</td>
        <td width="263" height="53">
        <input type="text" name="NoOfRooms" size="10"></td>
      </tr>
      <tr>
        <td width="230" height="53">
        <p align="right">Starting Room No.:</td>
        <td width="263" height="53">
        <input type="text" name="StartingRoomNo" size="10"></td>
      </tr>
      <tr>
        <td width="499" height="21" colspan="2">
        <p align="center">Rooms are filled:
        <input type="checkbox" name="Occupied" value="ON"></td>
      </tr>
      <tr>
        <td width="499" height="25" colspan="2">&nbsp;
        </td>
      </tr>
    </table>
    </center>
  </div>
  <p align="center"><input type="submit" value="Submit" name="Submit"><input type="reset" value="Reset" name="B2"></p>
</form>
<?php
}
else {
    $type = $_POST['RoomType'];
    $hostelid = $_POST['HostelNo'];
    $noofrooms = $_POST['NoOfRooms'];
    $startingroomno = $_POST['StartingRoomNo'];
    if ($_POST['Occupied']=="ON") {
	   $occupied=1;
	   }
    else {
	   $occupied=0;
    }
    $total = 0;
    $conn = mysql_connect($hostname, $username, $password) or die(mysql_error());
    mysql_select_db($database)
	       or die("DB Error:".mysql_error());
    for ($i=0;$i<$noofrooms;$i++){
	   $sql = "INSERT INTO tblroomkey (Type, HostelID, Occupied, RoomNo) VALUES (".$type.",".$hostelid.",".$occupied.",".$startingroomno.")";
    	$result = mysql_query($sql) or
			die("Invalid Query". mysql_error());
	   $total++;
	   $startingroomno++;
    }
    echo "$total rooms added!<br>";
    echo "<a href='index.htm'>Home</a> <a href='buildhostel.php'>Add More</a>";
}
?>
<p>&nbsp;</p>
</p>
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

</body></html>
