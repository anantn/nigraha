<?php

/* High level actions. Add a function here to add a new request type */

/* Validate temporary password */
function doValidate($req, $res)
{
    $uid = null; $pas = null;
    $uid = $req->getElementsByTagName('userid')->item(0)->nodeValue;
    $pas = $req->getElementsByTagName('passtemp')->item(0)->nodeValue;

    if (($uid == null) or ($pas == null)) {
        sendResponse(201, $res);
    } else {
        if (validateTemp($uid, $pas))
            sendResponse(401, $res);
        else
            sendResponse(301, $res);
    }
}

/* Create Account */
function doCreate($req, $res)
{
    /* Populate array from XML */
    $per = array();
    $per['uid'] = $req->getElementsByTagName('userid')->item(0)->nodeValue;
    $per['ali'] = $req->getElementsByTagName('alias')->item(0)->nodeValue;
    $per['nam'] = $req->getElementsByTagName('name')->item(0)->nodeValue;
    $per['ema'] = $req->getElementsByTagName('email')->item(0)->nodeValue;
    $per['pas'] = $req->getElementsByTagName('password')->item(0)->nodeValue;
    $per['gen'] = $req->getElementsByTagName('gender')->item(0)->nodeValue;
    $per['nat'] = $req->getElementsByTagName('nationality')->item(0)->nodeValue;
    $per['bgp'] = $req->getElementsByTagName('bloodgp')->item(0)->nodeValue;
    $per['mar'] = $req->getElementsByTagName('marital')->item(0)->nodeValue;
    $per['mot'] = $req->getElementsByTagName('mother')->item(0)->getAttribute('name');
    $per['pho'] = $req->getElementsByTagName('phone')->item(0)->nodeValue;
    $per['add'] = $req->getElementsByTagName('paddress')->item(0)->nodeValue;
    $per['res'][0] =
        $req->getElementsByTagName('residence')->item(0)->getAttribute('type');
    $per['res'][1] =
        $req->getElementsByTagName('residence')->item(0)->nodeValue;
    $per['con'][0] =
        $req->getElementsByTagName('concession')->item(0)->getAttribute('type');
    $per['con'][1] =
        $req->getElementsByTagName('concession')->item(0)->nodeValue;
    $per['dep'][0] =
        $req->getElementsByTagName('dept')->item(0)->getAttribute('id');
    $per['dep'][1] =
        $req->getElementsByTagName('dept')->item(0)->getAttribute('semester');
    $per['dep'][2] =
        $req->getElementsByTagName('dept')->item(0)->getAttribute('batch');
    $per['fat'][0] =
        $req->getElementsByTagName('name')->item(1)->nodeValue;
    $per['fat'][1] =
        $req->getElementsByTagName('occupation')->item(0)->nodeValue;

    /* Validate Data */

    /* Required fields */
    if (!$per['uid'] or !$per['ali'] or !$per['nam'] or !$per['ema'] or
        !$per['pas'] or !$per['gen'] or !$per['nat'] or !$per['bgp'] or
        !$per['mar'] or !$per['mot'] or !$per['pho'] or !$per['add'] or
        !$per['dep'][0] or !$per['dep'][1] or !$per['dep'][2] or
        !$per['res'][0] or !$per['res'][1] or
        !$per['con'][0] or !$per['con'][1] or
        !$per['fat'][0] or !$per['fat'][1])
        sendResponse(201, $res);

    /* Validate Email */
    $regexp = "^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$";
    if (!eregi($regexp, $per['ema']))
        sendResponse(201, $res);

    /* Validate Semester */
    if (($per['dep'][1] != '4') and ($per['dep'][1] != '6') and ($per['dep'][1] != '8'))
        sendResponse(201, $res);

    /* Validate Batch */
    if (($per['dep'][2] < 1) or ($per['dep'][2] > 4))
        sendResponse(201, $res);

    /* All Ok, check if Alias is available! */
    if (!checkAlias($per['ali']))
        sendResponse(302, $res);

    if (createAccount($per))
        sendResponse(402, $res);
    else
        sendResponse(501, $res);
}

/* Get Courses */
function dogetCourseInfo($req, $res) 
{
    $code = $req->getAttribute('for');
    if (!$code)
        sendResponse(201, $res);

    $course = getCourseInfo($code);

    if (!$course)
        sendResponse(303, $res);

    $xml = DOMDocument::loadXML($res->asXML());
    $cNode = $xml->createElement('course');
    $cNode = $xml->getElementsByTagName('mnit-response')->item(0)->appendChild($cNode);

    foreach ($course as $key=>$data) {
        $childNode = $xml->createElement($key, $data);
        $cNode->appendChild($childNode);
    }

    $res = simplexml_load_string($xml->saveXML());
    sendResponse(403, $res);
}

?>
