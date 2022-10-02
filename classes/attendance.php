<?php


require_once dirname(__FILE__)."/dbconnect.php";


class attendance{
    
        private $conn;
    
        public function __construct(){
            
            $dbcon = new DBconnect();
            
            $this->conn = $dbcon->connection();  
            
    
    
    }

    public function getClassAttendance($class_name,$school_year){
        
            $getClassAttendance = "SELECT  * FROM  `campus_pucket`.`attendence`, `campus_pucket`.`subject`,`campus_pucket`.`class`, `campus_pucket`.`year`,`campus_pucket`.`period` ,`campus_pucket`.`attendence_has_subject` , `campus_pucket`.`student_has_attendence` , `campus_pucket`.`student` ,  `campus_pucket`.`teacher`,`campus_pucket`.`attendence_has_period` WHERE 1 AND `attendence`.`class_name` = `class`.`class_name` AND `attendence`.`id_attendence` = `attendence_has_period`.`id_period` AND 
             `period`.`id_period` = `attendence_has_period`.`id_period` AND `attendence`.`id_attendence` = `attendence_has_subject`.`id_attendence`
             AND `attendence_has_subject`.`id_subject` = `subject`.`id_subject` AND `attendence`.`id_attendence` = `student_has_attendence`.`student_matriculation` 
             AND  `student_has_attendence`.`student_matriculation` AND `attendence`.`id_attendence` = `attendence_has_period`.`id_attendence` AND
             `attendence_has_period`.`id_attendence` = `period`.`id_period` AND `attendence`.`school_year` =  `year`.`school_year` AND `class`.`class_name` = ? AND `year`.`school_year` = ?;";

             $prepare_class_attendence = $this->conn->prepare($getClassAttendance);

             $prepare_class_attendence->execute([$class_name,$school_year]);

             $fetch_all_class_attendence = $prepare_class_attendence->fetchAll();
             
             return$fetch_all_class_attendence; 
    }


    public function newAttendance($id_attendence,$status,$class_name,$school_year){

        $add_attendence = "INSERT INTO `campus_pucket`.`attendence` (`id_attendence`, `status`, `class_name`,`school_yer`) VALUES (?,?,?);";

        $prepare_new_attendence = $this->conn->prepare($add_attendence);

        $prepare_new_attendence->execute([$id_attendence,$status,$class_name,$school_year]);
        return true ;
    }

    public function getStudentAttendence($student_mtricultion,$school_year){

        $getStudentAttendance = "SELECT  * FROM  `campus_pucket`.`attendence`, `campus_pucket`.`subject`,`campus_pucket`.`class`, `campus_pucket`.`year`,`campus_pucket`.`period` ,`campus_pucket`.`attendence_has_subject` , `campus_pucket`.`student_has_attendence` , `campus_pucket`.`student` ,  `campus_pucket`.`teacher`,`campus_pucket`.`attendence_has_period` WHERE 1 AND `attendence`.`class_name` = `class`.`class_name` AND `attendence`.`id_attendence` = `attendence_has_period`.`id_period` AND 
        `period`.`id_period` = `attendence_has_period`.`id_period` AND `attendence`.`id_attendence` = `attendence_has_subject`.`id_attendence`
        AND `attendence_has_subject`.`id_subject` = `subject`.`id_subject` AND `attendence`.`id_attendence` = `student_has_attendence`.`student_matriculation` 
        AND  `student_has_attendence`.`student_matriculation` AND `attendence`.`id_attendence` = `attendence_has_period`.`id_attendence` AND
        `attendence_has_period`.`id_attendence` = `period`.`id_period` AND `attendence`.`school_year` =  `year`.`school_year` AND `student`.`mtriculation` = ? AND `year`.`school_year` = ?;";

        $prepare_student_attendence = $this->conn->prepare($getStudentAttendance);

        $prepare_student_attendence->execute([$student_mtricultion,$school_year]);

        $fetch_all_student_attendence = $prepare_student_attendence->fetchAll();
        
        return$fetch_all_student_attendence; 
}




    public function modifyAttendance($status,$id_attendence){

        $modify_attendence = "UPDATE `campus_pucket`.`attendence`  SET `status` = ?  WHERE `id_attendence` = ?;";

        $prepare_modify_attendence = $this->conn->prepare($modify_attendence);

        $prepare_modify_attendence->execute([$status,$id_attendence]);


        
    }

}


?>