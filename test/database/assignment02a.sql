-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: assignment02a
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `director`
--

-- Written by Peter Drakulic
-- Modified by Sebastian Deslauriers

DROP TABLE IF EXISTS `director`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `director` (
  `directorID` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  PRIMARY KEY (`directorID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `director`
--

LOCK TABLES `director` WRITE;
/*!40000 ALTER TABLE `director` DISABLE KEYS */;
INSERT INTO `director` VALUES (1,'Richard','Linklater'),
(2,'Wolfgang','Petersen'),
(3,'Emma','Tammi'),
(4,'Gareth','Edwards'),
(5,'Anthony','Russo'),
(6,'Hiroshi','Haraguchi'),
(7,'Joe','Johnston'),
(8,'James','Cameron'),
(9,'Chris','Columbus');
/*!40000 ALTER TABLE `director` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genre` (
  `GenreID` int NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(50) NOT NULL,
  PRIMARY KEY (`GenreID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre`
--

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` VALUES (1,'Comedy'),
(2,'Drama'),
(3,'Drama/Horror'),
(4,'Action'),
(5,'Sci-Fi'),
(6,'Animation');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rating` (
  `RatingID` int NOT NULL AUTO_INCREMENT,
  `ratingName` varchar(20) NOT NULL,
  PRIMARY KEY (`RatingID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rating`
--

LOCK TABLES `rating` WRITE;
/*!40000 ALTER TABLE `rating` DISABLE KEYS */;
INSERT INTO `rating` VALUES (1,'PG 13'),(2,'PG'),(3,'MA'),(4,'G');
/*!40000 ALTER TABLE `rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'user3','dd1236789'),(2,'user23','red1'),(3,'user45','blue21'),(4,'peterdrak','peter1234!'),(5,'sebadesl','desl0079'),(6,'user1','user1');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
DROP TABLE IF EXISTS `movie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movieID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `yearCreated` int DEFAULT NULL,
  `plot` varchar(500) DEFAULT NULL,
  `length` int DEFAULT NULL,
  `directorID` int DEFAULT NULL,
  `GenreID` int DEFAULT NULL,
  `RatingID` int DEFAULT NULL,
  PRIMARY KEY (`movieID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie`
--

alter table movie
add FOREIGN KEY (directorID) REFERENCES director (DirectorID),
add FOREIGN KEY (genreID) REFERENCES genre (genreID),
add FOREIGN KEY (ratingID) REFERENCES rating (RatingID);

LOCK TABLES `movie` WRITE;
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` VALUES (1,'School of Rock',2003,'some plot',109,1,1,1),
(2,'Troy',2004,'some plot',163,2,2,2),
(3,'Five Nights at Freddys',2023,'some plot',109,3,3,3),
(4,'Godzilla',2014,'some plot',123,4,4,1),
(5,'Avengers Endgame',2019,'some plot',181,5,5,1),
(6,'Evangelion: 1.0 You Are (Not) Alone',2007,'some plot',98,6,6,1),
(7,'Jurassic Park III',2001,'some plot',92,7,4,1),
(8,'Terminator 2: Judgment Day',1991,'some plot',137,8,5,3),
(9,'Home Alone',1990,'some plot',103,9,1,2);
UPDATE movie
SET plot='some plot' 
WHERE plot IS NULL;
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movieuser`
--

DROP TABLE IF EXISTS `movieuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movieuser` (
  `movieID` int NOT NULL,
  `userID` int NOT NULL,
  PRIMARY KEY (`movieID`,`userID`),
  KEY `movieID` (`movieID`),
  KEY `userID` (`userID`),
  CONSTRAINT `movieuser_ibfk_1` FOREIGN KEY (`movieID`) REFERENCES `movie` (`movieID`),
  CONSTRAINT `movieuser_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movieuser`
--

LOCK TABLES `movieuser` WRITE;
/*!40000 ALTER TABLE `movieuser` DISABLE KEYS */;
INSERT INTO `movieuser` VALUES (1,2),(2,2),(3,3);
/*!40000 ALTER TABLE `movieuser` ENABLE KEYS */;
UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-22 16:34:11
