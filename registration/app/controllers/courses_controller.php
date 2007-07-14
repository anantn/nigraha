<?php

class CoursesController extends AppController
{
	var $name = 'Courses';
	
	function fetch($sem)
	{
		$conditions=array("Course.semester" => "7", "Course.area" => "DC");
		$this->set('info', serialize($this->Course->find($conditions)));
	}

	function info($cid)
	{
		$test = array('Computer Architecture', $cid);
		$this->set('info', $test);
		$this->layoutPath = 'rest';
	}
}
