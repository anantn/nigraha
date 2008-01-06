<?php

class ProgramsController extends AppController
{
	var $name 		= 'Programs';
	var $uses		= array('Department', 'Program');

	public $degree = array(
						'btech' => 'B-Tech',
						'mtech' => 'M-Tech',
						'msc' => 'M.Sc.',
						'phd' => 'Ph.D');

	function getDeptList()
	{
		$deptList = array();
		$tmp = $this->Department->findAll();
		foreach ($tmp as $t) {
			$deptList[$t['Department']['department_id']] = $t['Department']['deptName'];
		}

		return $deptList;
	}
	
	function getProgList()
	{
		$progList = array();
		$tmp = $this->Program->findAll();
		foreach ($tmp as $t) {
			$progList[$t['Program']['program_id']] = $t['Program']['name'];
		}

		return $progList;
	}


	function index()
	{
		$this->set('error', false);
		$this->set('showMenu', false);

		if (!empty($this->data)) {
			if ($this->data['Program']['password'] == '$mnit-pass$') {
				$this->Session->write('AdminLogged', true);
				$this->set('showMenu', true);
				$this->set('degree', $this->degree);
				$this->set('deptList', $this->getDeptList());
				$this->set('progList', $this->getProgList());
				$this->set('areas', $this->areas);
			} else {
				$this->set('error', true);
			}
		}
	}

	function logout()
	{
		$this->Session->delete('AdminLogged');
		$this->redirect('/programs');
	}

	function add()
	{
		if (!isset($this->data)) {
			$this->redirect('/programs');
			exit;
		}

		if ($this->Program->save($this->data)) {
			$this->flash('The program '.$this->data['Program']['name'].' has been added. <br>You are being redirected to <b>/courses<b> module', '/courses');	
		} else {
			$this->flash('There was an error in processing your form. Try again.', '/programs');
		}
	}

	function del()
	{
		if (!isset($this->data)) {
			$this->redirect('/programs');
			exit;
		}

		$res = $this->Program->find(array('name' => $this->data['Program']['name']));
		if ($this->Program->del($res['Program']['program_id'])) {
			$this->flash('The program '.$this->data['Program']['name'].' has been deleted.', '/programs');	
		} else {
			$this->flash('There was an error in processing your form. Try again.', '/programs');
		}
	}
}

?>
