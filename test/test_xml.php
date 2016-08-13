<?php
require_once('./response_xml.php');
$data = array(
'id' => 1,
'name' => 'sing',
'type' => array(1,2,3)
);
Response::xmlEncode(200,'success',$data);
?>
