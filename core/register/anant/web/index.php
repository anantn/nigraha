<?php

require_once 'helper.php';
require_once 'actions.php';

ob_start();
$res = simplexml_load_file('response.xml');
$req = DOMDocument::loadXML(urldecode($HTTP_RAW_POST_DATA));
//$req = DOMDocument::load('getCourseReq.xml');
$root = $req->getElementsByTagName('mnit-request')->item(0);

/* Check HTTP method and API Key */
if ($_SERVER['REQUEST_METHOD'] != 'POST')
    sendResponse(101, $res);
$api = $root->getAttribute('api');
if (($api != 'adobeflex2') and ($api != 'standardjs'))
    sendResponse(102, $res);

/* Process Request */
$type = $root->getAttribute('type');

switch($type) {
    case 'validate':        doValidate($root, $res);
                            break;
    case 'create':          doCreate($root, $res);
                            break;
    case 'getCourseInfo':   dogetCourseInfo($root, $res);
                            break;
    default:                sendResponse(101, $res);
                            break;
}


?>
