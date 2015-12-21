<?php
	require_once './../../Common/php/OperateDB/DbMgrInterface.php';
?>
<div class='body container-fluid'>
<?php 
	include './html/searchContainer.html';
?>
<div class='content-webservice container-fluid col-md-12'>
<?php
	if(isset($_GET)){
		extract($_GET);
	}
	if(isset($signup)){
		include './html/signup.html';
	}
	elseif (isset($action)){
		switch ($action){
			case 'school':
				if(isset($id)){
					$schoolInfoData = DB_Read(array('Table'=>'schoollist','Fields'=>'*','clause'=>'schoolId = '.$id),'ASSOC','');
					include './php/schoolDetail.php';
//					include './html/school/'.$id.'.html';
				}
				else{
					include './html/schoolDefault.html';
				}
				break;
		}
	}
	else{
		include './html/leftPanel.html';
		include './html/rightPanel.html';
	}
?>
</div>
</div>
