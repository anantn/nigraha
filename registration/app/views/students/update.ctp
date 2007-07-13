<?php

echo '<h1>Registration Form</h1>';
echo '<h3>All fields are mandatory!</h3>';

echo $form->create('Student', array('action' => 'update'));
echo '<table border="1">';

foreach ($fields as $field) {
	switch ($field['type']) {
		case 'input':
			echo '<tr><td>'.$field['label'].'</td><td>';
			echo $form->input('Student.'.$field['name'], array('label' => false, 'error' => $field['error']));
			echo '</td></tr>';
			break;
		case 'textarea':
			echo '<tr><td>'.$field['label'].'</td><td>';
			echo $form->textarea('Student.'.$field['name']);
			echo '</td></tr>';
			break;
		case 'dropdown':
			echo '<tr><td>'.$field['label'].'</td><td>';
			echo $form->select('Student.'.$field['name'], $field['values']);
			echo '</td></tr>';
			break;
	}
}

echo '</table>'; 
echo '<div align="center">'.$form->submit().'</div>';

?>
