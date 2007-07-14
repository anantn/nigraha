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
			$this->set('instructions', 'Either your college ID was invalid, or this student has already registered! Please try again:');
	}

	function update()
	{
		$mainFields = array(
						array('type' => 'text', 'name' => 'collegeid', 'label' => 'Student ID',
								'error' => 'Must begin with 0, and should be 5 or 6 digits long'),
						array('type' => 'text', 'name' => 'fName', 'label' => 'First Name', 'error' => 'Cannot be empty, Cannot contain numbers'),
						array('type' => 'text', 'name' => 'lName', 'label' => 'Last Name', 'error' => 'Cannot be empty, Cannot contain numbers'),
						array('type' => 'text', 'name' => 'dob', 'label' => 'Date Of Birth', 'error' => 'Must be of the form DDMMYYYY'),
						array('type' => 'select', 'name' => 'gender', 'label' => 'Gender',
								'values' => array('m' => 'Male', 'f' => 'Female'), 'error' => 'Cannot be empty'),
						array('type' => 'password', 'name' => 'password', 'label' => 'Password', 'error' => 'Invalid Password!')
							);

		$extraFields = array(
						array('type' => 'select', 'name' => 'marital', 'label' => 'Marital Status',
								'values' => array('u' => 'Unmarried', 'm' => 'Married', 'd' => 'Divorced'), 'error' => 'Cannot be empty'),
						array('type' => 'text', 'name' => 'bloodGroup', 'label' => 'Blood Group', 'error' => NULL),
						array('type' => 'select', 'name' => 'category', 'label' => 'Category', 
								'values' => array('gen' => 'General', 'scst' => 'SC/ST', 'obc' => 'OBC'), 'error' => 'Cannot be empty'),
						array('type' => 'text', 'name' => 'nationality', 'label' => 'Nationality', 'error' => 'Cannot be empty'),
						array('type' => 'textarea', 'name' => 'pAddress', 'label' => 'Permanent Address', 'error' => 'Cannot be empty'),
						array('type' => 'text', 'name' => 'email', 'label' => 'Email Address', 'error' => 'Valid Email address required'),
						array('type' => 'text', 'name' => 'deptid', 'label' => 'Department ID', 'error' => 'Cannot be empty'),
						array('type' => 'text', 'name' => 'semester', 'label' => 'Semester', 'error' => 'Cannot be empty'),
						array('type' => 'text', 'name' => 'batch', 'label' => 'Batch No', 'error' => NULL)
					);

		$guardianFields = array(
						array('type' => 'text', 'name' => 'fatherName', 'label' => 'Father\'s/Guardian\'s Full Name', 'error' => 'Cannot be empty, Cannot contain numbers'),
						array('type' => 'text', 'name' => 'motherName', 'label' => 'Mothers Full Name', 'error' => 'Cannot be empty, Cannot contain numbers'),
						array('type' => 'textarea', 'name' => 'parentAddress', 'label' => 'Parent\'s Address', 'error' => NULL),
						array('type' => 'text', 'name' => 'parentPhone', 'label' => 'Contact Phone', 'error' => 'Must be of the form....'),
						array('type' => 'text', 'name' => 'fatherOccupation', 'label' => 'Father\'s Occupation', 'error' => NULL),
						array('type' => 'text', 'name' => 'motherOccupation', 'label' => 'Mother\'s Occupation', 'error' => NULL),
						array('type' => 'text', 'name' => 'lgName', 'label' => 'Local Guardian\'s Name', 'error' => 'Cannot be empty, Cannot contain numbers'),
						array('type' => 'textarea', 'name' => 'lgAddress', 'label' => 'Local Address', 'error' => NULL),
						array('type' => 'text', 'name' => 'lgPhone', 'label' => 'Local Phone', 'error' => 'Must be of the form 141-2419999')
					);

		if (isset($this->data['Student']['fName'])) {

			if ($this->Student->save($this->data)) {
				$this->set('courseLayout', $this->requestAction('/students/courses', array('return')));
			} else {
				$this->set('mFields', $mainFields);	
				$this->set('eFields', $extraFields);
				$this->set('gFields', $guardianFields);
			}

		} else {

			$sid = $this->data['Student']['collegeid'];
			if (preg_match('/^0\d{5,6}$/', $sid)) {
				$this->set('mFields', $mainFields);	
				$this->set('eFields', $extraFields);
				$this->set('gFields', $guardianFields);
				if (($this->Student->findCount(array("Student.collegeid" => $this->data['Student']['collegeid']))) != 0)
					$this->redirect('/students/index/0');
			} else {
				$this->redirect('/students/index/0');
			}
		}
	}

	function courses()
	{
		$sem = $this->data['Student']['semester'];
		$courseInfo = array();
		$courses = unserialize($this->requestAction("/rest/courses/fetch/$sem", array('return')));
		foreach ($courses as $course) {
			$courseInfo[] = array($course, json_decode($this->requestAction('/rest/courses/info/'.$course, array('return'))));
		}
		$this->set('courseInfo', $courseInfo);

		if(isset($this->data['Courses'])) {
			foreach ($this->data['Courses'] as $course) {
				if (!empty($course['course_id'])) {
					$cid = $course['course_id'];
					$sid = $this->data['Student']['collegeid'];
					$res = $this->Student->query("SELECT COUNT(*) FROM courses_students WHERE (collegeid = $sid AND course_id = '$cid')");
					if ($res[0][0]['COUNT(*)'] != "0") {
						$this->Student->query("DELETE FROM courses_students WHERE collegeid = $sid");
						$this->set('error', true);
						$this->render(); exit;
					} else {
						$this->Student->query("INSERT INTO courses_students VALUES($sid, '$cid')");
					}
				}
			}
			$this->redirect('/students/done');
		}
	}

	function done()
	{
	
	}
}
