<?php 
$table=new table_ResourceType;
$types=$table->getRecords();
foreach($types as $type) : ?>
<div class="sectionblock">
<h1 id="type_<?php echo $type->id; ?>" class="section blocktitle"><?php echo $type->name; ?></h1>
<div id="block_type_<?php echo $type->id; ?>" class="block">

	<?php 
	$table=new table_ResourceRange;
	$ranges=$table->getRecordsWithType($type->id);
	foreach($ranges as $range) : ?>
	<h2 id="range_<?php echo $range->id; ?>" class="section"><?php echo $range->name; ?></h2>
	<div id="block_range_<?php echo $range->id; ?>" class="block">
	
		<?php 
		$table=new table_Resource;
		$resources=$table->getRecordsWithRange($range->id);
		if(count($resources)==0)
		{
			echo '<table><tr><td>No Resources in this Range/Type</td></tr></table>';
		}
		else
		{?>
		<table>
			<tr>
				<th>Resource ID</th>
				<th>Resource</th>
				<th>Assigned to</th>
			</tr>
		<?php foreach($resources as $resource) : 
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
				<td><?php echo $resource->name; ?></td>
				<td class="edit_user" id="update(resource[<?php echo $resource->id; ?>].user_id)"><?php echo $username; ?></td>
			</tr>
		<?php endforeach;
		} ?>
		</table>
		
	</div>
	<?php endforeach; ?>
	
</div>
</div>
<?php endforeach; ?>

<div class="options"><a class="expandall">Expand All</a> | <a class="collapseall">Collapse All</a></div>

<script type="text/javascript">
	$(document).ready(function() {
		$('.section').click(function(){
			$('#block_'+$(this).attr('id')).slideToggle();
			$('#block_'+$(this).attr('id')).css('border-radius', '15px');
		});
		$('.section,.expandall,.collapseall').hover(function() {
			$(this).css('cursor','pointer');
		});
		$('.expandall').click(function(){
			$('.block').slideDown();
		});
		$('.collapseall').click(function(){
			$('.block').slideUp();
		});
	});
</script>
