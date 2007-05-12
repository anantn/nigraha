<style type="text/css">
<!--
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style>
<?php
	require_once '../protected/conn.php';
	require_once 'auth.php';
	if($_COOKIE['access']=='dadmin')
	{}
	else
	{	echo"<span class=\"header\">You are not authorised to view this Page. You are being redirected to the login page</span>";
		echo"<br>If your browser doesn't support redirection, Click <a href=\"index.php\">Here</a> to go...";
		echo"<meta HTTP-EQUIV=\"refresh\" content=0;url=\"index.php\">";
	}
	if (isset($_POST['userid']) || isset($_POST['nam']) || isset($_POST['type']))
	{	if($_POST['type']=="student")
		{	$squery = mysql_query("SELECT * FROM profile_student WHERE userid LIKE CONVERT( _utf8 '%".$_POST['userid']."%' USING latin1 ) COLLATE latin1_general_ci AND fullname LIKE CONVERT( _utf8 '%".$_POST['nam']."%' USING latin1 ) COLLATE latin1_general_ci AND accesslvl != CONVERT( _utf8 'sadmin' USING latin1 ) COLLATE latin1_general_ci AND accesslvl != CONVERT( _utf8 'admin' USING latin1 ) COLLATE latin1_general_ci AND accesslvl != CONVERT( _utf8 'dadmin' USING latin1 ) COLLATE latin1_general_ci AND dept = CONVERT( _utf8 '".$_COOKIE['dept']."' USING latin1 ) COLLATE latin1_general_ci");
			$max = mysql_num_rows($squery);
			echo "<span class=\"style1\">Results of the Search:<p>";
			echo"<ul>";
			$i = 0;
			for($i=0;$i<$max;$i++)
			{	echo "<li><a href=\"dusermod.php?t=stud&id=".mysql_result($squery,$i,'userid')."\">".mysql_result($squery, $i, 'fullname').", ".mysql_result($squery, $i, 'accesslvl').", Student(".mysql_result($squery,$i,'userid').")</a></li>";
			}
			echo"</span></ul>";
		}			
		else
		{	$squery = mysql_query("SELECT * FROM profile_faculty WHERE userid LIKE CONVERT( _utf8 '%".$_POST['userid']."%' USING latin1 ) COLLATE latin1_general_ci AND fullname LIKE CONVERT( _utf8 '%".$_POST['nam']."%' USING latin1 ) COLLATE latin1_general_ci AND accesslvl != CONVERT( _utf8 'sadmin' USING latin1 ) COLLATE latin1_general_ci AND accesslvl != CONVERT( _utf8 'admin' USING latin1 ) COLLATE latin1_general_ci AND accesslvl != CONVERT( _utf8 'dadmin' USING latin1 ) COLLATE latin1_general_ci AND dept = CONVERT( _utf8 '".$_COOKIE['dept']."' USING latin1 ) COLLATE latin1_general_ci");
			$max = mysql_num_rows($squery);
			echo "<span class=\"style1\">Results of the Search:<p>";
			echo"<ul>";
			$i = 0;
			for($i=0;$i<$max;$i++)
			{	echo "<li><a href=\"dusermod.php?t=fac&id=".mysql_result($squery,$i,'userid')."\">".mysql_result($squery, $i, 'fullname').", ".mysql_result($squery, $i, 'accesslvl').", Faculty(".mysql_result($squery,$i,'userid').")</a></li>";
			}
			echo"</span></ul>";
		}
		echo "</p><span class=\"style1\">If the page is blank, no results were found! <a href=\"dsearch.php\">Click here</a> to search again. You can click on a user's entry to edit his/her access levels.</span>";
	}
	else
	{
?>
<form action="dsearch.php" method="post" name="form1" class="style1">
  <p>Enter atleast one of the following items to search for a particular user:</p>
  <table width="100%" border="0">
    <tr>
      <td width="21%">UserID</td>
      <td width="79%"><input type="text" name="userid" id="userid"></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><input type="text" name="nam" id="nam"></td>
    </tr>
    <tr>
      <td>Account Type</td>
      <td><select name="type">
          <option value="student">Student</option>
          <option value="faculty">Faculty</option>
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="2"><div align="left">
          <input type="submit" name="Submit" value="Search">
        </div></td>
    </tr>
  </table>
</form>
<? } ?>