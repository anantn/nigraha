<?php
class Course extends AppModel {
	var $name='Course';
	
	var $cid;
	var $name;
	var $deptid;
	var $semester;
	var $credits;
	var $requiresLab;
	var $requiresTutorial;
	var $requiresPresentation;
		
	var $validate=array();

	var $belongsTo = array('Department' =>
							array('className' => 'Department')
							);
	
	var $hasMany=array('Student' =>
						array('className' => 'Student',
                            'dependent'     => false
                         )
                  );
}
?>