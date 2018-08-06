<?php 
class ConnectionManager {
	
	private $con = null;

	public function __construct(){
		$this->con = odbc_connect ( "RecruiteDSN", "", "");
	}
	public function __destruct() {
//		$this->closeConnection();
//		$this->con = null;
	}
	public function getConnection(){
		return $this->con;
	}
	public function execute($sql){
		$result = odbc_exec ($this->con, $sql);
		return $result;
	}
	public function closeConnection() {
		if($this->con != null){
			odbc_close($this->con);
		}
	}
}


/*#################################################  RECRUITE UTIL #################################################*/

class RecruiteUtil {
	
	public static $UPLOAD_DIR = 'uploads/resume/';
	public static $UPLOAD_FILE_TYPE = '.doc';
	public static $DATE_SEP = '-';
	public static $VAL_SEP = ';';
	public static $NO_SELECT = '#';

	public function __construct(){
	}
	public function __destruct() {
	}
	public static function uploadFile($file, $resumeid){
		$uploadfile = RecruiteUtil::$UPLOAD_DIR . $resumeid . RecruiteUtil::$UPLOAD_FILE_TYPE;

		if (move_uploaded_file($_FILES[$file]['tmp_name'], $uploadfile)) {
		   return basename($_FILES[$file]['name']);
		}
		echo "Error in uploading file: ".$file;
		return null;
	}
	public function execute($sql){
		$result = odbc_exec ($this->con, $sql);
		return $result;
	}
	public function closeConnection() {
		if($this->con != null){
			odbc_close($this->con);
		}
	}
}
/*#################################################  COUNTRY  #################################################*/

class Country {
	private $id;
	private $name;
	
	public function __construct(){
		$this->id = "";
		$this->name = "";
	}

	public function setId($id){ $this->id = $id; }
	public function setName($name){	$this->name = $name; }

	public function getId(){ return $this->id; }
	public function getName(){ return $this->name; }

	public function __destruct() {
		$this->id = null;
		$this->name = null;
	}
}



/*#################################################  COUNTRY DAO #################################################*/

class CountryDAO {
	
	private $cm;

	public function __construct(){
		$this->cm = new ConnectionManager();
	}
	public function __destruct() {
	}
	private function getODBCCountry($odbcResult){
		$country = null;
		if(odbc_fetch_row($odbcResult)){
			$country = new Country();
			$country->setId(odbc_result($odbcResult, "id"));
			$country->setName(odbc_result($odbcResult, "name"));
		}
		return $country;
	}
	public function getAllCountries($sql){
		if($sql == null){
			$sql = "SELECT * FROM countries ORDER BY name";
		}
		$result = $this->cm->execute($sql);
		$countries = array();

		$country = null;
		$c=0;
		while(true)
		{
			$country = $this->getODBCCountry($result);
			if($country == null){
				break;
			}
			$countries[$c++] = $country;
		} 
		return $countries;
	}
	public function getCountry($id){
		$country = null;
		if($id !== NULL){
			$sql = "SELECT * FROM countries WHERE id = '$id'";
			$result = $this->cm->execute($sql);
			$country = $this->getODBCCountry($result);
		}
		return $country;
	}
}


/*#################################################  USER  #################################################*/

class User {
	private $id;
	private $password;
	private $secretQ;
	private $secretA;
	private $type;
	private $regDate;
	private $personalInfo;
	public static $RECRUITER = "r";
	public static $JOB_SEEKER = "j";
	public static $ADMIN = "a";
	
	public function __construct(){
		$this->id = "";
		$this->secretQ = "";
		$this->secretA = "";
		$this->password = "";
		$this->type = "";
		$this->regDate = "";
		$this->personalInfo = "";
	}

	public function setId($id){ $this->id = $id; }
	public function setPassword($pswd){	$this->password = $pswd; }
	public function setSecretQ($secretQ){	$this->secretQ = $secretQ; }
	public function setSecretA($secretA){	$this->secretA = $secretA; }
	public function setUserType($type){ $this->type = $type; }
	public function setRegDate($rDate){ $this->regDate = $rDate; }
	public function setPersonalInfo($info){	$this->personalInfo = $info; }

	public function getId(){ return $this->id; }
	public function getPassword(){ return $this->password; }
	public function getSecretQ(){ return $this->secretQ; }
	public function getSecretA(){ return $this->secretA; }
	public function getUserType(){ return $this->type; }
	public function getRegDate(){ return $this->regDate; }
	public function getPersonalInfo(){	return $this->personalInfo; }

	public function __destruct() {
		$this->id = null;
		$this->password = null;
		$this->secretQ = null;
		$this->secretA = null;
		$this->type = null;
		$this->regDate = null;
		$this->personalInfo = "";
	}
}



/*#################################################  USER DAO #################################################*/

class UserDAO {
	
	private $cm;

	public function __construct(){
		$this->cm = new ConnectionManager();
	}
	public function __destruct() {
	}
	private function getODBCUser($odbcResult){
		$user = null;
		if(odbc_fetch_row($odbcResult)){
			$user = new User();
			$user->setId(odbc_result($odbcResult, "id"));
			$user->setSecretQ(odbc_result($odbcResult, "secretq"));
			$user->setSecretA(odbc_result($odbcResult, "secreta"));
			$user->setPassword(odbc_result($odbcResult, "password"));
			$user->setUserType(odbc_result($odbcResult, "type"));
			$user->setRegDate(odbc_result($odbcResult, "regdate"));
			$personalInfoDAO = new PersonalInfoDAO();
			$personalInfo = $personalInfoDAO->getPersonalInfo($user->getId());
			$user->setPersonalInfo($personalInfo);
		}
		return $user;
	}
	public function login($userid, $password){
		$user = null;
		if($userid !== NULL){
			$sql = "SELECT * FROM users WHERE id = '$userid' AND password = '$password'";
			$result = $this->cm->execute($sql);
			$user = $this->getODBCUser($result);
		}
		return $user;
	}
	public function getAllUsers($sql){
		if($sql == null){
			$sql = "SELECT * FROM users";
		}
		$result = $this->cm->execute($sql);
		$users = array();

		$user = null;
		$c=0;
		while(true)
		{
			$user = $this->getODBCUser($result);
			if($user == null){
				break;
			}
			$users[$c++] = $user;
		} 
		return $users;
	}
	public function getUsersByType($type){
		$sql = "SELECT * FROM users WHERE type = '$type'";
		return $this->getAllUsers($sql);
	}
	public function getUser($id){
		$user = null;
		if($id !== NULL){
			$sql = "SELECT * FROM users WHERE id = '$id'";
			$result = $this->cm->execute($sql);
			$user = $this->getODBCUser($result);
		}
		return $user;
	}
	public function updateUser($user){
		$sql = "UPDATE users SET secretq='".$user->getSecretQ()."', secreta='".$user->getSecretA()."', password='"
		.$user->getPassword()."',  type='".$user->getUserType()."', fname ='".$user->getFirstName()."', lname='"
		.$user->getLastName()."', dob='".$user->getDoB()."',  gender='".$user->getGender()."', lastmoddate='"
		.date("m-d-Y H:i")."', companyname='".$user->getCompanyName()."', industry='".$user->getIndustry()
		."' WHERE id='".$user->getId()."'";
		$result = $this->cm->execute($sql);
		if ($result){
			return $user;
        }
		else {
			echo "Updation failed " .odbc_error();
			return null;
        }    
	}
	public function deleteUser($id){
		$sql = "DELETE FROM users WHERE id='$id'";
		$result = $this->cm->execute($sql);
		if ($result){
			return true;
        }
		else {
			echo "Could not delete." .odbc_error();
			return false;
        }    	
	}
}


/*#################################################  PERSONAL INFO #################################################*/

class PersonalInfo {
	private $ownerId;		// can be resumeid or userid
	private $fname;
	private $lname;
	private $gender;
	private $marital;
	private $dob;
	private $lastModDate;
	private $ownerType;

	public static $MALE = 'm';
	public static $FEMALE = 'f';

	public static $UNMARRIED = 'u';
	public static $MARRIED = 'm';
	public static $DIVORCED = 'd';
	public static $WIDOWED = 'w';
	public static $OTHER = 'o';

	public static $RESUME_OWNER = 'r';			// contact belongs to a specific resume
	public static $USER_OWNER = 'u';				// contact belongs to a user

	public function __construct(){
		$this->ownerId = "";
		$this->fname = "";
		$this->lname = "";
		$this->gender = "";
		$this->marital = "";
		$this->dob = "";
		$this->lastModDate = "";
		$this->ownerType = PersonalInfo::$USER_OWNER;
	}

	public function setOwnerId($ownerId){ $this->ownerId = $ownerId; }
	public function setFirstName($fname){	$this->fname = $fname; }
	public function setLastName($lname){	$this->lname = $lname; }
	public function setDoB($dob){	$this->dob = $dob; }
	public function setGender($gender){ $this->gender = $gender; }
	public function setMaritalStatus($marital){ $this->marital = $marital; }
	public function setLastModDate($date){ $this->lastModDate = $date; }
	public function setOwnerType($ownerType){ $this->ownerType = $ownerType; }

	public function getOwnerId(){ return $this->ownerId; }
	public function getFirstName(){	return $this->fname; }
	public function getLastName(){	return $this->lname; }
	public function getDoB(){	return $this->dob; }
	public function getGender(){ return $this->gender; }
	public function getMaritalStatus(){ return $this->marital; }
	public function getLastModDate(){ return $this->lastModDate; }
	public function getOwnerType(){ return $this->ownerType; }


	public function __destruct() {
		$this->ownerId = null;
		$this->fname = null;
		$this->lname = null;
		$this->gender = null;
		$this->marital = null;
		$this->dob = null;
		$this->lastModDate = null;
		$this->ownerType = null;
	}
}



/*#################################################  PERSONAL INFO DAO  #################################################*/

class PersonalInfoDAO {
	
	private $cm;

	public function __construct(){
		$this->cm = new ConnectionManager();
	}
	public function __destruct() {
	}
	private function getODBCPersonalInfo($odbcResult){
		$personal = null;
		if(odbc_fetch_row($odbcResult)){
			$personal = new PersonalInfo();
			$personal->setOwnerId(odbc_result($odbcResult, "ownerid"));
			$personal->setFirstName(odbc_result($odbcResult, "fname"));
			$personal->setLastName(odbc_result($odbcResult, "lname"));
			$personal->setGender(odbc_result($odbcResult, "gender"));
			$personal->setDoB(odbc_result($odbcResult, "dob"));
			$personal->setMaritalStatus(odbc_result($odbcResult, "marital"));
			$personal->setOwnerType(odbc_result($odbcResult, "ownerType"));
		}
		return $personal;
	}
	public function getAllPersonalInfos(){
		$sql = "SELECT * FROM personal_info";
		$result = $this->cm->execute($sql);
		$personals = array();

		$personal = null;
		$c=0;
		while(true)
		{
			$personal = $this->getODBCPersonalInfo($result);
			if($personal == null){
				break;
			}
			$personals[$c++] = $personal;
		} 
		return $personals;
	}
	public function getPersonalInfo($ownerId){
		$personal = null;
		if($ownerId !== NULL){
			$sql = "SELECT * FROM personal_info WHERE ownerId = '$ownerId'";
			$result = $this->cm->execute($sql);
			$personal = $this->getODBCPersonalInfo($result);
		}
		return $personal;
	}
	public function exists($personalid){
		$sql = "SELECT ownerid AS personal_id FROM personal_info WHERE ownerid = '$personalid'";
		$result = $this->cm->execute($sql);
		if(odbc_fetch_row($result)){
			$id = odbc_result($result, "personal_id");
			if($id !== null){
				return true;
			}
		}
		return false;
	}
	public function updatePersonalInfo($pInfo){
		$sql = "UPDATE personal_info SET ownerType='".$pInfo->getOwnerType()."', fname='".$pInfo->getFirstName()
		."', lname='".$pInfo->getLastName()."',dob='".$pInfo->getDoB()."', gender='".$pInfo->getGender()
		."', marital='".$pInfo->getMaritalStatus()."', lastModDate='".date("m-d-Y H:i")."' WHERE ownerid='"
		.$pInfo->getOwnerId()."'";

		$result = $this->cm->execute($sql);
		if ($result){
			return $pInfo;
        }
		else {
			echo "Updation failed " .odbc_error();
			return null;
        }    
	}
	public function insertPersonalInfo($info){
		$sql = "INSERT INTO personal_info (ownerid, fname, lname, dob, gender, marital, ownerType) VALUES ('" .$info->getOwnerId()."', '"
		.$info->getFirstName()."', '".$info->getLastName()."', '".$info->getDoB()."', '".$info->getGender()."', '"
		.$info->getMaritalStatus()."', '".$info->getOwnerType()."')";

		$result = $this->cm->execute($sql);
		if ($result){
			return $info;
        }
		else {
			echo "Personal info insertion failed " .odbc_error();
			return null;
        }
	}

}




/*#################################################  CONTACT #################################################*/

class Contact {
	private $ownerId;			// can be userid or resumeid
	private $address;
	private $city;
	private $state;
	private $country;
	private $zip;
	private $workPhone;
	private $homePhone;
	private $mobile;
	private $fax;
	private $email;
	private $url;
	private $ownerType;

	public function __construct(){
		$this->ownerId = "";
		$this->address = "";
		$this->city = "";
		$this->state = "";
		$this->country = "";
		$this->workPhone = "";
		$this->homePhone = "";
		$this->mobile = "";
		$this->fax = "";
		$this->zip = "";
		$this->email = "";
		$this->url = "";
		$this->ownerType = "";

	}

	public function setOwnerId($ownerId){	$this->ownerId = $ownerId; }
	public function setAddress($address){	$this->address = $address; }
	public function setCity($city){	$this->city = $city;	}
	public function setState($state){	$this->state = $state;	}
	public function setZip($zip){	$this->zip = $zip;	}
	public function setCountry($country){ $this->country = $country; }
	public function setWorkPhone($wPhone){	$this->workPhone = $wPhone;	}
	public function setHomePhone($hPhone){	$this->homePhone = $hPhone;	}
	public function setMobile($mobile){	$this->mobile = $mobile;	}
	public function setFax($fax){	$this->fax = $fax;	}
	public function setEmail($email){	$this->email = $email;	}
	public function setUrl($url){	$this->url = $url;	}
	public function setOwnerType($ownerType){	$this->ownerType = $ownerType; }

	public function getOwnerId(){	return $this->ownerId; }
	public function getAddress(){ return $this->address; }
	public function getCity(){	return $this->city;	}
	public function getState(){	return $this->state;	}
	public function getZip(){	return $this->zip;	}
	public function getCountry(){ return $this->country; }
	public function getWorkPhone(){	return $this->workPhone;	}
	public function getHomePhone(){	return $this->homePhone;	}
	public function getMobile(){	return $this->mobile;	}
	public function getFax(){	return $this->fax;	}
	public function getEmail(){	return $this->email;	}
	public function getUrl(){	return $this->url;	}
	public function getOwnerType(){ return $this->ownerType; }

	public function __destruct() {
		$this->ownerId = null;
		$this->address = null;
		$this->city = null;
		$this->state = null;
		$this->country = null;
		$this->workPhone = null;
		$this->homePhone = null;
		$this->mobile = null;
		$this->fax = null;
		$this->zip = null;
		$this->email = null;
		$this->url = null;
		$this->ownerType = null;
	}
}


/*#################################################  CONTACT DAO  #################################################*/

class ContactDAO {
	
	private $cm;

	public function __construct(){
		$this->cm = new ConnectionManager();
	}
	public function __destruct() {
	}
	private function getODBCContact($odbcResult){
		$contact = null;
		if(odbc_fetch_row($odbcResult)){
			$contact = new Contact();
			$contact->setOwnerId(odbc_result($odbcResult, "ownerId"));
			$contact->setAddress(odbc_result($odbcResult, "address"));
			$contact->setCity(odbc_result($odbcResult, "city"));
			$contact->setState(odbc_result($odbcResult, "state"));
			$contact->setZip(odbc_result($odbcResult, "zip"));
			$contact->setCountry(odbc_result($odbcResult, "country"));
			$contact->setWorkPhone(odbc_result($odbcResult, "workphone"));
			$contact->setHomePhone(odbc_result($odbcResult, "homephone"));
			$contact->setMobile(odbc_result($odbcResult, "mobile"));
			$contact->setFax(odbc_result($odbcResult, "fax"));
			$contact->setEmail(odbc_result($odbcResult, "email"));
			$contact->setUrl(odbc_result($odbcResult, "url"));
			$contact->setOwnerType(odbc_result($odbcResult, "ownerType"));
		}
		return $contact;
	}
	public function getAllContacts(){
		$sql = "SELECT * FROM contacts";
		$result = $this->cm->execute($sql);
		$contacts = array();
		$contact = null;
		$c=0;
		while(true)
		{
			$contact = $this->getODBCContact($result);
			if($contact == null){
				break;
			}
			$contacts[$c++] = $contact;
		} 
		return $contacts;
	}
	public function getContact($ownerId){
		$contact = new Contact();
		if($ownerId !== null){
			$sql = "SELECT * FROM contacts WHERE ownerId='$ownerId'";
			$result = $this->cm->execute($sql);
			$contact = $this->getODBCContact($result);
		}
		return $contact;
	}
	public function insertContact($contact){
		$sql = "INSERT INTO contacts (ownerId, address, city, state, zip, country, workphone, homephone, mobile, fax, email, url,"
		." ownerType) VALUES ('".$contact->getOwnerId()."', '".$contact->getAddress()."', '".$contact->getCity()."', '"
		.$contact->getState()."', '".$contact->getZip()."', '".$contact->getCountry()."', '".$contact->getWorkPhone()."', '"
		.$contact->getHomePhone()."', '".$contact->getMobile()."', '".$contact->getFax()."', '".$contact->getEmail()."', '"
		.$contact->getUrl()."', '".$contact->getOwnerType()."')";
		$result = $this->cm->execute($sql);
		if ($result){
			return true;
        }
		else {
			echo "Contact insertion failed " .odbc_error();
			return false;
        }
	}
	public function updateContact($contact){
		$sql = "UPDATE contacts SET address='".$contact->getAddress()."', city='".$contact->getCity()."', state='".$contact->getState()."',  zip='".$contact->getZip()."', country='".$contact->getCountry()."', workphone='"
		.$contact->getWorkPhone()."', homephone='".$contact->getHomePhone()."', mobile='".$contact->getMobile()."', fax='"
		.$contact->getFax()."', email='".$contact->getEmail()."', url='".$contact->getUrl()."' WHERE ownerId='"
		.$contact->getOwnerId()."'";
		$result = $this->cm->execute($sql);
		if ($result){
			return $contact;
        }
		else {
			echo "Updation failed " .odbc_error();
			return null;
        }    
	}
	public function deleteContact($ownerId){
		$sql = "DELETE FROM contacts WHERE ownerId='$ownerId'";
		$result = $this->cm->execute($sql);
		if ($result){
			return true;
        }
		else {
			echo "Could not delete." .odbc_error();
			return false;
        }    	
	}
}



/*#################################################  COMPANY  #################################################*/

class Company {
	private $id;
	private $userId;
	private $name;
	private $desc;
	private $industry;
	private $logo;
	private $url;
	private $strength;
	private $turnover;
	private $basedIn;
	private $branches;
	private $type;
	private $standard;
	private $isAdvertiser;

	public function __construct(){
		$this->id = "";
		$this->userId = "";
		$this->name = "";
		$this->desc = "";
		$this->industry = "";
		$this->logo = "";
		$this->url = "";
		$this->strength = "";
		$this->turnover = "";
		$this->basedIn = "";
		$this->branches = "";
		$this->type = "";
		$this->standard = "";
		$this->isAdvertiser = "n";
	}

	public function setId($id){ $this->id = $id; }
	public function setUserId($userId){ $this->userId = $userId; }
	public function setName($name){	$this->name = $name; }
	public function setDesc($desc){	$this->desc = $desc;	}
	public function setIndustry($industry){ $this->industry = $industry; }
	public function setLogo($logo){ $this->logo = $logo; }
	public function setUrl($url){ $this->url = $url; }
	public function setStrength($strength){ $this->strength = $strength; }
	public function setTurnover($turnover){ $this->turnover = $turnover; }
	public function setBasedIn($basedIn){ $this->basedIn = $basedIn; }
	public function setBranches($branches){ $this->branches = $branches; }
	public function setCompanyType($type){ $this->type = $type; }
	public function setStandard($standard){ $this->standard = $standard; }
	public function setAdvertiser($adv){ $this->isAdvertiser = $adv; }

	public function getId(){ return $this->id; }
	public function getUserId(){ return $this->userId; }
	public function getName(){ return $this->name; }
	public function getDesc(){ return $this->desc; }
	public function getIndustry(){ return $this->industry; }
	public function getLogo(){ return $this->logo; }
	public function getUrl(){ return $this->url; }
	public function getStrength(){ return $this->strength; }
	public function getTurnover(){ return $this->turnover; }
	public function getBasedIn(){ return $this->basedIn; }
	public function getBranches(){ return $this->branches; }
	public function getCompanyType(){ return $this->type; }
	public function getStandard(){ return $this->standard; }
	public function getAdvertiser(){ return $this->isAdvertiser; }

	public function __destruct() {
		$this->id = null;
		$this->userId = null;
		$this->name = null;
		$this->desc = null;
		$this->industry = null;
		$this->logo = null;
		$this->url = null;
		$this->strength = null;
		$this->turnover = null;
		$this->basedIn = null;
		$this->branches = null;
		$this->type = null;
		$this->standard = null;
		$this->isAdvertiser = null;
	}
}


/*#################################################  COMPANY DAO #################################################*/

class CompanyDAO {
	
	private $cm;

	public function __construct(){
		$this->cm = new ConnectionManager();
	}
	public function __destruct() {
	}
	private function getODBCCompany($odbcResult){
		$company = null;
		if(odbc_fetch_row($odbcResult)){
			$company = new Company();
			$company->setId(odbc_result($odbcResult, "id"));
			$company->setUserId(odbc_result($odbcResult, "userid"));
			$company->setName(odbc_result($odbcResult, "name"));
			$company->setDesc(odbc_result($odbcResult, "desc"));
			$company->setIndustry(odbc_result($odbcResult, "industry"));
			$company->setLogo(odbc_result($odbcResult, "logo"));
			$company->setUrl(odbc_result($odbcResult, "url"));
			$company->setStrength(odbc_result($odbcResult, "strength"));
			$company->setTurnover(odbc_result($odbcResult, "turnover"));
			$company->setBasedIn(odbc_result($odbcResult, "basedIn"));
			$company->setBranches(odbc_result($odbcResult, "branches"));
			$company->setCompanyType(odbc_result($odbcResult, "type"));
			$company->setStandard(odbc_result($odbcResult, "standard"));
			$company->setAdvertiser(odbc_result($odbcResult, "advertiser"));
		}
		return $company;
	}
	public function getCompanies($isAdvertiser){
		if($isAdvertiser){
			$sql = "SELECT * FROM companies WHERE advertiser = 'y'";
		}
		else{
			$sql = "SELECT * FROM companies WHERE advertiser = 'n'";
		}
		$result = $this->cm->execute($sql);
		$companies = array();
		$company = null;
		$c=0;
		while(true)
		{
			$company = $this->getODBCCompany($result);
			if($company == null){
				break;
			}
			$companies[$c++] = $company;
		} 
		return $companies;
	}
	public function getAllCompanies(){
		$sql = "SELECT * FROM companies";
		$result = $this->cm->execute($sql);
		$companies = array();
		$company = null;
		$c=0;
		while(true)
		{
			$company = $this->getODBCCompany($result);
			if($company == null){
				break;
			}
			$companies[$c++] = $company;
		} 
		return $companies;
	}
	public function getCompany($id){
		$company = new Company();
		if($id !== NULL){
			$sql = "SELECT * FROM companies WHERE id = '$id'";
			$result = $this->cm->execute($sql);
			$company = $this->getODBCCompany($result);
		}
		return $company;
	}
	public function getCompanyByUser($userid){
		$company = new Company();
		if($userid !== NULL){
			$sql = "SELECT * FROM companies WHERE userid = '$userid'";
			$result = $this->cm->execute($sql);
			$company = $this->getODBCCompany($result);
		}
		return $company;
	}
	public function insertCompany($company){
		$sql = "INSERT INTO companies (id, userid, name, desc, industry) VALUES ('".$company->getId()."' , '".$company->getId()
		."', '".$company->getUserId()."', '".$company->getDesc()."', '".$company->getIndustry()."')";
		$result = $this->cm->execute($sql);
		if ($result){
			return true;
        }
		else {
			echo "Company insertion failed " .odbc_error();
			return false;
        }
	}
	public function updateCompany($company){
		$sql = "UPDATE companies SET name='".$company->getName()."', desc='".$company->getDesc()."', industry='".$company->getIndustry()."', WHERE id='".$company->getId()."'";
		$result = $this->cm->execute($sql);
		if ($result){
			return $company;
        }
		else {
			echo "Updation failed " .odbc_error();
			return null;
        }    
	}
	public function deleteCompany($id){
		$sql = "DELETE FROM companies WHERE id='$id'";
		$result = $this->cm->execute($sql);
		if ($result){
			return true;
        }
		else {
			echo "Could not delete." .odbc_error();
			return false;
        }    	
	}
}



/*#################################################  JOB  #################################################*/

class Job {
	
	public static $PERMANANT = 'p';
	public static $CONTRACT = 'c';
	
	public static $FULL_TIME = 'f';
	public static $PART_TIME = 'p';

	private $id;
	private $desc;
	private $refid;
	private $recruiter;
	private $company;
	private $designation;
	private $funcArea;
	private $maxExp;
	private $minExp;
	private $postDate;
	private $location;
	private $keyword;
	private $qualification;
	private $criteria;
	private $renumeration;
	private $type;
	private $term;
	private $employerName;
	private $employerIndustry;

	public function __construct(){
		$this->id = "";
		$this->desc = "";
		$this->refid = "";
		$this->recruiter = "";
		$this->designation = "";
		$this->funcArea = "";
		$this->maxExp = "";
		$this->minExp = "";
		$this->postDate = "";
		$this->location = "";
		$this->keyword = "";
		$this->qualification = "";
		$this->criteria = "";
		$this->renumeration = "";
		$this->type = "";
		$this->term = "";
		$this->employer = "";
	}

	public function setId($id){ $this->id = $id; }
	public function setDesc($desc){ $this->desc = $desc; }
	public function setRefId($refid){ $this->refid = $refid; }
	public function setRecruiter($recruiter){	$this->recruiter = $recruiter; }
	public function setDesignation($designation){	$this->designation = $designation;	}
	public function setFuncArea($funcArea){	$this->funcArea = $funcArea;	}
	public function setLocation($location){ $this->location = $location; }
	public function setKeyword($keyword){	$this->keyword = $keyword;	}
	public function setMinExp($minExp){	$this->minExp = $minExp;	}
	public function setMaxExp($maxExp){	$this->maxExp = $maxExp;	}
	public function setQualification($qualification){	$this->qualification = $qualification;	}
	public function setCriteria($criteria){	$this->criteria = $criteria;	}
	public function setPostDate($postDate){	$this->postDate = $postDate;	}
	public function setRenumeration($ren){ $this->renumeration = $ren;	}
	public function setJobType($type){ $this->type = $type;	}
	public function setJobTerm($term){ $this->term = $term; }
	public function setEmployer($emp){ $this->employer = $emp; }

	public function getId(){ return $this->id; }
	public function getDesc(){ return $this->desc; }
	public function getRefId(){ return $this->refid; }
	public function getRecruiter(){	return $this->recruiter; }
	public function getDesignation(){	return $this->designation;	}
	public function getFuncArea(){	return $this->funcArea;	}
	public function getLocation(){ return $this->location; }
	public function getKeyword(){	return $this->keyword;	}
	public function getMinExp(){	return $this->minExp;	}
	public function getMaxExp(){	return $this->maxExp;	}
	public function getQualification(){	return $this->qualification;	}
	public function getCriteria(){	return $this->criteria;	}
	public function getPostDate(){	return $this->postDate;	}
	public function getRenumeration(){	return $this->renumeration;	}
	public function getJobType(){	return $this->type;	}
	public function getJobTerm(){	return $this->term;	}
	public function getEmployer(){ return $this->employer; }


	public function __destruct() {
		$this->id = null;
		$this->desc = null;
		$this->refid = null;
		$this->recruiter = null;
		$this->designation = null;
		$this->funcArea = null;
		$this->maxExp = null;
		$this->minExp = null;
		$this->postDate = null;
		$this->location = null;
		$this->keyword = null;
		$this->qualification = null;
		$this->criteria = null;
		$this->renumeration = null;
		$this->type = null;
		$this->term = null;
		$this->employer = null;
	}
}


/*#################################################  JOB DAO  #################################################*/

class JobDAO {
	
	private $cm;

	public function __construct(){
		$this->cm = new ConnectionManager();
	}
	public function __destruct() {
	}

	private function getODBCJob($odbcResult){
		$job = null;
		if(odbc_fetch_row($odbcResult)){
			$job = new Job();
			$job->setId(odbc_result($odbcResult, "id"));
			$job->setDesc(odbc_result($odbcResult, "desc"));
			$job->setRefId(odbc_result($odbcResult, "refid"));
			$job->setDesignation(odbc_result($odbcResult, "designation"));
			$job->setMaxExp(odbc_result($odbcResult, "maxexp"));
			$job->setMinExp(odbc_result($odbcResult, "minexp"));
			$job->setPostDate(odbc_result($odbcResult, "postdate"));
			$job->setLocation(odbc_result($odbcResult, "location"));
			$job->setCriteria(odbc_result($odbcResult, "criteria"));
			$job->setQualification(odbc_result($odbcResult, "qualification"));
			$job->setFuncArea(odbc_result($odbcResult, "functionalarea"));
			$job->setKeyword(odbc_result($odbcResult, "keyword"));
			$job->setRenumeration(odbc_result($odbcResult, "renumeration"));
			$job->setJobType(odbc_result($odbcResult, "type"));
			$job->setJobTerm(odbc_result($odbcResult, "term"));

			$recruiterid = odbc_result($odbcResult, "recruiterid");
			$userDAO = new UserDAO();
			$recruiter = $userDAO->getUser($recruiterid);
			$job->setRecruiter($recruiter);
			
			$employerid = odbc_result($odbcResult, "employerid");
			$companyDAO = new CompanyDAO();
			$employer = $companyDAO->getCompany($employerid);
			$job->setEmployer($employer);
		}
		return $job;
	}

	public function getAllJobs(){
		$sql = "SELECT * FROM jobs ORDER BY postdate DESC";
		$result = $this->cm->execute($sql);
		$jobs = array();
		$job = null;
		$c=0;
		while(true)
		{
			$job = $this->getODBCJob($result);
			if($job == null){
				break;
			}
			$jobs[$c++] = $job;
		} 
		return $jobs;
	}
	public function getJob($id){
		$job = new Job();
		if($id !== NULL){
			$sql = "SELECT * FROM jobs WHERE id = '$id'";
			$result = $this->cm->execute($sql);
			$job = $this->getODBCJob($result);
		}
		return $job;
	}
	public function insertJob($job){
		$sql = "INSERT INTO jobs (id, desc, refid, recruiterid, employerid, designation, location, fuctionalarea, maxexp, minexp,". " criteria, qualification, postdate, renumeration, type, term) VALUES ('".$job->getId()."' , '".$job->getDesc()."', '"
		.$job->getRefId()."', '".$job->getRecruiter()->getId()."', '".$job->getEmployer()->getId()."', '"
		.$job->getDesignation()."', '".$job->getLocation()."', '".$job->getFuncArea()."', '".$job->getMaxExp()."', '"
		.$job->getMinExp()."', '".$job->getCriteria()."', '".$job->getQualification()."', '".date("m-d-Y H:i")."', '"
		.$job->getRenumeration()."', '".$job->getJobType()."', '".$job->getTerm()."')";
		$result = $this->cm->execute($sql);
		if ($result){
			return true;
        }
		else {
			echo "Job insertion failed " .odbc_error();
			return false;
        }
	}
	public function updateJob($job){
		$sql = "UPDATE jobs SET desc='".$job->getDesc()."', refid='".$job->getRefId()."', recruiterid='"
		.$job->getRecruiter()->getId()."', employerid='".$job->getEmployer()->getId()."', designation='"
		.$job->getDesignation()."', location='".$job->getLocation()."', fuctionalarea='".$job->getFuncArea()."', maxexp='"
		.$job->getMaxExp()."', minexp='".$job->getMinExp()."', criteria='".$job->getCriteria()."', qualification='"
		.$job->getQualification()."', lastmoddate='".date("m-d-Y H:i")."', renumeration='".$job->getRenumeration()."', type='"
		.$job->getJobType()."', term='".$job->getTerm()."' WHERE id='".$job->getId()."'";
		$result = $this->cm->execute($sql);
		if ($result){
			return $job;
        }
		else {
			echo "Updation failed " .odbc_error();
			return null;
        }    
	}
	public function deleteJob($id){
		$sql = "DELETE FROM jobs WHERE id='$id'";
		$result = $this->cm->execute($sql);
		if ($result){
			return true;
        }
		else {
			echo "Could not delete." .odbc_error();
			return false;
        }    	
	}

	public function getDistinctJobLocations(){
		$sql = "SELECT DISTINCT location FROM jobs";
		$result = $this->cm->execute($sql);
		$locations = array();
		$loc = null;
		$c=0;
		while(odbc_fetch_row($result))
		{
			$loc = odbc_result($result, "location");
			$locations[$c++] = $loc;
		} 
		return $locations;
	}

	public function getDistinctJobIndustries(){
		$sql = "SELECT DISTINCT industry FROM companies WHERE companies.id IN (SELECT DISTINCT employerid FROM jobs)";
		$result = $this->cm->execute($sql);
		$industries = array();
		$ind = null;
		$c=0;
		while(odbc_fetch_row($result))
		{
			$ind = odbc_result($result, "industry");
			$industries[$c++] = $ind;
		} 
		return $industries;
	}

	public function getDistinctDesignations(){
		$sql = "SELECT DISTINCT designation FROM jobs";
		$result = $this->cm->execute($sql);
		$designations = array();
		$desig = null;
		$c=0;
		while(odbc_fetch_row($result))
		{
			$desig = odbc_result($result, "designation");
			$designation[$c++] = $desig;
		} 
		return $designation;
	}

	public function getJobsByLocation($loc){
		$sql = "SELECT * FROM jobs WHERE location = '$loc'";
		$result = $this->cm->execute($sql);
		$jobs = array();
		$job = null;
		$c=0;
		while(true)
		{
			$job = $this->getODBCJob($result);
			if($job == null){
				break;
			}
			$jobs[$c++] = $job;
		} 
		return $jobs;
	}

	public function getJobsByIndustry($ind){
		$sql = "SELECT * FROM jobs WHERE employerid IN (SELECT id FROM companies WHERE industry = '$ind')";
		$result = $this->cm->execute($sql);
		$jobs = array();
		$job = null;
		$c=0;
		while(true)
		{
			$job = $this->getODBCJob($result);
			if($job == null){
				break;
			}
			$jobs[$c++] = $job;
		} 
		return $jobs;
	}

	public function getJobsByDesignation($desig){
		$sql = "SELECT * FROM jobs WHERE designation = '$desig'";
		$result = $this->cm->execute($sql);
		$jobs = array();
		$job = null;
		$c=0;
		while(true)
		{
			$job = $this->getODBCJob($result);
			if($job == null){
				break;
			}
			$jobs[$c++] = $job;
		} 
		return $jobs;
	}

	public function searchJobs($keyword, $options, $experience, $location, $funcArea, $sortBy){
		$sql = "SELECT * FROM jobs ";
		$whereClause = null;

		$intExp = intval($experience);

		if($intExp > 0){
			$whereClause = "(minexp <= $intExp AND maxexp >= $intExp) ";
		}
		if(!empty($location)){
			if(!empty($whereClause)){
				$whereClause = $whereClause." AND ";
			}
			$whereClause = $whereClause." location = '$location' ";
		}
		if(!empty($funcArea)){
			if(!empty($whereClause)){
				$whereClause = $whereClause." AND ";
			}
			$whereClause = $whereClause." functionalarea = '$funcArea' ";
		}
		if(!empty($keyword)){
			$logic = "";
			if($options == "all"){
				$logic = " AND ";
			}
			else{
				$logic = " OR ";
			}
			if(strpos($keyword, " ") !== false || strpos($keyword, ",") !== false || strpos($keyword, ";") !== false){
				$tokens = strtok($keyword, " ,;");
				while ($tokens !== false) {
					if(!empty($tokens)){
						if(!empty($whereClause)){
							$whereClause = $whereClause.$logic." keyword like '%$tokens%' ";
						}
						else{
							$whereClause = $whereClause." keyword like '%$tokens%' ";
						}
					}
					$tokens = strtok(" ,;");
				}
			}
			else{
				if(!empty($whereClause)){
					$whereClause = $whereClause.$logic." keyword like '%$keyword%' ";
				}
				else{
					$whereClause = $whereClause." keyword like '%$keyword%' ";
				}
			}
		}

		if($sortBy == "Relevance" && !empty($keyword)){
			$sortBy = " ORDER BY keyword";
		}
		else{
			$sortBy = " ORDER BY postdate DESC";
		}
		$jobs = array();
		if(empty($whereClause)){
//			$jobs = $this->getAllJobs();
//			return $jobs;
		}
		else{
			$whereClause = " WHERE ".$whereClause;
			$sql = $sql . $whereClause. $sortBy;
		}

		$result = $this->cm->execute($sql);
		$job = null;
		$c=0;
		while(true)
		{
			$job = $this->getODBCJob($result);
			if($job == null){
				break;
			}
			$jobs[$c++] = $job;
		} 
		return $jobs;
	}

}


/*#################################################  RESUME  #################################################*/

class Resume {

	private $id;
	private $userId;
	private $objective;
	private $totalExperience;
	private $specializations;
	private $keySkills;
	private $remarks;
	private $title;
	private $textual;
	private $fileName;
	private $postDate;
	private $lastModDate;
	private $prefLocations;
	private $expectedCTC;
	private $expectedCTCCurrency;
	private $expectedJobType;
	private $expectedJobTerm;
	private $personalInfo;
	private $skills;
	private $educations;
	private $experiences;
	private $languages;
	private $responses;
	private $viewCount;
	private $visibility;

	public static $VISIBLE = "v";
	public static $HIDDEN  = "h";
		
	public function __construct(){
		$this->id = "";
		$this->userId = "";
		$this->objective = "";
		$this->totalExperience = "";
		$this->specializations = "";
		$this->keySkills = "";
		$this->remarks = "";
		$this->title = "";
		$this->textual = "";
		$this->fileName = "";
		$this->postDate = "";
		$this->lastModDate = "";
		$this->personalInfo = "";
		$this->skills = array();
		$this->educations = array();
		$this->experiences = array();
		$this->languages = array();
		$this->prefLocations = array();
		$this->expectedCTC = "";
		$this->expectedCTCCurrency = "";
		$this->expectedJobType = "";
		$this->expectedJobTerm = "";
		$this->responses = 0;
		$this->viewCount = 0;
		$this->visibility = Resume::$VISIBLE;
	}

	public function setId($id){ $this->id = $id; }
	public function setUserId($userId){ $this->userId = $userId; }
	public function setObjective($objective){	$this->objective = $objective; }
	public function setTotalExperience($totExp){	$this->totalExperience = $totExp; }
	public function setSpecializations($spec){	$this->specializations = $spec;	}
	public function setKeySkills($keySkills){	$this->keySkills = $keySkills;	}
	public function setRemarks($rem){	$this->remarks = $rem;	}
	public function setTitle($title){	$this->title = $title;	}
	public function setTextual($text){	$this->Textual = $text;	}
	public function setFileName($fileName){	$this->fileName = $fileName;	}
	public function setPostDate($postDate){	$this->postDate = $postDate;	}
	public function setLastModDate($lastModDate){	$this->lastModDate = $lastModDate;	}
	public function setPersonalInfo($personal){	$this->personalInfo = $personal;	}
	public function setSkills($skills){	$this->skills = $skills;	}
	public function setEducations($edu){ $this->educations = $edu;	}
	public function setExperiences($exp){ $this->experiences = $exp;	}
	public function setLanguages($lang){ $this->languages = $lang; }
	public function setPrefLocations($prefLocations){ $this->prefLocations = $prefLocations; }
	public function setExpectedCTC($expectedCTC){ $this->expectedCTC = $expectedCTC; }
	public function setExpectedCTCCurrency($expectedCTCCurrency){ $this->expectedCTCCurrency = $expectedCTCCurrency; }
	public function setExpectedJobType($expectedJobType){ $this->expectedJobType = $expectedJobType; }
	public function setExpectedJobTerm($expectedJobTerm){ $this->expectedJobTerm = $expectedJobTerm; }
	public function setResponses($responses){ $this->responses = $responses;}
	public function setViewCount($viewCount){ $this->viewCount = $viewCount;}
	public function setVisibility($visibility){ $this->visibility = $visibility;}

	public function getId(){ return $this->id; }
	public function getUserId(){ return $this->userId; }
	public function getObjective(){	return $this->objective; }
	public function getTotalExperience(){	return $this->totalExperience; }
	public function getSpecializations(){	return $this->specializations;	}
	public function getKeySkills(){	return $this->keySkills;	}
	public function getRemarks(){	return $this->remarks;	}
	public function getTitle(){	return $this->title;	}
	public function getTextual(){	return $this->textual;	}
	public function getFileName(){	return $this->fileName;	}
	public function getPostDate(){	return $this->postDate;	}
	public function getLastModDate(){ return $this->lastModDate;	}
	public function getPersonalInfo(){	return $this->personalInfo;	}
	public function getSkills(){	return $this->skills;	}
	public function getEducations(){ return $this->educations;	}
	public function getExperiences(){ return $this->experiences;	}
	public function getLanguages(){ return $this->languages; }
	public function getPrefLocations(){ return $this->prefLocations; }
	public function getPrefLocationsArray(){ 
		$arr = array();
		if(is_string($this->prefLocations)){
			$tok = strtok($this->prefLocations, ";");
			$i = 0;
			while ($tok !== false) {
			   $arr[$i++] = $tok;
			   $tok = strtok(";");
			}
		}
		return $arr;
	}
	public function getExpectedCTC(){ return $this->expectedCTC; }
	public function getExpectedCTCCurrency(){ return $this->expectedCTCCurrency; }
	public function getExpectedJobType(){ return $this->expectedJobType;}
	public function getExpectedJobTerm(){ return $this->expectedJobTerm; }
	public function getResponses(){ return $this->responses;}
	public function getViewCount(){ return $this->viewCount;}
	public function getVisibility(){ return $this->visibility;}


	public function __destruct() {
		$this->id = null;
		$this->userId = null;
		$this->objective = null;
		$this->totalExperience = null;
		$this->specializations = null;
		$this->keySkills = null;
		$this->remarks = null;
		$this->title = null;
		$this->textual = null;
		$this->fileName = null;
		$this->postDate = null;
		$this->personalInfo = null;
		$this->skills = null;
		$this->educations = null;
		$this->experiences = null;
		$this->languages = null;
		$this->prefLocations = null;
		$this->expectedCTC = null;
		$this->expectedCTCCurrency = null;
		$this->expectedJobType = null;
		$this->expectedJobTerm = null;
		$this->lastModDate = null;
		$this->responses = null;
		$this->viewCount = null;
		$this->visibility = null;
	}
}



/*#################################################  RESUME DAO  #################################################*/

class ResumeDAO {
	
	private $cm;

	public function __construct(){
		$this->cm = new ConnectionManager();
	}
	public function __destruct() {
	}

	private function getODBCResume($odbcResult){
		$resume = null;
		if(odbc_fetch_row($odbcResult)){
			$resume = new Resume();
			$resume->setId(odbc_result($odbcResult, "id"));
			$resume->setUserId(odbc_result($odbcResult, "userid"));
			$resume->setObjective(odbc_result($odbcResult, "objective"));
			$resume->setTotalExperience(odbc_result($odbcResult, "experience"));
			$resume->setSpecializations(odbc_result($odbcResult, "specializations"));
			$resume->setKeySkills(odbc_result($odbcResult, "skills"));
			$resume->setTitle(odbc_result($odbcResult, "remarks"));
			$resume->setTitle(odbc_result($odbcResult, "title"));
			$resume->setTextual(odbc_result($odbcResult, "textual"));
			$resume->setFileName(odbc_result($odbcResult, "file"));
			$resume->setPostDate(odbc_result($odbcResult, "postdate"));
			$resume->setPrefLocations(odbc_result($odbcResult, "prefLocations"));
			$resume->setExpectedCTC(odbc_result($odbcResult, "expectCTC"));
			$resume->setExpectedCTCCurrency(odbc_result($odbcResult, "expectCTCCurrency"));
			$resume->setExpectedJobType(odbc_result($odbcResult, "expectJobType"));
			$resume->setExpectedJobTerm(odbc_result($odbcResult, "expectJobTerm"));
			$resume->setLastModDate(odbc_result($odbcResult, "lastModDate"));
			$resume->setResponses(odbc_result($odbcResult, "responses"));
			$resume->setViewCount(odbc_result($odbcResult, "viewCount"));
			$resume->setVisibility(odbc_result($odbcResult, "visibility"));
		}
		return $resume;
	}

	public function getAllResumes($sql){
		if($sql == null){
			$sql = "SELECT * FROM resumes ORDER BY postdate DESC";
		}
		$result = $this->cm->execute($sql);
		$resumes = array();
		$resume = null;
		$c=0;
		while(true)
		{
			$resume = $this->getODBCResume($result);
			if($resume == null){
				break;
			}
			$resumes[$c++] = $resume;
		} 
		return $resumes;
	}
	public function getResumesByUser($userid){
		$sql = "SELECT * FROM resumes WHERE userid = '$userid' ORDER BY postdate DESC";
		return $this->getAllResumes($sql);
	}
	public function getResume($resumeid){
		$sql = "SELECT * FROM resumes WHERE id = '$resumeid'";
		$result = $this->cm->execute($sql);
		$resume = null;
		$resume = $this->getODBCResume($result);
		return $resume;
	}
	public function getNewId(){
		$sql = "SELECT id AS max_resume_id FROM resumes";
		$result = $this->cm->execute($sql);
		$c=0;
		$ids = array();
		while(true)
		{
			if(odbc_fetch_row($result)){
				$ids[$c++] = (int)substr(odbc_result($result, "max_resume_id"), 3);
			}
			else{
				break;
			}
		}
		$newId = 0;
		if(count($ids) > 0){
			$newId = max($ids);
		}
		$newId = $newId +1;
		return $newId;
	}
	public function insertResume($resume){
		$newId = $this->getNewId();
		$resume->setId("res".$newId);
		$sql = "INSERT INTO resumes (id, userid, objective, experience, specializations, skills, remarks, title, textual, file," 
		." prefLocations, expectCTC, expectCTCCurrency, expectJobType, expectJobTerm, postdate, lastModDate, visibility, "
		." responses, viewCount) VALUES ('"
		.$resume->getId()."', '".$resume->getUserId()."', '".$resume->getObjective()."', '".$resume->getTotalExperience()."', '"
		.$resume->getSpecializations()."', '".$resume->getKeySkills()."', '".$resume->getRemarks()."', '"
		.$resume->getTitle()."', '".$resume->getTextual()."', '".$resume->getFileName()."', '".$resume->getPrefLocations()."', '"
		.$resume->getExpectedCTC()."', '".$resume->getExpectedCTCCurrency()."', '".$resume->getExpectedJobType()."', '"
		.$resume->getExpectedJobTerm()."', '".date("m-d-Y H:i")."', '".date("m-d-Y H:i")."', '".$resume->getVisibility()."', '"
		.$resume->getResponses()."', '".$resume->getViewCount()."')";

		$result = $this->cm->execute($sql);
		if ($result){
			return $resume;
        }
		else {
			echo "Resume insertion failed " .odbc_error();
			return null;
        }
	}

	public function exists($resumeid){
		$sql = "SELECT id AS resume_id FROM resumes WHERE id = '$resumeid'";
		$result = $this->cm->execute($sql);
		if(odbc_fetch_row($result)){
			$id = odbc_result($result, "resume_id");
			if($id !== null){
				return true;
			}
		}
		return false;
	}

	public function updateResume($resume){
		$sql = "UPDATE resumes SET objective='".$resume->getObjective()."', experience='".$resume->getTotalExperience()
			."', specializations='".$resume->getSpecializations()."', skills='".$resume->getKeySkills()
			."', remarks='".$resume->getRemarks()."', title='".$resume->getTitle()."', textual='".$resume->getTextual()
			."', file='".$resume->getFileName()."', prefLocations='".$resume->getPrefLocations()
			."', expectCTC='".$resume->getExpectedCTC()."', expectCTCCurrency='".$resume->getExpectedCTCCurrency()
			."', expectJobType='".$resume->getExpectedJobType()."', expectJobTerm='".$resume->getExpectedJobTerm()
			."', lastModDate='".date("m-d-Y H:i")."', visibility='".$resume->getVisibility()."', responses='"
			.$resume->getResponses()."', viewCount='".$resume->getViewCount()."' WHERE id='".$resume->getId()."' AND userid='"
			.$resume->getUserId()."'";

		$result = $this->cm->execute($sql);
		if ($result){
			return $resume;
        }
		else {
			echo "Resume updation failed " .odbc_error();
			return null;
        }
	}

	public function deleteResume($resumeid){
		$sql = "DELETE FROM resumes WHERE id='$resumeid'";

		$result = $this->cm->execute($sql);
		if ($result){
			return true;
        }
		else {
			echo "Resume deletion failed " .odbc_error();
			return false;
        }
	}
}


/*#################################################  RESUME EDUCATION  #################################################*/

class ResumeEducation {
	
	public static $DEGREE = 'deg';
	public static $DIPLOMA = 'dip';
	public static $CERTIFICATE = 'cert';
	public static $OTHER_DEGREE = 'o';
	
	public static $GRADUATE = 'g';
	public static $POST_GRADUATE = 'pg';
	public static $MASTERS = 'm';
	public static $POST_MASTERS = 'pm';
	public static $DOCTORATE = 'd';
	public static $POST_DOCTORATE = 'pd';
	public static $HIGH_SCHOOL = 'hs';
	public static $SCHOOL = 's';
	public static $PROFESSIONAL = 'p';
	public static $OTHER_EDU = 'o';

	private $id;
	private $resumeId;
	private $title;
	private $titleType;
	private $subject;
	private $standard;
	private $year;
	private $institute;
	private $percentage;
	private $duration;

	public function __construct(){
		$this->id = "";
		$this->resumeId = "";
		$this->title = "";
		$this->titleType = "";
		$this->subject = "";
		$this->standard = "";
		$this->year = "";
		$this->institute = "";
		$this->percentage = "";
		$this->duration = "";
	}

	public function setId($id){ $this->id = $id; }
	public function setResumeId($resumeId){ $this->resumeId = $resumeId; }
	public function setTitle($title){ $this->title = $title; }
	public function setTitleType($type){ $this->titleType = $type; }
	public function setSubject($subject){	$this->subject = $subject; }
	public function setStandard($standard){	$this->standard = $standard; }
	public function setYear($year){	$this->year = $year;	}
	public function setInstitute($institute){	$this->institute = $institute;	}
	public function setPercentage($percentage){ $this->percentage = $percentage; }
	public function setDuration($duration){ $this->duration = $duration; }

	public function getId(){ return $this->id; }
	public function getResumeId(){ return $this->resumeId; }
	public function getTitle(){ return $this->title; }
	public function getTitleType(){ return $this->titleType; }
	public function getSubject(){	return $this->subject; }
	public function getStandard(){	return $this->standard; }
	public function getYear(){	return $this->year;	}
	public function getInstitute(){	return $this->institute;	}
	public function getPercentage(){ return $this->percentage; }
	public function getDuration(){ return $this->duration; }
	public function getDurationYears(){	
		$durYears = intval(substr($this->duration, 0, strpos($this->duration, RecruiteUtil::$DATE_SEP)));
		return $durYears;
	}
	public function getDurationMonths(){	
		$durMonths = intval(substr($this->duration, strpos($this->duration, RecruiteUtil::$DATE_SEP)+1));
		return $durMonths;	
	}


	public function __destruct() {
		$this->id = null;
		$this->resumeId = null;
		$this->title = null;
		$this->subject = null;
		$this->standard = null;
		$this->year = null;
		$this->institute = null;
		$this->percentage = null;
		$this->duration = null;
		$this->titleType = null;
	}
}



/*#################################################  RESUME EDUCATION DAO  #################################################*/

class ResumeEducationDAO {
	
	private $cm;

	public function __construct(){
		$this->cm = new ConnectionManager();
	}
	public function __destruct() {
	}

	private function getODBCEducation($odbcResult){
		$education = null;
		if(odbc_fetch_row($odbcResult)){
			$education = new ResumeEducation();
			$education->setId(odbc_result($odbcResult, "id"));
			$education->setResumeId(odbc_result($odbcResult, "resumeid"));
			$education->setTitle(odbc_result($odbcResult, "title"));
			$education->setTitleType(odbc_result($odbcResult, "titleType"));
			$education->setSubject(odbc_result($odbcResult, "subject"));
			$education->setStandard(odbc_result($odbcResult, "standard"));
			$education->setYear(odbc_result($odbcResult, "year"));
			$education->setInstitute(odbc_result($odbcResult, "institute"));
			$education->setDuration(odbc_result($odbcResult, "duration"));
			$education->setPercentage(odbc_result($odbcResult, "percentage"));
		}
		return $education;
	}

	public function getAllEducations(){
		$sql = "SELECT * FROM resume_education";
		$result = $this->cm->execute($sql);
		$educations = array();
		$education = null;
		$c=0;
		while(true)
		{
			$education = $this->getODBCEducation($result);
			if($education == null){
				break;
			}
			$educations[$c++] = $education;
		} 
		return $educations;
	}
	public function getEducations($resumeid){
		$sql = "SELECT * FROM resume_education WHERE resumeid = '$resumeid'";
		$result = $this->cm->execute($sql);
		$educations = array();
		$education = null;
		$c=0;
		while(true)
		{
			$education = $this->getODBCEducation($result);
			if($education == null){
				break;
			}
			$educations[$c++] = $education;
		} 
		return $educations;
	}
	public function getEducation($educationid){
		$sql = "SELECT * FROM resume_education WHERE id = '$educationid'";
		$result = $this->cm->execute($sql);
		$education = null;
		$education = $this->getODBCEducation($result);
		return $education;
	}
	public function getNewId(){
		$sql = "SELECT id AS max_edu_id FROM resume_education";
		$result = $this->cm->execute($sql);
		$c=0;
		$ids = array();
		while(true)
		{
			if(odbc_fetch_row($result)){
				$ids[$c++] = (int)substr(odbc_result($result, "max_edu_id"), 3);
			}
			else{
				break;
			}
		}
		$newId = 0;
		if(count($ids) > 0){
			$newId = max($ids);
		}
		$newId = $newId +1;
		return $newId;
	}
	public function insertResumeEducation($education){
		$newId = $this->getNewId();
		$education->setId("edu".$newId);

		$sql = "INSERT INTO resume_education (id, resumeid, title, titleType, subject, standard, year, institute, duration, "
		."percentage) VALUES ('" .$education->getId()."', '".$education->getResumeId()."', '".$education->getTitle()."', '"
		.$education->getTitleType()."', '".$education->getSubject()."', '".$education->getStandard()."', '"
		.$education->getYear()."', '".$education->getInstitute()."', '".$education->getDuration()."', '"
		.$education->getPercentage()."')";

		$result = $this->cm->execute($sql);
		if ($result){
			return $education;
        }
		else {
			echo "Resume education insertion failed " .odbc_error();
			return null;
        }
	}
	public function exists($educationid){
		$sql = "SELECT id AS education_id FROM resume_education WHERE id = '$educationid'";
		$result = $this->cm->execute($sql);
		if(odbc_fetch_row($result)){
			$id = odbc_result($result, "education_id");
			if($id !== null){
				return true;
			}
		}
		return false;
	}
	public function updateResumeEducation($education){
		$sql = "UPDATE resume_education SET  title='".$education->getTitle()."', titleType='".$education->getTitleType()
		."', subject='".$education->getSubject()."', standard='".$education->getStandard()."', year='"
		.$education->getYear()."', institute='".$education->getInstitute()."', duration='".$education->getDuration()
		."', percentage='".$education->getPercentage()."' WHERE id = '".$education->getId()."'";

		$result = $this->cm->execute($sql);
		if ($result){
			return $education;
        }
		else {
			echo "Resume education updation failed " .odbc_error();
			return null;
        }
	}

	public function deleteResumeEducation($educationid){
		$sql = "DELETE FROM resume_education WHERE id = '".$educationid."'";

		$result = $this->cm->execute($sql);
		if ($result){
			return true;
        }
		else {
			echo "Resume education deletion failed " .odbc_error();
			return false;
        }
	}
}



/*#################################################  RESUME SKILL  #################################################*/

class ResumeSkill {
	private $id;
	private $resumeId;
	private $name;
	private $duration;
	private $month;

	public function __construct(){
		$this->id = "";
		$this->resumeId = "";
		$this->name = "";
		$this->duration = "";
		$this->expertLevel = "";
	}

	public function setId($id){ $this->id = $id; }
	public function setResumeId($resumeId){ $this->resumeId = $resumeId; }
	public function setName($name){ $this->name = $name; }
	public function setDuration($duration){	$this->duration = $duration;	}
	public function setExpertLevel($level){	$this->expertLevel = $level;	}
	
	public function getId(){ return $this->id; }
	public function getResumeId(){ return $this->resumeId; }
	public function getName(){ return $this->name; }
	public function getDuration(){	return $this->duration;	}
	public function getDurationYears(){	
		$durYears = intval(substr($this->duration, 0, strpos($this->duration, RecruiteUtil::$DATE_SEP)));
		return $durYears;
	}
	public function getDurationMonths(){	
		$durMonths = intval(substr($this->duration, strpos($this->duration, RecruiteUtil::$DATE_SEP)+1));
		return $durMonths;	
	}
	public function getExpertLevel(){	return $this->expertLevel;}


	public function __destruct() {
		$this->id = null;
		$this->resumeId = null;
		$this->name = null;
		$this->duration = null;
		$this->expertLevel = null;
	}
}



/*#################################################  RESUME SKILL DAO  #################################################*/

class ResumeSkillDAO {
	
	private $cm;

	public function __construct(){
		$this->cm = new ConnectionManager();
	}
	public function __destruct() {
	}

	private function getODBCSkill($odbcResult){
		$skill = null;
		if(odbc_fetch_row($odbcResult)){
			$skill = new ResumeSkill();
			$skill->setId(odbc_result($odbcResult, "id"));
			$skill->setResumeId(odbc_result($odbcResult, "resumeid"));
			$skill->setName(odbc_result($odbcResult, "name"));
			$skill->setDuration(odbc_result($odbcResult, "duration"));
			$skill->setExpertLevel(odbc_result($odbcResult, "expertlevel"));
		}
		return $skill;
	}

	public function getAllSkills(){
		$sql = "SELECT * FROM resume_skills";
		$result = $this->cm->execute($sql);
		$skills = array();
		$skill = null;
		$c=0;
		while(true)
		{
			$skill = $this->getODBCSkill($result);
			if($skill == null){
				break;
			}
			$skills[$c++] = $skill;
		} 
		return $skills;
	}
	public function getSkills($resumeid){
		$sql = "SELECT * FROM resume_skills WHERE resumeid = '$resumeid'";
		$result = $this->cm->execute($sql);
		$skills = array();
		$skill = null;
		$c=0;
		while(true)
		{
			$skill = $this->getODBCSkill($result);
			if($skill == null){
				break;
			}
			$skills[$c++] = $skill;
		} 
		return $skills;
	}
	public function getSkill($skillid){
		$sql = "SELECT * FROM resume_skills WHERE id = '$skillid'";
		$result = $this->cm->execute($sql);
		$skill = null;
		$skill = $this->getODBCSkill($result);
		return $skill;
	}
	public function getNewId(){
		$sql = "SELECT id AS max_skill_id FROM resume_skills";
		$result = $this->cm->execute($sql);
		$c=0;
		$ids = array();
		while(true)
		{
			if(odbc_fetch_row($result)){
				$ids[$c++] = (int)substr(odbc_result($result, "max_skill_id"), 3);
			}
			else{
				break;
			}
		}
		$newId = 0;
		if(count($ids) > 0){
			$newId = max($ids);
		}
		$newId = $newId +1;
		return $newId;
	}
	public function insertResumeSkill($skill){
		$newId = $this->getNewId();
		$skill->setId("skl".$newId);

		$sql = "INSERT INTO resume_skills (id, resumeid, name, duration, expertlevel) VALUES ('" .$skill->getId()."', '"
		.$skill->getResumeId()."', '".$skill->getName()."', '".$skill->getDuration()."', '".$skill->getExpertLevel()."')";

		$result = $this->cm->execute($sql);
		if ($result){
			return $skill;
        }
		else {
			echo "Resume skill insertion failed " .odbc_error();
			return null;
        }
	}
	public function exists($skillid){
		$sql = "SELECT id AS skill_id FROM resume_skills WHERE id = '$skillid'";
		$result = $this->cm->execute($sql);
		if(odbc_fetch_row($result)){
			$id = odbc_result($result, "skill_id");
			if($id !== null){
				return true;
			}
		}
		return false;
	}
	public function updateResumeSkill($skill){
		$sql = "UPDATE resume_skills SET name='".$skill->getName()."', duration='".$skill->getDuration()
		."', expertlevel='".$skill->getExpertLevel()."' WHERE id = '".$skill->getId()."'";

		$result = $this->cm->execute($sql);
		if ($result){
			return $skill;
        }
		else {
			echo "Resume skill updation failed " .odbc_error();
			return null;
        }
	}
	public function deleteResumeSkill($skillid){
		$sql = "DELETE FROM resume_skills WHERE id = '".$skillid."'";

		$result = $this->cm->execute($sql);
		if ($result){
			return true;
        }
		else {
			echo "Resume skill deletion failed " .odbc_error();
			return false;
        }
	}

}



/*#################################################  RESUME LANGUAGE  #################################################*/

class ResumeLanguage {

	private $id;
	private $resumeId;
	private $language;
	private $canRead;
	private $canWrite;
	private $canSpeak;

	public function __construct(){
		$this->id = "";
		$this->resumeId = "";
		$this->language = "";
		$this->canRead = false;
		$this->canWrite = false;
		$this->canSpeak = false;
	}

	public function setId($id){ $this->id = $id; }
	public function setResumeId($resumeId){ $this->resumeId = $resumeId; }
	public function setLanguage($language){ $this->language = $language; }
	public function setCanRead($canRead){	$this->canRead = $canRead;	}
	public function setCanWrite($canWrite){	$this->canWrite = $canWrite; }
	public function setCanSpeak($canSpeak){	$this->canSpeak = $canSpeak; }

	public function getId(){ return $this->id; }
	public function getResumeId(){ return $this->resumeId; }
	public function getLanguage(){ return $this->language; }
	public function getCanRead(){	return $this->canRead;	}
	public function getCanWrite(){	return $this->canWrite; }
	public function getCanSpeak(){	return $this->canSpeak; }


	public function __destruct() {
		$this->id = null;
		$this->resumeId = null;
		$this->language = null;
		$this->canRead = null;
		$this->canWrite = null;
		$this->canSpeak = null;
	}
}



/*#################################################  RESUME LANGUAGE DAO  #################################################*/

class ResumeLanguageDAO {
	
	private $cm;

	public function __construct(){
		$this->cm = new ConnectionManager();
	}
	public function __destruct() {
	}

	private function getODBCLanguage($odbcResult){
		$language = null;
		if(odbc_fetch_row($odbcResult)){
			$language = new ResumeLanguage();
			$language->setId(odbc_result($odbcResult, "id"));
			$language->setResumeId(odbc_result($odbcResult, "resumeid"));
			$language->setLanguage(odbc_result($odbcResult, "language"));
			$language->setCanRead(odbc_result($odbcResult, "read"));
			$language->setCanWrite(odbc_result($odbcResult, "write"));
			$language->setCanSpeak(odbc_result($odbcResult, "speak"));
		}
		return $language;
	}

	public function getAllLanguages(){
		$sql = "SELECT * FROM resume_language_known";
		$result = $this->cm->execute($sql);
		$languages = array();
		$language = null;
		$c=0;
		while(true)
		{
			$language = $this->getODBCLanguage($result);
			if($language == null){
				break;
			}
			$languages[$c++] = $language;
		} 
		return $languages;
	}
	public function getLanguages($resumeid){
		$sql = "SELECT * FROM resume_language_known WHERE resumeid = '$resumeid'";
		$result = $this->cm->execute($sql);
		$languages = array();
		$language = null;
		$c=0;
		while(true)
		{
			$language = $this->getODBCLanguage($result);
			if($language == null){
				break;
			}
			$languages[$c++] = $language;
		} 
		return $languages;
	}

}



/*#################################################  RESUME EXPERIENCE  #################################################*/

class ResumeExperience {
	
	public static $TOP_TECH = 'tt';
	public static $MID_TECH = 'mt';
	public static $JUN_TECH = 'jt';
	public static $TOP_MGMT = 'tm';
	public static $MID_MGMT = 'mm';
	public static $JUN_MGMT = 'jm';
	public static $FRESHER = 'fr';
	public static $OTHER_EXP = 'o';

	private $id;
	private $resumeId;
	private $company;
	private $industry;
	private $designation;
	private $funcArea;
	private $responsibility;
	private $achievement;
	private $joining;
	private $leaving;
	private $location;
	private $jobType;
	private $jobTerm;
	private $seniority;
	private $ctc;
	private $ctcCurrency;
	private $isCurrent;

	public function __construct(){
		$this->id = "";
		$this->resumeId = "";
		$this->company = "";
		$this->industry = "";
		$this->designation = "";
		$this->funcArea = "";
		$this->joining = "";
		$this->leaving = "";
		$this->location = "";
		$this->achievement = "";
		$this->responsibility = "";
		$this->seniority = "";
		$this->ctc = "";
		$this->ctcCurrency = "";
		$this->jobType = "";
		$this->jobTerm = "";
		$this->isCurrent = "n";
	}

	public function setId($id){ $this->id = $id; }
	public function setResumeId($resumeId){ $this->resumeId = $resumeId; }
	public function setCompany($company){	$this->company = $company; }
	public function setIndustry($industry){	$this->industry = $industry; }
	public function setDesignation($designation){	$this->designation = $designation;	}
	public function setFuncArea($funcArea){	$this->funcArea = $funcArea;	}
	public function setLocation($location){ $this->location = $location; }
	public function setCTC($ctc){ $this->ctc = $ctc; }
	public function setCTCCurrency($ctcCurrency){ $this->ctcCurrency = $ctcCurrency; }
	public function setResponsibility($resp){ $this->responsibility = $resp; }
	public function setSeniority($seniority){ $this->seniority = $seniority; }
	public function setAchievement($achievement){ $this->achievement = $achievement; }
	public function setJoining($joining){ $this->joining = $joining; }
	public function setLeaving($leaving){ $this->leaving = $leaving; }
	public function setJobTerm($jobTerm){ $this->jobTerm = $jobTerm; }
	public function setJobType($jobType){ $this->jobType = $jobType; }
	public function setCurrent($isCurrent){ $this->isCurrent = $isCurrent; }

	public function getId(){ return $this->id; }
	public function getResumeId(){ return $this->resumeId; }
	public function getCompany(){	return $this->company; }
	public function getIndustry(){	return $this->industry; }
	public function getDesignation(){	return $this->designation;	}
	public function getFuncArea(){	return $this->funcArea;	}
	public function getLocation(){ return $this->location; }
	public function getCTC(){ return $this->ctc; }
	public function getCTCCurrency(){ return $this->ctcCurrency; }
	public function getResponsibility(){ return $this->responsibility; }
	public function getSeniority(){ return $this->seniority; }
	public function getAchievement(){ return $this->achievement; }
	public function getJoining(){ return $this->joining; }
	public function getLeaving(){ return $this->leaving; }
	public function getJobType(){	return $this->jobType;	}
	public function getJobTerm(){	return $this->jobTerm;	}
	public function isCurrent(){ return $this->isCurrent; }


	public function __destruct() {
		$this->id = null;
		$this->resumeId = null;
		$this->company = null;
		$this->industry = null;
		$this->designation = null;
		$this->funcArea = null;
		$this->responsibility = null;
		$this->achievement = null;
		$this->location = null;
		$this->seniority = null;
		$this->jobType = null;
		$this->jobTerm = null;
		$this->joining = null;
		$this->leaving = null;
		$this->ctc = null;
		$this->ctcCurrency = null;
		$this->isCurrent = null;
	}
}


/*#################################################  RESUME EXPERIENCE DAO  #################################################*/

class ResumeExperienceDAO {
	
	private $cm;

	public function __construct(){
		$this->cm = new ConnectionManager();
	}
	public function __destruct() {
	}

	private function getODBCExperience($odbcResult){
		$experience = null;
		if(odbc_fetch_row($odbcResult)){
			$experience = new ResumeExperience();
			$experience->setId(odbc_result($odbcResult, "id"));
			$experience->setResumeId(odbc_result($odbcResult, "resumeid"));
			$experience->setCompany(odbc_result($odbcResult, "company"));
			$experience->setIndustry(odbc_result($odbcResult, "industry"));
			$experience->setDesignation(odbc_result($odbcResult, "designation"));
			$experience->setJoining(odbc_result($odbcResult, "joining"));
			$experience->setLeaving(odbc_result($odbcResult, "leaving"));
			$experience->setAchievement(odbc_result($odbcResult, "achievement"));
			$experience->setLocation(odbc_result($odbcResult, "location"));
			$experience->setSeniority(odbc_result($odbcResult, "seniority"));
			$experience->setResponsibility(odbc_result($odbcResult, "responsibility"));
			$experience->setFuncArea(odbc_result($odbcResult, "functionalarea"));
			$experience->setCTC(odbc_result($odbcResult, "ctc"));
			$experience->setCTCCurrency(odbc_result($odbcResult, "ctccurrency"));
			$experience->setJobType(odbc_result($odbcResult, "type"));
			$experience->setJobTerm(odbc_result($odbcResult, "term"));
			$experience->setCurrent(odbc_result($odbcResult, "current"));
		}
		return $experience;
	}

	public function getAllExperiences(){
		$sql = "SELECT * FROM resume_experience";
		$result = $this->cm->execute($sql);
		$experiences = array();
		$experience = null;
		$c=0;
		while(true)
		{
			$experience = $this->getODBCExperience($result);
			if($experience == null){
				break;
			}
			$experiences[$c++] = $experience;
		} 
		return $experiences;
	}
	public function getExperiences($resumeid){
		$sql = "SELECT * FROM resume_experience WHERE resumeid = '$resumeid'";
		$result = $this->cm->execute($sql);
		$experiences = array();
		$experience = null;
		$c=0;
		while(true)
		{
			$experience = $this->getODBCExperience($result);
			if($experience == null){
				break;
			}
			$experiences[$c++] = $experience;
		} 
		return $experiences;
	}
	public function getExperience($experienceid){
		$sql = "SELECT * FROM resume_experience WHERE id = '$experienceid'";
		$result = $this->cm->execute($sql);
		$experience = null;
		$experience = $this->getODBCExperience($result);
		return $experience;
	}

	public function getNewId(){
		$sql = "SELECT id AS max_exp_id FROM resume_experience";
		$result = $this->cm->execute($sql);
		$c=0;
		$ids = array();
		while(true)
		{
			if(odbc_fetch_row($result)){
				$ids[$c++] = (int)substr(odbc_result($result, "max_exp_id"), 3);
			}
			else{
				break;
			}
		}
		$newId = 0;
		if(count($ids) > 0){
			$newId = max($ids);
		}
		$newId = $newId +1;
		return $newId;
	}
	public function insertResumeExperience($experience){
		$newId = $this->getNewId();
		$experience->setId("exp".$newId);

		$sql = "INSERT INTO resume_experience (id, resumeid, company, industry, designation, responsibility, achievement, "
		."location, functionalarea, joining, leaving, seniority, ctc, ctccurrency, type, term, current) VALUES ('"  
		.$experience->getId()."', '".$experience->getResumeId()."', '".$experience->getCompany()."', '"
		.$experience->getIndustry()."', '".$experience->getDesignation()."', '".$experience->getResponsibility()."', '"
		.$experience->getAchievement()."', '".$experience->getLocation()."', '".$experience->getfuncArea()."', '"
		.$experience->getJoining()."', '".$experience->getLeaving()."', '".$experience->getSeniority()."', '"
		.$experience->getCTC()."', '".$experience->getCTCCurrency()."', '".$experience->getJobType()."', '"
		.$experience->getJobTerm()."', '".$experience->isCurrent()."')";

		$result = $this->cm->execute($sql);
		if ($result){
			return $experience;
        }
		else {
			echo "Resume experience insertion failed " .odbc_error();
			return null;
        }
	}
	public function exists($experienceid){
		$sql = "SELECT id AS experience_id FROM resume_experience WHERE id = '$experienceid'";
		$result = $this->cm->execute($sql);
		if(odbc_fetch_row($result)){
			$id = odbc_result($result, "experience_id");
			if($id !== null){
				return true;
			}
		}
		return false;
	}
	public function updateResumeExperience($experience){
		$sql = "UPDATE resume_experience SET company='".$experience->getCompany()."', industry='".$experience->getIndustry()
		."', designation='".$experience->getDesignation()."', responsibility='".$experience->getResponsibility()
		."', achievement='".$experience->getAchievement()."', location='".$experience->getLocation()."', functionalarea='"
		.$experience->getfuncArea()."', joining='".$experience->getJoining()."', leaving='".$experience->getLeaving()
		."', seniority='".$experience->getSeniority()."', ctc='".$experience->getCTC()."', ctccurrency='"
		.$experience->getCTCCurrency()."', type='".$experience->getJobType()."', term='".$experience->getJobTerm()
		."', current='".$experience->isCurrent()."' WHERE id = '".$experience->getId()."'";

		$result = $this->cm->execute($sql);
		if ($result){
			return $experience;
        }
		else {
			echo "Resume experience updation failed " .odbc_error();
			return null;
        }
	}
	public function deleteResumeExperience($experienceid){
		$sql = "DELETE FROM resume_experience WHERE id = '".$experienceid."'";

		$result = $this->cm->execute($sql);
		if ($result){
			return true;
        }
		else {
			echo "Resume experience deletion failed " .odbc_error();
			return false;
        }
	}

}

/*########################################################################################################################*/

?>
 