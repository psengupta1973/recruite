<?php 
$educations = array();
$educationDAO = new ResumeEducationDAO();
$educations = $educationDAO->getEducations($_SESSION['resumeid']);
$_SESSION['educationid'] = null;

$showForm = false;

if(count($educations) !== 0){
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
						<td class="bluebandheading1" align='left'>Manage&nbsp;Educations</td>
						<td class="text-bold-white" align='right'>
							<a href='index.php?subSelected=postResumeEdu&mode=add'>Add&nbsp;Education</a>&nbsp;|&nbsp;
<?php
							echo "<a href='index.php?subSelected=postResume&resumeid=".$_SESSION['resumeid']."&mode=edit'>General&nbsp;Info</a>&nbsp;|&nbsp;\n";
							echo "<a href='index.php?subSelected=postResumeExp&resumeid=".$_SESSION['resumeid']."'>Experience</a>&nbsp;|&nbsp;\n";
							echo "<a href='index.php?subSelected=postResumeSkill&resumeid=".$_SESSION['resumeid']."'>Skills</a>\n";
?>
						</td>
					</tr>
				</table>
				<table cellspacing="0" border="0" cellpadding="3" width="100%">
					<tr bgcolor='#DDEEFF' class="text">
						<td align='left'><b>Title&nbsp;Obtained</b></td>
						<td align='center'><b>Title&nbsp;Type</b></td>
						<td align='center'><b>Year</b></td>
						<td align='center'><b>Institute</b></td>
						<td align='center'><b>Percentage</b></td>
						<td align='center'><b>Edit</b></td>
						<td align='center'><b>Delete</b></td>
					</tr>
<?php
					$color = "#FFFFFF";
					foreach ($educations as $edu){
						echo "<tr bgcolor='$color' class='label1'>\n";
						echo "<td align='left'><b>".$edu->getTitle()."</b>&nbsp;(".$edu->getSubject()
						.")</td>\n";
						$type = '';
						if($edu->getTitleType() == ResumeEducation::$DEGREE){
							$type = 'Degree';
						}
						if($edu->getTitleType() == ResumeEducation::$DIPLOMA){
							$type = 'Diploma';
						}
						if($edu->getTitleType() == ResumeEducation::$CERTIFICATE){
							$type = 'Certificate';
						}
						if($edu->getTitleType() == ResumeEducation::$OTHER_DEGREE){
							$type = 'Other';
						}
						echo "<td align='center'>".$type."</td>\n";
						echo "<td align='center'>".$edu->getYear()."</td>\n";
						echo "<td align='center'>".$edu->getInstitute()."</td>\n";
						echo "<td align='center'>".$edu->getPercentage()."%</td>\n";
						echo "<td align='center'><a href='index.php?subSelected=postResumeEdu&educationid="
						.$edu->getId()."&mode=edit'>Edit</a></td>\n";
						echo "<td align='center'><a href='index.php?subSelected=postResumeEdu&educationid="
						.$edu->getId()."&mode=del'>Delete</a></td>\n";
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


if(array_key_exists("educationid", $_GET) && !empty($_GET['educationid'])){// coming from Resume List
	$_SESSION['educationid'] = $_GET['educationid'];
	if(array_key_exists('mode', $_GET)){
		if($_GET['mode'] == 'edit' || $_GET['mode'] == 'del'){
			if($_GET['mode'] == 'del'){
				$educationDAO->deleteResumeEducation($_SESSION['educationid']);
				$_SESSION['educationid'] = null;
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?subSelected=postResumeEdu">';
				exit();
			}
			$showForm = true;
		}
	}
}
else{
	if(array_key_exists('mode', $_GET) && $_GET['mode'] == 'add'){
		$_SESSION['educationid'] = null;
		$showForm = true;
	}
}

$education = new ResumeEducation();
if(!empty($_SESSION['educationid'])){
	$education = $educationDAO->getEducation($_SESSION['educationid']);
}

if($showForm == true){
?>

<!----------------------------------------------------  Education Form  ------------------------------------------------------->
<table border="0" cellpadding="0" cellspacing="0" width='100%'>
   <tr>
	  <td>
		<table  border="0" cellpadding="0" cellspacing="1" bgcolor='#6699CC'>
			<tr bgcolor='#FFFFFF'>
			  <td width='80%'>
				<table cellspacing="2" border="0" cellpadding="0" width='100%' bgcolor='#6699CC'>
					<tr>
						<td class="bluebandheading1" align='left'>Education&nbsp;/&nbsp;Training</td>
					</tr>
				</table>
				<table cellspacing="0" border="0" cellpadding="2" width="100%" bgcolor='#FFFFFF'>
					<form method="POST" action="saveResume.php" name="resumeEntryForm">
					<tr><td height='10' align="right"></td></tr>
					<tr>
					   <td align="right" class='text'><b>Title&nbsp;Obtained</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='title' size='30' value='".$education->getTitle()."'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Name&nbsp;Of&nbsp;Institute</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='institute' size='30' value='".$education->getInstitute()."'>\n";
?>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Title&nbsp;Type</b></td>
					   <td align='left'>
						 <select size="1" name="type">
<?php 
							$type = $education->getTitleType();
							echo "<option ";
							if($type == RecruiteUtil::$NO_SELECT){
								echo " selected";
							}
							echo " value='#'>-- Select --</option>\n";
							echo "<option ";
							if($type == ResumeEducation::$DEGREE){
								echo " selected";
							}
							echo " value='".ResumeEducation::$DEGREE."'>Degree</option>\n";
							echo "<option ";
							if($type == ResumeEducation::$DIPLOMA){
								echo " selected";
							}
							echo " value='".ResumeEducation::$DIPLOMA."'>Diploma</option>\n";
							echo "<option ";
							if($type == ResumeEducation::$CERTIFICATE){
								echo " selected";
							}
							echo " value='".ResumeEducation::$CERTIFICATE."'>Certificate</option>\n";
							echo "<option ";
							if($type == ResumeEducation::$OTHER_DEGREE){
								echo " selected";
							}
							echo " value='".ResumeEducation::$OTHER_DEGREE."'>Other</option>\n";
?>
						 </select>
					   </td>
					   <td align="right" class='text'><b>Year&nbsp;Of&nbsp;Passing</b></td>
					   <td align='left'>
						 <select size="1" name="year">
							<option value='#'>-- Select --</option>
<?php 
						$selectedYear = intval($education->getYear());
						$currYear = date("Y");
						for($i=$currYear-40; $i<$currYear; $i++){
							echo "<option";
							if($selectedYear == $i){
								echo " selected";
							}
							echo " value='$i'>$i</option>\n";
						}
?>
						 </select>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Subject</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='subject' size='30' value='".$education->getSubject()."'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Duration</b></td>
					   <td align='left'>
						 <select size="1" name="durYears">
						 <option value='#'>-- Years --</option>
<?php 
						$durYears = $education->getDurationYears();
						for($i=0; $i<10; $i++){
							echo "<option";
							if($durYears == $i){
								echo " selected";
							}
							echo " value='$i'>$i</option>\n";
						}
?>
						 </select>
						 <select size="1" name="durMonths">
							<option value='#'>-- Months --</option>
<?php 
							$durMonths = $education->getDurationMonths();
							for($i=0; $i<12; $i++){
								echo "<option";
								if($durMonths == $i){
									echo " selected";
								}
								echo " value='$i'>$i</option>\n";
							}
?>
						 </select>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Percentage</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='percentage' size='10' value='".$education->getPercentage()."'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Standard/&nbsp;Level</b></td>
					   <td align="left" class='text'>
						 <select size="1" name="standard">
<?php 
							$type = $education->getStandard();
echo $type ;
							echo "<option ";
							if($type == RecruiteUtil::$NO_SELECT){
								echo " selected";
							}
							echo " value='#'>-- Select --</option>\n";
							echo "<option ";
							if($type == ResumeEducation::$GRADUATE){
								echo " selected";
							}
							echo " value='".ResumeEducation::$GRADUATE."'>Graduate</option>\n";
							echo "<option ";
							if($type == ResumeEducation::$POST_GRADUATE){
								echo " selected";
							}
							echo " value='".ResumeEducation::$POST_GRADUATE."'>Post&nbsp;Graduate</option>\n";
							echo "<option ";
							if($type == ResumeEducation::$MASTERS){
								echo " selected";
							}
							echo " value='".ResumeEducation::$MASTERS."'>Masters</option>\n";
							echo "<option ";
							if($type == ResumeEducation::$POST_MASTERS){
								echo " selected";
							}
							echo " value='".ResumeEducation::$POST_MASTERS."'>Post&nbsp;Masters</option>\n";
							echo "<option ";
							if($type == ResumeEducation::$DOCTORATE){
								echo " selected";
							}
							echo " value='".ResumeEducation::$DOCTORATE."'>Doctorate</option>\n";
							echo "<option ";
							if($type == ResumeEducation::$POST_DOCTORATE){
								echo " selected";
							}
							echo " value='".ResumeEducation::$POST_DOCTORATE."'>Post&nbsp;Doctorate</option>\n";
							echo "<option ";
							if($type == ResumeEducation::$HIGH_SCHOOL){
								echo " selected";
							}
							echo " value='".ResumeEducation::$HIGH_SCHOOL."'>High&nbsp;School</option>\n";
							echo "<option ";
							if($type == ResumeEducation::$SCHOOL){
								echo " selected";
							}
							echo " value='".ResumeEducation::$SCHOOL."'>School</option>\n";
							echo "<option ";
							if($type == ResumeEducation::$PROFESSIONAL){
								echo " selected";
							}
							echo " value='".ResumeEducation::$PROFESSIONAL."'>Professional</option>\n";
							echo "<option ";
							if($type == ResumeEducation::$OTHER_EDU){
								echo " selected";
							}
							echo " value='".ResumeEducation::$OTHER_EDU."'>Other</option>\n";
?>
						 </select>
					   </td>
					</tr>
					<tr><td height='10' align="right"></td></tr>
					<tr>
					   <td align="left">&nbsp;</td>
					   <td align="left">&nbsp;</td>
					   <td align="left">&nbsp;</td>
					   <td align="left"><input class="buttons1" style='width:200px' type="submit" value="Save&nbsp;Education" name="eduSave"></td>
					</tr>
					<tr height='5'><td align="right"></td></tr>
					   <input type="hidden" value="postResumeEdu" name="subSelected">
					</form>
		</table>
	 </td>
	 <td width='20%' valign='top'>
		<table  border="0" cellpadding="2" cellspacing="0"  width="100%" bgcolor='#FFFFFF'>
			<tr>
				<td class="text"><b>Resume&nbsp;Posting&nbsp;Help</b><BR><BR></td>
			</tr>
			<tr>
				<td class="text">User name is subject to availability of login ID on JobHouse.com</td>
			</tr>
		</table>
	 </td>
   </tr>
</table>

<?php
}
else{
	if(count($educations) == 0){
		echo "<table  border='0' cellpadding='0' bgcolor='#6699CC' cellspacing='1' width='100%'>";
		echo "<tr>\n";
		echo "<td>\n";
		echo "<table cellspacing='0' border='0' cellpadding='2' width='100%'>\n";
		echo "<tr align='center' bgcolor='#6699CC'>\n";
		echo "<td class='bluebandheading1'><b>Warning</b></td>\n";
		echo "</tr>\n";
		echo "<tr bgcolor='#FFFFFF' valign='top'>\n";
		echo "<td class='text'>Sorry! please <a href='index.php?subSelected=postResume'><u>save the resume</u></a> before adding educations to it.</td>\n";
		echo "</tr>\n";
		echo "</table>\n";
		echo "</td>\n";
		echo "</tr>\n";
		echo "</table>\n";
	}
}
?>