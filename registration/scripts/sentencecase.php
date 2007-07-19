<?php
function sentenceCase($s){
   $str = strtolower($s);
   $cap = true;
   
   for($x = 0; $x < strlen($str); $x++){
       $letter = substr($str, $x, 1);
       if($letter == "." || $letter == "!" || $letter == "?"){
           $cap = true;
       }elseif($letter != " " && $cap == true){
           $letter = strtoupper($letter);
           $cap = false;
       }
       
       $ret .= $letter;
   }
   
   return $ret;
}

$con = mysql_connect('localhost', 'root', 'princeofpersia') or die(mysql_error());
mysql_select_db('cake');
$query = 'SELECT * FROM student';
$result = mysql_query($query);
while($entry = mysql_fetch_assoc($result)) {
	echo $entry['fName']." ".$entry['lName']." --> ".sentenceCase($entry['fName'])." ".sentenceCase($entry['lName']);
	$query1 = "UPDATE student SET fName = '".sentenceCase($entry['fName'])."' WHERE fName = '".$entry['fName']."'"; 
	$query2 = "UPDATE student SET lName = '".sentenceCase($entry['lName'])."' WHERE lName = '".$entry['lName']."'";
	mysql_query($query1) or die(mysql_error());
	mysql_query($query2) or die(mysql_error());
	if(strlen($entry['collegeid'])==5) {
		$query3 = "UPDATE student SET collegeid = '0".$entry['collegeid']."' WHERE collegeid = '".$entry['collegeid']."'";
		mysql_query($query3) or die(mysql_error());
		echo $entry['collegeid']." --> 0".$entry['collegeid'];
	} else if(strlen($entry['collegeid'])==6 AND substr($entry['collegeid'],0,1)!='0') {
		$query3 = "UPDATE student SET collegeid = '0".$entry['collegeid']."' WHERE collegeid = '".$entry['collegeid']."'";
		mysql_query($query3) or die(mysql_error());
		echo $entry['collegeid']." --> 0".$entry['collegeid'];
	}
}
?>