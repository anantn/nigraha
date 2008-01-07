<?php

echo '<h1>Administrative Operations</h1>';
echo '<span class="notice">Please click on the appropriate link to select an operation</span>';

echo '<p><ul>';
echo '<li>'.$html->link('Withdrawal and Course Modification on Students', '/students/coursemod').': (TBD BY Dept. of AA ONLY)</li>';
echo '<li>'.$html->link('Student Details Modification', '/students').': (TBD BY Dept. of SA ONLY)</li>';
echo '<li>'.$html->link('Course Operations', '/courses').': Addition/Modification/Deletion (TBD BY Dept. of AA ONLY)</li>';
echo '<li>'.$html->link('Student ID Additions', '/students/add').': Add a missing Student ID for successful completion of operation (2)</li>';
echo '<li>'.$html->link('Student Batch Changes', '/students/batch').': Change batch numbers for Students</li>';
echo '</ul></p>';

?>