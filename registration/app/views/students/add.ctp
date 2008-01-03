<?php

switch ($which) {
	case 0: break;
	case 1: echo '<span class="notice">ERROR: Invalid Service Password</span>';
			break;
	case 2: echo '<span class="notice">ERROR: This student has already registered last semester</span>';
			break;
	case 3: echo '<span class="notice">SUCCESS: The student may proceed with online registration as normal</span>';
			echo '<span class="notice">Next ID to be entered below</span>';
			break;
}

echo $form->create('Student', array('action' => 'add'));
echo '<fieldset>';
echo $form->input('collegeid', array('label' => 'Student ID'));
echo $form->input('password', array('label' => 'Service Password'));
echo '</fieldset>';
echo $form->end('Submit');

?>