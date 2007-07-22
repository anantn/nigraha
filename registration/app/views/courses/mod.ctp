<?php

echo '<h2>Modify Course</h2>';
echo $form->create('Course', array('action' => 'mod'));
echo '<fieldset>';
echo $form->hidden('id');
echo $form->input('course_id', array('label' => 'Course ID'));
echo $form->input('name', array('label' => 'Course Name'));
echo $form->input('department_id', array('label' => 'Department', 'type' => 'select', 'options' => $deptList));
echo $form->input('semester', array('label' => 'Semester'));
echo $form->input('credits', array('label' => 'Credits'));
echo $form->input('requiresLab', array('label' => 'Requires Lab?', 'type' => 'checkbox'));
echo $form->input('requiresTutorial', array('label' => 'Requires Tutorial?', 'type' => 'checkbox'));
echo $form->input('requiresPresentation', array('label' => 'Requires Presentation?', 'type' => 'checkbox'));
echo $form->input('area', array('label' => 'Subject Area', 'type' => 'select', 'options' => $areas));
echo $form->end('Submit');
echo '</fieldset>';

?>
