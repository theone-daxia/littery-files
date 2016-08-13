<?php
class Response
{
	/**
	*@param integer $code: zhuang tai ma
	*@param string $message: ti shi xin xi
	*@param array $data zhuang: shu ju
	*return string
	*/
	public static function xmlEncode($code, $message='', $data=array())
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
		header("Content-Type:text/xml");
		$xml  = "<?xml version='1.0' encoding='UTF-8'?>\n";
		$xml .= "<root>\n";
		$xml .= self::xmlToEncode($result);
		$xml .= "</root>";
		echo $xml;
		exit;
	}

	public static function xmlToEncode($data)
	{
		$xml = "";
		foreach($data as $key => $value)
		{
			$attr = "";
			if(is_numeric($key))
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
