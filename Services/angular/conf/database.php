<?php
function get_DbConfig(){
	$config = array (							
				'host'      =>	'localhost',
				'port'      =>	'3306',
				'username'	=>	'root',
				'password'	=>	'',
				'database'	=>	'workdb'
		);
	return $config;
}
require_once __DIR__.'./../../../Common/php/OperateDB/DbMgrInterface.php';
?>