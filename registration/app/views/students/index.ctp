<?php

echo "<h1>$titleMessage</h1>";

echo $form->create('Student', array('action' => 'check'));
echo $form->input('Student.sid', array('label' => $instructions));
echo $form->submit();
echo $form->end();
echo "</form>";

?>
