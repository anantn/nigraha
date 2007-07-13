<?php
class Parent extends AppModel {
	var $name='Parent';
	
	var $fName;
	var $lName;
	var $relationship;
	var $pAddress;
	var $email;
	var $phone;
		
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