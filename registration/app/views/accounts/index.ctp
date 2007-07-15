<?php

if ($error) {
	echo '<span class="notice">The credentials were invalid, please try again!</span>';
}

echo $form->create('Account', array('action' => 'index'));
echo '<fieldset>';
echo $form->input('password', array('label' => 'Access Password', 'type' => 'password'));
echo '</fieldset>';
echo $form->end('Submit');

?>
