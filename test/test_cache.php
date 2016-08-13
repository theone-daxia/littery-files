<?php

	require_once('./cache.php');

	$data = array(
		'id' => 1,
		'name' => 'sing a song'
	);

	$cache = new Cache();
	$type = isset($_GET['action']) ? $_GET['action'] : 'warning';

	if($type == 'input')
	{
		if($cache->cacheData('hello', $data))
		{
			echo 'input cache success';
		}
		else
		{
			echo 'input cache fail';
		}
	}
	else if($type == 'delete')
	{
		if($cache->cacheData('hello', 'd'))
		{
			echo 'delete success';
		}
		else
		{
			echo 'delete fail';
		}
	}
	else
	{
		echo 'warning: action must be input or delete';
	}

	

	

?>
