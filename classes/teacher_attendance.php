<?php


require_once dirname(__FILE__)."/dbconnect.php";


class teacherAttendance{
    
        private $conn;
    
        public function __construct(){
            
            $dbcon = new DBconnect();
            
            $this->conn = $dbcon->connection();      
    
    }

    public function addAttendance($id_teacher_attendance,$time_arrive,$id_subject,$id_sub_serie,$teacher_matriculation){

        $insert_stmt = 'INSERT INTO `campus_pucket`.`teacher_attendance` (`id_teacher_attendance`, `time_arrive`,`id_subject`, `id_sub_serie`, `teacher_matriculation`) VALUES (?,?,?,?,?);';

        $prepare_stmt = $this->conn->prepare($insert_stmt);

        $prepare_stmt->execute([$id_teacher_attendance,$time_arrive,$id_subject,$id_sub_serie,$teacher_matriculation]);

        return true;
    }

    public function getAllTeacherAttendance(){

        $select_stmt = "SELECT * FROM `campus_pucket`.`teacher_attendance` 
                INNER JOIN `teacher` ON `teacher`.`matriculation` = ";
    }
}