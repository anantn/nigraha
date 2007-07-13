<?php
class Parent extends AppModel {
	var $name='Parent';
	
	var $fName;
	var $lName;
	var $relationship;
	var $pAddress;
	var $email;
	var $phone;
	var $occupation;
		
	var $validate=array(     
		'fName' => VALID_NOT_EMPTY,
		'lName' => VALID_NOT_EMPTY,
		'pAddress' => VALID_NOT_EMPTY,
		'email' => VALID_EMAIL,
		'phone' => VALID_NUMBER
				);
/*	var $belongsTo = array('Student' =>
							array('className' => 'Student',
								'conditions' => '',
								'order' => '',
								'foreignKey' => 'studentid'
								)
							);  */
}
?>