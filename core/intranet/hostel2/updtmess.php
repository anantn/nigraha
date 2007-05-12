<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en"><head>
<link rel="stylesheet" type="text/css" href="safe.css"><title>Update Mess
Account</title>
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
<p><font color="#663366"><u><b>Mess Management</b></u></font>:</td>

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
	include 'config.php';
?>
<?php
if (!isset($_POST['Submit'])){
?>
<form method="POST" action="">
  <p>Help: <u>Dues for month</u>, is the mess due that student has to pay. <u>
  Bill Paid</u>: When the student pays the bill, you add the amount of dues by 
  paid by him/her here.</p>
  <div align="center">
    <center>
  
  <table style="border-collapse: collapse" bordercolor="#111111" width="453" height="203" border="1">
  <tr><td width="453" height="26" bgcolor="#FFFF00" colspan="2"><b>Update Mess 
    Information</b></td>
  </tr>
  <tr>
    <td width="208" height="48">Student ID:</td>
    <td width="245" height="48">
    <input type="text" name="StudentID" size="11" maxlength="6"> </td>
  </tr>
  <tr>
    <td width="208" height="48">Mess Dues for Month:</td>
    <td width="245" height="48"><select size="1" name="Month">
    <option value="1" selected>January</option>
    <option value="2">February</option>
    <option value="3">March</option>
    <option value="4">April</option>
    <option value="5">May</option>
    <option value="6">June</option>
    <option value="7">July</option>
    <option value="8">August</option>
    <option value="9">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
    </select></td>
  </tr>
  <tr>
    <td width="208" height="48" valign="middle">Mess Dues for Year:</td>
    <td width="245" height="48" valign="middle">
    <input type="text" name="Year" size="4" maxlength="6" value="<?php echo date('Y'); ?>"></td>
  </tr>
  <tr>
    <td width="208" height="48" valign="middle">Dues for month:</td>
    <td width="245" height="48" valign="middle">
    <input type="text" name="Dues" size="7" maxlength="6"></td>
  </tr>
  <tr>
    <td width="208" height="49" valign="middle">Bill Paid:</td>
    <td width="245" height="49" valign="middle">
    <input type="text" name="Balance" size="7" maxlength="6"></td>
  </tr>
  </table>
    </center>
  </div>
  
  <p align="center"><input type="submit" value="Submit" name="Submit"> <input type="reset" value="Reset" name="B2"></p>
</form>
<?php
}
?>
<!-- New Code Added -->
<?php
if ($_POST["Submit"]=='Submit')
{
//// Submit button was clicked!
    $conn= mysql_connect( $hostname, $username, $password) or die("Invalid Connection");
    mysql_select_db( $dbname) or die("Error".$mysql_error());
    $stud_id = $_POST['StudentID'];
    $month = $_POST['Month'];
    $year = $_POST['Year'];
    $dues = $_POST['Dues'];
    $balance = $_POST['Balance'];
    // Step 1: Find the info about the student.
    // check if the ID exists in student database
    $sql = "SELECT * FROM tblstudents WHERE StudentID = '$stud_id'";
    $ret = mysql_query($sql) or die("Error in $sql");
    //echo $sql;
    $row = mysql_fetch_array($ret);
    if (mysql_affected_rows() == 0){
        die("Invalid User ID");
	}
    $id4mstudtable = $row['ID'];        // get primary key of student from student table
    // Step 2: Add Data
    // do the user already exists
    $mydate = date ('Y-m-d');
    $sql = "SELECT * FROM messtable WHERE Stud_ID = $id4mstudtable";
    $ret = mysql_query($sql) or die("Err:$sql");
    $row = mysql_fetch_array($ret);

    if (mysql_affected_rows()==0){
	$sql = "INSERT INTO messtable (Stud_ID, Date, Month, Year, Dues, Balance) VALUES ($id4mstudtable, '$mydate', $month, $year, $dues, $balance)";
    } else {
	$dues4mtbl = $row['Dues'];
	$balance += $row['Balance'];
	$dues += $dues4mtbl;
	if ($balance > 0) {
	  $balance = $balance - $dues;
	  if ($balance < 0) {
	  	$dues = -1 * $balance;
	  	$balance = 0;
	  	}
	}
	if ($dues < 0){
	    $balance = -1 * $dues;
	    $dues = 0;
	}

	$sql = "UPDATE messtable SET Date ='$mydate', Month=$month, Year=$year, Dues=$dues, Balance=$balance WHERE Stud_ID= $id4mstudtable";
    }
    //echo $sql;
    $ret = mysql_query($sql);
// Step 3: Display Result
    echo "Student $stud_id Updated with Dues: $dues and Balance: $balance";
    echo "<br><a href='updtmess.php'>Search Again</a> | <a href='index.htm'>Home</a>";
}
?>
</td>
</tr>
</tbody></table>
<hr>
<div id="footer"><a href="http://mnit.ac.in/contact/">Contact</a>.  Enquiries to Webmaster@mnit.ac.in</div>
</td></tr>
</tbody></table>
<!--start of search-->
<map name="AtoZ"><area shape="rect" coords="224,28,247,54" href="http://mnit.ac.in/search/searchresult.php?search=z" alt="Z"><area shape="rect" coords="206,28,228,54" href="http://mnit.ac.in/search/searchresult.php?search=y" alt="Y"><area shape="rect" coords="190,28,205,54" href="http://mnit.ac.in/search/searchresult.php?search=x" alt="X"><area shape="rect" coords="168,28,189,54" href="http://mnit.ac.in/search/searchresult.php?search=w" alt="W"><area shape="rect" coords="153,28,167,54" href="http://mnit.ac.in/search/searchresult.php?search=v" alt="V"><area shape="rect" coords="134,28,152,54" href="http://mnit.ac.in/search/searchresult.php?search=u" alt="U"><area shape="rect" coords="115,28,133,54" href="http://mnit.ac.in/search/searchresult.php?search=t" alt="T"><area shape="rect" coords="95,28,114,54" href="http://mnit.ac.in/search/searchresult.php?search=s" alt="S"><area shape="rect" coords="76,28,95,54" href="http://mnit.ac.in/search/searchresult.php?search=r" alt="R"><area shape="rect" coords="54,28,76,54" href="http://mnit.ac.in/search/searchresult.php?search=q" alt="Q"><area shape="rect" coords="39,28,57,54" href="http://mnit.ac.in/search/searchresult.php?search=p" alt="P"><area shape="rect" coords="18,28,36,54" href="http://mnit.ac.in/search/searchresult.php?search=o" alt="O"><area shape="rect" coords="0,28,19,54" href="http://mnit.ac.in/search/searchresult.php?search=n" alt="N"><area shape="rect" coords="224,0,247,25" href="http://mnit.ac.in/search/searchresult.php?search=m" alt="M"><area shape="rect" coords="206,0,228,25" href="http://mnit.ac.in/search/searchresult.php?search=l" alt="L"><area shape="rect" coords="190,0,209,25" href="http://mnit.ac.in/search/searchresult.php?search=k" alt="K"><area shape="rect" coords="180,0,198,25" href="http://mnit.ac.in/search/searchresult.php?search=j" alt="J"><area shape="rect" coords="155,0,172,25" href="http://mnit.ac.in/search/searchresult.php?search=i" alt="I"><area shape="rect" coords="134,0,152,25" href="http://mnit.ac.in/search/searchresult.php?search=h" alt="H"><area shape="rect" coords="115,0,133,25" href="http://mnit.ac.in/search/searchresult.php?search=g" alt="G"><area shape="rect" coords="95,0,114,25" href="http://mnit.ac.in/search/searchresult.php?search=f" alt="F"><area shape="rect" coords="76,0,95,25" href="http://mnit.ac.in/search/searchresult.php?search=e" alt="E"><area shape="rect" coords="57,0,76,25" href="http://mnit.ac.in/search/searchresult.php?search=d" alt="D"><area shape="rect" coords="39,0,57,25" href="http://mnit.ac.in/search/searchresult.php?search=c" alt="C"><area shape="rect" coords="18,0,36,25" href="http://mnit.ac.in/search/searchresult.php?search=b" alt="B"><area shape="rect" coords="0,0,19,25" href="http://mnit.ac.in/search/searchresult.php?search=a" alt="A"><area shape="rect" coords="4,6,146,19" href="http://mnit.ac.in/search/searchresult.php?search=" alt="Index of MNIT sites"></map>
           <!-- InstanceEnd --><br>
</body>
</html>
