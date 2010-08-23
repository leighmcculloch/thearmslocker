<?php

// user select form field options
$table=new table_Users;
$users=$table->getRecords();
$users_select=array();
foreach($users as $user)
	$users_select[$user->id]=$user->name;
	
// resource types select form field options
$table=new table_ResourceType;
$types=$table->getRecords();
$types_select=array();
foreach($types as $type)
	$types_select[$type->id]=$type->name;
	
// resource ranges select form field options
$table=new table_ResourceRange;
$ranges=$table->getRecords();
$ranges_select=array();
foreach($ranges as $range)
{	
	$table=new table_ResourceType;
	$type=$table->getRecord($range->type_id);
	if($type!==null)
	{
		$ranges_select[$range->id]=$type->name.': '.$range->name;
	}
}
asort($ranges_select);
	
?>

<script type="text/javascript" src="external/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="external/jquery.jeditable.mini.js"></script>

<?php echo $TEMPLATE_FIELD_PAGE; ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.edit_text').editable('save.php', {
			style: 'display: inline'
		});
		$('.edit_user').editable('save.php', { 
			data   : '<?php echo json_encode($users_select); ?>',
			type   : 'select',
			submit : 'OK',
			style  : 'display: inline'
		});
		$('.edit_resource_type').editable('save.php', { 
			data   : '<?php echo json_encode($types_select); ?>',
			type   : 'select',
			submit : 'OK',
			style  : 'display: inline'
		});
		$('.edit_resource_range').editable('save.php', { 
			data   : '<?php echo json_encode($ranges_select); ?>',
			type   : 'select',
			submit : 'OK',
			style  : 'display: inline'
		});
		$('.delete,.create').click(function () { 
			window.location = 'save.php?redirect=<?php echo $_SERVER['REQUEST_URI']; ?>&id='+$(this).attr('id');
		});
		$('.delete,.create,.update,.edit_text,.edit_user,.edit_resource_type,.edit_resource_range').hover(function() {
			$(this).css('cursor','pointer');
		});
		$('.update').click(function () { 
			window.location = 'save.php?redirect=<?php echo $_SERVER['REQUEST_URI']; ?>&id='+$(this).attr('id')+'&value='+$(this).attr('value');
		});
	});
</script>