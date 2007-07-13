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
	var $dept;
	var $sem;
	var $batch;
	var $primaryKey='sid';
		
	var $validate=array(     
		'userid' => '/[a-z0-9\_\-\.]{3,}$/',
		'fName' => VALID_NOT_EMPTY,
		'lName' => VALID_NOT_EMPTY,
		'pAddress' => VALID_NOT_EMPTY,
		'email' => VALID_EMAIL,
		'collegeid' => '/^0\d{5,6}$/'
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
