<?php

$table=new table_Resource;
$resources=$table->getRecords();

?>

<table class="tablesorter">
	<thead>
	<tr>
		<th>ID</th>
		<th>Resource Type</th>
		<th colspan="2">Resource</th>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<td colspan="4" class="create" id="create(resource)">Create New Resource</td>
	</tr>
	</tfoot>
	<tbody>
	<?php foreach($resources as $resource) :
		  $range_name='Not Set';
		  $table=new table_ResourceRange;
		  $range=$table->getRecord($resource->range_id);
		  if($range!==null)
		  {
		  	$table=new table_ResourceType;
		  	$type=$table->getRecord($range->type_id);
		  	$range_name=$type->name.': '.$range->name;
		  }
	?>
	<tr>
		<td><?php echo $resource->id; ?></td>
		<td class="edit_resource_range" id="update(resource[<?php echo $resource->id; ?>].range_id)"><?php echo $range_name; ?></td>
		<td class="edit_text" id="update(resource[<?php echo $resource->id; ?>].name)"><?php echo $resource->name; ?></td>
		<td class="delete" id="delete(resource[<?php echo $resource->id; ?>])">X</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
</table>