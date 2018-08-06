<?php 
session_start();
require_once("lib.php");



if(array_key_exists('subSelected', $_POST)){
	if($_POST['subSelected'] == "postResume"){
		$resume = new Resume();
		if(!empty($_SESSION['resumeid'])){
			$resume->setId($_SESSION['resumeid']);
		}
		$resume->setUserId($_SESSION['userid']);
		$resume->setTitle ( $_POST['title']);
		$resume->setObjective($_POST['objective']);
		$resume->setKeySkills($_POST['keySkills']);
		$resume->setSpecializations( $_POST['specializations']);
		$resume->setTotalExperience ( $_POST['experience']);
		$resume->setRemarks ( $_POST['remarks']);
		$resume->setExpectedCTC ( $_POST['expectCTC']);
		$resume->setExpectedJobType ( $_POST['expectJobType']);
		$resume->setExpectedJobTerm ( $_POST['expectJobTerm']);
		$resume->setTextual ( $_POST['textual']);
		$prefLocations = $_POST['prefLocations'];
		$locStr = "";
		$count = count($prefLocations);
		foreach ($prefLocations as $value){
			$locStr = $locStr.$value.";";
		}
		$resume->setPrefLocations ($locStr);
		if(array_key_exists('resumeFile', $_FILES) && !empty($_FILES['resumeFile']['name'])){
			$resume->setFileName(RecruiteUtil::uploadFile('resumeFile', $resume->getId()));
			if($resume->getFileName() == null){
				$resume->setFileName("");
				echo "Problem in uploading resume file.";
				exit;
			}
		}

		$resumeDAO = new ResumeDAO();
		if($resumeDAO->exists($resume->getId())){
			$resume = $resumeDAO->updateResume($resume);
		}
		else{
			$resume = $resumeDAO->insertResume($resume);
		}

		if($resume !== null){
			$_SESSION['resumeid'] = $resume->getId();
			$personalInfo = new PersonalInfo();
			$personalInfo->setFirstName($_POST['fname']);
			$personalInfo->setLastName($_POST['lname']);
			$personalInfo->setGender($_POST['gender']);
			$personalInfo->setDoB($_POST['dob']);
			$personalInfo->setMaritalStatus($_POST['marital']);
			$personalInfo->setOwnerType($_SESSION['userType']);
			if($_SESSION['userType'] == User::$ADMIN){
				$personalInfo->setOwnerId($_SESSION['resumeid']);
				$personalInfo->setOwnerType(PersonalInfo::$RESUME_OWNER);
			}
			else{
				$personalInfo->setOwnerId($_SESSION['userid']);
			}
			$personalInfoDAO = new PersonalInfoDAO();
			if($personalInfoDAO->exists($personalInfo->getOwnerId())){
				$personalInfo = $personalInfoDAO->updatePersonalInfo($personalInfo);
			}
			else{
				$personalInfo = $personalInfoDAO->insertPersonalInfo($personalInfo);
			}
			if($personalInfo !== null){
				echo "<META HTTP-EQUIV='Refresh' Content='0; URL=index.php?subSelected=postResume'>";
			}
			else{
				echo 'ERROR while saving personalInfo';
			}
		}
		else{
			echo 'ERROR while saving resume';
		}
	}

	if($_POST['subSelected'] == "postResumeEdu"){
		if(array_key_exists("resumeid", $_SESSION)){
			$education = new ResumeEducation();
			if(!empty($_SESSION['educationid'])){
				$education->setId($_SESSION['educationid']);
			}
			$education->setResumeId($_SESSION['resumeid']);
			$education->setTitle ( $_POST['title']);
			$education->setTitleType ( $_POST['type']);
			$education->setSubject($_POST['subject']);
			$education->setStandard($_POST['standard']);
			$education->setYear( $_POST['year']);
			$education->setInstitute ( $_POST['institute']);
			$education->setDuration ( $_POST['durYears']."-".$_POST['durMonths']);
			$education->setPercentage ( $_POST['percentage']);
			$educationDAO = new ResumeEducationDAO();
			if($educationDAO->exists($education->getId())){
				$education = $educationDAO->updateResumeEducation($education);
			}
			else{
				$education = $educationDAO->insertResumeEducation($education);
			}
			if($education !== null){
				echo "<META HTTP-EQUIV='Refresh' Content='0; URL=index.php?subSelected=postResumeEdu'>";
			}
			else{
				echo 'ERROR while saving education';
			}
		}
	}

	if($_POST['subSelected'] == "postResumeExp"){
		if(array_key_exists("resumeid", $_SESSION)){
			$experience = new ResumeExperience();
			if(!empty($_SESSION['experienceid'])){
				$experience->setId($_SESSION['experienceid']);
			}
			$experience->setResumeId($_SESSION['resumeid']);
			$experience->setCompany($_POST['company']);
			$experience->setIndustry($_POST['industry']);
			$experience->setDesignation($_POST['designation']);
			$experience->setJoining($_POST['joining']);
			$experience->setLeaving($_POST['leaving']);
			$experience->setAchievement($_POST['achievement']);
			$experience->setLocation($_POST['location']);
			$experience->setSeniority($_POST['seniority']);
			$experience->setResponsibility($_POST['responsibility']);
			$experience->setFuncArea($_POST['functionalarea']);
			$experience->setCTC($_POST['ctc']);
			$experience->setJobType($_POST['type']);
			$experience->setJobTerm($_POST['term']);
			if(array_key_exists("current", $_POST) && $_POST['current'] == 'on'){
				$experience->setCurrent('y');
			}
			$experienceDAO = new ResumeExperienceDAO();
			if($experienceDAO->exists($experience->getId())){
				$experience = $experienceDAO->updateResumeExperience($experience);
			}
			else{
				$experience = $experienceDAO->insertResumeExperience($experience);
			}
			if($experience !== null){
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?subSelected=postResumeExp">';
			}
			else{
				echo 'ERROR while saving experience';
			}
		}
	}

	if($_POST['subSelected'] == "postResumeSkill"){
		if(array_key_exists("resumeid", $_SESSION)){
			$skill = new ResumeSkill();
			if(!empty($_SESSION['skillid'])){
				$skill->setId($_SESSION['skillid']);
			}
			$skill->setResumeId($_SESSION['resumeid']);
			$skill->setName($_POST['skillName']);
			$skill->setExpertLevel($_POST['expertLevel']);
			$skill->setDuration ( $_POST['skillYears']."-".$_POST['skillMonths']);
			$skillDAO = new ResumeSkillDAO();
			if($skillDAO->exists($skill->getId())){
				$skill = $skillDAO->updateResumeSkill($skill);
			}
			else{
				$skill = $skillDAO->insertResumeSkill($skill);
			}
			if($skill !== null){
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?subSelected=postResumeSkill">';
			}
			else{
				echo 'ERROR while saving skills';
			}
		}
	}
}
exit;    


?>
