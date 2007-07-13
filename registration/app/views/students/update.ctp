<?php

echo '<h2>Registration Form</h2>';

echo $form->create('Student', array('action' => 'update'));

echo '<fieldset>';

foreach ($fields as $field) {
	if (isset($field['values']))
		echo $form->input('Student.'.$field['name'], array('label' => $field['label'], 'type' => $field['type'], 'options' => $field['values'], 'error' => $field['error']));
	else
		echo $form->input('Student.'.$field['name'], array('label' => $field['label'], 'type' => $field['type'], 'error' => $field['error']));
}

echo '</fieldset>';
echo '<div class="submit">'.$form->end('Submit').'</div>';

?>
