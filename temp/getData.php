<?php
if(isset($_POST['schoolData'])){
	require_once './../Common/php/OperateDB/DbMgrInterface.php';
	$postArr = json_decode($_POST['schoolData']);
	$insertSchoolEntry = DB_Insert(
		array(
			'Table'=>'schoollist',
			'Fields'=>
				array(
					'schoolName' 		=> $postArr[0],
					'affiliationNum' 	=> $postArr[1],
					'stateName'			=> $postArr[2],
					'districtName'		=> $postArr[3],
					'address'			=> $postArr[4],
					'pincode'			=> $postArr[5],
					'phoneOffice'		=> str_replace(',', '', $postArr[6].$postArr[7]),
					'phoneResidence'	=> $postArr[6].$postArr[8],
					'fax'				=> $postArr[9],
					'email'				=> $postArr[10],
					'website'			=> $postArr[11],
					'foundationYear'	=> $postArr[12],
					'openingDate'		=> $postArr[13],
					'principalName'		=> $postArr[14],
					'principalGender'	=> $postArr[15],
					'principalQualification'=> $postArr[16],
					'principalAdminExp'	=> $postArr[18],
					'principalTeachingExp'=> $postArr[19],
					'schoolLevel'		=> $postArr[20],
					'affiliationType'	=> $postArr[21],
					'managingCommittee'	=> $postArr[24],
					'schoolCategory'	=> $postArr[25],
					'languageUsed'		=> $postArr[26],
					'schoolType'		=> $postArr[27]
				)
		)
	);
	echo $insertSchoolEntry;
	exit();
}
	$url = 'http://cbseaff.nic.in/cbse_aff/schdir_Report/AppViewdir.aspx?affno='.$_GET['aff'];
//	for($i=1;$i<1355;$i++){
		$postdata = array();
		// use key 'http' even if you send the request to https://...
		$options = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'GET',
		        'content' => http_build_query($postdata),
		    ),
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		$aff = $_GET['aff']+1;
		if(strlen($result) > 2868 ){
			$tablesArr = explode('<table', $result);
			echo '<table id="schoolMain" '.$tablesArr[1].'<table id="locationTable" '.$tablesArr[3].'<table id="natureTable" '.$tablesArr[4].'<table id="enrollTable" '.$tablesArr[5].'<table id="infraTable" '.$tablesArr[6].'<table id="staffTable" '.$tablesArr[7].'<table id="sanitaryTable" '.$tablesArr[8].'<table id="facilitiesTable" '.$tablesArr[9];
		}
		else{
			header('location:./getData.php?aff='.$aff);
			exit();
		}
?>
<script src="./../Common/js/jquery/jquery.js"></script>
<script type="text/javascript" language="javascript">
         function Show_hide_ul(id) {

             var ContenID = document.getElementById(id);
             if (ContenID.style.display == "none") {
                 ContenID.style.display = "block";
             }
             else {
                 ContenID.style.display = "none"
             }
         }
</script>
<script> var aff = <?php echo $aff;?>;
</script>
<script>
$(function(){
	var postDataArr = [];
	$('#schoolMain').find('td:nth-child(2)').each(function(){
		postDataArr.push(this.innerText.trim());
	});
	$('#natureTable').find('td:nth-child(2)').each(function(){
		postDataArr.push(this.innerText.trim());
	});
	$.ajax({
		url:'./getData.php',
		method:'POST',
		data:{'schoolData':JSON.stringify(postDataArr)},
		success:function(response){
			location.href = './getData.php?aff='+aff;
		}
	});
});
</script>