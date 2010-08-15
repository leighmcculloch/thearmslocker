[<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

include('incs/incs.php');

$page=$_GET[GET_PAGE];
$id=$_POST['id'];
$value=$_POST['value'];

switch($page)
{
	case 'manage_users':
		echo $value;
		break;
}

?>]