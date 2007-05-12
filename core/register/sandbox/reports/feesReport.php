<?php

function getFees($cat)
{
    switch($cat) {
        case 'GH':  return "6200/-";
        case 'GD':  return "5100/-";
        case 'SH':  return "1200/-";
        case 'SD':  return "100/-";
        case 'DA':  return "100/-";
    }
}

mysql_connect('localhost', 'root', 'password');
mysql_select_db('mnit_temp');

$students = array();
$paid = mysql_query("SELECT * FROM students WHERE duespaid = 'Y' and (dept='CP' or dept='IT') ORDER BY dept, semester, name");

mysql_select_db('mnit_profiles');

while ($stu = mysql_fetch_assoc($paid)) {
    $dor = mysql_query("SELECT timeofreg FROM students WHERE userid = '".$stu['userid']."'");
    $dor = mysql_fetch_assoc($dor);
    $students[] = array('id'=>$stu['userid'],
                            'name'=>$stu['name'],
                                'cat'=>$stu['category'],
                                    'challan'=>$stu['challan'],
                                        'bank'=>$stu['bank'],
                                            'ddno'=>$stu['ddno'],
                                                'dor'=>$dor['timeofreg'],
                                                    'sem'=>$stu['semester'],
                                                      'dept'=>$stu['dept']);
}

echo "<center><img src=\"MNIT_Logo.gif\" alt=\"MNIT Logo\" />";
echo "<h2>Malaviya National Institute Of Technology, Jaipur</h2>";
echo "<h2>Office of Dean ( Academic Affairs )</h2>";
echo "<h3>Financial Report - upto ".date('F j, Y')."</h3></center>";
echo '<table border="1" cellpadding=3>';
echo "<tr><td><strong>S.No.</strong></td><td><strong>Student ID</strong></td><td><strong>Student Name</strong></td>";
echo "<td><strong>Amount</strong></td><td><strong>Challan No.</strong></td>";
echo "<td><strong>Mode / Bank</strong></td><td><strong>DD. No.</strong></td>";
echo "<td><strong>Date of Registration</strong></td></tr>";
$count=0;
foreach($students as $student) {
    if($dept!=$student['dept'] or $sem!=$student['sem']) {
        echo "<tr><td colspan=8><center><strong>Semester ".$student['sem']." ".$student['dept']."</strong></center></td></tr>";
        $dept=$student['dept'];
        $sem=$student['sem'];
        $count=0;
    }
    $count++;
    $ddno=$student['ddno'];
    if($ddno=='0') $ddno = 'N/A';
    echo '<tr>';
    echo '<td>'.$count.'</td>';
    echo '<td>'.$student['id'].'</td>';
    echo '<td>'.$student['name'].'</td>';
    echo '<td>'.getFees($student['cat']).'</td>';
    echo '<td>'.$student['challan'].'</td>';
    echo '<td>'.$student['bank'].'</td>';
    echo '<td>'.$ddno.'</td>';
    echo '<td>'.$student['dor'].'</td>';
    echo '</tr>';
}
echo '</table>';

?>
<div id="print-footer">&copy;2007 Nigraha; Dept. Of Computer Engineering, MNIT Jaipur</div>

    <style type="text/css" media="screen">
     div#print-footer {display: none;}
    </style>
    <style type="text/css" media="print">
     div#print-footer {display: block; position: fixed; bottom: 0;}
    </style>
