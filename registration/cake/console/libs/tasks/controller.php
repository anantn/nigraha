<?php
/* SVN FILE: $Id: controller.php 5422 2007-07-09 05:23:06Z phpnut $ */
/**
 * The ControllerTask handles creating and updating controller files.
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2007,	Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2007, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake.console.libs.tasks
 * @since			CakePHP(tm) v 1.2
 * @version			$Revision: 5422 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2007-07-09 00:23:06 -0500 (Mon, 09 Jul 2007) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Task class for creating and updating controller files.
 *
 * @package		cake
 * @subpackage	cake.cake.console.libs.tasks
 */
class ControllerTask extends Shell {
/**
 * Tasks to be loaded by this Task
 *
 * @var array
 */
	var $tasks = array('Project');
/**
 * Override initialize
 *
 * @return void
 */
	function initialize() {}
/**
 * Execution method always used for tasks
 *
 * @return void
 */
	function execute() {
		if (empty($this->args)) {
			$this->__interactive();
		}

		if (isset($this->args[0])) {
			$controller = Inflector::camelize($this->args[0]);
			$actions = null;
			if (isset($this->args[1]) && $this->args[1] == 'scaffold') {
				$this->out('Baking scaffold for ' . $controller);
				$actions = $this->__bakeActions($controller);
			} else {
				$actions = 'scaffold';
			}
			if (isset($this->args[2]) && $this->args[2] == 'admin') {
				if ($admin = $this->getAdmin()) {
					$this->out('Adding ' . CAKE_ADMIN .' methods');
					if ($actions == 'scaffold') {
						$actions = $this->__bakeActions($controller, $admin);
					} else {
						$actions .= $this->__bakeActions($controller, $admin);
					}
				}
			}
			$baked = $this->__bake($controller, $actions);
			$this->__bakeTest($controller);
		}
	}
/**
 * Interactive
 *
 * @return void
 */
	function __interactive() {
		$this->interactive = false;
		$this->hr();
		$this->out('Controller Bake:');
		$this->hr();
		$uses = array();
		$helpers = array();
		$components = array();
		$wannaUseSession = 'y';
		$wannaDoAdmin = 'n';
		$wannaUseScaffold = 'n';
		$wannaDoScaffolding = 'y';

		$controllerName = $this->getName();

		$controllerPath = low(Inflector::underscore($controllerName));

		$doItInteractive = $this->in("Would you like bake to build your controller interactively?\nWarning: Choosing no will overwrite {$controllerName} controller if it exist.", array('y','n'), 'y');

		if (low($doItInteractive) == 'y' || low($doItInteractive) == 'yes') {
			$this->interactive = true;

			$wannaUseScaffold = $this->in("Would you like to use scaffolding?", array('y','n'), 'y');

			if (low($wannaUseScaffold) == 'n' || low($wannaUseScaffold) == 'no') {

				$wannaDoScaffolding = $this->in("Would you like to include some basic class methods (index(), add(), view(), edit())?", array('y','n'), 'n');

				if (low($wannaDoScaffolding) == 'y' || low($wannaDoScaffolding) == 'yes') {
					$wannaDoAdmin = $this->in("Would you like to create the methods for admin routing?", array('y','n'), 'n');
				}

				$wannaDoUses = $this->in("Would you like this controller to use other models besides '" . $this->_modelName($controllerName) .  "'?", array('y','n'), 'n');

				if (low($wannaDoUses) == 'y' || low($wannaDoUses) == 'yes') {
					$usesList = $this->in("Please provide a comma separated list of the classnames of other models you'd like to use.\nExample: 'Author, Article, Book'");
					$usesListTrimmed = str_replace(' ', '', $usesList);
					$uses = explode(',', $usesListTrimmed);
				}
				$wannaDoHelpers = $this->in("Would you like this controller to use other helpers besides HtmlHelper and FormHelper?", array('y','n'), 'n');

				if (low($wannaDoHelpers) == 'y' || low($wannaDoHelpers) == 'yes') {
					$helpersList = $this->in("Please provide a comma separated list of the other helper names you'd like to use.\nExample: 'Ajax, Javascript, Time'");
					$helpersListTrimmed = str_replace(' ', '', $helpersList);
					$helpers = explode(',', $helpersListTrimmed);
				}
				$wannaDoComponents = $this->in("Would you like this controller to use any components?", array('y','n'), 'n');

				if (low($wannaDoComponents) == 'y' || low($wannaDoComponents) == 'yes') {
					$componentsList = $this->in("Please provide a comma separated list of the component names you'd like to use.\nExample: 'Acl, MyNiftyHelper'");
					$componentsListTrimmed = str_replace(' ', '', $componentsList);
					$components = explode(',', $componentsListTrimmed);
				}

				$wannaUseSession = $this->in("Would you like to use Sessions?", array('y','n'), 'y');
			} else {
				$wannaDoScaffolding = 'n';
			}
		} else {
			$wannaDoScaffolding = $this->in("Would you like to include some basic class methods (index(), add(), view(), edit())?", array('y','n'), 'y');

			if (low($wannaDoScaffolding) == 'y' || low($wannaDoScaffolding) == 'yes') {
				$wannaDoAdmin = $this->in("Would you like to create the methods for admin routing?", array('y','n'), 'y');
			}
		}
		$admin = false;

		if ((low($wannaDoAdmin) == 'y' || low($wannaDoAdmin) == 'yes')) {
			$admin = $this->getAdmin();
		}

		if (low($wannaDoScaffolding) == 'y' || low($wannaDoScaffolding) == 'yes') {
			$actions = $this->__bakeActions($controllerName, null, $wannaUseSession);
			if ($admin) {
				$actions .= $this->__bakeActions($controllerName, $admin, $wannaUseSession);
			}
		}

		if ($this->interactive === true) {
			$this->out('');
			$this->hr();
			$this->out('The following controller will be created:');
			$this->hr();
			$this->out("Controller Name:	$controllerName");

			if (low($wannaUseScaffold) == 'y' || low($wannaUseScaffold) == 'yes') {
				$this->out("		var \$scaffold;");
				$actions = 'scaffold';
			}
			if (count($uses)) {
				$this->out("Uses:            ", false);

				foreach ($uses as $use) {
					if ($use != $uses[count($uses) - 1]) {
						$this->out(ucfirst($use) . ", ", false);
					} else {
						$this->out(ucfirst($use));
					}
				}
			}

			if (count($helpers)) {
				$this->out("Helpers:			", false);

				foreach ($helpers as $help) {
					if ($help != $helpers[count($helpers) - 1]) {
						$this->out(ucfirst($help) . ", ", false);
					} else {
						$this->out(ucfirst($help));
					}
				}
			}

			if (count($components)) {
				$this->out("Components:            ", false);

				foreach ($components as $comp) {
					if ($comp != $components[count($components) - 1]) {
						$this->out(ucfirst($comp) . ", ", false);
					} else {
						$this->out(ucfirst($comp));
					}
				}
			}
			$this->hr();
			$looksGood = $this->in('Look okay?', array('y','n'), 'y');

			if (low($looksGood) == 'y' || low($looksGood) == 'yes') {
				$baked = $this->__bake($controllerName, $actions, $helpers, $components, $uses);
				if ($baked && $this->_checkUnitTest()) {
					$this->__bakeTest($controllerName);
				}
			} else {
				$this->out('Bake Aborted.');
			}
		} else {
			$baked = $this->__bake($controllerName, $actions, $helpers, $components, $uses);
			if ($baked && $this->_checkUnitTest()) {
				$this->__bakeTest($controllerName);
			}
		}
	}

	function __bakeActions($controllerName, $admin = null, $wannaUseSession = 'y') {
		$currentModelName = $this->_modelName($controllerName);
		if (!loadModel($currentModelName)) {
			$this->out('You must have a model for this class to build scaffold methods. Please try again.');
			exit;
		}
		$actions = null;
		$modelObj =& new $currentModelName();
		$controllerPath = $this->_controllerPath($controllerName);
		$pluralName = $this->_pluralName($currentModelName);
		$singularName = $this->_singularName($currentModelName);
		$singularHumanName = $this->_singularHumanName($currentModelName);
		$pluralHumanName = $this->_pluralHumanName($controllerName);
		$actions .= "\n";
		$actions .= "\tfunction {$admin}index() {\n";
		$actions .= "\t\t\$this->{$currentModelName}->recursive = 0;\n";
		$actions .= "\t\t\$this->set('{$pluralName}', \$this->paginate());\n";
		$actions .= "\t}\n";
		$actions .= "\n";
		$actions .= "\tfunction {$admin}view(\$id = null) {\n";
		$actions .= "\t\tif (!\$id) {\n";
		if (low($wannaUseSession) == 'y' || low($wannaUseSession) == 'yes') {
			$actions .= "\t\t\t\$this->Session->setFlash('Invalid {$singularHumanName}.');\n";
			$actions .= "\t\t\t\$this->redirect(array('action'=>'index'), null, true);\n";
		} else {
			$actions .= "\t\t\t\$this->flash('Invalid {$singularHumanName}', array('action'=>'index'));\n";
		}
		$actions .= "\t\t}\n";
		$actions .= "\t\t\$this->set('".$singularName."', \$this->{$currentModelName}->read(null, \$id));\n";
		$actions .= "\t}\n";
		$actions .= "\n";

		/* ADD ACTION */
		$compact = array();
		$actions .= "\tfunction {$admin}add() {\n";
		$actions .= "\t\tif (!empty(\$this->data)) {\n";
		$actions .= "\t\t\t\$this->cleanUpFields();\n";
		$actions .= "\t\t\t\$this->{$currentModelName}->create();\n";
		$actions .= "\t\t\tif (\$this->{$currentModelName}->save(\$this->data)) {\n";
		if (low($wannaUseSession) == 'y' || low($wannaUseSession) == 'yes') {
			$actions .= "\t\t\t\t\$this->Session->setFlash('The ".$singularHumanName." has been saved');\n";
			$actions .= "\t\t\t\t\$this->redirect(array('action'=>'index'), null, true);\n";
		} else {
			$actions .= "\t\t\t\t\$this->flash('{$currentModelName} saved.', array('action'=>'index'));\n";
			$actions .= "\t\t\t\texit();\n";
		}
		$actions .= "\t\t\t} else {\n";
		if (low($wannaUseSession) == 'y' || low($wannaUseSession) == 'yes') {
			$actions .= "\t\t\t\t\$this->Session->setFlash('The {$singularHumanName} could not be saved. Please, try again.');\n";
		}
		$actions .= "\t\t\t}\n";
		$actions .= "\t\t}\n";
		foreach ($modelObj->hasAndBelongsToMany as $associationName => $relation) {
			if (!empty($associationName)) {
				$habtmModelName = $this->_modelName($associationName);
				$habtmSingularName = $this->_singularName($associationName);
				$habtmPluralName = $this->_pluralName($associationName);
				$actions .= "\t\t\${$habtmPluralName} = \$this->{$currentModelName}->{$habtmModelName}->generateList();\n";
				$compact[] = "'{$habtmPluralName}'";
			}
		}
		foreach ($modelObj->belongsTo as $associationName => $relation) {
			if (!empty($associationName)) {
				$belongsToModelName = $this->_modelName($associationName);
				$belongsToPluralName = $this->_pluralName($associationName);
				$actions .= "\t\t\${$belongsToPluralName} = \$this->{$currentModelName}->{$belongsToModelName}->generateList();\n";
				$compact[] = "'{$belongsToPluralName}'";
			}
		}
		if (!empty($compact)) {
			$actions .= "\t\t\$this->set(compact(".join(', ', $compact)."));\n";
		}
		$actions .= "\t}\n";
		$actions .= "\n";

		/* EDIT ACTION */
		$compact = array();
		$actions .= "\tfunction {$admin}edit(\$id = null) {\n";
		$actions .= "\t\tif (!\$id && empty(\$this->data)) {\n";
		if (low($wannaUseSession) == 'y' || low($wannaUseSession) == 'yes') {
			$actions .= "\t\t\t\$this->Session->setFlash('Invalid {$singularHumanName}');\n";
			$actions .= "\t\t\t\$this->redirect(array('action'=>'index'), null, true);\n";
		} else {
			$actions .= "\t\t\t\$this->flash('Invalid {$singularHumanName}', array('action'=>'index'));\n";
			$actions .= "\t\t\texit();\n";
		}
		$actions .= "\t\t}\n";
		$actions .= "\t\tif (!empty(\$this->data)) {\n";
		$actions .= "\t\t\t\$this->cleanUpFields();\n";
		$actions .= "\t\t\tif (\$this->{$currentModelName}->save(\$this->data)) {\n";
		if (low($wannaUseSession) == 'y' || low($wannaUseSession) == 'yes') {
			$actions .= "\t\t\t\t\$this->Session->setFlash('The ".$singularHumanName." saved');\n";
			$actions .= "\t\t\t\t\$this->redirect(array('action'=>'index'), null, true);\n";
		} else {
			$actions .= "\t\t\t\t\$this->flash('The ".$singularHumanName." saved.', array('action'=>'index'));\n";
			$actions .= "\t\t\t\texit();\n";
		}
		$actions .= "\t\t\t} else {\n";
		if (low($wannaUseSession) == 'y' || low($wannaUseSession) == 'yes') {
			$actions .= "\t\t\t\t\$this->Session->setFlash('The {$singularHumanName} could not be saved. Please, try again.');\n";
		}
		$actions .= "\t\t\t}\n";
		$actions .= "\t\t}\n";
		$actions .= "\t\tif (empty(\$this->data)) {\n";
		$actions .= "\t\t\t\$this->data = \$this->{$currentModelName}->read(null, \$id);\n";
		$actions .= "\t\t}\n";

		foreach ($modelObj->hasAndBelongsToMany as $associationName => $relation) {
			if (!empty($associationName)) {
				$habtmModelName = $this->_modelName($associationName);
				$habtmSingularName = $this->_singularName($associationName);
				$habtmPluralName = $this->_pluralName($associationName);
				$actions .= "\t\t\${$habtmPluralName} = \$this->{$currentModelName}->{$habtmModelName}->generateList();\n";
				$compact[] = "'{$habtmPluralName}'";
			}
		}
		foreach ($modelObj->belongsTo as $associationName => $relation) {
			if (!empty($associationName)) {
				$belongsToModelName = $this->_modelName($associationName);
				$belongsToPluralName = $this->_pluralName($associationName);
				$actions .= "\t\t\${$belongsToPluralName} = \$this->{$currentModelName}->{$belongsToModelName}->generateList();\n";
				$compact[] = "'{$belongsToPluralName}'";
			}
		}
		if (!empty($compact)) {
			$actions .= "\t\t\$this->set(compact(".join(',', $compact)."));\n";
		}
		$actions .= "\t}\n";
		$actions .= "\n";
		$actions .= "\tfunction {$admin}delete(\$id = null) {\n";
		$actions .= "\t\tif (!\$id) {\n";
		if (low($wannaUseSession) == 'y' || low($wannaUseSession) == 'yes') {
			$actions .= "\t\t\t\$this->Session->setFlash('Invalid id for {$singularHumanName}');\n";
			$actions .= "\t\t\t\$this->redirect(array('action'=>'index'), null, true);\n";
		} else {
			$actions .= "\t\t\t\$this->flash('Invalid {$singularHumanName}', array('action'=>'index'));\n";
		}
		$actions .= "\t\t}\n";
		$actions .= "\t\tif (\$this->{$currentModelName}->del(\$id)) {\n";
		if (low($wannaUseSession) == 'y' || low($wannaUseSession) == 'yes') {
			$actions .= "\t\t\t\$this->Session->setFlash('".$singularHumanName." #'.\$id.' deleted');\n";
			$actions .= "\t\t\t\$this->redirect(array('action'=>'index'), null, true);\n";
		} else {
			$actions .= "\t\t\t\$this->flash('".$singularHumanName." #'.\$id.' deleted', array('action'=>'index'));\n";
		}
		$actions .= "\t\t}\n";
		$actions .= "\t}\n";
		$actions .= "\n";
		return $actions;
	}


/**
 * Assembles and writes a Controller file.
 *
 * @param string $controllerName
 * @param array $uses
 * @param array $helpers
 * @param array $components
 * @param string $actions
 */
	function __bake($controllerName, $actions = '', $helpers = null, $components = null, $uses = null) {
		$out = "<?php\n";
		$out .= "class $controllerName" . "Controller extends AppController {\n\n";
		$out .= "\tvar \$name = '$controllerName';\n";

		if (low($actions) == 'scaffold') {
			$out .= "\tvar \$scaffold;\n";
		} else {

			if (count($uses)) {
				$out .= "\tvar \$uses = array('" . $this->_modelName($controllerName) . "', ";

				foreach ($uses as $use) {
					if ($use != $uses[count($uses) - 1]) {
						$out .= "'" . $this->_modelName($use) . "', ";
					} else {
						$out .= "'" . $this->_modelName($use) . "'";
					}
				}
				$out .= ");\n";
			}

			$out .= "\tvar \$helpers = array('Html', 'Form' ";
			if (count($helpers)) {
				foreach ($helpers as $help) {
					if ($help != $helpers[count($helpers) - 1]) {
						$out .= ", '" . Inflector::camelize($help) . "'";
					} else {
						$out .= ", '" . Inflector::camelize($help) . "'";
					}
				}
			}
			$out .= ");\n";

			if (count($components)) {
				$out .= "\tvar \$components = array(";

				foreach ($components as $comp) {
					if ($comp != $components[count($components) - 1]) {
						$out .= "'" . Inflector::camelize($comp) . "', ";
					} else {
						$out .= "'" . Inflector::camelize($comp) . "'";
					}
				}
				$out .= ");\n";
			}
			$out .= $actions;
		}
		$out .= "}\n";
		$out .= "?>";
		$filename = CONTROLLERS . $this->_controllerPath($controllerName) . '_controller.php';
		return $this->createFile($filename, $out);
	}
/**
 * Assembles and writes a unit test file.
 *
 * @param string $className
 */
	function __bakeTest($className) {
		$out = '<?php '."\n\n";
		$out .= "loadController('$className');\n\n";
		$out .= "class {$className}ControllerTestCase extends CakeTestCase {\n";
		$out .= "\tvar \$TestObject = null;\n\n";
		$out .= "\tfunction setUp() {\n\t\t\$this->TestObject = new {$className}Controller();\n";
		$out .= "\t}\n\n\tfunction tearDown() {\n\t\tunset(\$this->TestObject);\n\t}\n";
		$out .= "\n\t/*\n\tfunction testMe() {\n";
		$out .= "\t\t\$result = \$this->TestObject->index();\n";
		$out .= "\t\t\$expected = 1;\n";
		$out .= "\t\t\$this->assertEqual(\$result, \$expected);\n\t}\n\t*/\n}";
		$out .= "\n?>";

		$path = CONTROLLER_TESTS;
		$filename = $this->_pluralName($className).'_controller.test.php';

		$this->out("Baking unit test for $className...");
		$Folder =& new Folder($path, true);
		if ($path = $Folder->cd($path)) {
			$path = $Folder->slashTerm($path);
			return $this->createFile($path . $filename, $out);
		}
		return false;
	}
/**
 * outputs the a list of possible models or controllers from database
 *
 * @param string $useDbConfig
 * @param string $type = Models or Controllers
 * @return output
 */
	function listAll($useDbConfig = 'default') {
		$db =& ConnectionManager::getDataSource($useDbConfig);
		$usePrefix = empty($db->config['prefix']) ? '' : $db->config['prefix'];
		if ($usePrefix) {
			$tables = array();
			foreach ($db->listSources() as $table) {
				if (!strncmp($table, $usePrefix, strlen($usePrefix))) {
					$tables[] = substr($table, strlen($usePrefix));
				}
			}
		} else {
			$tables = $db->listSources();
		}
		$this->__tables = $tables;
		$this->out('Possible Models based on your current database:');
		$this->_controllerNames = array();
		$count = count($tables);
		for ($i = 0; $i < $count; $i++) {
			$this->_controllerNames[] = $this->_controllerName($this->_modelName($tables[$i]));
			$this->out($i + 1 . ". " . $this->_controllerNames[$i]);
		}
		return $this->_controllerNames;
	}

/**
 * Forces the user to specify the controller he wants to bake, and returns the selected controller name.
 *
 * @return the controller name
 */
	function getName() {
		$useDbConfig = 'default';
		$controllers = $this->listAll($useDbConfig, 'Controllers');

		$enteredController = '';

		while ($enteredController == '') {
			$enteredController = $this->in('Enter a number from the list above, or type in the name of another controller.');

			if ($enteredController == '' || intval($enteredController) > count($controllers)) {
				$this->out('Error:');
				$this->out("The Controller name you supplied was empty, or the number \nyou selected was not an option. Please try again.");
				$enteredController = '';
			}
		}

		if (intval($enteredController) > 0 && intval($enteredController) <= count($controllers) ) {
			$controllerName = $controllers[intval($enteredController) - 1];
		} else {
			$controllerName = Inflector::camelize($enteredController);
		}

		return $controllerName;
	}
/**
 * Displays help contents
 *
 * @return void
 */
	function help() {
		$this->hr();
		$this->out("Usage: cake bake controller <arg1> <arg2>...");
		$this->hr();
		$this->out('Commands:');
		$this->out("\n\tcontroller <name>\n\t\tbakes controller with var \$scaffold");
		$this->out("\n\tcontroller <name> scaffold\n\t\tbakes controller with scaffold actions.\n\t\t(index, view, add, edit, delete)");
		$this->out("\n\tcontroller <name> scaffold admin\n\t\tbakes a controller with scaffold actions for both public and CAKE_ADMIN");
		$this->out("\n\tcontroller <name> null admin\n\t\tbakes a controller with scaffold actions for CAKE_ADMIN");
		$this->out("");
		exit();
	}
}
?>