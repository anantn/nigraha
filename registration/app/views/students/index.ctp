<?php

echo $form->create('Student', array('action' => 'account'));
echo '<span class="notice">'.$instructions.'</span>';
echo "<fieldset>";
echo $form->input('Student.collegeid', array('label' => false));
if(isset($stdFormLock) and $stdFormLock == TRUE)
	echo $form->input('password', array('label' => "This form is now locked for students. Enter Service password:"));
echo '</fieldset>';
echo $form->end('Submit');

?>
