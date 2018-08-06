<?php 
$experiences = array();
$experienceDAO = new ResumeExperienceDAO();
$experiences = $experienceDAO->getExperiences($_SESSION['resumeid']);
$_SESSION['experienceid'] = null;

$showForm = false;

if(count($experiences) !== 0){
?>

<!-----------------------------------------------  Educations List --------------------------------------------------->
<table border="0" cellpadding="0" cellspacing="0" width='100%'>
   <tr>
	  <td>
		<table  border="0"  cellpadding="0" cellspacing="1" width='100%' bgcolor='#6699CC'>
			<tr>
			  <td>
				<table cellspacing="2" border="0" cellpadding="0" width='100%'>
					<tr>
						<td class="bluebandheading1" align='left'>Manage&nbsp;Experiences</td>
						<td class="text-bold-white" align='right'>
							<a href='index.php?subSelected=postResumeExp&mode=add'>Add&nbsp;Experience</a>&nbsp;|&nbsp;
<?php
							echo "<a href='index.php?subSelected=postResume&resumeid=".$_SESSION['resumeid']."&mode=edit'>General&nbsp;Info</a>&nbsp;|&nbsp;\n";
							echo "<a href='index.php?subSelected=postResumeEdu&resumeid=".$_SESSION['resumeid']."'>Education</a>&nbsp;|&nbsp;\n";
							echo "<a href='index.php?subSelected=postResumeSkill&resumeid=".$_SESSION['resumeid']."'>Skills</a>\n";
?>
						</td>
					</tr>
				</table>
				<table cellspacing="0" border="0" cellpadding="3" width="100%">
					<tr bgcolor='#DDEEFF' class="text">
						<td align='left'><b>Company</b></td>
						<td align='center'><b>Industry</b></td>
						<td align='center'><b>Designation</b></td>
						<td align='center'><b>Joining</b></td>
						<td align='center'><b>Leaving</b></td>
						<td align='center'><b>Location</b></td>
						<td align='center'><b>Is&nbsp;Current</b></td>
						<td align='center'><b>Edit</b></td>
						<td align='center'><b>Delete</b></td>
					</tr>
<?php
					$color = "#FFFFFF";
					foreach ($experiences as $exp){
						echo "<tr bgcolor='$color' class='label1'>\n";
						echo "<td align='left'><b>".$exp->getCompany()."</b></td>\n";
						echo "<td align='center'>".$exp->getIndustry()."</td>\n";
						echo "<td align='center'>".$exp->getDesignation()."</td>\n";
						echo "<td align='center'>".$exp->getJoining()."</td>\n";
						echo "<td align='center'>".$exp->getLeaving()."</td>\n";
						echo "<td align='center'>".$exp->getLocation()."</td>\n";
						$current = "No";
						if($exp->isCurrent() == 'y'){
							$current = "Yes";
						}
						echo "<td align='center'>".$current."</td>\n";
						echo "<td align='center'><a href='index.php?subSelected=postResumeExp&experienceid="
						.$exp->getId()."&mode=edit'>Edit</a></td>\n";
						echo "<td align='center'><a href='index.php?subSelected=postResumeExp&experienceid="
						.$exp->getId()."&mode=del'>Delete</a></td>\n";
						echo "</tr>\n";
						if($color == "#FFFFFF"){
							$color = "#EBEBEB";
						}
						else{
							$color = "#FFFFFF";
						}
					}
?>
				</table>
			</td>
		</tr>
		</table>
	 </td>
   </tr>
</table>

<?php
}
else{
	if(array_key_exists("resumeid", $_SESSION) && !empty($_SESSION['resumeid'])){
		$showForm = true;
	}
}


if(array_key_exists("experienceid", $_GET) && !empty($_GET['experienceid'])){
	$_SESSION['experienceid'] = $_GET['experienceid'];
	if(array_key_exists('mode', $_GET)){
		if($_GET['mode'] == 'edit' || $_GET['mode'] == 'del'){
			if($_GET['mode'] == 'del'){
				$experienceDAO->deleteResumeExperience($_SESSION['experienceid']);
				$_SESSION['experienceid'] = null;
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?subSelected=postResumeExp">';
				exit();
			}
			$showForm = true;
		}
	}
}
else{
	if(array_key_exists('mode', $_GET) && $_GET['mode'] == 'add'){
		$_SESSION['experienceid'] = null;
		$showForm = true;
	}
}

$experience = new ResumeExperience();
if(!empty($_SESSION['experienceid'])){
	$experience = $experienceDAO->getExperience($_SESSION['experienceid']);
}

if($showForm == true){
?>

<!----------------------------------------------------  Experience Form  ------------------------------------------------------->
<table border="0" cellpadding="0" cellspacing="0" width='100%'>
   <tr>
	  <td>
		<table  border="0" cellpadding="0" cellspacing="1" bgcolor='#6699CC'>
			<tr bgcolor='#FFFFFF'>
			  <td width='70%'>
				<table cellspacing="2" border="0" cellpadding="0" width='100%' bgcolor='#6699CC'>
					<tr>
						<td class="bluebandheading1" align='left'>Professional&nbsp;Experience</td>
					</tr>
				</table>
				<table cellspacing="0" border="0" cellpadding="2" width="100%">
					<form method="POST" action="saveResume.php" name="resumeEntryForm">
					<tr><td height='10' align="right"></td></tr>
					<tr>
					   <td align="right" class='text'><b>Company&nbsp;Name</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='company' size='30' value='".$experience->getCompany()."'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Designation</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='designation' size='20' value='".$experience->getDesignation()."'>\n";
?>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Location</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='location' size='30' value='".$experience->getLocation()."'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Level/&nbsp;Seniority</b></td>
					   <td align='left'>
						 <select size="1" name="seniority">
<?php
							$level = $experience->getSeniority();
							echo "<option ".$level;
							if($level == RecruiteUtil::$NO_SELECT){
								echo " selected";
							}
							echo " value='#'>-- Select --</option>\n";
							echo "<option ";
							if($level == ResumeExperience::$TOP_MGMT){
								echo " selected";
							}
							echo " value='".ResumeExperience::$TOP_MGMT."'>Top&nbsp;Management</option>\n";
							echo "<option ";
							if($level == ResumeExperience::$TOP_TECH){
								echo " selected";
							}
							echo " value='".ResumeExperience::$TOP_TECH."'>Top&nbsp;Technical</option>\n";
							echo "<option ";
							if($level == ResumeExperience::$MID_MGMT){
								echo " selected";
							}
							echo " value='".ResumeExperience::$MID_MGMT."'>Mid&nbsp;Management</option>\n";
							echo "<option ";
							if($level == ResumeExperience::$MID_TECH){
								echo " selected";
							}
							echo " value='".ResumeExperience::$MID_TECH."'>Mid&nbsp;Technical</option>\n";
							echo "<option ";
							if($level == ResumeExperience::$JUN_MGMT){
								echo " selected";
							}
							echo " value='".ResumeExperience::$JUN_MGMT."'>Junior&nbsp;Management</option>\n";
							echo "<option ";
							if($level == ResumeExperience::$JUN_TECH){
								echo " selected";
							}
							echo " value='".ResumeExperience::$JUN_TECH."'>Junior&nbsp;Technical</option>\n";
							echo "<option ";
							if($level == ResumeExperience::$FRESHER){
								echo " selected";
							}
							echo " value='".ResumeExperience::$FRESHER."'>Fresher</option>\n";
							echo "<option ";
							if($level == ResumeExperience::$OTHER_EXP){
								echo " selected";
							}
							echo " value='".ResumeExperience::$OTHER_EXP."'>Other</option>\n";
?>
						 </select>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Joining</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='joining' size='15' value='".$experience->getJoining()."'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>CTC</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='ctc' size='15' value='".$experience->getCTC()."'>\n";
?>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Leaving</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='leaving' size='15' value='".$experience->getLeaving()."'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Type&nbsp;Of&nbsp;Job</b></td>
					   <td align='left'>
						 <select size="1" name="type">
<?php 
							$type = $experience->getJobType();
							echo "<option ";
							if($type == RecruiteUtil::$NO_SELECT){
								echo " selected";
							}
							echo " value='".RecruiteUtil::$NO_SELECT."'>-- Select Job Type --</option>\n";
							echo "<option ";
							if($type == Job::$PERMANANT){
								echo " selected";
							}
							echo " value='".Job::$PERMANANT."'>Permanant</option>\n";
							echo "<option ";
							if($type == Job::$CONTRACT){
								echo " selected";
							}
							echo " value='".Job::$CONTRACT."'>Contract</option>\n";
?>
						 </select>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Functional&nbsp;Area</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='functionalarea' size='25' value='".$experience->getFuncArea()."'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Term&nbsp;Of&nbsp;Job</b></td>
					   <td align='left'>
						 <select size="1" name="term">
<?php 
							$term = $experience->getJobTerm();
							echo "<option ";
							if($term == RecruiteUtil::$NO_SELECT){
								echo " selected";
							}
							echo " value='".RecruiteUtil::$NO_SELECT."'>-- Select Job Term --</option>\n";
							echo "<option ";
							if($term == Job::$FULL_TIME){
								echo " selected";
							}
							echo " value='".Job::$FULL_TIME."'>Full&nbsp;Time</option>\n";
							echo "<option ";
							if($term == Job::$PART_TIME){
								echo " selected";
							}
							echo " value='".Job::$PART_TIME."'>Part&nbsp;Time</option>\n";
?>
						 </select>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Responsibility</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='responsibility' size='30' value='".$experience->getResponsibility()."'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Achievements</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='achievement' size='40' value='".$experience->getAchievement()."'>\n";
?>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Industry</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='industry' size='20' value='".$experience->getIndustry()."'>\n";
?>
					   </td>
					   <td align="right" class='text'>Current&nbsp;Job</td>
					   <td align='left'>
<?php 
						$current = "";
						if($experience->isCurrent() == 'y'){
							$current = "checked";
						}
						echo "<input class='select' type='checkbox' name='current' ".$current.">\n";
?>
						</td>
					</tr>
					<tr><td height='10' align="right"></td></tr>
					<tr>
					   <td align="left">&nbsp;</td>
					   <td align="left">&nbsp;</td>
					   <td align="left">&nbsp;</td>
					   <td align="left"><input class="buttons1" style='width:200px' type="submit" value="Save Experience" name="expSave"></td>
					</tr>
					<tr><td height='5' align="right"></td></tr>
					   <input type="hidden" value="postResumeExp" name="subSelected">
					</form>
		</table>
	 </td>
	 <td width='30%' valign='top'>
		<table  border="0" cellpadding="0" cellspacing="1"  width="100%">
		   <tr>
			  <td>
				<table cellspacing="0" border="0" cellpadding="2" align='left' width="100%">
					<tr >
						<td class="text"><b>Resume&nbsp;Posting&nbsp;Help</b></td>
					</tr>
					<tr >
						<td class="text">User name is subject to availability of login ID on JobHouse.com</td>
					</tr>
				</table>
			  </td>
		  </tr>
		</table>
	 </td>
   </tr>
</table>

<?php
}
else{
	if(count($experiences) == 0){
		echo "<table  border='0' cellpadding='0' bgcolor='#6699CC' cellspacing='1' width='100%'>";
		echo "<tr>\n";
		echo "<td>\n";
		echo "<table cellspacing='0' border='0' cellpadding='2' width='100%'>\n";
		echo "<tr align='center' bgcolor='#6699CC'>\n";
		echo "<td class='bluebandheading1'><b>Warning</b></td>\n";
		echo "</tr>\n";
		echo "<tr bgcolor='#FFFFFF' valign='top'>\n";
		echo "<td class='text'>Sorry! please <a href='index.php?subSelected=postResume'><u>save the resume</u></a> before adding experiences to it.</td>\n";
		echo "</tr>\n";
		echo "</table>\n";
		echo "</td>\n";
		echo "</tr>\n";
		echo "</table>\n";
	}
}
?>