-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2017 at 06:55 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teacher-studentportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `choose`
--

CREATE TABLE `choose` (
  `course_id` varchar(15) NOT NULL,
  `sec_id` varchar(15) NOT NULL,
  `semister` varchar(10) NOT NULL,
  `s_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choose`
--

INSERT INTO `choose` (`course_id`, `sec_id`, `semister`, `s_id`) VALUES
('CSE 113', 'CSE 113 A', '142', '01114202'),
('CSI 121', 'CSI 121 A', '142', '01114201'),
('CSI 121', 'CSI 121 A', '142', '01114202'),
('CSI 121', 'CSI 121 A', '142', '01114203'),
('CSI 121', 'CSI 121 B', '142', '01114204'),
('CSI 122', 'CSI 122 A', '142', '01114201'),
('CSI 122', 'CSI 122 B', '142', '01114203'),
('CSI 217', 'CSI 217 A', '142', '01114203'),
('CSI 217', 'CSI 217 B', '142', '01114204'),
('CSI 218', 'CSI 218 A', '142', '01114203'),
('CSI 219', 'CSI 219 A', '142', '01114202'),
('CSI 219', 'CSI 219 A', '142', '01114205'),
('CSI 219', 'CSI 219 B', '142', '01114201'),
('CSI 219', 'CSI 219 C', '142', '01114203');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(15) NOT NULL,
  `c_date` datetime DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `id` varchar(15) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `c_date`, `post_id`, `id`, `message`) VALUES
(124, '2016-12-28 03:42:03', 3, '01114203', 'i am in CSI 219'),
(125, '2016-12-28 03:48:11', 3, '01114203', 'in section B'),
(127, '2016-12-28 17:50:53', 2, '0123453', 'alhasan commnet post1 is edited'),
(131, '2017-01-01 18:03:42', 42, '0123453', 'ok alright three edited'),
(132, '2017-01-01 18:11:30', 41, '0123453', 'it is important'),
(133, '2017-01-01 18:12:55', 41, '0123453', 'for all section B'),
(134, '2017-01-02 00:44:55', 48, '01114201', 'ok sir'),
(135, '2017-01-02 00:51:17', 41, '01114203', 'ok sir we will try');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(15) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `credit` float(2,2) NOT NULL,
  `semister` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `c_name`, `credit`, `semister`) VALUES
('123', 'DLD3', 0.99, '151'),
('CSE 113', 'Electrical Circuits', 0.99, '3rd'),
('CSE 225', 'Digital Logic Design', 0.99, '4th'),
('CSE 226', 'Digital Logic Design Lab', 0.99, '4th'),
('CSI 121', 'SPL', 0.99, '1st'),
('CSI 122', 'SPL lab', 0.99, '1st'),
('CSI 124', 'Advanced Programming lab', 0.99, '2nd'),
('CSI 217', 'Data Structure', 0.99, '3rd'),
('CSI 218', 'Data Structure Lab', 0.99, '3rd'),
('CSI 219', 'Discrete Mathmatics', 0.99, '2nd'),
('CSI 227', 'Algorithm', 0.99, '4th'),
('CSI 228', 'Algorithm Lab', 0.99, '4th'),
('ENG 002', 'Pre English', 0.99, '1st'),
('ENG 101', 'English I', 0.99, '1st'),
('ENG 103', 'English II', 0.99, '2nd'),
('MATH 003', 'Elementary Calculus', 0.99, '2nd'),
('MATH 151', 'Differential and Integral calculus', 0.99, '2nd'),
('MATH 183', 'Linear,Algebra,Ordinary and Portal', 0.99, '3rd'),
('MATH 187', 'Fourier and Laplace Trans. & Complex', 0.99, '4th'),
('PHY 105', 'Physics', 0.99, '3rd'),
('PHY 106', 'Physics Lab', 0.99, '3rd');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `course_id` varchar(15) NOT NULL,
  `s_id` varchar(15) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`course_id`, `s_id`, `Status`) VALUES
('CSE 113', '01114203', 'taken'),
('CSE 113', '01114205', 'taken'),
('CSI 121', '01114201', 'taken'),
('CSI 121', '01114202', 'taken'),
('CSI 121', '01114205', 'taken'),
('CSI 122', '01114201', 'taken'),
('CSI 122', '01114202', 'taken'),
('CSI 122', '01114204', 'taken'),
('CSI 217', '01114202', 'taken'),
('CSI 218', '01114202', 'taken'),
('CSI 218', '01114205', 'taken'),
('CSI 219', '01114201', 'taken'),
('CSI 219', '01114202', 'taken'),
('CSI 219', '01114203', 'taken'),
('CSI 219', '01114204', 'taken'),
('CSI 219', '01114205', 'taken'),
('CSI 227', '01114204', 'taken'),
('CSI 227', '01114205', 'taken');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `s_id` varchar(15) NOT NULL,
  `t_id` varchar(15) NOT NULL,
  `sec_id` varchar(15) NOT NULL,
  `post_body` longtext NOT NULL,
  `post_date` datetime NOT NULL,
  `checking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `s_id`, `t_id`, `sec_id`, `post_body`, `post_date`, `checking`) VALUES
(1, '01114203', '0123453', 'CSI 219 A', 'sdfdsfksvd s,jgs hgdsjvsh', '2016-12-29 00:00:00', 1),
(2, '01114201', '0123453', 'CSI 219 B', 'iayugdiuAGDIAUSDIDDs', '2016-12-30 19:00:19', 1),
(3, '01114202', '0123453', 'CSI 219 A', 'hi\r\n', '2016-12-30 19:02:55', 1),
(4, '01114202', '0123453', 'CSI 219 A', 'asdfghjkl', '2016-12-30 19:07:48', 1),
(5, '01114202', '0123453', 'CSI 219 A', 'asdf', '2016-12-30 19:09:44', 1),
(6, '01114202', '0123453', 'CSI 219 A', 'just', '2016-12-31 17:22:30', 1),
(7, '01114205', '0123453', 'CSI 219 A', 'just', '2016-12-31 17:22:30', 1),
(8, '01114202', '0123453', 'CSI 219 A', 'hy', '2016-12-31 18:07:25', 1),
(9, '01114205', '0123453', 'CSI 219 A', 'hy', '2016-12-31 18:07:25', 1),
(10, '01114202', '0123453', 'CSI 219 A', 'bygtb', '2016-12-31 18:07:34', 1),
(11, '01114205', '0123453', 'CSI 219 A', 'bygtb', '2016-12-31 18:07:34', 1),
(12, '01114201', '0123453', 'CSI 219 B', 'hello', '2016-12-31 18:08:47', 1),
(13, '01114201', '0123453', 'CSI 219 B', 'it is very important for all of us to attain the class attentively B', '2017-01-01 17:47:44', 1),
(14, '01114201', '0123453', 'CSI 219 B', 'osihdefoaihfoa', '2017-01-01 17:47:58', 1),
(15, '01114201', '0123453', 'CSI 219 B', 'it is very important for all of us to attain the class attentively B', '2017-01-01 17:51:23', 1),
(16, '01114201', '0123453', 'CSI 219 B', 'hello every one i hope you all are well', '2017-01-01 17:56:57', 1),
(17, '01114201', '0123453', 'CSI 219 B', 'it is very important for all of us to learn PHP and HTML to do dbms course', '2017-01-01 18:11:59', 1),
(18, '01114201', '0123453', 'CSI 219 B', 'hi everyone', '2017-01-01 18:42:18', 1),
(19, '01114202', '0123453', 'CSI 219 A', 'something', '2017-01-01 19:16:19', 0),
(20, '01114205', '0123453', 'CSI 219 A', 'something', '2017-01-01 19:16:19', 1),
(21, '01114202', '0123453', 'CSI 219 A', 'hello everyone', '2017-01-01 23:31:03', 0),
(22, '01114205', '0123453', 'CSI 219 A', 'hello everyone', '2017-01-01 23:31:03', 0),
(23, '01114202', '0123453', 'CSI 219 A', 'ok guys', '2017-01-01 23:39:32', 0),
(24, '01114205', '0123453', 'CSI 219 A', 'ok guys', '2017-01-01 23:39:32', 0),
(25, '01114201', '0123451', 'CSI 121 A', 'next class there will be a class test', '2017-01-02 00:43:40', 0),
(26, '01114202', '0123451', 'CSI 121 A', 'next class there will be a class test', '2017-01-02 00:43:40', 0),
(27, '01114203', '0123451', 'CSI 121 A', 'next class there will be a class test', '2017-01-02 00:43:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_body` longtext NOT NULL,
  `t_id` varchar(15) DEFAULT NULL,
  `s_id` varchar(15) DEFAULT NULL,
  `postcourse_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_date`, `post_body`, `t_id`, `s_id`, `postcourse_id`) VALUES
(2, '2016-12-28 10:11:10', 'post from course 217 section C', '0123453', NULL, 'CSI 217'),
(3, '2016-12-29 07:07:59', 'this is post from CSI 219 section B', '0123453', NULL, 'CSI 219'),
(4, '2016-12-28 04:08:03', 'it is CSI 217 for posting', '0123453', NULL, 'CSI 217'),
(12, '2016-12-28 17:44:45', 'i takes CSI 217', '0123453', NULL, 'CSI 217'),
(13, '2016-12-28 18:01:29', 'alhasan post CSI 217', '0123453', NULL, 'CSI 217'),
(39, '2017-01-01 17:47:44', 'it is very important for all of us to attain the class attentively B', '0123453', NULL, 'CSI 219 B'),
(41, '2017-01-01 17:51:23', 'it is very important for all of us to attain the class attentively B', '0123453', NULL, 'CSI 219 B'),
(42, '2017-01-01 17:56:57', 'hello every one i hope you all are well', '0123453', NULL, 'CSI 219 B'),
(43, '2017-01-01 18:11:59', 'it is very important for all of us to learn PHP and HTML to do dbms course', '0123453', NULL, 'CSI 219 B'),
(48, '2017-01-02 00:43:40', 'next class there will be a class test', '0123451', NULL, 'CSI 121 A');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `course_id` varchar(15) NOT NULL,
  `semister` varchar(15) NOT NULL,
  `sec_id` varchar(15) NOT NULL,
  `sec_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`course_id`, `semister`, `sec_id`, `sec_name`) VALUES
('CSE 113', '142', 'CSE 113 A', 'A'),
('CSI 121', '142', 'CSI 121 A', 'A'),
('CSI 121', '142', 'CSI 121 B', 'B'),
('CSI 122', '142', 'CSI 122 A', 'A'),
('CSI 122', '142', 'CSI 122 B', 'B'),
('CSI 124', '142', 'CSI 124 A', 'A'),
('CSI 217', '142', 'CSI 217 A', 'A'),
('CSI 217', '142', 'CSI 217 B', 'B'),
('CSI 217', '142', 'CSI 217 C', 'C'),
('CSI 218', '142', 'CSI 218 A', 'A'),
('CSI 219', '142', 'CSI 219 A', 'A'),
('CSI 219', '142', 'CSI 219 B', 'B'),
('CSI 219', '142', 'CSI 219 C', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` varchar(15) NOT NULL,
  `s_name` varchar(15) NOT NULL,
  `s_email` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_email`, `password`) VALUES
('01114201', 'one', 'one@gmail.com', '123'),
('01114202', 'two', 'two@gmail.com', '123'),
('01114203', 'sojol', 'three@gmail.com', '12345'),
('01114204', 'four', 'four@gmail.com', 'asdfg'),
('01114205', 'five', 'five@gmail.com', '12345'),
('0112345', 'hossain', 'hossain@gmail.c', '123');

-- --------------------------------------------------------

--
-- Table structure for table `takes`
--

CREATE TABLE `takes` (
  `course_id` varchar(15) NOT NULL,
  `sec_id` varchar(15) NOT NULL,
  `semister` varchar(10) NOT NULL,
  `t_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `takes`
--

INSERT INTO `takes` (`course_id`, `sec_id`, `semister`, `t_id`) VALUES
('CSE 113', 'CSE 113 A', '142', '0123452'),
('CSI 121', 'CSI 121 A', '142', '0123451'),
('CSI 121', 'CSI 121 B', '142', '0123452'),
('CSI 122', 'CSI 122 A', '142', '0123456'),
('CSI 122', 'CSI 122 B', '142', '0123451'),
('CSI 217', 'CSI 217 A', '142', '0123455'),
('CSI 217', 'CSI 217 B', '142', '0123454'),
('CSI 217', 'CSI 217 C', '142', '0123453'),
('CSI 218', 'CSI 218 A', '142', '0123452'),
('CSI 219', 'CSI 219 A', '142', '0123453'),
('CSI 219', 'CSI 219 B', '142', '0123453');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` varchar(15) NOT NULL DEFAULT 'NOT NULL',
  `t_name` varchar(15) NOT NULL DEFAULT 'NOT NULL',
  `t_email` varchar(30) NOT NULL DEFAULT 'NOT NULL',
  `t_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_name`, `t_email`, `t_password`) VALUES
('0123451', 'tarif rahman', 'tarif@example.com', '12345'),
('0123452', 'protik', 'protik123@gmail', '123456'),
('0123453', 'MD. Al-hasan', 'rupok42062@gmail.com', 'alhasan'),
('0123454', 'munir islam', 'email@email.com', '12345'),
('0123455', 'samir kawser', 'samir@gmail.com', '1234'),
('0123456', 'rakib hasan', 'toxic@gmail.com', 'rahat123');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `s_id` varchar(15) NOT NULL,
  `t_id` varchar(15) NOT NULL,
  `course_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`s_id`, `t_id`, `course_id`) VALUES
('01114203', '0123453', 'CSI 219'),
('01114205', '0123453', 'CSI 219');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choose`
--
ALTER TABLE `choose`
  ADD PRIMARY KEY (`sec_id`,`course_id`,`semister`,`s_id`),
  ADD KEY `course_id` (`course_id`,`semister`,`sec_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `c_id` (`course_id`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`course_id`,`s_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`course_id`,`semister`,`sec_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`,`s_email`),
  ADD UNIQUE KEY `s_id` (`s_id`),
  ADD UNIQUE KEY `s_email` (`s_email`);

--
-- Indexes for table `takes`
--
ALTER TABLE `takes`
  ADD PRIMARY KEY (`sec_id`,`course_id`,`semister`,`t_id`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `course_id` (`course_id`,`semister`,`sec_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `t_email` (`t_email`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`s_id`,`t_id`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `choose`
--
ALTER TABLE `choose`
  ADD CONSTRAINT `choose_ibfk_1` FOREIGN KEY (`course_id`,`semister`,`sec_id`) REFERENCES `section` (`course_id`, `semister`, `sec_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `takes`
--
ALTER TABLE `takes`
  ADD CONSTRAINT `takes_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`),
  ADD CONSTRAINT `takes_ibfk_2` FOREIGN KEY (`course_id`,`semister`,`sec_id`) REFERENCES `section` (`course_id`, `semister`, `sec_id`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`),
  ADD CONSTRAINT `teaches_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
