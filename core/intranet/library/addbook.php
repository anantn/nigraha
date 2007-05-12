<?php
	include ("auth.php");
	require_once ("../../protected/conn_lib.php");
	mysql_select_db("library");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css" href="library.css" />
<title>Book Recommendations</title>
<script language="javascript" src="jsval.js"></script>
<script language="javascript">
<!--
        function initValidation()
        {
			var objForm = document.forms["daform"];
            objForm.err = "Hey! You have not filled the following fields Properly! Please check them and then Submit:\n\n";
            
            objForm.titled.required = 1;
			objForm.author.required = 1;

			objForm.ISBN.required = 1;
			objForm.ISBN.regexp = /ISBN\x20(?=.{13}$)\d{1,5}([- ])\d{1,7}\1\d{1,6}\1(\d|X)$/;

			objForm.edition.required = 1;
			objForm.publisher.required = 1;
			objForm.approx.required = 1;

			objForm.type.required = 1;
            objForm.type.exclude = '-1';

		}
//-->
</script>
</head>
<body onLoad="initValidation()">
<div id="title">
  <h1>MNIT LIBRARY </h1>
</div>
<div id="container">
  <div id="sidebar">
    <h2>&nbsp;</h2>
    <a class="menu" href="index.php">Home</a> <a class="menu" href="addbook.php">Recommend</a> <a class="menu" href="status.php">Status</a> <a class="menu"></a> <a class="menu" href="../../index.php">MNIT Home</a> <a class="menu" href="../index.php">IntraNET</a></div>
  <?php
	if(isset($_POST['done']) AND $_POST['done']=='1')
	{	$today = date("Y-m-d");
		$update = mysql_query("INSERT INTO books  VALUES('', '".$_POST['titled']."', '".$_POST['author']."', '".$_POST['publisher']."', '".$_POST['edition']."', '".$_POST['ISBN']."', '".$_POST['approx']."', '".$_POST['type']."', '".$_COOKIE['alias']."', '".$today."', '".$_COOKIE['dept']."', 'Pending', '', '')") or die(mysql_error());	
?>
  <div id="main">
    <h2>Your Book has been submitted!</h2>
    <p>The Book has been added to the database and will be approved by the Head of your Department. Once approved, the librarian will aquire the book as soon as possible! Please do keep checking the status of your books using the links on the right</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p class="credits">&copy; 2005 MNIT</p>
  </div>
  <div id="footer"></div>
<? } else { ?> 

  <div id="main">
	<h2>Book Recommendation</h2>
    <p>Please fill this form to submit the book for approval!<br /><b>ALL FIELDS ARE COMPULSORY!</b> Please include the preceding 'ISBN' when filling in the ISBN number. Seperate the numbers with Spaces, not hyphens! To find the ISBN Number of the book, a simple search at <a href="http://www.google.com/">Google</a> will suffice.</p>
    <p>
	 <form id="daform" method="post" action="addbook.php" name="daform" onSubmit="return validateCompleteForm(this);">
      <table width="100%" border="0">
        <tr>
          <td>Book Title </td>
          <td><input type="text" name="titled" id="titled" /></td>
        </tr>
        <tr>
          <td>Book Author </td>
          <td><input name="author" type="text" id="author" /></td>
        </tr>
        <tr>
          <td>ISBN Number </td>
          <td><input name="ISBN" type="text" id="ISBN" value="ISBN " /></td>
        </tr>
        <tr>
          <td>Edition</td>
          <td><input name="edition" type="text" id="edition" /></td>
        </tr>
        <tr>
          <td>Publisher</td>
          <td><input name="publisher" type="text" id="publisher" /></td>
        </tr>
        <tr>
          <td>Approx. Cost (Rs.) </td>
          <td><input name="approx" type="text" id="approx" /></td>
        </tr>
        <tr>
          <td>Book Type </td>
          <td><span class="style1">
            <select name="type" id="type">
              <option value="-1" selected="selected">Select One...</option>
              <option value="Reference">Reference</option>
              <option value="Application">Application</option>
              <option value="Course">Course Related</option>
            </select>
          </span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><span class="style1"></span></td>
        </tr>
        <tr>
          <td>Recommended by </td>
          <td><input type="text" disabled="disabled" value="<? echo $_COOKIE['name'] ?>" /></td>
        </tr>
        <tr>
          <td><input type="hidden" name="done" value="1" /></td>
          <td><span class="style1"></span></td>
        </tr>
        <tr>
          <td><input type="submit" name="Submit" value="Recommend!" /></td>
          <td><span class="style1"></span></td>
        </tr>
      </table>
    </form>
	</p>
    <p class="credits">&copy; 2005 MNIT</p>
  </div>
  <div id="footer"></div>
</div>
</body>
</html>
<? } ?>