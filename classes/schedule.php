<?php


require_once dirname(__FILE__)."/dbconnect.php";


class Schedule{
    
        private $conn;
    
        public function __construct(){
            
            $dbcon = new DBconnect();
            
            $this->conn = $dbcon->connection();      
    
    }

    public function newShedule($id_schedule,$date,$duration,$id_exam,$class_name,$id_period,$id_subject,$id_invigilator,$start,$end,$year){

        $new_schedule = "INSERT INTO `campus_pucket`.`schedule` (`id_schedule`, `date`, `duration`, `id_exam`, `class_name`, 
        `id_period`, `id_subject`, `id_invigilator`,`start`,`end`,`school_year`) VALUES (?,?,?,?,?,?,?,?,?,?);";

        $prepare_schedule = $this->conn->prepare($new_schedule);

        $prepare_schedule->execute([$id_schedule,$date,$duration,$id_exam,$class_name,$id_period,$id_subject,$id_invigilator,$start,$end,$year]);
        
    }
    
    public function modifySchedule($date,$duration,$id_exam,$class_name,$id_period,$id_subject,$id_invigilator,$start,$end,$year,$id_schedule){
       
       $modify_schedule = "UPDATE `campus_pucket`.`schedule` SET `date` = ? , `duration` = ? , `id_exam` = ? , `class_name` = ? , 
        `id_period` = ? , `id_subject` = ? , `id_invigilator` = ? ,`start` = ? ,`end` = ? ,`school_year` = ? WHERE  `id_schedule` = ? ;";

        $prepare_schedule = $this->conn->prepare($modify_schedule);

        $prepare_schedule->execute([$date,$duration,$id_exam,$class_name,$id_period,$id_subject,$id_invigilator,$start,$end,$year,$id_schedule]);

    }

    public function getClassSchedule($school_year,$class_name,$exam_type){

        
        $class_schedule = "SELECT * FROM `campus_pucket`. `schedule`,`campus_pucket`.`exam`,`campus_pucket`.`class`,`campus_pucket`.`subject`,`campus_pucket`.`invigilator`,`campus_pucket`. `teacher`, `campus_pucket`.`staff`,`campus_pucket`.`class_has_exam`,`campus_pucket`.`exam_type`,`campus_pucket`.`year` WHERE `schedule`.`id_subject` = `subject`.`id_subject` AND `schedule`.`class_name` = `class`.`class_name` AND `schedule`.`id_exam` = `exam`.`id_exam` AND `schedule`.`id_invigilator` = `invigilator`.`id_invigilator` AND `teacher`.`matriculation` = `invigilator`.`teacher_matriculation` OR `staff`.`matriculation` = `invigilator`.`staff_matriculation` AND `class_has_exam`.`class_name` = `class`.`class_name` AND  `class_has_exam`.`id_exam` = `exam`.`id_exam` AND `exam`.`id_exam_type` = `exam_type`.`id_exam_type` AND `year`.`school_year` = `exam`.`school_year` AND `year`.`school_year` = ? AND `class`.`class_name` = ? AND `exam`.`id_exam_type` = ?;";

        $prepare_schedule_getting = $this->conn->prepare($class_schedule);

        $prepare_schedule_getting->execute([$school_year,$class_name,$exam_type]);
        
        $getting_all_result = $prepare_schedule_getting->fetchAll();

        return $getting_all_result;


    }

    public function getInvigilatorSchedule($school_year,$class_name,$exam_type,$teacher_matriculation,$staff_matriculation){

        
        $invigilator_schedule = "SELECT * FROM `campus_pucket`. `schedule`,`campus_pucket`.`exam`,`campus_pucket`.`class`,`campus_pucket`.`subject`,`campus_pucket`.`invigilator`,`campus_pucket`. `teacher`, `campus_pucket`.`staff`,`campus_pucket`.`class_has_exam`,`campus_pucket`.`exam_type`,`campus_pucket`.`year` WHERE `schedule`.`id_subject` = `subject`.`id_subject` AND `schedule`.`class_name` = `class`.`class_name` AND `schedule`.`id_exam` = `exam`.`id_exam` AND `schedule`.`id_invigilator` = `invigilator`.`id_invigilator` AND `teacher`.`matriculation` = `invigilator`.`teacher_matriculation` OR `staff`.`matriculation` = `invigilator`.`staff_matriculation` AND `class_has_exam`.`class_name` = `class`.`class_name` AND  `class_has_exam`.`id_exam` = `exam`.`id_exam` AND `exam`.`id_exam_type` = `exam_type`.`id_exam_type` AND `year`.`school_year` = `exam`.`school_year` AND `year`.`school_year` = ? AND `class`.`class_name` = ? AND `exam`.`id_exam_type` = ? AND `invigilator`.`teacher_matriculation` = ? OR `invigilator`.`staff_matriculation` = ?;";

        $prepare_schedule_getting = $this->conn->prepare($invigilator_schedule);

        $prepare_schedule_getting->execute([$school_year,$class_name,$exam_type,$teacher_matriculation,$staff_matriculation]);
        
        $getting_all_result = $prepare_schedule_getting->fetchAll();

        return $getting_all_result;

    }
}

