#1. mysql -uroot -ppassword
use mysql;
DROP database recruite;
CREATE DATABASE IF NOT EXISTS recruite;
use recruite;

CREATE TABLE users 
(
   id		varchar(50)	PRIMARY KEY,
   password	varchar(50)	NULL,
   type		varchar(1)	NULL,
   secretq	varchar(50)	NULL,
   secreta	varchar(50)	NULL,
   regdate	varchar(20)	NULL
);

INSERT INTO users
VALUES('admin','123','a','pet','tom', '2005-12-29');

CREATE TABLE companies 
(
   id		varchar(50)	PRIMARY KEY,
   userid	varchar(50)	NULL,
   name		varchar(50)	NOT NULL,
   descr	varchar(200)	NULL,
   industry	varchar(50)	NULL,
   strength	varchar(50)	NULL,
   turnover	varchar(50)	NULL,
   branches	int		NULL,
   basedin      varchar(50)	NULL,
   type		varchar(50)	NULL,
   standard     varchar(50)     NULL,
   advertiser   varchar(1)	NULL,
   logo		varchar(50)	NULL,
   url		varchar(50)	NULL
);

CREATE TABLE contacts 
(
   ownerid	varchar(50)	PRIMARY KEY,
   address	varchar(50)	NULL,
   city		varchar(50)	NULL,
   state	varchar(50)	NULL,
   zip		varchar(50)	NULL,
   country	varchar(50)	NULL,
   workphone	varchar(50)	NULL,
   homephone	varchar(50)	NULL,
   mobile	varchar(50)	NULL,
   fax		varchar(50)	NULL,
   email	varchar(50)	NOT NULL,
   url		varchar(50)	NULL,
   ownertype	varchar(1)	NULL
);

CREATE TABLE jobs 
(
   id			varchar(50)	PRIMARY KEY,
   recruiterid		varchar(50)	NULL,
   employerid		varchar(50)	NULL,
   designation		varchar(50)	NULL,
   descr		varchar(200)	NULL,
   refid		varchar(50)	NULL,
   location		varchar(50)	NULL,
   functionalarea	varchar(50)	NULL,
   maxexp		int		NULL,
   minexp		int		NULL,
   keyword		varchar(50)	NULL,
   criteria		varchar(50)	NULL,
   qualification	varchar(50)	NULL,
   renumeration		varchar(50)	NULL,
   type			varchar(50)	NULL,
   term			varchar(50)	NULL,
   postdate		varchar(20)	NULL,
   lasmoddate		varchar(20)	NULL
);

CREATE TABLE resumes 
(
   id			varchar(50)	PRIMARY KEY,
   userid		varchar(50)	NULL,
   title		varchar(50)	NULL,
   experience		varchar(50)	NULL,
   specializations	varchar(200)	NULL,
   skills		varchar(50)	NULL,
   currlocation		varchar(100)	NULL,
   currcountry		varchar(100)	NULL,
   preflocations	varchar(50)	NULL,
   expectctc		varchar(50)	NULL,
   expectctccurrency	varchar(50)	NULL,
   expectjobtype	varchar(50)	NULL,
   expectjobterm	varchar(50)	NULL,
   objective		blob		NULL,
   textual		blob		NULL,
   file			varchar(50)	NULL,
   remarks		blob		NULL,
   visibility		varchar(50)	NULL,
   responses		varchar(50)	NULL,
   viewcount		varchar(50)	NULL,
   postdate		varchar(50)	NULL,
   lastmoddate		varchar(50)	NULL,
   status		varchar(50)	NULL,
   comments		blob		NULL
);

CREATE TABLE personal_info 
(
   ownerid		varchar(50)	PRIMARY KEY,
   fname		varchar(50)	NULL,
   lname		varchar(50)	NULL,
   dob			varchar(20)	NULL,
   gender		varchar(1)	NULL,
   marital		varchar(50)	NULL,
   lastmoddate		varchar(20)	NULL,
   ownertype		varchar(1)	NULL
);


CREATE TABLE resume_education 
(
   id		varchar(50)	PRIMARY KEY,
   resumeid	varchar(50)	NULL,
   title	varchar(50)	NULL,
   titletype	varchar(20)	NULL,
   subject	varchar(100)	NULL,
   standard	varchar(50)	NULL,
   year		varchar(10)	NULL,
   institute	varchar(100)	NULL,
   duration	varchar(50)	NULL,
   percentage	varchar(10)	NULL
);

CREATE TABLE resume_experience 
(
   id			varchar(50)	PRIMARY KEY,
   resumeid		varchar(50)	NULL,
   company		varchar(50)	NULL,
   industry		varchar(50)	NULL,
   designation		varchar(50)	NULL,
   responsibility	blob		NULL,
   achievement		blob		NULL,
   location		varchar(50)	NULL,
   functionalarea	varchar(50)	NULL,
   joining		varchar(20)	NULL,
   leaving		varchar(20)	NULL,
   seniority		varchar(50)	NULL,
   ctc			varchar(50)	NULL,
   ctccurrency		varchar(50)	NULL,
   type			varchar(50)	NULL,
   term			varchar(50)	NULL,
   current		varchar(1)	NULL
);

CREATE TABLE resume_skills 
(
   id		varchar(50)	PRIMARY KEY,
   resumeid	varchar(50)	NULL,
   name		varchar(50)	NULL,
   duration	varchar(50)	NULL,
   expertlevel	varchar(50)	NULL
);

CREATE TABLE countries 
(
   id		varchar(50)	PRIMARY KEY,
   name		varchar(100)	NULL
);

CREATE TABLE locations 
(
   id		varchar(50)	PRIMARY KEY,
   name		varchar(200)	NULL
);

CREATE TABLE industries 
(
   id		varchar(50)	PRIMARY KEY,
   name		varchar(200)	NULL
);

CREATE TABLE functional_areas 
(
   id		varchar(50)	PRIMARY KEY,
   name		varchar(200)	NULL
);

CREATE TABLE institutes 
(
   id		varchar(50)	PRIMARY KEY,
   name		varchar(200)	NULL
);

CREATE TABLE subjects 
(
   id		varchar(50)	PRIMARY KEY,
   name		varchar(200)	NULL
);
CREATE TABLE  specializations  
(
   id		varchar(50)	PRIMARY KEY,
   name		varchar(200)	NULL
);

commit;
#'id','userid','name','desc','industry','strength','turnover','branches','basedin','type','standard','advertiser','logo','url'

INSERT INTO companies VALUES(
'c1','tdas','Siemens Info Sys Ltd.','SISL','Telecom','','',0,'','','','y','logo1.jpg', '');
INSERT INTO companies VALUES(
'c10','','Metric Systems','Metric Systems','Software','','',0,'','','','y','logo8.bmp', '');
INSERT INTO companies VALUES(
'c11','','Methodics Pvt. Ltd.','Methodics Pvt. Ltd.','Consulting','','',0,'','','','y','logo9.bmp', '');
INSERT INTO companies VALUES(
'c12','','Millennium Ltd.','Millennium Ltd.','Retail','','',0,'','','','n','logo10.bmp', '');
INSERT INTO companies VALUES(
'c13','','Spacetek Consultants','Spacetek Consultants','Consulting','','',0,'','','','n','logo11.gif', '');
INSERT INTO companies VALUES(
'c14','','Apple Consultants','Apple Consultants','Consulting','','',0,'','','','y','logo12.gif', '');
INSERT INTO companies VALUES(
'c15','','CompuSoft Solutions','CompuSoft Solutions','Consulting','','',0,'','','','n','logo13.gif', '');
INSERT INTO companies VALUES(
'c16','','Crystal Solutions','Crystal Solutions','Consulting','','',0,'','','','y','logo14.gif', '');
INSERT INTO companies VALUES(
'c17','','TransWorld Systems','TransWorld Systems','Software','','',0,'','','','n','logo15.gif', '');
INSERT INTO companies VALUES(
'c18','','Megatronics Pvt. Ltd.','Megatronics Pvt. Ltd.','Electrical','','',0,'','','','y','logo16.gif', '');
INSERT INTO companies VALUES(
'c19','','Silicon Ltd.','Silicon Ltd.','Manufacturing','','',0,'','','','y','logo17.gif', '');
INSERT INTO companies VALUES(
'c2','aks','AKS Consultants','AKS','Consulting','','',0,'','','','y','logo31.bmp', '');
INSERT INTO companies VALUES(
'c20','','SoftTech Consultants','SoftTech Consultants','Consulting','','',0,'','','','y','logo18.gif', '');
INSERT INTO companies VALUES(
'c3','','LNT Infotech','LNT','Engineering','','',0,'','','','y','logo3.bmp', '');
INSERT INTO companies VALUES(
'c4','','Wipro Technologies','Wipro Technologies','Software','','',0,'','','','n','logo6.bmp', '');
INSERT INTO companies VALUES(
'c5','','IBM','IBM','Software','','',0,'','','','y','logo2.bmp', '');
INSERT INTO companies VALUES(
'c6','','PHILIPS Electronics','PHILIPS Electronics','Electronics','','',0,'','','','n','logo4.bmp', '');
INSERT INTO companies VALUES(
'c7','','GeoSolutions Consultants','GeoSolutions Consultants','Consulting','','',0,'','','','y','logo7.bmp', '');
INSERT INTO companies VALUES(
'c8','','Hitech Solutions','Hitech Solutions','Software','','',0,'','','','y','logo6.bmp', '');
INSERT INTO companies VALUES(
'c9','','Magic Solutions','Magic Solutions','Consulting','','',0,'','','','y','logo7.bmp', '');
commit;
#'ownerid','address','city','state','zip','country','workphone','homephone','mobile','fax','email','url','ownertype'

INSERT INTO contacts VALUES(
'aks','HA 16, Saltlake.','Kolkata','WB','700092','India','','0913323579176','','0913323576756','amit@aks.com','','u');
INSERT INTO contacts VALUES(
'mroy','161, Park Street.','Kolkata','WB','700017','India','','0913322842954','','0913322842955','psengupta@yahoo.com','','u');
INSERT INTO contacts VALUES(
'res1','123, Sunnyvale Road. Flat 221','Kolkata','WB','700012','India','091332288788','0913325455444','9830019211','091 33 25346677','abc@email.com','','r');
INSERT INTO contacts VALUES(
'res2','223, Middleton Road. Flat 230.','Bangalore','Karnataka','400019','India','091 44 2333 4444','091 44 2444 5512','98400012345','091 44 2444 5555','xyz@mail.com','','r');
INSERT INTO contacts VALUES(
'res4','161, Park Street.','Kolkata','WB','700017','India','','0913322842954','','0913322842955','psengupta@yahoo.com','','r');
commit;
#'id','name'

INSERT INTO countries VALUES(
'con1','Australia');
INSERT INTO countries VALUES(
'con2','Bahrain');
INSERT INTO countries VALUES(
'con3','Bangladesh'); 
INSERT INTO countries VALUES(
'con4','Belgium');
INSERT INTO countries VALUES(
'con5','Canada');
INSERT INTO countries VALUES(
'con6','Doha');
INSERT INTO countries VALUES(
'con7','Dubai');
INSERT INTO countries VALUES(
'con8','France');
INSERT INTO countries VALUES(
'con9','Germany');
INSERT INTO countries VALUES(
'con10','Hong Kong');
INSERT INTO countries VALUES(
'con11','INDIA');
INSERT INTO countries VALUES(
'con12','Indonesia'); 
INSERT INTO countries VALUES(
'con13','Ireland');
INSERT INTO countries VALUES(
'con14','Italy');
INSERT INTO countries VALUES(
'con15','Japan');
INSERT INTO countries VALUES(
'con16','Kenya');
INSERT INTO countries VALUES(
'con17','Kuwait');
INSERT INTO countries VALUES(
'con18','Lebanon');
INSERT INTO countries VALUES(
'con19','Libya');
INSERT INTO countries VALUES(
'con20','Malaysia');
INSERT INTO countries VALUES(
'con21','Maldives');
INSERT INTO countries VALUES(
'con22','Mauritius');
INSERT INTO countries VALUES(
'con23','Mexico');
INSERT INTO countries VALUES(
'con24','Nepal');
INSERT INTO countries VALUES(
'con25','Netherlands');
INSERT INTO countries VALUES(
'con26','New Zealand');
INSERT INTO countries VALUES(
'con27','Norway');
INSERT INTO countries VALUES(
'con28','Oman');
INSERT INTO countries VALUES(
'con29','Pakistan');
INSERT INTO countries VALUES(
'con30','Qatar');
INSERT INTO countries VALUES(
'con31','Quilon');
INSERT INTO countries VALUES(
'con32','Russia');
INSERT INTO countries VALUES(
'con33','Saudi Arabia');
INSERT INTO countries VALUES(
'con34','Singapore');
INSERT INTO countries VALUES(
'con35','South Africa');
INSERT INTO countries VALUES(
'con36','South Korea');
INSERT INTO countries VALUES(
'con37','Spain');
INSERT INTO countries VALUES(
'con38','Sri Lanka');
INSERT INTO countries VALUES(
'con39','Sweden');
INSERT INTO countries VALUES(
'con40','Switzerland');
INSERT INTO countries VALUES(
'con41','Thailand');
INSERT INTO countries VALUES(
'con42','United Arab Emirates');
INSERT INTO countries VALUES(
'con43','United Kingdom');
INSERT INTO countries VALUES(
'con44','United States');
INSERT INTO countries VALUES(
'con45','Yemen');
INSERT INTO countries VALUES(
'con46','Zimbabwe'); 
commit;
#'id','name'

INSERT INTO functional_areas VALUES('func1', 'Accounting/Tax/Company Secretary/Audit');
INSERT INTO functional_areas VALUES('func2', 'Mktg/Advtg/MR/Media Planning/PR/Corp. Comm.');
INSERT INTO functional_areas VALUES('func3', 'Agent');
INSERT INTO functional_areas VALUES('func4', 'Airline/Reservations/Ticketing/Travel');
INSERT INTO functional_areas VALUES('func5', 'Anchoring/TV/Films/Production');
INSERT INTO functional_areas VALUES('func6', 'Architects/Interior Design/Naval Arch.');
INSERT INTO functional_areas VALUES('func7', 'Art Director/Graphic/Web Designer');
INSERT INTO functional_areas VALUES('func8', 'Banking/Insurance');
INSERT INTO functional_areas VALUES('func9', 'Content/Editors/Journalists');
INSERT INTO functional_areas VALUES('func10', 'Corporate Planning/Consulting/Strategy');
INSERT INTO functional_areas VALUES('func11', 'Entrepreneur/Businessman');
INSERT INTO functional_areas VALUES('func12', 'Export/Import');
INSERT INTO functional_areas VALUES('func13', 'Fashion');
INSERT INTO functional_areas VALUES('func14', 'Front Office Staff/Secretarial/Computer Operator');
INSERT INTO functional_areas VALUES('func15', 'Hotels/Restaurant Management');
INSERT INTO functional_areas VALUES('func16', 'HR/Admin/PM/IR/Training');
INSERT INTO functional_areas VALUES('func17', 'IT-Software');
INSERT INTO functional_areas VALUES('func18', 'ITES/BPO/Operations/Customer Service/Telecalling');
INSERT INTO functional_areas VALUES('func19', 'Legal/Law');
INSERT INTO functional_areas VALUES('func20', 'Medical Professional/Healthcare Practitioner');
INSERT INTO functional_areas VALUES('func21', 'Packaging Development');
INSERT INTO functional_areas VALUES('func22', 'Production Engineering/Maintenance');
INSERT INTO functional_areas VALUES('func23', 'Project Management/Site Engineers');
INSERT INTO functional_areas VALUES('func24', 'Purchase/SCM');
INSERT INTO functional_areas VALUES('func25', 'R&amp;D/Engineering Design');
INSERT INTO functional_areas VALUES('func26', 'Sales');
INSERT INTO functional_areas VALUES('func27', 'Security');
INSERT INTO functional_areas VALUES('func28', 'Teaching/Education/Language Specialist');
INSERT INTO functional_areas VALUES('func29', 'Telecom/IT-Hardware/Tech. Staff/Support');
INSERT INTO functional_areas VALUES('func30', 'Top Management');
INSERT INTO functional_areas VALUES('func31', 'Management Consultant');
INSERT INTO functional_areas VALUES('func32', 'Healthcare Technician');
INSERT INTO functional_areas VALUES('func33', 'Service Engineering');
INSERT INTO functional_areas VALUES('func34', 'Manufacturing');
INSERT INTO functional_areas VALUES('func35', 'Other');
commit;
#'id','name'

INSERT INTO industries VALUES('ind1', 'Fresh-No industry experience');
INSERT INTO industries VALUES('ind2', 'Accessories/Apparel/Fashion Design/Textiles/Garments');
INSERT INTO industries VALUES('ind3', 'Accounting/Consulting/Taxation');
INSERT INTO industries VALUES('ind4', 'Advertising/Event Mgmt/PR/MR');
INSERT INTO industries VALUES('ind5', 'Agriculture/Dairy Technology');
INSERT INTO industries VALUES('ind6', 'Airlines/Hotels/Hospitality/Travel/Restaurants');
INSERT INTO industries VALUES('ind7', 'Architectural Services/Interior Designing');
INSERT INTO industries VALUES('ind8', 'Auto Ancillary/Automobile Components');
INSERT INTO industries VALUES('ind9', 'Banking/Financial Services/Stock Broking');
INSERT INTO industries VALUES('ind10', 'Bio-Tech./Pharma/Life Sciences/Clinical Research');
INSERT INTO industries VALUES('ind11', 'Cement/Construction/Engineering/Metals/Steel/Iron');
INSERT INTO industries VALUES('ind12', 'Chemicals/Petro Chemicals/Plastics/ Rubber');
INSERT INTO industries VALUES('ind13', 'Consumer FMCG/Foods/Beverages');
INSERT INTO industries VALUES('ind14', 'Consumer Goods-Durables/Home Appliances');
INSERT INTO industries VALUES('ind15', 'Courier/Freight/Transportation/ Warehousing');
INSERT INTO industries VALUES('ind16', 'CRM/IT Enabled Services/BPO/Medical Transcription');
INSERT INTO industries VALUES('ind17', 'Defence');
INSERT INTO industries VALUES('ind18', 'Education/Training/Teaching');
INSERT INTO industries VALUES('ind19', 'Employment Firms/Recruitment Services Firms');
INSERT INTO industries VALUES('ind20', 'Entertainment/Media/Publishing/Dotcom');
INSERT INTO industries VALUES('ind21', 'Export Houses');
INSERT INTO industries VALUES('ind22', 'Fertilizers/Pesticides');
INSERT INTO industries VALUES('ind23', 'Gems &amp; Jewellery');
INSERT INTO industries VALUES('ind24', 'IT-Hardware/Networking');
INSERT INTO industries VALUES('ind25', 'Healthcare/Medicine');
INSERT INTO industries VALUES('ind26', 'Insurance');
INSERT INTO industries VALUES('ind27', 'Law/Legal Firms');
INSERT INTO industries VALUES('ind28', 'Machinery/Equipment Manufacturing/Industrial Products');
INSERT INTO industries VALUES('ind29', 'NGO/Social Services');
INSERT INTO industries VALUES('ind30', 'Office Automation/Equipment');
INSERT INTO industries VALUES('ind31', 'Paper');
INSERT INTO industries VALUES('ind32', 'Petroleum/Oil&amp;Gas/Projects');
INSERT INTO industries VALUES('ind33', 'Printing/Packaging');
INSERT INTO industries VALUES('ind34', 'Real Estate');
INSERT INTO industries VALUES('ind35', 'Retailing');
INSERT INTO industries VALUES('ind36', 'Security/Law Enforcement');
INSERT INTO industries VALUES('ind37', 'Shipping/Marine');
INSERT INTO industries VALUES('ind38', 'Software Services');
INSERT INTO industries VALUES('ind39', 'Telecom Equipment/Electronics/SemiConductors');
INSERT INTO industries VALUES('ind40', 'Telecom/ISP');
INSERT INTO industries VALUES('ind41', 'Non-conventional energy');
INSERT INTO industries VALUES('ind42', 'Power');
INSERT INTO industries VALUES('ind43', 'Infrastructure');
INSERT INTO industries VALUES('ind44', 'Automobile');
INSERT INTO industries VALUES('ind45', 'Tyres');
INSERT INTO industries VALUES('ind46', 'Other');
commit;
#'id','name'

INSERT INTO institutes VALUES('ins1', 'Aligarh Muslim University');
INSERT INTO institutes VALUES('ins2', 'AIIMS, Delhi');
INSERT INTO institutes VALUES('ins3', 'Allahabad University');
INSERT INTO institutes VALUES('ins4', 'Amaravati University');
INSERT INTO institutes VALUES('ins5', 'Amity Business School');
INSERT INTO institutes VALUES('ins6', 'Andhra University');
INSERT INTO institutes VALUES('ins7', 'Anna University');
INSERT INTO institutes VALUES('ins8', 'Annamalai University');
INSERT INTO institutes VALUES('ins9', 'Apeejay School Of Marketing');
INSERT INTO institutes VALUES('ins10', 'Aptech');
INSERT INTO institutes VALUES('ins11', 'Armed Forces Medical College, Pune');
INSERT INTO institutes VALUES('ins12', 'BHU, Varanasi');
INSERT INTO institutes VALUES('ins13', 'Bangalore Medical College');
INSERT INTO institutes VALUES('ins14', 'Bangalore University');
INSERT INTO institutes VALUES('ins15', 'Bhartiyar University, Coimbatore');
INSERT INTO institutes VALUES('ins16', 'BITS, Pilani');
INSERT INTO institutes VALUES('ins17', 'Birla Inst. of Technology, Ranchi');
INSERT INTO institutes VALUES('ins18', 'Board of Technical Education');
INSERT INTO institutes VALUES('ins19', 'Calicut University');
INSERT INTO institutes VALUES('ins20', 'Calcutta University');
INSERT INTO institutes VALUES('ins21', 'CDAC');
INSERT INTO institutes VALUES('ins22', 'Chennai University');
INSERT INTO institutes VALUES('ins23', 'Christian College, Lucknow');
INSERT INTO institutes VALUES('ins24', 'Christian Medical College, Vellore');
INSERT INTO institutes VALUES('ins25', 'College of Art, New Delhi');
INSERT INTO institutes VALUES('ins26', 'Delhi College of Engineering, New Delhi');
INSERT INTO institutes VALUES('ins27', 'Delhi University - Daulat Ram College');
INSERT INTO institutes VALUES('ins28', 'Delhi University - Hansraj College');
INSERT INTO institutes VALUES('ins29', 'Delhi University - Hindu College');
INSERT INTO institutes VALUES('ins30', 'Delhi University - LSR College');
INSERT INTO institutes VALUES('ins31', 'Delhi University - Miranda House');
INSERT INTO institutes VALUES('ins32', 'Delhi University - SRCC');
INSERT INTO institutes VALUES('ins33', 'Delhi University - St Stephens College');
INSERT INTO institutes VALUES('ins34', 'Delhi University - Other');
INSERT INTO institutes VALUES('ins35', 'Devi Ahilya Vishwa Vidhyalaya, Indore');
INSERT INTO institutes VALUES('ins36', 'DOEACC');
INSERT INTO institutes VALUES('ins37', 'Faculty Of Management Studies');
INSERT INTO institutes VALUES('ins38', 'Fergusson College, Pune');
INSERT INTO institutes VALUES('ins39', 'Film&amp;Television Inst. of India, Pune');
INSERT INTO institutes VALUES('ins40', 'Goa University');
INSERT INTO institutes VALUES('ins41', 'Hyderabad University');
INSERT INTO institutes VALUES('ins42', 'ICFAI, Hyderabad');
INSERT INTO institutes VALUES('ins43', 'ICSI');
INSERT INTO institutes VALUES('ins44', 'ICWAI');
INSERT INTO institutes VALUES('ins45', 'IGNOU');
INSERT INTO institutes VALUES('ins46', 'IIIT, Hyderabad');
INSERT INTO institutes VALUES('ins47', 'IISWBM Calcutta');
INSERT INTO institutes VALUES('ins48', 'IIT Chennai');
INSERT INTO institutes VALUES('ins49', 'IIT Delhi');
INSERT INTO institutes VALUES('ins50', 'IIT Guwahati');
INSERT INTO institutes VALUES('ins51', 'IIT Kanpur');
INSERT INTO institutes VALUES('ins52', 'IIT Kharagpur');
INSERT INTO institutes VALUES('ins53', 'IIT Mumbai');
INSERT INTO institutes VALUES('ins54', 'IIT Roorkee');
INSERT INTO institutes VALUES('ins55', 'Indian Inst. of Hotel Management, Aurangabad');
INSERT INTO institutes VALUES('ins56', 'Indian Inst. of Mass Communication, New Delhi');
INSERT INTO institutes VALUES('ins57', 'Indian Statistical Institute, Kolkatta');
INSERT INTO institutes VALUES('ins58', 'Inst. of Hotel Management');
INSERT INTO institutes VALUES('ins59', 'Inst. of Chartered Accountant of India');
INSERT INTO institutes VALUES('ins60', 'JJ Inst. of Applied Art, Mumbai');
INSERT INTO institutes VALUES('ins61', 'Jamia Milia Islamia');
INSERT INTO institutes VALUES('ins62', 'Jawahar Lal Nehru University');
INSERT INTO institutes VALUES('ins63', 'Jipmer, Pondicherry');
INSERT INTO institutes VALUES('ins64', 'Kanpur University');
INSERT INTO institutes VALUES('ins65', 'Karanataka University');
INSERT INTO institutes VALUES('ins66', 'Kasturba Medical College, Manipal');
INSERT INTO institutes VALUES('ins67', 'Kerala University');
INSERT INTO institutes VALUES('ins68', 'King Edward Medical College, Mumbai');
INSERT INTO institutes VALUES('ins69', 'Kurukshetra University');
INSERT INTO institutes VALUES('ins70', 'Kuvempu University, Karnataka');
INSERT INTO institutes VALUES('ins71', 'Lady Hardinge Medical College, Delhi');
INSERT INTO institutes VALUES('ins72', 'Loyala College, Chennai');
INSERT INTO institutes VALUES('ins73', 'Lucknow University');
INSERT INTO institutes VALUES('ins74', 'MS University, Baroda');
INSERT INTO institutes VALUES('ins75', 'Madras Christian College, Chennai');
INSERT INTO institutes VALUES('ins76', 'Madras Medical College, Chennai');
INSERT INTO institutes VALUES('ins77', 'Madurai Kamaraj University');
INSERT INTO institutes VALUES('ins78', 'Mahatma Gandhi University');
INSERT INTO institutes VALUES('ins79', 'Mangalore University');
INSERT INTO institutes VALUES('ins80', 'Maulana Azad Medical College, Delhi');
INSERT INTO institutes VALUES('ins81', 'Mumbai University');
INSERT INTO institutes VALUES('ins82', 'Nagarjuna University');
INSERT INTO institutes VALUES('ins83', 'Nagpur University');
INSERT INTO institutes VALUES('ins84', 'National Inst. of Design, Ahmedabad');
INSERT INTO institutes VALUES('ins85', 'National Inst. of Engineering');
INSERT INTO institutes VALUES('ins86', 'National Inst. of Fashion Technology');
INSERT INTO institutes VALUES('ins87', 'NIIT');
INSERT INTO institutes VALUES('ins88', 'North Maharashtra University');
INSERT INTO institutes VALUES('ins89', 'Oberoi Centre for Learning&amp;Development');
INSERT INTO institutes VALUES('ins90', 'Osmania University');
INSERT INTO institutes VALUES('ins91', 'Pondicherry University');
INSERT INTO institutes VALUES('ins92', 'Pragathi Mahavidyalaya, Hyderabad');
INSERT INTO institutes VALUES('ins93', 'Presidency College, Chennai');
INSERT INTO institutes VALUES('ins94', 'Presidency College, Kolkatta');
INSERT INTO institutes VALUES('ins95', 'PSG Coimbatore');
INSERT INTO institutes VALUES('ins96', 'Pune University');
INSERT INTO institutes VALUES('ins97', 'Punjab Technical University');
INSERT INTO institutes VALUES('ins98', 'Punjab University');
INSERT INTO institutes VALUES('ins99', 'RV College Of Engineering');
INSERT INTO institutes VALUES('ins100', 'Rajasthan University');
INSERT INTO institutes VALUES('ins101', 'Ranchi University');
INSERT INTO institutes VALUES('ins102', 'NIT(MREC), Jaipur');
INSERT INTO institutes VALUES('ins103', 'NIT/REC, Bharathidasan');
INSERT INTO institutes VALUES('ins104', 'NIT/REC, Bhopal');
INSERT INTO institutes VALUES('ins105', 'NIT/REC, Calicut');
INSERT INTO institutes VALUES('ins106', 'NIT/REC, Durgapur');
INSERT INTO institutes VALUES('ins107', 'NIT/REC, Hamirpur');
INSERT INTO institutes VALUES('ins108', 'NIT/REC, Jalandhar');
INSERT INTO institutes VALUES('ins109', 'NIT/REC, Karnataka');
INSERT INTO institutes VALUES('ins110', 'NIT/REC, Kurukshetra');
INSERT INTO institutes VALUES('ins111', 'NIT/REC, Motilal Nehru, Allahabad');
INSERT INTO institutes VALUES('ins112', 'NIT/REC, Nagpur');
INSERT INTO institutes VALUES('ins113', 'NIT/REC, Rourkela');
INSERT INTO institutes VALUES('ins114', 'NIT/REC, Silchar');
INSERT INTO institutes VALUES('ins115', 'NIT/REC, Srinagar');
INSERT INTO institutes VALUES('ins116', 'NIT/REC, Surat');
INSERT INTO institutes VALUES('ins117', 'NIT/REC, Suratkal');
INSERT INTO institutes VALUES('ins118', 'NIT/REC, Tiruchirappalli');
INSERT INTO institutes VALUES('ins119', 'NIT/REC, Warangal');
INSERT INTO institutes VALUES('ins120', 'NIT/REC, Other');
INSERT INTO institutes VALUES('ins121', 'Sardar Patel University');
INSERT INTO institutes VALUES('ins122', 'School Of Planning&amp;Architecture');
INSERT INTO institutes VALUES('ins123', 'Shivaji University, Maharasthra');
INSERT INTO institutes VALUES('ins124', 'Sri Jayachamarajendran College of Engineering');
INSERT INTO institutes VALUES('ins125', 'Sri Venkateshwara University, Tirupati');
INSERT INTO institutes VALUES('ins126', 'St.Xaviers College, Kolkatta');
INSERT INTO institutes VALUES('ins127', 'St.Xaviers College, Mumbai');
INSERT INTO institutes VALUES('ins128', 'Stella Maris College, Chennai');
INSERT INTO institutes VALUES('ins129', 'Thapar Inst. of Engineering&amp;Technology');
INSERT INTO institutes VALUES('ins130', 'The National Law School, Bangalore');
INSERT INTO institutes VALUES('ins131', 'Welcome Group Grad. Sch. of Hotel Admin., Manipal');
INSERT INTO institutes VALUES('ins132', 'University of Mysore');
INSERT INTO institutes VALUES('ins133', 'University Vishveshvaraya College of Engineering');
INSERT INTO institutes VALUES('ins134', 'Vellore Engineering College');
INSERT INTO institutes VALUES('ins135', 'YMCA');
INSERT INTO institutes VALUES('ins136', 'Other');
commit;

#'id','recruiterid','employerid','designation','desc','refid','location','functionalarea','maxexp','minexp','keyword','criteria','qualification','renumeration','type','term','postdate','lastmoddate'

INSERT INTO jobs VALUES(
'j1','aks','c4','Ground Engineer','Needed a ground engineer for electronic circuit integration', 'grndeng201005','Hydrabad','',3,1,'','','BE(electrical)','','Permanent','Fulltime','10/20/2005', '');
INSERT INTO jobs VALUES(
'j2','psengupta','c5','Test Engineer','Software Test Engineer needed for a CMM Level 5 company.','testeng2005','Chennai','',5,1,'tester','Should know test runner and load runner','MCA, BE','','Permanent','Fulltime','10/20/2005', '');
INSERT INTO jobs VALUES(
'j3','psengupta','c6','Test Professional','Test professional needed for a J2EE project with US client.','testprof2005','Bangalore','',5,1,'tester','Should know test runner and load runner','BE, BSc, B.Tech','','Contract','Parttime','10/20/2005', '');
INSERT INTO jobs VALUES(
'j4','psengupta','c7','Software Developer','Should have sound knowledge in C++ and Unix.','swdevOct2005','Bangalore','',6,3,'C++','Knowledge in telecom domain is preferrable.','MCA, BE, B.Tech','Best in industry','Permanent','Fulltime','10/23/2005', '');
INSERT INTO jobs VALUES(
'j5','aks','c8','Project Manager','Should be able to handle a team of 25/30 people working in C, C++ on Unix. Should be conversant with ISO and CMM standards.','pm23102005','Kolkata','',10,7,'C, C++','Knowledge in networking is required.','MCA, BE, B.Tech','Best in industry','Permanent','Fulltime','10/23/2005', '');
INSERT INTO jobs VALUES(
'j6','aks','c2','Software Developer','Should have sound knowledge in Java J2SE1.4.','swdev101005','Mumbai','',3,1,'java','US B1 visa is preferred.','BE, Btech, MCA','','Contract','Fulltime','10/10/2005', '');
INSERT INTO jobs VALUES(
'j7','psengupta','c1','Senior Designer','Will have to work in a team of 10 as a lead designer.','swdes090905','Kolkata','',6,3,'.NET','Banking experience is preferred.','','','Permanent','Fulltime','9/9/2005', '');
INSERT INTO jobs VALUES(
'j8','aks','c3','Project Manager','Should be able to handle a team of 20 with a US based client.','swman080905','Delhi','',7,5,'j2ee','','MCA, BE','','Permanent','Parttime','8/9/2005', '');
commit;
#'id','name'

INSERT INTO locations VALUES('loc1', 'AP-Anantapur');
INSERT INTO locations VALUES('loc2', 'AP-Guntakal');
INSERT INTO locations VALUES('loc3', 'AP-Guntur');
INSERT INTO locations VALUES('loc4', 'AP-Hyderabad');
INSERT INTO locations VALUES('loc5', 'AP-Kurnool');
INSERT INTO locations VALUES('loc6', 'AP- Nellore');
INSERT INTO locations VALUES('loc7', 'AP-Nizamabad');
INSERT INTO locations VALUES('loc8', 'AP-Rajahmundry');
INSERT INTO locations VALUES('loc9', 'AP-Secunderabad');
INSERT INTO locations VALUES('loc10', 'AP-Tirupati');
INSERT INTO locations VALUES('loc11', 'AP-Vijayawada');
INSERT INTO locations VALUES('loc12', 'AP-Visakhapatnam');
INSERT INTO locations VALUES('loc13', 'AP-Warangal');
INSERT INTO locations VALUES('loc14', 'AP-Other');
INSERT INTO locations VALUES('loc15', 'Arunachal-Itanagar');
INSERT INTO locations VALUES('loc16', 'Arunachal-Other');
INSERT INTO locations VALUES('loc17', 'Assam-Guwahati');
INSERT INTO locations VALUES('loc18', 'Assam-Silchar');
INSERT INTO locations VALUES('loc19', 'Assam-Other');
INSERT INTO locations VALUES('loc20', 'Bihar-Bahgalpur');
INSERT INTO locations VALUES('loc21', 'Bihar-Patna');
INSERT INTO locations VALUES('loc22', 'Bihar-Other');
INSERT INTO locations VALUES('loc23', 'Chandigarh');
INSERT INTO locations VALUES('loc24', 'Chhattisgarh-Bhillai');
INSERT INTO locations VALUES('loc25', 'Chhattisgarh-Raipur');
INSERT INTO locations VALUES('loc26', 'Chhattisgarh-Other');
INSERT INTO locations VALUES('loc27', 'Dadra&amp;Nagar Haveli');
INSERT INTO locations VALUES('loc28', 'Daman&amp;Dui');
INSERT INTO locations VALUES('loc29', 'Delhi/NCR');
INSERT INTO locations VALUES('loc30', 'Goa');
INSERT INTO locations VALUES('loc31', 'Goa-Panaji');
INSERT INTO locations VALUES('loc32', 'Goa-Panjim');
INSERT INTO locations VALUES('loc33', 'Goa-Vasco Da Gama');
INSERT INTO locations VALUES('loc34', 'Goa-Other');
INSERT INTO locations VALUES('loc35', 'Guj-Ahmedabad');
INSERT INTO locations VALUES('loc36', 'Guj-Anand Baroda');
INSERT INTO locations VALUES('loc37', 'Guj-Baroda');
INSERT INTO locations VALUES('loc38', 'Guj-Bharuch');
INSERT INTO locations VALUES('loc39', 'Guj-Bhavnagar');
INSERT INTO locations VALUES('loc40', 'Guj-Bhuj');
INSERT INTO locations VALUES('loc41', 'Guj-Gandhinagar');
INSERT INTO locations VALUES('loc42', 'Guj-Gir Jamnagar');
INSERT INTO locations VALUES('loc43', 'Guj-Jamnagar');
INSERT INTO locations VALUES('loc44', 'Guj-Kandla');
INSERT INTO locations VALUES('loc45', 'Guj-Porbandar');
INSERT INTO locations VALUES('loc46', 'Guj-Rajkot Surat');
INSERT INTO locations VALUES('loc47', 'Guj-Surat');
INSERT INTO locations VALUES('loc48', 'Guj-Vadodara');
INSERT INTO locations VALUES('loc49', 'Guj-Other');
INSERT INTO locations VALUES('loc50', 'Haryana-Ambala');
INSERT INTO locations VALUES('loc51', 'Haryana-Faridabad');
INSERT INTO locations VALUES('loc52', 'Haryana-Gurgaon');
INSERT INTO locations VALUES('loc53', 'Haryana-Karnal');
INSERT INTO locations VALUES('loc54', 'Haryana-Kurukshetra');
INSERT INTO locations VALUES('loc55', 'Haryana-Panipat');
INSERT INTO locations VALUES('loc56', 'Haryana-Rohtak');
INSERT INTO locations VALUES('loc57', 'Haryana-Other');
INSERT INTO locations VALUES('loc58', 'HP-Dalhousie');
INSERT INTO locations VALUES('loc59', 'HP-Dharmsala');
INSERT INTO locations VALUES('loc60', 'HP-Kulu/Manali');
INSERT INTO locations VALUES('loc61', 'HP-Shimla');
INSERT INTO locations VALUES('loc62', 'HP-Other');
INSERT INTO locations VALUES('loc63', 'J&amp;K-Jammu');
INSERT INTO locations VALUES('loc64', 'J&amp;K-Srinagar');
INSERT INTO locations VALUES('loc65', 'J&amp;K-Other');
INSERT INTO locations VALUES('loc66', 'Jharkhand-Bokaro');
INSERT INTO locations VALUES('loc67', 'Jharkhand-Dhanbad');
INSERT INTO locations VALUES('loc68', 'Jharkhand-Jamshedpur');
INSERT INTO locations VALUES('loc69', 'Jharkhand-Ranchi');
INSERT INTO locations VALUES('loc70', 'Jharkhand-Other');
INSERT INTO locations VALUES('loc71', 'Karnataka-Bangalore');
INSERT INTO locations VALUES('loc72', 'Karnataka-Belgaum');
INSERT INTO locations VALUES('loc73', 'Karnataka-Bellary');
INSERT INTO locations VALUES('loc74', 'Karnataka-Bidar');
INSERT INTO locations VALUES('loc75', 'Karnataka-Dharwad');
INSERT INTO locations VALUES('loc76', 'Karnataka-Gulbarga');
INSERT INTO locations VALUES('loc77', 'Karnataka-Hubli');
INSERT INTO locations VALUES('loc78', 'Karnataka-Kolar');
INSERT INTO locations VALUES('loc79', 'Karnataka-Mangalore');
INSERT INTO locations VALUES('loc80', 'Karnataka-Mysore');
INSERT INTO locations VALUES('loc81', 'Karnataka-Other');
INSERT INTO locations VALUES('loc82', 'Kerala-Calicut');
INSERT INTO locations VALUES('loc83', 'Kerala-Cochin');
INSERT INTO locations VALUES('loc84', 'Kerala-Ernakulam');
INSERT INTO locations VALUES('loc85', 'Kerala-Kochi');
INSERT INTO locations VALUES('loc86', 'Kerala-Kollam');
INSERT INTO locations VALUES('loc87', 'Kerala-Kottayam');
INSERT INTO locations VALUES('loc88', 'Kerala-Kozhikode');
INSERT INTO locations VALUES('loc89', 'Kerala-Palakkad');
INSERT INTO locations VALUES('loc90', 'Kerala-Palghat');
INSERT INTO locations VALUES('loc91', 'Kerala-Thrissur');
INSERT INTO locations VALUES('loc92', 'Kerala-Trivandrum');
INSERT INTO locations VALUES('loc93', 'Kerala-Other');
INSERT INTO locations VALUES('loc94', 'MP-Bhopal');
INSERT INTO locations VALUES('loc95', 'MP-Gwalior');
INSERT INTO locations VALUES('loc96', 'MP-Indore');
INSERT INTO locations VALUES('loc97', 'MP-Jabalpur');
INSERT INTO locations VALUES('loc98', 'MP-Ujjain');
INSERT INTO locations VALUES('loc99', 'MP-Other');
INSERT INTO locations VALUES('loc101', 'Maharashtra-Ahmednagar');
INSERT INTO locations VALUES('loc102', 'Maharashtra-Aurangabad');
INSERT INTO locations VALUES('loc103', 'Maharashtra-Jalgaon');
INSERT INTO locations VALUES('loc104', 'Maharashtra-Kolhapur');
INSERT INTO locations VALUES('loc105', 'Maharashtra-Mumbai');
INSERT INTO locations VALUES('loc106', 'Maharashtra-Nagpur');
INSERT INTO locations VALUES('loc107', 'Maharashtra-Nasik');
INSERT INTO locations VALUES('loc108', 'Maharashtra-Pune');
INSERT INTO locations VALUES('loc109', 'Maharashtra-Sholapur');
INSERT INTO locations VALUES('loc110', 'Maharashtra-Other');
INSERT INTO locations VALUES('loc111', 'Manipur-Imphal');
INSERT INTO locations VALUES('loc112', 'Manipur-Other');
INSERT INTO locations VALUES('loc113', 'Meghalaya-Shillong');
INSERT INTO locations VALUES('loc114', 'Meghalaya-Other');
INSERT INTO locations VALUES('loc115', 'Miz.-Aizawal');
INSERT INTO locations VALUES('loc116', 'Miz.-Other');
INSERT INTO locations VALUES('loc117', 'Nagaland-Dimapur');
INSERT INTO locations VALUES('loc118', 'Nagaland-Other');
INSERT INTO locations VALUES('loc119', 'Orissa-Bhubaneshwar');
INSERT INTO locations VALUES('loc120', 'Orissa-Cuttack');
INSERT INTO locations VALUES('loc121', 'Orissa-Paradeep');
INSERT INTO locations VALUES('loc122', 'Orissa-Puri');
INSERT INTO locations VALUES('loc123', 'Orissa-Rourkela');
INSERT INTO locations VALUES('loc124', 'Orissa-Other');
INSERT INTO locations VALUES('loc125', 'Pondicherry');
INSERT INTO locations VALUES('loc126', 'Punjab-Amritsar');
INSERT INTO locations VALUES('loc127', 'Punjab-Jalandhar');
INSERT INTO locations VALUES('loc128', 'Punjab-Ludhiana');
INSERT INTO locations VALUES('loc129', 'Punjab-Mohali');
INSERT INTO locations VALUES('loc130', 'Punjab-Pathankot');
INSERT INTO locations VALUES('loc131', 'Punjab-Patiala');
INSERT INTO locations VALUES('loc132', 'Punjab-Other');
INSERT INTO locations VALUES('loc133', 'Raj.-Ajmer');
INSERT INTO locations VALUES('loc134', 'Raj.-Jaipur');
INSERT INTO locations VALUES('loc135', 'Raj.-Jaisalmer');
INSERT INTO locations VALUES('loc136', 'Raj.-Jodhpur');
INSERT INTO locations VALUES('loc137', 'Raj.-Kota');
INSERT INTO locations VALUES('loc138', 'Raj.-Udaipur');
INSERT INTO locations VALUES('loc139', 'Raj.-Other');
INSERT INTO locations VALUES('loc140', 'Sikkim-Gangtok');
INSERT INTO locations VALUES('loc141', 'Sikkim-Other');
INSERT INTO locations VALUES('loc142', 'TN-Chennai');
INSERT INTO locations VALUES('loc143', 'TN-Coimbatore');
INSERT INTO locations VALUES('loc144', 'TN-Erode Hosur');
INSERT INTO locations VALUES('loc145', 'TN-Hosur');
INSERT INTO locations VALUES('loc146', 'TN-Madurai');
INSERT INTO locations VALUES('loc147', 'TN-Ooty Salem');
INSERT INTO locations VALUES('loc148', 'TN-Salem');
INSERT INTO locations VALUES('loc149', 'TN-Tirunelveli');
INSERT INTO locations VALUES('loc150', 'TN-Trichy');
INSERT INTO locations VALUES('loc151', 'TN-Vellore');
INSERT INTO locations VALUES('loc152', 'TN-Other');
INSERT INTO locations VALUES('loc153', 'Tripura-Agartala');
INSERT INTO locations VALUES('loc154', 'Tripura-Other');
INSERT INTO locations VALUES('loc155', 'UP-Agra Aligarh');
INSERT INTO locations VALUES('loc156', 'UP-Aligarh');
INSERT INTO locations VALUES('loc157', 'UP-Allahabad');
INSERT INTO locations VALUES('loc158', 'UP-Bareilly');
INSERT INTO locations VALUES('loc159', 'UP-Faizabad');
INSERT INTO locations VALUES('loc160', 'UP-Ghaziabad');
INSERT INTO locations VALUES('loc161', 'UP-Gorakhpur');
INSERT INTO locations VALUES('loc162', 'UP-Kanpur');
INSERT INTO locations VALUES('loc163', 'UP-Lucknow');
INSERT INTO locations VALUES('loc164', 'UP-Mathura');
INSERT INTO locations VALUES('loc165', 'UP-Meerut Noida');
INSERT INTO locations VALUES('loc166', 'UP-Noida');
INSERT INTO locations VALUES('loc167', 'UP-Varanasi');
INSERT INTO locations VALUES('loc168', 'UP-Other');
INSERT INTO locations VALUES('loc169', 'Uttaranchal-Dehradun');
INSERT INTO locations VALUES('loc170', 'Uttaranchal-Other');
INSERT INTO locations VALUES('loc171', 'WB-Durgapur');
INSERT INTO locations VALUES('loc172', 'WB-Kharagpur');
INSERT INTO locations VALUES('loc173', 'WB-Kolkata');
INSERT INTO locations VALUES('loc174', 'WB-Other');
INSERT INTO locations VALUES('loc175', 'Other');
commit;
#'ownerid','fname','lname','dob','gender','marital','lastmoddate','ownertype'

INSERT INTO personal_info VALUES(
'admin','Arindam','Das','9/9/1966','m','m','12-12-2005 22:15','u');
INSERT INTO personal_info VALUES(
'aks','Amit','Sharma','#-0#-0#','m','m','12-12-2005 22:15','r');
INSERT INTO personal_info VALUES(
'mroy','Meghna','Roy','1980-06-06','f','u','12-12-2005 22:19','j');
INSERT INTO personal_info VALUES(
'psen','Prabal','Sen','02-01-1988','m','u','11-20-2005 23:35','j');
INSERT INTO personal_info VALUES(
'res1','Ratula','Das','1985-11-04','f','u','2005-12-27 15:44','r');
INSERT INTO personal_info VALUES(
'res2','Biswarup','Chanda','1975-02-05','m','u','2005-12-27 15:45','r');
INSERT INTO personal_info VALUES(
'res4','Meghna','Roy','1980-06-06','f','u','12-12-2005 22:19','j');
INSERT INTO personal_info VALUES(
'tdas','Tirthankar','Das','12/9/1970','m','m','12-12-2005 22:15','u');
commit;
#'id','userid','title','experience','specializations','skills','currlocation', 'currcountry', 'preflocations','expectctc','expectctccurrency','expectjobtype','expectjobterm','objective','textual','file','remarks','visibility','responses','viewcount','postdate','lastmoddate','status','comments'

INSERT INTO resumes VALUES(
'res1','admin','Java Professional','3','Hotel management applications','Core Java, PLSQL Oracle, Servlet', '', '', 'India;USA;','400000','','p','f','To work in J2EE based project.','','Ratula_Resume.doc','USA onsite preferable','v','0','0','2005-11-20 23:50','2005-12-27 15:44','Called','');
INSERT INTO resumes VALUES(
'res2','admin','5 yreas in PHP','5','MIS application in Banking sector','PHP, MySQL, SQLServer', '', '', 'Austrailia;Germany;India;USA;','500000','','p','f','To work in financial sector',
'TomHanks
========
1.  Apollo13
2.  Catch me if u can
3.  Sleepless in Seatle
4.  Turner and hutch
5.  Saving private Ryan
6.  castaway
7.  You have got mail
8.  Magnolia

My Choice
=========
1.  Silence of the lambs
2.  Hannibal
3.  As good as it gets
4.  ET
5.  Free Willy
6.  Baby\&amp;#039;s dayout
7.  Unforgiven 
8.  Pulp Fiction
9.  Mc. cana\&amp;#039;s gold
10. Some \&amp;quot;Like\&amp;quot; It Hot (1959)
11. Star Wars (1977)
12. Sunset Boulevard (1950)
13. 2001: A Space Odyssey (1968)
14. Braveheart
15. Final destination
16. Gun Crazy','Biswarup ChandaCV1.doc','Any location in India is preferable','v','0','0','2005-11-20 23:56','2005-12-27 15:45','Round2','Good communication skills.');
INSERT INTO resumes VALUES(
'res3','aks','My Resume 1','5','','HRM', '', '', 'Austrailia;Germany;','110000','','p','f','','','','','v','0','0','2005-12-12 22:15','2005-12-12 22:15','New','');
INSERT INTO resumes VALUES(
'res4','mroy','Meghna VB','6','VB apps','VB, SQLServer', '', '', 'Austrailia;Germany;India;UK;USA;','600000','','p','f','','','','','v','0','0','2005-12-12 22:16','2005-12-12 22:19','New','');
commit;
#'id','resumeid','title','titletype','subject','standard','year','institute','duration','percentage'
INSERT INTO resume_education VALUES(
'edu1','res1','PGDCA','dip','Computer Science','pg','2004','NIIT','2-3','88');
INSERT INTO resume_education VALUES(
'edu2','res1','BSc','deg','Chemistry','g','2000','North Bengal University','3-0','66');
INSERT INTO resume_education VALUES(
'edu3','res2','BTech','deg','Mechanical','g','1996','Shivpur BE college','4-0','77');
INSERT INTO resume_education VALUES(
'edu4','res2','MTech','deg','Mechanical','m','2002','Shivpur BE College','3-0','68');
INSERT INTO resume_education VALUES(
'edu5','res4','BTech','deg','Chemical','g','1998','Utkal University','4-0','67');
commit;
#'id','resumeid','company','industry','designation','responsibility','achievement','location','functionalarea','joining','leaving','seniority','ctc','ctccurrency','type','term','current'

INSERT INTO resume_experience VALUES(
'exp1','res1','Wipro Technologies','Software','Senior Software Consultant','Developing Serverside RFID apps','working with a US client','Bangalore','RFID application','2004-11-06','#-0#-0#','mt','500000','','p','f','y');
INSERT INTO resume_experience VALUES(
'exp2','res1','Skytech Solutions','Software','Software Engineer','Working as a developer','Worked in United Airlines projects','Bombay','Software Development','2000-04-05','2004-10-06','mt','300000','','p','f','n');
INSERT INTO resume_experience VALUES(
'exp3','res2','Techna Digital','Software','System Engineer','Developing HTML based GUI','Worked in 2 projects in banking and travel','Kolkata','Software Development','2004-02-02','#-0#-0#','mt','2000000','','c','f','y');
INSERT INTO resume_experience VALUES(
'exp4','res2','TCG Software Services','Software','Software Engineer','Developing HTML frontend with Javascript','worked on 2 projects','kolkata','Software Development','2000-04-03','2004-01-01','mt','200000','','p','f','n');
INSERT INTO resume_experience VALUES(
'exp5','res4','NIIT','Software','Quality Consultant','','','Mumbai','Software quality control','2000-02-04','#-0#-0#','mm','300000','','p','f','y');
commit;
#'id','resumeid','name','duration','expertlevel'

INSERT INTO resume_skills VALUES(
'skl1','res1','C++','2-4','3');
INSERT INTO resume_skills VALUES(
'skl2','res1','awk','2-3','2');
INSERT INTO resume_skills VALUES(
'skl3','res2','PHP','2-4','3');
INSERT INTO resume_skills VALUES(
'skl4','res2','HTML &amp; Javascript','3-1','4');
INSERT INTO resume_skills VALUES(
'skl5','res2','MySQL','2-0','3');
INSERT INTO resume_skills VALUES(
'skl6','res4','ISO2001','2-2','4');
INSERT INTO resume_skills VALUES(
'skl7','res4','CMM Level 5','1-6','2');
commit;

INSERT INTO specializations VALUES('spc1',   'Accounting &amp; Finance');
INSERT INTO specializations VALUES('spc2',   'Administration');
INSERT INTO specializations VALUES('spc3',   'Customer Service');
INSERT INTO specializations VALUES('spc4',   'Human Resources');
INSERT INTO specializations VALUES('spc5',   'Information Systems');
INSERT INTO specializations VALUES('spc6',   'Marketing');
INSERT INTO specializations VALUES('spc7',   'Operations');
INSERT INTO specializations VALUES('spc8',   'PR/Advertising');
INSERT INTO specializations VALUES('spc9',   'Sales');
INSERT INTO specializations VALUES('spc10',  'Audit &amp; Risk');
INSERT INTO specializations VALUES('spc11',  'Bookeeping');
INSERT INTO specializations VALUES('spc12',  'Chartered Accountant/CPA');
INSERT INTO specializations VALUES('spc13',  'Company Secretary');
INSERT INTO specializations VALUES('spc14',  'Cost Accountanting');
INSERT INTO specializations VALUES('spc15',  'Import/Export Accounting');
INSERT INTO specializations VALUES('spc16',  'Securities');
INSERT INTO specializations VALUES('spc17',  'Taxation');
INSERT INTO specializations VALUES('spc18',  'Direct Sales');
INSERT INTO specializations VALUES('spc19',  'Commision Sales');
INSERT INTO specializations VALUES('spc20',  'Life Insurance');
INSERT INTO specializations VALUES('spc21',  'Automobile Insurance');
INSERT INTO specializations VALUES('spc22',  'Health Insurance');
INSERT INTO specializations VALUES('spc23',  'Business Insurance');
INSERT INTO specializations VALUES('spc24',  'Travel Insurance');
INSERT INTO specializations VALUES('spc25',  'Other Insurance');
INSERT INTO specializations VALUES('spc26',  'Banquet Sales');
INSERT INTO specializations VALUES('spc27',  'Bartender');
INSERT INTO specializations VALUES('spc28',  'Cabin Crew');
INSERT INTO specializations VALUES('spc29',  'Catering/Convention');
INSERT INTO specializations VALUES('spc30',  'Chef');
INSERT INTO specializations VALUES('spc31',  'Concierge');
INSERT INTO specializations VALUES('spc32',  'Conferences &amp; Banqueting');
INSERT INTO specializations VALUES('spc33',  'Culinary/Kitchen');
INSERT INTO specializations VALUES('spc34',  'Front Desk');
INSERT INTO specializations VALUES('spc35',  'Ground Staff');
INSERT INTO specializations VALUES('spc36',  'Health Club');
INSERT INTO specializations VALUES('spc37',  'Host/Hostess');
INSERT INTO specializations VALUES('spc38',  'Housekeeping');
INSERT INTO specializations VALUES('spc39',  'Lobby/Duty');
INSERT INTO specializations VALUES('spc40',  'Masseur');
INSERT INTO specializations VALUES('spc41',  'Restaurant');
INSERT INTO specializations VALUES('spc42',  'Travel Desk');
INSERT INTO specializations VALUES('spc43',  'Waiters/ Waitresses');
INSERT INTO specializations VALUES('spc44',  'Business Content Developer');
INSERT INTO specializations VALUES('spc45',  'Business Editor');
INSERT INTO specializations VALUES('spc46',  'Chief of Bureau/Editor in Chief');
INSERT INTO specializations VALUES('spc47',  'Fashion Content Developer');
INSERT INTO specializations VALUES('spc48',  'Fashion Editor');
INSERT INTO specializations VALUES('spc49',  'Features Content Developer');
INSERT INTO specializations VALUES('spc50',  'Features Writer/Resident Writer');
INSERT INTO specializations VALUES('spc51',  'Features Editor');
INSERT INTO specializations VALUES('spc52',  'Freelance Journalist');
INSERT INTO specializations VALUES('spc53',  'Intnl Business Editor');
INSERT INTO specializations VALUES('spc54',  'Investigative Journalist');
INSERT INTO specializations VALUES('spc55',  'IT/Technical Content Developer');
INSERT INTO specializations VALUES('spc56',  'IT/Technical Editor');
INSERT INTO specializations VALUES('spc57',  'Managing Editor');
INSERT INTO specializations VALUES('spc58',  'Political Content Developer');
INSERT INTO specializations VALUES('spc59',  'Political Editor');
INSERT INTO specializations VALUES('spc60',  'Principal Correspondent');
INSERT INTO specializations VALUES('spc61',  'Proof Reader');
INSERT INTO specializations VALUES('spc62',  'Sports Content Developer');
INSERT INTO specializations VALUES('spc63',  'Sports Editor');
INSERT INTO specializations VALUES('spc64',  'Back Office');
INSERT INTO specializations VALUES('spc65',  'Credit Control &amp; Collections');
INSERT INTO specializations VALUES('spc66',  'Debt Instrument');
INSERT INTO specializations VALUES('spc67',  'Derivatives');
INSERT INTO specializations VALUES('spc68',  'Finance/Budgeting');
INSERT INTO specializations VALUES('spc69',  'Financial Analysis');
INSERT INTO specializations VALUES('spc70',  'Forex');
INSERT INTO specializations VALUES('spc71',  'Funds Management');
INSERT INTO specializations VALUES('spc72',  'Investment Banking');
INSERT INTO specializations VALUES('spc73',  'Investor Relationship');
INSERT INTO specializations VALUES('spc74',  'Loan/Mortgage');
INSERT INTO specializations VALUES('spc75',  'Money Markets');
INSERT INTO specializations VALUES('spc76',  'Rating Services');
INSERT INTO specializations VALUES('spc77',  'Retail Finance');
INSERT INTO specializations VALUES('spc78',  'Shares Services');
INSERT INTO specializations VALUES('spc79',  'Treasury Operations');
INSERT INTO specializations VALUES('spc80',  'Business Process Reengineering');
INSERT INTO specializations VALUES('spc81',  'Business Analysis');
INSERT INTO specializations VALUES('spc82',  'Business Case Modelling');
INSERT INTO specializations VALUES('spc83',  'Business Strategy');
INSERT INTO specializations VALUES('spc84',  'Channel Partnerships');
INSERT INTO specializations VALUES('spc85',  'Corporate Planning/Strategy');
INSERT INTO specializations VALUES('spc86',  'Cost Reduction');
INSERT INTO specializations VALUES('spc87',  'Feasibility Studies');
INSERT INTO specializations VALUES('spc88',  'Industry Review');
INSERT INTO specializations VALUES('spc89',  'Joint Ventures');
INSERT INTO specializations VALUES('spc90',  'Management Audit');
INSERT INTO specializations VALUES('spc91',  'Mergers &amp; Acquisitions');
INSERT INTO specializations VALUES('spc92',  'Organization Development');
INSERT INTO specializations VALUES('spc93',  'Organization Structuring');
INSERT INTO specializations VALUES('spc94',  'Outside Consultant');
INSERT INTO specializations VALUES('spc95',  'Policy Development');
INSERT INTO specializations VALUES('spc96',  'Profit Improvement');
INSERT INTO specializations VALUES('spc97',  'Research Associate');
INSERT INTO specializations VALUES('spc98',  'Risk Management');
INSERT INTO specializations VALUES('spc99',  'Strategic Alliances');
INSERT INTO specializations VALUES('spc100', 'TQM');
INSERT INTO specializations VALUES('spc101', 'Turnaround Management');
INSERT INTO specializations VALUES('spc102', 'Business Consulting');
INSERT INTO specializations VALUES('spc103', 'Environmental Consulting');
INSERT INTO specializations VALUES('spc104', 'Freelance Artist');
INSERT INTO specializations VALUES('spc105', 'Freelance Copywriter');
INSERT INTO specializations VALUES('spc106', 'Freelance Editor');
INSERT INTO specializations VALUES('spc107', 'Freelance Graphic Designer');
INSERT INTO specializations VALUES('spc108', 'Freelance Illustrator');
INSERT INTO specializations VALUES('spc109', 'Freelance Paralegal');
INSERT INTO specializations VALUES('spc110', 'Freelance Photographer');
INSERT INTO specializations VALUES('spc111', 'Freelance Programmer');
INSERT INTO specializations VALUES('spc112', 'Freelance Proofreader');
INSERT INTO specializations VALUES('spc113', 'Freelance Web Designer');
INSERT INTO specializations VALUES('spc114', 'Freelance Writer');
INSERT INTO specializations VALUES('spc115', 'Graphic Design Consultant');
INSERT INTO specializations VALUES('spc116', 'IT Consultant');
INSERT INTO specializations VALUES('spc117', 'Management Consulting');
INSERT INTO specializations VALUES('spc118', 'Network Consulting');
INSERT INTO specializations VALUES('spc119', 'Software Consulting');
INSERT INTO specializations VALUES('spc120', 'Agent');
INSERT INTO specializations VALUES('spc121', 'Business Development');
INSERT INTO specializations VALUES('spc122', 'Documentation/Shipping');
INSERT INTO specializations VALUES('spc123', 'Floor');
INSERT INTO specializations VALUES('spc124', 'Liason');
INSERT INTO specializations VALUES('spc125', 'Merchandiser');
INSERT INTO specializations VALUES('spc126', 'Production');
INSERT INTO specializations VALUES('spc127', 'Purchase');
INSERT INTO specializations VALUES('spc128', 'QA/QC');
INSERT INTO specializations VALUES('spc129', 'Trader');
INSERT INTO specializations VALUES('spc130', 'Data entry');
INSERT INTO specializations VALUES('spc131', 'Personal/Secretarial');
INSERT INTO specializations VALUES('spc132', 'Receptionists');
INSERT INTO specializations VALUES('spc133', 'Stenography');
INSERT INTO specializations VALUES('spc134', 'Front Office');
INSERT INTO specializations VALUES('spc135', 'Compensation/Payroll');
INSERT INTO specializations VALUES('spc136', 'Consulting');
INSERT INTO specializations VALUES('spc137', 'Employee Relations');
INSERT INTO specializations VALUES('spc138', 'Industrial/Labour Relations');
INSERT INTO specializations VALUES('spc139', 'Performance Mgmt');
INSERT INTO specializations VALUES('spc140', 'Recruitment');
INSERT INTO specializations VALUES('spc141', 'Training &amp; Development');
INSERT INTO specializations VALUES('spc142', 'Event Planning');
INSERT INTO specializations VALUES('spc143', 'Office Management &amp; Coordination');
INSERT INTO specializations VALUES('spc144', 'Office Services');
INSERT INTO specializations VALUES('spc145', 'Staff Amenities');
INSERT INTO specializations VALUES('spc146', 'Supplies Co-ordination');
INSERT INTO specializations VALUES('spc147', 'Advisor/External Consulting');
INSERT INTO specializations VALUES('spc148', 'Corporate');
INSERT INTO specializations VALUES('spc149', 'Criminal');
INSERT INTO specializations VALUES('spc150', 'Employment &amp; Industrial Relations');
INSERT INTO specializations VALUES('spc151', 'Family');
INSERT INTO specializations VALUES('spc152', 'Financial Services');
INSERT INTO specializations VALUES('spc153', 'Insurance');
INSERT INTO specializations VALUES('spc154', 'Patent &amp; IP');
INSERT INTO specializations VALUES('spc155', 'Private Attorney/Lawyer');
INSERT INTO specializations VALUES('spc156', 'Property');
INSERT INTO specializations VALUES('spc157', 'Regulatory Affairs');
INSERT INTO specializations VALUES('spc158', 'Business Alliances');
INSERT INTO specializations VALUES('spc159', 'Business Analyst');
INSERT INTO specializations VALUES('spc160', 'Channel &amp; Segment Management');
INSERT INTO specializations VALUES('spc161', 'Corp Communications');
INSERT INTO specializations VALUES('spc162', 'Direct marketing');
INSERT INTO specializations VALUES('spc163', 'Events &amp; conferences');
INSERT INTO specializations VALUES('spc164', 'Market Research');
INSERT INTO specializations VALUES('spc165', 'Marketing Strategy');
INSERT INTO specializations VALUES('spc166', 'Product /Brand Management');
INSERT INTO specializations VALUES('spc167', 'Telemarketing');
INSERT INTO specializations VALUES('spc168', 'Trade Marketing');
INSERT INTO specializations VALUES('spc169', 'Admin Services/Medical Facilities');
INSERT INTO specializations VALUES('spc170', 'Aged Care');
INSERT INTO specializations VALUES('spc171', 'Anaesthesist');
INSERT INTO specializations VALUES('spc172', 'Cardiologist');
INSERT INTO specializations VALUES('spc173', 'Clinical Research');
INSERT INTO specializations VALUES('spc174', 'Critical Care');
INSERT INTO specializations VALUES('spc175', 'Dental');
INSERT INTO specializations VALUES('spc176', 'Dermatologist');
INSERT INTO specializations VALUES('spc177', 'Dietician/Nutritionist');
INSERT INTO specializations VALUES('spc178', 'Documentation/Medical Writing');
INSERT INTO specializations VALUES('spc179', 'ENT Specialist');
INSERT INTO specializations VALUES('spc180', 'General Practitioner');
INSERT INTO specializations VALUES('spc181', 'Gynaeocology');
INSERT INTO specializations VALUES('spc182', 'Hepatology');
INSERT INTO specializations VALUES('spc183', 'Lab/Medical Technician');
INSERT INTO specializations VALUES('spc184', 'Medical Imaging');
INSERT INTO specializations VALUES('spc185', 'Medical Officer');
INSERT INTO specializations VALUES('spc186', 'Medical Rep.');
INSERT INTO specializations VALUES('spc187', 'Medical Superintendent/Director');
INSERT INTO specializations VALUES('spc188', 'Microbiology');
INSERT INTO specializations VALUES('spc189', 'Natural Therapy');
INSERT INTO specializations VALUES('spc190', 'Nephrology');
INSERT INTO specializations VALUES('spc191', 'Neurology');
INSERT INTO specializations VALUES('spc192', 'Nursing');
INSERT INTO specializations VALUES('spc193', 'Occupational Therapy');
INSERT INTO specializations VALUES('spc194', 'Oncology');
INSERT INTO specializations VALUES('spc195', 'Opthamology');
INSERT INTO specializations VALUES('spc196', 'Orthopaedics');
INSERT INTO specializations VALUES('spc197', 'Other Healthcare');
INSERT INTO specializations VALUES('spc198', 'Paramedic');
INSERT INTO specializations VALUES('spc199', 'Pathology');
INSERT INTO specializations VALUES('spc200', 'Pediatrics');
INSERT INTO specializations VALUES('spc201', 'Pharmacy');
INSERT INTO specializations VALUES('spc202', 'Physiotherapy');
INSERT INTO specializations VALUES('spc203', 'Psychiatry');
INSERT INTO specializations VALUES('spc204', 'Radiology');
INSERT INTO specializations VALUES('spc205', 'Surgery');
INSERT INTO specializations VALUES('spc206', 'Account Services');
INSERT INTO specializations VALUES('spc207', 'Customer Service (Voice)');
INSERT INTO specializations VALUES('spc208', 'Customer Service (Web)');
INSERT INTO specializations VALUES('spc209', 'Medical Transcription');
INSERT INTO specializations VALUES('spc210', 'Migrations/ Transitions');
INSERT INTO specializations VALUES('spc211', 'Shift Supervision');
INSERT INTO specializations VALUES('spc212', 'Soft Skills Training');
INSERT INTO specializations VALUES('spc213', 'Technical/Process Training');
INSERT INTO specializations VALUES('spc214', 'Training');
INSERT INTO specializations VALUES('spc215', 'Transactions Processing');
INSERT INTO specializations VALUES('spc216', 'Voice &amp; Accent Training');
INSERT INTO specializations VALUES('spc217', 'Work Flow Analysis');
INSERT INTO specializations VALUES('spc218', 'Couriers');
INSERT INTO specializations VALUES('spc219', 'Customs');
INSERT INTO specializations VALUES('spc220', 'Distribution');
INSERT INTO specializations VALUES('spc221', 'eProcurement');
INSERT INTO specializations VALUES('spc222', 'Fleet Management');
INSERT INTO specializations VALUES('spc223', 'Freight Forwarders');
INSERT INTO specializations VALUES('spc224', 'Import/Export');
INSERT INTO specializations VALUES('spc225', 'Logistics');
INSERT INTO specializations VALUES('spc226', 'Packaging');
INSERT INTO specializations VALUES('spc227', 'Planning');
INSERT INTO specializations VALUES('spc228', 'Purchasing');
INSERT INTO specializations VALUES('spc229', 'Shipping');
INSERT INTO specializations VALUES('spc230', 'Supply Chain Management');
INSERT INTO specializations VALUES('spc231', 'Trade Finance');
INSERT INTO specializations VALUES('spc232', 'Vehicle rental/Leasing');
INSERT INTO specializations VALUES('spc233', 'Warehouse');
INSERT INTO specializations VALUES('spc234', 'Art');
INSERT INTO specializations VALUES('spc235', 'Client Servicing');
INSERT INTO specializations VALUES('spc236', 'Community Relations');
INSERT INTO specializations VALUES('spc237', 'Consumer PR &amp; Publicity');
INSERT INTO specializations VALUES('spc238', 'Copywriter');
INSERT INTO specializations VALUES('spc239', 'Event Management');
INSERT INTO specializations VALUES('spc240', 'Film Production');
INSERT INTO specializations VALUES('spc241', 'Graphic Design');
INSERT INTO specializations VALUES('spc242', 'Media Buying');
INSERT INTO specializations VALUES('spc243', 'Media Planning');
INSERT INTO specializations VALUES('spc244', 'Media Relations');
INSERT INTO specializations VALUES('spc245', 'Photographer');
INSERT INTO specializations VALUES('spc246', 'Printing');
INSERT INTO specializations VALUES('spc247', 'Public Relations');
INSERT INTO specializations VALUES('spc248', 'Road Shows');
INSERT INTO specializations VALUES('spc249', 'Strategy');
INSERT INTO specializations VALUES('spc250', 'Visualiser');
INSERT INTO specializations VALUES('spc251', 'Design Engineering');
INSERT INTO specializations VALUES('spc252', 'Environment');
INSERT INTO specializations VALUES('spc253', 'Factory Head');
INSERT INTO specializations VALUES('spc254', 'Health/Safety');
INSERT INTO specializations VALUES('spc255', 'Industrial Engineering');
INSERT INTO specializations VALUES('spc256', 'Inventory Control/ Materials');
INSERT INTO specializations VALUES('spc257', 'Product Development');
INSERT INTO specializations VALUES('spc258', 'Production/Manufacturing/Maintenance');
INSERT INTO specializations VALUES('spc259', 'Store Keeper/ Warehouse');
INSERT INTO specializations VALUES('spc260', 'Workman/Foreman/Technician');
INSERT INTO specializations VALUES('spc261', 'Quality Assurance');
INSERT INTO specializations VALUES('spc262', 'Quality Control');
INSERT INTO specializations VALUES('spc263', 'Quality Inspection');
INSERT INTO specializations VALUES('spc264', 'Six Sigma');
INSERT INTO specializations VALUES('spc265', 'Statistical Quality Control');
INSERT INTO specializations VALUES('spc266', 'Total Quality Management');
INSERT INTO specializations VALUES('spc267', 'Automotive');
INSERT INTO specializations VALUES('spc268', 'Aviation');
INSERT INTO specializations VALUES('spc269', 'CAD/CAE');
INSERT INTO specializations VALUES('spc270', 'Civil');
INSERT INTO specializations VALUES('spc271', 'Defence');
INSERT INTO specializations VALUES('spc272', 'Design');
INSERT INTO specializations VALUES('spc273', 'Electrical/Electronic');
INSERT INTO specializations VALUES('spc274', 'Food production');
INSERT INTO specializations VALUES('spc275', 'Geotechnical');
INSERT INTO specializations VALUES('spc276', 'Maintenance');
INSERT INTO specializations VALUES('spc277', 'Mechanical');
INSERT INTO specializations VALUES('spc278', 'Oil &amp; Gas');
INSERT INTO specializations VALUES('spc279', 'Paint Shop');
INSERT INTO specializations VALUES('spc280', 'Plant/Facilities/Maintenance');
INSERT INTO specializations VALUES('spc281', 'Press Shop');
INSERT INTO specializations VALUES('spc282', 'Print/Packaging');
INSERT INTO specializations VALUES('spc283', 'Process/Chemical');
INSERT INTO specializations VALUES('spc284', 'Project Management');
INSERT INTO specializations VALUES('spc285', 'Quality');
INSERT INTO specializations VALUES('spc286', 'Railway');
INSERT INTO specializations VALUES('spc287', 'Structural/Stress');
INSERT INTO specializations VALUES('spc288', 'Tool Room');
INSERT INTO specializations VALUES('spc289', 'Traffic/Transportation');
INSERT INTO specializations VALUES('spc290', 'Weld Shop');
INSERT INTO specializations VALUES('spc291', 'Analytical Chemistry');
INSERT INTO specializations VALUES('spc292', 'Basic Research');
INSERT INTO specializations VALUES('spc293', 'Bio/Pharma Informatics');
INSERT INTO specializations VALUES('spc294', 'Bio-Statistician');
INSERT INTO specializations VALUES('spc295', 'Bio-Technology Research');
INSERT INTO specializations VALUES('spc296', 'Chemical Research');
INSERT INTO specializations VALUES('spc297', 'Chemist');
INSERT INTO specializations VALUES('spc298', 'Data Management/ Statistics');
INSERT INTO specializations VALUES('spc299', 'Design Engineer');
INSERT INTO specializations VALUES('spc300', 'Documentation/ Medical Writing');
INSERT INTO specializations VALUES('spc301', 'Drug Regulation');
INSERT INTO specializations VALUES('spc302', 'Earth sciences');
INSERT INTO specializations VALUES('spc303', 'Forensics');
INSERT INTO specializations VALUES('spc304', 'Formulation');
INSERT INTO specializations VALUES('spc305', 'Genetics');
INSERT INTO specializations VALUES('spc306', 'Goods Manufacturing Practices (GMP)');
INSERT INTO specializations VALUES('spc307', 'Lab Staff');
INSERT INTO specializations VALUES('spc308', 'Laboratory work');
INSERT INTO specializations VALUES('spc309', 'Lecturing/teaching');
INSERT INTO specializations VALUES('spc310', 'Medical Representative');
INSERT INTO specializations VALUES('spc311', 'Molecular Biology');
INSERT INTO specializations VALUES('spc312', 'Nuclear Medicine');
INSERT INTO specializations VALUES('spc313', 'Nutrition');
INSERT INTO specializations VALUES('spc314', 'Pharmaceutical Research');
INSERT INTO specializations VALUES('spc315', 'Pharmacist/Chemist/Bio Chemist');
INSERT INTO specializations VALUES('spc316', 'Quality Assurance/ Control');
INSERT INTO specializations VALUES('spc317', 'Research Scientist');
INSERT INTO specializations VALUES('spc318', 'Technology Transfer Engineer');
INSERT INTO specializations VALUES('spc319', 'Toxicology');
INSERT INTO specializations VALUES('spc320', 'Accounting/Financial Products ');
INSERT INTO specializations VALUES('spc321', 'Advertising/Media/Arts');
INSERT INTO specializations VALUES('spc322', 'Real Estate Sales');
INSERT INTO specializations VALUES('spc323', 'Channel Sales');
INSERT INTO specializations VALUES('spc324', 'Engineering/Manufacturing');
INSERT INTO specializations VALUES('spc325', 'Corporate Sales');
INSERT INTO specializations VALUES('spc326', 'Counter Sales');
INSERT INTO specializations VALUES('spc327', 'Direct/Commission Sales');
INSERT INTO specializations VALUES('spc328', 'FMCG Sales');
INSERT INTO specializations VALUES('spc329', 'Healthcare Sales');
INSERT INTO specializations VALUES('spc330', 'Institutional Sales');
INSERT INTO specializations VALUES('spc331', 'International Business');
INSERT INTO specializations VALUES('spc332', 'IT/Telecommunications');
INSERT INTO specializations VALUES('spc333', 'Logistics/Transport/Supply');
INSERT INTO specializations VALUES('spc334', 'Medical/Pharmaceutical');
INSERT INTO specializations VALUES('spc335', 'Merchandising');
INSERT INTO specializations VALUES('spc336', 'Relationship/Account Servicing');
INSERT INTO specializations VALUES('spc337', 'Retail Sales');
INSERT INTO specializations VALUES('spc338', 'Technical Sales');
INSERT INTO specializations VALUES('spc339', 'Telesales');
INSERT INTO specializations VALUES('spc340', 'Service Engineers');
INSERT INTO specializations VALUES('spc341', 'Lecturer/Professor');
INSERT INTO specializations VALUES('spc342', 'Librarian');
INSERT INTO specializations VALUES('spc343', 'Private Tution');
INSERT INTO specializations VALUES('spc344', 'Special Education Teaching');
INSERT INTO specializations VALUES('spc345', 'Transcription');
INSERT INTO specializations VALUES('spc346', 'Translation');
INSERT INTO specializations VALUES('spc347', 'Business/Systems Analysis');
INSERT INTO specializations VALUES('spc348', 'Configuration/Release Mgmt');
INSERT INTO specializations VALUES('spc349', 'Data Warehousing');
INSERT INTO specializations VALUES('spc350', 'Database Administration (DBA)');
INSERT INTO specializations VALUES('spc351', 'Desktop Support');
INSERT INTO specializations VALUES('spc352', 'Embedded Technologies');
INSERT INTO specializations VALUES('spc353', 'ERP/CRM');
INSERT INTO specializations VALUES('spc354', 'Graphic Desiging/Animation');
INSERT INTO specializations VALUES('spc355', 'Internet/E-commerce');
INSERT INTO specializations VALUES('spc356', 'Legacy Systems');
INSERT INTO specializations VALUES('spc357', 'Mainframe');
INSERT INTO specializations VALUES('spc358', 'Mobile');
INSERT INTO specializations VALUES('spc359', 'Network Administration');
INSERT INTO specializations VALUES('spc360', 'Project Leader/ Project Manager');
INSERT INTO specializations VALUES('spc361', 'Software Engineer');
INSERT INTO specializations VALUES('spc362', 'System Administration');
INSERT INTO specializations VALUES('spc363', 'System Analyst/Tech Architect');
INSERT INTO specializations VALUES('spc364', 'Systems Programming');
INSERT INTO specializations VALUES('spc365', 'System Security');
INSERT INTO specializations VALUES('spc366', 'EDP/MIS');
INSERT INTO specializations VALUES('spc367', 'Technical Writing');
INSERT INTO specializations VALUES('spc368', 'Customer Support');
INSERT INTO specializations VALUES('spc369', 'Embedded Technology');
INSERT INTO specializations VALUES('spc370', 'GPRS');
INSERT INTO specializations VALUES('spc371', 'GSM');
INSERT INTO specializations VALUES('spc372', 'H/W Installation/Maintenance');
INSERT INTO specializations VALUES('spc373', 'Hardware Design');
INSERT INTO specializations VALUES('spc374', 'Network Planning');
INSERT INTO specializations VALUES('spc375', 'RF Engineering');
INSERT INTO specializations VALUES('spc376', 'Security');
INSERT INTO specializations VALUES('spc377', 'Switching/Router');
INSERT INTO specializations VALUES('spc378', 'Trainer/Faculty');
INSERT INTO specializations VALUES('spc379', 'Others');
commit;
#'id','name'

INSERT INTO subjects VALUES('sub1',  'Anthropology');
INSERT INTO subjects VALUES('sub2',  'Arts &amp; Humanities');
INSERT INTO subjects VALUES('sub3',  'Communication');
INSERT INTO subjects VALUES('sub4',  'Economics');
INSERT INTO subjects VALUES('sub5',  'English');
INSERT INTO subjects VALUES('sub6',  'Film');
INSERT INTO subjects VALUES('sub7',  'Hindi');
INSERT INTO subjects VALUES('sub8',  'History');
INSERT INTO subjects VALUES('sub9',  'Journalism');
INSERT INTO subjects VALUES('sub10', 'Maths');
INSERT INTO subjects VALUES('sub11', 'Political Science');
INSERT INTO subjects VALUES('sub12', 'PR/ Advertising');
INSERT INTO subjects VALUES('sub13', 'Psychology');
INSERT INTO subjects VALUES('sub14', 'Sanskrit');
INSERT INTO subjects VALUES('sub15', 'Sociology');
INSERT INTO subjects VALUES('sub16', 'Statistics');
INSERT INTO subjects VALUES('sub17', 'Vocational Course');
INSERT INTO subjects VALUES('sub18', 'Fine/Applied Arts');
INSERT INTO subjects VALUES('sub19', 'Geography');
INSERT INTO subjects VALUES('sub20', 'Philosophy');
INSERT INTO subjects VALUES('sub21', 'Music');
INSERT INTO subjects VALUES('sub22', 'Languages(Indian)');
INSERT INTO subjects VALUES('sub23', 'Languages(International)');
INSERT INTO subjects VALUES('sub24', 'Commerce Pass');
INSERT INTO subjects VALUES('sub25', 'Commerce Honours');
INSERT INTO subjects VALUES('sub26', 'Aviation');
INSERT INTO subjects VALUES('sub27', 'Chemical');
INSERT INTO subjects VALUES('sub28', 'Civil');
INSERT INTO subjects VALUES('sub29', 'Ceramics');
INSERT INTO subjects VALUES('sub30', 'Commerce');
INSERT INTO subjects VALUES('sub31', 'Electrical');
INSERT INTO subjects VALUES('sub32', 'Electronics/Telecommunication');
INSERT INTO subjects VALUES('sub33', 'Environmental');
INSERT INTO subjects VALUES('sub34', 'Instrumentation');
INSERT INTO subjects VALUES('sub35', 'Mechanical');
INSERT INTO subjects VALUES('sub36', 'Mining');
INSERT INTO subjects VALUES('sub37', 'Petroleum');
INSERT INTO subjects VALUES('sub38', 'Paint/Oil');
INSERT INTO subjects VALUES('sub39', 'Plastics');
INSERT INTO subjects VALUES('sub40', 'Production/Industrial');
INSERT INTO subjects VALUES('sub41', 'Bio-Chemistry/Bio-Technology');
INSERT INTO subjects VALUES('sub42', 'Metallurgy');
INSERT INTO subjects VALUES('sub43', 'Textile');
INSERT INTO subjects VALUES('sub44', 'Agriculture');
INSERT INTO subjects VALUES('sub45', 'Other Engineering');
INSERT INTO subjects VALUES('sub46', 'Automobile');
INSERT INTO subjects VALUES('sub47', 'Biomedical');
INSERT INTO subjects VALUES('sub48', 'Energy');
INSERT INTO subjects VALUES('sub49', 'Marine');
INSERT INTO subjects VALUES('sub50', 'Mineral');
INSERT INTO subjects VALUES('sub51', 'Nuclear');
INSERT INTO subjects VALUES('sub52', 'Oceanography');
INSERT INTO subjects VALUES('sub53', 'Leather Technology');
INSERT INTO subjects VALUES('sub54', 'Pharmacy');
INSERT INTO subjects VALUES('sub55', 'Dairy Technology');
INSERT INTO subjects VALUES('sub56', 'Food Technology');
INSERT INTO subjects VALUES('sub57', 'Physics');
INSERT INTO subjects VALUES('sub58', 'Chemistry');
INSERT INTO subjects VALUES('sub59', 'Biology');
INSERT INTO subjects VALUES('sub60', 'Botany');
INSERT INTO subjects VALUES('sub61', 'Electronics');
INSERT INTO subjects VALUES('sub62', 'Environmental Science');
INSERT INTO subjects VALUES('sub63', 'Geology');
INSERT INTO subjects VALUES('sub64', 'Home Science');
INSERT INTO subjects VALUES('sub65', 'Microbiology');
INSERT INTO subjects VALUES('sub66', 'Nursing');
INSERT INTO subjects VALUES('sub67', 'Zoology');
INSERT INTO subjects VALUES('sub68', 'General');
INSERT INTO subjects VALUES('sub69', 'Law');
INSERT INTO subjects VALUES('sub70', 'Dentistry');
INSERT INTO subjects VALUES('sub71', 'Education');
INSERT INTO subjects VALUES('sub72', 'Hotel Management');
INSERT INTO subjects VALUES('sub73', 'Administration');
INSERT INTO subjects VALUES('sub74', 'Architecture');
INSERT INTO subjects VALUES('sub75', 'Medicine');
INSERT INTO subjects VALUES('sub76', 'Computers');
INSERT INTO subjects VALUES('sub77', 'Engineering');
INSERT INTO subjects VALUES('sub78', 'Fashion Designing');
INSERT INTO subjects VALUES('sub79', 'Interior Designing');
INSERT INTO subjects VALUES('sub80', 'Graphic/ Web Designing');
INSERT INTO subjects VALUES('sub81', 'Visual Arts');
INSERT INTO subjects VALUES('sub82', 'Export/Import');
INSERT INTO subjects VALUES('sub83', 'Insurance');
INSERT INTO subjects VALUES('sub84', 'Management');
INSERT INTO subjects VALUES('sub85', 'Tourism');
INSERT INTO subjects VALUES('sub86', 'Accountancy');
INSERT INTO subjects VALUES('sub87', 'Others');
commit;

#'id','password','type','secretq','secreta','regdate'
INSERT INTO users VALUES(
'admin','123','a','','','');
INSERT INTO users VALUES(
'aks','123','r','','','');
INSERT INTO users VALUES(
'mroy','123','j','','','');
INSERT INTO users VALUES(
'psen','123','j','','','');
INSERT INTO users VALUES(
'tdas','123','r','','','');
commit;
