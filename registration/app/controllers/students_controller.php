<?php

class StudentsController extends AppController
{
	var $name 		= 'Students';
	var $helpers	= array('Html', 'Form');

	function index($check = 1)
	{
		$this->set('titleMessage', 'Welcome!');
		if ($check)
			$this->set('instructions', 'Please enter your college ID to begin!');
		else
			$this->set('instructions', 'Your college ID was invalid! Please try again:');
	}

	function check()
	{
		$sid = $this->data['Student']['sid'];
		// Do validation here!

		$valid = true;

		if ($valid) {	
			if ($this->Student->exists($this->data['Student']['sid']))
				$this->set('new', 0);
			else
				$this->set('new', 1);
		} else {
			$this->redirect('/students/index/0');
		}
	}
}
