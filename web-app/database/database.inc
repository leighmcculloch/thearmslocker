<?php

class database
{
	private static $databasePDO=null;
	private static $databaseRefCount=0;
	
	public static function databaseOpen()
	{
		if(self::$databasePDO==null)
		{
			self::$databasePDO=new PDO(DATABASE);
			self::$databasePDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		self::$databaseRefCount++;
	}
	
	public static function databaseClose()
	{
		self::$databaseRefCount--;
		if(self::$databaseRefCount==0)
		{
			self::$databasePDO=null;
		}
	}
	
	public static function databasePDO()
	{
		return self::$databasePDO;
	}
}

?>