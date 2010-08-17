<?php

error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', true);

include('incs/incs.php');

$filters_post = array(
	"id"=>FILTER_SANITIZE_STRING,
	"value"=>FILTER_SANITIZE_STRING,
	"redirect"=>FILTER_SANITIZE_STRING
);

$input_post=filter_var_array($_REQUEST, $filters_post);
$input_name=$input_post['id'];
$input_value=$input_post['value'];
$input_redirect=$input_post['redirect'];

preg_match('/^'
		  .'(?P<action>create|update|delete)'
		  .'\('
		     .'(?P<context>[a-z_]+)'
		     .'(\[)?(?P<id>[0-9]*)(\])?'
		     .'(\.)?'
		     .'(?P<variable>[a-z_]*)'
		  .'\)'
		  .'$/', $input_name, $input_data);
$input_action=filter_var($input_data['action'], FILTER_SANITIZE_STRING);
$input_context=filter_var($input_data['context'], FILTER_SANITIZE_STRING);
$input_id=filter_var($input_data['id'], FILTER_VALIDATE_INT);
$input_variable=filter_var($input_data['variable'], FILTER_SANITIZE_STRING);

if($input_context=='user')
{
	include('save_user.php');
}
else if($input_context=='resource_type')
{
	include('save_resource_type.php');
}

function redirect_to($url)
{
	header('Location: '.$url);
}

?>