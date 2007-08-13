<?php

if ($error) {
	echo '<span class="notice">The credentials were invalid, please try again!</span>';
}

if ($showMenu) {

	echo '<p>&nbsp;</p><p><a href="../logout">Logout</a></p>';

	echo '<h2>Add a Course</h2>';
	echo $form->create('Course', array('action' => 'add'));
	echo '<fieldset>';
	echo $form->input('course_id', array('label' => 'Course ID'));
	echo $form->input('name', array('label' => 'Course Name'));
	echo $form->input('degree', array('label' => 'Degree', 'type' => 'select', 'options' => $degree));
	echo $form->input('department_id', array('label' => 'Department', 'type' => 'select', 'options' => $deptList));
	echo $form->input('program_id', array('label' => 'Program - For non-BTech', 'type' => 'select', 'options' => $progList));
	echo $form->input('semester', array('label' => 'Semester'));
	echo $form->input('credits', array('label' => 'Credits'));
	echo $form->input('requiresLab', array('label' => 'Requires Lab?', 'type' => 'checkbox'));
	echo $form->input('requiresTutorial', array('label' => 'Requires Tutorial?', 'type' => 'checkbox'));
	echo $form->input('requiresPresentation', array('label' => 'Requires Presentation?', 'type' => 'checkbox'));
	echo $form->input('area', array('label' => 'Subject Area', 'type' => 'select', 'options' => $areas));
	echo $form->end('Submit');
	echo '</fieldset>';

	echo '<h2>Delete a Course</h2>';
	echo $form->create('Course', array('action' => 'del'));
	echo '<fieldset>';
	echo $form->input('course_id', array('label' => 'Course ID'));
	echo $form->end('Submit');
	echo '</fieldset>';

	echo '<h2>Modify a Course</h2>';
	echo $form->create('Course', array('action' => 'mod'));
	echo '<fieldset>';
	echo $form->input('course_id', array('label' => 'Course ID'));
	echo $form->end('Submit');
	echo '</fieldset>';

	echo '<h2>Add a Program</h2>';
	echo $form->create('Course', array('action' => 'addProg'));
	echo '<fieldset>';
	echo $form->input('degree', array('label' => 'Degree', 'type' => 'select', 'options' => $degree));
	echo $form->input('department_id', array('label' => 'Department', 'type' => 'select', 'options' => $deptList));
	echo $form->input('name', array('label' => 'Program Name'));
	echo $form->end('Submit');
	echo '</fieldset>';
	
	echo '<h2>Delete a Program</h2>';
	echo $form->create('Course', array('action' => 'delProg'));
	echo '<fieldset>';
	echo $form->input('degree', array('label' => 'Degree', 'type' => 'select', 'options' => $degree));
	echo $form->input('department_id', array('label' => 'Department', 'type' => 'select', 'options' => $deptList));
	echo $form->input('name', array('label' => 'Program Name', 'type' => 'select', 'options' => $progList));
	echo $form->end('Submit');
	echo '</fieldset>';
	
} else {

	echo $form->create('Course', array('action' => 'index'));
	echo '<fieldset>';
	echo $form->input('password', array('label' => 'Access Password', 'type' => 'password'));
	echo '</fieldset>';
	echo $form->end('Submit');

}

?>
