<?php
	include ("auth.php");
	require_once ("../../protected/envi.php");
	mysql_select_db("mnitpost");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css" href="post.css" />
<title>NEWS / NOTICES at MNIT</title>
</head>
<body>
<div id="title">
  <h1>THE MNIT POST</h1>
</div>
<div id="container">
  <div id="sidebar">
    <h2>&nbsp;</h2>
    <a class="menu" href="index.php">Home</a> <a class="menu" href="addpost.php">Post</a><a class="menu" href="archived.php">View All</a> <a class="menu"></a> <a class="menu" href="../../index.php">MNIT Home</a> <a class="menu" href="../index.php">IntraNET</a></div>
  <div id="main">
    <h2>Welcome <?php echo $_COOKIE["name"] ?></h2>
    <p>Please use the links on the right to navigate through the application. </p>
    
	<?php 
		$arr = $_COOKIE['posts'];
		$arr = urldecode($arr);
		$arr = unserialize($arr);
		echo $arr[0];
		$isallowed = 0;
		foreach($arr as $foo)
		{	$val = explode(",", $foo);
			if($val[0]=='MNIT' AND $val[1]=='Webmaster') $isallowed = 1;
		}
		if($isallowed == 1) 
    	{
    		$query1 = mysql_query("SELECT * FROM news WHERE status = 'pending'");
    		$num1 = mysql_num_rows($query1);
    		$query2 = mysql_query("SELECT * FROM notices WHERE status = 'pending'");
    		$num2 = mysql_num_rows($query2);
    		echo "<p><b>You have <ul><li>".$num1." new news items </li><li>".$num2." new notices </li></ul> to <a href=\"approve.php\">approve</a>!<b></p><p>&nbsp;</p>"; 
    	}	
    ?>
    <p><a href="addpost.php">Post a New Item</a><br />
      <a href="archived.php">Go to View Posts Page</a><br /><br />
      <? if($_COOKIE['access']=='dadmin' OR $_COOKIE['access']=='sadmin') echo "<a href=\"archived.php\">View All Department Posts</a></p>"; ?>
      <p><a href="../intrahome.php">Go back to MNIT IntraNET</a><br />
      <a href="../logout.php">Logout</a></p>
    <p>&nbsp;</p>
    <p class="credits">&copy; 2005 MNIT</p>
  </div>
  <div id="footer"></div>
</div>
</body>
</html>
