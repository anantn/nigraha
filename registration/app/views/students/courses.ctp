<?php

echo '<h2>Registration: Step 2</h2>';

echo '<table border="0">';
echo '<tr><td><b>Course ID</b></td><td>Title</td><td>Credits</td>';

echo $form->create('Student', array('action' => 'courses'));

for ($i = 0; $i <= 10; $i++) {
	echo '<tr><td>';
	echo $form->input('Courses.cid', array('label' => false, 'type' => 'text'));
	echo '</td><td>';
	echo $form->input('Courses.cname', array('label' => false, 'type' => 'text', 'disabled' => 'true'));
	echo '</td><td>';
	echo $form->input('Courses.credits', array('label' => false, 'type' => 'text', 'disabled' => 'true'));
	echo '</td></tr>';
}
echo '</table>';

echo $form->end('Submit');

?>
