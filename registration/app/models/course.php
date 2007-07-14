<?php
class Course extends AppModel {
	var $name='Course';
	
	var $cid;
	var $cname;
	var $department_id;
	var $semester;
	var $credits;
	var $requiresLab;
	var $requiresTutorial;
	var $requiresPresentation;
	var $area;
		
	var $validate=array();

	var $belongsTo = array('Department' =>
						array(	'className' => 'Department',
							)
					);
	
}
?>
