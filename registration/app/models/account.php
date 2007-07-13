<?php
class Account extends AppModel {
	var $name='Account';
	
	var $username;
	var $studentid;
	var $privilege;
	var $primaryKey='username';
		
	var $validate=array();

	var $belongsTo = array('Student' =>
							array('className' => 'Student',
								'conditions' => '',
								'order' => '',
								'foreignKey' => 'studentid'
								)
							);
}
?>