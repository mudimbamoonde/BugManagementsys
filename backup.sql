-- MariaDB dump 10.18  Distrib 10.4.16-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bugmon
-- ------------------------------------------------------
-- Server version	10.4.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `assignedissues`
--

DROP TABLE IF EXISTS `assignedissues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assignedissues` (
  `assignedID` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `issueID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  PRIMARY KEY (`assignedID`),
  KEY `issueID` (`issueID`),
  KEY `userID` (`userID`),
  CONSTRAINT `assignedissues_ibfk_1` FOREIGN KEY (`issueID`) REFERENCES `issues` (`issueID`),
  CONSTRAINT `assignedissues_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignedissues`
--

LOCK TABLES `assignedissues` WRITE;
/*!40000 ALTER TABLE `assignedissues` DISABLE KEYS */;
INSERT INTO `assignedissues` VALUES (1,'sad',5,2),(2,'havhvhavsdhnashndvbihvsdjhv',6,2),(3,'',8,3);
/*!40000 ALTER TABLE `assignedissues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issues`
--

DROP TABLE IF EXISTS `issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issues` (
  `issueID` int(10) NOT NULL AUTO_INCREMENT,
  `issueName` varchar(200) NOT NULL,
  `status` enum('active','resolved') NOT NULL DEFAULT 'active',
  `rid` int(10) NOT NULL,
  PRIMARY KEY (`issueID`),
  KEY `rid` (`rid`),
  CONSTRAINT `issues_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `repository` (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issues`
--

LOCK TABLES `issues` WRITE;
/*!40000 ALTER TABLE `issues` DISABLE KEYS */;
INSERT INTO `issues` VALUES (1,'Files not pushing','active',1),(2,'Wrong Video Format','resolved',1),(3,'Payment mode failed to load','resolved',2),(4,'Unable to assign groups','active',1),(5,'Resolve URL','active',3),(6,'The scales are unable to detect','active',4),(7,'Unable to ping ','resolved',4),(8,'Buffering','active',2);
/*!40000 ALTER TABLE `issues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `from` varchar(20) NOT NULL,
  `to` varchar(20) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  `read` varchar(1) NOT NULL,
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`msg_id`),
  KEY `to` (`from`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES ('samuel','student','Passport sized photo','Dear Student, Send an electronic copy of  your passport sized photo to academic@icuzambia.net','2012-01-20 08:13:05','N',1),('mudimba','all','Welcome to ICU','ICU strives to become the global ICT Leader','2012-01-17 00:23:33','N',2),('kali','lecturer','Welcome to ICU','ICU strives to become the global ICT Leader','2012-01-17 00:23:33','N',3),('admin','all','Welcome to ICU','ICU strives to become the global ICT Leader','2012-01-17 00:23:33','N',17),('admin','all','Welcome to ICU','ICU strives to become the global ICT Leader','2012-01-17 00:23:33','N',20),('admin','student','Passport sized photo','Dear Student, Send an electronic copy of  your passport sized photo to academic@icuzambia.net','2012-01-20 08:13:05','N',21);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repository`
--

DROP TABLE IF EXISTS `repository`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repository` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `reponame` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `accessLevel` varchar(100) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repository`
--

LOCK TABLES `repository` WRITE;
/*!40000 ALTER TABLE `repository` DISABLE KEYS */;
INSERT INTO `repository` VALUES (1,'Moodle Update','This is an online Learning platform','Developers'),(2,'Esikolo','This is an online Learning platform','Developers'),(3,'Upload error 202','Failing to upload a file above 200mb','Tester'),(4,'Scales Live Detector','This appliaction is .........','Developers');
/*!40000 ALTER TABLE `repository` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `accessLevel` enum('developer','tester','admin','both') NOT NULL DEFAULT 'developer',
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Main','admin','admin','admin@gmail.com','admin','827ccb0eea8a706c4c34a16891f84e7b'),(2,'Brian','Lungu','lungub','lungu.brain@jtl.com','tester','827ccb0eea8a706c4c34a16891f84e7b');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-09 11:36:48
