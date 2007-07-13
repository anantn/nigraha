<?php

echo $form->create('Courses', array('action' => 'update'));

echo $form->input('Student.collegeid');
echo $form->input('Student.fName');

echo $form->end('Submit');

?>
