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

		if (isDisabled($field))
			echo $form->hidden('Student.'.$field['name']);
	}
	echo '</fieldset>';
}

if (isset($courseLayout)) {

	echo $courseLayout;

} else {

echo '<h2>Registration: Step 1</h2>';
echo '<p>Please enter your personal details as asked below. Be careful while filling the form, and DO NOT press the ENTER key or click the submit button until you have verified all your entries. The fields in <b>BOLD</b> font are compulsory. In case you make a mistake and realize it <i>after</i> pressing ENTER or clicking the Submit button, please DO NOT use the browser\'s back button for corrections and call for assistance instead.</p>';

echo $form->create('Student', array('action' => 'update'));
printFields($mFields, $form);
printFields($aFields, $form);
printFields($eFields, $form);
printFields($gFields, $form);
echo $form->end('Submit');

}

?>
