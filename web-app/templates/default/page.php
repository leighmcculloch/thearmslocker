<HTML>
<HEAD>
<TITLE>the arms locker - Limited Resource Management</TITLE>
<style>
body {
	background-color:#fff;
}

body, th, td {
	font-family:Helvetica, Geneva, Arial, sans-serif;
	font-size:13px;
}

a {
	font-weight:bold;
	color:#5F90D0;
	text-decoration:none;
}

a:hover {
	text-decoration:underline;
}

h1 {
	font-size:16px;
	font-weight:bold;
	margin:0;
	padding:0 0 5px 10px;
}

h2 {
	font-size:15px;
	font-weight:bold;
	margin:0 0 0 20px;
	background-color:#F0F2F5;
	border-top-left-radius:15px;
	border-top-right-radius:15px;
	width:150px;
	text-align:center;
}

.header, .footer {
	border-radius:15px;
	background-color:#5F90D0;
	padding:10px;
	color:#fff;
	-webkit-box-shadow: 1px 1px 2px #F0F2F5;
}

.header .credentials {
	float:right;
}

.header .title {
	font-weight:bold;
	font-size:14px;
}

.footer {
	font-size:11px;
	text-align:center;
}

.footer a {
	color:#fff;
}

.footer a:hover {
	color:#fff;
	text-decoration:underline;
}

.body {
	/*border-radius:15px;
	background-color:#F0F2F5;*/
	padding:10px 0;
}

table {
	border-radius:15px;
	width:100%;
	margin:0;
	padding:0;
	background-color:#F0F2F5;
}

th, td {
	margin:0;
	padding:3px 6px;
}

th {
	text-align:left;
	background-color:#F0F2F5;
}

th:first-child {
	border-top-left-radius:15px;
}

th:last-child {
	border-top-right-radius:15px;
}

tr {
	width:10px;
	border-bottom:#CCC;
}

.create {
	text-align:right;
}

.options {
	text-align:center;
	color:#000;
	font-size:10px;
	padding-top:10px;
}

.sectionblock {
	padding:15px;
	border-radius:15px;
	background-color:#A5C1E5;
	margin-top:10px;
}

.section {
}

h2.section {
	margin-top:10px;
}

.block {
}

</style>
</HEAD>
<BODY>

<div class="header">
	<div class="credentials"><?php echo $_SERVER['REMOTE_ADDR']; ?></div>
	<div class="title">The Arms Locker: Limited Resource Management</div>
</div>

<div class="body">
	<h1><?php if($PAGE_NAME!='access_resources'){echo ucwords(str_replace('_', ' ', $PAGE_NAME));} ?></h1>
	<?=$TEMPLATE_FIELD_BODY?>
</div>

<div class="footer">
	<?php
	$page_menu_list='';
	foreach($PAGE_LIST as $page_name)
	{
		$page_menu_list .= '<a href="?page='.$page_name.'">'.ucwords(str_replace('_', ' ', $page_name)).'</a> | ';
	}
	$page_menu_list = rtrim($page_menu_list, '| ');
	echo $page_menu_list;
	?>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		$('.create').html('[ + '+$('.create').html()+' ]');
		$('.delete').html('[ x ]');
		$('.delete,.create').attr('align', 'right');
		$('.delete,.create').css('font-weight', 'bold');
		
		$('th:first-child').attr('width', 100);
		$('th:first-child+th').attr('width', 200);
		$('.delete').attr('width', 60);
	});
</script>

</BODY>
</HTML>
