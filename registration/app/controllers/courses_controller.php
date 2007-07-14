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
		$condtions=array("Course.course_id" => $cid);
		$feilds = array("name");
		$tmp = $this->Course->findAll($conditions, $feilds);
		//$test = array('Computer Architecture', $cid);
		$this->set('info', serialize($tmp));
	}
}
