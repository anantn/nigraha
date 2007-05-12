<?php
	include ("auth.php");
	require_once ("../../protected/conn_acad.php");
	$arr = $_COOKIE['posts'];
	$arr = unserialize($arr);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css" href="academic.css" />
<title>Allot Rooms at MNIT</title>	
<body>
<div id="thetop">
</div>
<div id="container">
<div id="main">
  <div id="intro">
<h2>Room Allotment Module!</h2>
<p align="justify">Use the following sort to display the students with unalloted rooms...</p>
</div>
<div class="clear">&nbsp;
</div>

</div>

<div id="sidebar">

<h2 class="sidelink menuheader"><a id="sitemenu"></a>Your Menu :</h2>
<a class="sidelink" href="index.php">Home</a>
<span class="hide"> | </span>
<a class="sidelink" href="hostel.php">Go to Hostel Homepages</a>
<a class="sidelink" href="messcheck.php">Check mess bill</a>
<span class="hide"> | </span>
<?	if($is==1)
		echo"<a class=\"sidelink\" href=\"allot.php\">Allot Rooms</a>
		<a class=\"sidelink\" href=\"search.php\">Find a student</a>
		<span class=\"hide\"> | </span>";
	if($is==2)
		echo"<a class=\"sidelink\" href=\"messentry.php\">Enter Mess Bill</a><span class=\"hide\"> | </span>";
	if($is==3)
		echo"<a class=\"sidelink\" href=\"warden.php\">Warden's Page</a><span class=\"hide\"> | </span>";
?>
<br>
<span class="hide"> | </span>
<a class="sidelink" href="../intrahome.php">Back to IntraNET  </a>
<span class="hide"> | </span>
<a class="hide" href="#top" accesskey="1">Top of page</a>

<h3>Tutorials</h3>
<p>Links to the tutorials: <br />
- <a href="index.html">For Students </a><br />
- <a href="text-only.html">For Administration</a></p>
</div>
<div class="clear">&nbsp;</div>
</div>

<div id="footer">&copy; 2005 MNIT</div>

</body>
</html>
<? } else { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css" href="academic.css" />
<title>Add A Course</title>
<script language="javascript" src="jsval.js"></script>
<script language="javascript">
<!--
        function initValidation()
        {
			var objForm = document.forms["addcourse"];
            objForm.err = "Hey! You have not filled the following fields Properly! Please check them and then Submit:\n\n";
            
            objForm.code.required = 1;
			objForm.title.required = 1;
			objForm.dept.required = 1;
			objForm.credits.required = 1;
			objForm.lecture.required = 1;
			objForm.practical.required = 1;
			objForm.tutorial.required = 1;
			objForm.theoryexam.required = 1;
			objForm.pracexam.required = 1;
			
			objForm.cwsper.required = 1;
			objForm.cwsper.minvalue = 0;
			objForm.cwsper.maxvalue = 100;
			
			objForm.prsper.required = 1;
			objForm.prsper.minvalue = 0;
			objForm.prsperper.maxvalue = 100;
			
			objForm.mteper.required = 1;
			objForm.mteper.minvalue = 0;
			objForm.mteper.maxvalue = 100;
						
			objForm.eteper.required = 1;
			objForm.eteper.minvalue = 0;
			objForm.eteper.maxvalue = 100;
						
			objForm.preper.required = 1;  
			objForm.preper.minvalue = 0;
			objForm.preper.maxvalue = 100;		

		}
//-->
</script>
</head>

<body onload="initValidation();">
<div id="thetop">
</div>

<div id="container">
<div id="main">
  <div id="intro">
<h2>Course Addition </h2>
<p align="justify">Please fill in ALL the details in the form below to Add a course. Please note that you are asked only for the mark-related details of the course. The Syllabi has to added by the Department Administrator through the respective Department CMS. </p>
</div>
<div id="intro">
<form id="form1" name="addcourse" id="addcourse" method="post" action="addcourse.php">
  <table width="100%" border="0">
    <tr>
      <td>Course Code </td>
      <td><input name="code" type="text" id="code" size="5" maxlength="5" /></td>
    </tr>
    <tr>
      <td>Course Title </td>
      <td><input name="title" type="text" id="title" size="50" maxlength="50" /></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><select name="dept" id="dept">
        <option value="-1" selected="selected">Select One...</option>
        <option value="AR">Architecture</option>
        <option value="CE">Civil</option>
        <option value="CH">Chemical</option>
        <option value="CP">Computer</option>
        <option value="CY">Chemistry</option>
        <option value="EC">Electronics</option>
        <option value="EE">Electrical</option>
        <option value="HS">Humanities</option>
        <option value="IT">Information Tech</option>
        <option value="MA">Mathematics</option>
        <option value="ME">Mechanical</option>
        <option value="MT">Metallurgy</option>
        <option value="PH">Physics</option>
      </select>      </td>
    </tr>
    <tr>
      <td>Credits</td>
      <td><select name="credits" id="credits">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4" selected="selected">4</option>
        <option value="5">5</option>
      </select>      </td>
    </tr>
    <tr>
      <td>Lecture Hours per Week</td>
      <td><select name="lecture" id="lecture">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3" selected="selected">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select>      </td>
    </tr>
    <tr>
      <td>Practical Hours per Week </td>
      <td><select name="practical" id="practical">
        <option value="0" selected="selected">N/A</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select>      </td>
    </tr>
    <tr>
      <td>Tutorial Hours per Week </td>
      <td><select name="tutorial" id="tutorial">
        <option value="0" selected="selected">N/A</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select>      </td>
    </tr>
    <tr>
      <td>Theory Exam Duration </td>
      <td><select name="theoryexam" id="theoryexam">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3" selected="selected">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select>      </td>
    </tr>
    <tr>
      <td>Practical Exam Duration </td>
      <td><select name="pracexam" id="pracexam">
        <option value="0">N/A</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select>      </td>
    </tr>
    <tr>
      <td>CWS % </td>
      <td><input name="cwsper" type="text" id="cwsper" size="3" maxlength="3" /></td>
    </tr>
    <tr>
      <td>PRS % </td>
      <td><input name="prsper" type="text" id="prsper" size="3" /></td>
    </tr>
    <tr>
      <td>MTE % </td>
      <td><input name="mteper" type="text" id="mteper" size="3" maxlength="3" /></td>
    </tr>
    <tr>
      <td>ETE % </td>
      <td><input name="eteper" type="text" id="eteper" size="3" maxlength="3" /></td>
    </tr>
    <tr>
      <td>PRE % </td>
      <td><input name="preper" type="text" id="preper" size="3" maxlength="3" /></td>
    </tr>
    <tr>
      <td><input type="hidden" name="done" id="done" value="1" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">Please ensure that all the details are filled correctly before submitting the form! </td>
      </tr>
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="Add Course" /></td>
    </tr>
  </table>
</form>
</div>
<div class="clear">&nbsp;
</div>

</div>

<div id="sidebar">

<h2 class="sidelink menuheader"><a id="sitemenu"></a>Your Menu :</h2>
<a class="sidelink" href="index.php">Home</a>
<span class="hide"> | </span>
<a class="sidelink" href="hostel.php">Go to Hostel Homepages</a>
<a class="sidelink" href="search.php">Find a student</a>
<a class="sidelink" href="messcheck.php">Check mess bill</a>
<span class="hide"> | </span>
<?	if($is==1)
		echo"<a class=\"sidelink\" href=\"allot.php\">Allot Rooms</a><span class=\"hide\"> | </span>";
	if($is==2)
		echo"<a class=\"sidelink\" href=\"messentry.php\">Enter Mess Bill</a><span class=\"hide\"> | </span>";
	if($is==3)
		echo"<a class=\"sidelink\" href=\"warden.php\">Warden's Page</a><span class=\"hide\"> | </span>";
?>
<br>
<span class="hide"> | </span>
<a class="sidelink" href="../intrahome.php">Back to IntraNET  </a>
<span class="hide"> | </span>
<a class="hide" href="#top" accesskey="1">Top of page</a>

<h3>Tutorials</h3>
<p>Links to the tutorials: <br />
- <a href="index.html">For Students </a><br />
- <a href="text-only.html">For Administration</a></p>
</div>
<div class="clear">&nbsp;</div>
</div>

<div id="footer">&copy; 2005 MNIT</div>

</body>
</html>
<? } ?>