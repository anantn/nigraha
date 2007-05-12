<?php
	require_once("../protected/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TEQIP Reports at MNIT</title>
<script type="text/javascript" src="../popup.js"></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
		<div id="menu">
				<a href="index.php">home</a>
				<a href="academics/index.php">academics</a>
				<a href="administration/index.php" class="active">administration</a>
				<a href="governance/index.php">governanace</a>
				<a href="research/index.php">research</a>
				<a href="students/index.php">students</a>
				<a href="institute/index.php">institute</a>
				<a href="intranet/index.php">intranet</a>
		</div>

		<div id="header"> 
				<h3>TEQUIP</h1>
				<h2>Find Information on Procurement of Goods, Civil Works and Staff Deployment</h2>
		</div>
		
		<div id="content">
		
				<div id="sidebar">
						<h1>MORE...</h1>
						<div class="submenu">
								<a href="../academics/index.php">Academics</a>$nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admissions, Departments
                                <a href="../research/index.php">Research</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resources, Projects
                                <a href="../students/index.php">Students</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hostels, Events
                                <a href="../cse/faculty.php">Faculty</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Faculty, Departments
                                <a href="../institute/index.php">Jobs</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Permanent Jobs
                                <a href="../visitors/index.php">Visitors' Guide</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;How to Reach, Pics
</div>
				
						<h1>Search...</h1>
						<p>
								Search code goes here					
						</p>
						
						<h1>WEBMAIL</h1>
								<input type="text" value="Username"><br>
								<input name="" type="password" value="Password"><br>
								<input type="button" value="Log In">
				</div>
				
				<div id="mainbar">
						<?php
							$iniquery = mysql_query("SELECT max(sectionid) FROM info_teqip");
							$bigno = mysql_fetch_row($iniquery);
							$i = 1;
							while ($i <= $bigno[0])
							{	$query = mysql_query("SELECT * FROM info_teqip WHERE sectionid=".$i);
								$num = mysql_num_rows($query);
								$j = 1;
								while ($j <= $num)
								{	$subquery =mysql_query("SELECT * FROM info_teqip WHERE sectionid=".$i." AND paraid='".$j."'");
									$test = mysql_fetch_assoc($subquery);
									if ($test['paratype'] == 'data' AND substr($test['paraid'], -1, 1) != 'd')
									{	if($j ==1 ) {echo "<h1>".$test['sectionname']."</h1>";}
										echo "<p>".$test['data']."</p>";
									}
									else
									{	if ($j == 1) {echo "<h1>".$test['sectionname']."</h1>";}
										echo "<a href=../popup.php?secid=".$i."&pid=".$j."d&table=teqip onclick=\"return openWin(this);\">".$test['data']."</a><br>";
									}
									$j = $j + 1;
								}
								$i = $i + 1;		
							}								
						?>
							
							
				</div>
		
		</div>
  
		<br><br><br>
		<div id="footer"> &copy;2005 MNIT. Open Source Tools Used: OpenLDAP, Horde, TheGIMP and of course GNU/LinuX!
		</div>
		
</center>
</body>
</html>
