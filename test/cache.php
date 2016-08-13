<?php
class Cache
{
	private $_dir;
	public function __construct()
	{
		$this->_dir = dirname(__FILE__).'/cache_file/';
	}
	const EXT = '.txt';
	public function cacheData($key, $value='', $path='')
	{
		$filename = $this->_dir.$path.$key.self::EXT;

		if($value != '')
		{
			if($value == 'd')
			{
				return @unlink($filename);
			}

			$dir = dirname($filename);
			if(!is_dir($dir))
			{
				mkdir($dir, 0777);
			}
			return file_put_contents($filename, json_encode($value));
		}
		else if(!is_file($filename))
		{
			return false;
		}
		else
		{
			return json_decode(file_get_contents($filename),true);
		}
	}
}
?>
