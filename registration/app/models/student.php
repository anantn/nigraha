<?php
class Student extends AppModel {
	var $name='Student';
	
	var $fName;
	var $lName;
	var $sid;
	var $userid
	var $pAddress;
	var $email;
	var $primaryKey='sid';
		
	var $validate=array(     
		'userid' => '/[a-z0-9\_\-\.]{3,}$/i',
		'fName' => VALID_NOT_EMPTY,
		'lName' => VALID_NOT_EMPTY,
		'pAddress' => VALID_NOT_EMPTY,
		'email' => VALID_EMAIL,
		'sid' => VALID_NUMBER
						);

/*	var $hasOne = array('Account' =>
						array('className' => 'Account',
							'conditions' => '',
							'order' => '',
							'dependant' = true,
							'foreignKey' = 'student_id'
							)
						);
								
	var $hasOne = array('Parent' =>
						array('className' => 'Parent',
							'conditions' => '',
							'order' => '',
							'dependant' = true,
							'foreignKey' = 'student_id'
							)
						);
							
	var $belongsTo = array('Department' =>
							array('className' => 'Department',
								'conditions' => '',
								'order' => '',
								'foreignKey' => 'department_name'
								)
							);
	var $hasAndBelongsToMany = array('Course' =>
							array('className' => 'Course',
								'joinTable' = > 'courses_students',
								'conditions' => 'Course.available = 1',
								'order' => '',
								'foreignKey' => 'student_id',
								'associationForeignKey' => 'course_id',
								'unique' => true,
								'finderQuery' => '',
								'deleteQuery' => '',
								)
							); */
}
?>