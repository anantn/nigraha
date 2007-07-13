<?php



echo '<h1>Registration Form</h1>';
echo '<h3>All fields are mandatory!</h3>';

echo $form->create('Student', array('action' => 'update'));
echo '<table width="100%" border="0">';

foreach ($fields as $field) {
	switch ($field['type']) {
		case 'input':
			echo '<tr><td>'.$field['label'].'</td><td>';
			echo $form->input('Student.'.$field['name'], array('label' => false));
			echo '</td></tr>';
			break;
		case 'textarea':
			echo '<tr><td>'.$field['label'].'</td><td>';
			echo $form->textarea('Student.'.$field['name']);
			echo '</td></tr>';
			break;
	}
}

?>
