<?php

class CoursesController extends AppController
{
	var $name = 'Courses';
	var $components = array('RequestHandler');
	var $beforeFilter = array('setContent');

	function setContent() {
		$this->RequestHandler->setContent('json', 'text/x-json');
	}
	
	function fetch()
	{
		$test = array('CP-202');
		$this->set('info', $test);
	}

	function getInfo($cid)
	{
		$test = array('Computer Architecture', $cid);
		$this->set('info', $test);
		$this->layoutPath = 'rest';
	}
}
