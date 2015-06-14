<?php
?>
<div class='body container-fluid'>
<?php 
	include './html/searchContainer.html';
?>
<div class='content-webservice container-fluid col-md-12'>
<?php
	if(isset($_GET['signup'])){
		include './html/signup.html';
	} 
	else{
		include './html/leftPanel.html';
		include './html/rightPanel.html';
	}
?>
</div>
</div>
