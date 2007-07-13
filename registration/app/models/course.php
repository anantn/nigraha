<?php
class Course extends AppModel {
	var $name='Course';
	
	var $course_id;
	var $course_name;
	var $semester;
	var $credits;
	var $requires_lab;
	var $requires_tutorial;
	var $requires_presentation;
	var $primaryKey='course_id';
		
	var $validate=array();

	var $belongsTo = array('Department' =>
							array('className' => 'Department',
								'conditions' => '',
								'order' => '',
								'foreignKey' => 'course_id'
								)
							);
	
	var $hasMany=array('Student' =>
						array('className' => 'Student',
							'conditions'    => '',
                            'order'         => '',
                            'limit'         => '',
                            'foreignKey'    => 'course_id',
                            'dependent'     => false,
                            'exclusive'     => false,
                            'finderQuery'   => ''
                         )
                  );
}
?>