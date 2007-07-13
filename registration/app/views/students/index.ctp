<?php

echo "<h1>Welcome!</h1>";

echo $form->create('Student', array('action' => 'update'));
echo $form->input('Student.sid', array('label' => $instructions));
echo $form->submit();
echo $form->end();
echo "</form>";

?>
