<?php
function sentenceCase($s){
   $str = strtolower($s);
   $cap = true;
   $ret = "";

   for($x = 0; $x < strlen($str); $x++){
       $letter = substr($str, $x, 1);
       if($letter == " ") {
           $cap = true;
       } elseif($letter != " " && $cap == true){
           $letter = strtoupper($letter);
           $cap = false;
       }
       
       $ret .= $letter;
   }
   
   return $ret;
}

$con = mysql_connect('localhost', 'cake', 'cakephp') or die(mysql_error());
mysql_select_db('cake');

echo "Checking 'students' table...........\n\n";
$query = 'SELECT * FROM students';
$result = mysql_query($query);
while($entry = mysql_fetch_assoc($result)) {
	echo $entry['fName']." ".$entry['lName']." --> ".sentenceCase($entry['fName'])." ".sentenceCase($entry['lName'])."\n";
	$query1 = "UPDATE students SET fName = '".sentenceCase($entry['fName'])."' WHERE fName = '".$entry['fName']."'"; 
	$query2 = "UPDATE students SET lName = '".sentenceCase($entry['lName'])."' WHERE lName = '".$entry['lName']."'";
	mysql_query($query1) or die(mysql_error());
	mysql_query($query2) or die(mysql_error());
	if(strlen($entry['collegeid'])==5) {
		$query3 = "UPDATE students SET collegeid = '0".$entry['collegeid']."' WHERE collegeid = '".$entry['collegeid']."'";
		mysql_query($query3) or die(mysql_error());
		echo $entry['collegeid']." --> 0".$entry['collegeid']."\n";
	} else if(strlen($entry['collegeid'])==6 AND substr($entry['collegeid'],0,1)!='0') {
		$query3 = "UPDATE students SET collegeid = '0".$entry['collegeid']."' WHERE collegeid = '".$entry['collegeid']."'";
		mysql_query($query3) or die(mysql_error());
		echo $entry['collegeid']." --> 0".$entry['collegeid']."\n";
	}
	echo "\n\n";
}

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
