<?php

class CoursesController extends AppController
{
	var $name = 'Courses';

	function fetch($sem)
	{
		$test = array('CP-202', 'CP-204', 'CP-206');
		$this->set('info', serialize($test));
	}

	function info($cid)
	{
		$test = array('Computer Architecture', $cid);
		$this->set('info', $test);
		$this->layoutPath = 'rest';
	}
}
