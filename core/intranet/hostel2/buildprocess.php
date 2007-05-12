<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html;">
<title>Build Room Database Processing</title>
</head>
<body>
<?php
include 'config.php';
?>
<?php
$type = $_POST['RoomType'];
$hostelid = $_POST['HostelNo'];
$noofrooms = $_POST['NoOfRooms'];
$startingroomno = $_POST['StartingRoomNo'];
if ($_POST['Occupied']=="ON") { 
	$occupied=1;
	}
else {
	$occupied=0;
}

$total = 0;
$conn = mysql_connect($hostname, $username, $password) or die(mysql_error());
//echo $conn."<br><br>".$database."**";
mysql_select_db($database) 
	or die("DB Error:".mysql_error());
//echo "<b>$noofrooms</b>";
for ($i=0;$i<$noofrooms;$i++){
	$sql = "INSERT INTO tblroomkey (Type, HostelID, Occupied, RoomNo) VALUES (".$type.",".$hostelid.",".$occupied.",".$startingroomno.")";
	//echo $sql."<br>";
	$result = mysql_query($sql) or 
			die("Invalid Query". mysql_error());
	$total++;
	$startingroomno++;
}
mysql_close();
echo "$total rooms added!";
?>
</body>
</html>
