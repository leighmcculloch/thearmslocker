<?php

$table=new table_Users;
$users=$table->getRows();

foreach($users as $user)
{
	echo 'User ID: '.$user->id;
	echo '<br/>';
	echo 'Name: '.$user->name;
}

?>
