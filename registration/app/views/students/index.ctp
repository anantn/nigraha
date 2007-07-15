<?php

echo $form->create('Student', array('action' => 'update'));
echo '<span class="notice">'.$instructions.'</span>';
echo "<fieldset>";
echo $form->input('Student.collegeid', array('label' => false));
echo '</fieldset>';
echo $form->end('Submit');

?>
