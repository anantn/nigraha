<?php

class StudentsController extends AppController
{
	var $name 		= 'Students';
	var $helpers	= array('Html', 'Form', 'Javascript', 'Ajax');

	function index($check = 1)
	{
		if ($check)
			$this->set('instructions', 'Please enter your college ID to begin!');
		else
			$this->set('instructions', 'Your college ID was invalid! Please try again:');
	}

	function update()
	{
		$studentFields = array(
						array('type' => 'text', 'name' => 'collegeid', 'label' => 'Student ID',
								'error' => 'Must begin with 0, and should be 5 or 6 digits long'),
						array('type' => 'text', 'name' => 'fName', 'label' => 'First Name', 'error' => 'Cannot be empty, Cannot contain numbers'),
						array('type' => 'text', 'name' => 'lName', 'label' => 'Last Name', 'error' => 'Cannot be empty, Cannot contain numbers'),
						array('type' => 'text', 'name' => 'dob', 'label' => 'Date Of Birth', 'error' => 'Must be of the form DDMMYYYY'),
						array('type' => 'select', 'name' => 'gender', 'label' => 'Gender',
								'values' => array('m' => 'Male', 'f' => 'Female'), 'error' => 'Cannot be empty'),
						array('type' => 'select', 'name' => 'marital', 'label' => 'Marital Status',
								'values' => array('u' => 'Unmarried', 'm' => 'Married', 'd' => 'Divorced'), 'error' => 'Cannot be empty'),
						array('type' => 'text', 'name' => 'bloodGroup', 'label' => 'Blood Group', 'error' => NULL),
						array('type' => 'select', 'name' => 'category', 'label' => 'Category', 
								'values' => array('gen' => 'General', 'scst' => 'SC/ST', 'obc' => 'OBC'), 'error' => 'Cannot be empty'),
						array('type' => 'text', 'name' => 'nationality', 'label' => 'Nationality', 'error' => 'Cannot be empty'),
						array('type' => 'textarea', 'name' => 'pAddress', 'label' => 'Permanent Address', 'error' => 'Cannot be empty'),
						array('type' => 'text', 'name' => 'email', 'label' => 'Email Address', 'error' => 'Valid Email address required'),
						array('type' => 'text', 'name' => 'dept', 'label' => 'Department', 'error' => 'Cannot be empty'),
						array('type' => 'text', 'name' => 'sem', 'label' => 'Semester', 'error' => 'Cannot be empty'),
						array('type' => 'text', 'name' => 'batch', 'label' => 'Batch No', 'error' => NULL)
					);

		$guardianFields = array(
						array('type' => 'text', 'name' => 'fatherName', 'label' => 'Fathers Full Name', 'error' => 'Cannot be empty, Cannot contain numbers'),
						array('type' => 'text', 'name' => 'motherName', 'label' => 'Mothers Full Name', 'error' => 'Cannot be empty, Cannot contain numbers'),
						array('type' => 'textarea', 'name' => 'parentAddress', 'label' => 'Parents Address', 'error' => NULL),
						array('type' => 'text', 'name' => 'parentPhone', 'label' => 'Parents Phone', 'error' => 'Must be of the form....'),
						array('type' => 'text', 'name' => 'fatherOccupation', 'label' => 'fathers Occupation', 'error' => NULL),
						array('type' => 'text', 'name' => 'motherOccupation', 'label' => 'Mothers Occupation', 'error' => NULL),
						array('type' => 'text', 'name' => 'lgName', 'label' => 'Local Guardians Name', 'error' => 'Cannot be empty, Cannot contain numbers'),
						array('type' => 'textarea', 'name' => 'lgAddress', 'label' => 'Local Guardians Address', 'error' => NULL),
						array('type' => 'text', 'name' => 'lgPhone', 'label' => 'Local Guardians Phone', 'error' => 'Must be of the form....'),
						array('type' => 'text', 'name' => 'lgOccupation', 'label' => 'Local Guardians Occupation', 'error' => NULL)
					);

		if (isset($this->data['Student']['fName'])) {

			$courseInfo = array();
			$courses = $this->requestAction('/rest/courses/fetch/6', array('return'));
			foreach ($courses as $course) {
				$courseInfo[$course] = json_decode($this->requestAction('/rest/courses/info/'.$course, array('return')));
			}

			//if ($this->Student->save($this->data)) {
				$this->set('courseLayout', $this->requestAction('/students/courses', array('return')));
			//}

			$this->set('sFields', $studentFields);	
			$this->set('gFields', $guardianFields);

		} else {

			$sid = $this->data['Student']['collegeid'];
			// Do validation here!
	
			$valid = true;

			if ($valid) {
				$this->set('sFields', $studentFields);	
				$this->set('gFields', $guardianFields);
				if ($this->Student->exists($this->data['Student']['collegeid']))
					$this->set('new', 0);
				else
					$this->set('new', 1);
			} else {
				$this->redirect('/students/index/0');
			}
		}
	}

	function courses()
	{
	}
}
