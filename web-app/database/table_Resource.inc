<?php

require_once('database/table.inc');

class table_Resource_Record
{
	public $id;
	public $name;
	public $range_id;
	public $user_id;
}

class table_Resource extends table
{
	public function getRecordsWithRange($range_id)
	{
		return $this->getRecordsWherePair('range_id', $range_id);
	}
}

?>