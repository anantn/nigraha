<?php

class StudentsController extends AppController
{
	var $name 		= 'Students';
	var $helpers	= array('Html', 'Form', 'Javascript', 'Ajax');
	var $uses = array('Student', 'Department');

	public $states = array(
            'AN' => 'Andaman and Nicobar Islands',
            'AP' => 'Andhra Pradesh',
            'AR' => 'Arunachal Pradesh',
            'AS' => 'Assam',
            'BR' => 'Bihar',
            'CH' => 'Chandigarh',
            'CT' => 'Chattisgarh',
            'DN' => 'Dadra and Nagar Haveli',
            'DD' => 'Daman and Diu',
            'DL' => 'Delhi',
            'GA' => 'Goa',
            'GJ' => 'Gujarat',
            'HR' => 'Harayana',
            'HP' => 'Himachal Pradesh',
            'JK' => 'Jammu and Kashmir',
            'JH' => 'Jharkhand',
            'KA' => 'Karnataka',
            'KL' => 'Kerala',
            'LD' => 'Lakshwadeep',
            'MP' => 'Madhya Pradesh',
            'MH' => 'Maharashtra',
            'MN' => 'Manipur',
            'ML' => 'Meghalaya',
            'MZ' => 'Mizoram',
            'NL' => 'Nagaland',
            'OR' => 'Orissa',
            'PY' => 'Pondicherry',
            'PB' => 'Punjab',
            'RJ' => 'Rajasthan',
            'SK' => 'Sikkim',
            'TN' => 'Tamil Nadu',
            'TR' => 'Tripura',
            'UL' => 'Uttaranchal',
            'UP' => 'Uttar Pradesh',
			'WB' => 'West Bengal');

	function index($check = 1)
	{
		if ($check)
			$this->set('instructions', 'Please enter your college ID to begin!');
		else
			$this->set('instructions', 'Either your college ID was invalid, or this student has already registered! Please try again:');
	}

	function update()
	{
		$deptList = array();
		$tmp = $this->Department->findAll();
		foreach ($tmp as $t) {
			$deptList[$t['Department']['department_id']] = $t['Department']['deptName'];
		}
		
		$mainFields = array(
						array('type' => 'text', 'name' => 'collegeid', 'label' => 'Student ID',
								'error' => 'Must begin with 0, and should be 5 or 6 digits long', 'disabled' => true),
						array('type' => 'text', 'name' => 'fName', 'label' => 'First Name', 'error' => 'Cannot be empty, Cannot contain numbers'),
						array('type' => 'text', 'name' => 'lName', 'label' => 'Last Name', 'error' => 'Cannot be empty, Cannot contain numbers'),
						array('type' => 'text', 'name' => 'dob', 'label' => 'Date Of Birth (DDMMYYYY)', 'error' => 'Must be of the form DDMMYYYY'),
						array('type' => 'select', 'name' => 'gender', 'label' => 'Gender',
								'values' => array('m' => 'Male', 'f' => 'Female'), 'error' => 'Cannot be empty'),
						array('type' => 'password', 'name' => 'password', 'label' => 'New Password (To be used for your MNIT Account)', 'error' => 'Invalid Password!')
							);

		$addFields	 = array(
						array('type' => 'text', 'name' => 'pAddress1', 'label' => 'Permanent Address (Line 1)', 'error' => 'Cannot be empty'),
						array('type' => 'text', 'name' => 'pAddress2', 'label' => 'Permanent Address (Line 2)', 'error' => 'Cannot be empty'),
						array('type' => 'text', 'name' => 'pCity', 'label' => 'Permanent Address (City/Town/Village)', 'error' => 'Cannot be empty'),
						array('type' => 'select', 'name' => 'pState', 'label' => 'Permanent Address (State)', 'error' => 'Cannot be empty', 'values' => $this->states)
							);

		$extraFields = array(
						array('type' => 'select', 'name' => 'marital', 'label' => 'Marital Status',
								'values' => array('u' => 'Unmarried', 'm' => 'Married', 'd' => 'Divorced'), 'error' => 'Cannot be empty'),
						array('type' => 'text', 'name' => 'bloodGroup', 'label' => 'Blood Group', 'error' => NULL),
						array('type' => 'select', 'name' => 'category', 'label' => 'Category', 
								'values' => array('gen' => 'General', 'sc' => 'SC', 'st' => 'ST', 'obc' => 'OBC'), 'error' => 'Cannot be empty'),
						array('type' => 'text', 'name' => 'nationality', 'label' => 'Nationality', 'error' => 'Cannot be empty', 'value' => 'Indian'),
						array('type' => 'text', 'name' => 'email', 'label' => 'Alternate Email Address', 'error' => 'Valid Email address required'),
						array('type' => 'select', 'name' => 'department_id', 'label' => 'Department ID', 'error' => 'Cannot be empty', 'values' => $deptList),
						array('type' => 'select', 'name' => 'semester', 'label' => 'Semester', 'error' => 'Cannot be empty', 'values' => array('3' => 'III (Second Year)', '5' => 'V (Third Year)', '7' => 'VII (Fourth Year)', '9' => 'IX (Fifth Year - Architecture Only)')),
						array('type' => 'text', 'name' => 'batch', 'label' => 'Batch No', 'error' => NULL)
					);

		$guardianFields = array(
						array('type' => 'text', 'name' => 'fatherName', 'label' => 'Father\'s/Guardian\'s Full Name (As per certificate)', 'error' => 'Cannot be empty, Cannot contain numbers'),
						array('type' => 'text', 'name' => 'motherName', 'label' => 'Mothers Full Name (As per certificate)', 'error' => 'Cannot be empty, Cannot contain numbers'),
						array('type' => 'text', 'name' => 'parentPhone', 'label' => 'Contact Phone', 'error' => 'Not a valid phone number!'),
						array('type' => 'text', 'name' => 'fatherOccupation', 'label' => 'Father\'s Occupation', 'error' => NULL),
						array('type' => 'text', 'name' => 'motherOccupation', 'label' => 'Mother\'s Occupation', 'error' => NULL),
						array('type' => 'text', 'name' => 'lgName', 'label' => 'Local Guardian\'s Name', 'error' => 'Cannot be empty, Cannot contain numbers'),
						array('type' => 'textarea', 'name' => 'lgAddress', 'label' => 'Local Address', 'error' => NULL),
						array('type' => 'text', 'name' => 'lgPhone', 'label' => 'Local Phone', 'error' => NULL)
					);

		if (isset($this->data['Student']['fName'])) {

			if ($this->Student->save($this->data)) {
				$this->set('courseLayout', $this->requestAction('/students/courses', array('return')));
			} else {
				$this->set('mFields', $mainFields);
				$this->set('aFields', $addFields);	
				$this->set('eFields', $extraFields);
				$this->set('gFields', $guardianFields);
			}

		} else {

			$sid = $this->data['Student']['collegeid'];
			if (preg_match('/^0\d{5,6}$/', $sid)) {
				$this->set('mFields', $mainFields);
				$this->set('aFields', $addFields);
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
		$dep = $this->data['Student']['department_id'];
		$courseInfo = array();
		$courses = unserialize($this->requestAction("/rest/courses/fetch/$sem-$dep", array('return')));
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

	function doprint($id)
	{
		$student = $this->Student->findByCollegeid($id);
		if (!$student) {
			$this->set('error', true);
		} else {
			$res = $this->Student->query("SELECT course_id FROM courses_students WHERE collegeid = $id");
			if (!$res) {
				$this->set('error', true);
			} else {
				$tmp = $student['Student'];
				$daName	= $tmp['fName']." ".$tmp['lName'];
				$daDOB	= substr($tmp['dob'], 0, 2)."-".substr($tmp['dob'], 2, 2)."-".substr($tmp['dob'], 4);
				$daAdd	= $tmp['pAddress1']."<br>".$tmp['pAddress2'];

				$this->set('sInfo', array(
								'ID' => '0'.$tmp['collegeid'],
								'Full Name' => $tmp['fName']." ".$tmp['lName'],
								'Date of Birth' => $daDOB,
								"Father's/Guardian's Name" => $tmp['fatherName'],
								'Address' => $daAdd,
								'City' => $tmp['pCity'],
								'State' => $this->states[$tmp['pState']]));

				$cInfo = array();
				foreach ($res as $r) {
					$cid = $r['courses_students']['course_id'];
					$cInfo[$cid] = json_decode($this->requestAction('/rest/courses/info/'.$cid, array('return')));
				}
				$this->set('cInfo', $cInfo);
				$this->render(NULL, 'print');
			}
		}
	}
}
