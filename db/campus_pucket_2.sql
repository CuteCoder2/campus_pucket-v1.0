 -- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema campus_pucket
-- -----------------------------------------------------
DROP DATABASE IF EXISTS `campus_pucket` ;

-- -----------------------------------------------------
-- Schema campus_pucket
-- -----------------------------------------------------
CREATE DATABASE IF 
NOT EXISTS `campus_pucket` DEFAULT CHARACTER SET utf8mb4 ;
SHOW WARNINGS;
USE `campus_pucket` ;


-- -----------------------------------------------------
-- Table `campus_pucket`.`year`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`year` (
  `school_year` VARCHAR(45) NOT NULL,
  `year_start` date NULL DEFAULT NULL,
  `year_end` date NULL DEFAULT NULL,
  PRIMARY KEY (`school_year`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

--
-- Dumping data for table `year`
--

INSERT INTO `campus_pucket`.`year` (`school_year`, `year_start`, `year_end`) VALUES
 ("2021/2022","2021-09-05","2022-05-13");


-- -----------------------------------------------------
-- Table `campus_pucket`.`section`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`section` (
  `id_section` INT(11) NOT NULL AUTO_INCREMENT,
  `section_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_section`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id_section`, `section_name`) VALUES
(1, 'anglophone'),
(2, 'francophone');

-- -----------------------------------------------------
-- Table `campus_pucket`.`class`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`class` (
`class_id` INT(11) NOT NULL AUTO_INCREMENT,
  `class_name` VARCHAR(45) NOT NULL,
  `id_section` INT(11) NOT NULL,
  PRIMARY KEY (`class_id`),
  INDEX `fk_class_section1_idx` (`id_section` ),
  CONSTRAINT `fk_class_section1`
    FOREIGN KEY (`id_section`)
    REFERENCES `campus_pucket`.`section` (`id_section`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

-- Dumping data for table `class`
--

INSERT INTO `class` (`class_name`, `id_section`) 
VALUES ('year one',2), ('premier anne','1');


-- -----------------------------------------------------
-- Table `campus_pucket`.`achieve`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`achieve_student` (
  `id_achieve` VARCHAR(45) NOT NULL,
  `school_year` VARCHAR(45) NOT NULL,
  `class_id` INT(11) NOT NULL,
  `student_matriculation` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_achieve`),
  INDEX `fk_achieve_student_class1_idx` (`class_id` ),
  INDEX `fk_achieve_student_student_idx` (`student_matriculation` ),
  CONSTRAINT `fk_achieve_student_class1`
    FOREIGN KEY (`class_id`)
    REFERENCES `campus_pucket`.`class` (`class_id`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
  CONSTRAINT `fk_achieve_student_year1`
    FOREIGN KEY (`school_year`)
    REFERENCES `campus_pucket`.`year` (`school_year`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
  CONSTRAINT `fk_achiev_studente_student1`
    FOREIGN KEY (`student_matriculation`)
    REFERENCES `campus_pucket`.`student` (`student_matriculation`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

-- Dumping data for table `achieve_student`
-- 
INSERT INTO `campus_pucket`.`achieve_student` (`id_achieve`,`school_year`, `class_id`, `student_matriculation`) VALUES 
("pi202020",'2020/2021', 1, 'pi20'),
("pi202021",'2020/2021', 1, 'pi21'),
("pi202022",'2020/2021', 1, 'pi22');



-- -----------------------------------------------------
-- Table `campus_pucket`.`annoucement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`annoucement` (
  `id_annoucement` INT(11) NOT NULL AUTO_INCREMENT,
  `header` VARCHAR(200) NOT NULL,
  `contente` VARCHAR(10000) NOT NULL,
  `image` VARCHAR(100) NULL DEFAULT NULL,
  `video` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id_annoucement`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `campus_pucket`.`school`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`school` (
  `school_name` VARCHAR(45) NOT NULL,
  `abbrevation` VARCHAR(45) NOT NULL,
  `logo` VARCHAR(45) NOT NULL,
  `date_created` VARCHAR(45) NOT NULL,
  `moto` VARCHAR(45) NOT NULL,
  `contact` VARCHAR(45) NOT NULL,
  `describetion` VARCHAR(10000) NOT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `website` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`school_name`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_name`, `abbrevation`, `logo`, `date_created`,`moto`,`contact`, `describetion`, `email`, `website`) VALUES
('global service', 'gsvti', 'logo', '2006-06-07','cute coding', 'good school','852963147','gsvti@gmail.com', 'gsvti.com');

-- -----------------------------------------------------
-- Table `campus_pucket`.`campus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`campus` (
  `id_campus` INT(11) NOT NULL,
  `campus_name` VARCHAR(45) NOT NULL,
  `location` VARCHAR(45) NOT NULL,
  `tel` VARCHAR(45) NOT NULL,
  `school_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_campus`),
  INDEX `fk_campus_school1_idx` (`school_name` ),
  CONSTRAINT `fk_campus_school1`
    FOREIGN KEY (`school_name`)
    REFERENCES `campus_pucket`.`school` (`school_name`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id_campus`, `campus_name`, `location`, `tel`, `school_name`) VALUES
(1, 'campus denver', 'bonnamusadi', '456987123', 'global service');



-- -----------------------------------------------------
-- Table `campus_pucket`.`annoucement_has_campus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`annoucement_has_campus` (
  `id_annoucement` INT(11) NOT NULL,
  `id_campus` INT(11) NOT NULL,
  PRIMARY KEY (`id_annoucement`, `id_campus`),
  INDEX `fk_annoucement_has_campus_campus1_idx` (`id_campus` ),
  INDEX `fk_annoucement_has_campus_annoucement1_idx` (`id_annoucement` ),
  CONSTRAINT `fk_annoucement_has_campus_annoucement1`
    FOREIGN KEY (`id_annoucement`)
    REFERENCES `campus_pucket`.`annoucement` (`id_annoucement`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_annoucement_has_campus_campus1`
    FOREIGN KEY (`id_campus`)
    REFERENCES `campus_pucket`.`campus` (`id_campus`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `campus_pucket`.`attendance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`student_attendance` (
  `id_student_attendance` VARCHAR(45) NOT NULL,
  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `status` VARCHAR(45) NOT NULL,
`class_id` INT(11) NOT NULL,
   `school_year` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_student_attendance`),
  INDEX `fk_attendance_class1_idx` (`class_id` ),
  INDEX `fk_attendance_year_idx` (`school_year` ),
  CONSTRAINT `fk_attendance_class1`
    FOREIGN KEY (`class_id`)
    REFERENCES `campus_pucket`.`class` (`class_id`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_attendance_year1`
    FOREIGN KEY (`school_year`)
    REFERENCES `campus_pucket`.`year` (`school_year`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;


-- -----------------------------------------------------
-- Table `campus_pucket`.`period`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`period` (
  `id_period` INT(11) NOT NULL AUTO_INCREMENT,
  `start` VARCHAR(45) NOT NULL,
  `end` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_period`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`id_period`, `start`, `end`) VALUES
(1, '8:00', '9:00'),
(2, '10:00', '11:00');


-- -----------------------------------------------------
-- Table `campus_pucket`.`subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`subject` (
  `id_subject` VARCHAR(45) NOT NULL,
  `subject_name` VARCHAR(45) NOT NULL,
  `coifficient` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_subject`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `campus_pucket`.`subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`class_has_subject` ( 
`id_subject` VARCHAR(45) NOT NULL,
`class_id` INT(11) NOT NULL,
 PRIMARY KEY (`id_subject`,`class_id`),
   INDEX `fk_class_has_subject_class_idx` (`class_id` ),
   INDEX `fk_class_has_subject_subject_idx` (`id_subject` ),
  CONSTRAINT `fk_class_has_subject_class1`
    FOREIGN KEY (`class_id`)
    REFERENCES `campus_pucket`.`class` (`class_id`)
    ON UPDATE CASCADE,
CONSTRAINT `fk_class_has_subject_subject1`
    FOREIGN KEY (`id_subject`)
    REFERENCES `campus_pucket`.`subject` (`id_subject`)
    ON UPDATE CASCADE
 )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;



INSERT INTO `campus_pucket`.`subject` 
(`id_subject`,`subject_name`, `coifficient`) VALUES 
( 'PHY','physic',3),
( 'MATH','Mathematis',5),
( 'CHEM','Chemistry',4);

-- -----------------------------------------------------
-- Table `campus_pucket`.`subject`
-- -----------------------------------------------------   



-- -----------------------------------------------------
-- Table `campus_pucket`.`exam`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`exam` (
  `id_exam` VARCHAR(60) NOT NULL,
  `start` DATE NOT NULL,
  `ends` DATE NOT NULL,
  `school_year` VARCHAR(45) NOT NULL,
  `exam_type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_exam`),
  INDEX `fk_exam_year1_idx` (`school_year` ),
  CONSTRAINT `fk_exam_year1`
    FOREIGN KEY (`school_year`)
    REFERENCES `campus_pucket`.`year` (`school_year`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id_exam`, `start`, `ends`, `school_year`, `exam_type`) VALUES
('2020sec', '2020-08-08', '2020-08-20', '2020/2021', 'first sequence'),
('20firstsec', '2020-07-07', '2020-07-20', '2020/2021', 'second sequence');


-- -----------------------------------------------------
-- Table `campus_pucket`.`class_has_exam`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`class_has_exam` (
  `class_id` INT(11) NOT NULL,
  `id_exam` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`class_id`, `id_exam`),
  INDEX `fk_class_has_exam_exam1_idx` (`id_exam` ),
  INDEX `fk_class_has_exam_class1_idx` (`class_id` ),
  CONSTRAINT `fk_class_has_exam_class1`
    FOREIGN KEY (`class_id`)
    REFERENCES `campus_pucket`.`class` (`class_id`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_class_has_exam_exam1`
    FOREIGN KEY (`id_exam`)
    REFERENCES `campus_pucket`.`exam` (`id_exam`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `campus_pucket`.`day`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`day` (
  `id_day` INT(11) NOT NULL AUTO_INCREMENT,
  `day` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_day`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

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


-- -----------------------------------------------------
-- Table `campus_pucket`.`staff`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`staff` (
  `staff_matriculation` VARCHAR(60) NOT NULL,
  `sta_fname` VARCHAR(45) NOT NULL,
  `sta_oname` VARCHAR(200) NULL DEFAULT NULL,
  `sta_lname` VARCHAR(45) NOT NULL,
  `picture` VARCHAR(200) NOT NULL,
  `tel` INT(11) NOT NULL,
  `sex` VARCHAR(45) NOT NULL,
  `DOB` VARCHAR(45) NOT NULL,
  `POB` VARCHAR(45) NOT NULL,
  `nationality` VARCHAR(45) NOT NULL,
  `resident` VARCHAR(45) NOT NULL,
  `religion` VARCHAR(45) NULL DEFAULT NULL,
  `marital_status` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `status` VARCHAR(45) NOT NULL DEFAULT 'active',
  `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `password` VARCHAR(2000) NULL DEFAULT '12345678',
  `id_campus` INT(11) NOT NULL,
  `id_post` VARCHAR(45) NOT NULL,
  `id_section` INT(11) NOT NULL,

  PRIMARY KEY (`staff_matriculation`),
  INDEX `fk_staff_campus1_idx` (`id_campus` ),
  INDEX `fk_staff_post1_idx` (`id_post` ),
  INDEX `fk_staff_secetion1_idx` (`id_section` ),
  CONSTRAINT `fk_staff_campus1`
    FOREIGN KEY (`id_campus`)
    REFERENCES `campus_pucket`.`campus` (`id_campus`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_staff_post1`
    FOREIGN KEY (`id_post`)
    REFERENCES `campus_pucket`.`post` (`id_post`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_staff_section1`
    FOREIGN KEY (`id_section`)
    REFERENCES `campus_pucket`.`section` (`id_section`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;


--
-- Dumping data for table `staff`
--

INSERT INTO `campus_pucket`.`staff` (`staff_matriculation`, `sta_fname`, `sta_oname` , `sta_lname`, `picture`, `tel`, `sex`, `DOB`, `POB`, `nationality`, `resident`,
 `religion`, `marital_status`, `email`, `status`, `password`, `id_campus`,  `id_post`,`id_section`) VALUES
('fp2021', 'fotso',  'pires', 'Raims', '../assets/staff/img/dp.jpg', 123, 'M', '1999-10-1', 'foumbot', 'cameroo', 'douala', 'christain',
 'single', 'fotsopires10@gmail.com', 'active', '12345678', 1,'HR',1),
('rpf', 'raims','', 'fotso', '../assets/staff/img/dp.jpg', 963852741, 'male', '1999-01-10', 'douala', 'cameroon', 'douala', 
'christian', 'single', 'fotsopires@gmil.com', 'active', '12345678', 1,'COM',2);


-- -----------------------------------------------------
-- Table `campus_pucket`.`teacher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`teacher` (
  `teacher_matriculation` VARCHAR(60) NOT NULL,
  `teacher_fname` VARCHAR(45) NOT NULL,
  `teacher_oname` VARCHAR(200) NULL DEFAULT NULL,
  `teacher_lname` VARCHAR(45) NOT NULL,
  `teacher_picture` VARCHAR(100) NOT NULL,
  `teacher_tel` INT(11) NOT NULL,
  `teacher_sex` VARCHAR(45) NOT NULL,
  `teacher_DOB` VARCHAR(45) NOT NULL,
  `teacher_POB` VARCHAR(45) NOT NULL,
  `teacher_nationality` VARCHAR(45) NOT NULL,
  `teacher_resident` VARCHAR(45) NOT NULL,
  `teacher_religion` VARCHAR(45) NULL DEFAULT NULL,
  `teacher_marital_status` VARCHAR(45) NULL DEFAULT NULL,
  `teacher_email` VARCHAR(45) NULL DEFAULT NULL,
  `teacher_status` VARCHAR(45) NOT NULL DEFAULT 'active',
  `teacher_register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `password` VARCHAR(2000) NULL DEFAULT '12345678',
  PRIMARY KEY (`teacher_matriculation`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;


--
-- Dumping data for table `teacher`

INSERT INTO `teacher` (`teacher_matriculation`, `teacher_fname`, `teacher_oname`, `teacher_lname`, `teacher_picture`, `teacher_tel`, `teacher_sex`, `teacher_DOB`, `teacher_POB`, `teacher_nationality`, `teacher_resident`, `teacher_religion`, `teacher_marital_status`, `teacher_teacher_email`, `teacher_teacher_status`, `teacher_register_date`, `password`) VALUES
('TP221F12Z19', 'fefe', 'zerez', 'zerez', '../upload/teachersmedias/TP521D12D1920211219145028.png', 0, 'M', '2021-12-16', 'ezer', 'rezrez', 'ezrze', 'Jewish', 'Engage', '', 'active', '2021-12-19 15:07:40', '12345678'),
('TP321F12Z19', 'fefe', 'zerez', 'zerez', '../upload/teachersmedias/TP521D12D1920211219145028.png', 0, 'M', '2021-12-16', 'ezer', 'rezrez', 'ezrze', 'Jewish', 'Engage', '', 'active', '2021-12-19 15:08:39', '12345678'),
('TP421F12Z19', 'fefe', 'zerez', 'zerez', '../upload/teachersmedias/TP521D12D1920211219145028.png', 0, 'M', '2021-12-16', 'ezer', 'rezrez', 'ezrze', 'Jewish', 'Engage', '', 'active', '2021-12-19 15:09:13', '12345678');



-- -----------------------------------------------------
-- Table `campus_pucket`.`invigilator`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`invigilator` (
  `id_invigilator` VARCHAR(45) NOT NULL,
  `staff_matriculation` VARCHAR(60) NULL DEFAULT NULL,
  `teacher_matriculation` VARCHAR(60) NULL DEFAULT NULL,
  PRIMARY KEY (`id_invigilator`),
  INDEX `fk_invigilator_staff1_idx` (`staff_matriculation` ),
  INDEX `fk_invigilator_teacher1_idx` (`teacher_matriculation` ),
  CONSTRAINT `fk_invigilator_staff1`
    FOREIGN KEY (`staff_matriculation`)
    REFERENCES `campus_pucket`.`staff` (`staff_matriculation`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_invigilator_teacher1`
    FOREIGN KEY (`teacher_matriculation`)
    REFERENCES `campus_pucket`.`teacher` (`teacher_matriculation`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `campus_pucket`.`series`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`series` (
  `id_series` VARCHAR(45) NOT NULL,
  `series_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_series`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;
SHOW WARNINGS;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id_series`, `series_name`) VALUES
('INFO', 'INFORMTQIUE') ,
 ('medi', 'medecine'),
 ('Comer', 'Management');
 
 -- -----------------------------------------------------
-- Table `campus_pucket`.`fee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`fee` (
  `id_fee` INT(11) NOT NULL AUTO_INCREMENT,
  `fee` INT(11) NOT NULL,
  PRIMARY KEY (`id_fee`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

--
-- Dumping data for table `year`
--
INSERT INTO `campus_pucket`.`fee` ( `fee`) VALUES
 (2000000),
 (2500000),
 (10000000),
 (3000000);
 
 
 -- -----------------------------------------------------
-- Table `campus_pucket`.`certificate`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `campus_pucket`.`certification`  (
  `id_certificate` VARCHAR(45) NOT NULL,
  `certificate_name` VARCHAR(255) NOT NULL,
  `certification_duration` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_certificate`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

--
-- Dumping data for table `certification`
--
INSERT INTO `certification` (`id_certificate`, `certificate_name`, `certification_duration`) VALUES
(  'HND', 'Higher National Diploma','2 years'),
(  'BTS', 'Breve de technicien Superieur','2 years'),
('DQP', 'Diplome de Qualification Professionelle','1 year'),
( 'CQP', 'Certificate de Qualification Professionelle','1 year'),
( 'lisence','Lisence', '3 years');




-- -----------------------------------------------------
-- Table `campus_pucket`.`sub_serie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`sub_serie` (
  `id_sub_serie` VARCHAR(45) NOT NULL,
  `sub_serie_name` VARCHAR(45) NOT NULL,
  `id_series` VARCHAR(45) NOT NULL,
  `sub_serie_img` VARCHAR(45),
  `about_serie` TEXT NOT NULL,
  `id_certificate` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_sub_serie`),
  INDEX `fk_sub_serie_certificate1_idx` (`id_certificate` ),
  INDEX `fk_sub_serie_series_idx` (`id_series` ),
  CONSTRAINT `fk_sub_serie_series`
    FOREIGN KEY (`id_series`)
    REFERENCES `campus_pucket`.`series` (`id_series`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_sub_serie_certificate`
    FOREIGN KEY (`id_certificate`)
    REFERENCES `campus_pucket`.`certification` (`id_certificate`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;


-- -----------------------------------------------------
-- Table `campus_pucket`.`sub_serie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`sub_serie_has_class` (
`id_sub_serie` VARCHAR(45) NOT NULL,
`class_id` INT(11) NOT NULL,
PRIMARY KEY (`id_sub_serie`,`class_id`),
  INDEX `fk_sub_serie_has_class_sub_serie1_idx` (`id_sub_serie`),
  INDEX `fk_sub_serie_has_class_class_name1_idx` (`class_id` ),
    CONSTRAINT `fk_sub_serie_has_class_sub_serie`
    FOREIGN KEY (`id_sub_serie`)
    REFERENCES `campus_pucket`.`sub_serie` (`id_sub_serie`)
    ON UPDATE CASCADE,
    CONSTRAINT `fk_sub_serie_has_class_class_id`
    FOREIGN KEY (`class_id`)
    REFERENCES `campus_pucket`.`class` (`class_id`)
    ON UPDATE CASCADE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

--
-- Dumping data for table `sub_serie`
--

INSERT INTO `sub_serie` (`id_sub_serie`, `sub_serie_name`, `id_series`, `sub_serie_img`, `about_serie`,`id_certificate`) VALUES
('B F', 'Banking and Finace', 'comer', '../assets/staff/img/course/course2.jpg',  'about BF','HND'),
('G L', 'geni logiciel', 'info', '../assets/staff/img/course/course1.jpg', 'about GL','BTS'),
('G S I', 'gestion des system informatique', 'info', '../assets/staff/img/course/course1.jpg','about GSI','DQP'),
('GM', 'General Medcine', 'medi', '../assets/staff/img/course/course4.jpg', 'about GM','CQP'),
('Int-Trad', 'Internation trad', 'comer', '../assets/staff/img/course/course4.jpg','about Int-Trad','CQP'),
('R T', 'Reaseux Et Telecom', 'info', '../assets/staff/img/course/course1.jpg','about RT','BTS'),
('VP', 'vendusse en phrmcie', 'medi', '../assets/staff/img/course/course3.jpg','about VP','lisence');



-- -----------------------------------------------------
-- Table `campus_pucket`.`student`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `campus_pucket`.`student` (
  `student_matriculation` VARCHAR(60) NOT NULL,
  `student_fname` VARCHAR(45) NOT NULL,
  `student_oname` VARCHAR(200) NULL DEFAULT NULL,
  `student_lname` VARCHAR(45) NOT NULL,
  `student_picture` VARCHAR(200)  NULL,
  `student_tel` INT(11) NOT NULL,
  `student_sex` VARCHAR(45) NOT NULL,
  `student_DOB` VARCHAR(45) NOT NULL,
  `student_POB` VARCHAR(45) NOT NULL,
  `student_nationality` VARCHAR(45) NOT NULL,
  `student_resident` VARCHAR(45) NOT NULL,
  `student_religion` VARCHAR(45) NULL DEFAULT NULL,
  `student_marital_status` VARCHAR(45) NULL DEFAULT NULL,
  `student_email` VARCHAR(45) NULL DEFAULT NULL,
  `student_status` VARCHAR(45) NOT NULL DEFAULT 'active',
  `password` VARCHAR(2000) NULL DEFAULT '12345678',
  `student_register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `fee` VARCHAR(45) NOT NULL,
  `class_id` INT(11) NOT NULL,
  `id_series` VARCHAR(45) NULL DEFAULT NULL,
  `id_sub_serie` VARCHAR(45) NULL DEFAULT NULL,
  `id_campus` INT(11) NULL DEFAULT NULL,
  `school_year` VARCHAR(45) NOT NULL,
  `id_section` INT(11) NOT NULL,
  PRIMARY KEY (`student_matriculation`),
  INDEX `fk_student_class1_idx` (`class_id` ),
  INDEX `fk_student_series1_idx` (`id_series` ),
  INDEX `fk_student_sub_serie1_idx` (`id_sub_serie` ),
  INDEX `fk_student_campus1_idx` (`id_campus` ),
  INDEX `fk_student_year1_idx` (`school_year` ),
  INDEX `fk_student_secetion1_idx` (`id_section` ),
  INDEX `fk_student_section1_idx` (`id_section` ),
  CONSTRAINT `fk_student_campus1`
    FOREIGN KEY (`id_campus`)
    REFERENCES `campus_pucket`.`campus` (`id_campus`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_student_class1`
    FOREIGN KEY (`class_id`)
    REFERENCES `campus_pucket`.`class` (`class_id`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_student_series1`
    FOREIGN KEY (`id_series`)
    REFERENCES `campus_pucket`.`series` (`id_series`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_student_sub_serie1`
    FOREIGN KEY (`id_sub_serie`)
    REFERENCES `campus_pucket`.`sub_serie` (`id_sub_serie`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_student_year1`
    FOREIGN KEY (`school_year`)
    REFERENCES `campus_pucket`.`year` (`school_year`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_student_section1`
    FOREIGN KEY (`id_section`)
    REFERENCES `campus_pucket`.`section` (`id_section`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_matriculation`, `student_fname`,  `student_lname`, `student_picture`, `student_tel`, `student_sex`, `student_DOB`, `student_POB`, `student_nationality`, `student_resident`, `student_religion`, `student_marital_status`, `student_email`, `student_status`, `password`, `student_register_date`, `fee`, `class_id`, `id_series`, `id_sub_serie`, `id_campus`, `school_year`, `id_section`) VALUES
('pi12', 'Achap',  'Ruben', '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-22 08:38:25', '250000', 1, 'info', 'G S I', 1, '2021/2022', 1),
('pi20', 'Fotso', 'Raims',  '../upload/teachersmedias/pi.jpg', 741852963, 'F', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2019-11-21 06:38:25', '250000', 2, 'info', 'G L', 1, '2021/2022', 1),
('pi21', 'Levis', 'Wafo',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 1, 'info', 'G L', 1, '2021/2022', 1),
('pi22', 'Gracian', 'Foka',  '../upload/teachersmedias/pi.jpg', 741852963, 'F', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 2, 'info', 'G L', 1, '2021/2022', 1),
('pi23', 'Kegne', 'Nde',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 1, 'medi', 'GM', 1, '2021/2022', 1),
('pi24', 'Andy', 'Galvane',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000',2, 'info', 'R T', 1, '2021/2022', 1),
('pi25', 'darwin', 'Ralf',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 1, 'info', 'G L', 1, '2021/2022', 1),
('pi26', 'Kengne', 'Uriel',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 2, 'info', 'G L', 1, '2021/2022', 1),
('pi27', 'Wagner', 'Tene',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 1, 'info', 'G L', 1, '2021/2022', 1),
('pi28', 'Andengue', 'junior',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 2, 'info', 'R T', 1, '2021/2022', 1),
('pi29', 'Bill', 'Darus',  '../upload/teachersmedias/pi.jpg', 741852963, 'F', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 1, 'info', 'G L', 1, '2021/2022', 1),
('pi30', 'Mustan', 'Roy',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 2, 'info', 'G L', 1, '2021/2022', 1),
('pi31', 'Moutlem', 'Desire',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000',1, 'info', 'G L', 1, '2021/2022', 1),
('pi32', 'Frank', 'Batamark',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 2, 'info', 'G L', 1, '2021/2022', 1),
('pi33', 'Laurelle', 'Njike',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 1, 'medi', 'VP', 1, '2021/2022', 1),
('pi34', 'Bireng', 'Claudia',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 2, 'info', 'G L', 1, '2021/2022', 1),
('pi36', 'Achi', 'Bless',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 1, 'info', 'G L', 1, '2021/2022', 1),
('pi37', 'Eat-well', 'Tombong',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 2, 'info', 'B F', 1, '2021/2022', 1),
('pi38', 'Noel', 'Someone',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 1, 'info', 'G L', 1, '2021/2022', 1),
('pi39', 'Kemanjou', 'Brice',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 2, 'info', 'G L', 1, '2021/2022', 1),
('pi40', 'Mustapha', 'Mustapha',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000',1, 'info', 'G L', 1, '2021/2022', 1),
('pi41', 'Cha Cha', 'Charity',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 2, 'info', 'G L', 1, '2021/2022', 1),
('pi43', 'Stonku', 'Justus',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 1, 'info', 'G L', 1, '2021/2022', 1),
('pi44', 'Mark', 'Sitze',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 2, 'info', 'G L', 1, '2021/2022', 1),
('pi45', 'Babanou', 'Soulemanou',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000',1, 'Comer', 'Int-Trad', 1, '2021/2022', 1),
('pi46', 'Fonkou', 'Dejo',  '../upload/teachersmedias/pi.jpg', 741852963, 'F', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000',2, 'info', 'G L', 1, '2021/2022', 1),
('pi5', 'Sandy', 'Maika',  '../upload/teachersmedias/pi.jpg', 741852963, 'M', '1999-01-10', 'foussette', 'cameroon', 'douala', 'christian', 'sigle', 'fotsopires10@gmail.com', 'active', '12345678', '2021-12-19 06:38:25', '250000', 1, 'info', 'G L', 1, '2021/2022', 1);



-- -----------------------------------------------------
-- Table `campus_pucket`.`report_cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`report_cart` (
  `id_report_cart` VARCHAR(60) NOT NULL,
  `student_matriculation` VARCHAR(60) NOT NULL,
  `id_exam` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_report_cart`),
  INDEX `fk_report_cart_student1_idx` (`student_matriculation` ),
  INDEX `fk_report_cart_exam1_idx` (`id_exam` ),
  CONSTRAINT `fk_report_cart_exam1`
    FOREIGN KEY (`id_exam`)
    REFERENCES `campus_pucket`.`exam` (`id_exam`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_report_cart_student1`
    FOREIGN KEY (`student_matriculation`)
    REFERENCES `campus_pucket`.`student` (`student_matriculation`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `campus_pucket`.`note`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`note` (
  `note_id` VARCHAR(60) NOT NULL,
  `marks` INT(11) NOT NULL,
   `remarks` VARCHAR(45) NOT NULL,
  `grade` VARCHAR(45) NOT NULL,
  `note_rank` VARCHAR(45) ,
  `id_subject` VARCHAR(45) NOT NULL,
  `teacher_matriculation` VARCHAR(60) NOT NULL,
  `student_matriculation` VARCHAR(60) NOT NULL,
  `class_id` INT(11) NOT NULL,
  `id_exam` VARCHAR(60) NOT NULL,
  `school_year` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`note_id`),
  INDEX `fk_note_subject1_idx` (`id_subject` ),
  INDEX `fk_note_teacher1_idx` (`teacher_matriculation` ),
  INDEX `fk_note_student1_idx` (`student_matriculation` ),
  INDEX `fk_note_class1_idx` (`class_id` ),
  INDEX `fk_note_exam1_idx` (`id_exam` ),
  INDEX `fk_note_year_idx` (`school_year` ),
  CONSTRAINT `fk_note_class1`
    FOREIGN KEY (`class_id`)
    REFERENCES `campus_pucket`.`class` (`class_id`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_note_exam1`
    FOREIGN KEY (`id_exam`)
    REFERENCES `campus_pucket`.`exam` (`id_exam`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_note_student1`
    FOREIGN KEY (`student_matriculation`)
    REFERENCES `campus_pucket`.`student` (`student_matriculation`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_note_subject1`
    FOREIGN KEY (`id_subject`)
    REFERENCES `campus_pucket`.`subject` (`id_subject`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_note_teacher1`
    FOREIGN KEY (`teacher_matriculation`)
    REFERENCES `campus_pucket`.`teacher` (`teacher_matriculation`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_note_year1`
    FOREIGN KEY (`school_year`)
    REFERENCES `campus_pucket`.`year` (`school_year`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

-- Dumping data for table `NOte`
--

INSERT INTO `campus_pucket`.`note` (`note_id`, `marks`, `remarks`, `grade`, `note_rank`, `id_subject`, `teacher_matriculation`, `student_matriculation`, `class_id`,
 `id_exam`,`school_year`) VALUES 
 ('1', 19,'excelent', 'A', '1', 'phy', 'tet', 'pi20', 2, '20firstsec','2020/2021');




-- -----------------------------------------------------
-- Table `campus_pucket`.`parent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`parent` (
  `tel` INT(11)  NULL,
  `par_fname` VARCHAR(45)  NULL,
  `par_oname` VARCHAR(200) NULL DEFAULT NULL,
  `par_lname` VARCHAR(45)  NULL,
  `type_of_reltion` VARCHAR(45)  NULL,
  `picture` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `sex` VARCHAR(45)  NULL,
  `resident` VARCHAR(45)  NULL,
  `password` VARCHAR(2000) NULL DEFAULT '12345678',
  PRIMARY KEY (`tel`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

-- Dumping data for table `parent`
--

INSERT INTO `parent` (`tel`, `par_fname`, `par_oname`, `par_lname`, `type_of_reltion`, `picture`, `email`, `sex`, `resident`, `password`) VALUES
(123456, 'serge', 'cute', 'kegne', 'father', 'picparent', 'parent email', 'male', 'douala', '12345678');




-- -----------------------------------------------------
-- Table `campus_pucket`.`parent_has_student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`parent_has_student` (
  `student_matriculation` VARCHAR(60) NOT NULL,
  `tel` INT(11) NOT NULL,
  PRIMARY KEY (`student_matriculation`, `tel`),
  INDEX `fk_parent_has_student_student1_idx` (`student_matriculation` ),
  INDEX `fk_parent_has_student_parent1_idx` (`tel` ),
  CONSTRAINT `fk_parent_has_student_parent1`
    FOREIGN KEY (`tel`)
    REFERENCES `campus_pucket`.`parent` (`tel`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_parent_has_student_student1`
    FOREIGN KEY (`student_matriculation`)
    REFERENCES `campus_pucket`.`student` (`student_matriculation`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

--
-- Dumping data for table `parent_has_student`
--
INSERT INTO `parent_has_student` (`student_matriculation`, `tel`) VALUES
('pi20', 123456);




-- -----------------------------------------------------
-- Table `campus_pucket`.`payment_method`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`payment_method` (
  `id_payment_method` INT(11) NOT NULL AUTO_INCREMENT,
  `payment_method` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_payment_method`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

-- Dumping data for table `payment_method`
--
INSERT INTO `campus_pucket`.`payment_method` (`payment_method`) VALUES 
('Cash'),
('Mobile Transfer'),
 ('Bank Transfer'),
 ('Credit Cart'),
 ('Check');



-- -----------------------------------------------------
-- Table `campus_pucket`.`motif`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`motif` (
  `id_motif` INT(11) NOT NULL AUTO_INCREMENT,
  `motif` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_motif`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

--
-- Dumping data for table `motif`
--

INSERT INTO `motif` ( `id_motif`,`motif`) VALUES
('1','Registration'),
('2','Advance first instalement'),
('3','First instalement'),
('4','Advance second instalement'),
('5','Second instalement'),
('6','Advance third instalement'),
('7','Third instalement'),
('8','Exmintonation Fee'),
('9','Medical fee'),
('10','LAB fee');

-- -----------------------------------------------------
-- Table `campus_pucket`.`payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`payment` (
  `id_payment` VARCHAR(60) NOT NULL,
  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `amount` INT(11) NOT NULL,
  `student_matriculation` VARCHAR(60) NOT NULL,
  `staff_matriculation` VARCHAR(60) NOT NULL,
  `school_year` VARCHAR(45) NOT NULL,
  `id_motif` INT(11) NOT NULL,
  `id_payment_method` INT(11) NOT NULL,
  `id_campus` INT(11) NOT NULL,
  `class_id` INT(11) NOT NULL,
  PRIMARY KEY (`id_payment`),
  INDEX `fk_payment_student1_idx` (`student_matriculation` ),
  INDEX `fk_payment_staff1_idx` (`staff_matriculation` ),
  INDEX `fk_payment_motif1_idx` (`id_motif` ),
  INDEX `fk_payment_payment_method1_idx` (`id_payment_method` ),
  INDEX `fk_payment_campus1_idx` (`id_campus` ),
  INDEX `fk_payment_year1_idx` (`school_year` ),
  INDEX `fk_payment_class1_idx` (`class_id` ),
  CONSTRAINT `fk_payment_campus1`
    FOREIGN KEY (`id_campus`)
    REFERENCES `campus_pucket`.`campus` (`id_campus`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_payment_motif1`
    FOREIGN KEY (`id_motif`)
    REFERENCES `campus_pucket`.`motif` (`id_motif`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_payment_payment_method1`
    FOREIGN KEY (`id_payment_method`)
    REFERENCES `campus_pucket`.`payment_method` (`id_payment_method`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_payment_staff1`
    FOREIGN KEY (`staff_matriculation`)
    REFERENCES `campus_pucket`.`staff` (`staff_matriculation`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_payment_student1`
    FOREIGN KEY (`student_matriculation`)
    REFERENCES `campus_pucket`.`student` (`student_matriculation`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_payment_year1`
    FOREIGN KEY (`school_year`)
    REFERENCES `campus_pucket`.`year` (`school_year`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_payment_class_id`
    FOREIGN KEY (`class_id`)
    REFERENCES `campus_pucket`.`class` (`class_id`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

-- Dumping data for table `payment`
--
INSERT INTO `campus_pucket`.`payment` (`id_payment`, `amount`, `student_matriculation`, `staff_matriculation`, `id_motif`, `id_payment_method`, 
`id_campus`,`school_year` , `class_id`) VALUES 
('1', '500000', 'pi20', 'fp2021', '3', '3', '1','2021/2022',1),
 ('1pi20220', '600000', 'pi20', 'fp2021', '3', '3', '1','2021/2022',2);

-- -----------------------------------------------------
-- Table `campus_pucket`.`department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`service`(
  `id_service` INT(11) NOT NULL AUTO_INCREMENT,
  `service` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_service`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

--
-- Dumping data for table `departement`
--
INSERT INTO `service` ( `service`) VALUES
    ('Deciplinary Service'),
    ('Commercial Service'),
    ('Accademic Service');



-- -----------------------------------------------------
-- Table `campus_pucket`.`post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`post` (
  `id_post` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `privillage_level` INT(11) NOT NULL,
  `id_service` INT(11) NOT NULL,
  PRIMARY KEY (`id_post`),
   INDEX `fk_post_service_idx` (`id_service`), 
  CONSTRAINT `fk_post_service`
    FOREIGN KEY (`id_service`)
    REFERENCES `campus_pucket`.`service` (`id_service`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `name`, `id_service`, `privillage_level`) VALUES
('PRINCI', 'principale',1, 1),
('VP', 'vice principal',1, 2),
('DM', 'discipline master',1, 3),
('HR', 'human resource',2, 1),
('AC1', 'first accountant',2, 2),
('AC2', 'second accountant',2, 3),
('DOS', 'dine of study',3, 1);


-- -----------------------------------------------------
-- Table `campus_pucket`.`schedule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`schedule` (
  `id_schedule` VARCHAR(45) NOT NULL,
  `date` DATE NOT NULL,
  `duration` VARCHAR(45) NOT NULL,
  `id_exam` VARCHAR(60) NOT NULL,
`class_id` INT(11) NOT NULL,
  `id_period` INT(11) NOT NULL,
  `id_subject` VARCHAR(45) NOT NULL,
  `id_invigilator` VARCHAR(45) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `school_year`VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_schedule`),
  INDEX `fk_schedule_exam1_idx` (`id_exam` ),
  INDEX `fk_schedule_class1_idx` (`class_id` ),
  INDEX `fk_schedule_period1_idx` (`id_period` ),
  INDEX `fk_schedule_subject1_idx` (`id_subject` ),
  INDEX `fk_schedule_invigilator1_idx` (`id_invigilator` ),
   INDEX `fk_schedule_year1_idx` (`school_year` ),
  CONSTRAINT `fk_schedule_class1`
    FOREIGN KEY (`class_id`)
    REFERENCES `campus_pucket`.`class` (`class_id`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_schedule_exam1`
    FOREIGN KEY (`id_exam`)
    REFERENCES `campus_pucket`.`exam` (`id_exam`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_schedule_invigilator1`
    FOREIGN KEY (`id_invigilator`)
    REFERENCES `campus_pucket`.`invigilator` (`id_invigilator`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_schedule_period1`
    FOREIGN KEY (`id_period`)
    REFERENCES `campus_pucket`.`period` (`id_period`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_schedule_subject1`
    FOREIGN KEY (`id_subject`)
    REFERENCES `campus_pucket`.`subject` (`id_subject`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_schedule_year1`
    FOREIGN KEY (`school_year`)
    REFERENCES `campus_pucket`.`year` (`school_year`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;


-- -----------------------------------------------------
-- Table `campus_pucket`.`teacher_has_subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`teacher_has_subject` (
  `teacher_matriculation` VARCHAR(60) NOT NULL,
  `id_subject` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`teacher_matriculation`, `id_subject`),
  INDEX `fk_teacher_has_subject_subject1_idx` (`id_subject` ),
  INDEX `fk_teacher_has_subject_teacher1_idx` (`teacher_matriculation` ),
  CONSTRAINT `fk_teacher_has_subject_subject1`
    FOREIGN KEY (`id_subject`)
    REFERENCES `campus_pucket`.`subject` (`id_subject`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_teacher_has_subject_teacher1`
    FOREIGN KEY (`teacher_matriculation`)
    REFERENCES `campus_pucket`.`teacher` (`teacher_matriculation`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SHOW WARNINGS;

--
-- Dumping data for table `teacher_has_subject`

INSERT INTO `teacher_has_subject` (`teacher_matriculation`, `id_subject`) VALUES
('TP221F12Z19', 'MATH'),
('TP321F12Z19', 'MATH'),
('TP421F12Z19', 'MATH');

-- -----------------------------------------------------
-- Table `campus_pucket`.`time_table`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campus_pucket`.`time_table` (
  `id_time_table` VARCHAR(45) NOT NULL,
  `id_day` INT(11) NOT NULL,
  `school_year` VARCHAR(45) NOT NULL,
  `id_subject` VARCHAR(45) NOT NULL,
  `class_id` INT(11) NOT NULL,
  `id_period` INT(11) NOT NULL,
  `teacher_matriculation` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_time_table`),
  INDEX `fk_time_table_day1_idx` (`id_day` ),
  INDEX `fk_time_table_year1_idx` (`school_year` ),
  INDEX `fk_time_table_subject1_idx` (`id_subject` ),
  INDEX `fk_time_table_class1_idx` (`class_id` ),
  INDEX `fk_time_table_period1_idx` (`id_period` ),
  INDEX `fk_time_table_teacher1_idx` (`teacher_matriculation` ),
  CONSTRAINT `fk_time_table_class1`
    FOREIGN KEY (`class_id`)
    REFERENCES `campus_pucket`.`class` (`class_id`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_time_table_day1`
    FOREIGN KEY (`id_day`)
    REFERENCES `campus_pucket`.`day` (`id_day`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_time_table_period1`
    FOREIGN KEY (`id_period`)
    REFERENCES `campus_pucket`.`period` (`id_period`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_time_table_subject1`
    FOREIGN KEY (`id_subject`)
    REFERENCES `campus_pucket`.`subject` (`id_subject`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_time_table_teacher1`
    FOREIGN KEY (`teacher_matriculation`)
    REFERENCES `campus_pucket`.`teacher` (`teacher_matriculation`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_time_table_year1`
    FOREIGN KEY (`school_year`)
    REFERENCES `campus_pucket`.`year` (`school_year`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

create table if not exists `campus_pucket`.`teacher_attendance` (
`id_teacher_attendance` varchar(200) NOT NULL,
`attendance_date` date NOT NULL ,
`time_arrive` time NOT NULL DEFAULT current_timestamp(),
`time_left` time ,
`id_subject` VARCHAR(45) NOT NULL,
`id_sub_serie` VARCHAR(45) NOT NULL,
`teacher_matriculation` VARCHAR(60) NOT NULL,
`staff_matriculation` VARCHAR(60) NOT NULL,
INDEX `fk_teacher_attendance_id_subject1_idx` (`id_subject` ),
INDEX `fk_teacher_attendance_teacher1_idx` (`teacher_matriculation` ),
INDEX `fk_teacher_attendance_id_sub_serie1_idx` (`id_sub_serie` ),
INDEX `fk_teacher_attendance_staff_matriculation1_idx` (`staff_matriculation` ),
  CONSTRAINT `fk_teacher_attendance_id_subject1`
    FOREIGN KEY (`id_subject`)
    REFERENCES `campus_pucket`.`subject` (`id_subject`),
	CONSTRAINT `fk_teacher_attendance_teacher1`
    FOREIGN KEY (`teacher_matriculation`)
        REFERENCES `campus_pucket`.`teacher` (`teacher_matriculation`),
	CONSTRAINT `fk_teacher_attendance_id_sub_serie1`
    FOREIGN KEY (`id_sub_serie`)
    REFERENCES `campus_pucket`.`sub_serie` (`id_sub_serie`),
    CONSTRAINT `fk_teacher_attendance_staff_matriculation`
    FOREIGN KEY (`staff_matriculation`)
    REFERENCES `campus_pucket`.`staff` (`staff_matriculation`)

);
