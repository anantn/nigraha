<?php
class Account extends AppModel {
	var $name='Account';
	
	var $id;
	var $collegeid;
	var $category;
	var $mode;
	var $number;
	var $amount;

	var $primaryKey='id';

	var $validate = array(
		'collegeid' => '/^0\d{5,6}$/',
		'category' => VALID_NOT_EMPTY,
		'mode' => VALID_NOT_EMPTY,
		'number' => VALID_NOT_EMPTY,
		'amount' => '/^[0-9\.]+$/');

	var $belongsTo = array('Student' =>
							array('className' => 'Student',
								  'foreignKey' => 'collegeid'));
}
?>
