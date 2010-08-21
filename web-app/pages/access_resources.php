<?php

$table=new table_Users;
$users=$table->getRecords();
$users_select=array();
foreach($users as $user)
	$users_select[$user->id]=$user->name;

?>


<?php 
$table=new table_ResourceType;
$types=$table->getRecords();
foreach($types as $type) : ?>
<h1><?php echo $type->name; ?></h1>
<div>

	<?php 
	$table=new table_ResourceRange;
	$ranges=$table->getRecordsWithType($type->id);
	foreach($ranges as $range) : ?>
	<h2><?php echo $range->name; ?></h2>
	<div>
	
		<table>
			<tr>
				<th>Resource ID</th>
				<th>Resource</th>
				<th colspan="2">Assigned to</th>
			</tr>
		<?php 
		$table=new table_Resource;
		$resources=$table->getRecordsWithRange($range->id);
		foreach($resources as $resource) : 
			$username='';
			if($resource->user_id!==null)
			{
				$table=new table_Users;
				$user=$table->getRecord($resource->user_id);
				if($user!==null)
					$username=$user->name;
			} ?>
			<tr>
				<td><?php echo $resource->id; ?></td>
				<td class="edit_text" id="update(resource[<?php echo $resource->id; ?>].name)"><?php echo $resource->name; ?></td>
				<td class="edit_user" id="update(resource[<?php echo $resource->id; ?>].user_id)"><?php echo $username; ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
		
	</div>
	<?php endforeach; ?>
	
</div>
<?php endforeach; ?>


<script type="text/javascript">
	$(document).ready(function() {
		$('.edit_user').editable('save.php', { 
			data   : '<?php echo json_encode($users_select); ?>',
			type   : 'select',
			submit : 'OK',
			style  : 'display: inline'
		});
	});
</script>