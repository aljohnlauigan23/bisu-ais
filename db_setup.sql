-- CREATE user 'bisu'@'localhost' identified by 'B!su';
-- CREATE database bisu_ais;
-- USE bisu_ais;

--
-- Table structure for table courses
--
CREATE TABLE courses (
  Course_Key int(10) unsigned NOT NULL auto_increment,
  Course_Code char(15) NOT NULL,
  Course_Name char(255) NOT NULL,
  Department char(10) NOT NULL,
  PRIMARY KEY  (Course_Key),
  UNIQUE KEY tbl_unique (Course_Code)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- --------------------------------------------------------

--
-- Table structure for table batches
--
CREATE TABLE batches (
  Batch_Key int(10) unsigned NOT NULL auto_increment,
  Course_Key int(10) unsigned NOT NULL,
  Batch char(15) NOT NULL,
  PRIMARY KEY  (Batch_Key),
  UNIQUE KEY tbl_unique (Batch, Course_Key),
  KEY tbl_index1 (Course_Key)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- --------------------------------------------------------

--
-- Table structure for table users
--
CREATE TABLE users (
  User_Key int(10) unsigned NOT NULL auto_increment,
  User_Name char(100) NOT NULL,
  Password char(32) NOT NULL,
  Email char(100) NOT NULL,
  User_Type char(10),
  First_Name varchar(100) NOT NULL,
  Middle_Name varchar(100),
  Last_Name varchar(100) NOT NULL,
  Birth_Date int(10) unsigned,
  Gender varchar(15) NOT NULL,
  PRIMARY KEY  (User_Key),
  UNIQUE KEY tbl_unique (Email),
  KEY tbl_index1 (User_Name),
  KEY tbl_index2 (User_Type)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- --------------------------------------------------------

--
-- Table structure for table alumni
--
CREATE TABLE alumni (
  Alumni_Key int(10) unsigned NOT NULL auto_increment,
  Batch_Key int(10) unsigned NOT NULL,
  User_Key int(10) unsigned NOT NULL,
  Address char(100) NOT NULL,
  Employment_Status varchar(50) NOT NULL,
  Position varchar(100) NOT NULL,
  Company_Name varchar(255) NOT NULL,
  Company_Address varchar(255) NOT NULL,
  PRIMARY KEY  (Alumni_Key),
  UNIQUE KEY tbl_unique (Batch_Key, User_Key)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- --------------------------------------------------------

--
-- Table structure for table events
--
CREATE TABLE events (
  Event_Key int(10) unsigned NOT NULL auto_increment,
  Event_Title varchar(255) NOT NULL,
  Event_Start varchar(255) NOT NULL,
  Event_End varchar(255) NOT NULL,
  Event_Location text NOT NULL,
  Event_Desc text NOT NULL,
  PRIMARY KEY  (Event_Key),
  UNIQUE KEY tbl_unique (Event_Title)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- --------------------------------------------------------

--
-- Table structure for table news
--
CREATE TABLE news (
  News_Key int(10) unsigned NOT NULL auto_increment,
  User_Key int(10) unsigned NOT NULL,
  Title varchar(255) NOT NULL,
  Short_Desc text NOT NULL,
  Details longtext NOT NULL,
  PRIMARY KEY  (News_Key),
  UNIQUE KEY tbl_unique (Title)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- --------------------------------------------------------

CREATE USER [IF NOT EXISTS] 'bisu'@'localhost' 
IDENTIFIED BY 'B!su';

GRANT ALL PRIVILEGES ON bisu_ais.* TO 'bisu'@'localhost';
FLUSH PRIVILEGES;