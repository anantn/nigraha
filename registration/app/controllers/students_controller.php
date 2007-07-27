<?php

class StudentsController extends AppController
{
	var $name 		= 'Students';
	var $helpers	= array('Html', 'Form', 'Javascript', 'Ajax', 'Pagination');
	var $components = array('Pagination');
	var $uses = array('Student', 'Department', 'Account');

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
			'WB' => 'West Bengal',
			'NR' => 'Outside India');

	public $semesterList =  array('1' => 'I (First Year)', '3' => 'III (Second Year)', '5' => 'V (Third Year)', '7' => 'VII (Fourth Year)', '9' => 'IX (Fifth Year - Architecture Only)');

	function getDeptList()
	{
		$deptList = array();
		$tmp = $this->Department->findAll();
		foreach ($tmp as $t) {
			$deptList[$t['Department']['department_id']] = $t['Department']['deptName'];
		}

		return $deptList;
	}

	function index($check = 1)
	{
		$stdFormLock = TRUE;
		$this->set('stdFormLock', $stdFormLock);
		if ($check == 1)
			$this->set('instructions', 'Please enter your college ID to begin!');
		elseif ($check == 2)
			$this->set('instructions', 'The form could not be unlocked. The service password you entered may be invalid!');
		else
			$this->set('instructions', 'Your college ID was invalid! Please try again:');
	}

	function update()
	{
		
		$mainFields = array(
						array('type' => 'hidden', 'name' => 'id', 'label' => NULL, 'error' => NULL),
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
								'values' => array('gen' => 'General', 'sc' => 'SC', 'st' => 'ST', 'obc' => 'OBC', 'das' => 'DASA'), 'error' => 'Cannot be empty'),
						array('type' => 'text', 'name' => 'nationality', 'label' => 'Nationality', 'error' => 'Cannot be empty', 'value' => 'Indian'),
						array('type' => 'text', 'name' => 'email', 'label' => 'Alternate Email Address', 'error' => 'Valid Email address required'),
						array('type' => 'select', 'name' => 'department_id', 'label' => 'Department ID', 'error' => 'Cannot be empty', 'values' => $this->getDeptList()),
						array('type' => 'select', 'name' => 'semester', 'label' => 'Semester', 'error' => 'Cannot be empty', 'values' => $this->semesterList),
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
			if($this->data['Student']['password'] == '$mnit-pass$') {
				$sid = $this->data['Student']['collegeid'];
				if (preg_match('/^[A-Z0-9]{6,10}$/', $sid)) {
					$this->set('mFields', $mainFields);
					$this->set('aFields', $addFields);
					$this->set('eFields', $extraFields);
					$this->set('gFields', $guardianFields);
					if (($this->Student->findCount(array("Student.collegeid" => $this->data['Student']['collegeid']))) != 0) {
						$res = $this->Student->find(array('collegeid' => $this->data['Student']['collegeid']));
						$this->data = $this->Student->read(NULL, $res['Student']['id']);
					}
				} else {
					$this->redirect('/students/index/0');
				}
			} else {
				$this->redirect('/student/index/2');
			}
		}
	}

	function courses()
	{
		$sem = $this->data['Student']['semester'];
		$dep = $this->data['Student']['department_id'];
		$sid = $this->data['Student']['collegeid'];
		$courseInfo = array();
		$studentExists = $this->Student->query("SELECT COUNT(*) FROM courses_students WHERE collegeid = '$sid'");
		
		if ($studentExists[0][0]['COUNT(*)'] != "0") {
			$oldCourses = $this->Student->query("SELECT * FROM courses_students WHERE collegeid = '$sid'");
			if (!$oldCourses) {
				$this->set('error', true);
			}
			foreach ($oldCourses as $oldCourse) {
				$course = $oldCourse['courses_students']['course_id'];
				$courseInfo[] = array($course, json_decode($this->requestAction('/rest/courses/info/'.$course, array('return'))));
			}
			$this->set('courseInfo', $courseInfo);
		} elseif ($sem != '1') {
			$courses = unserialize($this->requestAction("/rest/courses/fetch/$sem-$dep", array('return')));
			foreach ($courses as $course) {
				$courseInfo[] = array($course, json_decode($this->requestAction('/rest/courses/info/'.$course, array('return'))));
			}
			$this->set('courseInfo', $courseInfo);
		} else {
			$this->set('courseInfo', array());
		}
		if(isset($this->data['Courses'])) {
			if ($studentExists[0][0]['COUNT(*)'] != "0") {
				$this->Student->query("DELETE FROM courses_students WHERE collegeid = '$sid'");
			}
			foreach ($this->data['Courses'] as $course) {
				if (!empty($course['course_id'])) {
					$cid = $course['course_id'];
					$res = $this->Student->query("SELECT COUNT(*) FROM courses_students WHERE (collegeid = '$sid' AND course_id = '$cid')");
					if ($res[0][0]['COUNT(*)'] != "0") {
						$this->Student->query("DELETE FROM courses_students WHERE collegeid = '$sid'");
						$this->set('error', true);
						$this->render(); exit;
					} else {
						$this->Student->query("INSERT INTO courses_students VALUES('$sid', '$cid')");
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
			$student = $this->Student->findByCollegeid();
			if (!$student)
				$this->set('error', true);
		} else {
			$res = $this->Student->query("SELECT course_id FROM courses_students WHERE collegeid = '$id'");
			if (!$res) {
				$this->set('error', true);
			} else {
				$tmp = $student['Student'];
				$daName	= $tmp['fName']." ".$tmp['lName'];
				$daDOB	= substr($tmp['dob'], 0, 2)."-".substr($tmp['dob'], 2, 2)."-".substr($tmp['dob'], 4);
				$daAdd	= $tmp['pAddress1'].", ".$tmp['pAddress2'];

				$this->set('sInfo', array(
								'ID' => $tmp['collegeid'],
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

	function compare($x, $y)
	{
		if ($x[1] < $y[1])
			return -1;
		else
			return 1;
	}

	function view()
	{
		$nReg = $this->Student->findCount();
		$nFee = $this->Account->findCount();

		if ($this->data['Student']['course_id'] != "") {
			$cid = $this->data['Student']['course_id'];
			$courseInfo = array($cid, json_decode($this->requestAction('/rest/courses/info/'.$cid, array('return'))));
			if ($courseInfo[1][0] == "") {
				$this->set('invalidCourse', true);

				$dTmp = $this->getDeptList();
				$dTmp['NULL'] = 'NONE';

				$sTmp = $this->semesterList;
				$sTmp['NULL'] = 'NONE';

				$this->set('nReg', $nReg);
				$this->set('nFee', $nFee);
				$this->set('deptList', $dTmp);
				$this->set('semester', $sTmp);
				$this->render();
			} else {
				$res = $this->Student->query("SELECT * FROM courses_students WHERE course_id = '$cid'");
				$stdList = array();
				foreach ($res as $student) {
					$tmp = $this->Student->find(array('collegeid' => $student['courses_students']['collegeid']));
					$stdList[] = array($student['courses_students']['collegeid'], $tmp['Student']['fName']." ".$tmp['Student']['lName']);
				}
				usort($stdList, array($this, 'compare'));				

				$this->set('ListGenerated', true);
				$this->set('list', $stdList);
				$this->set('course', $courseInfo);
				$this->set('output', $this->data['Student']['type']);
				$this->render(NULL, 'plain');
			}
		} else {
			if (isset($this->data['Student']['deptid'])) {
				$conditions = array();
				if ($this->data['Student']['deptid'] != 'NULL') {
					$conditions['Student.department_id'] = $this->data['Student']['deptid'];
					$tmp = $this->getDeptList();
					$this->set('department', $tmp[$this->data['Student']['deptid']]);
				}
				if ($this->data['Student']['semester'] != 'NULL') {
					$conditions['Student.semester'] = $this->data['Student']['semester'];
					$this->set('semester', $this->data['Student']['semester']);
				}

				$list = $this->Student->findAll($conditions);
				$stdList = array();
				foreach ($list as $student) {
					$cRes = $this->Student->query("SELECT * FROM courses_students WHERE collegeid = '".$student['Student']['collegeid']."'");
					$cStr = '';
					foreach ($cRes as $res)
						$cStr .= ' '.$res['courses_students']['course_id'];
					$stdList[] = array($student['Student']['collegeid'], $student['Student']['fName']." ".$student['Student']['lName'], $cStr);
				}
				usort($stdList, array($this, 'compare'));

				$this->set('ListGenerated', true);
				$this->set('list', $stdList);
				$this->set('output', $this->data['Student']['type']);
				$this->render(NULL, 'plain');
			}
		}	
		
		$dTmp = $this->getDeptList();
		$dTmp['NULL'] = 'NONE';

		$sTmp = $this->semesterList;
		$sTmp['NULL'] = 'NONE';

		$this->set('nReg', $nReg);
		$this->set('nFee', $nFee);
		$this->set('deptList', $dTmp);
		$this->set('semester', $sTmp);
	}

	function getlist()
	{
		$res = $this->Student->findAll();
		$this->set('list', $res);
	}
	
}
