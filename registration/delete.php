<?php

mysql_connect('localhost', 'cake', 'cakephp');
mysql_select_db('cake');

$x = mysql_query("DELETE FROM students WHERE collegeid = '$argv[1]'");
var_dump($x);

$y = mysql_query("DELETE FROM courses_students WHERE collegeid = '$argv[1]'");
var_dump($y);

?>
