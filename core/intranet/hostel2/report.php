<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en"><head>
<link rel="stylesheet" type="text/css" href="safe.css"><title>Mess Report</title>
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
<?php
	include 'config.php';
?>
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
if (isset($_POST['Submit'])){
	$stud_id = $_POST['StudentID'];
	$studentname = $_POST['StudentName'];
	$branch = $_POST['Branch'];
	$semester = $_POST['Semester'];
	$hostelid = $_POST['HostelNo'];
	$balancefrom = $_POST['BalanceFrom'];
	$balanceto = $_POST['BalanceTo'];
	$duesto = $_POST['DuesTo'];
	$duesfrom = $_POST['DuesFrom'];
	$yearfrom = $_POST['YearFrom'];
	$yearto = $_POST['YearTo'];
	$monthfrom = $_POST['MonthFrom'];
	$monthto = $_POST['MonthTo'];
	
	$sql = "SELECT * From tblstudents Where ";

	if($stud_id != "") $sql = $sql . " StudentID Like '%" . $stud_id . "%' OR ";
    	if($studentname != '') $sql = $sql . " StudentName Like '%" .$studentname. "%' OR ";
    	if($branch !='') $sql = $sql . " Branch Like '%" . $branch . "%' OR ";
    	if($semester != '') $sql = $sql . " Semester Like '%" . $semester . "%'";

	if (substr($sql,strlen($sql)-6,6)=="Where "){
      		$sql = substr($sql,0,strlen($sql)-6);
    	}
    	if (substr($sql,strlen($sql)-3,3)=="OR "){
      		$sql = substr($sql,0,strlen($sql)-3);
    	}
	$conn= mysql_connect( $hostname, $username, $password);
	mysql_select_db($dbname) or die("Database Error");

    // test sql
    //    $sql = "SELECT RoomKeyID FROM tblroomkey WHERE hostelid = 1";
   	//$ret = mysql_query($sql) or die("<p><b>$sql</b> error.</p>");
    //echo mysql_affected_rows();
    //die();

	//echo "$sql";
	$ret = mysql_query($sql) or die("<p><b>$sql</b> error.</p>");
	$i = 0;
	echo "<table size='1' border='1'><tr>";
    ?>
    <td>Student ID</td>
    <td>Student Name</td>
    <td>Branch</td>
    <td>Semester</td>
    <td>Mess Dues</td>
    <td>Balance</td>
    <td>Last Pmt. Date</td>
    </tr>
    <?php
    while ($row = mysql_fetch_array($ret)){
		$id = $row['ID'];
		//print_r ($row);
		//echo "<br>";
		//read date time and other hostel choice from the database
		$sql = "SELECT * FROM messtable WHERE ";
		if ($id != '') $sql .= " Stud_ID = $id AND ";
		if ($duesto != '' and $duesfrom !='') $sql .= " Dues BETWEEN $duesfrom AND $duesto AND ";
                if ($balanceto != '' and $balancefrom !='') $sql .= " Balance BETWEEN $balanceto AND $balancefrom AND ";
		if ($monthto != '' and $monthfrom !='') $sql .= " Month BETWEEN $monthfrom AND $monthto AND ";
		if ($yearto != '' and $yearfrom !='') $sql .= " Year BETWEEN $yearfrom AND $yearto AND ";
		
               	if (substr($sql,strlen($sql)-6,6)=="Where "){
	     		$sql = substr($sql,0,strlen($sql)-6);
    		}
    		if (substr($sql,strlen($sql)-4,4)=="AND "){
      			$sql = substr($sql,0,strlen($sql)-4);
    		}
		//echo "<br>".$sql;
		$ret_i = mysql_query($sql);
		while($row_i = mysql_fetch_array($ret_i)){
          if ($hostelid == ''){
            $sql ="SELECT * FROM tblstudents WHERE ID=".$row_i["Stud_ID"];
            $query_result = mysql_query($sql) or die("$sql error");
            $stud_row = mysql_fetch_array($query_result);
            echo "<tr><td>";
			echo $stud_row["StudentID"];
			echo "</td>";
			echo "<td>".$stud_row["StudentName"]."</td";
			echo "<td>".$stud_row["Semester"]."</td";
            echo "<td>".$stud_row["Branch"]."</td";
            echo "<td>";
			echo $row_i["Dues"];
			echo "</td>";
            echo "<td>";
			echo $row_i["Balance"];
			echo "</td>";
            echo "<td>";
			echo $row_i["Date"];
			echo "</td>";
			echo "</tr>";
         }
         else {
            $sql = "SELECT * FROM  tblroomkey WHERE HostelID ='$hostelid'";
            $ret_j = mysql_query("$sql") or die("Invalid $sql");
            //echo "<br><i>$sql</i>:".mysql_affected_rows()."<br>";
            
            while ($row_j = mysql_fetch_array($ret_j)){
              //echo "<br>".$i++;
              $sql = "SELECT StudentID FROM studentroom WHERE RoomKeyID = ".$row_j["RoomKeyID"];
              $ret_k = mysql_query($sql) or die("Invalid $sql");
              //echo "<i>$sql</i>:".mysql_affected_rows()."<br>";
              if (mysql_affected_rows()>0){
               while ($row_k = mysql_fetch_array($ret_k)){
                $studid =  $row_k["StudentID"];
                //echo "<br><br>Student ID: $studid".$row_i["Stud_ID"]." Exists <br><br>";
                if ($studid == $row_i["Stud_ID"]){
                 echo "<tr><td>";
        		 echo $row_i["Stud_ID"];
		         echo "</td>";
		         echo "<td>";
		         echo $row_i["Dues"];
			     echo "</td>";
			     echo "<td>";
			     echo $row_i["Date"];
			     echo "</td>";
			     echo "</tr>";
                }
               }
              }

            }
         }
		}
	}
	echo "</table>";
	echo "<a href='index.htm'>Home</a> | <a href='report.php'>Search Again</a>";
}
else {
?>
<form method="POST" action="">
  <p>Enter any search criteria to find about the students and their dues:</p>
  <p>Leave fields blank for all items.</p>

  <div align="center">
    <center>
  
  <table style="border-collapse: collapse" bordercolor="#111111" cellpadding="0" cellspacing="0" width="572" height="37">
  <tr><td width="572" height="26" bgcolor="#FFFF00" colspan="2"><b>Search Mess 
    Information</b></td>
  </tr>
  <tr>
    <td width="230" height="51">Student ID:</td>
    <td width="342" height="51">

    <input type="text" name="StudentID" size="11" maxlength="6"></td>
  </tr>
  <tr>
    <td width="230" height="51">Student Name:</td>
    <td width="342" height="51">
    <input type="text" name="StudentName" size="20" maxlength="6"></td>
  </tr>
  <tr>

    <td width="230" height="51" valign="middle">Branch:</td>
    <td width="342" height="51" valign="middle">
    <input type="text" name="Branch" size="20" maxlength="6"></td>
  </tr>
  <tr>
    <td width="230" height="51" valign="middle">Semester:</td>
    <td width="342" height="51" valign="middle">
    <select size="1" name="Semester">

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

    <td width="230" height="51" valign="middle">Hostel:</td>
    <td width="342" height="51" valign="middle">
        <select name="HostelNo">
        <option value='' selected=true>Any</option>
<?php

	$conn = mysql_connect($hostname, $username, $password) or die(mysql_error());
	mysql_select_db($database)
		or die(mysql_error());
	$sql = "SELECT HostelName, HostelID From tblHostel Order By HostelName";
	$result = mysql_query($sql) or die("Invalid Query". mysql_error());
	while ($row = mysql_fetch_array($result))
		{
		echo "<option value =" . $row['HostelID'] . ">".$row['HostelName']."</option>
    
        
        
        \n";
		}
	mysql_close();
	?>
        </select></td>
  </tr>

  <tr>
    <td width="572" height="51" valign="middle" colspan="2">Time Period*: <b>
    Between</b>:<select size="1" name="MonthFrom">
    <option value="1">January</option>
    <option selected value="">Any</option>
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
    </select> <input type="text" name="YearFrom" size="4" maxlength="6">&nbsp;
    <u>AND</u> <select size="1" name="MonthTo">

    <option value="1">January</option>
    <option selected value="">Any</option>
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
    </select> <input type="text" name="YearTo" size="4" maxlength="6"></td>
  </tr>
  <tr>
    <td width="572" height="51" valign="middle" colspan="2">Dues: <b>Between</b>
    <input type="text" name="DuesFrom" size="11" maxlength="6"> <u>AND</u>

    <input type="text" name="DuesTo" size="11" maxlength="6"></td>
  </tr>
  <tr>
    <td width="572" height="51" valign="middle" colspan="2">Balance: <b>Between
    </b>
    <input type="text" name="BalanceFrom" size="11" maxlength="6"> <u>AND </u>
    <input type="text" name="BalanceTo" size="11" maxlength="6"></td>
  </tr>

  <tr>
    <td width="572" height="60" valign="middle" colspan="2">
    <p align="center"><font size="1">For choosing time period, choose Month and 
    type Year such as 2005</font><p align="center"><input type="submit" value="Submit" name="Submit"> <input type="reset" value="Reset" name="B2"></td>
  </tr>
  </table>
  
    </center>
  </div>
  
  <p align="center">&nbsp;</p>

</form>
<?php
}
?>
<p>&nbsp;</p>
<p>&nbsp;</td>
                                      
                                      </tr>
<tr valign="top"><td colspan="2">

&nbsp;</td>
                                      
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


</body></html>
