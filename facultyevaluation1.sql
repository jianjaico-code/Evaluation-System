-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 10:11 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facultyevaluation1`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course_ID` varchar(10) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_ID`, `Course_Name`, `Status`) VALUES
('ABIS', 'Bachelor of Science in International Studies', 'Active'),
('ABMC', 'Bachelor of Science in Mass Communication', 'Active'),
('ACT', 'Associate in Computer Technology', 'Active'),
('BEED', 'Bachelor of Science in Elementary Education', 'Active'),
('BSA', 'Bachelor of Science in Accountancy ', 'Active'),
('BSC', 'Bachelor of Science in Commerce', 'Active'),
('BSCE', 'Bachelor of Science in Civil Engineering', 'Active'),
('BSCRIM', 'Bachelor of Science in Criminology ', 'Active'),
('BSEd', 'Bachelor of Science in Secondary Education', 'Active'),
('BSEE', 'Bachelor of Science in Electrical Engineering', 'Active'),
('BSIE', 'Bachelor of Science in Industrial Engineering ', 'Active'),
('BSIT', 'Bachelor of Science in Information Technology', 'Active'),
('BSMT', 'Bachelor of Science in Medical Technology ', 'Active'),
('BSN', 'Bachelor of science in Nursing', 'Active'),
('BSP', 'Bachelor of Science in Pychology ', 'Active'),
('BSPharm', 'Bachelor of Science in Pharmacy', 'Active'),
('BSPT ', 'Bachelor of Science in Physical Therapy', 'Active'),
('BSRT', 'Bachelor of Science in Radiologic Technology', 'Active'),
('BSTM', 'Bachelor of Science in Tourism Management', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Department_ID` varchar(10) NOT NULL,
  `Department_Name` varchar(50) NOT NULL,
  `Faculty_ID` bigint(15) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_ID`, `Department_Name`, `Faculty_ID`, `Status`) VALUES
('CAS', 'College of Arts and Science', 900, 'Active'),
('CBA', 'College of Business and Accountancy', 900, 'Active'),
('CCJ', 'College of Criminal Justice', 900, 'Active'),
('CE', 'College of Engineering', 900, 'Active'),
('CIT', 'College of Information Technology', 20151768619, 'Active'),
('CL', 'College of Law', 900, 'Active'),
('CN', 'College of Nursing', 900, 'Active'),
('CP', 'College of Pharmacy', 900, 'Active'),
('CRS', 'College of Rehabilitation Sciences', 900, 'Active'),
('CRT', 'College of Radiologic Technology', 900, 'Active'),
('CTE', 'College of Education', 900, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `Evaluation_ID` int(10) NOT NULL,
  `Evaluation_ScheduleFrom` date NOT NULL,
  `Evaluation_ScheduleTo` date NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`Evaluation_ID`, `Evaluation_ScheduleFrom`, `Evaluation_ScheduleTo`, `Status`) VALUES
(1, '2019-03-03', '2019-03-09', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_category`
--

CREATE TABLE `evaluation_category` (
  `eval_cat_ID` int(10) NOT NULL,
  `eval_cat_name` varchar(50) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation_category`
--

INSERT INTO `evaluation_category` (`eval_cat_ID`, `eval_cat_name`, `Status`) VALUES
(1, 'Professionalism', 'Active'),
(2, 'Instructional Planning and Delivery', 'Active'),
(3, 'Student Engagement', 'Active'),
(4, 'Learning Environment', 'Active'),
(5, 'Assessment Skill', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_detail`
--

CREATE TABLE `evaluation_detail` (
  `Subject_Student_Taken` bigint(10) NOT NULL,
  `Evaluation_Item_ID` int(5) NOT NULL,
  `Comments` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_item`
--

CREATE TABLE `evaluation_item` (
  `Evaluation_Item_ID` int(5) NOT NULL,
  `Evaluation_Item_Description` varchar(500) NOT NULL,
  `eval_cat_ID` int(10) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation_item`
--

INSERT INTO `evaluation_item` (`Evaluation_Item_ID`, `Evaluation_Item_Description`, `eval_cat_ID`, `Status`) VALUES
(1, 'My teacher\'s behaviour in class has positively influenced my ideas on how to behave as a future professional.	', 1, 'Active'),
(2, 'My teacher\'s good relation has made me confident in expressing myself.', 1, 'Active'),
(3, 'My teachers values-driven personality has made me become more appreciative of humanity, life and environment.', 1, 'Active'),
(4, 'If I were to become a teacher someday, I would mentor the way my teacher does..', 1, 'Active'),
(5, ' The quality of teaching in this course has given me the opportunity to deepen my understanding of principles and theories.', 2, 'Active'),
(6, 'As a result of taking this course, my ability to think critically(i.e analyze, interpret, evaluate information) has improved.							', 2, 'Active'),
(7, 'In this course, I have improved my presentation skills through the use of multimedia.							', 2, 'Active'),
(8, 'The teaching method in this course has kept me actively participate in the learning experiences.', 2, 'Active'),
(9, 'My teacher\'s communication style has helped me understand the lessons he/she is trying to teach.								', 2, 'Active'),
(10, 'My teacher\'s concern of my learning style has helped me discover and develop my potentials and excel in class.', 3, 'Active'),
(11, 'My teacher\'s way of questioning has encourage me to ask questions about the things I want to know.								', 3, 'Active'),
(12, 'My teacher\'s way of creating meaningful learning experience has motivated me to completely prepared for class.								', 3, 'Active'),
(13, ' My teacher has facilitated learning activities that can apply in real-life situations.', 3, 'Active'),
(14, 'My teacher\'s positive learning expectations have lead me to accomplish cooperatively with my classmates/groupmates various projects or assignments.						', 3, 'Active'),
(15, 'My teacher\'s open-mindedness has helped me look at situations from the viewpoints of others.', 3, 'Active'),
(16, 'The class safe and functional classrooms provided by my teacher have encourage me to pay attention and participate in class.							', 4, 'Active'),
(17, 'The classroom atmosphere that my teacher maintain has encouraged to learn more effectively.', 4, 'Active'),
(18, 'My teacher\'s effective time management has taught me to value time even when handling daily life activities.', 4, 'Active'),
(19, 'The professional and courteous manner of my teacher in dealing with students has made me feel valued.', 4, 'Active'),
(20, 'The learning environment that my teacher establishes has brought out the best in me.								', 4, 'Active'),
(21, 'My teacher\'s way of evaluation have made me aware of my class standing.								', 5, 'Active'),
(22, 'I have gained a sense of fairness with the way my teacher rates me.							', 5, 'Active'),
(23, 'The condcut of regular assessments have developed my readiness.', 5, 'Active'),
(24, ' I achieve better scores because the lessons were completely covered in the unit and summative tests.', 5, 'Active'),
(25, 'The prompt return of checked test papers has enabled me to assess my strengths and weaknesses in my subject.', 5, 'Active'),
(26, 'Graduate na meeeeee									', 1, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_rating`
--

CREATE TABLE `evaluation_rating` (
  `Evaluation_Rating_ID` int(5) NOT NULL,
  `Evaluation_Item_ID` int(5) NOT NULL,
  `Rating_ID` int(5) NOT NULL,
  `Subject_Student_Taken` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation_rating`
--

INSERT INTO `evaluation_rating` (`Evaluation_Rating_ID`, `Evaluation_Item_ID`, `Rating_ID`, `Subject_Student_Taken`) VALUES
(1, 1, 4, 1),
(2, 5, 3, 1),
(3, 10, 3, 1),
(4, 17, 3, 1),
(5, 23, 4, 1),
(6, 1, 3, 2),
(7, 5, 3, 2),
(8, 10, 4, 2),
(9, 17, 1, 2),
(10, 23, 2, 2),
(11, 1, 4, 3),
(12, 5, 3, 3),
(13, 10, 3, 3),
(14, 17, 4, 3),
(15, 23, 4, 3),
(16, 1, 3, 4),
(17, 5, 3, 4),
(18, 10, 4, 4),
(19, 17, 4, 4),
(20, 23, 3, 4),
(21, 1, 4, 5),
(22, 5, 3, 5),
(23, 10, 3, 5),
(24, 17, 4, 5),
(25, 23, 4, 5),
(26, 1, 4, 7),
(27, 5, 4, 7),
(28, 10, 4, 7),
(29, 17, 4, 7),
(30, 23, 4, 7),
(31, 1, 1, 8),
(32, 5, 1, 8),
(33, 10, 1, 8),
(34, 17, 1, 8),
(35, 23, 1, 8),
(36, 1, 4, 9),
(37, 5, 4, 9),
(38, 10, 4, 9),
(39, 17, 4, 9),
(40, 23, 4, 9),
(41, 1, 1, 6),
(42, 5, 1, 6),
(43, 10, 1, 6),
(44, 17, 1, 6),
(45, 23, 1, 6),
(46, 1, 4, 10),
(47, 5, 3, 10),
(48, 10, 3, 10),
(49, 17, 4, 10),
(50, 23, 4, 10),
(51, 1, 4, 11),
(52, 5, 4, 11),
(53, 10, 3, 11),
(54, 17, 3, 11),
(55, 23, 4, 11),
(56, 1, 4, 12),
(57, 5, 3, 12),
(58, 10, 3, 12),
(59, 17, 3, 12),
(60, 23, 4, 12),
(61, 1, 2, 13),
(62, 5, 2, 13),
(63, 10, 2, 13),
(64, 17, 2, 13),
(65, 23, 2, 13),
(66, 1, 4, 14),
(67, 5, 4, 14),
(68, 10, 3, 14),
(69, 17, 3, 14),
(70, 23, 4, 14);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_sets`
--

CREATE TABLE `evaluation_sets` (
  `Term_ID` int(10) NOT NULL,
  `SY_ID` bigint(10) NOT NULL,
  `Evaluation_Item_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation_sets`
--

INSERT INTO `evaluation_sets` (`Term_ID`, `SY_ID`, `Evaluation_Item_ID`) VALUES
(2, 1, 1),
(2, 1, 5),
(2, 1, 10),
(2, 1, 17),
(2, 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `eval_range`
--

CREATE TABLE `eval_range` (
  `id` int(5) NOT NULL,
  `range_to` decimal(5,2) NOT NULL,
  `range_from` decimal(5,2) NOT NULL,
  `description` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eval_range`
--

INSERT INTO `eval_range` (`id`, `range_to`, `range_from`, `description`) VALUES
(1, '0.00', '1.00', 'POOR'),
(2, '1.01', '2.00', 'FAIR'),
(3, '2.01', '3.00', 'SATISFACTORY'),
(4, '3.01', '4.00', 'EXCELLENT');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Faculty_ID` bigint(15) NOT NULL,
  `Faculty_Lastname` varchar(50) NOT NULL,
  `Faculty_Firstname` varchar(50) NOT NULL,
  `Faculty_Middlename` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Faculty_ID`, `Faculty_Lastname`, `Faculty_Firstname`, `Faculty_Middlename`, `Position`, `Status`, `Password`) VALUES
(20150000001, 'BAKER', 'CAROLINA', 'A.', 'GUIDANCE', 'Active', 'guidance'),
(20150000002, 'BALABAT', 'AURORA CINDY', 'A.', 'TEACHER', 'Active', 'teacher'),
(20150000003, 'PACHICA', 'ARCHIE', 'B.', 'TEACHER', 'Active', 'teacher'),
(20150000004, 'RADAZA', 'ADAZA', 'A.', 'TEACHER', 'Active', 'teacher'),
(20150000005, 'Descartin', 'ROWENA', 'G.', 'TEACHER', 'Active', 'teacher'),
(20150000006, 'JINKY ', 'SALLACAY', 'B.', 'TEACHER', 'Active', 'teacher'),
(20151768619, 'UYAB', 'ANDREW', 'Y.', 'DEAN', 'Active', '222'),
(20158961412, 'RENEE', 'YAP', 'C.', 'TEACHER', 'Active', '20158961412');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `Rating_ID` int(5) NOT NULL,
  `Rating_Description` varchar(80) NOT NULL,
  `Qualitative_Description` varchar(200) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`Rating_ID`, `Rating_Description`, `Qualitative_Description`, `Status`) VALUES
(1, 'Poor', 'Performance did not meet its requirements ', 'Active'),
(2, 'Fair', 'Performance needs improvements to meet job requirements.', 'Active'),
(3, 'Satisfactory', 'Performance meets the job requirements.', 'Active'),
(4, 'Very Satisfactory', 'Performance meets and often exceeds job requirements.', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `re_evaluate`
--

CREATE TABLE `re_evaluate` (
  `re_evaluateID` int(11) NOT NULL,
  `Subject_Student_Taken` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_ID` bigint(15) NOT NULL,
  `Password` text NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Middlename` varchar(30) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_ID`, `Password`, `Lastname`, `Firstname`, `Middlename`, `Status`) VALUES
(2003008887, '2003008887', 'MACARANDAN', 'ARVIN CARY', 'YAÃ‘EZ', 'Active'),
(2009005662, '2009005662', 'MAYUGA', 'MAE KYLE', 'ALIVIO', 'Active'),
(2009014617, '2009014617', 'SATUR', 'BILLIE IVAN', 'ONGCACHUY', 'Active'),
(2011006219, '2011006219', 'CASTINO', 'CHRISTINE RIZA', 'ZAPANTA', 'Active'),
(2011022378, '2011022378', 'CONCEPCION', 'ELLISON', 'MARAPO', 'Active'),
(2012002342, '2012002342', 'LUMANCES', 'REMAR', 'GAA', 'Active'),
(2013005308, '2013005308', 'KHO', 'MARLOU SEAN', 'ENRIQUEZ', 'Active'),
(2013021748, '2013021748', 'MACAYRAN', 'ROBINSON', 'PUERTO', 'Active'),
(2013022932, '2013022932', 'JADOL', 'VINSON', 'JAVIER', 'Active'),
(2013026813, '2013026813', 'MORADOS', 'RAFFY', 'ALFORO', 'Active'),
(2013028907, '2013028907', 'BOMOTANO', 'CYRUS FRANCIS', 'ABARQUEZ', 'Active'),
(2014002216, '2014002216', 'OMEREZ', 'APRIL ROSE', 'PALARCA', 'Active'),
(2014024720, '2014024720', 'DUMASIS', 'MARK JOSEPH', 'LICAYAN', 'Active'),
(20000000001, '20000000001', 'BASAN', 'MARKHO ZEAN', 'ZAYAS', 'Active'),
(20000000002, '20000000002', 'CAÃ‘ONASO', ' PETER PAUL', 'ORMOCHUELOS', 'Active'),
(20000000003, '20000000003', 'DADUBO', ' EDWARD', 'VIERNES', 'Active'),
(20000000004, '20000000004', 'DIMASANGCAI', 'JAY MARC', 'RUZGAL', 'Active'),
(20000000005, '20000000005', 'GUINTO', 'JHON RAY', 'NUÃ‘EZ', 'Active'),
(20000000006, '20000000006', 'ISRAEL', 'OLIVER', 'OBATAY', 'Active'),
(20000000007, '20000000007	', 'MACABECHA', 'IVAN KEANE', 'MINISTERIO', 'Active'),
(20000000008, '20000000008', 'WENCESLAO', 'JAN IAN', 'MALIBAGO', 'Active'),
(20000000009, '20000000009', 'ABASULA', ' CLINT JOHN', 'BONIEL', 'Active'),
(20000000010, '20000000010', 'ABECIA', ' FRANCIS LOUIE', 'ECLEO', 'Active'),
(20000000011, '20000000011', 'ACENAS', 'KEVIN JED', 'YBAÃ‘EZ', 'Active'),
(20000000012, '20000000012', 'AGNES', 'PLUMBUM VINZI', 'RUELAN', 'Active'),
(20000000013, '20000000013  ', 'ALCANTARA', 'FRANCIS EDILBERT', 'BELDEROL', 'Active'),
(20000000014, '20000000014', 'ALMOCERA', 'JERAMEEL', 'DIZON', 'Active'),
(20000000015, '20000000015', 'ALMUETE', 'KIMUEL', 'RAJAL', 'Active'),
(20000000016, '20000000016', 'AMANTE', 'CLARK IVERSION', 'BUHANGIN', 'Active'),
(20000000017, '20000000017', 'APARENTE', 'MARC LOWIE', 'TRAVIÃ‘A', 'Active'),
(20000000018, '20000000018', 'AURE', 'CHARMAIGNE ANNTONEE', 'NAGAC', 'Active'),
(20000000019, '20000000019', 'BAJAS', 'TYLOR PETE', 'GABUT', 'Active'),
(20000000020, '20000000020', 'BALSARZA', 'GRANDEUR', 'BADOLES', 'Active'),
(20150099248, '20150099248', 'KASIM', 'LUISE BRYAN', 'PERALTA', 'Active'),
(20150208570, '20150208570', 'CALLO', 'MARIE PATTY ANNE', 'OBSIOMA', 'Active'),
(20150227251, '20150227251', 'BURIAS', 'JELOU', 'Antigua', 'Active'),
(20150258772, '20150258772', 'DE VERA', 'URIELLE FATIMA', 'GERVISE', 'Active'),
(20150289916, '20150289916', 'BORJA', 'JERICO', 'CUIZON', 'Active'),
(20150346380, '20150346380', 'MAKILING', 'ALFREDO III', 'MAGKILAT', 'Active'),
(20150492102, '20150492102', 'RODRIGUEZ', 'KRYSS KYNN L', 'LUCAGBO', 'Active'),
(20150506211, '20150506211', 'SEROJE', 'SHERMINE ANN', 'REMENTIZO', 'Active'),
(20150555464, '20150555464', 'YAP', 'RENEE LYNNE', 'ESCANILLA', 'Active'),
(20150647205, '20150647205', 'SALLACAY', 'SYRA MAE', 'BORLING', 'Active'),
(20150843795, '20150843795', 'MECISAMENTE', 'HRYZZA BELLE', 'VALLEDOR', 'Active'),
(20150930625, '20150930625', 'SUMUGAT', 'CHARLES', 'HALASAN', 'Active'),
(20151081362, '20151081362', 'TAMBIGA II', 'REYNALDO', 'RANILE', 'Active'),
(20151402731, '20151402731', 'BULAWAN', 'MARLOU', 'ESCOSA', 'Active'),
(20151765920, '20151765920', 'NAVARRO', 'PAUL MARTIN', 'ZAGADO', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `Student_ID` bigint(15) NOT NULL,
  `Course_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`Student_ID`, `Course_ID`) VALUES
(20150930625, 'BSIT'),
(2003008887, 'BSIT'),
(2011006219, 'BSIT'),
(2014002216, 'BSIT'),
(2009014617, 'BSIT'),
(20150227251, 'BSIT'),
(20150492102, 'BSIT'),
(20150289916, 'BSIT'),
(2009005662, 'BSIT'),
(20150099248, 'BSIT'),
(2013005308, 'BSIT'),
(2013028907, 'BSIT'),
(20151765920, 'BSIT'),
(2013021748, 'BSIT'),
(20150346380, 'BSIT'),
(2014024720, 'BSIT'),
(2013026813, 'BSIT'),
(2012002342, 'BSIT'),
(20150555464, 'BSIT'),
(20151081362, 'BSIT'),
(2011022378, 'BSIT'),
(20151402731, 'BSIT'),
(20150506211, 'BSIT'),
(20150258772, 'BSIT'),
(2013022932, 'BSIT'),
(20150843795, 'BSIT'),
(20150647205, 'BSIT'),
(20150208570, 'BSIT'),
(20000000001, 'ABIS'),
(20000000002, 'ABIS'),
(20000000003, 'ABIS'),
(20000000004, 'ABIS'),
(20000000005, 'ABIS'),
(20000000006, 'ABIS'),
(20000000007, 'ABIS'),
(20000000008, 'ABIS'),
(20000000009, 'ABIS'),
(20000000010, 'ABIS'),
(20000000011, 'ABIS'),
(20000000012, 'ABIS'),
(20000000013, 'ABIS'),
(20000000014, 'ABIS'),
(20000000015, 'ABIS'),
(20000000016, 'ABIS'),
(20000000017, 'ABIS'),
(20000000018, 'ABIS'),
(20000000019, 'ABIS'),
(20000000020, 'ABIS');

-- --------------------------------------------------------

--
-- Table structure for table `student_evaluation`
--

CREATE TABLE `student_evaluation` (
  `Student_Evaluation_ID` int(10) NOT NULL,
  `Evaluation_ID` int(10) NOT NULL,
  `Subject_Student_Taken` bigint(10) NOT NULL,
  `Comments` varchar(500) NOT NULL,
  `average_rate` decimal(11,2) NOT NULL,
  `dateEval` date NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_evaluation`
--

INSERT INTO `student_evaluation` (`Student_Evaluation_ID`, `Evaluation_ID`, `Subject_Student_Taken`, `Comments`, `average_rate`, `dateEval`, `Status`) VALUES
(1, 1, 1, 'Try comment', '3.40', '2019-03-06', 'Active'),
(2, 1, 2, 'Not hidden comment', '2.60', '2019-03-06', 'Active'),
(3, 1, 3, 'TRY', '3.60', '2019-03-06', 'Active'),
(4, 1, 4, 'LOL', '3.40', '2019-03-06', 'Active'),
(5, 1, 5, 'LOL', '3.60', '2019-03-06', 'Active'),
(6, 1, 7, 'try', '4.00', '2019-03-06', 'Active'),
(7, 1, 8, 'pop', '1.00', '2019-03-06', 'Active'),
(8, 1, 9, 'asd', '4.00', '2019-03-06', 'Active'),
(9, 1, 6, 'asd', '1.00', '2019-03-06', 'Active'),
(10, 1, 10, 'OP', '3.60', '2019-03-06', 'Active'),
(11, 1, 11, 'MKMK', '3.60', '2019-03-06', 'Active'),
(12, 1, 12, 'opo', '3.40', '2019-03-06', 'Active'),
(13, 1, 13, ',L', '2.00', '2019-03-07', 'Active'),
(14, 1, 14, 'kjk', '3.60', '2019-03-07', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_Code` varchar(20) NOT NULL,
  `Subject_Description` varchar(50) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_Code`, `Subject_Description`, `Status`) VALUES
('GS 101', 'German Studies', 'Active'),
('IT 402-12', 'Capstone Project 2', 'Active'),
('IT 403-112', 'Elective 4', 'Active'),
('IT 404-112', 'Network Administration', 'Active'),
('Multi-med', 'Multi-Media and Arts', 'Active'),
('SO 4', 'Board Exam/ Job Placement', 'Active'),
('Try', 'TEST', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `subject_detail`
--

CREATE TABLE `subject_detail` (
  `Subject_Detail_ID` int(15) NOT NULL,
  `Department_ID` varchar(10) NOT NULL,
  `Course_ID` varchar(10) NOT NULL,
  `Subject_Code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_detail`
--

INSERT INTO `subject_detail` (`Subject_Detail_ID`, `Department_ID`, `Course_ID`, `Subject_Code`) VALUES
(1, 'CIT', 'BSIT', 'IT 402-12'),
(2, 'CIT', 'BSIT', 'IT 403-112'),
(3, 'CIT', 'BSIT', 'IT 404-112'),
(4, 'CIT', 'BSIT', 'SO 4'),
(5, 'CAS', 'ABIS', 'GS 101'),
(6, 'CIT', 'BSIT', 'Multi-med'),
(7, 'CIT', 'BSIT', 'Try');

-- --------------------------------------------------------

--
-- Table structure for table `subject_offer`
--

CREATE TABLE `subject_offer` (
  `Subject_Offer_ID` int(15) NOT NULL,
  `SY_ID` int(10) NOT NULL,
  `Term_ID` int(10) NOT NULL,
  `Subject_Code` varchar(20) NOT NULL,
  `Faculty_ID` bigint(15) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `Process` int(5) NOT NULL,
  `Department_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_offer`
--

INSERT INTO `subject_offer` (`Subject_Offer_ID`, `SY_ID`, `Term_ID`, `Subject_Code`, `Faculty_ID`, `Status`, `Process`, `Department_ID`) VALUES
(1, 1, 2, 'IT 402-12', 20150000002, 'Active', 2, 'CIT'),
(2, 2, 2, 'IT 403-112', 20150000003, 'Active', 1, 'CIT'),
(3, 2, 2, 'IT 404-112', 20150000004, 'Active', 1, 'CIT'),
(4, 2, 2, 'SO 4', 20150000005, 'Active', 1, 'CIT'),
(6, 2, 2, 'GS 101', 20150000006, 'Active', 2, 'CIT'),
(7, 1, 2, 'Multi-med', 20150000002, 'Active', 2, 'CIT');

-- --------------------------------------------------------

--
-- Table structure for table `subject_taken_handle`
--

CREATE TABLE `subject_taken_handle` (
  `Subject_Student_Taken` bigint(10) NOT NULL,
  `Subject_Offer_ID` varchar(20) NOT NULL,
  `Student_ID` bigint(15) NOT NULL,
  `Evaluation_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_taken_handle`
--

INSERT INTO `subject_taken_handle` (`Subject_Student_Taken`, `Subject_Offer_ID`, `Student_ID`, `Evaluation_ID`) VALUES
(1, '1', 2003008887, 1),
(2, '1', 2009005662, 1),
(3, '1', 2012002342, 1),
(4, '1', 2013005308, 1),
(5, '2', 2013022932, 1),
(6, '1', 2013022932, 1),
(7, '4', 20000000001, 1),
(8, '6', 20150506211, 1),
(9, '4', 20150492102, 1),
(10, '1', 2011006219, 1),
(11, '1', 2011022378, 1),
(12, '1', 20150258772, 1),
(13, '1', 2003008887, 1),
(14, '7', 2011022378, 1),
(15, '1', 20150647205, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sy`
--

CREATE TABLE `sy` (
  `SY_ID` bigint(10) NOT NULL,
  `SY_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sy`
--

INSERT INTO `sy` (`SY_ID`, `SY_Name`) VALUES
(1, '2018-2019'),
(2, '2019-2020'),
(3, '2020-2021'),
(4, '2021-2022'),
(5, '2022-2023'),
(6, '2023-2024');

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `Term_ID` int(10) NOT NULL,
  `Term_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`Term_ID`, `Term_Name`) VALUES
(1, 'First Semester'),
(2, 'Second Semester'),
(3, 'Summer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Department_ID`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`Evaluation_ID`);

--
-- Indexes for table `evaluation_item`
--
ALTER TABLE `evaluation_item`
  ADD PRIMARY KEY (`Evaluation_Item_ID`);

--
-- Indexes for table `evaluation_rating`
--
ALTER TABLE `evaluation_rating`
  ADD PRIMARY KEY (`Evaluation_Rating_ID`);

--
-- Indexes for table `eval_range`
--
ALTER TABLE `eval_range`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Faculty_ID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`Rating_ID`);

--
-- Indexes for table `re_evaluate`
--
ALTER TABLE `re_evaluate`
  ADD PRIMARY KEY (`re_evaluateID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `student_evaluation`
--
ALTER TABLE `student_evaluation`
  ADD PRIMARY KEY (`Student_Evaluation_ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_Code`);

--
-- Indexes for table `subject_detail`
--
ALTER TABLE `subject_detail`
  ADD PRIMARY KEY (`Subject_Detail_ID`);

--
-- Indexes for table `subject_offer`
--
ALTER TABLE `subject_offer`
  ADD PRIMARY KEY (`Subject_Offer_ID`);

--
-- Indexes for table `subject_taken_handle`
--
ALTER TABLE `subject_taken_handle`
  ADD PRIMARY KEY (`Subject_Student_Taken`);

--
-- Indexes for table `sy`
--
ALTER TABLE `sy`
  ADD PRIMARY KEY (`SY_ID`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`Term_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `Evaluation_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `evaluation_rating`
--
ALTER TABLE `evaluation_rating`
  MODIFY `Evaluation_Rating_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `re_evaluate`
--
ALTER TABLE `re_evaluate`
  MODIFY `re_evaluateID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_evaluation`
--
ALTER TABLE `student_evaluation`
  MODIFY `Student_Evaluation_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subject_detail`
--
ALTER TABLE `subject_detail`
  MODIFY `Subject_Detail_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject_offer`
--
ALTER TABLE `subject_offer`
  MODIFY `Subject_Offer_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject_taken_handle`
--
ALTER TABLE `subject_taken_handle`
  MODIFY `Subject_Student_Taken` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sy`
--
ALTER TABLE `sy`
  MODIFY `SY_ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
