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
	
	public function getColumns($table_record)
	{
		return get_object_vars($table_record);
	}
	
	public function getRecordsWhere($where)
	{
		$sql = 'SELECT * FROM '.$this->getName();
		if($where!==null)
		{
			$sql .= ' WHERE '.$where;
		}
		$statement = database::databasePDO()->query($sql);
    	$rows = $statement->fetchALL(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->getName().'_Record');
    	return $rows;
	}
	
	public function getRecordsWherePair($column, $value)
	{
		$sql = 'SELECT * FROM '.$this->getName().' WHERE '.$column.'=:'.$column;
		$statement = database::databasePDO()->prepare($sql);
		$statement->bindParam(':id', $table_record_id, PDO::PARAM_INT);
		$statement->execute(array($column=>$value));
    	$rows = $statement->fetchALL(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->getName().'_Record');
    	return $rows;
	}
	
	public function getRecords()
	{
    	return $this->getRecordsWhere(null);
	}
	
	public function getRecord($id)
	{
		if($id==null)
		{
			return null;
		}
		
    	$rows = $this->getRecordsWhere('id='.$id);
    	if(count($rows)==0)
    	{
    		return null;
    	}
    	return $rows[0];
	}
	
	public function saveRecord($table_record)
	{
		if($this->getRecord($table_record->id)===null)
		{
			$this->insertRecord($table_record);
		}
		else
		{
			$this->updateRecord($table_record);
		}
	}
	
	public function deleteRecord($table_record)
	{
		$this->deleteRecordID($table_record->id);
	}
	
	public function deleteRecordID($table_record_id)
	{
		$sql = 'DELETE FROM '.$this->getName()
		      .' WHERE id=:id';
		$statement = database::databasePDO()->prepare($sql);
		$statement->bindParam(':id', $table_record_id, PDO::PARAM_INT);
		$statement->execute();
	}
	
	public function updateRecord($table_record)
	{
		$columns = $this->getColumns($table_record);
		
		$sql = 'UPDATE '.$this->getName();
		$sql .= ' SET';
		foreach($columns as $name=>$value)
		{
			if($value===null)
			{
				unset($columns[$name]);
				continue;
			}
			$sql .= ' '.$name.'=:'.$name.',';
		}
		$sql  = rtrim($sql, ',');
		$sql .= ' WHERE id=:id';
		
		$statement = database::databasePDO()->prepare($sql);
		$statement->execute($columns);
	}
	
	public function insertRecord($table_record)
	{
		$columns = $this->getColumns($table_record);
		$columns_binded = array();
		
		$sql_names = '';
		$sql_values = '';
		foreach($columns as $name=>$value)
		{
			if($name=='id')
			{
				continue;
			}
			
			$sql_names .= $name.',';
			$sql_values .= ':'.$name.',';
			$columns_binded[':'.$name] = $value;
		}
		$sql_names = rtrim($sql_names, ',');
		$sql_values = rtrim($sql_values, ',');
		
		$sql = 'INSERT INTO '.$this->getName()
		      .' ('.$sql_names.') values ('.$sql_values.')';
		
		$statement = database::databasePDO()->prepare($sql);
		$statement->execute($columns_binded);
	}
}

?>