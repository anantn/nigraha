<?php
class Program extends AppModel {
	var $name='Program';
	
	var $program_id;
	var $department_id;
	var $degree;
		
	var $validate=array();

	function beforeSave()
	{
		if ($this->findCount(array('name' => $this->data['Program']['name'])) > 0)
			$this->del($this->data['Program']['program_id']);

		return true;
	}	
}
?>
