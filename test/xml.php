<?php
class Response
{
	public static function xml()
	{
		header("Content-Type:text/xml");
		$xml  = "<?xml version='1.0' encoding='UTF-8'?>\n";
		$xml .= "<root>\n";
		$xml .= "<code>200</code>\n";
		$xml .= "<message>success</message>\n";
		$xml .= "<data>\n";
		$xml .= "<id>1</id>\n";
		$xml .= "<name>sing</name>\n";
		$xml .= "</data>\n";
		$xml .= "</root>\n";
		echo $xml;
	}
}

Response::xml();

?>
