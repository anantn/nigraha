<?php

mysql_connect('localhost', 'root', 'password');
mysql_select_db('mnit_temp');

$x = 1;
$nos = mysql_query('SELECT userid, name FROM students ORDER BY userid');

echo '<table border="1" width="100%">';
while ($stu = mysql_fetch_assoc($nos)) {
    echo '<tr>';
    
    echo '<td>'.$stu['userid'].'</td>';
    echo '<td>'.$stu['name'].'</td>';

    echo '</tr>';
}
echo '</table>';

?>
