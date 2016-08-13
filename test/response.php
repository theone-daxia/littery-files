<?php
class Response
{
	public static function show($code, $message='', $data=array())
	{
		if (!is_numeric($code))
		{
			return '';
		}
		$result = array(
			'code' => $code,
			'message' => $message,
			'data' => $data
		);

		$type = isset($_GET['format']) ? $_GET['format'] : 'json';

		if ($type == 'json')
		{
			self::json($code, $message, $data);
			exit();
		}
		else if ($type == 'xml')
		{
			self::xml($code, $message, $data);
			exit();
		}
		else
		{
			echo 'format is error ! it just can be json or xml !';
			exit();
		}

	}

	/**
	*the way of json
	*param $code: status code
	*param $message: status message
	*param $data: data
	*return string
	*/
	public static function json($code, $message='', $data=array())
	{
		if (!is_numeric($code))
		{
			return '';
		}
		$result = array(
			'code' => $code,
			'message' => $message,
			'data' => $data
		);
		echo json_encode($result);
	}

	/**
	*the way of xml
	*param $code: status code
	*param $message: status message
	*param $data: data
	*return string
	*/
	public static function xml($code, $message='', $data=array())
	{
		if (!is_numeric($code))
		{
			return '';
		}
		$result = array(
			'code' => $code,
			'message' => $message,
			'data' => $data
		);
		header("Content-Type:text/xml");
		$xml  = "<?xml version='1.0' encoding='UTF-8'?>\n";
		$xml .= "<root>\n";
		$xml .= self::xmlToEncode($result);
		$xml .= "</root>";

		echo $xml;
		exit();
	}

	public static function xmlToEncode($data)
	{
		$xml = '';
		foreach ($data as $key => $value)
		{
			$attr = '';
			if (is_array($data))
			{
				$attr = "id='{$key}'";
				$key = "item";
			}
			$xml .= "<{$key} {$attr}>";
			$xml .= is_array($value) ? self::xmlToEncode($value) : $value;
			$xml .= "</{$key}>\n";
		}
		return $xml;
	}

}
?>
