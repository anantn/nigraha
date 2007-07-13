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
			$fields = array(
					array('type' => 'input', 'name' => 'sid', 'label' => 'Student ID'),
					array('type' => 'input', 'name' => 'fName', 'label' => 'First Name'),
					array('type' => 'input', 'name' => 'lName', 'label' => 'Last Name'),
					array('type' => 'input', 'name' => 'dob', 'label' => 'Date Of Birth'),
					array('type' => 'radio', 'name' => 'gender', 'label' => 'Gender', 
											'values' => array(
														array('name' => 'm', 'label' => 'male'),
														array('name' => 'f', 'label' => 'female')
														)
					),
					array('type' => 'dropdown', 'name' => 'marital', 'label' => 'Marital Status', 
											'values' => array(
														array('name' => 'u', 'label' => 'unmarried'),
														array('name' => 'm', 'label' => 'married'),
														array('name' => 'd', 'label' => 'devorced')
														)
					),
					array('type' => 'input', 'name' => 'bloodGroup', 'label' => 'Blood Group'),
					array('type' => 'dropdown', 'name' => 'category', 'label' => 'Category', 
											'values' => array(
														array('name' => 'gen', 'label' => 'general'),
														array('name' => 'scst', 'label' => 'SC/ST'),
														array('name' => 'obc', 'label' => 'OBC')
														)
					),
					array('type' => 'input', 'name' => 'nationality', 'label' => 'Nationality'),
					array('type' => 'textarea', 'name' => 'pAddress', 'label' => 'Permanent Address'),
					array('type' => 'input', 'name' => 'email', 'label' => 'Email Address')
					array('type' => 'input', 'name' => 'dept', 'label' => 'Department')
					array('type' => 'input', 'name' => 'sem', 'label' => 'Semester')
					array('type' => 'input', 'name' => 'batch', 'label' => 'Batch No')
					);
	
			if ($this->Student->exists($this->data['Student']['sid']))
				$this->set('new', 0);
			else
				$this->set('new', 1);
		} else {
			$this->redirect('/students/index/0');
		}
	}
}
