<?php

$con = mysql_connect('localhost', 'cake', 'cakephp') or die(mysql_error());
mysql_select_db('cake');

echo "Checking 'courses_students' table...........\n\n";
$query = 'SELECT * FROM courses_students';
$result = mysql_query($query);
while($entry = mysql_fetch_assoc($result)) {
        if(strlen($entry['collegeid'])==5) {
                $query3 = "SELECT * FROM courses_students WHERE collegeid = '0".$entry['collegeid']."' AND course_id = '".$entry['course_id']."'";
                $check1 = mysql_query($query3);
                if(mysql_num_rows($check1)) {
                        $query1 = "DELETE FROM courses_students WHERE collegeid = '0".$entry['collegeid']."' AND course_id = '".$entry['course_id']."'";
                        mysql_query($query1) or die("Delete error, ".mysql_error());
                        echo "\nAlL dUplicate entry for '0".$entry['collegeid']."' was resolved...\n";
                }
				$query4 = 
					"UPDATE courses_students SET collegeid = '0".$entry['collegeid']."' WHERE (collegeid = '".$entry['collegeid']."' AND course_id = '".$entry['course_id']."')";

                mysql_query($query4) or die(mysql_error());
                echo $entry['collegeid']." --> 0".$entry['collegeid']."\n\n\n";
        } else if(strlen($entry['collegeid'])==6 AND substr($entry['collegeid'],0,1)!='0') {
                $query4 = "UPDATE courses_students SET collegeid = '0".$entry['collegeid']."' WHERE (collegeid = '".$entry['collegeid']."' and course_id = '".$e
ntry['course_id']."')";

                mysql_query($query4) or die(mysql_error());
                echo $entry['collegeid']." --> 0".$entry['collegeid']."\n\n\n";
        }
}

?>
