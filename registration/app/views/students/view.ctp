<?php

echo "<h1>Students Registered: $nReg</h1>";
echo "<h1>Students Paid: $nFee</h1>";

if ($error)
	echo '<span class="notice">Your credentials could not be validated</span>';

if ($AdminViewLogged) {
	echo "<h2>Student List</h2>";
	echo $form->create('Student', array('action' => 'view'));
	echo '<fieldset>';
	echo $form->input('deptid', array('label' => 'Department', 'value' => $deptList));
	echo $form->input('semester', array('label' => 'Semester', 'value' => $semester));
	echo $form->input('course_id', array('label' => 'Course ID'));
	echo '</fieldset>';
	echo $form->end('Submit');	
} else if ($ListGenerated) {
	echo var_dump($list);
} else {
	echo "<h2>Login for reports:</h2>";
	echo $form->create('Student', array('action' => 'view'));
	echo '<fieldset>';
	echo $form->input('password', array('label' => 'Access Password', 'type' => 'password'));
	echo '</fieldset>';
	echo $form->end('Submit');
}

?>
