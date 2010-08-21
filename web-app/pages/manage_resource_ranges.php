<?php

$table=new table_ResourceRange;
$ranges=$table->getRecords();

?>

<table>
	<tr>
		<th>Range ID</th>
		<th>Resource Type ID</th>
		<th colspan="2">Resource Range</th>
	</tr>
	<?php foreach($ranges as $range) :
		  $type_name='Not Set';
		  $table=new table_ResourceType;
		  $type=$table->getRecord($range->type_id);
		  if($type!==null)
		  	$type_name=$type->name;
	?>
	<tr>
		<td><?php echo $range->id; ?></td>
		<td class="edit_resource_type" id="update(resource_range[<?php echo $range->id; ?>].type_id)"><?php echo $type_name; ?></td>
		<td class="edit_text" id="update(resource_range[<?php echo $range->id; ?>].name)"><?php echo $range->name; ?></td>
		<td class="delete" id="delete(resource_range[<?php echo $range->id; ?>])">X</td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td colspan="4" class="create" id="create(resource_range)">Create New Resource Range</td>
	</tr>
</table>