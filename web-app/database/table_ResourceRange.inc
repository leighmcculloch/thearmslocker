<?php

require_once('database/table.inc');

class table_ResourceRange_Record
{
	public $id;
	public $name;
	public $type_id;
}

class table_ResourceRange extends table
{
	public function getRecordsWithType($type_id)
	{
		return $this->getRecordsWherePair('type_id', $type_id);
	}
}

?>