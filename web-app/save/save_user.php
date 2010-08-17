<?php

	switch($input_action)
	{
	case 'create':
		$table=new table_Users;
		$user=new table_Users_Record;
		$user->name="Enter Name";
		$table->saveRecord($user);
		redirect_to($input_redirect);
		break;
	case 'update':
		$table=new table_Users;
		$user=new table_Users_Record;
		$user->id=$input_id;
		$user->name=$input_value;
		$table->saveRecord($user);
		echo $input_value;
		break;
	case 'delete':
		$table=new table_Users;
		$table->deleteRecordID($input_id);
		redirect_to($input_redirect);
		break;
	}
	
?>