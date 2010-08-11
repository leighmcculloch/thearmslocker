<?php

define('DIR_INCS', 'incs');
define('DIR_PAGES', 'pages');
define('DIR_TEMPLATES', 'templates');

/* includes */
require_once(DIR_INCS.'/incs.php');

/* find page */
if(isset($_GET[GET_PAGE])) {
	$PAGE_NAME=$_GET[GET_PAGE];
	if(!in_array($PAGE_NAME, $PAGE_LIST)) {
		$PAGE_NAME=$PAGE_DEFAULT_NAME;
	}
}

/* generate the page */
ob_start();
include(DIR_PAGES.'/'.$PAGE_NAME.'.php');
$TEMPLATE_FIELD_BODY = ob_get_contents();
ob_end_clean();

/* display the page with the template */
include(DIR_TEMPLATES.'/default/page.php');

?>
