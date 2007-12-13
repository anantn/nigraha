<?php

class FacultyController extends AppController
{
	var $helpers = array('Html', 'Form', 'Ajax', 'Javascript');
	var $ldap = false;
    var $ip = '172.16.1.20';
    
	private function isFaculty($uid)
	{
        /* LDAP backend */
		$dn = "cn=facultycse,ou=Group,dc=mnit,dc=ac,dc=in";
		$sr = ldap_search($this->ldap, $dn, "memberUid=*");
		$re = ldap_get_entries($this->ldap, $sr);
		$fa = $re[0]['memberuid'];
        
        /* mySQL backend
        $re = $this->Faculty->query('SELECT id FROM faculties');
        $fa = array();
        foreach ($re as $f) {
            $fa[] = $f['faculties']['id'];
        }
        */
        
		if ($uid) {
			if (in_array($uid, $fa))
				return true;
			else
				return false;
		} else {
            $names = array();
			foreach ($fa as $id) {
                $name = $this->Faculty->findById($id);
                $names[$id] = $name['Faculty']['name'];
			}
			asort($names);
			return $names;
		}
	}

	private function prepareData($key)
	{
		$det = array();
		$res = $this->Faculty->findById($key);
		if (!$res)
			return false;

		$det['name'] = $res['Faculty']['name'];
		$det['post'] = $res['Faculty']['post'];
		$det['dept'] = 'Department of Computer Engineering';
		$det['educ'] = $res['Faculty']['education'];
		$det['rese'] = $res['Faculty']['research'];
		$det['cour'] = $res['Faculty']['courses'];
		$det['publ'] = $res['Faculty']['publications'];
		$det['proj'] = $res['Faculty']['projects'];

		if ($res['Faculty']['image'] != '0')
			$det['imag'] = 'images/faculty/'.$res['Faculty']['image'];
		else
			$det['imag'] = 'images/default.png';

		if ($res['Faculty']['resume'])
			$det['resu'] = 'resume/'.$res['Faculty']['resume'];
		else
			$det['resu'] = false;

		return $det;
	}

	private function edit()
	{
		if ($this->Session->check('FPageLogged')) {
			$this->set('isForm', false);
			$this->set('logged', true);
			$this->set('f', $this->prepareData($this->Session->read('FPageUID')));
		} else {
			if (!empty($this->data)) {
			    /* LDAP Backend */
				$ds = ldap_connect($this->ip);
				ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
				$r = ldap_bind($ds, 'uid='.$this->data['Faculty']['uid'].',ou=people,dc=mnit,dc=ac,dc=in', $this->data['Faculty']['pas']);
				if ($r) {
					ldap_unbind($ds);
					$this->set('isForm', false);
					$this->set('logged', true);
					$this->Session->write('FPageLogged', true);
					$this->Session->write('FPageUID', $this->data['Faculty']['uid']);
					$this->set('f', $this->prepareData($this->Session->read('FPageUID')));
				} else {
					$this->set('isForm', true);
					$this->set('error', true);
				}
			} else {
				$this->set('isForm', true);
			}
		}

		$this->render('edit');
	}

	private function update($param)
	{
		$query = 'UPDATE faculties SET ';
		switch ($param) {
			case 'name':
				$query .= "name = '".$_POST['value']."' ";
				$res = "<h1>".$_POST['value']."</h1>";
				$ren = 'updated';
				break;
			case 'post':
				$query .= "post = '".$_POST['value']."' ";
				$res = "<h3>".$_POST['value']."</h3>";
				$ren = 'updated';
				break;
			case 'educ':
				$query .= "education = '".$_POST['value']."' ";
				$res = "<p>".$_POST['value']."</p>";
				$ren = 'updated';
				break;
			case 'rese':
				$query .= "research = '".$_POST['value']."' ";
				$res = "<p>".$_POST['value']."</p>";
				$ren = 'updated';
				break;
			case 'cour':
				$query .= "courses = '".$_POST['value']."' ";
				$res = "<p>".$_POST['value']."</p>";
				$ren = 'updated';
				break;
			case 'publ':
				$query .= "publications = '".$_POST['value']."' ";
				$res = "<p>".$_POST['value']."</p>";
				$ren = 'updated';
				break;
			case 'proj':
				$query .= "projects = '".$_POST['value']."' ";
				$res = "<p>".$_POST['value']."</p>";
				$ren = 'updated';
				break;
			case 'imag':
				$parts = explode('.', $_FILES['imag']['name']);
				$uploadFinal = dirname(__FILE__)."/../webroot/images/faculty/";
				$fileName = $this->Session->read('FPageUID').".".end($parts);
				if (move_uploaded_file($_FILES['imag']['tmp_name'], $uploadFinal.$fileName)) {
					$res = true;
					$query .= "image = '".$fileName."' ";
				} else {
					$res = false;
					$query .= "image = 0 ";
				}
				$ren = 'uploaded';
				break;
			case 'resu':
				$parts = explode('.', $_FILES['resu']['name']);
				$uploadFinal = dirname(__FILE__)."/../webroot/resume/";
				$fileName = $this->Session->read('FPageUID').".".end($parts);
				if (move_uploaded_file($_FILES['resu']['tmp_name'], $uploadFinal.$fileName)) {
					$res = true;
					$query .= "resume = '".$fileName."' ";
				} else {
					$res = false;
					$query .= "resume = 0 ";
				}
				$ren = 'uploaded';
				break;
			default:
				$res = "<h1>ERROR!</h1>";
		}
		$query .= "WHERE id = '".$this->Session->read('FPageUID')."'";
		
		$this->Faculty->query($query);
		$this->set('which', $res);
		if ($ren == 'updated') {
			$this->render($ren, 'ajax');
		} else {
			$this->render($ren);
		}
	}

	public function index($id = false, $param = false)
	{
        /* LDAP Backend */
		$this->ldap = ldap_connect($this->ip);
		ldap_set_option($this->ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
		$r = ldap_bind($this->ldap, 'uid=easypush,ou=people,dc=mnit,dc=ac,dc=in', 'sholay');

		switch ($id) {
			case false:
				$this->render('search');
				break;
			case 'edit':
				if (!$param)
					$this->edit();
				else
					$this->update($param);
				break;
			case 'list':
				$this->set('list', $this->isFaculty(false));
				$this->render('list');
				break;
			case 'logout':
				$uid = $this->Session->read('FPageUID');
				$this->Session->delete('FPageLogged');
				$this->Session->delete('FPageUID');
				$this->redirect('/faculty/'.$uid);
				break;
			default:
				if ($this->isFaculty($id)) {
					$det = $this->prepareData($id);
					if ($det)
						$this->set('f', $det);
					else
						$this->render('results');
				} else {
					$this->render('results');
				}
		}
	}
}
