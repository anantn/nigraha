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
	var $pAddress1;
	var $pAddress2;
	var $pCity;
	var $pState;
	var $email;
	var $department_id;
	var $semester;
	var $batch;
	var $fatherName;
	var $motherName;
	var $parentPhone;
	var $fatherOccupation;
	var $motherOccupation;
	var $lgName;
	var $lgAddress;
	var $lgPhone;
	var $password;
		
	var $validate=array(     
		'collegeid' => VALID_NOT_EMPTY,
		'fName' => '/^[a-zA-Z\ \.]+$/',
		'lName' => '/^[a-zA-Z\ \.]+$/',
		'dob' => '/^(0[1-9]|[1-2][0-9]|3[0-1])(0[1-9]|1[0-2])(198[0-9]|199[0-5])$/',
		'gender' => VALID_NOT_EMPTY,
		'marital' => VALID_NOT_EMPTY,
		'category' => VALID_NOT_EMPTY,
		'nationality' => VALID_NOT_EMPTY,
		'pAddress1' => VALID_NOT_EMPTY,
		'pAddress2' => VALID_NOT_EMPTY,
		'pCity' => VALID_NOT_EMPTY,
		'pState' => VALID_NOT_EMPTY,
		'email' => VALID_EMAIL,
		'semester' => '/^(1|3|5|7|9)$/',
		'fatherName' => '/^[a-zA-Z\ \.]+$/',
		'parentPhone' => '/\(?\d{2,5}[) -]?\s?\d{5,8}$/',
		'password' => VALID_NOT_EMPTY
	);

	/*
	var $hasOne = array('Account' =>
						array('className' => 'Account',
							'conditions' => '',
							'order' => '',
							'dependant' => true,
							'foreignKey' => 'collegeid'
							)
						);
								
	var $belongsTo = array('Department' =>
							array('className' => 'Department',
								'conditions' => '',
								'order' => '',
								'foreignKey' => 'department_id'
								)
							);
	var $hasAndBelongsToMany = array('Course' =>
							array('className' => 'Course',
								'joinTable' => 'courses_students',
								'order' => '',
								'foreignKey' => 'collegeid',
								'associationForeignKey' => 'course_id',
								'unique' => true,
								'finderQuery' => '',
								'deleteQuery' => '',
								)
							); 
	 */
}
?>
