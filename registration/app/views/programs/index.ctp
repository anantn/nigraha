<?php

if ($error) {
	echo '<span class="notice">The credentials were invalid, please try again!</span>';
}

if ($showMenu) {

	echo '<h2>Add a Program</h2>';
	echo $form->create('Program', array('action' => 'addProg'));
	echo '<fieldset>';
	echo $form->input('degree', array('label' => 'Degree', 'type' => 'select', 'options' => $degree));
	echo $form->input('department_id', array('label' => 'Department', 'type' => 'select', 'options' => $deptList));
	echo $form->input('name', array('label' => 'Program Name'));
	echo $form->end('Submit');
	echo '</fieldset>';
	
	echo '<h2>Delete a Program</h2>';
	echo $form->create('Program', array('action' => 'delProg'));
	echo '<fieldset>';
	echo $form->input('degree', array('label' => 'Degree', 'type' => 'select', 'options' => $degree));
	echo $form->input('department_id', array('label' => 'Department', 'type' => 'select', 'options' => $deptList));
	echo $form->input('name', array('label' => 'Program Name', 'type' => 'select', 'options' => $progList));
	echo $form->end('Submit');
	echo '</fieldset>';

} else {

	echo $form->create('Program', array('action' => 'index'));
	echo '<fieldset>';
	echo $form->input('password', array('label' => 'Access Password', 'type' => 'password'));
	echo '</fieldset>';
	echo $form->end('Submit');

}

?>
