<script type="text/javascript">
	function showBox()
	{
		if (document.getElementById("csv").style.visibility == 'hidden') 
			document.getElementById("csv").style.visibility = 'visible';
		else
			document.getElementById("csv").style.visibility = 'hidden';
	}
</script>

<?php

if ($ListGenerated) {
	echo "<h1>MNIT Student Lists 2007-08</h1>";
	if (isset($semester))
		echo "<h2>Semester: $semester</h2>";
	if (isset($department))
		echo "<h2>Department: $department</h2>";
	if (isset($course))
		echo "<h2>".$course[0].": ".$course[1][0]."</h2>";

	$csv = '';
	echo '<table border="1">';
	echo '<tr><td><b>College ID</b></td><td><b>Name</b></td></tr>';
	foreach ($list as $id => $name) {
		echo "<td>$id</td><td>$name</td></tr>";
		$csv .= "$id,$name\n";
	}
	echo '</table>';
	echo '<a name="csv"><p><a href="./">Back</a> | <a href="#csv" onClick="showBox();">Show/Hide CSV</a></p></a>';
	echo '<p><textarea id="csv" style="visibility: hidden" rows="5">'.$csv.'</textarea></p>';
} else {
	echo "<h1>Students Registered: $nReg</h1>";
	echo "<h1>Students Paid: $nFee</h1>";

	echo "<h2>Student Lists</h2>";
	echo $form->create('Student', array('action' => 'view'));
	echo '<fieldset>';
	echo $form->input('deptid', array('label' => 'Department', 'options' => $deptList, 'type' => 'select', 'selected' => 'NULL'));
	echo $form->input('semester', array('label' => 'Semester', 'options' => $semester, 'type' => 'select', 'selected' => 'NULL'));

	if (isset($invalidCourse) and $invalidCourse)
		echo '<span class="notice">An invalid course ID was entered</span>';

	echo $form->input('course_id', array('label' => 'Course ID'));
	echo '</fieldset>';
	echo $form->end('Submit');	
}

?>
