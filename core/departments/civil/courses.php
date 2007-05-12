<?php
	require_once("../../protected/conn_dept.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../popup.js"></script>
<link rel="stylesheet" type="text/css" href="dept.css" media="screen" title="dept (screen)" />
<link rel="stylesheet" type="text/css" href="print.css" media="print" />
<title>Syllabus at Civil Department MNIT</title>
</head>

<body>
<div id="toptabs">
<p>
<a class="toptab" href="../archi/index.php">Architecture</a><span class="hide"> | </span>
<a class="toptab" href="../chemical/index.php">Chemical</a><span class="hide"> | </span>
<a class="activetoptab" href="index.php">Civil</a><span class="hide"> | </span>
<a class="toptab" href="../cse/index.php">Computer</a><span class="hide"> | </span>
<a class="toptab" href="../electrical/index.php">Electrical</a><span class="hide"> | </span>
<a class="toptab" href="../electronics/index.php">Electronics</a><span class="hide"> | </span>
<a class="toptab" href="../cse/index.php">IT</a><span class="hide"> | </span>
<a class="toptab" href="../mech/index.php">Mechanical</a><span class="hide"> | </span>
<a class="toptab" href="../meta/index.php">Metallurgy</a>
</p>
</div>

<div id="container">
<div id="logo">
<h1><a href="index.php"> Department of Civil Engineering</a> << <a href="../../index.php">MNIT</a></h1>
</div>

<div id="navitabs">
<h2 class="hide">Site menu:</h2>
<a class="navitab" href="index.php">Welcome</a><span class="hide"> | </span>
<a class="navitab" href="faculty.php">Faculty</a><span class="hide"> | </span>
<a class="activenavitab" href="courses.php">Courses</a><span class="hide"> | </span>
<a class="navitab" href="research.php">Research</a><span class="hide"> | </span>
<a class="navitab" href="labs.php">Laboratories</a><span class="hide"> | </span>
<a class="navitab" href="tour.php">Tour</a><span class="hide"> | </span>
<a class="navitab" href="jobs.php">Job Notices</a>
</div>

<div id="desc">
<?php
	mysql_select_db("CE", $depart);
	$headerq = mysql_query("SELECT sectionname, data FROM info_courses WHERE paratype='header'");
	$header = mysql_fetch_assoc($headerq);
	echo "<h2>".$header['sectionname']."</h2>";
	echo $header['data'];
?>
</div>

<div id="main"><p><table><tr><td colspan="0"></td></tr>

<?php				
                /* list courses from syllabus table */
		
                $firstquery = mysql_query("SELECT max(semester) FROM syllabus") or die(mysql_query()); 
			
                $lastno = mysql_fetch_row($firstquery);
                
                $z = 1;
                $a = 1;
    while ($z <= $lastno[0])
    {         $squery = mysql_query("SELECT max(sno) FROM syllabus") or die(mysql_query());
              $gotno=mysql_fetch_row($squery);
              $y = 1;
              $rowcount = 1;
              while($y <= $gotno[0])
              {
                   $tquery = mysql_query("SELECT * FROM syllabus WHERE semester=".$z." AND sno=".$y) or die(mysql_query());
                   $gotrow = mysql_fetch_assoc($tquery);
                   if($rowcount == 1 AND $gotrow !='NULL')               /*every sem is a new table, code invoked at row 1 of every sem*/
                   {       echo "</table></p><h3>Semester ".$z." :</h3><p>";
                           echo "<table width=\"90%\"><tr><td>Subject Code</td><td>Subject Title</td><td>Credits</td><td>Subject Area</td></tr>";
                   }
                   $rowcount = $rowcount + 1;
	           echo "<tr><td>".$gotrow['scode']."</td><td><a href=\"#\">".$gotrow['title']."</a></td><td>".$gotrow['credit']."</td><td>".$gotrow['sarea']."</td></tr>";
		   $y = $y + 1;
              }
              $z = $z + 1;
     }



	

              /* any paras of data and popups required after Listing of syllabus (namely 'note' etc...), table contains only header at 					this time of development , which has already been extracted at the top :    19-08-2005, Rahul Murmuria*/
       	
	$iniquery = mysql_query("SELECT max(sectionid) FROM info_courses");
     	$bigno = mysql_fetch_row($iniquery);
      	$i = 1;
   	while ($i <= $bigno[0])
 	{	$query = mysql_query("SELECT * FROM info_courses WHERE sectionid=".$i);
     		$num = mysql_num_rows($query);
	      	$j = 1;
	     	while ($j <= $num)
   		{	$subquery =mysql_query("SELECT * FROM info_courses WHERE sectionid=".$i." AND paraid='".$j."'");
		  	$test = mysql_fetch_assoc($subquery);
		       	if ($test['paratype'] == 'data' AND substr($test['paraid'], -1, 1) != 'd')
		      	{	if($j ==1 ) {echo "<h3>".$test['sectionname']."</h3>";}
		      		echo "<p class=\"block\">".$test['data']."</p>";
	     	       	}
		       	else
		       	{	if ($j == 1) {echo "<h3>".$test['sectionname']."</h3>";}
			 	echo "<p class=\"block\"><a href=\"popup.php?secid=".$i."&pid=".$j."d&table=courses\" onclick=\"return openWin(this);\">".$test['data']."</a></p>";
		       	}
									
		      	$j = $j + 1;
         	}
	  	$i = $i + 1;		
       	}   
  ?>
</table>
</div>

<div id="sidebar">
<h3>Services:</h3>
<p><a class="sidelink" href="#">IRC/NewsGroups</a><span class="hide"> | </span>
<a class="sidelink" href="#">Webmail</a><span class="hide"> | </span>
<a class="sidelink" href="#">Notice Board</a><span class="hide"> | </span>
<a class="sidelink" href="#">Any Other Link</a></p>

<h3>Random image:</h3>
<p><img class="photo" src="images/test.jpg" height="100" width="130" alt="" /></p>

<h3>Wise words:</h3>
<p>"It happens every day: information overload! Time for a reboot..."<br />
(traditional haiku poem)</p>
</div>
    
<div id="footer">
Copyright &copy; 2005 MNIT. Design by <a href="http://andreasviklund.com">Andreas Viklund</a>.
</div>

</div>
</body>
</html>