<?php 
session_start();
require_once("lib.php");
$userid = null;
$password = null;
$user = null;
if(array_key_exists("logout", $_POST)){
	$_SESSION['userid'] = null;
	$_SESSION['userName'] = null;
	$_SESSION['userType'] = null;
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?selected=home">';
    exit;    
}
else{
	if(array_key_exists("userid", $_POST) && array_key_exists("password", $_POST)){
		$userid = $_POST['userid'];
		$password = $_POST['password'];
		$userDAO = new UserDAO(); 
		$user = $userDAO->login($userid, $password);
	}
	if (empty($user) || $user == null){    
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';    
		exit;    
	}    
	else{    
		$_SESSION['userid'] = $user->getId();
		$_SESSION['userName'] = $user->getPersonalInfo()->getFirstName()." ".$user->getPersonalInfo()->getLastName();
		$_SESSION['userType'] = $user->getUserType();
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
		exit;    
	} 
}

?>
