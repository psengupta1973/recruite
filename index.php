<?php 
session_start();
include("indexHeader.php");
?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" height="7"><tr><td align="center"></td></tr></table>
<?php 
include("indexTabPanel.php");
include("indexSubTabPanel.php");
?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" height="2"><tr><td align="center"></td></tr></table>
<?php 
$bodyPage = "indexBody.php";
if($subSelectedTab !== null && !empty($subSelectedTab)){
	$bodyPage = $subSelectedTab.".php";
}
if(empty($userName) || $userName == null){
	if($subSelectedTab == "postResume" || $subSelectedTab == "myJobHouse"){
		$bodyPage = "login.php";
	}
}
include($bodyPage);
include("indexFooter.php");
?>