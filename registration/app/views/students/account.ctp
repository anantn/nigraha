<?php

echo '<h2>Registration: Step 1</h2>';
echo '<p>Please fill in all the payment details below. All fields are compulsory. Please take care while filling in details!<br />';
echo 'YOU ARE RESPONSIBLE FOR INCORRECT INFORMATION SUBMITTED!</p>';

echo $form->create('Student', array('action' => 'account'));
echo '<fieldset>';
foreach ($fields as $field) {
	if (isset($field['values']))
		echo $form->input('Account.'.$field['name'], array('label' => $field['label'], 'type' => $field['type'], 'options' => $field['values'], 'error' => 'Incorrect Information!'));
	elseif (isset($field['value']))
		echo $form->input('Account.'.$field['name'], array('label' => $field['label'], 'type' => $field['type'], 'value' => $field['value'], 'error' => 'Incorrect Information!'));
	else
		echo $form->input('Account.'.$field['name'], array('label' => $field['label'], 'type' => $field['type'], 'error' => 'Incorrect Information!'));
}
echo $form->input('Student.collegeid', array('type' => 'hidden', 'name' => 'collegeid', 'label' => 'Student ID', 'value' => $sid));
echo '</fieldset>';
echo $form->end('Submit');

?>
