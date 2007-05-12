<?php

mysql_connect('localhost', 'root', 'password');

echo "<center><img src=\"MNIT_Logo.gif\" alt=\"MNIT Logo\" />";
echo "<h2>Malaviya National Institute Of Technology, Jaipur</h2>";
echo "<h2>Office of Dean ( Academic Affairs )</h2>";
echo "<h3>Course-wise List of Students</h3></center>";
if(!isset($_REQUEST['id'])) echo "<h4>Please specify {{{url}}}?id={{{course-id}}}</h4>";
mysql_select_db('mnit_master');
$a = mysql_query("SELECT * FROM syllabus WHERE code='".$_REQUEST['id']."'");
$b = mysql_fetch_assoc($a);
echo "<center><table border=1 cellpadding=5><tr>";
echo "<td><strong>Course Code</strong></td>";
echo "<td><strong>Course Title</strong></td>";
echo "<td><strong>Department</strong></td>";
echo "<td><strong>Semesters</strong></td>";
echo "<td><strong>Area</strong></td>";
echo "<td><strong>Credits</strong></td></tr>";
echo "<tr><td>".$_REQUEST['id']."</td>";
echo "<td>".$b['title']."</td>";
echo "<td>".$b['dept']."</td>";
echo "<td>".$b['semester']."</td>";
echo "<td>".$b['area']."</td>";
echo "<td>".$b['credits']."</td>";
echo "</tr></table></center><br><br>";

mysql_select_db('mnit_profiles');
$x = mysql_query('SELECT userid, fullname, dept, courses FROM students
                    ORDER BY dept, fullname');
$count=0;
while ($y = mysql_fetch_assoc($x)) {
    $c = unserialize($y['courses']);
    $userids = array();
    foreach($c as $id){
        if($id==$_REQUEST['id']) {
            $count++;
            $students[] = array(
                  'count'=>$count,
                    'id'=>$y['userid'],
                      'name'=>$y['fullname'],
                        'dept'=>$y['dept']);
        }
    }
}

echo "<h3>Total number of students registered upto ".date('F j, Y, g:i a')." : ".$count."</h3>";
echo "<table border=1 cellpadding=5 width='100%'>";
echo "<tr><td><strong>S.No.</strong></td><td><strong>CollegeID</strong></td>
  <td><strong>Full Name</strong></td><td><strong>Department</strong></td></tr>";
foreach($students as $student) {   
    echo '<tr><td>';
    echo $student['count'];
    echo '</td><td>';
    echo $student['id'];
    echo '</td><td>';
    echo $student['name'];
    echo '</td><td>';
    echo $student['dept'];
    echo '</td></tr>';
}
echo "</table>";

?>
<div id="print-footer">&copy;2007 Nigraha; Dept. Of Computer Engineering, MNIT Jaipur</div>

    <style type="text/css" media="screen">
     div#print-footer {display: none;}
    </style>
    <style type="text/css" media="print">
     div#print-footer {display: block; position: fixed; bottom: 0;}
    </style>
