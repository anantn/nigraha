<?php
class Student extends AppModel {
	var $name='Student';

	var $collegeid;
	var $fName;
	var $lName;
	var $dob;
	var $gender;
	var $marital;
	var $bloodGroup;
	var $category;
	var $nationality;
	var $pAddress;
	var $email;
	var $deptid;
	var $sem;
	var $batch;
	var $fatherName;
	var $motherName;
	var $parentAddress;
	var $parentPhone;
	var $fatherOccupation;
	var $motherOccupation;
	var $lgName;
	var $lgAddress;
	var $lgPhone;
	var $lgOccupation;
		
	var $validate=array(     
		'sid' => '/^0\d{5,6}$/',
		'fName' => '/^[a-zA-Z\ ]{,10}$/',
		'lName' => '/^[a-zA-Z\ ]{,10}$/',
		'dob' => '/^(0[1-9]|[1-2][0-9]|3[0-1])(0[1-9]|1[0-2])(198[0-9]|199[0-5])$/',
		'gender' => VALID_NOT_EMPTY,
		'marital' => VALID_NOT_EMPTY,
		'category' => VALID_NOT_EMPTY,
		'nationality' => VALID_NOT_EMPTY,
		'pAddress' => VALID_NOT_EMPTY,
		'email' => VALID_EMAIL,
		'sem' => VALID_NOT_EMPTY,
		'fatherName' => '/^[a-zA-Z\ ]{,10}$/',
		'parentPhone' => VALID_NUMBER
						);

	var $hasOne = array('Account' =>
						array('className' => 'Account',
							'conditions' => '',
							'order' => '',
							'dependant' => true,
							'foreignKey' => 'collegeid'
							)
						);
								
/*	var $hasMany = array('Guardian' =>
						array('className' => 'Guardian',
							'conditions' => '',
							'order' => '',
							'dependant' => true,
							'foreignKey' => 'collegeid'
							),
						'Course' =>
						array('className' => 'Course',
							'conditions' => '',
							'order' => '',
							'dependant' => false,
							)
						);
	*/						
	var $belongsTo = array('Department' =>
							array('className' => 'Department',
								'conditions' => '',
								'order' => '',
								'foreignKey' => 'deptid'
								)
							);
/*	var $hasAndBelongsToMany = array('Course' =>
							array('className' => 'Course',
								'joinTable' = > 'courses_students',
								'conditions' => 'Course.available = 1',
								'order' => '',
								'foreignKey' => 'sid',
								'associationForeignKey' => 'cid',
								'unique' => true,
								'finderQuery' => '',
								'deleteQuery' => '',
								)
							); */
}
?>
