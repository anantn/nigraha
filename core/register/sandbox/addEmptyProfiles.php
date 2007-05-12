<?php

mysql_connect('localhost', 'root', 'password');

mysql_select_db('mnit_temp');
$allStudents = mysql_query('SELECT userid, name, semester, dept FROM students');

mysql_select_db('mnit_profiles');
$registered = mysql_query('SELECT userid FROM students');
$subset = array();
while ($reg = mysql_fetch_assoc($registered)) {
    $subset[] = $reg['userid'];
}

while ($student = mysql_fetch_assoc($allStudents)) {
    if (!in_array($student['userid'], $subset)) {
        echo "ADDING ENTRY FOR ".$student['userid']." <br/>";
        mysql_query("INSERT INTO `students` ( `userid` , `alias` , `accesslvl` , `fullname` , `dob` , `gender` , `bloodgp` , `nationality` ,
            `residencetype` , `maritalstatus` , `category` , `dept` , `semester` , `email` , `yearofjoin` ,
            `concession` , `fathersname` , `foccupation` , `fphone` , `faddress` , `caddress` , `mothersname` ,
            `posts` , `about` , `miscdata` , `showfields` , `courses` , `timeofreg` )
                    VALUES (
                        '".$student['userid']."', '', 'user', '".$student['name']."', '', 'M', '', '', '', '', '', '".$student['dept']."', '".$student['semester']."',
                        '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');");
    }
}

echo "DONE!";

?>
