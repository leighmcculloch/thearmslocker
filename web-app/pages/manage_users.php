<?php

$table=new table_Users;
$users=$table->getRecords();

?>

<table class="tablesorter">
	<thead>
	<tr>
		<th>ID</th>
		<th colspan="2">User Name</th>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<td colspan="3" class="create" id="create(user)">Create New User</td>
	</tr>
	</tfoot>
	<tbody>
	<?php foreach($users as $user) : ?>
	<tr>
		<td><?php echo $user->id; ?></td>
		<td class="edit_text" id="update(user[<?php echo $user->id; ?>].name)"><?php echo $user->name; ?></td>
		<td class="delete" id="delete(user[<?php echo $user->id; ?>])">X</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
</table>