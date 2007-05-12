<?php 
$conn = mysql_connect("localhost", "root", "password") or die(mysql_error());
mysql_select_db("mnit_master", $conn);
$electives = simplexml_load_file('electives.xml');
if(isset($_REQUEST['dept']) and isset($_REQUEST['semester'])) {
  $que = mysql_query("SELECT * FROM syllabus WHERE semester='".$_REQUEST['semester']."' and dept='".$_REQUEST['dept']."' and area='DE' ") or die(mysql_error());
?>
<html><head><title>Courses Display Monitor</title></head>
<body>
  <table border="0" width="100%" cellspacing="0">
    <tr>
      <td bgcolor="#000000">
        <table width="100%" cellspacing=0 cellpadding=2>
          <tr>
            <td width="90%" nowrap bgcolor="#FFE880"><b>Department Elective</b></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table width="100%" border=1>
  <tr>
    <td><center><strong>Course Code</strong></center></td>
    <td><center><strong>Title</strong></center></td> 
    <td><center><strong>Credits</strong></center></td>
  </tr>
  <?php 
    while($list = mysql_fetch_assoc($que)) {
      foreach ($electives->dept as $de) {
        if($de['id']==$_REQUEST['dept'] and $de['semester']==$_REQUEST['semester']) {
          foreach($de->course as $permitted) {
            if($list['code']==$permitted)
              echo " <tr>
              <td><center>".$list['code']."</center></td>
              <td><center>".$list['title']."</center></td> 
              <td><center>".$list['credits']."</center></td>
              </tr>";
          }
        }
      }
    }
  ?>
  </table>
</body>
</html>
<?php
} else if(isset($_REQUEST['insti'])) {
  $que = mysql_query("SELECT * FROM syllabus WHERE code LIKE CONVERT( _utf8 '%IE%' USING latin1 ) ") or die(mysql_error()); 
?>
<html><head><title>Courses Display Monitor</title></head>
<body>
  <table border="0" width="100%" cellspacing="0">
    <tr>
      <td bgcolor="#000000">
        <table width="100%" cellspacing=0 cellpadding=2>
          <tr>
            <td width="90%" nowrap bgcolor="#FFE880"><b>Institute Elective</b></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table width="100%" border=1>
  <tr>
    <td><center><strong>Course Code</strong></center></td>
    <td><center><strong>Title</strong></center></td> 
    <td><center><strong>Credits</strong></center></td>
  </tr>
  <?php 
    while($list = mysql_fetch_assoc($que)) {
      echo " <tr>
        <td><center>".$list['code']."</center></td>
        <td><center>".$list['title']."</center></td> 
        <td><center>".$list['credits']."</center></td>
      </tr>";
    }
  ?>
  </table>
</body>
</html>
<?php
} else if(isset($_REQUEST['option'])) {
  $que = mysql_query("SELECT * FROM syllabus") or die(mysql_error());
?>
<html><head><title>Courses Display Monitor</title></head>
<body>
  <table border="0" width="100%" cellspacing="0">
    <tr>
      <td bgcolor="#000000">
        <table width="100%" cellspacing=0 cellpadding=2>
          <tr>
            <td width="90%" nowrap bgcolor="#FFE880"><b>Extra Options (SORRY DATA UNAVAILABLE)</b></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table width="100%" border=1>
  <tr>
    <td><center><strong>Course Code</strong></center></td>
    <td><center><strong>Title</strong></center></td> 
    <td><center><strong>Credits</strong></center></td>
  </tr>
  <?php 
    while($list = mysql_fetch_assoc($que)) {
      echo "<tr>
        <td><center></center></td>
        <td><center></center></td> 
        <td><center></center></td>
      </tr>";
    }
  ?>
  </table>
</body>
</html>
<?php
} else {

?>
<html><head><title>Courses Display Monitor</title></head>
<body>
<!--       Table 1       -->
  <?php
    $que1 = mysql_query("SELECT * FROM syllabus WHERE code NOT LIKE CONVERT( _utf8 '%IE%' USING latin1 ) and ( dept='".$_REQUEST['dept']."' OR dept='all' ) ORDER BY semester ") or die(mysql_error()); 
  ?>
  <table border="0" width="100%" cellspacing="0">
    <tr>
      <td bgcolor="#000000">
        <table width="100%" cellspacing=0 cellpadding=2>
          <tr>
            <td width="90%" nowrap bgcolor="#FFE880"><b>All Core</b></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table width="100%" border=1>
  <tr>
    <td><center><strong>Course Code</strong></center></td>
    <td><center><strong>Title</strong></center></td> 
    <td><center><strong>Credits</strong></center></td>
    <td><center><strong>Semester</strong></center></td>
  </tr>
  <?php 
    while($list1 = mysql_fetch_assoc($que1)) {
      echo " <tr>
        <td><center>".$list1['code']."</center></td>
        <td><center>".$list1['title']."</center></td> 
        <td><center>".$list1['credits']."</center></td>
        <td><center>".$list1['semester']."</center></td>
      </tr>";
    }
  ?>
  </table>
<!--       Table 2       -->
  <?php
    $que2 = mysql_query("SELECT * FROM syllabus WHERE dept='".$_REQUEST['dept']."' and area='DE' ") or die(mysql_error()); 
  ?>
  <table border="0" width="100%" cellspacing="0">
    <tr>
      <td bgcolor="#000000">
        <table width="100%" cellspacing=0 cellpadding=2>
          <tr>
            <td width="90%" nowrap bgcolor="#FFE880"><b>Department Electives</b></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table width="100%" border=1>
  <tr>
    <td><center><strong>Course Code</strong></center></td>
    <td><center><strong>Title</strong></center></td> 
    <td><center><strong>Credits</strong></center></td>
    <td><center><strong>Semester</strong></center></td>
  </tr>
  <?php 
    while($list2 = mysql_fetch_assoc($que2)) {
      echo " <tr>
        <td><center>".$list2['code']."</center></td>
        <td><center>".$list2['title']."</center></td> 
        <td><center>".$list2['credits']."</center></td>
        <td><center>".$list2['semester']."</center></td>
      </tr>";
    }
  ?>
  </table>
<!--       Table 3       -->
  <?php 
    $que3 = mysql_query("SELECT * FROM syllabus WHERE code LIKE CONVERT( _utf8 '%IE%' USING latin1 ) ") or die(mysql_error()); 
  ?>
  <table border="0" width="100%" cellspacing="0">
    <tr>
      <td bgcolor="#000000">
        <table width="100%" cellspacing=0 cellpadding=2>
          <tr>
            <td width="90%" nowrap bgcolor="#FFE880"><b>Institute Electives</b></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table width="100%" border=1>
  <tr>
    <td><center><strong>Course Code</strong></center></td>
    <td><center><strong>Title</strong></center></td> 
    <td><center><strong>Credits</strong></center></td>
    <td><center><strong>Semester</strong></center></td>
  </tr>
  <?php 
    while($list3 = mysql_fetch_assoc($que3)) {
      echo " <tr>
        <td><center>".$list3['code']."</center></td>
        <td><center>".$list3['title']."</center></td> 
        <td><center>".$list3['credits']."</center></td>
        <td><center>".$list3['semester']."</center></td>
      </tr>";
    }
  ?>
  </table>
</body>
</html>
<?php
}
?>
