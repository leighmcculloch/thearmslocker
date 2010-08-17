<?php

switch($input_action)
{
case 'create':
	$table=new table_ResourceType;
	$type=new table_ResourceType_Record;
	$type->name="Enter Resource Type";
	$table->saveRecord($type);
	redirect_to($input_redirect);
	break;
case 'update':
	$table=new table_ResourceType;
	$type=new table_ResourceType_Record;
	$type->id=$input_id;
	$type->name=$input_value;
	$table->saveRecord($type);
	echo $input_value;
	break;
case 'delete':
	$table=new table_ResourceType;
	$table->deleteRecordID($input_id);
	redirect_to($input_redirect);
	break;
}
	
?>