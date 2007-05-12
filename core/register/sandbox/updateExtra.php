<?php

mysql_connect('localhost', 'root', 'password');
mysql_select_db('mnit_profiles');

/* case 1 & 3*/
$all = mysql_query('SELECT * FROM students');

/* case 2 */
//$all = mysql_query('SELECT * FROM students WHERE semester = 4');

while($stu = mysql_fetch_assoc($all)) {
    $courses = unserialize($stu['courses']);

    /* case 1
    if (!in_array('ECA-2', $courses)) {
        $courses[] = 'ECA-2';
        mysql_query("UPDATE students SET courses = '".serialize($courses)."' WHERE userid = '".$stu['userid']."'");
    } */

    /* case 2 
    if (!in_array('ECA-1', $courses)) {
        $courses[] = 'ECA-1';
        mysql_query("UPDATE students SET courses = '".serialize($courses)."' WHERE userid = '".$stu['userid']."'");
    }*/

    /* case 3 */
    $courses = array_unique($courses);
    sort($courses);
    mysql_query("UPDATE students SET courses = '".serialize($courses)."' WHERE userid = '".$stu['userid']."'");
}

?>
