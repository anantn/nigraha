<?php

class CoursesController extends AppController
{
	var $name = 'Courses';
	
	function fetch($sem)
	{
		$conditions=array("Course.semester" => "7", "Course.area" => "DC");
		$tmp = $this->Course->findAll($conditions, array('course_id'));
		$cinfo = array();
		foreach ($tmp as $t) {
			$cinfo[] = $t['Course']['course_id'];	
		}
		$this->set('info', serialize($cinfo));
	}

	function info($cid)
	{
		$test = array('Computer Architecture', $cid);
		$this->set('info', $test);
		$this->layoutPath = 'rest';
	}
}
