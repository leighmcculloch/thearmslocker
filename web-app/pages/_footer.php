<script type="text/javascript" src="external/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="external/jquery.jeditable.mini.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.edit_text').editable('save.php', {
			style: 'display: inline'
		});
	});
	$('.delete,.create').click(function () { 
		window.location = 'save.php?redirect=<?php echo $_SERVER['REQUEST_URI']; ?>&id='+$(this).attr('id');
    }).hover(function() {
		$(this).css('cursor','pointer');
	});
</script>