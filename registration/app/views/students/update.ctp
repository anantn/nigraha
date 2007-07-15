<?php

function getvalue($record)
{
	if (isset($record['value']))
		return $record['value'];
	else
		return NULL;
}

function isDisabled($record)
{
	if (isset($record['disabled']))
		return $record['disabled'];
	else
		return false;
}

function printFields($set, $form)
{
	echo '<fieldset>';
	foreach ($set as $field) {
		if (isset($field['values']))
			echo $form->input('Student.'.$field['name'], array('label' => $field['label'], 'type' => $field['type'], 'options' => $field['values'], 'error' => $field['error'], 'disabled' => isDisabled($field)));
		else
			echo $form->input('Student.'.$field['name'], array('label' => $field['label'], 'type' => $field['type'], 'error' => $field['error'], 'value' => getValue($field), 'disabled' => isDisabled($field)));
	}
	echo '</fieldset>';
}

if (isset($courseLayout)) {

	echo $courseLayout;

} else {

echo '<h2>Registration: Step 1</h2>';

echo $form->create('Student', array('action' => 'update'));
printFields($mFields, $form);
printFields($aFields, $form);
printFields($eFields, $form);
printFields($gFields, $form);
echo $form->end('Submit');

}

?>
