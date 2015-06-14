<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$ListParts	=	explode('/', $actual_link);
$nova	=	true;
for($i	=	0; 	$i < count($ListParts); 	$i++){
	if($ListParts[$i]	==	'NOVA') {
		$nova	=	true;
		break;
	}
	elseif($ListParts[$i]	==	'PulsarPPU') {
		$nova	=	false;
		break;
	}
}

if($nova)	{
	$host		=	'192.168.0.166';
	$port		=	'3306';
	$username	=	'root';
	$password	=	'';
	$database	=	'novadatabase';
}
else{	//PPU
	$host		=	'127.0.0.1';
	$port		=	'3306';
	$username	=	'root';
	$password	=	'';
	$database	=	'ReleaseDB';
}
?>
