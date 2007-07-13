<?php
class Account extends AppModel {
	var $name='Account';
	
	var $username;
	var $studentid;
	var $privilege;
	var $primaryKey='username';
		
	var $validate=array('username' => '/^[a-z0-9\_\-\.]{3,}$/');

	var $belongsTo = array('Student' =>
							array('className' => 'Student',
								'conditions' => '',
								'order' => '',
								'foreignKey' => 'studentid'
								)
							);
}
?>