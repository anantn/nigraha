<?php
include 'config.php';
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html;">
<title>Room Allocation Processing</title>
</head>

<body>
<?php
function CheckId($id)
{
	GLOBAL $hostname, $username, $password, $database;
	$conn = mysql_connect($hostname, $username, $password) or die(mysql_error());
	//echo $database."\n";
	mysql_select_db($database) 
		or die("Database don't exist  ".mysql_error());
	$sql = "Select * From studentroom Where StudentID = ".$id;
	//echo $sql."<br>";
	$result = mysql_query($sql) 
			or die("Query Error :$sql<br>".mysql_error());
	if (mysql_affected_rows() != 0)
	{
        echo mysql_affected_rows();
        mysql_close();
		return 1;
	}
	else
	{	
		mysql_close();
		return 0;
	}
}

function RandomAlloc($id)
{
	GLOBAL $hostname, $username, $password, $database;
	
	$hostelid = $_POST['HostelNo'];
	$type = $_POST['type'];
	
	$conn = mysql_connect($hostname, $username, $password) or die(mysql_error());
	mysql_select_db($database) 
		or die("Database don't exist ".mysql_error());
	$sql = "Select RoomKeyID From tblroomkey Where Occupied = 0 AND HostelID =".$hostelid." And Type =".$type;
	echo $sql;
	$result = mysql_query($sql) or
			die("Invalid Query: ".$mysql_error());
	//echo "\n<br>$mysql_num_rows($result)";
	$rowcount = mysql_num_rows($result);
	if ($rowcount <= 0)
	{
		echo "Error: Not enough room in the hostel";
		return -1;
	}
	
	//randomize random no. seed
	srand(microtime()+100000);
	$rand = rand(1, $rowcount); //insert call to rnd here;
	if ($rand > $rowcount) $rand = $rowcount;
	$count = 0;
	while ($row = mysql_fetch_array($result))
	{
		$count = $count + 1;
		if ($count == $rand)
		{
			$roomkeyid = $row['RoomKeyID'];
			break;
		}
	}
	
	//Set Occupied = True for that Room in the Database
	$sql = "Update tblroomkey Set Occupied=1 Where RoomKeyID=$roomkeyid";
	
	$result = mysql_query($sql) or
			die("Invalid Query: $sql");
	
	//Set StudentRoom Database that room is allocated to that user
	$sql = "Insert Into studentroom (StudentID, RoomKeyID) Values (".$id.",".$roomkeyid.")";
	$result = mysql_query($sql) or
			die("Invalid Query: ".$mysql_error());
	//close the connection now
	mysql_close();
	return $roomkeyid;
}

function AddRoom($id, $room)
{
	GLOBAL $hostname, $username, $password, $database;
	
	$hostelid = $_POST['HostelNo'];
	$type = $_POST['type'];
	
	$conn = mysql_connect($hostname, $username, $password) or die(mysql_error());
	mysql_select_db($database) 
		or die("Database don't exist ".mysql_error());
	
	$sql = "Update tblroomkey Set Occupied=1 Where RoomKeyID =".$room;
	$result = mysql_query($sql) or
			die("Update Query Failed: ".$mysql_error());
	
	// // // // //
	$sql = "Insert Into studentroom (StudentID, RoomKeyID) Values ('".$id."','".$room."')";
	//echo "<br>$sql";
	$result = mysql_query($sql) or
			die("Insert Into StudentRoom Query Failed in AddRoom:$sql<br>".mysql_error());
	
	mysql_close();
	//echo "Room Added";
}

?>
  
<?php
//database includes
//	include ('config.inc');

$type = $_POST['type'];
$id[0] = $_POST['StudentID1'];
$id[1] = $_POST['StudentID2'];
$id[2] = $_POST['StudentID3'];
// get student ID not student college ID!!
// error corrected on "27/10/05"
mysql_connect($hostname, $username, $password) or die('Error connecting to database');
mysql_select_db($dbname) or die('Database connectivity error');
$sql = "SELeCT * FROM tblstudents WHERE StudentID = '$id[0]'";
//echo $sql;
$ret = mysql_query("$sql") or die("Error in $sql");
$row = mysql_fetch_array($ret);
$id[0] = $row[0];
//print_r ("$row".mysql_affected_rows());

/*
print ($type."<br>");
print_r($id);
echo "<br>";
print_r($_POST);
echo "<br>";
echo "<br>";

*/
//die();

$err = 0;
if ($id[0] == ""){
	//echo "Invalid Student ID";
	$err = 1;
	echo "Please select atleast one user id.";
	exit();
}
if ($type == 2)  {
  if ($id[1]==''){
	echo "You selected Double room but typed only one Student ID.";
	exit();}
  else {
    $sql = "SELeCT * FROM tblstudents WHERE StudentID = $id[1]";
    $ret = mysql_query("$sql") or die("Error in $sql");
    $row = mysql_fetch_array($ret);
    $id[1] = $row["ID"];
  }
 }
else if ($type == 3)
{
	if ($id[2] == ""){
        $err = 1;
	   echo "You selected triple type room but typed unsfficient user ids";
	   exit();
	}
	else{
    $sql = "SELeCT * FROM tblstudents WHERE StudentID = $id[2]";
    $ret = mysql_query("$sql") or die("Error in $sql");
    $row = mysql_fetch_array($ret);
    $id[2] = $row["ID"];
 }
}
if (CheckID($id[0]) == 1) {
	die ("ID already exist in the database");
}
else {
    //echo "ID don't exist in database";
    
	$roomalloc = RandomAlloc($id[0]);
	if ($roomalloc != -1){
		print ("<br>Room successfully allocated. Room Allocated to $id[0] is $roomalloc<br>To improve later.");
	}
	else{
		$err = 1;
	}
}
if ($type == 2 and $id[1] != '') {
  if (CheckID($id[1])!=1){
     echo "Going to Addroom with $id[1] and $roomalloc";
 	 AddRoom($id[1], $roomalloc);
	}
  else {
    echo "Second user is already allocated a room!";
  }
}
if ($type == 2) {
  if ($id[2]!=''){
  if (CheckID($id[2])!=1){
     echo "Going to Addroom with $id[2] and $roomalloc";
 	 AddRoom($id[1], $roomalloc);
	}
  else {
    echo "Third user is already allocated a room!";
  }
  }
}
echo "<b>Processing Successful.</b> Press <a href='javascript:history.go(-1)'>back</a> to add more rooms.";
?>
</body>
</html>
