<?php
class Parent extends AppModel {
	var $name='Parent';
	
	var $first_name;
	var $last_name;
	var $relationship;
	var $p_address;
	var $email_id;
	var $work_phone;
		
	var $validate=array();

	var $belongsTo = array('Student' =>
							array('className' => 'Student',
								'conditions' => '',
								'order' => '',
								'foreignKey' => 'student_id'
								)
							);
}
?>