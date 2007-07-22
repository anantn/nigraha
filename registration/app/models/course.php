<?php
class Course extends AppModel {
	var $name='Course';
	
	var $course_id;
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

	function beforeSave()
	{
		if ($this->findCount(array('course_id' => $this->data['Course']['course_id'])) > 0)
			$this->del($this->data['Course']['id']);

		return true;
	}	
}
?>
