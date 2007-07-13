<?php

class GuardiansController extends AppController
{
	var $name		= 'Guardians';
	var $helpers	= array('Html', 'Form');

	function add()
	{
		$this->render();
	}
}
