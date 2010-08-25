<HTML>
<HEAD>
<TITLE>the arms locker - Limited Resource Management</TITLE>
<link type="text/css" href="templates/default/jquery-ui-1.8.4.custom.css" rel="stylesheet" />	
<link type="text/css" href="templates/default/blue/style.css" rel="stylesheet" />	
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

.pageheader, .pagefooter {
	border-radius:15px;
	background-color:#5F90D0;
	padding:10px;
	color:#fff;
	-webkit-box-shadow: 1px 1px 2px #000;/*#F0F2F5;*/
}

.pageheader .credentials {
	float:right;
}

.pageheader .title {
	font-weight:bold;
	font-size:14px;
}

.pagefooter {
	font-size:11px;
	text-align:center;
}

.pagefooter a {
	color:#fff;
}

.pagefooter a:hover {
	color:#fff;
	text-decoration:underline;
}

.pagebody {
	/*border-radius:15px;
	background-color:#F0F2F5;*/
	padding:10px 0;
}

table {
	width:100%;
	margin:0;
	padding:0;
	background-color:#F0F2F5;
	border-radius:15px;
	-webkit-box-shadow: 1px 1px 2px #000;/*#F0F2F5;*/
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
}

.blocktitle {
	text-align:center;
}

.section {
}

h2.section {
	margin-top:10px;
	-webkit-box-shadow: 1px 1px 2px #000;/*#F0F2F5;*/
}

.block2 {
	border:0;
}

.copyright {
	text-align:center;
	margin-top:5px;
}

/*.ui-tabs .ui-tabs-nav li { width:50px; display:block; height:20px; }*/
.ui-widget { font-family: inherit; }
.ui-tabs { padding:0; border:0; }
.ui-tabs .ui-tabs-nav { padding:0; margin-left:15px; }
.ui-tabs .ui-tabs-nav li {
	border:0;
}
.ui-tabs .ui-tabs-nav li a {
	font-size:15px;
	font-weight:bold;
	background-color:#F0F2F5;
	border-top-left-radius:15px;
	border-top-right-radius:15px;
	width:200px;
	text-align:center;
	padding:2px;
}
.ui-tabs .ui-tabs-nav li.ui-tabs-selected a {
	background-color:#A5C1E5;
}
.ui-tabs .ui-tabs-nav li a span {
	font-size:15px;
}
.ui-tabs .ui-tabs-panel {
	padding:15px;
	border-radius:15px;
	background-color:#A5C1E5;
	margin-bottom:10px;
}
.ui-tabs .ui-tabs-selected {
	background-color:#A5C1E5;
}
.ui-tabs .ui-state-active {
	background-color:#A5C1E5;
}

</style>
</HEAD>
<BODY>

<div class="pageheader">
	<div class="credentials"><?php echo $_SERVER['REMOTE_ADDR']; ?></div>
	<div class="title">The Arms Locker: Limited Resource Management</div>
</div>

<div class="pagebody">
	<h1><?php echo ucwords(str_replace('_', ' ', $PAGE_NAME)); ?></h1>
	<?php echo $TEMPLATE_FIELD_BODY; ?>
</div>

<div class="pagefooter">
	<?php
	$page_menu_list='';
	foreach($PAGE_LIST as $page_file=>$page_name)
	{
		$page_menu_list .= '<a href="?page='.$page_file.'">'.ucwords(str_replace('_', ' ', $page_name)).'</a> | ';
	}
	$page_menu_list = rtrim($page_menu_list, '| ');
	echo $page_menu_list;
	?>
</div>

<div class="copyright">
	<?php echo $TEMPLATE_FIELD_COPYRIGHT; ?>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('.create').html('[ + '+$('.create').html()+' ]');
		$('.delete').html('[ x ]').css('color', '#f00');
		$('.delete,.create').attr('align', 'right');
		$('.delete,.create').css('font-weight', 'bold');
		
		$('th:first-child').attr('width', 40);
		$('th:first-child+th').attr('width', 200);
		$('.delete').attr('width', 60);
		$('.options').html('&nbsp;');
	});
</script>

</BODY>
</HTML>
