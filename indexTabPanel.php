<?php 

if(array_key_exists("selectedTab", $_GET)){
	$_SESSION['selectedTab'] = $_GET['selectedTab'];
	$_SESSION['subSelected'] = null;
}
$selectedTab = $_SESSION['selectedTab'];

if(array_key_exists("subSelected", $_GET)){
	$_SESSION['subSelected'] = $_GET['subSelected'];
}
$subSelectedTab = $_SESSION['subSelected'];

?>
				<table border="0" cellpadding="0" width="100%" cellspacing="0">
				  <tr>
				   <td align="left">
					<table border="0" width="100%" cellpadding="0" cellspacing="0">
					  <tr>
<?php 
					if($selectedTab == "home")
					{
						echo "<td width='9%' class='on-tab'>Home</td>\n";
					}
					else
					{
						echo "<td width='9%' class='off-tab'><a href='index.php?selectedTab=home'>Home</a></td>\n";
					}
?>
						<td class="off-tab">&nbsp;|&nbsp;</td>
<?php 
					if($selectedTab == "employer")
					{
						echo "<td width='9%' class='on-tab'>Employer</td>\n";
					}
					else
					{
						echo "<td width='9%' class='off-tab'><a href='empHome.php?selectedTab=employer'>Employer</a></td>\n";
					}
?>
						<td class="off-tab">&nbsp;|&nbsp;</td>
<?php 
					if($selectedTab == "abc")
					{
						echo "<td width='9%' class='on-tab'>ABC&nbsp;Consultants</td>\n";
					}
					else
					{
						echo "<td width='9%' class='off-tab'><a href='abcConsultants.php?selectedTab=abc'>ABC&nbsp;Consultants</a></td>\n";
					}
?>
						<td class="off-tab" width="60%">
<?php 
include("indexLoginPanel.php");
?>
						</td>
					  </tr>
					 </table>
					</td>
				  </tr>
				 </table>
