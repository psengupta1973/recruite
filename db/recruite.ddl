mysql -uroot -ppassword
use mysql
DELETE FROM user WHERE User='recruite';
INSERT INTO user
VALUES('localhost','recruite',PASSWORD('password'),
'Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','','','','',0,0,0,0);
commit;
exit;
[Restart the server for this user to work.]
mysql -urecruite -ppassword

CREATE DATABASE IF NOT EXISTS recruite;
use recruite;

CREATE TABLE users 
(
   id		varchar(50)	PRIMARY KEY,
   password	varchar(50)	NULL,
   type		varchar(1)	NULL,
   secretq	varchar(100)	NULL,
   secreta	varchar(100)	NULL,
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
   industry	varchar(100)	NULL,
   strength	varchar(50)	NULL,
   turnover	varchar(50)	NULL,
   branches	int		NULL,
   basedin      varchar(100)	NULL,
   type		varchar(50)	NULL,
   standard     varchar(50)     NULL,
   advertiser   varchar(1)	NULL,
   logo		varchar(100)	NULL,
   url		varchar(100)	NULL
);

CREATE TABLE contacts 
(
   ownerid	varchar(50)	PRIMARY KEY,
   address	varchar(200)	NULL,
   city		varchar(100)	NULL,
   state	varchar(50)	NULL,
   zip		varchar(50)	NULL,
   country	varchar(100)	NULL,
   workphone	varchar(50)	NULL,
   homephone	varchar(50)	NULL,
   mobile	varchar(50)	NULL,
   fax		varchar(50)	NULL,
   email	varchar(100)	NOT NULL,
   url		varchar(100)	NULL,
   ownertype	varchar(1)	NULL
);

CREATE TABLE jobs 
(
   id			varchar(50)	PRIMARY KEY,
   recruiterid		varchar(50)	NULL,
   employerid		varchar(50)	NULL,
   designation		varchar(100)	NULL,
   descr		varchar(200)	NULL,
   refid		varchar(50)	NULL,
   location		varchar(100)	NULL,
   functionalarea	varchar(100)	NULL,
   maxexp		int		NULL,
   minexp		int		NULL,
   keyword		varchar(100)	NULL,
   criteria		varchar(100)	NULL,
   qualification	varchar(100)	NULL,
   renumeration		varchar(100)	NULL,
   type			varchar(50)	NULL,
   term			varchar(50)	NULL,
   postdate		varchar(20)	NULL,
   lasmoddate		varchar(20)	NULL
);

CREATE TABLE resumes 
(
   id			varchar(50)	PRIMARY KEY,
   userid		varchar(50)	NULL,
   title		varchar(100)	NULL,
   experience		varchar(50)	NULL,
   specializations	varchar(200)	NULL,
   skills		varchar(100)	NULL,
   currlocation		varchar(100)	NULL,
   currcountry		varchar(100)	NULL,
   preflocations	varchar(100)	NULL,
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
   fname		varchar(100)	NULL,
   lname		varchar(100)	NULL,
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
   title	varchar(100)	NULL,
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
   company		varchar(100)	NULL,
   industry		varchar(100)	NULL,
   designation		varchar(100)	NULL,
   responsibility	blob		NULL,
   achievement		blob		NULL,
   location		varchar(100)	NULL,
   functionalarea	varchar(100)	NULL,
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
   name		varchar(100)	NULL,
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
