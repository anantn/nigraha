<?php

class AccountsController extends AppController
{
	var $name = 'Accounts';
	var $helpers	= array('Html', 'Form', 'Javascript', 'Ajax');

	function checkSession()
	{
		if (!$this->Session->check('AdminLogged')) {
			$this->redirect('/accounts');
			exit;
		}
	}

	function index()
	{
		$this->set('error', false);

		if (!empty($this->data)) {
			if ($this->data['Account']['password'] == '$mnit-pass$') {
				$this->Session->write('AdminLogged', true);
				$this->redirect('/accounts/add');
			} else {
				$this->set('error', true);
			}
		}
	}

	function logout()
	{
		$this->Session->delete('AdminLogged');
		$this->redirect('/accounts');
	}

	function add()
	{
		$this->checkSession();

		$fields = array(
					array('type' => 'text', 'name' => 'collegeid', 'label' => 'Student ID'),
					array('type' => 'select', 'name' => 'category', 'label' => 'Category', 'values' => array('gen' => 'General', 'sc' => 'SC', 'st' => 'ST', 'obc' => 'OBC', 'das' => 'DASA')),
					array('type' => 'select', 'name' => 'mode', 'label' => 'Mode of Payment', 'values' => array('DD' => 'Demand Draft', 'CA' => 'Cash')),
					array('type' => 'text', 'name' => 'number', 'label' => 'D.D. No. (0 for Cash)'),
					array('type' => 'text', 'name' => 'amount', 'label' => 'Amount')
				);
		$this->set('fields', $fields);

		if (!empty($this->data)) {
			if ($this->Account->save($this->data)) {
				$this->set('done', true);
				$this->data = NULL;
				$this->Account->create();
			} else {
				$this->set('done', false);	
			}
		}
	}
}
