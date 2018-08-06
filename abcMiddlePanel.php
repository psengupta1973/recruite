<?php 
$subSelectedTab = "aboutUs";
if(array_key_exists("subSelected", $_GET)){
	$subSelectedTab = $_GET['subSelected'];
}
?>
<table  border="0" cellpadding="0" cellspacing="0" width="100%">
   <tr>
	  <td>
<?php 
if($subSelectedTab == "aboutUs"){
	include("abcVision.php");
}
if($subSelectedTab == "services"){
	include("abcServices.php");
}
?>
	  </td>
    </tr>
    <tr>
      <td>
		<table border="0" width="100%" cellpadding="0" cellspacing="0" height="7"><tr><td align="center"></td></tr></table>
	  </td>
   </tr>
   <tr>
	  <td>
<?php 
if($subSelectedTab == "aboutUs"){
	include("abcAboutUs.php");
}
if($subSelectedTab == "services"){
	include("abcIntension.php");
}
?>
	 </td>
   </tr>
</table>
