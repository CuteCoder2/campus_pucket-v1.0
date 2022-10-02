-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 08:07 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus_pucket`
--

-- --------------------------------------------------------

--
-- Table structure for table `achieve_student`
--

CREATE TABLE `achieve_student` (
  `id_achieve` varchar(45) NOT NULL,
  `school_year` varchar(45) NOT NULL,
  `class_name` varchar(45) NOT NULL,
  `matriculation` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achieve_student`
--

INSERT INTO `achieve_student` (`id_achieve`, `school_year`, `class_name`, `matriculation`) VALUES
('pi202021', '2020/2021', 'sixieme', 'pi20');

-- --------------------------------------------------------

--
-- Table structure for table `annoucement`
--

CREATE TABLE `annoucement` (
  `id_annoucement` int(11) NOT NULL,
  `header` varchar(200) NOT NULL,
  `contente` varchar(10000) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `video` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `annoucement_has_campus`
--

CREATE TABLE `annoucement_has_campus` (
  `id_annoucement` int(11) NOT NULL,
  `id_campus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `id_attendence` varchar(45) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(45) NOT NULL,
  `class_name` varchar(45) NOT NULL,
  `school_year` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`id_attendence`, `date`, `status`, `class_name`, `school_year`) VALUES
('1', '2021-12-07 22:46:45', 'A', 'sixieme', '2020/2021');

-- --------------------------------------------------------

--
-- Table structure for table `attendence_has_period`
--

CREATE TABLE `attendence_has_period` (
  `id_attendence` varchar(45) NOT NULL,
  `id_period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendence_has_subject`
--

CREATE TABLE `attendence_has_subject` (
  `id_attendence` varchar(45) NOT NULL,
  `id_subject` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendence_has_subject`
--

INSERT INTO `attendence_has_subject` (`id_attendence`, `id_subject`) VALUES
('1', 'phy');

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `id_campus` int(11) NOT NULL,
  `campus_name` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `tel` varchar(45) NOT NULL,
  `school_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id_campus`, `campus_name`, `location`, `tel`, `school_name`) VALUES
(1, 'campus denver', 'bonnamusadi', '456987123', 'global service');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_name` varchar(45) NOT NULL,
  `id_section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_name`, `id_section`) VALUES
('sixieme', 2);

-- --------------------------------------------------------

--
-- Table structure for table `class_has_exam`
--

CREATE TABLE `class_has_exam` (
  `class_name` varchar(45) NOT NULL,
  `id_exam` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `id_day` int(11) NOT NULL,
  `day` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`id_day`, `day`) VALUES
(1, 'monday'),
(2, 'tuesday'),
(3, 'wednesday'),
(4, 'thursday'),
(5, 'friday'),
(6, 'saturday'),
(7, 'sunday');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id_exam` varchar(60) NOT NULL,
  `start` date NOT NULL,
  `ends` date NOT NULL,
  `school_year` varchar(45) NOT NULL,
  `id_exam_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id_exam`, `start`, `ends`, `school_year`, `id_exam_type`) VALUES
('2020sec', '2020-08-08', '2020-08-20', '2020/2021', 1),
('20firstsec', '2020-07-07', '2020-07-20', '2020/2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE `exam_type` (
  `id_exam_type` int(11) NOT NULL,
  `exam_type_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`id_exam_type`, `exam_type_name`) VALUES
(1, 'first sequence'),
(2, 'second sequence');

-- --------------------------------------------------------

--
-- Table structure for table `invigilator`
--

CREATE TABLE `invigilator` (
  `id_invigilator` varchar(45) NOT NULL,
  `staff_matriculation` varchar(60) DEFAULT NULL,
  `teacher_matriculation` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `motif`
--

CREATE TABLE `motif` (
  `id_motif` int(11) NOT NULL,
  `motif` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `motif`
--

INSERT INTO `motif` (`id_motif`, `motif`) VALUES
(1, 'mobile'),
(2, 'bank'),
(3, 'espese');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id_note` varchar(60) NOT NULL,
  `mark` int(11) NOT NULL,
  `grade` varchar(45) NOT NULL,
  `rank` varchar(45) DEFAULT NULL,
  `id_subject` varchar(45) NOT NULL,
  `teacher_matriculation` varchar(60) NOT NULL,
  `student_matriculation` varchar(60) NOT NULL,
  `class_name` varchar(45) NOT NULL,
  `id_exam` varchar(60) NOT NULL,
  `school_year` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id_note`, `mark`, `grade`, `rank`, `id_subject`, `teacher_matriculation`, `student_matriculation`, `class_name`, `id_exam`, `school_year`) VALUES
('1', 19, 'A', '1', 'phy', 'tet', 'pi20', 'sixieme', '20firstsec', '2020/2021');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `tel` int(11) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `oname` varchar(200) DEFAULT NULL,
  `lname` varchar(45) NOT NULL,
  `picture` varchar(45) DEFAULT NULL,
  `sex` varchar(45) NOT NULL,
  `resident` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(2000) DEFAULT '12345678'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`tel`, `fname`, `oname`, `lname`, `picture`, `sex`, `resident`, `email`, `password`) VALUES
(123456, 'serge', 'cute', 'kegne', 'picparent', 'male', 'douala', 'parent email', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `parent_has_student`
--

CREATE TABLE `parent_has_student` (
  `student_matriculation` varchar(60) NOT NULL,
  `tel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent_has_student`
--

INSERT INTO `parent_has_student` (`student_matriculation`, `tel`) VALUES
('pi20', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` varchar(60) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `amount` int(11) NOT NULL,
  `student_matriculation` varchar(60) NOT NULL,
  `staff_matriculation` varchar(60) NOT NULL,
  `school_year` varchar(45) NOT NULL,
  `id_motif` int(11) NOT NULL,
  `id_payment_method` int(11) NOT NULL,
  `id_campus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_payment`, `date`, `amount`, `student_matriculation`, `staff_matriculation`, `school_year`, `id_motif`, `id_payment_method`, `id_campus`) VALUES
('1', '2021-12-07', 500000, 'pi20', 'fp2021', '2020/2021', 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id_payment_method` int(11) NOT NULL,
  `methodcol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id_payment_method`, `methodcol`) VALUES
(1, 'mobile'),
(2, 'espese'),
(3, 'bank transfer');

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

CREATE TABLE `period` (
  `id_period` int(11) NOT NULL,
  `start` varchar(45) NOT NULL,
  `end` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`id_period`, `start`, `end`) VALUES
(1, '8:00', '9:00'),
(2, '10:00', '11:00');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `privillage` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `name`, `privillage`) VALUES
('SAC', 'service academique', 'chef'),
('SCOM', 'service commercial', 'scom1');

-- --------------------------------------------------------

--
-- Table structure for table `report_cart`
--

CREATE TABLE `report_cart` (
  `id_report_cart` varchar(60) NOT NULL,
  `student_matriculation` varchar(60) NOT NULL,
  `id_exam` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `duration` varchar(45) NOT NULL,
  `id_exam` varchar(60) NOT NULL,
  `class_name` varchar(45) NOT NULL,
  `id_period` int(11) NOT NULL,
  `id_subject` varchar(45) NOT NULL,
  `id_invigilator` varchar(45) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `school_year` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_name` varchar(45) NOT NULL,
  `abbrevation` varchar(45) NOT NULL,
  `logo` varchar(45) NOT NULL,
  `date_created` varchar(45) NOT NULL,
  `moto` varchar(45) NOT NULL,
  `describetion` varchar(10000) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_name`, `abbrevation`, `logo`, `date_created`, `moto`, `describetion`, `email`, `website`) VALUES
('global service', 'gsvti', 'logo', '2006-06-07', 'cute coding', 'good school', 'gsvti@gmail.com', 'gsvti.com');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id_section` int(11) NOT NULL,
  `section_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id_section`, `section_name`) VALUES
(1, 'anglophone'),
(2, 'francophone');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id_series` varchar(45) NOT NULL,
  `series_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id_series`, `series_name`) VALUES
('INFO', 'INFORMTQIUE');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `matriculation` varchar(60) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `oname` varchar(200) DEFAULT NULL,
  `lname` varchar(45) NOT NULL,
  `picture` varchar(45) NOT NULL,
  `tel` int(11) NOT NULL,
  `sex` varchar(45) NOT NULL,
  `DOB` varchar(45) NOT NULL,
  `POB` varchar(45) NOT NULL,
  `nationality` varchar(45) NOT NULL,
  `resident` varchar(45) NOT NULL,
  `religion` varchar(45) DEFAULT NULL,
  `marital_status` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'active',
  `password` varchar(2000) DEFAULT '12345678',
  `id_campus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`matriculation`, `fname`, `oname`, `lname`, `picture`, `tel`, `sex`, `DOB`, `POB`, `nationality`, `resident`, `religion`, `marital_status`, `email`, `status`, `password`, `id_campus`) VALUES
('fp2021', 'fotso', NULL, 'pires', 'picture', 123, 'M', '1999-10-1', 'foumbot', 'cameroo', 'douala', 'christain', 'single', 'fotsopires10@gmail.com', 'active', '12345678', 1),
('rpf', 'raims', 'pires', 'fotso', 'picture', 963852741, 'male', '1999-01-10', 'douala', 'cameroon', 'douala', 'christian', 'single', 'fotsopires@gmil.com', 'active', '12345678', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_has_post`
--

CREATE TABLE `staff_has_post` (
  `matriculation` varchar(60) NOT NULL,
  `id_post` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_has_post`
--

INSERT INTO `staff_has_post` (`matriculation`, `id_post`) VALUES
('fp2021', 'sac'),
('fp2021', 'scom'),
('rpf', 'sAC'),
('rpf', 'scom');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `matriculation` varchar(60) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `oname` varchar(200) DEFAULT NULL,
  `lname` varchar(45) NOT NULL,
  `picture` varchar(45) NOT NULL,
  `tel` int(11) NOT NULL,
  `sex` varchar(45) NOT NULL,
  `DOB` varchar(45) NOT NULL,
  `POB` varchar(45) NOT NULL,
  `nationality` varchar(45) NOT NULL,
  `resident` varchar(45) NOT NULL,
  `religion` varchar(45) DEFAULT NULL,
  `marital_status` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'active',
  `password` varchar(2000) DEFAULT '12345678',
  `fee` varchar(45) NOT NULL,
  `class_name` varchar(45) NOT NULL,
  `id_series` varchar(45) DEFAULT NULL,
  `id_sub_serie` varchar(45) DEFAULT NULL,
  `id_campus` int(11) DEFAULT NULL,
  `school_year` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`matriculation`, `fname`, `oname`, `lname`, `picture`, `tel`, `sex`, `DOB`, `POB`, `nationality`, `resident`, `religion`, `marital_status`, `email`, `status`, `password`, `fee`, `class_name`, `id_series`, `id_sub_serie`, `id_campus`, `school_year`) VALUES
('pi20', 'fotso', 'raims', 'pires', 'picture path', 741852963, 'male', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '250000', 'sixieme', 'info', 'gl', 1, '2020/2021');

-- --------------------------------------------------------

--
-- Table structure for table `student_has_attendence`
--

CREATE TABLE `student_has_attendence` (
  `student_matriculation` varchar(60) NOT NULL,
  `id_attendence` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id_subject` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `coifficient` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id_subject`, `name`, `coifficient`) VALUES
('MATH', 'mathematics', 5),
('PHY', 'physics', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sub_serie`
--

CREATE TABLE `sub_serie` (
  `id_sub_serie` varchar(45) NOT NULL,
  `sub_serie_name` varchar(45) NOT NULL,
  `fee` varchar(45) NOT NULL,
  `id_series` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_serie`
--

INSERT INTO `sub_serie` (`id_sub_serie`, `sub_serie_name`, `fee`, `id_series`) VALUES
('GL', 'geni logiciel', '450000', 'info'),
('GSI', 'gestion des system informatique', '600000', 'info'),
('RT', 'Reaseux Et Telecom', '600000', 'info');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `matriculation` varchar(60) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `oname` varchar(200) DEFAULT NULL,
  `lname` varchar(45) NOT NULL,
  `picture` varchar(45) NOT NULL,
  `tel` int(11) NOT NULL,
  `sex` varchar(45) NOT NULL,
  `DOB` varchar(45) NOT NULL,
  `POB` varchar(45) NOT NULL,
  `nationality` varchar(45) NOT NULL,
  `resident` varchar(45) NOT NULL,
  `religion` varchar(45) DEFAULT NULL,
  `marital_status` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'active',
  `password` varchar(2000) DEFAULT '12345678'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`matriculation`, `fname`, `oname`, `lname`, `picture`, `tel`, `sex`, `DOB`, `POB`, `nationality`, `resident`, `religion`, `marital_status`, `email`, `status`, `password`) VALUES
('tet', 'pipi', NULL, 'rims ', 'pictuer', 741852, 'mle', '1975-10-10', 'douala', 'cameroon', 'douala', 'christian', 'married', 'raims email.com', 'active', '12345678'),
('teti', 'roro', NULL, 'kiki ', 'pictuer', 741852, 'mle', '1975-10-10', 'douala', 'cameroon', 'douala', 'christian', 'married', 'raims email.com', 'active', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_has_attendence`
--

CREATE TABLE `teacher_has_attendence` (
  `teacher_matriculation` varchar(60) NOT NULL,
  `id_attendence` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_has_subject`
--

CREATE TABLE `teacher_has_subject` (
  `teacher_matriculation` varchar(60) NOT NULL,
  `id_subject` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_has_subject`
--

INSERT INTO `teacher_has_subject` (`teacher_matriculation`, `id_subject`) VALUES
('tet', 'phy'),
('teti', 'math');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `id_time_table` varchar(45) NOT NULL,
  `id_day` int(11) NOT NULL,
  `school_year` varchar(45) NOT NULL,
  `id_subject` varchar(45) NOT NULL,
  `class_name` varchar(45) NOT NULL,
  `id_period` int(11) NOT NULL,
  `teacher_matriculation` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `school_year` varchar(45) NOT NULL,
  `start` varchar(45) DEFAULT NULL,
  `end` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`school_year`, `start`, `end`) VALUES
('2020/2021', '2020', '2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achieve_student`
--
ALTER TABLE `achieve_student`
  ADD PRIMARY KEY (`id_achieve`),
  ADD KEY `fk_achieve_student_class1_idx` (`class_name`),
  ADD KEY `fk_achieve_student_student_idx` (`matriculation`),
  ADD KEY `fk_achieve_student_year1` (`school_year`);

--
-- Indexes for table `annoucement`
--
ALTER TABLE `annoucement`
  ADD PRIMARY KEY (`id_annoucement`);

--
-- Indexes for table `annoucement_has_campus`
--
ALTER TABLE `annoucement_has_campus`
  ADD PRIMARY KEY (`id_annoucement`,`id_campus`),
  ADD KEY `fk_annoucement_has_campus_campus1_idx` (`id_campus`),
  ADD KEY `fk_annoucement_has_campus_annoucement1_idx` (`id_annoucement`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`id_attendence`),
  ADD KEY `fk_attendence_class1_idx` (`class_name`),
  ADD KEY `fk_attendence_year_idx` (`school_year`);

--
-- Indexes for table `attendence_has_period`
--
ALTER TABLE `attendence_has_period`
  ADD PRIMARY KEY (`id_attendence`,`id_period`),
  ADD KEY `fk_attendence_has_period1_idx` (`id_period`),
  ADD KEY `fk_attendence_has_period_attendence1_idx` (`id_attendence`);

--
-- Indexes for table `attendence_has_subject`
--
ALTER TABLE `attendence_has_subject`
  ADD PRIMARY KEY (`id_attendence`,`id_subject`),
  ADD KEY `fk_attendence_has_subject_subject1_idx` (`id_subject`),
  ADD KEY `fk_attendence_has_subject_attendence1_idx` (`id_attendence`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id_campus`),
  ADD KEY `fk_campus_school1_idx` (`school_name`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_name`),
  ADD KEY `fk_class_section1_idx` (`id_section`);

--
-- Indexes for table `class_has_exam`
--
ALTER TABLE `class_has_exam`
  ADD PRIMARY KEY (`class_name`,`id_exam`),
  ADD KEY `fk_class_has_exam_exam1_idx` (`id_exam`),
  ADD KEY `fk_class_has_exam_class1_idx` (`class_name`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`id_day`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id_exam`),
  ADD KEY `fk_exam_year1_idx` (`school_year`),
  ADD KEY `fk_exam_exam_type1_idx` (`id_exam_type`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`id_exam_type`);

--
-- Indexes for table `invigilator`
--
ALTER TABLE `invigilator`
  ADD PRIMARY KEY (`id_invigilator`),
  ADD KEY `fk_invigilator_staff1_idx` (`staff_matriculation`),
  ADD KEY `fk_invigilator_teacher1_idx` (`teacher_matriculation`);

--
-- Indexes for table `motif`
--
ALTER TABLE `motif`
  ADD PRIMARY KEY (`id_motif`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `fk_note_subject1_idx` (`id_subject`),
  ADD KEY `fk_note_teacher1_idx` (`teacher_matriculation`),
  ADD KEY `fk_note_student1_idx` (`student_matriculation`),
  ADD KEY `fk_note_class1_idx` (`class_name`),
  ADD KEY `fk_note_exam1_idx` (`id_exam`),
  ADD KEY `fk_note_year_idx` (`school_year`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`tel`);

--
-- Indexes for table `parent_has_student`
--
ALTER TABLE `parent_has_student`
  ADD PRIMARY KEY (`student_matriculation`,`tel`),
  ADD KEY `fk_parent_has_student_student1_idx` (`student_matriculation`),
  ADD KEY `fk_parent_has_student_parent1_idx` (`tel`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `fk_payment_student1_idx` (`student_matriculation`),
  ADD KEY `fk_payment_staff1_idx` (`staff_matriculation`),
  ADD KEY `fk_payment_motif1_idx` (`id_motif`),
  ADD KEY `fk_payment_payment_method1_idx` (`id_payment_method`),
  ADD KEY `fk_payment_campus1_idx` (`id_campus`),
  ADD KEY `fk_payment_year1_idx` (`school_year`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id_payment_method`);

--
-- Indexes for table `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`id_period`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `report_cart`
--
ALTER TABLE `report_cart`
  ADD PRIMARY KEY (`id_report_cart`),
  ADD KEY `fk_report_cart_student1_idx` (`student_matriculation`),
  ADD KEY `fk_report_cart_exam1_idx` (`id_exam`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`),
  ADD KEY `fk_schedule_exam1_idx` (`id_exam`),
  ADD KEY `fk_schedule_class1_idx` (`class_name`),
  ADD KEY `fk_schedule_period1_idx` (`id_period`),
  ADD KEY `fk_schedule_subject1_idx` (`id_subject`),
  ADD KEY `fk_schedule_invigilator1_idx` (`id_invigilator`),
  ADD KEY `fk_schedule_year1_idx` (`school_year`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_name`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id_section`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id_series`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`matriculation`),
  ADD KEY `fk_staff_campus1_idx` (`id_campus`);

--
-- Indexes for table `staff_has_post`
--
ALTER TABLE `staff_has_post`
  ADD PRIMARY KEY (`matriculation`,`id_post`),
  ADD KEY `fk_staff_has_post_post1_idx` (`id_post`),
  ADD KEY `fk_staff_has_post_staff1_idx` (`matriculation`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`matriculation`),
  ADD KEY `fk_student_class1_idx` (`class_name`),
  ADD KEY `fk_student_series1_idx` (`id_series`),
  ADD KEY `fk_student_sub_serie1_idx` (`id_sub_serie`),
  ADD KEY `fk_student_campus1_idx` (`id_campus`),
  ADD KEY `fk_student_year1_idx` (`school_year`);

--
-- Indexes for table `student_has_attendence`
--
ALTER TABLE `student_has_attendence`
  ADD PRIMARY KEY (`student_matriculation`,`id_attendence`),
  ADD KEY `fk_student_has_attendence_attendence1_idx` (`id_attendence`),
  ADD KEY `fk_student_has_attendence_student1_idx` (`student_matriculation`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id_subject`);

--
-- Indexes for table `sub_serie`
--
ALTER TABLE `sub_serie`
  ADD PRIMARY KEY (`id_sub_serie`),
  ADD KEY `fk_sub_serie_series_idx` (`id_series`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`matriculation`);

--
-- Indexes for table `teacher_has_attendence`
--
ALTER TABLE `teacher_has_attendence`
  ADD PRIMARY KEY (`teacher_matriculation`,`id_attendence`),
  ADD KEY `fk_teacher_has_attendence_attendence1_idx` (`id_attendence`),
  ADD KEY `fk_teacher_has_attendence_teacher1_idx` (`teacher_matriculation`);

--
-- Indexes for table `teacher_has_subject`
--
ALTER TABLE `teacher_has_subject`
  ADD PRIMARY KEY (`teacher_matriculation`,`id_subject`),
  ADD KEY `fk_teacher_has_subject_subject1_idx` (`id_subject`),
  ADD KEY `fk_teacher_has_subject_teacher1_idx` (`teacher_matriculation`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id_time_table`),
  ADD KEY `fk_time_table_day1_idx` (`id_day`),
  ADD KEY `fk_time_table_year1_idx` (`school_year`),
  ADD KEY `fk_time_table_subject1_idx` (`id_subject`),
  ADD KEY `fk_time_table_class1_idx` (`class_name`),
  ADD KEY `fk_time_table_period1_idx` (`id_period`),
  ADD KEY `fk_time_table_teacher1_idx` (`teacher_matriculation`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`school_year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annoucement`
--
ALTER TABLE `annoucement`
  MODIFY `id_annoucement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `id_day` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `id_exam_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `motif`
--
ALTER TABLE `motif`
  MODIFY `id_motif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id_payment_method` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `period`
--
ALTER TABLE `period`
  MODIFY `id_period` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id_section` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achieve_student`
--
ALTER TABLE `achieve_student`
  ADD CONSTRAINT `fk_achiev_studente_student1` FOREIGN KEY (`matriculation`) REFERENCES `student` (`matriculation`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_achieve_student_class1` FOREIGN KEY (`class_name`) REFERENCES `class` (`class_name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_achieve_student_year1` FOREIGN KEY (`school_year`) REFERENCES `year` (`school_year`) ON UPDATE CASCADE;

--
-- Constraints for table `annoucement_has_campus`
--
ALTER TABLE `annoucement_has_campus`
  ADD CONSTRAINT `fk_annoucement_has_campus_annoucement1` FOREIGN KEY (`id_annoucement`) REFERENCES `annoucement` (`id_annoucement`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_annoucement_has_campus_campus1` FOREIGN KEY (`id_campus`) REFERENCES `campus` (`id_campus`) ON UPDATE CASCADE;

--
-- Constraints for table `attendence`
--
ALTER TABLE `attendence`
  ADD CONSTRAINT `fk_attendence_class1` FOREIGN KEY (`class_name`) REFERENCES `class` (`class_name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_attendence_year1` FOREIGN KEY (`school_year`) REFERENCES `year` (`school_year`) ON UPDATE CASCADE;

--
-- Constraints for table `attendence_has_period`
--
ALTER TABLE `attendence_has_period`
  ADD CONSTRAINT `fk_attendence_has_period_attendence1` FOREIGN KEY (`id_attendence`) REFERENCES `attendence` (`id_attendence`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_attendence_has_period_period1` FOREIGN KEY (`id_period`) REFERENCES `period` (`id_period`) ON UPDATE CASCADE;

--
-- Constraints for table `attendence_has_subject`
--
ALTER TABLE `attendence_has_subject`
  ADD CONSTRAINT `fk_attendence_has_subject_attendence1` FOREIGN KEY (`id_attendence`) REFERENCES `attendence` (`id_attendence`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_attendence_has_subject_subject1` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`) ON UPDATE CASCADE;

--
-- Constraints for table `campus`
--
ALTER TABLE `campus`
  ADD CONSTRAINT `fk_campus_school1` FOREIGN KEY (`school_name`) REFERENCES `school` (`school_name`) ON UPDATE CASCADE;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `fk_class_section1` FOREIGN KEY (`id_section`) REFERENCES `section` (`id_section`) ON UPDATE CASCADE;

--
-- Constraints for table `class_has_exam`
--
ALTER TABLE `class_has_exam`
  ADD CONSTRAINT `fk_class_has_exam_class1` FOREIGN KEY (`class_name`) REFERENCES `class` (`class_name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_class_has_exam_exam1` FOREIGN KEY (`id_exam`) REFERENCES `exam` (`id_exam`) ON UPDATE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `fk_exam_exam_type1` FOREIGN KEY (`id_exam_type`) REFERENCES `exam_type` (`id_exam_type`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_exam_year1` FOREIGN KEY (`school_year`) REFERENCES `year` (`school_year`) ON UPDATE CASCADE;

--
-- Constraints for table `invigilator`
--
ALTER TABLE `invigilator`
  ADD CONSTRAINT `fk_invigilator_staff1` FOREIGN KEY (`staff_matriculation`) REFERENCES `staff` (`matriculation`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_invigilator_teacher1` FOREIGN KEY (`teacher_matriculation`) REFERENCES `teacher` (`matriculation`) ON UPDATE CASCADE;

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_note_class1` FOREIGN KEY (`class_name`) REFERENCES `class` (`class_name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_note_exam1` FOREIGN KEY (`id_exam`) REFERENCES `exam` (`id_exam`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_note_student1` FOREIGN KEY (`student_matriculation`) REFERENCES `student` (`matriculation`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_note_subject1` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_note_teacher1` FOREIGN KEY (`teacher_matriculation`) REFERENCES `teacher` (`matriculation`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_note_year1` FOREIGN KEY (`school_year`) REFERENCES `year` (`school_year`) ON UPDATE CASCADE;

--
-- Constraints for table `parent_has_student`
--
ALTER TABLE `parent_has_student`
  ADD CONSTRAINT `fk_parent_has_student_parent1` FOREIGN KEY (`tel`) REFERENCES `parent` (`tel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_parent_has_student_student1` FOREIGN KEY (`student_matriculation`) REFERENCES `student` (`matriculation`) ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_campus1` FOREIGN KEY (`id_campus`) REFERENCES `campus` (`id_campus`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_payment_motif1` FOREIGN KEY (`id_motif`) REFERENCES `motif` (`id_motif`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_payment_payment_method1` FOREIGN KEY (`id_payment_method`) REFERENCES `payment_method` (`id_payment_method`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_payment_staff1` FOREIGN KEY (`staff_matriculation`) REFERENCES `staff` (`matriculation`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_payment_student1` FOREIGN KEY (`student_matriculation`) REFERENCES `student` (`matriculation`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_payment_year1` FOREIGN KEY (`school_year`) REFERENCES `year` (`school_year`) ON UPDATE CASCADE;

--
-- Constraints for table `report_cart`
--
ALTER TABLE `report_cart`
  ADD CONSTRAINT `fk_report_cart_exam1` FOREIGN KEY (`id_exam`) REFERENCES `exam` (`id_exam`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_report_cart_student1` FOREIGN KEY (`student_matriculation`) REFERENCES `student` (`matriculation`) ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `fk_schedule_class1` FOREIGN KEY (`class_name`) REFERENCES `class` (`class_name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_schedule_exam1` FOREIGN KEY (`id_exam`) REFERENCES `exam` (`id_exam`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_schedule_invigilator1` FOREIGN KEY (`id_invigilator`) REFERENCES `invigilator` (`id_invigilator`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_schedule_period1` FOREIGN KEY (`id_period`) REFERENCES `period` (`id_period`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_schedule_subject1` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_schedule_year1` FOREIGN KEY (`school_year`) REFERENCES `year` (`school_year`) ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fk_staff_campus1` FOREIGN KEY (`id_campus`) REFERENCES `campus` (`id_campus`) ON UPDATE CASCADE;

--
-- Constraints for table `staff_has_post`
--
ALTER TABLE `staff_has_post`
  ADD CONSTRAINT `fk_staff_has_post_post1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_staff_has_post_staff1` FOREIGN KEY (`matriculation`) REFERENCES `staff` (`matriculation`) ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_campus1` FOREIGN KEY (`id_campus`) REFERENCES `campus` (`id_campus`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_class1` FOREIGN KEY (`class_name`) REFERENCES `class` (`class_name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_series1` FOREIGN KEY (`id_series`) REFERENCES `series` (`id_series`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_sub_serie1` FOREIGN KEY (`id_sub_serie`) REFERENCES `sub_serie` (`id_sub_serie`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_year1` FOREIGN KEY (`school_year`) REFERENCES `year` (`school_year`) ON UPDATE CASCADE;

--
-- Constraints for table `student_has_attendence`
--
ALTER TABLE `student_has_attendence`
  ADD CONSTRAINT `fk_student_has_attendence_attendence1` FOREIGN KEY (`id_attendence`) REFERENCES `attendence` (`id_attendence`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_has_attendence_student1` FOREIGN KEY (`student_matriculation`) REFERENCES `student` (`matriculation`) ON UPDATE CASCADE;

--
-- Constraints for table `sub_serie`
--
ALTER TABLE `sub_serie`
  ADD CONSTRAINT `fk_sub_serie_series` FOREIGN KEY (`id_series`) REFERENCES `series` (`id_series`) ON UPDATE CASCADE;

--
-- Constraints for table `teacher_has_attendence`
--
ALTER TABLE `teacher_has_attendence`
  ADD CONSTRAINT `fk_teacher_has_attendence_attendence1` FOREIGN KEY (`id_attendence`) REFERENCES `attendence` (`id_attendence`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_teacher_has_attendence_teacher1` FOREIGN KEY (`teacher_matriculation`) REFERENCES `teacher` (`matriculation`) ON UPDATE CASCADE;

--
-- Constraints for table `teacher_has_subject`
--
ALTER TABLE `teacher_has_subject`
  ADD CONSTRAINT `fk_teacher_has_subject_subject1` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_teacher_has_subject_teacher1` FOREIGN KEY (`teacher_matriculation`) REFERENCES `teacher` (`matriculation`) ON UPDATE CASCADE;

--
-- Constraints for table `time_table`
--
ALTER TABLE `time_table`
  ADD CONSTRAINT `fk_time_table_class1` FOREIGN KEY (`class_name`) REFERENCES `class` (`class_name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_time_table_day1` FOREIGN KEY (`id_day`) REFERENCES `day` (`id_day`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_time_table_period1` FOREIGN KEY (`id_period`) REFERENCES `period` (`id_period`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_time_table_subject1` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_time_table_teacher1` FOREIGN KEY (`teacher_matriculation`) REFERENCES `teacher` (`matriculation`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_time_table_year1` FOREIGN KEY (`school_year`) REFERENCES `year` (`school_year`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
