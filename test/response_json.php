<?php
	class Response
	{
		/**
		*param integer $code     zhuang tai ma
		*param string  $message  ti shi xin xi
		*param array   $data     shu ju
		return string
		*/
		public static function json($code, $message='', $data=array())
		{
			if(!is_numeric($code))
			{
				return '';
			}
			$result = array(
				'code' => $code,
				'message' => $message,
				'data' => $data
			);
		echo json_encode($result);
		exit;
		}
	}
?>
