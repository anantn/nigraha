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
<title>Post News/Notice at MNIT</title>
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
  <h1>THE MNIT POST</h1>
</div>
<div id="container">
  <div id="sidebar">
    <h2>&nbsp;</h2>
    <a class="menu" href="index.php">Home</a> <a class="menu" href="addpost.php">Post</a> <a class="menu" href="archived.php">View All</a> <a class="menu"></a> <a class="menu" href="../../index.php">MNIT Home</a> <a class="menu" href="../index.php">IntraNET</a></div>
  <?php
	if(isset($_POST['done']) AND $_POST['done']=='1')
	{	$today = date("Y-m-d");
		$update = mysql_query("INSERT INTO ".$_POST['type']." VALUES(DEFAULT, '".$_POST['headline']."', '".$_POST['data']."', '".$_COOKIE['name']."','".$_COOKIE['dept']."', '".$today."', '', '".$_POST['area']."', '', 'pending', '".$today."')") or die(mysql_error());	
  ?>
  <div id="main">
    <h2>Item posted for approval!</h2>
    <p>The item has been added to the database and will be approved by the Head of your Department. Once approved, it will appear on the news/notice board! Please do keep checking the status of your post using the links on the right</p>
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
	<h2>Make a Post</h2>
    <p>Please fill this form to submit the news/notice for approval!<br /><b>ALL FIELDS ARE COMPULSORY!</b> </p>
    <p>
	 <form id="daform" method="post" action="addpost.php" name="daform" onSubmit="return validateCompleteForm(this);">
      <table width="100%" border="0">
        <tr>
          <td>Item Type </td>
          <td><span class="style1">
            <select name="type" id="type">
              <option value="-1" selected="selected">Select One...</option>
              <option value="news">News</option>
              <option value="notices">Notice</option>
            </select>
          </span></td>
        </tr>
        <tr>
          <td>Subject Area </td>
          <td><span class="style1">
            <select name="area" id="type">
              <option value="-1" selected="selected">Select One...</option>
              <option value="internal">Internal</option>
              <? if($_COOKIE['access']=='user' OR $_COOKIE['access']=='ban') {} else echo "<option value=\"department\">Department</option>";?>
              <? if($_COOKIE['access']=='dpost' OR $_COOKIE['access']=='user' OR $_COOKIE['access']=='ban') {} else echo "<option value=\"central\">Central</option>";?>
            </select>
          </span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><span class="style1"></span></td>
        </tr>
        <tr>
          <td>Posted by </td>
          <td><input type="text" disabled="disabled" value="<? echo $_COOKIE['name'] ?>" /></td>
        </tr>
        <tr>
          <td><input type="hidden" name="done" value="1" /></td>
          <td><span class="style1"></span></td>
        </tr></table><hr>
        <table width="100%" border="0">
        <tr>
          <td>Headline </td>
          <td><input type="text" name="headline" id="headline" size="40" /></td>
        </tr>
        <tr>
          <td>Data </td>
          <td><textarea name="data" rows="10" cols="30"/>Only text as of now. WYSIWYG and file upload will soon be added though...</textarea></td>
        </tr>
        <tr>
          <td><input type="submit" name="Submit" value="Post!" /></td>
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