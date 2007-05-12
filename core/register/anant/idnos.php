<?php

mysql_connect('localhost', 'root', 'password');
mysql_select_db('mnit_profiles');
$f = fopen('itids.list', 'w+');
$x = mysql_query("SELECT userid FROM students WHERE dept = 'IT' ORDER BY semester, fullname");
while ($y = mysql_fetch_assoc($x)) {
    fwrite($f, $y['userid']."\n");
}
fclose($f);

?>
