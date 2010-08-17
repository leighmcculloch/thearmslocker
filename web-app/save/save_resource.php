<?php

switch($input_action)
{
case 'create':
	$table=new table_Resource;
	$resource=new table_Resource_Record;
	$resource->name="Enter Resource Name";
	$table->saveRecord($resource);
	redirect_to($input_redirect);
	break;
case 'update':
	$table=new table_Resource;
	$resource=new table_Resource_Record;
	$resource->id=$input_id;
	if($input_variable=='name')
		$resource->name=$input_value;
	if($input_variable=='range_id')
		$resource->range_id=$input_value;
	$table->saveRecord($resource);
	
	if($input_variable=='name')
	{
		echo $input_value;
	}
	
	if($input_variable=='range_id')
	{
		$table=new table_ResourceRange;
		$range=$table->getRecord($input_value);
		$table=new table_ResourceType;
		$type=$table->getRecord($range->type_id);
		echo $type->name.': '.$range->name;
	}
	break;
case 'delete':
	$table=new table_Resource;
	$table->deleteRecordID($input_id);
	redirect_to($input_redirect);
	break;
}
	
?>