<?php

foreach ($list as $student) {
	$uid = substr($student['Student']['fName'], 0, 1).substr($student['Student']['lName'], 0, 1);
	if (strlen($student['Student']['collegeid']) < 8)
		$uid = $uid.substr($student['Student']['collegeid'], 0, 2);
	else
		$uid = $uid.substr($student['Student']['collegeid'], 2, 2);
	$uid = $uid.'U';
	$uid = $uid.$student['Student']['department_id'];
	
	echo strtolower($uid).'|'.$student['Student']['password'].'|';
	echo $student['Student']['fName'].' '.$student['Student']['lName'].'|';
	echo strtolower($uid).'@mnit.ac.in'.'|';
	echo $student['Student']['email'].'|';
	echo strtolower($student['Student']['department_id']);
	echo "<br>";
}

?>
