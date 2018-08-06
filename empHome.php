<?php 
session_start();
include("empHeader.php");
?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" height="7"><tr><td align="center"></td></tr></table>
<?php 
include("indexTabPanel.php");
include("empSubTabPanel.php");
?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" height="2"><tr><td align="center"></td></tr></table>
<?php 
$bodyPage = "empBody.php";
if($subSelectedTab !== null && !empty($subSelectedTab)){
	$bodyPage = $subSelectedTab.".php";
}
if(empty($userName)){
	if($subSelectedTab == "postJob" || $subSelectedTab == "myJobHouse"){
		$bodyPage = "login.php";
	}
}
else{
	$userType = &$_SESSION['userType'];
	if($userType == User::$JOB_SEEKER){
		if($subSelectedTab == "postJob"){
			$bodyPage = "login.php";
		}
	}
}
include($bodyPage);
include("indexFooter.php");
?>