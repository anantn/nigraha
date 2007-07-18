<?php

echo "<h1>Students Registered: $nReg</h1>";
echo "<h1>Students Paid: $nFee</h1>";

if ($error)
	echo '<span class="notice">Your credentials could not be validated</span>';

if ($AdminViewLogged) {

} else {
	echo "<h2>Login for reports:</h2>";
	echo $form->create('Student', array('action' => 'view'));
	echo '<fieldset>';
	echo $form->input('password', array('label' => 'Access Password', 'type' => 'password'));
	echo '</fieldset>';
	echo $form->end('Submit');
}

?>
