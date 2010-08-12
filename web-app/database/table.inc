<?php

require_once('database.inc');

class table
{
	public function __construct()
	{
		database::databaseOpen();
	}

	function __destruct()
	{
		database::databaseClose();
	}
	
	public function getName()
	{
		return get_class($this);
	}
	
	public function getRows()
	{
		$sql = 'SELECT * FROM '.$this->getName();
		$statement = database::databasePDO()->query($sql);
    	$rows = $statement->fetchALL(PDO::FETCH_CLASS, $this->getName().'_Record');
    	return $rows;
	}
	
	public function getRow($id)
	{
		$sql = 'SELECT * FROM '.$this->getName(). 'WHERE id="'.$id.'"';
		$statement = database::databasePDO()->query($sql);
    	$row = $statement->fetch(PDO::FETCH_CLASS, $this->getName().'_Record');
    	return $row;
	}
}

?>

