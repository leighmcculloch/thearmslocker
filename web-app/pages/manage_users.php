<?php

$table=new table_Users;
$users=$table->getRows();
/*
foreach($users as $user)
{
	echo 'User ID: '.$user->id;
	echo '<br/>';
	echo 'Name: '.$user->name;
	$user->name='Leigh McCullwoch';
	$table->saveRow($user);
}

$user=new table_Users_Record;
$user->name='Donna McCulloch';
$table->saveRow($user);
*/
?>

<script type="text/javascript" src="external/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="external/jquery.jeditable.mini.js"></script>

<div class="edit" id="div_1">Dolor</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('.edit').editable('database/save.php?page=manage_users');
	});
</script>