<?php

$table=new table_ResourceType;
$types=$table->getRecords();

?>

<table>
	<tr>
		<th>Resource Type ID</th>
		<th colspan="2">Resource Type</th>
	</tr>
	<?php foreach($types as $type) : ?>
	<tr>
		<td><?php echo $type->id; ?></td>
		<td class="edit_text" id="update(resource_type[<?php echo $type->id; ?>].name)"><?php echo $type->name; ?></td>
		<td class="delete" id="delete(resource_type[<?php echo $type->id; ?>])">X</td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td colspan="3" class="create" id="create(resource_type)">Create New Resource Type</td>
	</tr>
</table>