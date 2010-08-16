<?php

$table=new table_Users;
$users=$table->getRecords();

?>

<script type="text/javascript" src="external/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="external/jquery.jeditable.mini.js"></script>

<table>
	<tr>
		<td>User ID</td>
		<td>Name</td>
	</tr>
	<?php foreach($users as $user) : ?>
	<tr>
		<td><?=$user->id?></td>
		<td class="edit_text" id="[u]user[<?=$user->id?>].name"><?=$user->name?></td>
		<td><a href="save.php?id=[d]user[<?=$user->id?>]">X</a></td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td><a href="save.php?id=[a]user[]">Create New User</a></td>
	</tr>
</table>

<script type="text/javascript">
	$(document).ready(function() {
		$('.edit_text').editable('save.php', {
			style: 'display: inline'
		});
	});
</script>