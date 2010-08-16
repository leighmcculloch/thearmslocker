<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

include('incs/incs.php');

$input_name=$_REQUEST['id'];
$input_value=$_REQUEST['value'];

preg_match('/\[(?P<action>[adu]?)\](?P<context>[a-z]+)\[(?P<id>[0-9]*)\]\.(?P<variable>[a-z]+)/', $input_name, $input_data);
$input_context=$input_data['context'];
$input_action=$input_data['action'];
$input_id=$input_data['id'];
$input_variable=$input_data['variable'];

if($input_context=='user')
{
	switch($input_action)
	{
	case 'a':
	case 'u':
		$table=new table_Users;
		$user=new table_Users_Record;
		$user->id=$input_id;
		$user->name=$input_value;
		$table->saveRecord($user);
		echo $input_value;
		break;
	case 'd':
		$table=new table_Users;
		$table->deleteRecordID($user);
		break;
	}
}

?>