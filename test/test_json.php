<?php
	require_once('./response_json.php');
	$arr = array(
		'id' => 1,
		'name' => 'sing'
	);
	Response::json(200,'return success',$arr);
?>
