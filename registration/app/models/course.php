<?php
class Course extends AppModel {
	var $name='Course';
	
	var $courseid;
	var $courseName;
	var $semester;
	var $credits;
	var $requiresLab;
	var $requiresTutorial;
	var $requiresPresentation;
	var $primaryKey='courseid';
		
	var $validate=array();

	var $belongsTo = array('Department' =>
							array('className' => 'Department',
								'conditions' => '',
								'order' => '',
								'foreignKey' => 'courseid'
								)
							);
	
	var $hasMany=array('Student' =>
						array('className' => 'Student',
							'conditions'    => '',
                            'order'         => '',
                            'limit'         => '',
                            'foreignKey'    => 'courseid',
                            'dependent'     => false,
                            'exclusive'     => false,
                            'finderQuery'   => ''
                         )
                  );
}
?>