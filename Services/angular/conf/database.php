<?php
function get_DbConfig(){
	$config = array (							
				'host'      =>	'localhost',
				'port'      =>	'3306',
				'username'	=>	'root',
				'password'	=>	'root123',
				'database'	=>	'WorkDB'
		);
	return $config;
}
require_once __DIR__.'./../../../Common/php/OperateDB/DbMgrInterface.php';
?>