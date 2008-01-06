<?php

class AdminsController extends AppController
{
	var $name = 'Admins';
	var $helpers = array('Html', 'Javascript', 'Form');
	
	function index()
	{
		$this->render('index');	
	}
}

?>
