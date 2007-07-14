<?php

if (isset($courseLayout)) {

	echo $courseLayout;

} else {

echo '<h2>Registration: Step 1</h2>';

echo $form->create('Student', array('action' => 'update'));

echo '<fieldset>';
foreach ($sFields as $field) {
	if (isset($field['values']))
		echo $form->input('Student.'.$field['name'], array('label' => $field['label'], 'type' => $field['type'], 'options' => $field['values'], 'error' => $field['error']));
	else
		echo $form->input('Student.'.$field['name'], array('label' => $field['label'], 'type' => $field['type'], 'error' => $field['error']));
}
echo '</fieldset>';

echo '<fieldset>';
foreach ($gFields as $field) {
	if (isset($field['values']))
		echo $form->input('Student.'.$field['name'], array('label' => $field['label'], 'type' => $field['type'], 'options' => $field['values'], 'error' => $field['error']));
	else
		echo $form->input('Student.'.$field['name'], array('label' => $field['label'], 'type' => $field['type'], 'error' => $field['error']));
}
echo '</fieldset>';


echo '<div class="submit">'.$form->end('Submit').'</div>';

}

?>
