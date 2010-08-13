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
	
	public function getRowsWhere($where)
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
	
	public function getRows()
	{
    	return $this->getRowsWhere(null);
	}
	
	public function getRow($id)
	{
		if($id==null)
		{
			return null;
		}
		
    	$rows = $this->getRowsWhere('id='.$id);
    	if(count($rows)==0)
    	{
    		return null;
    	}
    	return $rows[0];
	}
	
	public function saveRow($table_record)
	{
		if($this->getRow($table_record->id)===null)
		{
			$this->insertRow($table_record);
		}
		else
		{
			$this->updateRow($table_record);
		}
	}
	
	public function updateRow($table_record)
	{
		$columns = $this->getColumns($table_record);
		
		$sql = 'UPDATE '.$this->getName();
		$sql .= ' SET';
		foreach($columns as $name=>$value)
		{
			$sql .= ' '.$name.'=:'.$name.',';
		}
		$sql  = rtrim($sql, ',');
		$sql .= ' WHERE id='.$table_record->id;
		
		$statement = database::databasePDO()->prepare($sql);
		$statement->execute($columns);
	}
	
	public function insertRow($table_record)
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

