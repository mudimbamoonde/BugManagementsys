

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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

