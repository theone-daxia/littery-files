<?php
	require_once('./response.php');

	$data = array(
		'id' => 1,
		'name' => 'sing'
	);

	Response::show(200,'show success',$data);
?>
