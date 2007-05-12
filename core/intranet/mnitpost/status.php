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
<title>Book Status</title>
</head>
<body>
<div id="title">
  <h1>MNIT LIBRARY </h1>
</div>
<div id="container">
  <div id="sidebar">
    <h2>&nbsp;</h2>
    <a class="menu" href="index.php">Home</a> <a class="menu" href="addbook.php">Recommend</a> <a class="menu" href="status.php">Status</a> <a class="menu"></a> <a class="menu" href="../../index.php">MNIT Home</a> <a class="menu" href="../index.php">IntraNET</a></div>
  <div id="main">
    <h2>Book Status</h2>
    <p>Following is the list of books recommended by you and their current status</p>
    <p><strong>NOTE</strong>: <br />
    &quot;Pending&quot; means the book has not yet been approved, &quot;Approved&quot; means that the book is in the process of being purchased<br />
    &quot;Purchased&quot; means that the book has been bought and will be available soon for issue at the library!<br />
	&quot;Rejected&quot; means that the book has been rejected for some reason (Most likely cause is that we already own the book or it is a duplicate entry!<hr /></p>
<?php
		$query = mysql_query("SELECT title, author, status FROM books WHERE recoby = '".$_COOKIE['alias']."'");
		$num = mysql_num_rows($query);
		if($num==0) echo "<p>Hey, you have not recommended any books yet!</p>";
		else
		{
?>
    <table width="100%" border="0">
      <tr>
        <td><strong>Book Title</strong></td>
		<td><strong>Author</strong></td>
        <td><strong>Status</strong></td>
      </tr>
<?		while ($row = mysql_fetch_array($query, MYSQL_NUM))
		{	echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td></tr>";
		}
		echo "</table>";
		}
?>
    <p>&nbsp; </p>
    <p class="credits">&copy; 2005 MNIT</p>
  </div>
  <div id="footer"></div>
</div>
</body>
</html>
