<?php
	$host=mysqli_connect('localhost','root','daxia');
	if($host)
	{
		echo 'ok';
	}
	else
	{
		echo 'fail';
	}
	phpinfo();
?>
