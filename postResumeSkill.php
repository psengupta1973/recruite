<?php 
$skills = array();
$skillDAO = new ResumeSkillDAO();
$skills = $skillDAO->getSkills($_SESSION['resumeid']);
$_SESSION['skillid'] = null;

$showForm = false;

if(count($skills) !== 0){
?>

<!-----------------------------------------------  Skills List --------------------------------------------------->
<table border="0" cellpadding="0" cellspacing="0" width='100%'>
   <tr>
	  <td>
		<table  border="0"  cellpadding="0" cellspacing="1" width='100%' bgcolor='#6699CC'>
			<tr>
			  <td>
				<table cellspacing="2" border="0" cellpadding="0" width='100%'>
					<tr>
						<td class="bluebandheading1" align='left'>Manage&nbsp;Skills</td>
						<td class="text-bold-white" align='right'>
							<a href='index.php?subSelected=postResumeSkill&mode=add'>Add&nbsp;Skill</a>&nbsp;|&nbsp;
<?php
							echo "<a href='index.php?subSelected=postResume&resumeid=".$_SESSION['resumeid']."&mode=edit'>General&nbsp;Info</a>&nbsp;|&nbsp;\n";
							echo "<a href='index.php?subSelected=postResumeEdu&resumeid=".$_SESSION['resumeid']."'>Education</a>&nbsp;|&nbsp;\n";
							echo "<a href='index.php?subSelected=postResumeExp&resumeid=".$_SESSION['resumeid']."'>Experience</a>\n";
?>
						</td>
					</tr>
				</table>
				<table cellspacing="0" border="0" cellpadding="3" width="100%">
					<tr bgcolor='#DDEEFF' class="text">
						<td align='left'><b>Skill&nbsp;Name</b></td>
						<td align='center'><b>Worked&nbsp;For</b></td>
						<td align='center'><b>Level&nbsp;of&nbsp;Experties</b></td>
						<td align='center'><b>Edit</b></td>
						<td align='center'><b>Delete</b></td>
					</tr>
<?php
					$color = "#FFFFFF";
					foreach ($skills as $skl){
						echo "<tr bgcolor='$color' class='label1'>\n";
						echo "<td align='left'><b>".$skl->getName()."</b></td>\n";
						echo "<td align='center'>".$skl->getDurationYears()." years ".$skl->getDurationMonths()." months</td>\n";
						echo "<td align='center'>".$skl->getExpertLevel()."</td>\n";
						echo "<td align='center'><a href='index.php?subSelected=postResumeSkill&skillid="
						.$skl->getId()."&mode=edit'>Edit</a></td>\n";
						echo "<td align='center'><a href='index.php?subSelected=postResumeSkill&skillid="
						.$skl->getId()."&mode=del'>Delete</a></td>\n";
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


if(array_key_exists("skillid", $_GET) && !empty($_GET['skillid'])){// coming from Resume List
	$_SESSION['skillid'] = $_GET['skillid'];
	if(array_key_exists('mode', $_GET)){
		if($_GET['mode'] == 'edit' || $_GET['mode'] == 'del'){
			if($_GET['mode'] == 'del'){
				$skillDAO->deleteResumeSkill($_SESSION['skillid']);
				$_SESSION['skillid'] = null;
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?subSelected=postResumeSkill">';
				exit();
			}
			$showForm = true;
		}
	}
}
else{
	if(array_key_exists('mode', $_GET) && $_GET['mode'] == 'add'){
		$_SESSION['skillid'] = null;
		$showForm = true;
	}
}

$skill = new ResumeSkill();
if(!empty($_SESSION['skillid'])){
	$skill = $skillDAO->getSkill($_SESSION['skillid']);
}

if($showForm == true){
?>

<!----------------------------------------------------  Skill Form  ------------------------------------------------------->
<table border="0" cellpadding="0" cellspacing="0" width='100%'>
   <tr>
	  <td>
		<table  border="0" cellpadding="0" cellspacing="1" bgcolor='#6699CC'>
			<tr bgcolor='#FFFFFF'>
			  <td width='70%'>
				<table cellspacing="2" border="0" cellpadding="0" width='100%' bgcolor='#6699CC'>
					<tr>
						<td class="bluebandheading1" align='left'>Skill&nbsp;Details</td>
					</tr>
				</table>
				<table cellspacing="0" border="0" cellpadding="2" width="100%">
					<form method="POST" action="saveResume.php" name="resumeEntryForm">
					<tr><td height='10' align="right"></td></tr>
					<tr>
					   <td align="right" class='text'><b>Skill&nbsp;Name</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='skillName' size='40' value='".$skill->getName()."'>\n";
?>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Worked&nbsp;For</b>
					   <td align='left'>
						 <select size="1" name="skillYears">
<?php 
							$years = intval($skill->getDurationYears());
							for($i=0; $i<21; $i++){
								$selected = "";
								if($years == $i){
									$selected = "selected";
								}
								if($i == 0){
									echo "<option selected value='$i'>-- Years --</option>\n";
								}
								else{
									echo "<option $selected value='$i'>$i years</option>\n";
								}
							}
?>
						 </select>
						 <select size="1" name="skillMonths">
<?php 
							$months = intval($skill->getDurationMonths());
							for($i=0; $i<12; $i++){
								$selected = "";
								if($months == $i){
									$selected = "selected";
								}
								if($i == 0){
									echo "<option selected value='$i'>-- Months --</option>\n";
								}
								else{
									echo "<option $selected value='$i'>$i months</option>\n";
								}
							}
?>
						 </select>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Level&nbsp;Of&nbsp;Experties</b></td>
					   <td align='left'>
						 <select size="1" name="expertLevel">
<?php 
							$level = intval($skill->getExpertLevel());
							for($i=0; $i<6; $i++){
								$selected = "";
								if($level == $i){
									$selected = "selected";
								}
								if($i == 0){
									echo "<option selected value='$i'>-- Select --</option>\n";
								}
								else{
									echo "<option $selected value='$i'>$i</option>\n";
								}
							}
?>
						 </select>
					   </td>
					</tr>
					<tr><td height='10' align="right"></td></tr>
					<tr>
					   <td align="right">&nbsp;</td>
					   <td align="left"><input class="buttons1" style='width:150px' type="submit" value="Save Skill" name="skillSave"></td>
					</tr>
					<tr><td height='5' align="right"></td></tr>
					   <input type="hidden" value="postResumeSkill" name="subSelected">
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
	if(count($skills) == 0){
		echo "<table  border='0' cellpadding='0' bgcolor='#6699CC' cellspacing='1' width='100%'>";
		echo "<tr>\n";
		echo "<td>\n";
		echo "<table cellspacing='0' border='0' cellpadding='2' width='100%'>\n";
		echo "<tr align='center' bgcolor='#6699CC'>\n";
		echo "<td class='bluebandheading1'><b>Warning</b></td>\n";
		echo "</tr>\n";
		echo "<tr bgcolor='#FFFFFF' valign='top'>\n";
		echo "<td class='text'>Sorry! please <a href='index.php?subSelected=postResume'><u>save the resume</u></a> before adding skill details to it.</td>\n";
		echo "</tr>\n";
		echo "</table>\n";
		echo "</td>\n";
		echo "</tr>\n";
		echo "</table>\n";
	}
}
?>