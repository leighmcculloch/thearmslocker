<?php

class password
{
	public function generate_fingerprint($userid, $password)
	{
		$fingerprint = hash('sha256', $userid.':'.$password.':'.$userid);
	}
	
	public function compare_password($userid, $password)
	{
	    $table = new table_Users;
	    $user = $table->getRecord($userid);
	    
	    if($user===null)
	    {
	        return false;
	    }
	    
	    $fingerprint = password::generate_fingerprint($userid, $password);
	    return $fingerprint === $user->fingerprint;
	}
}
?>