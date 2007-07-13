<?php
class Account extends AppModel {
	var $name='Account';
	
	var $username;
	var $student_id;
	var $user_privilege;
	var $primaryKey='username';
		
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