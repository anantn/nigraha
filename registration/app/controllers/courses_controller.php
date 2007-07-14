<?php

class CoursesController extends AppController
{
	var $name = 'Courses';
	
	function fetch($sem)
	{
		$conditions=array("Course.semester" => $sem, "Course.area" => "DC");
		$tmp = $this->Course->findAll($conditions, array('course_id'));
		$cinfo = array();
		foreach ($tmp as $t) {
			$cinfo[] = $t['Course']['course_id'];	
		}
		$this->set('info', serialize($cinfo));
	}

	function info($cid)
	{
		$conditions=array("Course.course_id" => $cid);
		$fields = array('name', 'credits');
		$tmp = $this->Course->find($conditions, $fields);
		$this->set('info', array($tmp['Course']['name'], $tmp['Course']['credits']));
	}
}
