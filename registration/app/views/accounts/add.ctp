<?php

if (isset($done)) {
	if ($done)
		echo '<span class="notice">Account updated successfully.</span>';
	else
		echo '<span class="notice">Errors found! Please correct and resubmit!</span>';
}

echo '<h2>Account Payment Updation</h2>';
echo $form->create('Account', array('action' => 'add'));
echo '<fieldset>';
foreach ($fields as $field) {
	if (isset($field['values']))
		echo $form->input('Account.'.$field['name'], array('label' => $field['label'], 'type' => $field['type'], 'options' => $field['values'], 'error' => 'Incorrect Information!'));
	else
		echo $form->input('Account.'.$field['name'], array('label' => $field['label'], 'type' => $field['type'], 'error' => 'Incorrect Information!'));
}
echo '</fieldset>';
echo $form->end('Submit');

echo '<span class="notice">Please do not leave this page unattended! If you wish to leave your terminal, logout first.</span>';
echo $html->link('Logout', '/accounts/logout');

?>
