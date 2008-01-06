<?php

function getvalue($record)
{
        if (isset($record['value']))
                return $record['value'];
        else
                return NULL;
}

function printFields($set, $form)
{
        echo '<fieldset>';
        foreach ($set as $field) {
                if (isset($field['values']))
                        echo $form->input('Student.'.$field['name'], array('label' => $field['label'], 'type' => $field['type'], 'options' => $field['values'], 'error' => $field['error']));
                else
	        	echo $form->input('Student.'.$field['name'], array('label' => $field['label'], 'type' => $field['type'], 'error' => $field['error'], 'value' => getValue($field)));
       }
       echo '</fieldset>';
}
if($which==2) {
	//var_dump($dump);
}

if($which==1) {
	echo '<h2>Update batch entry</h2>';
	echo '<b>Department: '.$dept.'</b>';
	echo $form->create('Student', array('action' => 'batch/2'));
	//printFields($feilds, $form);
	echo '<fieldset>';
	foreach($feilds as $field) {
		echo '<div class="input">';
		echo '<label for="'.$field['name'].'">'.$field['label'].'</label>';
		echo '<input name="'.$field['name'].'" type="'.$field['type'].'"';
		echo ' value="'.getValue($field).'"';
		echo ' /></div>';
	}
	echo $form->end('Submit');
} else {
	echo '<h2>Update batch entry</h2>';
	echo $form->create('Student', array('action' => 'batch/1'));
	printFields($feilds, $form);
	echo $form->end('Submit');
}
?>
