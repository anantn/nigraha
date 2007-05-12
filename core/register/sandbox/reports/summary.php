<?php

mysql_connect('localhost', 'root', 'password');
mysql_select_db('mnit_profiles');

$depts = array('CP', 'IT', 'CE', 'CH', 'EC', 'EE', 'ME', 'MT');
$data = array(); $tot = array('num'=>0, 'tot'=>0, 'pai'=>0);

foreach($depts as $dept)
{
    $query = mysql_query("SELECT * FROM students WHERE dept = '".$dept."'");
    $data[$dept]['num'] = mysql_num_rows($query);
    $tot['num'] += $data[$dept]['num'];
}

mysql_select_db('mnit_temp');

foreach($depts as $dept)
{
    $query = mysql_query("SELECT * FROM students WHERE dept = '".$dept."'");
    $data[$dept]['tot'] = mysql_num_rows($query);
    $tot['tot'] += $data[$dept]['tot'];
    
    $query = mysql_query("SELECT * FROM students WHERE dept = '".$dept."' AND duespaid = 'Y'");
    $data[$dept]['pai'] = mysql_num_rows($query);
    $tot['pai'] += $data[$dept]['pai'];
}

echo "<h1><font color=\"green\">Registration Status</font></h1>";
echo "<table border=\"1\">";
echo "<tr><td><b>Department</b></td><td><b>Dues Paid<b></td>";
echo "<td><b>Registered</b></td><td><b>Total</b></td></tr>";

foreach($depts as $dept) {
    echo "<tr><td>$dept</td><td>".$data[$dept]['pai']."</td>";
    echo "<td>".$data[$dept]['num']."</td><td>".$data[$dept]['tot']."</td></tr>";
}

echo "<td>&nbsp;</td><td><font color=\"red\">".$tot['pai']."</font></td><td><font color=\"red\">".$tot['num']."</font></td><td><font color=\"red\">".$tot['tot']."</font></td></tr>";
echo "</table>";

echo "<p>UPTO: ".date("F j, Y, g:i a")."</p>";
?>
