<?php
/* SVN FILE: $Id: form.test.php 5422 2007-07-09 05:23:06Z phpnut $ */
/**
 * Short description for file.
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * CakePHP Test Suite <https://trac.cakephp.org/wiki/Developement/TestSuite>
 * Copyright (c) 2006, Larry E. Masters Shorewood, IL. 60431
 * Author(s): Larry E. Masters aka PhpNut <phpnut@gmail.com>
 *
 *  Licensed under The Open Group Test Suite License
 *  Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author       Larry E. Masters aka PhpNut <phpnut@gmail.com>
 * @copyright    Copyright (c) 2006, Larry E. Masters Shorewood, IL. 60431
 * @link         http://www.phpnut.com/projects/
 * @package      test_suite
 * @subpackage   test_suite.cases.app
 * @since        CakePHP Test Suite v 1.0.0.0
 * @version      $Revision: 5422 $
 * @modifiedby   $LastChangedBy: phpnut $
 * @lastmodified $Date: 2007-07-09 00:23:06 -0500 (Mon, 09 Jul 2007) $
 * @license      http://www.opensource.org/licenses/opengroup.php The Open Group Test Suite License
 */
if (!defined('CAKEPHP_UNIT_TEST_EXECUTION')) {
	define('CAKEPHP_UNIT_TEST_EXECUTION', 1);
}

require_once CAKE.'app_helper.php';
uses('class_registry', 'controller'.DS.'controller', 'model'.DS.'model', 'view'.DS.'helper',
	'view'.DS.'helpers'.DS.'html', 'view'.DS.'helpers'.DS.'form');


class ContactTestController extends Controller {
	var $name = 'ContactTest';
	var $uses = null;
}

class Contact extends Model {

	var $primaryKey = 'id';
	var $useTable = false;
	var $name = 'Contact';

	function loadInfo() {
		return new Set(array(
			array('name' => 'id', 'type' => 'integer', 'null' => '', 'default' => '', 'length' => '8'),
			array('name' => 'name', 'type' => 'string', 'null' => '', 'default' => '', 'length' => '255'),
			array('name' => 'published', 'type' => 'date', 'null' => true, 'default' => null, 'length' => null),
			array('name' => 'created', 'type' => 'date', 'null' => '1', 'default' => '', 'length' => ''),
			array('name' => 'updated', 'type' => 'datetime', 'null' => '1', 'default' => '', 'length' => null)));
	}
}

class UserForm extends Model {
	var $useTable = false;
	var $primaryKey = 'id';
	var $name = 'UserForm';
	var $hasMany = array('OpenidUrl' => array('className' => 'OpenidUrl', 'foreignKey' => 'user_form_id'));

	function loadInfo() {
		return new Set(array(
			array('name' => 'id', 'type' => 'integer', 'null' => '', 'default' => '', 'length' => '8'),
			array('name' => 'name', 'type' => 'string', 'null' => '', 'default' => '', 'length' => '255'),
			array('name' => 'created', 'type' => 'date', 'null' => '1', 'default' => '', 'length' => ''),
			array('name' => 'updated', 'type' => 'datetime', 'null' => '1', 'default' => '', 'length' => null)));
	}
}

class OpenidUrl extends Model {
	var $useTable = false;
	var $primaryKey = 'id';
	var $name = 'OpenidUrl';
	var $belongsTo = array('UserForm' => array('className' => 'UserForm', 'foreignKey' => 'user_form_id'));

	function loadInfo() {
		return new Set(array(
			array('name' => 'id', 'type' => 'integer', 'null' => '', 'default' => '', 'length' => '8'),
			array('name' => 'user_form_id', 'type' => 'integer', 'null' => '', 'default' => '', 'length' => '8'),
			array('name' => 'url', 'type' => 'string', 'null' => '', 'default' => '', 'length' => '255'),));
	}

	function beforeValidate() {
		$this->invalidate('openid_not_registered');
		return true;
	}
}

class ValidateUser extends Model {
	var $primaryKey = 'id';
	var $useTable = false;
	var $name = 'ValidateUser';
	var $hasOne = array('ValidateProfile' => array('className' => 'ValidateProfile', 'foreignKey' => 'user_id'));

	function loadInfo() {
		return new Set(array(
			array('name' => 'id', 'type' => 'integer', 'null' => '', 'default' => '', 'length' => '8'),
			array('name' => 'name', 'type' => 'string', 'null' => '', 'default' => '', 'length' => '255'),
			array('name' => 'email', 'type' => 'string', 'null' => '', 'default' => '', 'length' => '255'),
			array('name' => 'created', 'type' => 'date', 'null' => '1', 'default' => '', 'length' => ''),
			array('name' => 'updated', 'type' => 'datetime', 'null' => '1', 'default' => '', 'length' => null)));
	}

	function beforeValidate() {
		$this->invalidate('email');
		return false;
	}
}

class ValidateProfile extends Model {
	var $primaryKey = 'id';
	var $useTable = false;
	var $name = 'ValidateProfile';
	var $hasOne = array('ValidateItem' => array('className' => 'ValidateItem', 'foreignKey' => 'profile_id'));
	var $belongsTo = array('ValidateUser' => array('className' => 'ValidateUser', 'foreignKey' => 'user_id'));

	function loadInfo() {
		return new Set(array(
			array('name' => 'id', 'type' => 'integer', 'null' => '', 'default' => '', 'length' => '8'),
			array('name' => 'user_id', 'type' => 'integer', 'null' => '', 'default' => '', 'length' => '8'),
			array('name' => 'full_name', 'type' => 'string', 'null' => '', 'default' => '', 'length' => '255'),
			array('name' => 'city', 'type' => 'string', 'null' => '', 'default' => '', 'length' => '255'),
			array('name' => 'created', 'type' => 'date', 'null' => '1', 'default' => '', 'length' => ''),
			array('name' => 'updated', 'type' => 'datetime', 'null' => '1', 'default' => '', 'length' => null)));
	}

	function beforeValidate() {
		$this->invalidate('full_name');
		$this->invalidate('city');
		return false;
	}
}

class ValidateItem extends Model {
	var $primaryKey = 'id';
	var $useTable = false;
	var $name = 'ValidateItem';
	var $belongsTo = array('ValidateProfile' => array('className' => 'ValidateProfile', 'foreignKey' => 'profile_id'));

	function loadInfo() {
		return new Set(array(
			array('name' => 'id', 'type' => 'integer', 'null' => '', 'default' => '', 'length' => '8'),
			array('name' => 'profile_id', 'type' => 'integer', 'null' => '', 'default' => '', 'length' => '8'),
			array('name' => 'name', 'type' => 'string', 'null' => '', 'default' => '', 'length' => '255'),
			array('name' => 'description', 'type' => 'string', 'null' => '', 'default' => '', 'length' => '255'),
			array('name' => 'created', 'type' => 'date', 'null' => '1', 'default' => '', 'length' => ''),
			array('name' => 'updated', 'type' => 'datetime', 'null' => '1', 'default' => '', 'length' => null)));
	}

	function beforeValidate() {
		$this->invalidate('description');
		return false;
	}
}
/**
 * Short description for class.
 *
 * @package		cake.tests
 * @subpackage	cake.tests.cases.libs.view.helpers
 */
class FormHelperTest extends CakeTestCase {

	function setUp() {
		Router::reload();
	}

	function startTest($method) {
		$this->Form =& new FormHelper();
		$this->Form->Html =& new HtmlHelper();
		$this->Controller =& new ContactTestController();
		$this->View =& new View($this->Controller);
		ClassRegistry::addObject('view', $view);
		ClassRegistry::addObject('Contact', new Contact());
	}

	function endTest($method) {
		if (isset($this->Form)) {
			unset($this->Form->Html);
			unset($this->Form);
		}
		unset($this->Controller);
		unset($this->View);
	}

	function testFormValidationAssociated() {
		$this->UserForm =& new UserForm();
		$this->UserForm->OpenidUrl =& new OpenidUrl();

		$data = array('UserForm' => array('name' => 'user'), 'OpenidUrl' => array('url' => 'http://www.cakephp.org'));

		$result = $this->UserForm->OpenidUrl->create($data);
		$this->assertTrue($result);

		$result = $this->UserForm->OpenidUrl->validates();
		$this->assertFalse($result);

		$result = $this->Form->create('UserForm', array('type' => 'post', 'action' => 'login'));
		$this->assertPattern('/^<form\s+id="[^"]+"\s+method="post"\s+action="\/user_forms\/login\/"[^>]*>$/', $result);

		$expected = array('OpenidUrl' => array('openid_not_registered' => 1));
		$this->assertEqual($this->Form->validationErrors, $expected);

		$result = $this->Form->error('OpenidUrl.openid_not_registered', 'Error, not registered', array('wrap' => false));
		$this->assertEqual($result, 'Error, not registered');

		unset($this->UserForm->OpenidUrl);
		unset($this->UserForm);
	}

	function testFormValidationAssociatedFirstLevel() {
		$this->ValidateUser =& new ValidateUser();
		$this->ValidateUser->ValidateProfile =& new ValidateProfile();

		$data = array('ValidateUser' => array('name' => 'mariano'),
							'ValidateProfile' => array('full_name' => 'Mariano Iglesias'));

		$result = $this->ValidateUser->create($data);
		$this->assertTrue($result);

		$result = $this->ValidateUser->validates();
		$this->assertFalse($result);

		$result = $this->ValidateUser->ValidateProfile->validates();
		$this->assertFalse($result);

		$result = $this->Form->create('ValidateUser', array('type' => 'post', 'action' => 'add'));
		$this->assertPattern('/^<form\s+id="[^"]+"\s+method="post"\s+action="\/validate_users\/add\/"[^>]*>$/', $result);

		$expected = array('OpenidUrl' => array('openid_not_registered' => 1),
								'ValidateUser' => array('email' => 1),
								'ValidateProfile' => array('full_name' => 1, 'city' => 1));

		$this->assertEqual($this->Form->validationErrors, $expected);

		unset($this->ValidateUser->ValidateProfile);
		unset($this->ValidateUser);
	}

	function testFormValidationAssociatedSecondLevel() {
		$this->ValidateUser =& new ValidateUser();
		$this->ValidateUser->ValidateProfile =& new ValidateProfile();
		$this->ValidateUser->ValidateProfile->ValidateItem =& new ValidateItem();

		$data = array('ValidateUser' => array('name' => 'mariano'),
							'ValidateProfile' => array('full_name' => 'Mariano Iglesias'),
							'ValidateItem' => array('name' => 'Item'));

		$result = $this->ValidateUser->create($data);
		$this->assertTrue($result);

		$result = $this->ValidateUser->validates();
		$this->assertFalse($result);

		$result = $this->ValidateUser->ValidateProfile->validates();
		$this->assertFalse($result);

		$result = $this->ValidateUser->ValidateProfile->ValidateItem->validates();
		$this->assertFalse($result);

		$result = $this->Form->create('ValidateUser', array('type' => 'post', 'action' => 'add'));
		$this->assertPattern('/^<form\s+id="[^"]+"\s+method="post"\s+action="\/validate_users\/add\/"[^>]*>$/', $result);

		$expected = array('OpenidUrl' => array('openid_not_registered' => 1),
								'ValidateUser' => array('email' => 1),
								'ValidateProfile' => array('full_name' => 1, 'city' => 1),
								'ValidateItem' => array('description' => 1));

		$this->assertEqual($this->Form->validationErrors, $expected);

		unset($this->ValidateUser->ValidateProfile->ValidateItem);
		unset($this->ValidateUser->ValidateProfile);
		unset($this->ValidateUser);
	}

	function testFormInput() {
		$result = $this->Form->input('Model.field', array('type' => 'text'));
		$expected = '<div class="input"><label for="ModelField">Field</label><input name="data[Model][field]" type="text" value="" id="ModelField" /></div>';
		$this->assertEqual($result, $expected);

		$result = $this->Form->input('Model/password');
		$expected = '<div class="input"><label for="ModelPassword">Password</label><input type="password" name="data[Model][password]" value="" id="ModelPassword" /></div>';
		$this->assertEqual($result, $expected);

		$result = $this->Form->input('test', array('options' => array('First', 'Second'), 'empty' => true));
		$this->assertPattern('/<select [^<>]+>\s+<option value=""\s*><\/option>\s+<option value="0"/', $result);

		$result = $this->Form->input('Model.field', array('type' => 'file', 'class' => 'textbox'));
		$this->assertPattern('/class="textbox"/', $result);

		$this->Form->data = array('Model' => array( 'field' => 'Hello & World > weird chars' ));
		$result = $this->Form->input('Model.field');
		$expected = '<div class="input"><label for="ModelField">Field</label><input name="data[Model][field]" type="text" value="Hello &amp; World &gt; weird chars" id="ModelField" /></div>';
		$this->assertEqual($result, $expected);

		unset($this->Form->data);

		$this->Form->validationErrors['Model']['field'] = 'Badness!';
		$result = $this->Form->input('Model.field');
		$expected = '<div class="input"><label for="ModelField">Field</label><input name="data[Model][field]" type="text" value="" id="ModelField" /></div>';
		$this->assertPattern('/^<div[^<>]+class="input"[^<>]*><label[^<>]+for="ModelField"[^<>]*>Field<\/label><input[^<>]+class="[^"]*form-error"[^<>]+\/><div[^<>]+class="error-message">Badness!<\/div><\/div>$/', $result);

		$result = $this->Form->input('Model.field', array('after' => 'A message to you, Rudy'));
		$this->assertPattern('/^<div[^<>]+class="input"[^<>]*><label[^<>]+for="ModelField"[^<>]*>Field<\/label><input[^<>]+class="[^"]*form-error"[^<>]+\/>A message to you, Rudy<div[^<>]+class="error-message">Badness!<\/div><\/div>$/', $result);

		$result = $this->Form->input('Model.field', array('after' => 'A message to you, Rudy', 'error' => false));
		$this->assertPattern('/^<div[^<>]+class="input"[^<>]*><label[^<>]+for="ModelField"[^<>]*>Field<\/label><input[^<>]+class="[^"]*form-error"[^<>]+\/>A message to you, Rudy<\/div>$/', $result);

		unset($this->Form->validationErrors['Model']['field']);
		$result = $this->Form->input('Model.field', array('after' => 'A message to you, Rudy'));
		$this->assertPattern('/^<div[^<>]+class="input"[^<>]*><label[^<>]+for="ModelField"[^<>]*>Field<\/label><input[^<>]+\/>A message to you, Rudy<\/div>$/', $result);
		$this->assertNoPattern('/form-error/', $result);
		$this->assertNoPattern('/error-message/', $result);
	}

	function testLabel() {
		$this->Form->text('Person/name');
		$result = $this->Form->label();
		$this->assertEqual($result, '<label for="PersonName">Name</label>');

		$this->Form->text('Person.name');
		$result = $this->Form->label();
		$this->assertEqual($result, '<label for="PersonName">Name</label>');

		$this->Form->text('Person.Name');
		$result = $this->Form->label();
		$this->assertEqual($result, '<label for="PersonName">Name</label>');

		$result = $this->Form->label('Person.first_name');
		$this->assertEqual($result, '<label for="PersonFirstName">First Name</label>');

		$result = $this->Form->label('Person.first_name', 'Your first name');
		$this->assertEqual($result, '<label for="PersonFirstName">Your first name</label>');

		$result = $this->Form->label('Person.first_name', 'Your first name', array('class' => 'my-class'));
		$this->assertEqual($result, '<label for="PersonFirstName" class="my-class">Your first name</label>');

		$result = $this->Form->label('Person.first_name', 'Your first name', array('class' => 'my-class', 'id' => 'LabelID'));
		$this->assertEqual($result, '<label for="PersonFirstName" class="my-class" id="LabelID">Your first name</label>');

		$result = $this->Form->label('Person.first_name', '');
		$this->assertEqual($result, '<label for="PersonFirstName"></label>');
	}

	function testTextbox() {
		$result = $this->Form->text('Model.field');
		$this->assertPattern('/^<input[^<>]+name="data\[Model\]\[field\]"[^<>]+\/>$/', $result);
		$this->assertPattern('/^<input[^<>]+type="text"[^<>]+\/>$/', $result);
		$this->assertPattern('/^<input[^<>]+value=""[^<>]+\/>$/', $result);
		$this->assertPattern('/^<input[^<>]+id="ModelField"[^<>]+\/>$/', $result);
		$this->assertNoPattern('/^<input[^<>]+name="[^<>]+name="[^<>]+\/>$/', $result);
		$this->assertNoPattern('/<input[^<>]+[^type|name|id|value]=[^<>]*>/', $result);

		$result = $this->Form->text('Model.field', array('type' => 'password'));
		$this->assertPattern('/^<input[^<>]+name="data\[Model\]\[field\]"[^<>]+\/>$/', $result);
		$this->assertPattern('/^<input[^<>]+type="password"[^<>]+\/>$/', $result);
		$this->assertPattern('/^<input[^<>]+value=""[^<>]+\/>$/', $result);
		$this->assertPattern('/^<input[^<>]+id="ModelField"[^<>]+\/>$/', $result);
		$this->assertNoPattern('/^<input[^<>]+name="[^<>]+name="[^<>]+\/>$/', $result);
		$this->assertNoPattern('/<input[^<>]+[^type|name|id|value]=[^<>]*>/', $result);

		$result = $this->Form->text('Model.field', array('id' => 'theID'));
		$expected = '<input name="data[Model][field]" type="text" id="theID" value="" />';
		$this->assertEqual($result, $expected);

		$this->Form->validationErrors['Model']['text'] = 1;
		$this->Form->data['Model']['text'] = 'test';
		$result = $this->Form->text('Model/text', array('id' => 'theID'));
		$this->assertPattern('/^<input[^<>]+name="data\[Model\]\[text\]"[^<>]+id="theID"[^<>]+\/>$/', $result);
		$this->assertPattern('/^<input[^<>]+value="test"[^<>]+class="form-error"[^<>]+\/>$/', $result);
		$this->assertNoPattern('/^<input[^<>]+name="[^<>]+name="[^<>]+\/>$/', $result);
		$this->assertNoPattern('/<input[^<>]+[^type|name|id|value|class]=[^<>]*>/', $result);
	}

	function testDefaultValue() {
		$this->Form->data['Model']['field'] = 'test';
		$result = $this->Form->text('Model.field', array('default' => 'default value'));
		$this->assertPattern('/^<input[^<>]+value="test"[^<>]+\/>$/', $result);

		unset($this->Form->data['Model']['field']);
		$result = $this->Form->text('Model.field', array('default' => 'default value'));
		$this->assertPattern('/^<input[^<>]+value="default value"[^<>]+\/>$/', $result);
	}

	function testFieldError() {
		$this->Form->validationErrors['Model']['field'] = 1;
		$result = $this->Form->error('Model.field');
		$this->assertEqual($result, '<div class="error-message">Error in field Field</div>');

		$result = $this->Form->error('Model.field', null, array('wrap' => false));
		$this->assertEqual($result, 'Error in field Field');

		$this->Form->validationErrors['Model']['field'] = "This field contains invalid input";
		$result = $this->Form->error('Model.field', null, array('wrap' => false));
		$this->assertEqual($result, 'This field contains invalid input');

		$result = $this->Form->error('Model.field', "<strong>Badness!</strong>", array('wrap' => false));
		$this->assertEqual($result, '&lt;strong&gt;Badness!&lt;/strong&gt;');

		$result = $this->Form->error('Model.field', "<strong>Badness!</strong>", array('wrap' => false, 'escape' => true));
		$this->assertEqual($result, '&lt;strong&gt;Badness!&lt;/strong&gt;');

		$result = $this->Form->error('Model.field', "<strong>Badness!</strong>", array('wrap' => false, 'escape' => false));
		$this->assertEqual($result, '<strong>Badness!</strong>');
	}

	function testPassword() {
		$result = $this->Form->password('Model.field');
		$expected = '<input name="data[Model][field]" type="password" value="" id="ModelField" />';
		$this->assertPattern('/^<input[^<>]+name="data\[Model\]\[field\]"[^<>]+\/>$/', $result);
		$this->assertPattern('/^<input[^<>]+type="password"[^<>]+\/>$/', $result);
		$this->assertPattern('/^<input[^<>]+value=""[^<>]+\/>$/', $result);
		$this->assertPattern('/^<input[^<>]+id="ModelField"[^<>]+\/>$/', $result);
		$this->assertNoPattern('/^<input[^<>]+name="[^<>]+name="[^<>]+\/>$/', $result);
		$this->assertNoPattern('/<input[^<>]+[^type|name|id|value]=[^<>]*>/', $result);

		$this->Form->validationErrors['Model']['passwd'] = 1;
		$this->Form->data['Model']['passwd'] = 'test';
		$result = $this->Form->password('Model/passwd', array('id' => 'theID'));
		$this->assertPattern('/^<input[^<>]+name="data\[Model\]\[passwd\]"[^<>]+id="theID"[^<>]+\/>$/', $result);
		$this->assertPattern('/^<input[^<>]+value="test"[^<>]+class="form-error"[^<>]+\/>$/', $result);
		$this->assertNoPattern('/^<input[^<>]+name="[^<>]+name="[^<>]+\/>$/', $result);
		$this->assertNoPattern('/<input[^<>]+[^type|name|id|value|class]=[^<>]*>/', $result);
	}

	function testSelect() {
		$result = $this->Form->select('Model.field', array());
		$this->assertPattern('/^<select [^<>]+>\n<option [^<>]+>/', $result);
		$this->assertPattern('/<option value=""><\/option>/', $result);
		$this->assertPattern('/<\/select>$/', $result);
		$this->assertPattern('/<select[^<>]+name="data\[Model\]\[field\]"[^<>]*>/', $result);
		$this->assertPattern('/<select[^<>]+id="ModelField"[^<>]*>/', $result);
		$this->assertNoPattern('/^<select[^<>]+name="[^<>]+name="[^<>]+>$/', $result);

		$this->Form->data = array('Model' => array('field' => 'value'));
		$result = $this->Form->select('Model.field', array('value' => 'good', 'other' => 'bad'));
		$this->assertPattern('/option value=""/', $result);
		$this->assertPattern('/option value="value"\s+selected="selected"/', $result);
		$this->assertPattern('/option value="other"/', $result);
		$this->assertPattern('/<\/option>\s+<option/', $result);
		$this->assertPattern('/<\/option>\s+<\/select>/', $result);
		$this->assertNoPattern('/option value="other"\s+selected="selected"/', $result);
		$this->assertNoPattern('/<select[^<>]+[^name|id]=[^<>]*>/', $result);
		$this->assertNoPattern('/<option[^<>]+[^value|selected]=[^<>]*>/', $result);

		$this->Form->data = array();
		$result = $this->Form->select('Model.field', array('value' => 'good', 'other' => 'bad'));
		$this->assertPattern('/option value=""/', $result);
		$this->assertPattern('/option value="value"/', $result);
		$this->assertPattern('/option value="other"/', $result);
		$this->assertPattern('/<\/option>\s+<option/', $result);
		$this->assertPattern('/<\/option>\s+<\/select>/', $result);
		$this->assertNoPattern('/option value="field"\s+selected="selected"/', $result);
		$this->assertNoPattern('/option value="other"\s+selected="selected"/', $result);

		$result = $this->Form->select('Model.field', array('first' => 'first "html" <chars>', 'second' => 'value'), null, array(), false);
		$this->assertPattern('/' .
			'<select[^>]*>\s+' .
			'<option\s+value="first"[^>]*>first &quot;html&quot; &lt;chars&gt;<\/option>\s+'.
			'<option\s+value="second"[^>]*>value<\/option>\s+'.
			'<\/select>'.
			'/i', $result);

		$result = $this->Form->select('Model.field', array('first' => 'first "html" <chars>', 'second' => 'value'), null, array('escape' => false), false);
		$this->assertPattern('/' .
			'<select[^>]*>\s+' .
			'<option\s+value="first"[^>]*>first "html" <chars><\/option>\s+'.
			'<option\s+value="second"[^>]*>value<\/option>\s+'.
			'<\/select>'.
			'/i', $result);
	}

	function testMonth() {
		$result = $this->Form->month('Model.field');
		$this->assertPattern('/' .
			'<option\s+value="01"[^>]*>January<\/option>\s+'.
			'<option\s+value="02"[^>]*>February<\/option>\s+'.
			'/i', $result);
	}

	function testDay() {
		$result = $this->Form->day('Model.field', false);
		$this->assertPattern('/option value="12"/', $result);
		$this->assertPattern('/option value="13"/', $result);

		$this->Form->data['Model']['field'] = '2006-10-10 23:12:32';
		$result = $this->Form->day('Model.field');
		$this->assertPattern('/option value="10" selected="selected"/', $result);
		$this->assertNoPattern('/option value="32"/', $result);

		$this->Form->data['Model']['field'] = '';
		$result = $this->Form->day('Model.field', '10');
		$this->assertPattern('/option value="10" selected="selected"/', $result);
		$this->assertPattern('/option value="23"/', $result);
		$this->assertPattern('/option value="24"/', $result);

		$this->Form->data['Model']['field'] = '2006-10-10 23:12:32';
		$result = $this->Form->day('Model.field', true);
		$this->assertPattern('/option value="10" selected="selected"/', $result);
		$this->assertPattern('/option value="23"/', $result);

	}

	function testHour() {
		$result = $this->Form->hour('Model.field', false);
		$this->assertPattern('/option value="12"/', $result);
		$this->assertNoPattern('/option value="13"/', $result);

		$this->Form->data['Model']['field'] = '2006-10-10 00:12:32';
		$result = $this->Form->hour('Model.field', false);
		$this->assertPattern('/option value="12" selected="selected"/', $result);
		$this->assertNoPattern('/option value="13"/', $result);

		$this->Form->data['Model']['field'] = '';
		$result = $this->Form->hour('Model.field', true);
		$this->assertPattern('/option value="23"/', $result);
		$this->assertNoPattern('/option value="24"/', $result);

		$this->Form->data['Model']['field'] = '2006-10-10 00:12:32';
		$result = $this->Form->hour('Model.field', true);
		$this->assertPattern('/option value="23"/', $result);
		$this->assertPattern('/option value="00" selected="selected"/', $result);
		$this->assertNoPattern('/option value="24"/', $result);
	}

	function testYear() {

		$result = $this->Form->year('Model.field', 2006, 2007);
		$this->assertPattern('/option value="2006"/', $result);
		$this->assertPattern('/option value="2007"/', $result);
		$this->assertNoPattern('/option value="2005"/', $result);
		$this->assertNoPattern('/option value="2008"/', $result);

		$this->data['Model']['field'] = '';
		$result = $this->Form->year('Model.field', 2006, 2007, null, array('class'=>'year'));
		$expecting = "<select name=\"data[Model][field_year]\" class=\"year\" id=\"ModelFieldYear\">\n<option value=\"\"></option>\n<option value=\"2006\">2006</option>\n<option value=\"2007\">2007</option>\n</select>";
		$this->assertEqual($result, $expecting);

		$this->Form->data['Model']['field'] = '2006-10-10';
		$result = $this->Form->year('Model.field', 2006, 2007, null, array(), false);
		$expecting = "<select name=\"data[Model][field_year]\" id=\"ModelFieldYear\">\n<option value=\"2006\" selected=\"selected\">2006</option>\n<option value=\"2007\">2007</option>\n</select>";
		$this->assertEqual($result, $expecting);

		$this->Form->data['Model']['field'] = '';
		$result = $this->Form->year('Model.field', 2006, 2007, false);
		$expecting = "<select name=\"data[Model][field_year]\" id=\"ModelFieldYear\">\n<option value=\"\"></option>\n<option value=\"2006\">2006</option>\n<option value=\"2007\">2007</option>\n</select>";
		$this->assertEqual($result, $expecting);

		$this->Form->data['Model']['field'] = '2006-10-10';
		$result = $this->Form->year('Model.field', 2006, 2007, false, array(), false);
		$expecting = "<select name=\"data[Model][field_year]\" id=\"ModelFieldYear\">\n<option value=\"2006\" selected=\"selected\">2006</option>\n<option value=\"2007\">2007</option>\n</select>";
		$this->assertEqual($result, $expecting);

		$this->Form->data['Model']['field'] = '';
		$result = $this->Form->year('Model.field', 2006, 2007, 2007);
		$expecting = "<select name=\"data[Model][field_year]\" id=\"ModelFieldYear\">\n<option value=\"\"></option>\n<option value=\"2006\">2006</option>\n<option value=\"2007\" selected=\"selected\">2007</option>\n</select>";
		$this->assertEqual($result, $expecting);

		$this->Form->data['Model']['field'] = '2006-10-10';
		$result = $this->Form->year('Model.field', 2006, 2007, 2007, array(), false);
		$expecting = "<select name=\"data[Model][field_year]\" id=\"ModelFieldYear\">\n<option value=\"2006\" selected=\"selected\">2006</option>\n<option value=\"2007\">2007</option>\n</select>";
		$this->assertEqual($result, $expecting);

		$this->Form->data['Model']['field'] = '';
		$result = $this->Form->year('Model.field', 2006, 2008, 2007, array(), false);
		$expecting = "<select name=\"data[Model][field_year]\" id=\"ModelFieldYear\">\n<option value=\"2006\">2006</option>\n<option value=\"2007\" selected=\"selected\">2007</option>\n<option value=\"2008\">2008</option>\n</select>";
		$this->assertEqual($result, $expecting);

		$this->Form->data['Model']['field'] = '2006-10-10';
		$result = $this->Form->year('Model.field', 2006, 2008, null, array(), false);
		$expecting = "<select name=\"data[Model][field_year]\" id=\"ModelFieldYear\">\n<option value=\"2006\" selected=\"selected\">2006</option>\n<option value=\"2007\">2007</option>\n<option value=\"2008\">2008</option>\n</select>";
		$this->assertEqual($result, $expecting);

	}

	function testTextArea() {
		$this->Form->data = array('Model' => array('field' => 'some test data'));
		$result = $this->Form->textarea('Model.field');
		$this->assertPattern('/^<textarea[^<>]+name="data\[Model\]\[field\]"[^<>]+id="ModelField"/', $result);
		$this->assertPattern('/^<textarea[^<>]+>some test data<\/textarea>$/', $result);
		$this->assertNoPattern('/^<textarea[^<>]+value="[^<>]+>/', $result);
		$this->assertNoPattern('/^<textarea[^<>]+name="[^<>]+name="[^<>]+>$/', $result);
		$this->assertNoPattern('/<textarea[^<>]+[^name|id]=[^<>]*>/', $result);

		$result = $this->Form->textarea('Model/tmp');
		$this->assertPattern('/^<textarea[^<>]+name="data\[Model\]\[tmp\]"[^<>]+><\/textarea>/', $result);
	}

	function testHiddenField() {
		$this->Form->validationErrors['Model']['field'] = 1;
		$this->Form->data['Model']['field'] = 'test';
		$result = $this->Form->hidden('Model.field', array('id' => 'theID'));
		$this->assertPattern('/^<input[^<>]+type="hidden"[^<>]+\/>$/', $result);
		$this->assertPattern('/^<input[^<>]+name="data\[Model\]\[field\]"[^<>]+id="theID"[^<>]+value="test"[^<>]+\/>$/', $result);
		$this->assertNoPattern('/^<input[^<>]+name="[^<>]+name="[^<>]+\/>$/', $result);
		$this->assertNoPattern('/<input[^<>]+[^type|name|id|value|class]=[^<>]*>/', $result);
	}

	function testFileUploadField() {
		$result = $this->Form->file('Model.upload');
		$this->assertPattern('/^<input type="file"[^<>]+name="data\[Model\]\[upload\]"[^<>]+\/>$/', $result);
		$this->assertPattern('/^<input type="file"[^<>]+value=""[^<>]+\/>$/', $result);
		$this->assertPattern('/^<input type="file"[^<>]+id="ModelUpload"[^<>]+\/>$/', $result);
		$this->assertNoPattern('/^<input[^<>]+name="[^<>]+name="[^<>]+\/>$/', $result);
		$this->assertNoPattern('/<input[^<>]+[^type|name|value|id]=[^<>]*>$/', $result);
	}

	function testSubmitButton() {
		$result = $this->Form->submit('Test Submit');
		$this->assertPattern('/^<div\s+class="submit"><input type="submit"[^<>]+value="Test Submit"[^<>]+\/><\/div>$/', $result);

		$result = $this->Form->submit('Test Submit', array('class' => 'save', 'div' => false));
		$this->assertPattern('/^<input type="submit"[^<>]+value="Test Submit"[^<>]+\/>$/', $result);
		$this->assertPattern('/^<[^<>]+class="save"[^<>]+\/>$/', $result);
		$this->assertNoPattern('/<input[^<>]+[^type|class|value]=[^<>]*>/', $result);

		$result = $this->Form->submit('Test Submit', array('div' => array('id' => 'SaveButton')));
		$this->assertPattern('/^<div[^<>]+id="SaveButton"[^<>]*><input type="submit"[^<>]+value="Test Submit"[^<>]+\/><\/div>$/', $result);
		$this->assertNoPattern('/<input[^<>]+[^type|value]=[^<>]*>/', $result);

		$result = $this->Form->submit('Next >');
		$this->assertPattern('/^<div\s+class="submit"><input type="submit"[^<>]+value="Next &gt;"[^<>]+\/><\/div>$/', $result);

		$result = $this->Form->submit('Next >', array('escape'=>false));
		$this->assertPattern('/^<div\s+class="submit"><input type="submit"[^<>]+value="Next >"[^<>]+\/><\/div>$/', $result);
	}

	function testFormCreate() {
		$result = $this->Form->create('Contact');
		$this->assertPattern('/^<form [^<>]+>/', $result);
		$this->assertPattern('/\s+id="ContactAddForm"/', $result);
		$this->assertPattern('/\s+method="post"/', $result);
		$this->assertPattern('/\s+action="\/contacts\/add\/"/', $result);

		$result = $this->Form->create('Contact', array('type' => 'GET'));
		$this->assertPattern('/^<form [^<>]+method="get"[^<>]+>$/', $result);
		$result = $this->Form->create('Contact', array('type' => 'get'));
		$this->assertPattern('/^<form [^<>]+method="get"[^<>]+>$/', $result);

		$result = $this->Form->create('Contact', array('type' => 'put'));
		$this->assertPattern('/^<form [^<>]+method="post"[^<>]+>/', $result);

		$this->Form->data['Contact']['id'] = 1;
		$result = $this->Form->create('Contact');
		$this->assertPattern('/^<form[^<>]+method="post"[^<>]+>/', $result);
		$this->assertPattern('/^<form[^<>]+id="ContactEditForm"[^<>]+>/', $result);
		$this->assertPattern('/^<form[^<>]+action="\/contacts\/edit\/1"[^<>]*>/', $result);
		$this->assertNoPattern('/^<form[^<>]+[^id|method|action]=[^<>]*>/', $result);

		$result = $this->Form->create('Contact', array('id' => 'TestId'));
		$this->assertPattern('/id="TestId"/', $result);
	}

	function testFormMagicInput() {
		$result = $this->Form->create('Contact');
		$this->assertPattern('/^<form\s+id="ContactAddForm"\s+method="post"\s+action="\/contacts\/add\/"\s*>$/', $result);
		$this->assertNoPattern('/^<form[^<>]+[^id|method|action]=[^<>]*>/', $result);

		/*
		 * This is how you write tests for tag-based output.
		 */
		$result = $this->Form->input('name');
		$this->assertPattern('/^<div[^<>]+><label[^<>]+>Name<\/label><input [^<>]+ \/><\/div>$/', $result);
		$this->assertPattern('/^<div[^<>]+class="input">/', $result);
		$this->assertPattern('/<label[^<>]+for="ContactName">/', $result);
		$this->assertPattern('/<input[^<>]+name="data\[Contact\]\[name\]"[^<>]+\/>/', $result);
		$this->assertPattern('/<input[^<>]+type="text"[^<>]+\/>/', $result);
		$this->assertPattern('/<input[^<>]+maxlength="255"[^<>]+\/>/', $result);
		$this->assertPattern('/<input[^<>]+value=""[^<>]+\/>/', $result);
		$this->assertPattern('/<input[^<>]+id="ContactName"[^<>]+\/>/', $result);
		$this->assertNoPattern('/<input[^<>]+[^id|maxlength|name|type|value]=[^<>]*>/', $result);

		$result = $this->Form->input('Address.street');
		$this->assertPattern('/^<div class="input">' .
												 '<label for="AddressStreet">Street<\/label>' .
												 '<input name="data\[Address\]\[street\]" type="text" value="" id="AddressStreet" \/>'.
												 '<\/div>$/', $result);

		$result = $this->Form->input('name', array('div' => false));
		$this->assertPattern('/^<label for="ContactName">Name<\/label>' .
												 '<input name="data\[Contact\]\[name\]" type="text" maxlength="255" value="" id="ContactName" \/>$/', $result);

		$result = $this->Form->input('Contact.non_existing');
		$this->assertPattern('/^<div class="input">' .
												 '<label for="ContactNonExisting">Non Existing<\/label>' .
												 '<input name="data\[Contact\]\[non_existing\]" type="text" value="" id="ContactNonExisting" \/>'.
												 '<\/div>$/', $result);

		$result = $this->Form->input('Contact.published', array('div' => false));

		$this->assertPattern('/^<label for="ContactPublishedMonth">Published<\/label>' .
												 '<select name="data\[Contact\]\[published_month\]"\s+id="ContactPublishedMonth">/', $result);

		$result = $this->Form->input('Contact.updated', array('div' => false));

		$this->assertPattern('/^<label for="ContactUpdatedMonth">Updated<\/label>' .
												 '<select name="data\[Contact\]\[updated_month\]"\s+id="ContactUpdatedMonth">/', $result);
	}

	function testFormMagicInputLabel() {
		$result = $this->Form->create('Contact');
		$this->assertPattern('/^<form\s+id="ContactAddForm"\s+method="post"\s+action="\/contacts\/add\/"\s*>$/', $result);

		$result = $this->Form->input('Contact.name', array('div' => false, 'label' => false));
		$this->assertPattern('/^<input name="data\[Contact\]\[name\]" type="text" maxlength="255" value="" id="ContactName" \/>$/', $result);

		$result = $this->Form->input('Contact.name', array('div' => false, 'label' => 'My label'));
		$this->assertPattern('/^<label for="ContactName">My label<\/label>' .
												 '<input name="data\[Contact\]\[name\]" type="text" maxlength="255" value="" id="ContactName" \/>$/', $result);

		$result = $this->Form->input('Contact.name', array('div' => false, 'label' => array('class' => 'mandatory')));
		$this->assertPattern('/^<label for="ContactName" class="mandatory">Name<\/label>' .
												 '<input name="data\[Contact\]\[name\]" type="text" maxlength="255" value="" id="ContactName" \/>$/', $result);

		$result = $this->Form->input('Contact.name', array('div' => false, 'label' => array('class' => 'mandatory', 'text' => 'My label')));
		$this->assertPattern('/^<label for="ContactName" class="mandatory">My label<\/label>' .
												 '<input name="data\[Contact\]\[name\]" type="text" maxlength="255" value="" id="ContactName" \/>$/', $result);

		$result = $this->Form->input('Contact.name', array('div' => false, 'id' => 'my_id', 'label' => array('for' => 'my_id')));
		$this->assertPattern('/^<label for="my_id">Name<\/label>' .
												 '<input name="data\[Contact\]\[name\]" type="text" id="my_id" maxlength="255" value="" \/>$/', $result);
	}

	function testFormEnd() {
		$this->assertEqual($this->Form->end(), '</form>');

		$result = $this->Form->end('save');
		$this->assertEqual($result, '<div class="submit"><input type="submit" value="save" /></div></form>');

		$result = $this->Form->end(array('submit' => 'save'));
		$this->assertEqual($result, '<div class="submit"><input type="submit" value="save" /></div></form>');
	}

	function testCheckboxField() {
		$this->Form->validationErrors['Model']['field'] = 1;
		$this->Form->data['Model']['field'] = 'myvalue';
		$result = $this->Form->checkbox('Model.field', array('id'=>'theID', 'value' => 'myvalue'));
		$this->assertEqual($result, '<input type="hidden" name="data[Model][field]" value="0" id="theID_" class="form-error" /><input type="checkbox" name="data[Model][field]" type="checkbox" id="theID" value="myvalue" class="form-error" checked="checked" />');

		$this->Form->data['Model']['field'] = '';
		$result = $this->Form->checkbox('Model.field', array('id'=>'theID', 'value' => 'myvalue'));
		$this->assertEqual($result, '<input type="hidden" name="data[Model][field]" value="0" id="theID_" class="form-error" /><input type="checkbox" name="data[Model][field]" type="checkbox" id="theID" value="myvalue" class="form-error" />');

		$this->Form->validationErrors['Model']['field'] = 0;
		$result = $this->Form->checkbox('Model.field', array('value' => 'myvalue'));
		$this->assertEqual($result, '<input type="hidden" name="data[Model][field]" value="0" id="ModelField_" /><input type="checkbox" name="data[Model][field]" type="checkbox" value="myvalue" id="ModelField" />');

		$result = $this->Form->checkbox('Contact.field', array('value' => 'myvalue'));
		$this->assertEqual($result, '<input type="hidden" name="data[Contact][field]" value="0" id="ContactField_" /><input type="checkbox" name="data[Contact][field]" type="checkbox" value="myvalue" id="ContactField" />');

		$result = $this->Form->checkbox('Model.field');
		$this->assertEqual($result, '<input type="hidden" name="data[Model][field]" value="0" id="ModelField_" /><input type="checkbox" name="data[Model][field]" type="checkbox" value="1" id="ModelField" />');

		$this->Form->validationErrors['Model']['field'] = 1;
		$this->Form->data['Contact']['published'] = 1;
		$result = $this->Form->checkbox('Contact.published', array('id'=>'theID'));
		$this->assertEqual($result, '<input type="hidden" name="data[Contact][published]" value="0" id="theID_" /><input type="checkbox" name="data[Contact][published]" type="checkbox" id="theID" value="1" checked="checked" />');

		$this->Form->validationErrors['Model']['field'] = 1;
		$this->Form->data['Contact']['published'] = 0;
		$result = $this->Form->checkbox('Contact.published', array('id'=>'theID'));
		$this->assertEqual($result, '<input type="hidden" name="data[Contact][published]" value="0" id="theID_" /><input type="checkbox" name="data[Contact][published]" type="checkbox" id="theID" value="1" />');
	}

	function tearDown() {
		unset($this->Form);
	}
}
?>