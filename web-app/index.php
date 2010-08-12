<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

// includes
require_once('config.php');
require_once('incs/incs.php');

// find page
if(isset($_GET[GET_PAGE])) {
	$PAGE_NAME=$_GET[GET_PAGE];
	if(!in_array($PAGE_NAME, $PAGE_LIST)) {
		$PAGE_NAME=$PAGE_DEFAULT_NAME;
	}
}

// generate the page
ob_start();
include('pages/'.$PAGE_NAME.'.php');
$TEMPLATE_FIELD_BODY = ob_get_contents();
ob_end_clean();

// display the page with the template
include('templates/'.TEMPLATE.'/page.php');

?>
