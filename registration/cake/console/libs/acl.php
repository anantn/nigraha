<?php
/* SVN FILE: $Id: acl.php 5422 2007-07-09 05:23:06Z phpnut $ */
/**
 * Short description for file.
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2007, Cake Software Foundation, Inc.
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
 * @subpackage		cake.cake.console.libs
 * @since			CakePHP(tm) v 1.2.0.5012
 * @version			$Revision: 5422 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2007-07-09 00:23:06 -0500 (Mon, 09 Jul 2007) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
uses ('controller'.DS.'components'.DS.'acl', 'model'.DS.'db_acl');
/**
 * Shell for ACL management.
 *
 * @package		cake
 * @subpackage	cake.cake.console.libs
 */
class AclShell extends Shell {
/**
 * Contains instance of AclComponent
 *
 * @var object
 * @access public
 */
	var $acl;
/**
/**
 * Contains arguments parsed from the command line.
 *
 * @var array
 * @access public
 */
	var $args;
/**
 * Contains database source to use
 *
 * @var string
 * @access public
 */
	var $dataSource = 'default';
/**
 * Contains tasks to load and instantiate
 *
 * @var array
 * @access public
 */
	var $tasks = array('DbConfig');
/**
 * Override startup of the Shell
 *
 * @access public
 */
	function startup() {
		$this->dataSource = 'default';

		if (isset($this->params['datasource'])) {
			$this->dataSource = $this->params['datasource'];
		}

		if (ACL_CLASSNAME != 'DB_ACL') {
			$out = "--------------------------------------------------\n";
			$out .= __("Error: Your current Cake configuration is set to", true) . "\n";
			$out .= __("an ACL implementation other than DB. Please change", true) . "\n";
			$out .= __("your core config to reflect your decision to use", true) . "\n";
			$out .= __("DB_ACL before attempting to use this script", true) . ".\n";
			$out .= "--------------------------------------------------\n";
			$out .= sprintf(__("Current ACL Classname: %s", true), ACL_CLASSNAME) . "\n";
			$out .= "--------------------------------------------------\n";
			$this->err($out);
			exit();
		}

		if ($this->command && !in_array($this->command, array('help'))) {
			if (!config('database')) {
				$this->out(__("Your database configuration was not found. Take a moment to create one.", true), true);
				$this->args = null;
				return $this->DbConfig->execute();
			}
			require_once (CONFIGS.'database.php');

			if (!in_array($this->command, array('initdb'))) {
				$this->Acl = new AclComponent();
				$controller = null;
				$this->Acl->startup($controller);
			}
		}
	}
/**
 * Override main() for help message hook
 *
 * @access public
 */
	function main() {
		$out  = __("Available ACL commands:", true) . "\n";
		$out .= "\t - create\n";
		$out .= "\t - delete\n";
		$out .= "\t - setParent\n";
		$out .= "\t - getPath\n";
		$out .= "\t - grant\n";
		$out .= "\t - deny\n";
		$out .= "\t - inherit\n";
		$out .= "\t - view\n";
		$out .= "\t - initdb\n";
		$out .= "\t - help\n\n";
		$out .= __("For help, run the 'help' command.  For help on a specific command, run 'help <command>'", true);
		$this->out($out);
	}
/**
 * Creates an ARO/ACO node
 *
 * @access public
 */
	function create() {

		$this->_checkArgs(3, 'create');
		$this->checkNodeType();
		extract($this->__dataVars());

		$class = ucfirst($this->args[0]);
		$object = new $class();

		if (preg_match('/^([\w]+)\.(.*)$/', $this->args[1], $matches) && count($matches) == 3) {
			$parent = array(
				'model' => $matches[1],
				'foreign_key' => $matches[2],
			);
		} else {
			$parent = $this->args[1];
		}

		if (!empty($parent) && $parent != '/' && $parent != 'root') {
			@$parent = $object->node($parent);
			if (empty($parent)) {
				$this->err(sprintf(__('Could not find parent node using reference "%s"', true), $this->args[1]));
				return;
			} else {
				$parent = Set::extract($parent, "0.{$class}.id");
			}
		} else {
			$parent = null;
		}

		if (preg_match('/^([\w]+)\.(.*)$/', $this->args[2], $matches) && count($matches) == 3) {
			$data = array(
				'model' => $matches[1],
				'foreign_key' => $matches[2],
			);
		} else {
			if (!($this->args[2] == '/')) {
				$data = array('alias' => $this->args[2]);
			} else {
				$this->error(__('/ can not be used as an alias!', true), __('\t/ is the root, please supply a sub alias', true));
			}
		}

		$data['parent_id'] = $parent;
		$object->create();

		if ($object->save($data)) {
			$this->out(sprintf(__("New %s '%s' created.\n", true), $class, $this->args[2]), true);
		} else {
			$this->err(sprintf(__("There was a problem creating a new %s '%s'.", true), $class, $this->args[2]));
		}
	}
/**
 * Delete an ARO/ACO node.
 *
 * @access public
 */
	function delete() {
		$this->_checkArgs(2, 'delete');
		$this->checkNodeType();
		extract($this->__dataVars());
		if (!$this->Acl->{$class}->delete($this->args[1])) {
			$this->error(__("Node Not Deleted", true), sprintf(__("There was an error deleting the %s. Check that the node exists", true), $class) . ".\n");
		}
		$this->out(sprintf(__("%s deleted", true), $class) . ".\n", true);
	}

/**
 * Set parent for an ARO/ACO node.
 *
 * @access public
 */
	function setParent() {
		$this->_checkArgs(3, 'setParent');
		$this->checkNodeType();
		extract($this->__dataVars());
		if (!$this->Acl->{$class}->setParent($this->args[2], $this->args[1])) {
			$this->out(__("Error in setting new parent. Please make sure the parent node exists, and is not a descendant of the node specified.", true), true);
		} else {
			$this->out(sprintf(__("Node parent set to %s", true), $this->args[2]) . "\n", true);
		}
	}
/**
 * Get path to specified ARO/ACO node.
 *
 * @access public
 */
	function getPath() {
		$this->_checkArgs(2, 'getPath');
		$this->checkNodeType();
		extract($this->__dataVars());
		$id = ife(is_numeric($this->args[1]), intval($this->args[1]), $this->args[1]);
		$nodes = $this->Acl->{$class}->getPath($id);
		if (empty($nodes)) {
			$this->error(sprintf(__("Supplied Node '%s' not found", true), $this->args[1]), __("No tree returned.", true));
		}
		for ($i = 0; $i < count($nodes); $i++) {
			$this->out(str_repeat('  ', $i) . "[" . $nodes[$i][$class]['id'] . "]" . $nodes[$i][$class]['alias'] . "\n");
		}
	}
/**
 * Grant permission for a given ARO to a given ACO.
 *
 * @access public
 */
	function grant() {
		$this->_checkArgs(3, 'grant');
		//add existence checks for nodes involved
		$aro = ife(is_numeric($this->args[0]), intval($this->args[0]), $this->args[0]);
		$aco = ife(is_numeric($this->args[1]), intval($this->args[1]), $this->args[1]);
		if ($this->Acl->allow($aro, $aco, $this->args[2])) {
			$this->out(__("Permission granted.", true), true);
		}
	}
/**
 * Deny access for an ARO to an ACO.
 *
 * @access public
 */
	function deny() {
		$this->_checkArgs(3, 'deny');
		//add existence checks for nodes involved
		$aro = ife(is_numeric($this->args[0]), intval($this->args[0]), $this->args[0]);
		$aco = ife(is_numeric($this->args[1]), intval($this->args[1]), $this->args[1]);
		$this->Acl->deny($aro, $aco, $this->args[2]);
		$this->out(__("Requested permission successfully denied.", true), true);
	}
/**
 * Set an ARO to inhermit permission to an ACO.
 *
 * @access public
 */
	function inherit() {
		$this->_checkArgs(3, 'inherit');
		$aro = ife(is_numeric($this->args[0]), intval($this->args[0]), $this->args[0]);
		$aco = ife(is_numeric($this->args[1]), intval($this->args[1]), $this->args[1]);
		$this->Acl->inherit($aro, $aco, $this->args[2]);
		$this->out(__("Requested permission successfully inherited.", true), true);
	}
/**
 * Show a specific ARO/ACO node.
 *
 * @access public
 */
	function view() {
		$this->_checkArgs(1, 'view');
		$this->checkNodeType();
		extract($this->__dataVars());
		if (isset($this->args[1]) && !is_null($this->args[1])) {
			$key = ife(is_numeric($this->args[1]), $secondary_id, 'alias');
			$conditions = array($class . '.' . $key => $this->args[1]);
		} else {
			$conditions = null;
		}
		$nodes = $this->Acl->{$class}->findAll($conditions, null, 'lft ASC');
		if (empty($nodes)) {
			$this->error(sprintf(__("%s not found", true), $this->args[1]), __("No tree returned.", true));
		}
		$this->out($class . " tree:");
		$this->hr();
		$nodeCount = count($nodes);
		$right = $left = array();
		for ($i = 0; $i < $nodeCount; $i++) {
			$count = 0;
			$right[$i] = $nodes[$i][$class]['rght'];
			$left[$i] = $nodes[$i][$class]['lft'];
			if (isset($left[$i]) && isset($left[$i-1]) && $left[$i] > $left[$i-1]) {
				array_pop($left);
				$count = count($left);
			}
			if (isset($right[$i]) && isset($right[$i-1]) && $right[$i] < $right[$i-1]) {
				array_pop($right);
				$count = count($right);
			}

			$this->out(str_repeat('  ', $count) . "[" . $nodes[$i][$class]['id'] . "]" . $nodes[$i][$class]['alias']."\n");
			$right[] = $nodes[$i][$class]['rght'];
		}
		$this->hr();
	}
/**
 * Initialize ACL database.
 *
 * @access public
 */
	function initdb() {
		$db =& ConnectionManager::getDataSource($this->dataSource);
		$this->out(__("Initializing Database...", true), true);
		$this->out(__("Creating access control objects table (acos)...", true), true);
		$sql = " CREATE TABLE ".$db->fullTableName('acos')." (
				".$db->name('id')." ".$db->column($db->columns['primary_key']).",
				".$db->name('parent_id')." ".$db->column($db->columns['integer'])." default NULL,
				".$db->name('model')." ".$db->column($db->columns['string'])." default '',
				".$db->name('foreign_key')." ".$db->column($db->columns['integer'])." default NULL,
				".$db->name('alias')." ".$db->column($db->columns['string'])." default '',
				".$db->name('lft')." ".$db->column($db->columns['integer'])." default NULL,
				".$db->name('rght')." ".$db->column($db->columns['integer'])." default NULL,
				PRIMARY KEY  (".$db->name('id').")
				)";
		if ($db->query($sql) === false) {
			die("Error: " . $db->lastError() . "\n\n");
		}

		$this->out(__("Creating access request objects table (aros)...", true), true);
		$sql2 = "CREATE TABLE ".$db->fullTableName('aros')." (
				".$db->name('id')." ".$db->column($db->columns['primary_key']).",
				".$db->name('parent_id')." ".$db->column($db->columns['integer'])." default NULL,
				".$db->name('model')." ".$db->column($db->columns['string'])." default '',
				".$db->name('foreign_key')." ".$db->column($db->columns['integer'])." default NULL,
				".$db->name('alias')." ".$db->column($db->columns['string'])." default '',
				".$db->name('lft')." ".$db->column($db->columns['integer'])." default NULL,
				".$db->name('rght')." ".$db->column($db->columns['integer'])." default NULL,
				PRIMARY KEY  (".$db->name('id').")
				)";
		if ($db->query($sql2) === false) {
			die("Error: " . $db->lastError() . "\n\n");
		}

		$this->out(__("Creating relationships table (aros_acos)...", true), true);
		$sql3 = "CREATE TABLE ".$db->fullTableName('aros_acos')." (
				".$db->name('id')." ".$db->column($db->columns['primary_key']).",
				".$db->name('aro_id')." ".$db->column($db->columns['integer'])." default NULL,
				".$db->name('aco_id')." ".$db->column($db->columns['integer'])." default NULL,
				".$db->name('_create')." ".$db->column($db->columns['integer'])." default '0' NOT NULL,
				".$db->name('_read')." ".$db->column($db->columns['integer'])." default '0' NOT NULL,
				".$db->name('_update')." ".$db->column($db->columns['integer'])." default '0' NOT NULL,
				".$db->name('_delete')." ".$db->column($db->columns['integer'])." default '0' NOT NULL,
				PRIMARY KEY  (".$db->name('id').")
				)";
		if ($db->query($sql3) === false) {
			die("Error: " . $db->lastError() . "\n\n");
		}

		$this->out("\n" . __("Done.", true), true);
	}

/**
 * Show help screen.
 *
 * @access public
 */
	function help() {
		$head  = __("Usage: cake acl <command> <arg1> <arg2>...", true) . "\n";
		$head .= "-----------------------------------------------\n";
		$head .= __("Commands:", true) . "\n\n";

		$commands = array(
			'create' => "\tcreate aro|aco <parent> <node>\n" .
						"\t\t" . __("Creates a new ACL object <node> under the parent specified by <parent>, an id/alias.", true) . "\n" .
						"\t\t" . __("The <parent> and <node> references can be in one of the following formats:", true) . "\n" .
						"\t\t\t- " . __("<model>.<id> - The node will be bound to a specific record of the given model", true) . "\n" .
						"\t\t\t- " . __("<alias> - The node will be given a string alias (or path, in the case of <parent>),", true) . "\n" .
						"\t\t\t  " . __("i.e. 'John'.  When used with <parent>, this takes the form of an alias path,", true) . "\n" .
						"\t\t\t  " . __("i.e. <group>/<subgroup>/<parent>.", true) . "\n" .
						"\t\t" . __("To add a node at the root level, enter 'root' or '/' as the <parent> parameter.", true) . "\n",

			'delete' =>	"\tdelete aro|aco <node>\n" .
						"\t\t" . __("Deletes the ACL object with the given <node> reference (see 'create' for info on node references).", true) . "\n",

			'setparent' => "\tsetParent aro|aco <node> <parent>\n" .
							"\t\t" . __("Moves the ACL object specified by <node> beneath the parent ACL object specified by <parent>.", true) . "\n",

			'getpath' => "\tgetPath aro|aco <node>\n" .
						"\t\t" . __("Returns the path to the ACL object specified by <node>. This command", true) . "\n" .
						"\t\t" . __("is useful in determining the inhertiance of permissions for a certain", true) . "\n" .
						"\t\t" . __("object in the tree.", true) . "\n",

			'grant' =>	"\tgrant <aro_id> <aco_id> [<aco_action>] " . __("or", true) . " '*' " . __("(quotes required)", true) . "\n" .
						"\t\t" . __("Use this command to grant ACL permissions. Once executed, the ARO", true) . "\n" .
						"\t\t" . __("specified (and its children, if any) will have ALLOW access to the", true) . "\n" .
						"\t\t" . __("specified ACO action (and the ACO's children, if any).", true) . "\n",

			'deny' =>	"\tdeny <aro_id> <aco_id> [<aco_action>]\n" .
						"\t\t" . __("Use this command to deny ACL permissions. Once executed, the ARO", true) . "\n" .
						"\t\t" . __("specified (and its children, if any) will have DENY access to the", true) . "\n" .
						"\t\t" . __("specified ACO action (and the ACO's children, if any).", true) . "\n",

			'inherit' =>	"\tinherit <aro_id> <aco_id> [<aco_action>]\n" .
							"\t\t" . __("Use this command to force a child ARO object to inherit its", true) . "\n" .
							"\t\t" . __("permissions settings from its parent.", true) . "\n",

			'view' =>	"\tview aro|aco [<node>]\n" .
						"\t\t" . __("The view command will return the ARO or ACO tree. The optional", true) . "\n" .
						"\t\t" . __("id/alias parameter allows you to return only a portion of the requested tree.", true) . "\n",

			'initdb' =>	"\tinitdb\n".
						"\t\t" . __("Use this command to create the database tables needed to use DB ACL.", true) . "\n",

			'help' => 	"\thelp [<command>]\n" .
						"\t\t" . __("Displays this help message, or a message on a specific command.", true) . "\n"
		);

		$this->out($head);
		if (!isset($this->args[0])) {
			foreach ($commands as $cmd) {
				$this->out("{$cmd}\n\n");
			}
		} elseif (isset($commands[low($this->args[0])])) {
			$this->out($commands[low($this->args[0])] . "\n\n");
		} else {
			$this->out(sprintf(__("Command '%s' not found", true), $this->args[0]));
		}
	}
/**
 * Check that first argument specifies a valid Node type (ARO/ACO)
 *
 * @access public
 */
	function checkNodeType() {
		if (!isset($this->args[0])) {
			return false;
		}
		if ($this->args[0] != 'aco' && $this->args[0] != 'aro') {
			$this->error(sprintf(__("Missing/Unknown node type: '%s'", true), $this->args[1]), __('Please specify which ACL object type you wish to create.', true));
		}
	}
/**
 * Checks that given node exists
 *
 * @param string $type Node type (ARO/ACO)
 * @param int $id Node id
 * @return boolean Success
 * @access public
 */
	function nodeExists() {
		if (!$this->checkNodeType() && !isset($this->args[1])) {
			return false;
		}
		extract($this->__dataVars($this->args[0]));
		$key = (ife(is_numeric($this->args[1]), $secondary_id, 'alias'));
		$conditions = array($class . '.' . $key => $this->args[1]);
		$possibility = $this->Acl->{$class}->findAll($conditions);
		if (empty($possibility)) {
			$this->error(sprintf(__("%s not found", true), $this->args[1]), __("No tree returned.", true));
		}
		return $possibility;
	}

/**
 * Build data parameters based on node type
 *
 * @param string $type Node type  (ARO/ACO)
 * @return array Variables
 * @access private
 */
	function __dataVars($type = null) {
		if ($type == null) {
			$type = $this->args[0];
		}
		$vars = array();
		$class = ucwords($type);
		$vars['secondary_id'] = ife(strtolower($class) == 'aro', 'foreign_key', 'object_id');
		$vars['data_name'] = $type;
		$vars['table_name'] = $type . 's';
		$vars['class'] = $class;
		return $vars;
	}
}
?>