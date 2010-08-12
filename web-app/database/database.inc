<?php

class database
{
	private static $databasePDO=null;
	private static $databaseRefCount=0;
	
	public static function databaseOpen()
	{
		if(self::$databasePDO==null)
		{
			self::$databasePDO=new PDO('sqlite:'.DATABASE);
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

