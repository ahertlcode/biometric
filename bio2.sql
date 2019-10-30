-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: biometric
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `staff_number` varchar(15) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(10) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `section_id` (`section_id`),
  CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `admins_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,NULL,'2001/LT/0231','ALADESELU ISKILU','MR',NULL,'2019-10-10 06:40:47','2019-10-10 06:40:47'),(2,NULL,'2001/LT/0231','ALADESELU ISKILU','MR',NULL,'2019-10-10 06:41:39','2019-10-10 06:41:39');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(10) NOT NULL,
  `course_title` varchar(200) NOT NULL,
  `semester` char(1) DEFAULT NULL,
  `lecturer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `lecturer_id` (`lecturer_id`),
  CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'CSC 201','Introduction to Computer Programming','1',1,'2019-10-11 12:41:57','2019-10-11 12:41:57'),(2,'BED 204','Business Economics','2',NULL,'2019-10-11 13:23:54','2019-10-11 13:23:54'),(3,'CSC 303','Logic and Gate','1',1,'2019-10-11 13:24:17','2019-10-11 13:24:17');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(25) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `department_name` (`department`),
  KEY `faculty_id` (`faculty_id`),
  CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Computer Education',2,'2019-10-11 12:41:25','2019-10-11 12:41:25'),(2,'Mathematics Education',2,'2019-10-11 13:25:25','2019-10-11 13:25:25');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculties`
--

DROP TABLE IF EXISTS `faculties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `faculty_name` (`faculty`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculties`
--

LOCK TABLES `faculties` WRITE;
/*!40000 ALTER TABLE `faculties` DISABLE KEYS */;
INSERT INTO `faculties` VALUES (1,'Engineering','2019-10-11 12:38:49','2019-10-11 12:38:49'),(2,'Education','2019-10-11 12:39:00','2019-10-11 12:39:00'),(3,'Science','2019-10-11 12:39:16','2019-10-11 12:39:16'),(4,'Law','2019-10-11 13:25:52','2019-10-11 13:25:52'),(5,'Medical Science','2019-10-11 13:26:30','2019-10-11 13:26:30');
/*!40000 ALTER TABLE `faculties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecturers`
--

DROP TABLE IF EXISTS `lecturers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `staff_number` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `staff_number` (`staff_number`),
  KEY `user_id` (`user_id`),
  KEY `department_id` (`department_id`),
  CONSTRAINT `lecturers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `lecturers_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecturers`
--

LOCK TABLES `lecturers` WRITE;
/*!40000 ALTER TABLE `lecturers` DISABLE KEYS */;
INSERT INTO `lecturers` VALUES (1,1,'2001/LT/0231','ALADESELU ISKILU',1,'2019-10-11 12:45:50','2019-10-11 12:45:50');
/*!40000 ALTER TABLE `lecturers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels`
--

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` VALUES (1,'100','2019-10-11 12:48:10','2019-10-11 12:48:10'),(2,'200','2019-10-11 12:48:16','2019-10-11 12:48:16'),(3,'300','2019-10-11 12:48:22','2019-10-11 12:48:22'),(4,'400','2019-10-11 12:48:29','2019-10-11 12:48:29'),(5,'500','2019-10-11 12:48:35','2019-10-11 12:48:35'),(6,'600','2019-10-11 12:48:41','2019-10-11 12:48:41');
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registers`
--

DROP TABLE IF EXISTS `registers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `registers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `registers_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registers`
--

LOCK TABLES `registers` WRITE;
/*!40000 ALTER TABLE `registers` DISABLE KEYS */;
INSERT INTO `registers` VALUES (1,1,1,'2019-10-11 12:55:54','2019-10-11 12:55:54'),(2,1,1,'2019-10-28 13:19:37','0000-00-00 00:00:00'),(3,1,1,'2019-10-28 13:19:38','0000-00-00 00:00:00'),(4,1,1,'2019-10-28 13:19:39','0000-00-00 00:00:00'),(5,1,1,'2019-10-28 13:19:40','0000-00-00 00:00:00'),(6,1,1,'2019-10-28 13:19:41','0000-00-00 00:00:00'),(7,1,2,'2019-10-28 13:19:45','0000-00-00 00:00:00'),(8,1,2,'2019-10-28 13:19:46','0000-00-00 00:00:00'),(9,1,2,'2019-10-28 13:19:47','0000-00-00 00:00:00'),(10,1,3,'2019-10-28 13:19:52','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `registers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,'Admission Office','2019-10-10 06:34:38','2019-10-10 06:34:38'),(2,'Student Affair','2019-10-10 06:34:47','2019-10-10 06:34:47');
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `matric_number` varchar(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `middle_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `matric_no` (`matric_number`),
  UNIQUE KEY `matric_number` (`matric_number`),
  KEY `user_id` (`user_id`),
  KEY `level_id` (`level_id`),
  KEY `department_id` (`department_id`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `students_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  CONSTRAINT `students_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,1,'01/0930','Abayomi','Segun','Apetu',6,1,'2019-10-11 12:58:38','2019-10-11 12:58:38');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_types`
--

LOCK TABLES `user_types` WRITE;
/*!40000 ALTER TABLE `user_types` DISABLE KEYS */;
INSERT INTO `user_types` VALUES (1,'student','2019-10-07 23:07:10','0000-00-00 00:00:00'),(2,'admin','2019-10-07 23:07:20','0000-00-00 00:00:00'),(3,'lecturer','2019-10-07 23:07:26','0000-00-00 00:00:00'),(4,'admin two','2019-10-10 01:07:00','2019-10-10 01:07:00'),(5,'admin two','2019-10-10 01:10:16','2019-10-10 01:10:16'),(6,'New Student','2019-10-10 06:30:50','2019-10-10 06:30:50'),(7,'driver','2019-10-11 15:54:47','2019-10-11 15:54:47'),(8,'cleaner','2019-10-11 15:54:55','2019-10-11 15:54:55'),(9,'messenger','2019-10-11 15:55:08','2019-10-11 15:55:08'),(10,'office attendant','2019-10-11 15:55:22','2019-10-11 15:55:22'),(11,'cook','2019-10-11 15:55:31','2019-10-11 15:55:31'),(12,'cook','2019-10-11 16:02:03','2019-10-11 16:02:03');
/*!40000 ALTER TABLE `user_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `email_verified_at` varchar(50) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fingerprint` varchar(200) DEFAULT NULL,
  `api_token` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `online` char(1) DEFAULT '0',
  `status` char(3) DEFAULT 'on',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  KEY `user_type_id` (`user_type_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'abysmart',3,'abayomismart@gmail.com','2019-10-08 16:50:00','08185251347','$2y$10$fVS7P4DtFFPkdGiLu/wdouaI7DURYABHO.fBV8eJkALvXnUVBSQRW',NULL,'oY1nxGo46G88xtriKHdHLt0B68tap4OJtzwfaTTEeLS1HYx9kQWorKHTCWGw','YaFocl9BjBAsd0uf2PLHzGP19Ouda3zn6gOGbWvWCTafVBv8M1nzrFaFdJeI','1','on','2019-10-07 23:04:29','2019-10-29 14:47:01'),(2,'abelman',NULL,'abelman@gmail.com',NULL,'08098786542','abel1234$',NULL,NULL,NULL,'0','on','2019-10-11 11:04:40','2019-10-11 11:04:40'),(4,'lucia',NULL,'lucia@gmail.com',NULL,'09076543211','lucia1234$',NULL,NULL,NULL,'0','on','2019-10-11 11:07:28','2019-10-11 11:07:28'),(5,'akande',1,'akandelaolu@gmail.com',NULL,'09087679900','akande1234$',NULL,NULL,NULL,'0','on','2019-10-11 11:13:01','2019-10-11 11:13:01'),(6,'emmateo',1,'adieleemma@gmail.com',NULL,'08145678900','$2y$10$kQpkv/cb1.JEcxksEwXVH.GDA0UOLKTY9EsKeByiMQeIzLbS/IB1K',NULL,NULL,NULL,'0','on','2019-10-11 13:28:34','2019-10-11 13:28:34'),(7,'abegide',1,'abegide@yahoo.com',NULL,'`2348045678901','$2y$10$TQrOYuy75Dzok2L60p3rlucn1HMMvJdWijJxhV60go5htm6cHJ9Me',NULL,NULL,NULL,'0','on','2019-10-12 22:09:50','2019-10-12 22:09:50'),(8,'adeyi',2,'adeyism@gmail.omc',NULL,'`2347045678900','$2y$10$an48FFGsyUCPUNsM2YCh1uhhVzy50KVCVR4GPVqkZEVaSMVtRhqCu',NULL,NULL,NULL,'0','on','2019-10-12 22:09:50','2019-10-12 22:09:50'),(9,'fulani',1,'danfulani@ymail.com',NULL,'`2349076889900','$2y$10$FTiIf3uoEg.F2xOeZirnLuqt7tkE.eGe3M7oUYevLdC8uPM7KDBRK',NULL,NULL,NULL,'0','on','2019-10-12 22:09:50','2019-10-12 22:09:50'),(10,'sileola',1,'silexwolex@fastmail.com',NULL,'`2348088789909','$2y$10$vecs2PqhCcxyfH8bY3acgeZ9KBuvoDDF1tCSTDI61D6CgoOOwvtdC',NULL,NULL,NULL,'0','on','2019-10-12 22:09:50','2019-10-12 22:09:50'),(11,'adede',3,'smartguy@rocketmail.com',NULL,'`2349088776541','$2y$10$j3UpC7CoK1FgfyNIhx9yqOCtU.dpYj4RHpX48Hu5LOXNly0DVCVyK',NULL,NULL,NULL,'0','on','2019-10-12 22:09:50','2019-10-12 22:09:50'),(12,'aher',1,'abayomi.apetu@gmail.com',NULL,'08185251341','$2y$10$8.VHaBWVFD55UfWdcCjuguG0C76sIlvji9GG9.lHhtRWSJqHdrsvG',NULL,NULL,NULL,'0','on','2019-10-19 07:40:01','2019-10-19 07:41:45');
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

-- Dump completed on 2019-10-30  8:26:09
