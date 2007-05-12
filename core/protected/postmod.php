<?php
	require_once("../protected/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Post Modification</title>
</head>
<?php
	if(isset($_POST['done']) AND $_POST['done']==1)
	{	$extract = mysql_query("SELECT posts FROM profile_".$_POST['type']." WHERE alias = '".$_POST['alias']."'");
		$done = mysql_fetch_assoc($extract);
		$warray = unserialize($done['posts']);
		$push=$_POST['dept'].",".$_POST['post'];
		array_push($warray, $push);
		$put = serialize($warray);
		$update = mysql_query("UPDATE profile_".$_POST['type']." SET posts = '".$put."' WHERE alias = '".$_POST['alias']."'");
		echo("Posts Updated: <br>");
		print_r($warray);
		echo("<p><a href=\"postmod.php\">Click Here</a> To add more posts</p>");
	}
	else
	{
?>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0">
    <tr>
      <td>Alias</td>
      <td><input type="text" name="alias" /></td>
    </tr>
    <tr>
      <td>Type</td>
      <td><select name="type">
        <option value="-1" selected="selected">Choose One...</option>
        <option value="student">Student</option>
        <option value="faculty">Faculty</option>
      </select>
      </td>
    </tr>
    <tr>
      <td>Committee/Dept</td>
      <td><input type="text" name="dept" /></td>
    </tr>
    <tr>
      <td>Post</td>
      <td><input type="text" name="post" /></td>
    </tr>
    <tr>
      <td><input type="submit" name="Submit" value="Allot" /></td>
      <td><input type="hidden" name="done" value="1" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<? } ?>