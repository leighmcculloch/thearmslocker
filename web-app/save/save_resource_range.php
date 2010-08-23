<?php

switch($input_action)
{
case 'create':
	$table=new table_ResourceRange;
	$range=new table_ResourceRange_Record;
	$range->name='Enter Subtype Name';
	if($input_variable=='type_id')
		$range->type_id=$input_value;
	$table->saveRecord($range);
	redirect_to($input_redirect);
	break;
case 'update':
	$table=new table_ResourceRange;
	$range=new table_ResourceRange_Record;
	$range->id=$input_id;
	$range->name='Enter Subtype Name';
	if($input_variable=='name')
		$range->name=$input_value;
	if($input_variable=='type_id')
		$range->type_id=$input_value;
	$table->saveRecord($range);
	
	if($input_variable=='name')
	{
		echo $input_value;
	}
	
	if($input_variable=='type_id')
	{
		$table=new table_ResourceType;
		$type=$table->getRecord($input_value);
		echo $type->name;
	}
	break;
case 'delete':
	$table=new table_ResourceRange;
	$table->deleteRecordID($input_id);
	redirect_to($input_redirect);
	break;
}
	
?>