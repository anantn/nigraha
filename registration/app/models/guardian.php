<?php
class Guardian extends AppModel {
	var $name='Guardian';
	
	var $fName;
	var $lName;
	var $sid;
	var $relationship;
	var $pAddress;
	var $email;
	var $phone;
	var $occupation;
		
	var $validate=array(     
		'fName' => VALID_NOT_EMPTY,
		'lName' => VALID_NOT_EMPTY,
		'sid' => '/^0\d{5,6}$/',
		'pAddress' => VALID_NOT_EMPTY,
		'email' => VALID_EMAIL,
		'phone' => VALID_NUMBER
				);
	var $belongsTo = array('Student' =>
							array('className' => 'Student',
								'conditions' => '',
								'order' => '',
								'foreignKey' => 'collegeid'
								)
							); 
}
?>