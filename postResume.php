<?php 
$resumes = array();
$resumeDAO = new ResumeDAO();
$resumes = $resumeDAO->getResumesByUser($_SESSION['userid']);
$_SESSION['resumeid'] = null;

$showForm = false;

if(count($resumes) !== 0){
?>
<!-------------------------------------------------- Resume List  -------------------------------------------------------->
<table border="0" cellpadding="0" cellspacing="0" width='100%'>
   <tr>
	  <td>
		<table border="0"  cellpadding="0" cellspacing="1" width='100%' bgcolor='#6699CC'>
			<tr>
			  <td>
				<table cellspacing="2" border="0" cellpadding="0" width='100%'>
					<tr>
						<td class="bluebandheading1" align='left'>Manage&nbsp;Resumes</td>
						<td class="text-bold-white" align='right'>
							<a href='index.php?subSelected=postResume&mode=add'>Add&nbsp;Resume</a>
						</td>
					</tr>
				</table>
				<table cellspacing="0" border="0" cellpadding="3" width="100%">
					<form method="POST" action="saveResume.php" name="resumeListForm">
					<tr bgcolor='#DDEEFF' class="text">
						<td align='left'><b>Title</b></td>
						<td align='center'><b>Last&nbsp;Modified</b></td>
						<td align='center'><b>Status</b></td>
						<td align='center'><b>E-Mail</b></td>
						<td align='center'><b>Edit</b></td>
						<td align='center'><b>Delete</b></td>
					</tr>
<?php
						$color = "#FFFFFF";
						foreach ($resumes as $resume){
							echo "<tr bgcolor='$color' class='label1'>\n";
							echo "<td align='left'><a href='index.php?subSelected=postResume&resumeid="
							.$resume->getId()."&mode=preview'><b>".$resume->getTitle()."</b></a></td>\n";
							echo "<td align='center'>".$resume->getLastModDate()."</td>\n";
							echo "<td align='center'>\n";
							echo "<select size='1' name='visibility'>";
							echo "<option selected value='v'>Visible</option>";
							echo "<option value='h'>Hidden</option>";
							echo "</select>\n";
							echo "</td>\n";
							echo "<td align='center'><a href=''>E-Mail</a></td>\n";
							echo "<td align='center'><a href='index.php?subSelected=postResume&resumeid="
							.$resume->getId()."&mode=edit'>Edit</a></td>\n";
							echo "<td align='center'><a href='index.php?subSelected=postResume&resumeid="
							.$resume->getId()."&mode=del'>Delete</a></td>\n";
							echo "</tr>\n";
							if($color == "#FFFFFF"){
								$color = "#EBEBEB";
							}
							else{
								$color = "#FFFFFF";
							}
						}
?>
					   <input type="hidden" value="postResume" name="subSelected">
					</form>
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
	$showForm = true;
}


if(array_key_exists("resumeid", $_GET) && !empty($_GET['resumeid'])){// coming from Resume List
	$_SESSION['resumeid'] = $_GET['resumeid'];
	if(array_key_exists('mode', $_GET)){
		if($_GET['mode'] == 'edit' || $_GET['mode'] == 'del'){
			if($_GET['mode'] == 'del'){
				$resumeDAO->deleteResume($_SESSION['resumeid']);
				$_SESSION['resumeid'] = null;
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?subSelected=postResume">';
				exit();
			}
			$showForm = true;
		}
		if($_GET['mode'] == 'preview'){
			include("postResumePre.php");
			exit();
		}
	}
}
else{
	if(array_key_exists('mode', $_GET) && $_GET['mode'] == 'add'){
		$_SESSION['resumeid'] = null;
		$showForm = true;
	}
}


$resume = new Resume();
$personalInfo = new PersonalInfo();
$personalDAO = new PersonalInfoDAO();

// the order of next 2 IF() statements should always be in given sequence.
if(!empty($_SESSION['resumeid'])){
	$resume = $resumeDAO->getResume($_SESSION['resumeid']);
	if($_SESSION['userType'] == User::$ADMIN){
		$personalInfo = $personalDAO->getPersonalInfo($_SESSION['resumeid']);
	}
}
if($_SESSION['userType'] !== User::$ADMIN){
	$personalInfo = $personalDAO->getPersonalInfo($_SESSION['userid']);
}

if($showForm == true){
?> 

<!-------------------------------------------------- Resume Form  -------------------------------------------------------->

<table border="0" cellpadding="0" cellspacing="0" width='100%'>
   <tr>
	  <td>
		<table border="0" cellpadding="0" cellspacing="1" bgcolor='#6699CC'>
			<tr bgcolor='#FFFFFF'>
			  <td width='70%'>
				<table cellspacing="2" border="0" cellpadding="0" width='100%' bgcolor='#6699CC'>
					<tr>
						<td class="bluebandheading1" align='left'>General&nbsp;Info</td>
						<td class="text-bold-white" align='right'>
							<a href='index.php?subSelected=postResumeEdu'>Education</a>&nbsp;|&nbsp;
							<a href='index.php?subSelected=postResumeExp'>Experience</a>&nbsp;|&nbsp;
							<a href='index.php?subSelected=postResumeSkill'>Skills</a>
						</td>
					</tr>
				</table>
				<table cellspacing="0" border="0" cellpadding="2" width="70%">
					<form enctype="multipart/form-data" method="POST" action="saveResume.php" name="resumeEntryForm">
					<tr bgcolor='#EFEFEF'>
						<td class="newuserheading1" align='left'>Personal&nbsp;Info</td>
						<td>&nbsp;</td>
						<td align='right'>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr><td height='10' align="right"></td></tr>
					<tr>
					   <td align="right" class='text'><b>First&nbsp;Name</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='fname' size='30' value='".$personalInfo->getFirstName()."'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Gender</b>
					   <td align='left'>
						 <select size="1" style='width:100px' name="gender">
<?php 
							$gender = $personalInfo->getGender();
							echo "<option ";
							if($gender == RecruiteUtil::$NO_SELECT){
								echo " selected";
							}
							echo " value='".RecruiteUtil::$NO_SELECT."'>-- Select --</option>\n";
							echo "<option ";
							if($gender == PersonalInfo::$MALE){
								echo " selected";
							}
							echo " value='".PersonalInfo::$MALE."'>Male</option>\n";
							echo "<option ";
							if($gender == PersonalInfo::$FEMALE){
								echo " selected";
							}
							echo " value='".PersonalInfo::$FEMALE."'>Female</option>\n";
?>
						 </select>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Last&nbsp;Name</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='lname' size='30' value='".$personalInfo->getLastName()."'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Date&nbsp;Of&nbsp;Birth</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='dob' size='20' value='".$personalInfo->getDoB()."'>\n";
?>
					   </td>
					</tr>
					<tr>
					   <td align='left'>&nbsp;</td>
					   <td align='left'>&nbsp;</td>
					   <td align="left" class='text'><b>&nbsp;Marital&nbsp;Status</b></td>
					   <td align='left'>
						 <select size="1" style='width:100px' name="marital">
<?php 
							$marital = $personalInfo->getMaritalStatus();
							echo "<option ";
							if($marital == RecruiteUtil::$NO_SELECT){
								echo " selected";
							}
							echo " value='".RecruiteUtil::$NO_SELECT."'>-- Select --</option>\n";
							echo "<option ";
							if($marital == PersonalInfo::$UNMARRIED){
								echo " selected";
							}
							echo " value='".PersonalInfo::$UNMARRIED."'>Unmarried</option>\n";
							echo "<option ";
							if($marital == PersonalInfo::$MARRIED){
								echo " selected";
							}
							echo " value='".PersonalInfo::$MARRIED."'>Married</option>\n";
							echo "<option ";
							if($marital == PersonalInfo::$WIDOWED){
								echo " selected";
							}
							echo " value='".PersonalInfo::$WIDOWED."'>Widowed</option>\n";
							echo "<option ";
							if($marital == PersonalInfo::$DIVORCED){
								echo " selected";
							}
							echo " value='".PersonalInfo::$DIVORCED."'>Divorced</option>\n";
							echo "<option ";
							if($marital == PersonalInfo::$OTHER){
								echo " selected";
							}
							echo " value='".PersonalInfo::$OTHER."'>Other</option>\n";
?>
						 </select>
					   </td>
					</tr>
					<tr><td height='10' align="right"></td></tr>
					<tr bgcolor='#EFEFEF'>
						<td class="newuserheading1" align='left'>Resume&nbsp;Brief</td>
						<td>&nbsp;</td>
						<td align='right'>&nbsp;</td>
						<td align='right' class="text">&nbsp;</td>
					</tr>
					<tr><td height='10' align="right"></td></tr>
					<tr>
					   <td align="right" class='text'><b>Resume&nbsp;Title</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='title' size='40' value='".$resume->getTitle()."'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Objective</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='objective' size='40' value='".$resume->getObjective()."'>\n";
?>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Experience</b></td>
					   <td align='left'>
						 <select size="1" name="experience">
<?php 
						$experience = intval($resume->getTotalExperience());
						for($i=0; $i<21; $i++){
							$selected = "";
							if($experience == $i){
								$selected = "selected";
							}
							if($i == 0){
								echo "<option selected value='$i'>-- Select years --</option>\n";
							}
							else{
								echo "<option $selected value='$i'>$i years</option>\n";
							}
						}
?>
						 </select>
					   </td>
					   <td align="right" class='text'><b>Key&nbsp;Skills</b></td>
					   <td align="left">
<?php 
					   echo "<input class='TextBox' type='text' name='keySkills' size='30' value='".$resume->getKeySkills()."'>\n";
?>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Specializations</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='specializations' size='40' value='".$resume->getSpecializations()."'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Remarks</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='remarks' size='40' value='".$resume->getRemarks()."'>\n";
?>
					   </td>
					</tr>
					<tr><td height='10' align="right"></td></tr>
					<tr bgcolor='#EFEFEF'>
						<td class="newuserheading1" align='left'>Expectations</td>
						<td>&nbsp;</td>
						<td align='right'>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr><td height='10' align="right"></td></tr>
					<tr valign='top'>
					   <td align="right">&nbsp;</td>
					   <td align="left" class='text'><b>Preferred&nbsp;Locations</b><BR>
						 <select size="8" width='20' name="prefLocations[]" multiple='yes'>
<?php 
							$countryDAO = new CountryDAO();
							$countries = $countryDAO->getAllCountries(null);
							echo "<option";
							$plocs = $resume->getPrefLocationsArray();
							if(count($plocs) == 0){
								 echo " selected ";
							}
							echo " value='".RecruiteUtil::$NO_SELECT."'>-- Select locations from list --</option>\n";
							foreach ($countries as $con){
								echo "<option";
								foreach ($plocs as $loc){
									if($con->getName() == $loc){
										echo " selected ";
									}
								}
								echo " value='".$con->getName()."'>".$con->getName()."</option>\n";
							}
?>
						 </select>
					   </td>
					   <td align="left">&nbsp;</td>
					   <td align="left" class='text'>
					   <b>Expected&nbsp;CTC&nbsp;</b>(in&nbsp;Indian&nbsp;rupees)<BR>
<?php 
					   echo "<input class='TextBox' type='text' name='expectCTC' size='25' value='".$resume->getExpectedCTC()."'>\n";
?>
						<BR><BR>
						<b>Expected&nbsp;Job&nbsp;Type</b><BR>
						 <select size="1" width='20' name="expectJobType">
<?php 
							$type = $resume->getExpectedJobType();
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
						 </select><BR><BR>
						<b>Expected&nbsp;Job&nbsp;Term</b><BR>
						 <select size="1" width='20' name="expectJobTerm">
<?php 
							$term = $resume->getExpectedJobTerm();
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
					<tr><td height='10' align="right"></td></tr>
					<tr bgcolor='#EFEFEF'>
						<td class="newuserheading1" align='left'>Resume&nbsp;Upload</td>
						<td>&nbsp;</td>
						<td align='right'>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr><td height='10' align="right"></td></tr>
					<tr valign='top'>
						<td>&nbsp;</td>
						<td class='text'><b>Textual&nbsp;Resume</b>
<?php 
					   echo "<textarea name='textual' style='height:90px;width:300px'>".htmlspecialchars($resume->getTextual())."</textarea>\n";
?>
						</td>
						<td>&nbsp;</td>
						<td align='left' class='text'>
<?php
							if($resume->getFileName() !== "" && $resume->getFileName() !== null){
								echo "[&nbsp;Last&nbsp;uploaded&nbsp;File:&nbsp;";
								echo "<a href='".RecruiteUtil::$UPLOAD_DIR.$resume->getId().RecruiteUtil::$UPLOAD_FILE_TYPE."'>"
								.$resume->getFileName()."</a>&nbsp;]<br>\n";
								echo "<b>Replace&nbsp;with&nbsp;new&nbsp;Word&nbsp;file<b><br>";
							}
							else{
								echo "<b>Upload&nbsp;Word&nbsp;File</b>";
							}
?>
							<input class='TextBox' type='file' name='resumeFile' size='20'>
							<BR><BR><BR><BR>
							<input class="buttons1" style='width:200px' type="submit" value="Save&nbsp;Resume" name="resumeCont">
					   </td>
					</tr>
					<tr height='5'><td align="right"></td></tr>
					   <input type="hidden" value="postResume" name="subSelected">
					</form>
		</table>
	 </td>
	 <td width='30%' valign='top'>
		<table  border="0" cellpadding="2" cellspacing="0" width="100%" bgcolor='#FFFFFF'>
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
?>