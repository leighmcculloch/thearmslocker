<?php

$table=new table_ResourceType;
$types=$table->getRecords();

?>

<table>
	<tr>
		<th>ID</th>
		<th colspan="2">Resource Type</th>
	</tr>
	<?php foreach($types as $type) : ?>
	<tr>
		<td><?php echo $type->id; ?></td>
		<td>
			<span class="edit_text" id="update(resource_type[<?php echo $type->id; ?>].name)"><?php echo $type->name; ?></span>
			(<a href="#" class="update" id="create(resource_range.type_id)" value="<?php echo $type->id; ?>">create subtype</a>)
		</td>
		<td class="delete" id="delete(resource_type[<?php echo $type->id; ?>])">X</td>
	</tr>
	<?php 
	$table = new table_ResourceRange;
	$ranges = $table->getRecordsWithType($type->id);
	?>
	<?php foreach($ranges as $range) : ?>
	<tr>
		<td>&nbsp;</td>
		<td class="edit_text" id="update(resource_range[<?php echo $range->id; ?>].name)"><?php echo $range->name; ?></td>
		<td class="delete" id="delete(resource_range[<?php echo $range->id; ?>])">X</td>
	</tr>
	<?php endforeach; ?>
	<?php endforeach; ?>
	<tr>
		<td colspan="3" class="create" id="create(resource_type)">Create New Resource Type</td>
	</tr>
</table>