<?php
class Student extends AppModel {
	var $name='Student';

	var $sid;
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
	var $dept;
	var $sem;
	var $batch;
	var $primaryKey='sid';
		
	var $validate=array(     
		'sid' => '/^0\d{5,6}$/'
		'fName' => '/^[a-zA-Z\ ]{,10}$/',
		'lName' => '/^[a-zA-Z\ ]{,10}$/',
		'dob' => '/^(0[1-9]|[1-2][0-9]|3[0-1])(0[1-9]|1[0-2])(198[0-9]|199[0-5])$/',
		'gender' => VALID_NOT_EMPTY,
		'marital' => VALID_NOT_EMPTY,
		'category' => VALID_NOT_EMPTY,
		'nationality' => VALID_NOT_EMPTY,
		'pAddress' => VALID_NOT_EMPTY,
		'email' => VALID_EMAIL,
		'dept' => VALID_NOT_EMPTY,
		'sem' => VALID_NOT_EMPTY,
						);

/*	var $hasOne = array('Account' =>
						array('className' => 'Account',
							'conditions' => '',
							'order' => '',
							'dependant' = true,
							'foreignKey' = 'studentid'
							)
						);
								
	var $hasOne = array('Parent' =>
						array('className' => 'Parent',
							'conditions' => '',
							'order' => '',
							'dependant' = true,
							'foreignKey' = 'studentid'
							)
						);
							
	var $belongsTo = array('Department' =>
							array('className' => 'Department',
								'conditions' => '',
								'order' => '',
								'foreignKey' => 'deptName'
								)
							);
	var $hasAndBelongsToMany = array('Course' =>
							array('className' => 'Course',
								'joinTable' = > 'courses_students',
								'conditions' => 'Course.available = 1',
								'order' => '',
								'foreignKey' => 'studentid',
								'associationForeignKey' => 'courseid',
								'unique' => true,
								'finderQuery' => '',
								'deleteQuery' => '',
								)
							); */
}
?>
