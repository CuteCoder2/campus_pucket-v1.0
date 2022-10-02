<?php


require_once dirname(__FILE__)."/dbconnect.php";


class Schedule{
    
        private $conn;
    
        public function __construct(){
            
            $dbcon = new DBconnect();
            
            $this->conn = $dbcon->connection();      
    
    }

    public function classExam($class_name,$id_exam){

        $new_class_exams = "INSERT INTO `campus_pucket`.`class_has_exam` (`class_name`, `id_exam`) VALUES (?,?);";

        $prepre_new_class_exaams = $this->conn->prepare($new_class_exams);

        $prepre_new_class_exaams->execute([$class_name,$id_exam]);
        
        return true;
    }
    
    public function modifyClassExams($class_name,$id_exam){
        $modify_class_exams = "UPDATE `campus_pucket`.`class_has_exam`  SET `class_name` = ?, `id_exam` = ? WHERE `class_name` = ? AND `id_exam` = ?;";
    
        $prepre_modify_class_exaams = $this->conn->prepare($modify_class_exams);
    
        $prepre_modify_class_exaams->execute([$class_name,$id_exam,$class_name,$id_exam]);
        
        return true;

    }
}