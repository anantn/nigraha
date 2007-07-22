<?php

class CoursesController extends AppController
{
	var $name = 'Courses';

	function checkSession()
	{
		if (!$this->Session->check('AdminLogged')) {
			$this->redirect('/courses');
			exit;
		}
	}

	function index()
	{
		$this->set('error', false);
		$this->set('showMenu', false);

		if (!empty($this->data)) {
			if ($this->data['Account']['password'] == '$mnit-pass$') {
				$this->Session->write('AdminLogged', true);
				$this->set('showMenu', true);
			} else {
				$this->set('error', true);
			}
		}
	}

	function logout()
	{
		$this->Session->delete('AdminLogged');
		$this->redirect('/courses');
	}

	function fetch($info)
	{
		$info = explode('-', $info);
		$sem = $info[0]; $dept = $info[1];

		$conditions=array("Course.semester" => $sem, "Course.area" => "DC", "Course.department_id" => $dept);
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
