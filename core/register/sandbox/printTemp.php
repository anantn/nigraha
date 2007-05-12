<?php

mysql_connect('localhost', 'root', 'password');
mysql_select_db('mnit_temp');

$x = 1;
$nos = mysql_query('SELECT userid, name, passtemp FROM students');
echo '<table border="1" width="100%">';
while ($stu = mysql_fetch_assoc($nos)) {
    //$nex = mysql_fetch_assoc($nos);
    echo '<tr>';
    
    echo '<td>'.$stu['userid'].'<br/>'.substr($stu['name'],0,15).'</td>';
    echo '<td><center>'.$stu['passtemp'].'</center>&nbsp;&nbsp;&nbsp;</td>';

    /*
    echo '<td>'.$nex['userid'].'<br/>'.substr($nex['name'],0,15).'</td>';
    echo '<td><center>'.$nex['passtemp'].'</center></td>';
    */
    echo '</tr>';
}
echo '</table>';

?>
