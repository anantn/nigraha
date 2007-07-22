<?php

class CoursesController extends AppController
{
	var $name 		= 'Courses';
	var $helpers	= array('Html', 'Javascript', 'Form');
	var $uses		= array('Course', 'Department');

	public $areas = array(
						'BS' => 'Basic Sciences',
						'ESA' => 'ESA',
						'HS' => 'Humanities',
						'DC' => 'Department Core',
						'DE' => 'Department Elective',
						'IE' => 'Institute Elective',
						'DE-I' => 'Department Elective I',
						'DE-II' => 'Department Elective II',
						'DE-III' => 'Department Elective III',
						'DE-IV' => 'Department Elective IV',
						'DE-V' => 'Department Elective V',
						'DE-VI' => 'Department Elective VI',
						'DE-VII' => 'Department Elective VII',
						'EX' => 'EX');

	function getDeptList()
	{
		$deptList = array();
		$tmp = $this->Department->findAll();
		foreach ($tmp as $t) {
			$deptList[$t['Department']['department_id']] = $t['Department']['deptName'];
		}

		return $deptList;
	}

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
			if ($this->data['Course']['password'] == '$mnit-pass$') {
				$this->Session->write('AdminLogged', true);
				$this->set('showMenu', true);
				$this->set('deptList', $this->getDeptList());
				$this->set('areas', $this->areas);
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

	function add()
	{
		if (!isset($this->data)) {
			$this->redirect('/courses');
			exit;
		}

		if ($this->Course->save($this->data)) {
			$this->flash('The course '.$this->data['Course']['course_id'].' has been added.', '/courses');	
		} else {
			$this->flash('There was an error in processing your form. Try again.', '/courses');
		}
	}

	function mod()
	{
		if (isset($this->data['Course']['course_id'])) {
			if (isset($this->data['Course']['name'])) {
				/* Second Submission */
				$this->Course->del($this->data['Course']['id']);
				if ($this->Course->save($this->data)) 
					$this->flash('Course '.$this->data['Course']['course_id'].' was successfully modified.', '/courses');	
			} else {
				/* First Submission */
				$res = $this->Course->find(array('course_id' => $this->data['Course']['course_id']));
				$this->data = $this->Course->read(NULL, $res['Course']['id']);
				$this->set('deptList', $this->getDeptList());
				$this->set('areas', $this->areas);
			}
		} else {
			$this->redirect('/courses');
		}
	}

	function del()
	{
		if (!isset($this->data)) {
			$this->redirect('/courses');
			exit;
		}

		$res = $this->Course->find(array('course_id' => $this->data['Course']['course_id']));
		if ($this->Course->del($res['Course']['id'])) {
			$this->flash('The course '.$this->data['Course']['course_id'].' has been deleted.', '/courses');	
		} else {
			$this->flash('There was an error in processing your form. Try again.', '/courses');
		}
	}
}
