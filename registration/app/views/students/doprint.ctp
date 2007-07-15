<?php

echo "<h3>Personal Information</h3>";
echo "<table>";
foreach ($sInfo as $k=>$v) {
	echo "<tr><td width=\"20%\">$k</td><td>$v</td></tr>";
		
}
echo "</table>";

echo "<h3>Courses Registered</h3>";
echo "<table>";
echo "<tr><td width=\"20%\"><b>Course Code</b></td><td><b>Course Name<b></td><td><b>Credits</b></td></tr>";
foreach ($cInfo as $k=>$v) {
	echo "<tr><td>$k</td><td>$v[0]</td><td>$v[1]</td></tr>";
}
echo "</table>";

echo "<p>&nbsp;</p><p>I hereby declare that the above information is correct to the best of my knowledge</p><p>&nbsp;</p>";
echo "<br /><br /><br />";
echo "Signature of Student";
echo "<br />".date('l\, d F Y\. H:i')."</p>";

?>
