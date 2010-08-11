<?php

/* valid pages */
$PAGE_LIST=array(
	'access_resources',
	'manage_resource_ranges',
	'manage_resource_types',
	'manage_resource',
	'manage_users'
);

/* includes */
require_once('incs.php');

/* find page */
$PAGE_DEFAULT_NAME='access_resources';
$PAGE_NAME=$PAGE_DEFAULT_NAME;
if(isset($_GET[GET_PAGE])) {
	$PAGE_NAME=$_GET[GET_PAGE];
	if(!in_array($PAGE_NAME, $PAGE_LIST)) {
		$PAGE_NAME=$PAGE_DEFAULT_NAME;
	}
}

/* generate the page */
ob_start();
include('templates/default/'.$PAGE_NAME.'.php');
$TEMPLATE_FIELD_BODY = ob_get_contents();
ob_end_clean();

/* display the page with the template */
include('templates/default/page.php');

?>
