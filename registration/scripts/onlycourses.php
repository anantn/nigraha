<?php

mysql_connect('localhost', 'cake', 'cakephp');
mysql_select_db('cake');

echo "Checking 'courses_students' table...........\n\n";
$query = 'SELECT * FROM courses_students';
$result = mysql_query($query);
while($entry = mysql_fetch_assoc($result)) {
	if(strlen($entry['collegeid'])==5) {
		$query4 = "UPDATE courses_students SET collegeid = '0".$entry['collegeid']."' WHERE (collegeid = '".$entry['collegeid']."' and course_id = '".$entry['course_id']."')";
		mysql_query($query4) or die(mysql_error());
		echo $entry['collegeid']." --> 0".$entry['collegeid']."\n";
	} else if(strlen($entry['collegeid'])==6 AND substr($entry['collegeid'],0,1)!='0') {
		$query4 = "UPDATE courses_students SET collegeid = '0".$entry['collegeid']."' WHERE (collegeid = '".$entry['collegeid']."' and course_id = '".$entry['course_id']."')";
		mysql_query($query4) or die(mysql_error());
		echo $entry['collegeid']." --> 0".$entry['collegeid']."\n";
	}
	echo "\n\n";
}

?>
