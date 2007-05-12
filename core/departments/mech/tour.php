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
<title>Sights from Mech Department at MNIT</title>
</head>

<body>
<div id="toptabs">
<p>
<a class="toptab" href="../archi/index.php">Architecture</a><span class="hide"> | </span>
<a class="toptab" href="../chemical/index.php">Chemical</a><span class="hide"> | </span>
<a class="toptab" href="../civil/index.php">Civil</a><span class="hide"> | </span>
<a class="toptab" href="../cse/index.php">Computer</a><span class="hide"> | </span>
<a class="toptab" href="../electrical/index.php">Electrical</a><span class="hide"> | </span>
<a class="toptab" href="../electronics/index.php">Electronics</a><span class="hide"> | </span>
<a class="toptab" href="../cse/index.php">IT</a><span class="hide"> | </span>
<a class="activetoptab" href="index.php">Mechanical</a><span class="hide"> | </span>
<a class="toptab" href="../meta/index.php">Metallurgy</a>
</p>
</div>

<div id="container">
<div id="logo">
<h1><a href="index.php"> Department of Mechanical Engineering</a> << <a href="../../index.php">MNIT</a></h1>
</div>

<div id="navitabs">
<h2 class="hide">Site menu:</h2>
<a class="navitab" href="index.php">Welcome</a><span class="hide"> | </span>
<a class="navitab" href="faculty.php">Faculty</a><span class="hide"> | </span>
<a class="navitab" href="courses.php">Courses</a><span class="hide"> | </span>
<a class="navitab" href="research.php">Research</a><span class="hide"> | </span>
<a class="navitab" href="labs.php">Laboratories</a><span class="hide"> | </span>
<a class="activenavitab" href="tour.php">Tour</a><span class="hide"> | </span>
<a class="navitab" href="jobs.php">Job Notices</a>
</div>

<div id="desc">
<?php
	mysql_select_db("ME", $depart);
	$headerq = mysql_query("SELECT sectionname, data FROM info_tour WHERE paratype='header'");
	$header = mysql_fetch_assoc($headerq);
	echo "<h2>".$header['sectionname']."</h2>";
	echo $header['data'];
?>
</div>

<div id="main">


<?php							
					
					$iniquery = mysql_query("SELECT max(sectionid) FROM info_tour");
					$bigno = mysql_fetch_row($iniquery);
					$i = 1;
					while ($i <= $bigno[0])
							{	$query = mysql_query("SELECT * FROM info_tour WHERE sectionid=".$i);
								$num = mysql_num_rows($query);
								$j = 1;
								while ($j <= $num)
								{	$subquery =mysql_query("SELECT * FROM info_tour WHERE sectionid=".$i." AND paraid='".$j."'");
									$test = mysql_fetch_assoc($subquery);
									if ($test['paratype'] == 'data' AND substr($test['paraid'], -1, 1) != 'd')
									{	if($j ==1 ) {echo "<h3>".$test['sectionname']."</h3>";}
										echo $test['data'];
									}
									else
									{	if ($j == 1) {echo "<h3>".$test['sectionname']."</h3>";}
										echo "<p><a href=\"popup.php?secid=".$i."&pid=".$j."d&table=tour\" onclick=\"return openWin(this);\">".$test['data']."</a></p>";
									}
								
									$j = $j + 1;
								}
								$i = $i + 1;		
							}	
							
						?>


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