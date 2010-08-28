<?php

error_reporting(E_ALL);
ini_set('error_reporting', E_ALL|E_STRICT);
ini_set('display_errors', true);
set_include_path('./');

// includes
require_once('incs/incs.php');

// find page
if(isset($_GET[GET_PAGE])) {
	$PAGE_FILE=$_GET[GET_PAGE];
	if(!in_array($PAGE_FILE, array_keys($PAGE_LIST))) {
		$PAGE_FILE=$PAGE_DEFAULT_FILE;
	}
}
$PAGE_NAME=$PAGE_LIST[$PAGE_FILE];

// generate the page
ob_start();
include('pages/'.$PAGE_FILE.'.php');
$TEMPLATE_FIELD_PAGE = ob_get_contents();
ob_end_clean();

// generate the shared page that wraps the page
ob_start();
include('pages/_shared.php');
$TEMPLATE_FIELD_BODY = ob_get_contents();
ob_end_clean();

$TEMPLATE_FIELD_COPYRIGHT = COPYRIGHT.', '.LICENSE.'<br/>Powered by '.ATTRIBUTE;
$TEMPLATE_FIELD_COPYRIGHT.= '<br/>'.`git describe`;

// display the page with the template
include('templates/'.TEMPLATE.'/page.php');

?>
